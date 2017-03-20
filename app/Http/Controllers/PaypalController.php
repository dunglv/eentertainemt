<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
class PaypalController extends Controller
{
   	private $_api_context;
 
    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function get_payment()
    {
    	return  view('payment.index');
    }

    public function post_payment(Request $request)
    {
    	$payer = new Payer();
	    $payer->setPaymentMethod('paypal');
	 
	    $item_1 = new Item();
	    $item_1->setName('Item 1') // item name
	        ->setCurrency('USA')
	        ->setQuantity(2)
	        ->setPrice('150'); // unit price
	 
	    // add item to list
	    $item_list = new ItemList();
	    $item_list->setItems(array($item_1));
	 
	    $amount = new Amount();
	    $amount->setCurrency('EUR')
	        ->setTotal(580);
	 
	    $transaction = new Transaction();
	    $transaction->setAmount($amount)
	        ->setItemList($item_list)
	        ->setDescription('Your transaction description');
	 
	    $redirect_urls = new RedirectUrls();
	    $redirect_urls->setReturnUrl(\URL::route('payment.status')) // Specify return URL
	        ->setCancelUrl(\URL::route('payment.status'));
	 
	    $payment = new Payment();
	    $payment->setIntent('Sale')
	        ->setPayer($payer)
	        ->setRedirectUrls($redirect_urls)
	        ->setTransactions(array($transaction));
	 
	    try {
	        $payment->create($this->_api_context);
	     }
	    catch (PayPal\Exception\PayPalConnectionException $ex) {
		    echo $ex->getCode(); // Prints the Error Code
		    echo $ex->getData(); // Prints the detailed error message 
		    die($ex);
		} catch (Exception $ex) {
		    die($ex);
		}
	 
	    foreach($payment->getLinks() as $link) {
	        if($link->getRel() == 'approval_url') {
	            $redirect_url = $link->getHref();
	            break;
	        }
	    }
	 
	    // add payment ID to session
	    Session::put('paypal_payment_id', $payment->getId());
	 
	    if(isset($redirect_url)) {
	        // redirect to paypal
	        return Redirect::away($redirect_url);
	    }
	 
	    return Redirect::route('original.route')
	        ->with('error', 'Unknown error occurred');
	    // return $payment->getId();

    }
    
    public function get_payment_status()
    {
    	 // Get the payment ID before session clear
	    $payment_id = Session::get('paypal_payment_id');
	 
	    // clear the session payment ID
	    Session::forget('paypal_payment_id');
	 
	    if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
	        return Redirect::route('original.route')
	            ->with('error', 'Payment failed');
	    }

	    $payment = Payment::get($payment_id, $this->_api_context);
	 
	    // PaymentExecution object includes information necessary 
	    // to execute a PayPal account payment. 
	    // The payer_id is added to the request query parameters
	    // when the user is redirected from paypal back to your site
	    $execution = new PaymentExecution();
	    $execution->setPayerId(Input::get('PayerID'));
	 
	    //Execute the payment
	    $result = $payment->execute($execution, $this->_api_context);
	 
	    echo '<pre>';
	    print_r($result);
	    echo '</pre>';
	    exit; 
	    // DEBUG RESULT, remove it later
	 
	    if ($result->getState() == 'approved') { // payment made
	        return Redirect::route('original.route')
	            ->with('success', 'Payment success');
	    }
	    return Redirect::route('original.route')
	        ->with('error', 'Payment failed');
    	// return view('payment.status');

    }
}
