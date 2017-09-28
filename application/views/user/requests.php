<?php include('models/request/new_request.php'); ?>
<?php include('models/request/edit_request.php'); ?>
<?php include('models/request/view_request.php'); ?>
<style>

.panel-title{
	padding : 10px;
	border-radius : 5px;
}
 tbody tr {
white-space : nowrap;
}
</style>

<script>


function getApproverName(id){  
 $.ajax({
	type: 'POST',
	data: {'employeeId' : id},
	url: '<?php echo base_url('user/getUserDetails');?>',	
	dataType: 'json',
	success: function (data){
		if (data.status === 'get'){
			var user = data.object[0];	
			var uvr_approverName = document.getElementById('uvr_approverName');
			uvr_approverName.innerHTML = user.EMP_NAME;
			}
		},
		error:function(data){console.log(data.responseText);}
		});  
	return 1;
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

function parseDate(str) {
var mdy = str.split('/');
return new Date(mdy[2], mdy[0]-1, mdy[1]);
}

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

function viewRequest(id){  

	 var loader3 = document.getElementById('loader-ajax3');
	 loader3.style.display = "block";
 $.ajax({
	type: 'POST',
	data: {'r_id' : id},
	url: '<?php echo base_url('user/getUserRequest');?>',	
	dataType: 'json',
	success: function (data){
		if (data.status === 'get'){
				 var loader3 = document.getElementById('loader-ajax3');
	             loader3.style.display = "none";
			    var user = data.object[0];	
				var uvr_empBatchId = document.getElementById('uvr_empBatchId');
				var uvr_empName = document.getElementById('uvr_empName');
				var uvr_startDate = document.getElementById('uvr_startDate');
				var uvr_endDate = document.getElementById('uvr_endDate');
				var uvr_leaveType = document.getElementById('uvr_leaveType');
				var uvr_totalDays = document.getElementById('uvr_totalDays');
				var uvr_rComment = document.getElementById('uvr_rComment');
				var uvr_leaveStatus = document.getElementById('uvr_leaveStatus');
				var uvr_approverName = document.getElementById('uvr_approverName');
				var uvr_approverComment = document.getElementById('uvr_approverComment');
				uvr_empBatchId.innerHTML = user.EMP_BADGE_ID;
				uvr_empName.innerHTML = user.EMP_NAME;
				uvr_startDate.innerHTML = incr_date(user.LREQ_START);
				uvr_endDate.innerHTML = incr_date(user.LREQ_END);
				uvr_leaveType.innerHTML = user.LTYPE_TYPE;
				uvr_totalDays.innerHTML = 1+daydiff(parseDate(incr_date(user.LREQ_START)),parseDate(incr_date(user.LREQ_END)));
				uvr_rComment.innerHTML = user.LREQ_REQ_COMMENTS;
				uvr_leaveStatus.innerHTML = user.LS_STATUS;
				uvr_approverName.innerHTML = (user.LREQ_APP_ID) ? getApproverName(user.LREQ_APP_ID) : "Not Available";
				uvr_approverComment.innerHTML = (user.LREQ_APP_COMMENTS) ? user.LREQ_APP_COMMENTS: "Not Available";
			}
		},
		error:function(data){console.log(data.responseText);}
		});  
	
}
  
function editRequest(id){  
 var loader = document.getElementById('loader-ajax');
	 loader.style.display = "block";
 $.ajax({
	type: 'POST',
	data: {'r_id' : id},
	url: '<?php echo base_url('user/getUserRequest');?>',	
	dataType: 'json',
	success: function (data){
		if (data.status === 'get'){
			    var user = data.object[0];
				var uer_annualType = document.getElementById('uer_annualType');
				var uer_sickType = document.getElementById('uer_sickType');
				var uer_unpaidType = document.getElementById('uer_unpaidType');
				var uer_r_id = document.getElementById('uer_r_id');
			 	var uer_empBatchId = document.getElementById('uer_empBatchId');
				var uer_empName = document.getElementById('uer_empName');
				var uer_startDate = document.getElementById('uer_startDate');
				var uer_endDate = document.getElementById('uer_endDate');
				var uer_leaveType = document.getElementById('uer_leaveType');
				var uer_totalDays = document.getElementById('uer_totalDays');
				var uer_rComment = document.getElementById('uer_rComment');
				var uer_leaveStatus = document.getElementById('uer_leaveStatus');
				uer_empBatchId.value = user.EMP_BADGE_ID;
				uer_empName.value = user.EMP_NAME;
				uer_startDate.value = incr_date(user.LREQ_START);
				uer_endDate.value = incr_date(user.LREQ_END);
				uer_totalDays.value = 1+daydiff(parseDate(incr_date(user.LREQ_START)),parseDate(incr_date(user.LREQ_END)));
				uer_rComment.value = user.LREQ_REQ_COMMENTS;
				uer_leaveStatus.value = user.LREQ_STATUS_ID;
				uer_r_id.value = id;
				uer_annualType = 1;
				uer_sickType = 2;
				uer_unpaidType = 3;
				uer_leaveType.value =  user.LTYPE_ID;

				
				jQuery(function(){
					function RadionButtonSelectedValueSet(cls, SelectdValue) {
						$('.'+cls).each(function() {
								if (this.value == SelectdValue) {
									 $('input[class="' + cls+ '"][value="' + SelectdValue + '"]').prop('checked', true);
								}
								
							});
					}

					var getDate = new Date (uer_startDate.value).getDate();
					var getMonth = new Date (uer_startDate.value).getMonth();
					var getFullYear = new Date (uer_startDate.value).getFullYear();
					var $input_from = $('#uer_startDate').pickadate();
					var picker_from = $input_from.pickadate('picker');
					picker_from.set('select', [getFullYear,getMonth,getDate]);

					RadionButtonSelectedValueSet('uer_LType', uer_leaveType.value);

				    
				
				})

				var joiningYear = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getFullYear();
				var joiningMonth = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getMonth()+1;
				var joiningDate = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getDate();
				var currentYear = new Date().getFullYear();
				var currentMonth = new Date().getMonth()+1;
				var currentDate = new Date().getDate();

				var currentStatusMonth = monthDiff(joiningYear,currentYear,joiningMonth,currentMonth,joiningDate,currentDate);
			
			
			
			
			
				var uer_rAnnuals = "<?php echo $this->session->userdata('remaining_annuals') ?>";
				var uer_rSicks = "<?php echo $this->session->userdata('remaining_sicks') ?>";
				var uer_empId = "<?php echo $this->session->userdata('id') ?>";
				if(currentStatusMonth >= 12 ){
						$.ajax({
						type: 'POST',
						data: {'employeeId' : uer_empId},
						url: '<?php echo base_url('user/getALApprovedDays');?>',	
						dataType: 'json',
						success: function (data){
							var loader = document.getElementById('loader-ajax');
							loader.style.display = "none";
							var totalAnnuals = 0;
							if(currentStatusMonth >= 12 ){
								var exceeded =  Math.floor(currentStatusMonth / 12) ;
								totalAnnuals = (exceeded > 0) ? 21 * exceeded : 21;
							} 
							var approvedDays = (parseInt(uer_rAnnuals) > 0)  ? parseInt(uer_rAnnuals) : 0;
							if(data){
								for(var i=0 ; i<data.length ; i++){
								approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
								}
							}
							console.log(approvedDays)
							var calAnnuals = (totalAnnuals) ? totalAnnuals - approvedDays : totalAnnuals ;
							var annualTotal = document.getElementById('uer_LeaveTotal');
							var annualRemaining = document.getElementById('uer_LeaveRemaining');
							annualTotal.value = "Total Annuals : "+totalAnnuals;;
							annualRemaining.value = "Remaining Annuals : "+calAnnuals;
							},
						error:function(data){console.log(data.responseText);}
					});  
				} 
				if(currentStatusMonth < 12  && currentStatusMonth > 3){
					$.ajax({
						type: 'POST',
						data: {'employeeId' :uer_empId},
						url: '<?php echo base_url('user/getSLApprovedDays');?>',	
						dataType: 'json',
						success: function (data){
							var loader = document.getElementById('loader-ajax');
							loader.style.display = "none";
							var totalSicks = 0;
							var approvedDays = 0;
							console.log(approvedDays)
							if(currentStatusMonth < 3){
							totalSicks = 0
							approvedDays = 0;
							}
							if(currentStatusMonth >= 3){
							totalSicks = 6
							approvedDays = (parseInt(uer_rSicks) > 0)  ? parseInt(uer_rSicks) : 0;
							}
							if(data){
								for(var i=0 ; i<data.length ; i++){
								approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
								}
							}
							var calSick = (totalSicks) ? totalSicks - approvedDays : totalSicks ;
							var sickTotal = document.getElementById('uer_LeaveTotal');
							var sickRemaining = document.getElementById('uer_LeaveRemaining');
							sickTotal.value = "Total Sicks : "+totalSicks;
							sickRemaining.value ="Remaining Sicks : "+calSick;
							},
						error:function(data){console.log(data.responseText);}
						});  
				} 
			
				
			}
		},
		error:function(data){console.log(data.responseText);}
		});  	
}
    
</script>
<div class="content">
	<!-- Form horizontal -->
	<div class="panel panel-flat ">
		<div class="panel-heading ">
		<h1 class="panel-title bg-teal">Requests</h1>
		<br />
			<div class="text-right">
				<button type="button" data-toggle="modal" data-target="#modal_theme_bg_custom_AddRequest" class="btn bg-teal">Add Request<i class="icon-arrow-right14 position-right"></i></button>
			</div>
		  <div class="panel-body">
			<table class="table datatable-responsive table-bordered table-hover" id="table">
			<thead>
				<tr class="bg-teal-400" style="white-space : nowrap;">
				    <th>Employee Id</th>
					<th>Employee Name</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Leave Type</th>
					<th>Leave Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				 <?php 
				 if($allRequests == false ){
                    echo null;
				 }
				 else{
					 foreach($allRequests as $request){
						   if($request['LTYPE_TYPE'] == 'Annual' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')){
                                    
                              if($request['LS_STATUS'] == 'Applied' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')){
                                ?>
							    	<tr style="white-space : nowrap;">
										<td> <?php echo $request['EMP_BADGE_ID']?> </td>
										<td> <?php echo $request['EMP_NAME']?> </td>
										<td> <?php echo $request['LREQ_START']?> </td>
										<td> <?php echo $request['LREQ_END']?> </td>
										<td><span class="label label-info"><?php echo $request['LTYPE_TYPE']?></span></td>
										<td><span class="label label-primary"><?php echo $request['LS_STATUS']?></span></td>
										<td ><!-- <span><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick='editRequest(<?php echo $request['LREQ_ID'];?>)'></i>&nbsp;</span>&nbsp; --><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
							  else if($request['LS_STATUS'] == 'Approved' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id') || $request['LS_STATUS'] == 'Done' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')){
                                    ?>
									<tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-info"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-success"><?php echo $request['LS_STATUS']?></span></td>
											<td ><span><!--<input type="hidden" id="editRequstId" />--><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
							 else if($request['LS_STATUS'] == 'Declined' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')) {
                                   ?>
								   <tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-info"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-danger"><?php echo $request['LS_STATUS']?></span></td>
											<td ><span><!--<input type="hidden" id="editRequstId" />--><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
						   }
						   else if($request['LTYPE_TYPE'] == 'Sick' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')){
                                    
                              if($request['LS_STATUS'] == 'Applied' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')){
                                ?>
								<tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-primary"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-primary"><?php echo $request['LS_STATUS']?></span></td>
											<td ><!-- <span><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick='editRequest(<?php echo $request['LREQ_ID'];?>)'></i>&nbsp;</span>&nbsp; --><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
							  else if($request['LS_STATUS'] == 'Approved' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id') || $request['LS_STATUS'] == 'Done' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')){
                             ?>
							<tr style="white-space : nowrap;">
									<td> <?php echo $request['EMP_BADGE_ID']?> </td>
									<td> <?php echo $request['EMP_NAME']?> </td>
									<td> <?php echo $request['LREQ_START']?> </td>
									<td> <?php echo $request['LREQ_END']?> </td>
									<td><span class="label label-primary"><?php echo $request['LTYPE_TYPE']?></span></td>
									<td><span class="label label-success"><?php echo $request['LS_STATUS']?></span></td>
									<td ><span><!--<input type="hidden" id="editRequstId" />--><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
							</tr>
							<?php
							  }
							 else if($request['LS_STATUS'] == 'Declined' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')) {
                                   ?>
								   <tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-primary"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-danger"><?php echo $request['LS_STATUS']?></span></td>
											<td ><span><!--<input type="hidden" id="editRequstId" />--><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
						   }
						   else{
                                    
                              if($request['LS_STATUS'] == 'Applied' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')){
                                ?>
								<tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-warning"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-primary"><?php echo $request['LS_STATUS']?></span></td>
											<td ><!-- <span><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick='editRequest(<?php echo $request['LREQ_ID'];?>)'></i>&nbsp;</span>&nbsp; --><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
							  else if($request['LS_STATUS'] == 'Approved' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id') || $request['LS_STATUS'] == 'Done' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')){
                                    ?>
									<tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-warning"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-success"><?php echo $request['LS_STATUS']?></span></td>
											<td ><span><!--<input type="hidden" id="editRequstId" />--><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
							  else if($request['LS_STATUS'] == 'Declined' &&  $request['LREQ_EMP_ID'] == $this->session->userdata('id')) {
                                   ?>
								   <tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-warning"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-danger"><?php echo $request['LS_STATUS']?></span></td>
											<td ><span><!--<input type="hidden" id="editRequstId" />--><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
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
 <!--<script>

$(".icon-pencil").click(function(e) {
    var $tr = $(this).closest('tr');
    var rowIndex = $('#request_table').DataTable().row($tr).index();
    $("#editRequstId").val(rowIndex);
});

</script>-->