@extends('layouts.admin')
@section('content')

	<div class="card col-md-12">

		<div class="card-header">Form Grid</div>
		<div class="card-body">
			<p>Payment</p>
			
			<form action="route('admin.makePayment')" method="post">
			
				<div class="row">
				
				  <div class="col">
					<label for="firstname">Firstname*</label>
					<input type="text" class="form-control" id="first-name" placeholder="Enter First Name" name="first_name">
				  </div>
				  
				  <div class="col">
					<label for="lastname">Last Name*</label>
					<input type="text" class="form-control" placeholder="Enter last name" name="last_name">
				  </div>
                  
				</div>  
				 			
				<button type="submit" class="btn btn-primary mt-3">Submit</button>
				
			</form>
		</div>	
	</div>
	
@endsection