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
 #au_designationView {
	 margin-top : 10px;
 }
 #au_departmentView {
	 margin-top : 10px;
 }
 .hideDepartTap {
	cursor: pointer;
 }
 .redborder{border:1px solid red;}
</style>


<div id="modal_theme_bg_custom_AddUser" class="modal fade" style="display: none;">

	<div class="modal-dialog modal-md">

		<div class="modal-content">
						
			<div class="modal-header bg-teal">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Add User</h5>
			</div>

            <div class="modal-body">
			 <form id="newUserForm" name="newForm" action='' method='post'>
			    <fieldset class="content-group">
						<legend class="text-bold">User form</legend>
					      <div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold" >Employee Id:</label>
									<input type="text" id="au_empBatchId" name="emp_id" placeholder="Enter Employee ID" pattern="([0-9]{5,6})" title="5 till 6 Number digit allowed ex: 10882" class="form-control required_addUser">
								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Name:</label>
									<input type="text" id="au_empName" name="name"  title="1 till 30 letter name allowed ex: Sarfaraz Ahmed" placeholder="Enter Name"  class="form-control required_addUser">
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Father Name:</label>
									<input type="text" id="au_empFname" name="fName"  title="1 till 30 letter father name allowed ex: Shabbir Ahmed" placeholder="Enter Employee Father Name"  class="form-control">
								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">CNIC:</label>
									<input type="text" name="cnic"   title="Only 13 Number digit allowed ex: 4220152272159"  id="au_empCnic"  placeholder="Enter CNIC"  class="form-control required_addUser">
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Contact:</label>
									<input type="text"  id="au_empContact"  name="contact"  title="Only 11 Number digit allowed ex: 03333055555"  placeholder="Enter Employee Contact Number"  class="form-control">
								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Email:</label>
									<input type="email" id="au_empEmail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,3}$" title="Correct email address allowed ex: example@mobilelinkusa.com" placeholder="Enter Email"  class="form-control required_addUser">
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Date of Birth:</label>
											<div class="col-lg-14">
											<input type="date" id="au_dob" name="dob" pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" title="Correct dates allowed ex: 09/22/1993"  placeholder="Enter Start Date"  class="dob form-control">
											</div>
									</div>
								 </div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="control-label text-bold col-lg-6">Date of Join:</label>
									<div class="col-lg-14">
										<input type="date" id="au_doj" name="doj" pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" title="Correct dates allowed ex: 09/22/2015"  placeholder="Enter End Date"  class="doj form-control required_addUser">
									</div>
									</div>
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Address:</label>
											<div class="col-lg-14">
											  <textarea id="au_address" name="address" rows="3" cols="3"  pattern="([a-zA-Z0-9\s+]{5,500})"   title="1 till 500 letter name allowed ex: Malir Karachi" class="form-control" placeholder="Enter Employee Address"></textarea>
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
													<select name="department" class="form-control required_addUser"  id="au_department">
													 <option value="">Select Department</option>
														<?php 
														 foreach ($allDepartments as $department){
														?>
                                                        <option value="<?php echo $department['DEPT_ID']?>"><?php echo $department['DEPT_NAME']?></option>
														<?php 
														 }
														?>		
													</select><span id="au_departmentAdd"  class="action" style="user-select: none;"><i  class="icon-plus2"></i></span>
												</div>
											</div>
										</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="control-label text-bold col-lg-6">Designation:</label>
										<div class="col-lg-14">
												 <div class="uploader bg-success">
													<select name="designation" class="form-control required_addUser"  id="au_designation">
													<option value="">Select Designation</option>
														<?php 
														 foreach ($allDesignations as $designation){
														?>
                                                        <option value="<?php echo $designation['DESG_ID']?>"><?php echo $designation['DESG_NAME']?></option>
														<?php 
														 }
														?>		
													</select><span id="au_designationAdd"  class="action" style="user-select: none;"><i  class="icon-plus2"></i></span>
												</div>
										</div>
									</div>
								</div>
						    </div>
							

							<div id="au_departmentView" class="panel panel-flat animated fadeIn" style="display : none">
								 <div class="panel-heading">
										<h5 class="panel-title">Add Department</h5>
										<div class="heading-elements">
											<ul class="icons-list">
												<li class="hideDepartTap">x</li>
											</ul>
										</div>
									<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

									<div class="panel-body" style="display: block;">
										<div id="au_depart_msg" class="alert alert-styled-right" style="display:none;"></div>
												<fieldset class="content-group">
													<div class="form-group">
														<label class="control-label col-lg-3">Department:</label>
														<div class="col-lg-10">
															<input type="text" id="au_addDepartment" name="addDepartment" pattern="([a-zA-Z\s+]{2,50})" title="1 till 30 letter name allowed" class="form-control required_addUser" placeholder="Enter Employee Department">
														</div>
													</div>
												</fieldset>
												<div class="text-right">
													<button id="au_addDepartmentBtn" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
									</div>
							</div>

							<div id="au_designationView" class="panel panel-flat animated fadeIn" style="display : none">
								 <div class="panel-heading">
										<h5 class="panel-title">Add Designation</h5>
										<div class="heading-elements">
											<ul class="icons-list">
												<li class="hideDepartTap">x</li>
											</ul>
										</div>
									<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

									<div class="panel-body" style="display: block;">
										<div id="au_desig_msg"  class="alert alert-styled-right" style="display:none;"></div>
												<fieldset class="content-group">
													<div class="form-group">
														<label class="control-label col-lg-3">Designation:</label>
														<div class="col-lg-10">
															<input type="text"  id="au_addDesignation"  name="addDesignation"  pattern="([a-zA-Z\s+]{2,50})" title="1 till 30 letter name allowed" class="form-control required_addUser" placeholder="Enter Employee Designation">
														</div>
													</div>
												</fieldset>
												<div class="text-right">
													<button  id="au_addDesignationBtn" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
									</div>
									
							</div>
							<div class="row">
										<div class="col-lg-6">
												<div class="form-group">
												<label class="control-label text-bold col-lg-12">Role:</label>
													<div class="col-lg-14">
															<select name="role" class="form-control required_addUser"  id="au_role">
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
															<select name="status" class="form-control required_addUser"  id="au_status">
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
												<div id="au_addUser_msg" class="alert alert-styled-right" style="display:none;"></div>
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
	 

    function classWithConditionForDprtandDesg(id,content){
            $(id).show();  
			$(id).addClass('alert-warning');
			$(id).removeClass('alert-success');
			$(id).slideDown(2500).html(content);
			setTimeout(function(){$(id).hide()}, 2500)
	}
	$('#au_addUser_msg').hide();
	$('#au_depart_msg').hide();  
	$('#au_desig_msg').hide();

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
		$('#au_departmentView').hide();
	    $('#au_designationView').hide();
	});

	$("#au_departmentAdd").click(function(){
		$('#au_designationView').hide();
		$('#au_departmentView').show();
	});

	$("#au_designationAdd").click(function(){
		$('#au_departmentView').hide();
	    $('#au_designationView').show();
	});


    $("#au_addDepartmentBtn").click(function(e){
		e.preventDefault();
		if($("#au_addDepartment").val() ==""){
 			classWithConditionForDprtandDesg('#au_depart_msg',"Fill Required Field");
		}
		else{
			$.ajax({
			    type: 'POST',
				data: {'department' : $("#au_addDepartment").val().toLowerCase() },
				url: '<?php echo base_url('admin/addDepart');?>',	
				dataType: 'json',
				success: function (data){
					if(data.status == 'exist' ){
                         classWithConditionForDprtandDesg('#au_depart_msg',"Department Already Exist");
                       }
					else if (data.status === 'added'){
                        $('#au_depart_msg').show();  
						$('#au_depart_msg').removeClass('alert-warning');
						$('#au_depart_msg').addClass('alert-success');
						$('#au_depart_msg').slideDown(2500).html("Department Added");
						setTimeout(function(){$('#au_depart_msg').hide()}, 2500)
						$("#au_addDepartment").val("");

						var departmentObject = data.object[0];     
						var sel = document.getElementById('au_department');
							var opt = document.createElement('option');
							opt.innerHTML = departmentObject.DEPT_NAME;
							opt.value = departmentObject.DEPT_ID;
							sel.appendChild(opt);
                         	}
					else{
                         classWithConditionForDprtandDesg('#au_depart_msg',"Getting Some Error");
						}
					},
					error:function(data){console.log(data.responseText);}
					});  
		}
		
 
      });

	 $("#au_addDesignationBtn").click(function(e){
		
	     e.preventDefault();


		if($("#au_addDesignation").val() ==""){
			classWithConditionForDprtandDesg('#au_desig_msg',"Fill Required Field");
		 }
		 else{
			$.ajax({
			    type: 'POST',
				data: {'designation' : $("#au_addDesignation").val().toLowerCase()},
				url: '<?php echo base_url('admin/addDesg');?>',
				dataType: 'json',
					success: function (data){
					if(data.status == 'exist' ){
                       classWithConditionForDprtandDesg('#au_desig_msg',"Designation Already Exist");	
					}
					else if (data.status === 'added'){
                        $('#au_desig_msg').show();  
						$('#au_desig_msg').removeClass('alert-warning');
						$('#au_desig_msg').addClass('alert-success');
						$('#au_desig_msg').slideDown(2500).html("Designation Added");
                        setTimeout(function(){$('#au_desig_msg').hide()}, 2500)
					    $("#au_addDesignation").val("");
						
						var designationObject = data.object[0];     
						var sel = document.getElementById('au_designation');
							var opt = document.createElement('option');
							opt.innerHTML = designationObject.DESG_NAME;
							opt.value = designationObject.DESG_ID;
							sel.appendChild(opt);
					}
					
				else{
						classWithConditionForDprtandDesg('#au_desig_msg',"Getting Some Error");
					}
				},
			error:function(data){console.log(data.responseText);}
			});
		 }
		
      });
	  $( "#newUserForm" ).submit(function( event ) { 
		event.preventDefault();
		$('#au_addUser_msg').show();  
		$('#au_addUser_msg').addClass('alert-success');
		$('#au_addUser_msg').slideDown(2500).html("Please Wait");
		if($( "#au_empBatchId" ).val() && $( "#au_empName" ).val() && $( "#au_empCnic" ).val() && $( "#au_empEmail" ).val() && $( "#au_doj" ).val() && $( "#au_department" ).val() && $( "#au_designation" ).val() && $( "#au_role" ).val() &&  $( "#au_status" ).val() ){
		 
		var dobDate = $("#au_dob").val(); 
		var DateinISO = $.datepicker.parseDate('mm/dd/yy', dobDate); 
		console.log(DateinISO);
		var DateNewFormat = $.datepicker.formatDate( "yy-mm-dd", new Date( DateinISO ) );

		var dojDate2 = $("#au_doj").val(); 
		var DateinISO2 = $.datepicker.parseDate('mm/dd/yy', dojDate2); 
		console.log(DateinISO);
		var DateNewFormat2 = $.datepicker.formatDate( "yy-mm-dd", new Date( DateinISO2 ) );
		 
		   $.ajax({
			    type: 'POST',
				data: {'employeeBatchId' : $("#au_empBatchId").val(),'employeeName' : $("#au_empName").val().toLowerCase() ,'fatherName' : $("#au_empFname").val().toLowerCase() ,'cnic' : $("#au_empCnic").val() ,'contact' : $("#au_empContact").val() ,'email' : $("#au_empEmail").val().toLowerCase() 
				,'dob' : DateNewFormat,'doj' : DateNewFormat2,'address' : $("#au_address").val().toLowerCase() ,'department' : $("#au_department").val().toLowerCase() ,'designation' : $("#au_designation").val().toLowerCase() ,'role' : $("#au_role").val().toLowerCase() , 'status' :  $( "#au_status" ).val()  },
				url: '<?php echo base_url('admin/addUser');?>',	
				dataType: 'json',
				success: function (data){
					if(data.status == 'exist' ){
                         classWithConditionForDprtandDesg('#au_addUser_msg',"User Already Exist");
                       }
					else if (data.status === 'added'){
						
                        $('#au_addUser_msg').show();  
						$('#au_addUser_msg').removeClass('alert-warning');
						$('#au_addUser_msg').addClass('alert-success');
						$('#au_addUser_msg').slideDown(2500).html("User Added");
						setTimeout(function(){$('#au_addUser_msg').hide()}, 2500)	
						$('#newUserForm')[0].reset();
						setTimeout(function(){
							window.location.href = '<?php base_url('admin/users')?>'; 
						}, 800)
						// var addededObject = data.object[0];	
						// var oTable = $('#user_table').DataTable();
						// var role = "<span class='label label-info'>"+addededObject.ROLE_NAME+ "</span>" ;
						// var action1 = "<span><input type='hidden' id='editUserId' /><i class='icon-pencil' data-toggle='modal' data-target='#modal_theme_bg_custom_EditUser' onclick=editUser("+addededObject.EMP_ID+")></i>&nbsp;</span>" ;
						// var action2 = "&nbsp;<span>&nbsp;<i class='icon-eye2' data-toggle='modal' data-target='#modal_theme_bg_custom_ViewUser' onclick=viewUser("+addededObject.EMP_ID+")></i></span>" ;
						// oTable.row.add([
						// 	addededObject.EMP_BADGE_ID, 
						// 	addededObject.EMP_NAME , 
						// 	addededObject.EMP_FNAME ,
						// 	addededObject.EMP_CNIC , 
						// 	role,
						// 	addededObject.DEPT_NAME ,
						// 	addededObject.DESG_NAME,
						// 	action1+action2] ).draw();
                       }
					else{
                         classWithConditionForDprtandDesg('#au_addUser_msg',"Getting Some Error or You missed something");
						}
					},
					error:function(data){console.log(data.responseText);}
					});  
		        }
				else{
					  $('.required_addUser').each(function(){
							if($(this).val() == ''){
								$(this).addClass('redborder');
							}else{
								$(this).removeClass('redborder');
							}
						});
					 classWithConditionForDprtandDesg('#au_addUser_msg',"Fill out all field");
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