<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Admin Panel</title>
  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>
  
</head>

<body class="bg-dark">
 <!-- Start wrapper-->
<div class="col-lg-12">
   <div class="col-12 col-lg-6 col-xl-4">
   </div>
   <div class="col-12 col-lg-6 col-xl-4">

 <div id="wrapper">
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 
		 	<!--Message Display Here --> 
                     @if(Session::has('flash_message_error'))
                     
                     <div class="alert alert-danger alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>  
                          <strong>{!! session('flash_message_error') !!}</strong>
                     </div>
                     @endif
                     @if(Session::has('flash_message_success'))
                     
                     <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>  
                          <strong>{!! session('flash_message_success') !!}</strong>
                     </div>
                     @endif
		  <div class="card-title text-uppercase text-center py-3">  <img src="{{ asset('assets/images/admin-logo3.png') }}" class="logo-icon" height="400px;" alt="logo icon"></div>
		    <form method="post" action="{{ url('admin')}}" id="login">
		      <input type="hidden" name="_token" value="{{ csrf_token() }}" />	
		         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			  <div class="form-group">
			  <label for="exampleInputUsername" class="" style="color:#000;">Email ID</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputUsername" name="email" class="form-control input-shadow" placeholder="Enter Email">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="" style="color:#000;">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="exampleInputPassword" name="password" class="form-control input-shadow" placeholder="Enter Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
		
			 <button type="submit"  class="btn btn-primary shadow-primary btn-block waves-effect waves-light">Login</button>
			</form>
		   </div>
		  </div>
		 </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->
 </div>
</div>  
	
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!--Form Validatin Script-->
    <script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script>

    $().ready(function() {

    $("#personal-info").validate();

   // validate signup form on keyup and submit
    $("#login").validate({
        rules: {
            email: "required",
            password: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
           // agree: "required"
        },
        messages: {
            email: "Please enter your Email id",
            password: "Please enter your Password",
            
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
          
            //agree: "Please accept our policy",
           
        }
    });

});

    </script>
</body>

</html>
