@extends('layout.master')
@section('title', 'Home page')
@section('body')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				@if(Session::has('message'))
					@if(Session::get('message')==='success')
						<div class="text-success">Payment Success</div>
					@else
						<div class="text-danger">Payment Failed</div>
					@endif
				@endif
				<h3>Payment of This course</h3>
				<form action="{{route('payment.process')}}" method="POST" role="form">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<legend>Via Paypal</legend>
					<div class="form-group">
						<label for="">ID Card:</label>
						<input type="text" class="form-control" id="" name="id_card" placeholder="ID Card">
					</div>
					<div class="form-group form-inline">
						<label for="">Exprired:</label>
						<input type="text" class="form-control" id="" name="expired_month" placeholder="Month">
						<label for="">/</label>
						<input type="text" class="form-control" id="" name="expired_year" placeholder="Year">
					</div>
					<button type="submit" class="btn btn-primary">Payment</button>
				</form>
				<br>
			</div>
		</div>
	</div>
@stop