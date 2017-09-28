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
 .redborder{border:1px solid red;}
  #loader2 {
			display:    none;
			position:   fixed;
			z-index:    1000;
			top:        0;
			left:       0;
			height:     100%;
			width:      100%;
			background: rgba( 255, 255, 255, .8 ) 
						url('http://zaradevelopment.com/els/assets/images/loading_bar.gif') 
						50% 50% 
						no-repeat;
		}
</style>


<div id="modal_theme_bg_custom_EditUser" class="modal fade" style="display: none;">
<div id="loader2"></div>
	<div class="modal-dialog modal-md">

		<div class="modal-content">
						
			<div class="modal-header bg-teal">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Edit User</h5>
			</div>

            <div class="modal-body">
			 <form id="editUserForm" name="editForm" action='' method='post'>
			    <fieldset class="content-group">
						<legend class="text-bold">User form</legend>
					      <div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold" >Employee Id:</label>
									<input type="hidden" id="eu_empId" >
									<input type="text"   id="eu_empBatchId" name="empBatchId" placeholder="Enter Employee ID" pattern="([0-9]{5,6})" title="5 till 6 Number digit allowed ex: 10882" class="form-control required_editUser">

								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Name:</label>
									<input type="text" id="eu_empName" name="name"  title="1 till 30 letter name allowed ex: Sarfaraz Ahmed" placeholder="Enter Name"  class="form-control required_editUser">
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Father Name:</label>
									<input type="text" id="eu_empFname" name="fName" title="1 till 30 letter father name allowed ex: Shabbir Ahmed" placeholder="Enter Employee Father Name"  class="form-control">
								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">CNIC:</label>
									<input type="text" id="eu_empCnic"  name="cnic" title="Only 13 Number digit allowed ex: 4220152272159"    placeholder="Enter CNIC"  class="form-control required_editUser">
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Contact:</label>
									<input type="text"  id="eu_empContact"  name="contact"   placeholder="Enter Employee Contact Number"  class="form-control">
								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Email:</label>
									<input type="email" id="eu_empEmail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,3}$" title="Correct email address allowed ex: example@mobilelinkusa.com" placeholder="Enter Email"  class="form-control required_editUser">
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Date of Birth:</label>
											<div class="col-lg-14">
											<input type="date" id="eu_dob" name="dob" pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" title="Correct dates allowed ex: 09/22/1993"  placeholder="Enter Start Date"  class="dob form-control">
											</div>
									</div>
								 </div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="control-label text-bold col-lg-6">Date of Join:</label>
									<div class="col-lg-14">
										<input type="date" id="eu_doj" name="doj" pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" title="Correct dates allowed ex: 09/22/2015"  placeholder="Enter End Date"  class="doj form-control required_editUser">
									</div>
									</div>
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Address:</label>
											<div class="col-lg-14">
											  <textarea id="eu_address" name="address" rows="3" cols="3"  pattern="([a-zA-Z0-9\s+]{5,500})"   title="1 till 500 letter name allowed ex: Malir Karachi" class="form-control" placeholder="Enter Employee Address"></textarea>
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
													<select name="department" class="form-control required_editUser"  id="eu_department">
													 <option value="">Select Department</option>
														<?php 
														 foreach ($allDepartments as $department){
														?>
                                                        <option value="<?php echo $department['DEPT_ID']?>"><?php echo $department['DEPT_NAME']?></option>
														<?php 
														 }
														?>		
													</select><span id="eu_departmentAdd"  class="action" style="user-select: none;"><i  class="icon-plus2"></i></span>
												</div>
											</div>
										</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="control-label text-bold col-lg-6">Designation:</label>
										<div class="col-lg-14">
												 <div class="uploader bg-success">
													<select name="designation" class="form-control required_editUser"  id="eu_designation">
													<option value="">Select Designation</option>
														<?php 
														 foreach ($allDesignations as $designation){
														?>
                                                        <option value="<?php echo $designation['DESG_ID']?>"><?php echo $designation['DESG_NAME']?></option>
														<?php 
														 }
														?>		
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
										<div id="eu_depart_msg" class="alert alert-styled-right" style="display:none;"></div>
												<fieldset class="content-group">
													<div class="form-group">
														<label class="control-label col-lg-3">Department:</label>
														<div class="col-lg-10">
															<input type="text" id="eu_addDepartment" name="addDepartment" pattern="([a-zA-Z\s+]{2,50})" title="1 till 30 letter name allowed" class="form-control required_editUser" placeholder="Enter Employee Department">
														</div>
													</div>
												</fieldset>
												<div class="text-right">
													<button id="eu_addDepartmentBtn" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
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
										<div id="eu_desig_msg"  class="alert alert-styled-right" style="display:none;"></div>
												<fieldset class="content-group">
													<div class="form-group">
														<label class="control-label col-lg-3">Designation:</label>
														<div class="col-lg-10">
															<input type="text"  id="eu_addDesignation"  name="addDesignation"  pattern="([a-zA-Z\s+]{2,50})" title="1 till 30 letter name allowed" class="form-control required_editUser" placeholder="Enter Employee Designation">
														</div>
													</div>
												</fieldset>
												<div class="text-right">
													<button  id="eu_addDesignationBtn" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
									</div>
									
							</div>
							
							<div class="row">
										<div class="col-lg-6">
												<div class="form-group">
												<label class="control-label text-bold col-lg-12">Role:</label>
													<div class="col-lg-14">
															<select name="role" class="form-control required_editUser"  id="eu_role">
															<option value="">Select Role</option>
																<?php 
																foreach ($allRoles as $roles){
																?>
																<option value="<?php echo $roles['ROLE_ID']?>"><?php echo $roles['ROLE_NAME']?></option>
																<?php 
																}
																?>		
															</select>
														</div>
												</div>
										</div>	
										<div class="col-lg-6">
												<div class="form-group">
												<label class="control-label text-bold col-lg-12">Status:</label>
													<div class="col-lg-14">
															<select name="status" class="form-control required_editUser"  id="eu_status">
																<option value="">Select Status</option>
																<option value="1">Active</option>
																<option value="0">Not Active</option>	
															</select>
														</div>
												</div>
										</div>	
						         </div>
								 <div class="row">
										<div class="col-lg-12">
												<div class="form-group">
												<br />
												<div id="eu_editUser_msg" class="alert alert-styled-right" style="display:none;"></div>
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

  function classWithConditionForDprtandDesg(id,content){
            $(id).show();  
			$(id).addClass('alert-warning');
			$(id).removeClass('alert-success');
			$(id).slideDown(2500).html(content);
	}

 $(document).ready(function () { 

	$('#eu_editUser_msg').hide();
	$('#eu_depart_msg').hide();  
	$('#eu_desig_msg').hide();

	//date picker
	$('.dob').pickadate({ 
		format: 'mm/dd/yyyy', 
		editable : true , today: '',
        clear: '',
        close: '',
		selectYears: 99,
		show_years_full: true,
		});
	$('.doj').pickadate({ 
		format: 'mm/dd/yyyy', 
		editable : true , today: '',
        clear: '',
        close: '',
		selectYears: 99,
		show_years_full: true,
		});

     //close add depart and desig view
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


    $("#eu_addDepartmentBtn").click(function(e){
		e.preventDefault();

		if($("#eu_addDepartment").val() ==""){
 			classWithConditionForDprtandDesg('#eu_depart_msg',"Fill Required Field");
		}
		else{
			$.ajax({
			    type: 'POST',
				data: {'department' : $("#eu_addDepartment").val().toLowerCase() },
				url: '<?php echo base_url('admin/addDepart');?>',	
				dataType: 'json',
				success: function (data){
					if(data.status == 'exist' ){
                         classWithConditionForDprtandDesg('#eu_depart_msg',"Department Already Exist");
                       }
					else if (data.status === 'added'){
                        $('#eu_depart_msg').show();  
						$('#eu_depart_msg').removeClass('alert-warning');
						$('#eu_depart_msg').addClass('alert-success');
						$('#eu_depart_msg').slideDown(2500).html("Department Added");
						setTimeout(function(){$('#eu_depart_msg').hide()}, 2500)
						$("#eu_addDepartment").val("");

						var departmentObject2 = data.object[0];     
						var sel2 = document.getElementById('eu_department');
							var opt2 = document.createElement('option');
							opt2.innerHTML = departmentObject2.DEPT_NAME;
							opt2.value = departmentObject2.DEPT_ID;
							sel2.appendChild(opt2);
                         	}
					else{
                         classWithConditionForDprtandDesg('#eu_depart_msg',"Getting Some Error");
						}
					},
					error:function(data){console.log(data.responseText);}
					});  
		}
		
 
      });

	 $("#eu_addDesignationBtn").click(function(e){
		
	     e.preventDefault();


		if($("#eu_addDesignation").val() ==""){
			classWithConditionForDprtandDesg('#eu_desig_msg',"Fill Required Field");
		 }
		 else{
			$.ajax({
			    type: 'POST',
				data: {'designation' : $("#eu_addDesignation").val().toLowerCase()},
				url: '<?php echo base_url('admin/addDesg');?>',
				dataType: 'json',
					success: function (data){
					if(data.status == 'exist' ){
                       classWithConditionForDprtandDesg('#eu_desig_msg',"Designation Already Exist");	
					}
					else if (data.status === 'added'){
                        $('#eu_desig_msg').show();  
						$('#eu_desig_msg').removeClass('alert-warning');
						$('#eu_desig_msg').addClass('alert-success');
						$('#eu_desig_msg').slideDown(2500).html("Designation Added");
                        setTimeout(function(){$('#eu_desig_msg').hide()}, 2500)
					    $("#eu_addDesignation").val("");
						
						var designationObject2 = data.object[0];     
						var sel3 = document.getElementById('eu_designation');
							var opt3 = document.createElement('option');
							opt3.innerHTML = designationObject2.DESG_NAME;
							opt3.value = designationObject2.DESG_ID;
							sel3.appendChild(opt3);
					}
					
				else{
						classWithConditionForDprtandDesg('#eu_desig_msg',"Getting Some Error");
					}
				},
			error:function(data){console.log(data.responseText);}
			});
		 }
		
      });
	 
	  $( "#editUserForm" ).submit(function( event ) { 
		event.preventDefault();
		$('#eu_editUser_msg').show();  
		$('#eu_editUser_msg').addClass('alert-success');
		$('#eu_editUser_msg').slideDown(2500).html("Please Wait");
		if($( "#eu_empBatchId" ).val() && $( "#eu_empName" ).val() && $( "#eu_empCnic" ).val() && $( "#eu_empEmail" ).val() && $( "#eu_doj" ).val()  && $( "#eu_department" ).val() && $( "#eu_designation" ).val() && $( "#eu_role" ).val() && $( "#eu_status" ).val() ){
		 
		var dobDate3 = $("#eu_dob").val(); 
		var DateinISO3 = $.datepicker.parseDate('mm/dd/yy', dobDate3); 
		var DateNewFormat3 = $.datepicker.formatDate( "yy-mm-dd", new Date( DateinISO3 ) );

		var dojDate4 = $("#eu_doj").val(); 
		var DateinISO4 = $.datepicker.parseDate('mm/dd/yy', dojDate4); 
		var DateNewFormat4 = $.datepicker.formatDate( "yy-mm-dd", new Date( DateinISO4 ) );
		 
		   $.ajax({
			    type: 'POST',
				data: {'employeeId' : $("#eu_empId").val() ,'employeeBatchId' : $("#eu_empBatchId").val(),'employeeName' : $("#eu_empName").val().toLowerCase() ,'fatherName' : $("#eu_empFname").val().toLowerCase() ,'cnic' : $("#eu_empCnic").val() ,'contact' : $("#eu_empContact").val() ,'email' : $("#eu_empEmail").val().toLowerCase() 
				,'dob' : DateNewFormat3,'doj' : DateNewFormat4,'address' : $("#eu_address").val().toLowerCase() ,'department' : $("#eu_department").val().toLowerCase() ,'designation' : $("#eu_designation").val().toLowerCase() ,'role' : $("#eu_role").val().toLowerCase() , 'status' : $("#eu_status").val() },
				url: '<?php echo base_url('admin/editUser');?>',	
				dataType: 'json',
				success: function (data){
					if(data.status == 'exist' ){
                         classWithConditionForDprtandDesg('#eu_editUser_msg',"Cant Edit User Already Exist With Same Details");
                       }
					else if (data.status === 'edited'){
						
                        $('#eu_editUser_msg').show();  
						$('#eu_editUser_msg').removeClass('alert-warning');
						$('#eu_editUser_msg').addClass('alert-success');
						$('#eu_editUser_msg').slideDown(2500).html("User edited");
						setTimeout(function(){
							window.location.href = '<?php base_url('admin/users')?>'; 
						}, 800)

						// var editID = $('#editUserId').val();
                        //  if(editID != null ||  editID !=""){
						// 	var oTable = $('#user_table').FataTable();
						// 	var role = "<span class='label label-info'>"+data.object[0].ROLE_NAME+ "</span>" ;
						// 	var action1 = "<span><input type='hidden' id='editUserId' /><i class='icon-pencil' data-toggle='modal' data-target='#modal_theme_bg_custom_EditUser' onclick=editUser("+data.object[0].EMP_ID+")></i>&nbsp;</span>" ;
						// 	var action2 = "&nbsp;<span>&nbsp;<i class='icon-eye2' data-toggle='modal' data-target='#modal_theme_bg_custom_ViewUser' onclick=viewUser("+data.object[0].EMP_ID+")></i></span>" ;
						// 	oTable.fnUpdate( [
						// 		data.object[0].EMP_BADGE_ID, 
						// 		data.object[0].EMP_NAME , 
						// 		data.object[0].EMP_FNAME ,
						// 		data.object[0].EMP_CNIC , 
						// 		role,
						// 		data.object[0].DEPT_NAME ,
						// 		data.object[0].DESG_NAME,
						// 		action1+action2] , $('#editUserId').val()); // Row	
						// 		$('#editUserId').val("");
						//  }
						
                        }
					else{
                         classWithConditionForDprtandDesg('#eu_editUser_msg',"Getting Some Error or You missed something");
						}
					},
					error:function(data){console.log(data.responseText);}
					});  
		        }
				else{
					  $('.required_editUser').each(function(){
							if($(this).val() == ''){
								$(this).addClass('redborder');
							}else{
								$(this).removeClass('redborder');
							}
						});
					 classWithConditionForDprtandDesg('#eu_editUser_msg',"Fill out all field");
				}
		
		});
 });
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