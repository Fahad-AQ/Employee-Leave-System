<style>
.leaveStyle{
	position : relative;
	left : 10px;
	margin-bottom : 12px;
 }
 #message {
   position :relative;
   font-size : 20px;
 }
 #eu_designationView {
	 margin-top : 10px;
 }
 #eu_departmentView {
	 margin-top : 10px;
 }
 .hideDepartTap {
	cursor: pointer;
 }
</style>

<div id="modal_theme_bg_custom_EditUser" class="modal fade" style="display: none;">

	<div class="modal-dialog modal-md">

		<div class="modal-content">
						
			<div class="modal-header bg-teal">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Edit User</h5>
			</div>

            <div class="modal-body">
			 <form id="editRequestForm" action="" >
			    <fieldset class="content-group">
			 		
						<legend class="text-bold">User form</legend>
					      <div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold" >Employee Id:</label>
									<input id="eu_empBatchId" type="number" value="12882" placeholder="Enter Employee ID"  class="form-control">
								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Name:</label>
									<input id="eu_empName" type="text" value="Fahad Ahmed Qureshi" placeholder="Enter Name"  class="form-control">
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Father Name:</label>
									<input id="eu_empFname" type="text"  placeholder="Enter Employee Father Name"  class="form-control">
								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">CNIC:</label>
									<input id="eu_empCnic" type="number"  placeholder="Enter CNIC"  class="form-control">
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Contact:</label>
									<input id="eu_empContact" type="number"placeholder="Enter Employee Contact Number"  class="form-control">
								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Email:</label>
									<input id="eu_empEmail" type="email" placeholder="Enter Email"  class="form-control">
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Date of Birth:</label>
											<div class="col-lg-14">
											<input type="date" id="eu_startDate" data-date-format="mm/dd/yyyy"  placeholder="Enter Start Date"  class="form-control startDate">
											</div>
									</div>
								 </div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="control-label text-bold col-lg-6">Date of Join:</label>
									<div class="col-lg-14">
										<input type="date" id="eu_endDate" data-date-format="mm/dd/yyyy"  placeholder="Enter End Date"  class="form-control endDate">
									</div>
									</div>
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Address:</label>
											<div class="col-lg-14">
											  <textarea id="eu_address" rows="3" cols="3" class="form-control" placeholder="Enter Employee Address" name="address" id="address" ></textarea>
											</div>
									</div>
								 </div>	
						    </div>
							
							<div class="row">
								<div class="col-lg-6">
										<div class="form-group">
										<label class="control-label text-bold col-lg-6">Department:</label>
											<div class="col-lg-14">
											   <div class="uploader bg-success">
														<select name="select" class="form-control"  id="eu_department">
														<option value="opt1">Select Department</option>
														<option value="opt2">Option 2</option>
														<option value="opt3">Option 3</option>
														<option value="opt4">Option 4</option>
														<option value="opt5">Option 5</option>
														<option value="opt6">Option 6</option>
														<option value="opt7">Option 7</option>
														<option value="opt8">Option 8</option>
													</select><span id="eu_departmentAdd"  class="action" style="user-select: none;"><i class="icon-plus2"></i></span>
												</div>
											</div>
										</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="control-label text-bold col-lg-6">Designation:</label>
										<div class="col-lg-14">
												 <div class="uploader bg-success">
														<select name="select" class="form-control"  id="eu_designation">
														<option value="opt1">Select Designation</option>
														<option value="opt2">Option 2</option>
														<option value="opt3">Option 3</option>
														<option value="opt4">Option 4</option>
														<option value="opt5">Option 5</option>
														<option value="opt6">Option 6</option>
														<option value="opt7">Option 7</option>
														<option value="opt8">Option 8</option>
													</select><span id="eu_designationAdd"  class="action" style="user-select: none;"><i  class="icon-plus2"></i></span>
												</div>
										</div>
									</div>
								</div>
						    </div>
							

							<div id="eu_departmentView" class="panel panel-flat animated fadeIn" style="display : none">
								 <div class="panel-heading">
										<h5 class="panel-title">Add Department</h5>
										<div class="heading-elements">
											<ul class="icons-list">
												<li class="hideDepartTap">x</li>
											</ul>
										</div>
									<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

									<div class="panel-body" style="display: block;">
										<div id="eu_desig_msg" class="alert bg-info alert-styled-right" style="display:none;"></div>
											<form action="" class="form-horizontal addmarket"  method="post" accept-charset="utf-8">
												<fieldset class="content-group">
													<div class="form-group">
														<label class="control-label col-lg-3">Department:</label>
														<div class="col-lg-10">
															<input type="text" name="marketname" value="" id="eu_addDepartment" class="marketname form-control required" placeholder="Enter Employee Department">
														</div>
													</div>
												</fieldset>
												<div class="text-right">
													<button type="submit" id="button" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</form>
									</div>
							</div>

							<div id="eu_designationView" class="panel panel-flat animated fadeIn" style="display : none">
								 <div class="panel-heading">
										<h5 class="panel-title">Add Designation</h5>
										<div class="heading-elements">
											<ul class="icons-list">
												<li class="hideDepartTap">x</li>
											</ul>
										</div>
									<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

									<div class="panel-body" style="display: block;">
										<div id="eu_desig_msg" class="alert bg-info alert-styled-right" style="display:none;"></div>
											<form action="" class="form-horizontal addmarket" method="post" accept-charset="utf-8">
												<fieldset class="content-group">
													<div class="form-group">
														<label class="control-label col-lg-3">Designation:</label>
														<div class="col-lg-10">
															<input type="text" name="marketname" value=""  id="eu_addDesignation" class="marketname form-control required" placeholder="Enter Employee Department">
															
														</div>
													</div>
												</fieldset>
												<div class="text-right">
													<button type="submit" id="button" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</form>
									</div>
									
							</div>
							<div class="row">
										<div class="col-lg-12">
												<div class="form-group">
												<label class="control-label text-bold col-lg-12">Role:</label>
													<div class="col-lg-14">
															<select name="select" class="form-control"  id="eu_role">
															<option value="opt1">Select Role</option>
															<option value="opt2">Option 2</option>
															<option value="opt3">Option 3</option>
															<option value="opt4">Option 4</option>
															<option value="opt5">Option 5</option>
															<option value="opt6">Option 6</option>
															<option value="opt7">Option 7</option>
															<option value="opt8">Option 8</option>
															</select>
													</div>
												</div>
										</div>	
						         </div>
					    </div>
					</fieldset>
					<div class="text-right">
							<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>

		</div>
	</div>	
