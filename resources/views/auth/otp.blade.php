<div class="card-group">
	<div class="card p-4">
		<div class="card-body">
			@if(\Session::has('message'))
				<p class="alert alert-info">
					{{ \Session::get('message') }}
				</p>
			@endif
			@if($errors->has('otp'))
			<div id="error-box">
			{{ $errors->first('otp') }}
			</div>
			@endif
			<div class="panel-body">

			<form id="otp-form" role="form" autocomplete="off" class="form" method="post" action="{{ route('login.validate.otp') }}" >
				@csrf
				{{ isset($mobile_number) ? $mobile_number : '' }}
			  <div class="form-group">
				<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
				  <input id="" name="otp" placeholder="Enter Otp" class="form-control" type="text">
				</div>
			  </div>
			  <div class="form-group">
				<input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
			  </div>
				@if(\Session::has('phone_number'))
					<input type="hidden" class="hide" name="phone" id="token" value="{{ \Session::get('phone_number') }}"> 
					@else
					<input type="hidden" class="hide" name="phone" id="token" value=""> 		
				@endif
			   
			</form>

		  </div>
		</div>
	</div>
</div>

