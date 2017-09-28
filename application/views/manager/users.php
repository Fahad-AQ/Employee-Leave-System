<?php include('models/user/add_user.php'); ?>
<?php include('models/user/edit_user.php'); ?>
<?php include('models/user/view_user.php'); ?>
<style>

.panel-title{
	padding : 10px;
	border-radius : 5px;
}

</style>
<script>

function daydiff(firstDate, secondDate) {
	return (secondDate-firstDate)/(1000*60*60*24)
}
	

function monthDiff(joiningYear, currentYear,joiningMonth,currentMonth,joiningDate,currentDate) {
		var months;
		months = (currentYear - joiningYear) * 12;
		months -= joiningMonth;
		months += currentMonth;
		months -= Math.ceil((joiningDate - currentDate) *12 / 365);
		return months <= 0 ? 0 : months;
		
}

function parseDate(str) {
var mdy = str.split('/');
return new Date(mdy[2], mdy[0], mdy[1]);
}

	
function incr_date(date_str){
  var parts = date_str.split("-");
  var dt = new Date(
    parseInt(parts[0], 10),      // year
    parseInt(parts[1], 10) - 1,  // month (starts with 0)
    parseInt(parts[2], 10)       // date
  );
  dt.setDate(dt.getDate());
  parts[2] = "" + dt.getFullYear();
  parts[0] = "" + (dt.getMonth() + 1);
  if (parts[0].length < 2) {
    parts[0] = "0" + parts[0];
  }
  parts[1] = "" + dt.getDate();
  if (parts[1].length < 2) {
    parts[1] = "0" + parts[1];
  }
  return parts.join("/");
}	