</div>


<script>
  

 $(document).ready(function () { 

	var doj = 12-5-2015;
    $('.message').hide();
	$('#eu_startDate').pickadate({ format: 'dd/mm/yyyy'});
	$('#eu_endDate').pickadate({ format: 'dd/mm/yyyy'});

	$(".hideDepartTap").click(function(){
		$('#eu_departmentView').hide();
	    $('#eu_designationView').hide();
	});

	$("#eu_departmentAdd").click(function(){
		$('#eu_designationView').hide();
		$('#eu_departmentView').show();
	});

	$("#eu_designationAdd").click(function(){
		$('#eu_departmentView').hide();
	    $('#eu_designationView').show();
	});


 })
</script>
<script>
                // var googleUser = {};
				// gapi.load('auth2', function(){
				// // Retrieve the singleton for the GoogleAuth library and set up the client.
				// auth2 = gapi.auth2.init({
				// 	client_id: '265626957899-nq5df1aufq5vq0mlmmbg5r87m46869v2.apps.googleusercontent.com',
				// 	// Request scopes in addition to 'profile' and 'email'
				// 	//scope: 'additional_scope'
				// });
				// auth2.attachClickHandler('customBtn', {},
				// 	function(googleUser) {
				// 		var profile = googleUser.getBasicProfile();
				// 		$.ajax({
				// 		type:'post',
				// 		data:{"email" : profile.getEmail() , "id" : profile.getId() ,"photo" : profile.getImageUrl(),"name" : profile.getName()},
				// 		url:'<?php echo base_url('user/login'); ?>',
				// 		dataType:'json',
				// 		success:function(data){
				// 		if(data == true ){
				// 		$('.message').removeClass('alert-warning');
				// 		$('.message').addClass('alert-success');
				// 		$('.message').slideDown(2500).html("Login Success");
				// 		setTimeout(function(){location.href="<?php echo base_url('user'); ?>"} , 2500);    
				// 		}
				// 		else if(data == "Credential Not Created" ){
				// 		$('.message').addClass('alert-warning');
				// 		$('.message').removeClass('alert-success');
				// 		$('.message').slideDown(2500).html("Kindly reach out HR depart For Your Credentials");
				// 		}
				// 		else{
				// 		$('.message').addClass('alert-warning');
				// 		$('.message').removeClass('alert-success');
				// 		$('.message').slideDown(2500).html("Something Wrong"); 
				// 		}
				// 		},
				// 		error:function(data){console.log(data.responseText)}
				// 		});
				// 		var email = profile.getEmail();
				// 		var checkEmail = email.split("@");
				// 		if(checkEmail[1] != "mobilelinkusa.com"){
                //             $('.message').addClass('alert-warning');
				// 			$('.message').removeClass('alert-success');
				// 			$('.message').slideDown(2500).html('Company email only allowed');
				// 		}
				// 	   else{
				// 		$.ajax({
				// 		type:'post',
				// 		data:{"email" : profile.getEmail() , "id" : profile.getId() ,"photo" : profile.getImageUrl(),"name" : profile.getName()},
				// 		url:'<?php echo base_url('user/login'); ?>',
				// 		dataType:'json',
				// 		success:function(data){
				// 		if(data == true ){
				// 		$('.message').removeClass('alert-warning');
				// 		$('.message').addClass('alert-success');
				// 		$('.message').slideDown(2500).html("Login Success");
				// 		setTimeout(function(){location.href="<?php echo base_url('user'); ?>"} , 2500);    
				// 		}
				// 		},
				// 		error:function(data){console.log(data.responseText)}
				//      });
				//  	}
				
				// });
				// });
  </script>