@extends('layout.master')
@section('title', 'Home page')
@section('body')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h3>Payment of This course</h3>
				<form action="{{route('payment.process')}}" method="POST" role="form">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<legend>Via Paypal</legend>
					<div class="form-group">
						<label for="">Amount</label>
						<input type="text" class="form-control" id="" name="amount" placeholder="Amount of product...">
					</div>
					<button type="submit" class="btn btn-primary">Payment</button>
				</form>
				<br>
			</div>
		</div>
	</div>
@stop