function viewUser(id){  
	 var loader3 = document.getElementById('loader3');
	 loader3.style.display = "block";
	
 $.ajax({
	type: 'POST',
	data: {'employeeId' : id},
	url: '<?php echo base_url('admin/getUserDetails');?>',	
	dataType: 'json',
	success: function (data){
		if (data.status === 'get'){
			        var user = data.object[0];	
			        var vu_empPhoto = document.getElementById('vu_empPhoto');
					var vu_empBatchId = document.getElementById('vu_empBatchId');
					var vu_empName = document.getElementById('vu_empName');
					var vu_empFname = document.getElementById('vu_empFname');
					var vu_empCnic = document.getElementById('vu_empCnic');
					var vu_empContact = document.getElementById('vu_empContact');
					var vu_empEmail = document.getElementById('vu_empEmail');
					var vu_dob = document.getElementById('vu_dob');
					var vu_doj = document.getElementById('vu_doj');
					var vu_address = document.getElementById('vu_address');
					var vu_department = document.getElementById('vu_department');
					var vu_designation = document.getElementById('vu_designation');
					var vu_role = document.getElementById('vu_role');
					var vu_status = document.getElementById('vu_status');
					vu_empPhoto.src = (user.EMP_PHOTO) ?  user.EMP_PHOTO : "https://www.cuba-platform.com/support/public/avatars/default-avatar.svg";
					vu_empBatchId.innerHTML = user.EMP_BADGE_ID;
					vu_empName.innerHTML = user.EMP_NAME;
					vu_empFname.innerHTML = (user.EMP_FNAME) ?  user.EMP_FNAME : "Not Available";
					vu_empCnic.innerHTML = user.EMP_CNIC;
					vu_empContact.innerHTML = (user.EMP_CONTACT) ?  user.EMP_CONTACT : "Not Available";
					vu_empEmail.innerHTML = (user.EMP_EMAIL) ?  user.EMP_EMAIL : "Not Available"; 
					vu_dob.innerHTML = (user.EMP_DOB) ?  incr_date(user.EMP_DOB) : "Not Available";
					vu_doj.innerHTML = incr_date(user.EMP_DOJ);
					vu_address.innerHTML = (user.EMP_ADD) ?  user.EMP_ADD : "Not Available"; 
					vu_department.innerHTML = user.DEPT_NAME;
					vu_designation.innerHTML = user.DESG_NAME;
					vu_role.innerHTML = user.ROLE_NAME;
					vu_status.innerHTML = (user.EMP_STATUS == 1) ? "Active" : "Not Active" ;

					var joiningYear = new Date( parseDate(incr_date( user.EMP_DOJ ))).getFullYear();
					var joiningMonth = new Date( parseDate(incr_date( user.EMP_DOJ ))).getMonth()+1;
					var joiningDate = new Date( parseDate(incr_date( user.EMP_DOJ ))).getDate();
					var currentYear = new Date().getFullYear();
					var currentMonth = new Date().getMonth()+1;
					var currentDate = new Date().getDate();

					var currentStatusMonth = monthDiff(joiningYear,currentYear,joiningMonth,currentMonth,joiningDate,currentDate);

				if(currentStatusMonth >= 12 ){
						$.ajax({
						type: 'POST',
						data: {'employeeId' : user.EMP_ID},
						url: '<?php echo base_url('user/getALApprovedDays');?>',	
						dataType: 'json',
						success: function (data){
							loader3.style.display = "none";
							var totalAnnuals = 0;
							if(currentStatusMonth >= 12 ){
								var exceeded =  Math.floor(currentStatusMonth / 12) ;
								totalAnnuals = (exceeded > 0) ? 21 * exceeded : 21;
							} 
							var approvedDays = (parseInt(user.EMP_REMAINING_ANNUAL) > 0)  ? parseInt(user.EMP_REMAINING_ANNUAL) : 0;
							if(data){
								for(var i=0 ; i<data.length ; i++){
								approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
								}
							}
							var totalAnnuals = (totalAnnuals) ?  totalAnnuals : 0;
							var calAnnuals = (totalAnnuals) ? totalAnnuals - approvedDays : totalAnnuals ;
							var vu_LeaveTotal = document.getElementById('vu_LeaveTotal');
							var vu_LeaveRemaining = document.getElementById('vu_LeaveRemaining');
							vu_LeaveTotal.innerHTML = "Total Annuals : "+totalAnnuals;;
							vu_LeaveRemaining.innerHTML = "Remaining Annuals : "+calAnnuals;
							},
						error:function(data){console.log(data.responseText);}
					});  
				} 
				if(currentStatusMonth < 12  && currentStatusMonth > 3){
					$.ajax({
						type: 'POST',
						data: {'employeeId' :user.EMP_ID},
						url: '<?php echo base_url('user/getSLApprovedDays');?>',	
						dataType: 'json',
						success: function (data){
							loader3.style.display = "none";
							var totalSicks = 0;
							var approvedDays = 0;
							console.log(approvedDays)
							if(currentStatusMonth < 3){
							totalSicks = 0
							approvedDays = 0;
							}
							if(currentStatusMonth >= 3){
							totalSicks = 6
							approvedDays = (parseInt(user.EMP_REMAINING_SICK) > 0)  ? parseInt(user.EMP_REMAINING_SICK) : 0;
							}
							if(data){
								for(var i=0 ; i<data.length ; i++){
								approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
								}
							}
							var totalSick = (totalSicks) ?  totalSicks : 0;
							var calSick = (totalSicks) ? totalSicks - approvedDays : totalSicks ;
							var vu_LeaveTotal = document.getElementById('vu_LeaveTotal');
							var vu_LeaveRemaining = document.getElementById('vu_LeaveRemaining');
							vu_LeaveTotal.innerHTML = "Total Sicks : "+totalSicks;
							vu_LeaveRemaining.innerHTML ="Remaining Sicks : "+calSick;
							},
						error:function(data){console.log(data.responseText);}
						});  
				} 


			}
		},
		error:function(data){console.log(data.responseText);}
		});  
	
}
  
function editUser(id){  
	 var loader = document.getElementById('loader2');
	 loader.style.display = "block";
 $.ajax({
	type: 'POST',
	data: {'employeeId' : id},
	url: '<?php echo base_url('admin/getUserDetails');?>',	
	dataType: 'json',
	success: function (data){
		if (data.status === 'get'){
			var loader = document.getElementById('loader2');
	        loader.style.display = "none";
			var user = data.object[0];
			var eu_empId = document.getElementById('eu_empId');									 
			var eu_empBatchId = document.getElementById('eu_empBatchId');
			var eu_empName = document.getElementById('eu_empName');
			var eu_empFname = document.getElementById('eu_empFname');
			var eu_empCnic = document.getElementById('eu_empCnic');
			var eu_empContact = document.getElementById('eu_empContact');
			var eu_empEmail = document.getElementById('eu_empEmail');
			var eu_dob = document.getElementById('eu_dob');
			var eu_doj = document.getElementById('eu_doj');
			var eu_address = document.getElementById('eu_address');
			var eu_department = document.getElementById('eu_department');
			var eu_designation = document.getElementById('eu_designation');
			var eu_role = document.getElementById('eu_role');
			var eu_status = document.getElementById('eu_status');
			eu_empId.value = user.EMP_ID;
			eu_empBatchId.value = user.EMP_BADGE_ID;
			eu_empName.value = user.EMP_NAME;
			eu_empFname.value = user.EMP_FNAME;
			eu_empCnic.value = user.EMP_CNIC;
			eu_empContact.value = user.EMP_CONTACT;
			eu_empEmail.value = user.EMP_EMAIL;
			eu_dob.value = incr_date(user.EMP_DOB);
			eu_doj.value = incr_date(user.EMP_DOJ);
			eu_address.value = user.EMP_ADD;
			eu_department.value = user.DEPT_ID;
			eu_designation.value = user.DESG_ID;
			eu_role.value = user.ROLE_ID;
			eu_status.value = user.EMP_STATUS;
			}
		},
		error:function(data){console.log(data.responseText);}
		});  	
}
    
