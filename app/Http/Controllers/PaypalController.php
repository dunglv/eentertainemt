<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
// use PayPal\Api\Amount;
// use PayPal\Api\Details;
// use PayPal\Api\Item;
// use PayPal\Api\ItemList;
// use PayPal\Api\Payer;
// use PayPal\Api\Payment;
// use PayPal\Api\RedirectUrls;
// use PayPal\Api\ExecutePayment;
// use PayPal\Api\PaymentExecution;
// use PayPal\Api\Transaction;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentCard;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
   	private $apiContext;
 
    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->apiContext = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->apiContext->setConfig($paypal_conf['settings']);
    }

    public function get_payment()
    {
    	return  view('payment.index');
    }

    public function post_payment(Request $request)
    {
    	// dd($this->apiContext);
    	$payer = new Payer();
		$payer->setPaymentMethod("paypal");
		// ### Itemized information
		// (Optional) Lets you specify item wise
		// information
		$item1 = new Item();
		$item1->setName('Ground Coffee 40 oz')
		    ->setCurrency('USD')
		    ->setQuantity(1)
		    ->setSku("123123") // Similar to `item_number` in Classic API
		    ->setPrice(8);
		$item2 = new Item();
		$item2->setName('Granola bars')
		    ->setCurrency('USD')
		    ->setQuantity(5)
		    ->setSku("321321") // Similar to `item_number` in Classic API
		    ->setPrice(2);
		$itemList = new ItemList();
		$itemList->setItems(array($item1, $item2));
		// ### Additional payment details
		// Use this optional field to set additional
		// payment information such as tax, shipping
		// charges etc.
		$details = new Details();
		$details->setShipping(0)
		    ->setTax(0)
		    ->setSubtotal(18);
		// ### Amount
		// Lets you specify a payment amount.
		// You can also specify additional details
		// such as shipping, tax.
		$amount = new Amount();
		$amount->setCurrency("USD")
		    ->setTotal(18)
		    ->setDetails($details);
		// ### Transaction
		// A transaction defines the contract of a
		// payment - what is the payment for and who
		// is fulfilling it. 
		$transaction = new Transaction();
		$transaction->setAmount($amount)
		    ->setItemList($itemList)
		    ->setDescription("Payment description")
		    ->setInvoiceNumber(uniqid());
		// ### Redirect urls
		// Set the urls that the buyer must be redirected to after 
		// payment approval/ cancellation.
		// $baseUrl = getBaseUrl();
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl(route('payment.status'))
		    ->setCancelUrl(route('payment.status'));
		// ### Payment
		// A Payment Resource; create one using
		// the above types and intent set to 'sale'
		$payment = new Payment();
		$payment->setIntent("sale")
		    ->setPayer($payer)
		    ->setRedirectUrls($redirectUrls)
		    ->setTransactions(array($transaction));
		// For Sample Purposes Only.
		$request = clone $payment;
		// ### Create Payment
		// Create a payment by calling the 'create' method
		// passing it a valid apiContext.
		// (See bootstrap.php for more on `ApiContext`)
		// The return object contains the state and the
		// url to which the buyer must be redirected to
		// for payment approval
		try {
		    $payment->create($this->apiContext);
		} catch (Exception $ex) {
		    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
		    ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
		    // exit(1);
		}
		// ### Get redirect url
		// The API response provides the url that you must redirect
		// the buyer to. Retrieve the url from the $payment->getApprovalLink()
		// method
		$approvalUrl = $payment->getApprovalLink();
		// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
		 // ResultPrinter::printResult("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);
		// return $payment;
		return redirect()->to($approvalUrl);

    }
    
    public function get_payment_status()
    {
    	 // Get the payment ID before session clear
	    // $payment_id = \Session::get('payment_id');
	    $payment_id = $_GET['paymentId'];
	    // dd($payment_id);
	 
	    // clear the session payment ID
	    \Session::forget('payment_id');
	 
	    if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
	        return Redirect::route('original.route')
	            ->with('error', 'Payment failed');
	    }

	    $payment = Payment::get($payment_id, $this->apiContext);
	 
	    // PaymentExecution object includes information necessary 
	    // to execute a PayPal account payment. 
	    // The payer_id is added to the request query parameters
	    // when the user is redirected from paypal back to your site
	    $execution = new PaymentExecution();
	    $execution->setPayerId(Input::get('PayerID'));
	 
	    //Execute the payment
	    $result = $payment->execute($execution, $this->apiContext);
	 
	    // echo '<pre>';
	    // print_r($result);
	    // echo '</pre>';
	    // exit; 
	    // DEBUG RESULT, remove it later
	 
	    if ($result->getState() == 'approved') { // payment made
	        return redirect()->route('payment.index')
	            ->with('message', 'success');
	    }
	    return redirect()->route('payment.index')
	        ->with('message', 'failed');
    	// return view('payment.status');

    }
    public function post_payment_id_card(Request $request)
    {
    	$id_card = $request->get('id_card');
    	$expiredMonth = $request->get('expired_month');
    	$expiredYear = $request->get('expired_year');

    	// ### PaymentCard
		// A resource representing a payment card that can be
		// used to fund a payment.
		$card = new PaymentCard();
		$card->setType("visa")
		    ->setNumber($id_card)
		    ->setExpireMonth($expiredMonth)
		    ->setExpireYear($expiredYear)
		    ->setCvv2("012")
		    ->setFirstName("Joe")
		    ->setBillingCountry("US")
		    ->setLastName("Shopper");
		// ### FundingInstrument
		// A resource representing a Payer's funding instrument.
		// For direct credit card payments, set the CreditCard
		// field on this object.
		$fi = new FundingInstrument();
		$fi->setPaymentCard($card);
		// ### Payer
		// A resource representing a Payer that funds a payment
		// For direct credit card payments, set payment method
		// to 'credit_card' and add an array of funding instruments.
		$payer = new Payer();
		$payer->setPaymentMethod("credit_card")
		    ->setFundingInstruments(array($fi));
		// ### Itemized information
		// (Optional) Lets you specify item wise
		// information
		$item1 = new Item();
		$item1->setName('Ground Coffee 40 oz')
		    ->setDescription('Ground Coffee 40 oz')
		    ->setCurrency('USD')
		    ->setQuantity(1)
		    ->setTax(0.3)
		    ->setPrice(7.50);
		$item2 = new Item();
		$item2->setName('Granola bars')
		    ->setDescription('Granola Bars with Peanuts')
		    ->setCurrency('USD')
		    ->setQuantity(5)
		    ->setTax(0.2)
		    ->setPrice(2);
		$itemList = new ItemList();
		$itemList->setItems(array($item1, $item2));
		// ### Additional payment details
		// Use this optional field to set additional
		// payment information such as tax, shipping
		// charges etc.
		$details = new Details();
		$details->setShipping(1.2)
		    ->setTax(1.3)
		    ->setSubtotal(17.5);
		// ### Amount
		// Lets you specify a payment amount.
		// You can also specify additional details
		// such as shipping, tax.
		$amount = new Amount();
		$amount->setCurrency("USD")
		    ->setTotal(20)
		    ->setDetails($details);
		// ### Transaction
		// A transaction defines the contract of a
		// payment - what is the payment for and who
		// is fulfilling it.
		$transaction = new Transaction();
		$transaction->setAmount($amount)
		    ->setItemList($itemList)
		    ->setDescription("Payment description")
		    ->setInvoiceNumber(uniqid());
		// ### Payment
		// A Payment Resource; create one using
		// the above types and intent set to sale 'sale'
		$payment = new Payment();
		$payment->setIntent("sale")
		    ->setPayer($payer)
		    ->setTransactions(array($transaction));
		// For Sample Purposes Only.
		$request = clone $payment;
		// ### Create Payment
		// Create a payment by calling the payment->create() method
		// with a valid ApiContext (See bootstrap.php for more on `ApiContext`)
		// The return object contains the state.
		// $approvalUrl = $payment->getApprovalLink();

		

		try {
		    $payment->create($this->apiContext);
		} catch (Exception $ex) {
		    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
		    // ResultPrinter::printError('Create Payment Using Credit Card. If 500 Exception, try creating a new Credit Card using <a href="https://www.paypal-knowledge.com/infocenter/index?page=content&widgetview=true&id=FAQ1413">Step 4, on this link</a>, and using it.', 'Payment', null, $request, $ex);
		    // exit(1);
		    return redirect()->route('payment.index');
		}
		// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
		 // ResultPrinter::printResult('Create Payment Using Credit Card', 'Payment', $payment->getId(), $request, $payment);
		echo '<pre>';
		var_dump($payment);
		echo '</pre>';
		// return redirect()->to($approvalUrl);
    }
}
