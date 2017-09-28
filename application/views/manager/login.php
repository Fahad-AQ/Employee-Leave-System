<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Leave System | Admin</title>

	<!-- Global stylesheets -->
	<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/checkbox.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/extras/animate.min.css" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_bootstrap_select.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/datatables_responsive.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/myFunctions.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/selectboxit.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/uploaders/fileinput.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/editable/editable.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/visualization/sparkline.min.js"></script>

	<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/picker_date.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery_ui/datepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>


	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/table_responsive.js"></script> 
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/footable/footable.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_validation.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/notifications/bootbox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/components_modals.js"></script>

   <style>
   
  
   
   </style>


</head>

<style>
body {
	font-family: "Roboto", Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 13px;
    line-height: 1.5384616;
    color: #333333;
    background-image: url("<?php echo base_url();?>assets/images/bg_image.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
</style>

<body>


<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning-400 text-warning-400"><i class="icon-user-tie"></i></div>
								<h5 class="content-group-lg">Employee Leave System<small class="display-block">Click On Zara Mobility Services</small></h5>
							</div>

							<div class="message alert alert-styled-left"></div>
							
							<div class="form-group login-options">
								<div class="row">
									<!--<div class="col-sm-6" style="visibility: hidden;">
										<label class="checkbox-inline">
											<input type="checkbox" class="styled" checked="checked">
											Remember
										</label>
									</div>

									<div class="col-sm-6 text-right">
										<a href="login_password_recover.html">Forgot password?</a>
									</div>-->
								</div>
							</div>
								  <div id="customBtn" class="form-group" href="">
										<a href="#"  class="btn btn-block text-bold" ><i class="icon-google-plus"></i>&nbsp; Zara Mobility Services </a>
								  </div>
							
							<!--<div class="content-divider text-muted form-group"><span>or sign in with</span></div>
							<ul class="list-inline form-group list-inline-condensed text-center">
								<li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
								<li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
								<li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
								<li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
							</ul>

							<div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
							<a href="login_registration.html" class="btn bg-slate btn-block content-group">Register</a>
							<span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
						</div>-->
					<!-- /advanced login -->



				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
        <script src="https://apis.google.com/js/api:client.js"></script>
		<script>
			$(document).ready(function () { 
				$('.message').hide();
                var googleUser = {};
				gapi.load('auth2', function(){
				// Retrieve the singleton for the GoogleAuth library and set up the client.
				auth2 = gapi.auth2.init({
					client_id: '769515286500-l0atr87mn96gsp6mmvekvlcei9jk0rg0.apps.googleusercontent.com',
					// Request scopes in addition to 'profile' and 'email'
					//scope: 'additional_scope'
				});
				auth2.attachClickHandler('customBtn', {},
					function(googleUser) {
						var profile = googleUser.getBasicProfile();	
						var email = profile.getEmail();
						var checkEmail = email.split("@");
						if(checkEmail[1] != "mobilelinkusa.com"){
                            $('.message').addClass('alert-warning');
							$('.message').removeClass('alert-success');
							$('.message').slideDown(2500).html('Company email only allowed');
						}
					   else{
						$.ajax({
						type:'post',
						data:{"email" : profile.getEmail() ,"photo" : profile.getImageUrl()},
						url:'<?php echo base_url('admin/login'); ?>',
						dataType:'json',
						success:function(data){
						if(data.status == "Credential Not Created" ){

						$('.message').addClass('alert-warning');
						$('.message').removeClass('alert-success');
						$('.message').slideDown(2500).html("Kindly reach out HR depart For Your Credentials");
						
						}
						else if(data.object.role == "Approver"){
                           if(data.object.status == "1"){
	                           $('.message').removeClass('alert-warning');
							   $('.message').addClass('alert-success');
							   $('.message').slideDown(2500).html("Login Success");
							   setTimeout(function(){location.href="<?php echo base_url('admin/dashboard'); ?>"} , 2500);  
                           }
                           else{
                           	$('.message').addClass('alert-warning');
							$('.message').removeClass('alert-success');
							$('.message').slideDown(2500).html("Kindly reach out HR depart For Your Credentials");
                           }
							
                          
						}
						
						else if(data.object.role == "Manager" || data.object.role == "Departmental" ){
							if(data.object.status == "1"){
	                            $('.message').removeClass('alert-warning');
							   $('.message').addClass('alert-success');
							   $('.message').slideDown(2500).html("Login Success");
							   setTimeout(function(){location.href="<?php echo base_url('manager/dashboard'); ?>"} , 2500);  
                           }
                           else{
                           	$('.message').addClass('alert-warning');
							$('.message').removeClass('alert-success');
							$('.message').slideDown(2500).html("Kindly reach out HR depart For Your Credentials");
                           }
                          
						}

					    else{
					    	if(data.object.status == "1"){
		                        $('.message').removeClass('alert-warning');
								$('.message').addClass('alert-success');
								$('.message').slideDown(2500).html("Login Success");   
							    setTimeout(function(){location.href="<?php echo base_url('user/dashboard'); ?>"} , 2500);  
                           }
                           else{
                           	$('.message').addClass('alert-warning');
							$('.message').removeClass('alert-success');
							$('.message').slideDown(2500).html("Kindly reach out HR depart For Your Credentials");
                           }
							  
						 }

						},
						error:function(data){console.log(data.responseText)}
				     });
				 	}
				
				});
				});

			});
  </script>
	</body>
</html>