</script>

<div class="content" >
	<!-- Form horizontal -->
	<div class="panel panel-flat ">
		<div class="panel-heading ">
		<h1 class="panel-title bg-teal">Users</h1>
		<br />
		<div class="text-right form-inline">
			<!-- <form class="form-group" id="importUsers" method="post" action="<?php echo base_url('admin/userFileProcess'); ?>" name="uploadUsersFile" enctype="multipart/form-data" onSubmit="if(!file) return false;">
						<div class="form-group">
							<input type="file" name="file" id="file" accept='csv/*' />
							<code>Note: only CSV format accepted here.</code>
						</div>

                        <div class="form-group">
                            <div class="col-md-4">
				                  <button type="submit"  name="ImportUsers"  class="btn bg-teal">Import to Portal<i class="icon-arrow-right14 position-right"></i></button>  
                            </div>
                        </div>

			</form>	 -->

			<form  class="form-group" action="<?php echo base_url('admin/exportUsers') ?>"  method="post" id="exportUsers"  enctype="multipart/form-data">
					<button type="submit"  name="Export"  class="btn bg-teal">Export to Excel<i class="icon-arrow-right14 position-right"></i></button>  
			</form>	

			<form class="form-group">
				  <button type="button" data-toggle="modal" data-target="#modal_theme_bg_custom_AddUser" class="btn bg-teal">Add User<i class="icon-arrow-right14 position-right"></i></button>   
			</form>	
		</div>
		<br />
	    <div class="panel-body">
			<table class="table datatable-responsive table-bordered table-hover" id="user_table">
			
			<thead>
				<tr class="bg-teal-400" >
				    <th>Employee Id</th>
					<th>Employee Name</th>
					<th>Father Name</th>
					<th>CNIC</th>
					<th>Role</th>
					<th>Department</th>
					<th>Designation</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				 if($allUsers == false ){
                    echo null;
				 }
				 else{
						foreach ($allUsers as $user){
							if(	$user['EMP_STATUS']  == '1'){
						?>
								<tr>
									<td> <?php echo $user['EMP_BADGE_ID']?> </td>
									<td> <?php echo $user['EMP_NAME']?> </td>
									<td> <?php if($user['EMP_FNAME']) { echo $user['EMP_FNAME']; }else{ echo "Not Available"; }?></td>
									<td> <?php echo $user['EMP_CNIC']?> </td>
									<td><span class="label label-info"><?php echo $user['ROLE_NAME']?></span></td>
									<td> <?php echo $user['DEPT_NAME']?> </td>
									<td> <?php echo $user['DESG_NAME']?> </td>
									<td><span class="label label-success">Active</td>
									<td ><span><!--<input type="hidden" id="editUserId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditUser" onclick='editUser(<?php echo $user['EMP_ID'];?>)'></i>&nbsp;</span>&nbsp;<span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewUser" onclick='viewUser(<?php echo $user['EMP_ID'];?>)'></i></span></td>
								</tr>
						<?php 
							}
							else{
                            ?>
									<tr>
											<td> <?php echo $user['EMP_BADGE_ID']?> </td>
											<td> <?php echo $user['EMP_NAME']?> </td>
											<td><?php if($user['EMP_FNAME']) { echo $user['EMP_FNAME']; }else{ echo "Not Available"; }?>
											 </td>
											<td> <?php echo $user['EMP_CNIC']?> </td>
											<td><span class="label label-info"><?php echo $user['ROLE_NAME']?></span></td>
											<td> <?php echo $user['DEPT_NAME']?> </td>
											<td> <?php echo $user['DESG_NAME']?> </td>
											<td><span class="label label-warning">Not Active</td>
											<td ><span><!--<input type="hidden" id="editUserId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditUser" onclick='editUser(<?php echo $user['EMP_ID'];?>)'></i>&nbsp;</span>&nbsp;<span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewUser" onclick='viewUser(<?php echo $user['EMP_ID'];?>)'></i></span></td>
									</tr>
							<?php 
							}
						}
					}
				?>
			</tbody>
		</table>
		</div>
	</div>
	<!-- /form horizontal -->
</div>
</div>
