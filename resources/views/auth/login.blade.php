@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    @if(\Session::has('message'))
                        <p class="alert alert-info">
                            {{ \Session::get('message') }}
                        </p>
                    @endif
					
                    <div class="panel-body">
    
                    <form action="{{ route('login.otp') }}" id="register-form" role="form" autocomplete="off" class="form" method="post">
						@csrf
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="" name="phone" placeholder="Enter Mobile Number" class="form-control" type="text">
						   @if($errors->has('phone'))
								<div id="error-box">
								{{ $errors->first('phone') }}
								</div>
							@endif
						</div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script>
$(document).ready(function(){
	//form Submit
    $('#register-form').on("submit", function(e){
        e.preventDefault(); 
        var form = $(this);
        var data = form.serialize();
        var action = form.attr('action');
		var method = form.attr('method');
        //form validation 
        form.validate({
			ignore: "",
            rules:{
                phone: {
					required : true,
					number   : true,
				},
            },
            messages: {
                phone : {
                    required : 'Please enter mobile number.',
                    number   : 'Please enter a vlid number.'
                },
            },
       
        });
        
        /*check if form is valid or not*/
        if (form.valid() === true){
       
			$.ajax({
                url: action,
                cache: false,
                data:data,
                type:'POST',
                success: function(result) {
					$('.card-group').remove();
					$('.container').html(result);
                }
            });
        } 
          
	});	
	
	//otpForm
	$(document).on("submit", "#otp-form", function(e){
        e.preventDefault(); 
        var form = $(this);
        var data = form.serialize();
        var action = form.attr('action');
		var method = form.attr('method');
        //form validation 
        form.validate({
			ignore: "",
            rules:{
                otp: {
					required : true,
					number   : true,
				},
            },
            messages: {
                otp : {
                    required : 'Please enter otp.',
                    number   : 'Please enter a vlid otp.'
                },
            },
       
        });
        
        /*check if form is valid or not*/
        if (form.valid() === true){
       
			$.ajax({
                url: action,
                cache: false,
                data:data,
                type:'POST',
                success: function(result) {
					if(result.error == true){
						var error  = '<div id="error-box">';
							error  += result.msg;
							error  += '</div>';
						$('input[name="otp"]').after(error);	
					}else{
						window.location.href = result.redirect_url;
					}
                }
            });
        } 
          
	});	
});
</script>
@endsection
