<?php include('models/request/new_request.php'); ?>
<?php include('models/request/edit_request.php'); ?>
<?php include('models/request/view_request.php'); ?>
<style>

.panel-title{
	padding : 10px;
	border-radius : 5px;
}
 .redborder{border:1px solid red;}
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
			var avr_approverName = document.getElementById('avr_approverName');
			avr_approverName.innerHTML = user.EMP_NAME;
			}
		},
		error:function(data){console.log(data.responseText);}
		});  
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
return new Date(mdy[2], mdy[0], mdy[1]);
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

	var joiningYear = new Date( parseDate(incr_date( "<?php echo $this->session->userdata('doj') ?>"))).getFullYear();
	var joiningMonth = new Date( parseDate(incr_date( "<?php echo $this->session->userdata('doj') ?>"))).getMonth()+1;
	var joiningDate = new Date( parseDate(incr_date( "<?php echo $this->session->userdata('doj') ?>"))).getDate();
	var currentYear = new Date().getFullYear();
	var currentMonth = new Date().getMonth()+1;
	var currentDate = new Date().getDate();
	var currentStatusMonth = monthDiff(joiningYear,currentYear,joiningMonth,currentMonth,joiningDate,currentDate);
	var aar_rAnnuals = "<?php echo $this->session->userdata('remaining_annuals') ?>";
	var aar_rSicks = "<?php echo $this->session->userdata('remaining_sicks') ?>";
	var aar_empId = "<?php echo $this->session->userdata('id') ?>";
	if(currentStatusMonth >= 12 ){
			$.ajax({
			type: 'POST',
			data: {'employeeId' : aar_empId},
			url: '<?php echo base_url('user/getALApprovedDays');?>',	
			dataType: 'json',
			success: function (data){
				var loader = document.getElementById('loader-ajax2');
				loader.style.display = "none";
				var totalAnnuals = 0;
				if(currentStatusMonth >= 12 ){
					var exceeded =  Math.floor(currentStatusMonth / 12) ;
					totalAnnuals = (exceeded > 0) ? 21 * exceeded : 21;
				} 
				var approvedDays = (parseInt(aar_rAnnuals) > 0)  ? parseInt(aar_rAnnuals) : 0;
				if(data){
					for(var i=0 ; i<data.length ; i++){
					approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
					}
				}
				console.log(approvedDays)
				var calAnnuals = (totalAnnuals) ? totalAnnuals - approvedDays : totalAnnuals ;
				var annualTotal = document.getElementById('aar_LeaveTotal');
				var annualRemaining = document.getElementById('aar_LeaveRemaining');
				annualTotal.value = "Total Annuals : "+totalAnnuals;;
				annualRemaining.value = "Remaining Annuals : "+calAnnuals;
				},
			error:function(data){console.log(data.responseText);}
		});  
	} 
	if(currentStatusMonth < 12  && currentStatusMonth > 3){
		$.ajax({
			type: 'POST',
			data: {'employeeId' :aar_empId},
			url: '<?php echo base_url('user/getSLApprovedDays');?>',	
			dataType: 'json',
			success: function (data){
				var loader = document.getElementById('loader-ajax2');
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
				approvedDays = (parseInt(aar_rSicks) > 0)  ? parseInt(aar_rSicks) : 0;
				}
				if(data){
					for(var i=0 ; i<data.length ; i++){
					approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
					}
				}
				var calSick = (totalSicks) ? totalSicks - approvedDays : totalSicks ;
				var sickTotal = document.getElementById('aar_LeaveTotal');
				var sickRemaining = document.getElementById('aar_LeaveRemaining');
				sickTotal.value = "Total Sicks : "+totalSick;
				sickRemaining.value ="Remaining Sicks : "+calSick;
				},
			error:function(data){console.log(data.responseText);}
			});  
	} 

function viewRequest(id){  
	 var loader3 = document.getElementById('loader-ajax3');
	 loader3.style.display = "block";
	
 $.ajax({
	type: 'POST',
	data: {'r_id' : id},
	url: '<?php echo base_url('admin/getUserRequest');?>',	
	dataType: 'json',
	success: function (data){
		if (data.status === 'get'){
			 var loader3 = document.getElementById('loader-ajax3');
	             loader3.style.display = "none";
			    var user = data.object[0];	
				var avr_empBatchId = document.getElementById('avr_empBatchId');
				var avr_empName = document.getElementById('avr_empName');
				var avr_empDepartment = document.getElementById('avr_empDepartment');
				var avr_empDesignation = document.getElementById('avr_empDesignation');
				var avr_startDate = document.getElementById('avr_startDate');
				var avr_endDate = document.getElementById('avr_endDate');
				var avr_leaveType = document.getElementById('avr_leaveType');
				var avr_totalDays = document.getElementById('avr_totalDays');
				var avr_rComment = document.getElementById('avr_requesterComment');
				var avr_leaveStatus = document.getElementById('avr_leaveStatus');
				var avr_approverName = document.getElementById('avr_approverName');
				var avr_approverComment = document.getElementById('avr_approverComment');
				avr_empBatchId.innerHTML = user.EMP_BADGE_ID;
				avr_empName.innerHTML = user.EMP_NAME;
				avr_empDepartment.innerHTML = user.DEPT_NAME;
				avr_empDesignation.innerHTML = user.DESG_NAME;
				avr_startDate.innerHTML = incr_date(user.LREQ_START);
				avr_endDate.innerHTML = incr_date(user.LREQ_END);


				avr_leaveType.innerHTML = user.LTYPE_TYPE;
				avr_totalDays.innerHTML = 1+daydiff(parseDate(incr_date(user.LREQ_START)),parseDate(incr_date(user.LREQ_END)));
				avr_rComment.innerHTML = user.LREQ_REQ_COMMENTS;
				avr_leaveStatus.innerHTML = user.LS_STATUS;
				avr_approverName.innerHTML = (user.LREQ_APP_ID) ? getApproverName(user.LREQ_APP_ID): "Not Available";
				avr_approverComment.innerHTML = (user.LREQ_APP_COMMENTS) ? user.LREQ_APP_COMMENTS: "Not Available";
			}
		},
		error:function(data){console.log(data.responseText);}
		});  
	
}
function editRequest(id,emp_id,lStatus){  
	
	 var loader = document.getElementById('loader-ajax');
	 loader.style.display = "block";
    var sesstionId = "<?php echo $this->session->userdata('id'); ?>";
	// if(emp_id != sesstionId){
	// 	jQuery(function(){
	// 		$("#aer_startDate").prop('disabled', true);
	// 		$("#aer_endDate").prop('disabled', true);
	// 		$(".aer_LType").prop('disabled', true);
	// 		$("#aer_rComment").prop('disabled', true);
	// 		$("#aer_approverComment").prop('disabled', true);
	// 	})
	// }
	// if( emp_id == sesstionId){
	// 		$("#aer_startDate").prop('disabled', false);
	// 		$("#aer_endDate").prop('disabled', false);
	// 		$(".aer_LType").prop('disabled', false);
	// 		$("#aer_rComment").prop('disabled', false);
	// 		$("#aer_approverComment").prop('disabled', false);
	// }
	// if( emp_id == sesstionId && lStatus != '1'){
	// 		$("#aer_startDate").prop('disabled', true);
	// 		$("#aer_endDate").prop('disabled', true);
	// 		$(".aer_LType").prop('disabled', true);
	// 		$("#aer_rComment").prop('disabled', true);
	// 		$("#aer_approverComment").prop('disabled', true);
	// }



    if(emp_id == sesstionId && lStatus == '1' ){
       var actionApprover = document.getElementById('actionApprover');
	   var commentApprover = document.getElementById('commentApprover');
	   actionApprover.style.display = "none";
	   commentApprover.style.display = "none";

	}
	else{
	   var actionApprover = document.getElementById('actionApprover');
	   var commentApprover = document.getElementById('commentApprover');
	   actionApprover.style.display = "block";
	   commentApprover.style.display = "block";
	}
	 $.ajax({
				type: 'POST',
				data: {'r_id' : id},
				url: '<?php echo base_url('manager/getUserRequest');?>',	
				dataType: 'json',
				success: function (data){
				if (data.status === 'get'){
					var sesstion2Id = "<?php echo $this->session->userdata('id'); ?>";
					if(data.object[0].EMP_ID == sesstion2Id && data.object[0].LREQ_STATUS_ID == 2){
                       console.log(true);
					   var approverActionNoT = document.getElementById('aer_approverAction');
				       var approverCommentNoT = document.getElementById('aer_approverComment');

				          approverActionNoT.style.display = "block";
						  approverCommentNoT.style.display = "block";
						 //  	$("#aer_startDate").prop('disabled', true);
							// $("#aer_endDate").prop('disabled', true);
							// $(".aer_LType").prop('disabled', true);
							// $("#aer_rComment").prop('disabled', true);

				 	}
				 var manager_batchId = '<?php echo $this->session->userdata('batchId') ?>';
			     var user = data.object[0];
				var aer_rAnnuals = document.getElementById('aer_rAnnuals');
				var aer_rSicks = document.getElementById('aer_rSicks');
				var aer_annualType = document.getElementById('aer_annualType');
				var aer_sickType = document.getElementById('aer_sickType');
				var aer_unpaidType = document.getElementById('aer_unpaidType');
				var aer_doj = document.getElementById('aer_doj');
				var aer_r_id = document.getElementById('aer_r_id');
				var aer_empId = document.getElementById('aer_empId');
			 	var aer_empBatchId = document.getElementById('aer_empBatchId');
				var aer_department = document.getElementById('aer_department');
				var aer_designation = document.getElementById('aer_designation');
				var aer_empName = document.getElementById('aer_empName');
				var aer_startDate = document.getElementById('aer_startDate');
				var aer_endDate = document.getElementById('aer_endDate');
				var aer_totalDays = document.getElementById('aer_totalDays');
				var aer_leaveType = document.getElementById('aer_leaveType');
				var aer_rComment = document.getElementById('aer_rComment');
				var aer_leaveStatus = document.getElementById('aer_leaveStatus');
				var aer_approverAction = document.getElementById('aer_approverAction');
				var aer_approverComment = document.getElementById('aer_approverComment');
				aer_rAnnuals.value = user.EMP_REMAINING_ANNUAL;
				aer_rSicks.value = user.EMP_REMAINING_SICK;
				aer_doj.value = user.EMP_DOJ;
				aer_empId.value = user.EMP_ID;
				aer_department.value = user.EMP_DEPT_ID;
				aer_designation.value = user.EMP_DESG_ID;
				aer_empBatchId.value = user.EMP_BADGE_ID;
				aer_empName.value = user.EMP_NAME;
				aer_r_id.value = id;
				aer_startDate.value = incr_date(user.LREQ_START);
				aer_endDate.value = incr_date(user.LREQ_END);

				aer_totalDays.value = 1+daydiff(parseDate(incr_date(user.LREQ_START)),parseDate(incr_date(user.LREQ_END)));
				aer_rComment.value = user.LREQ_REQ_COMMENTS;
				aer_approverAction.value = user.LREQ_STATUS_ID;
				aer_approverComment.innerHTML = (user.LREQ_APP_COMMENTS) ? user.LREQ_APP_COMMENTS: "Not Available";
				aer_annualType = 1;
				aer_sickType = 2;
				aer_unpaidType = 3;
				aer_leaveType.value = user.LTYPE_ID;
					jQuery(function(){
						function RadionButtonSelectedValueSet(cls, SelectdValue) {
							$('.'+cls).each(function() {
									if (this.value == SelectdValue) {
										$('input[class="' + cls+ '"][value="' + SelectdValue + '"]').prop('checked', true);
									}
									
								});
						}
						RadionButtonSelectedValueSet('aer_LType', aer_leaveType.value);
						
					})

				var aer_doj = document.getElementById('aer_doj');
				var joiningYear = new Date( parseDate(incr_date( aer_doj.value))).getFullYear();
				var joiningMonth = new Date( parseDate(incr_date( aer_doj.value))).getMonth()+1;
				var joiningDate = new Date( parseDate(incr_date( aer_doj.value))).getDate();
				var currentYear = new Date().getFullYear();
				var currentMonth = new Date().getMonth()+1;
				var currentDate = new Date().getDate();

				var currentStatusMonth = monthDiff(joiningYear,currentYear,joiningMonth,currentMonth,joiningDate,currentDate);
				var aer_rAnnuals = document.getElementById('aer_rAnnuals');
				var aer_rSicks = document.getElementById('aer_rSicks');
				var aer_empId = document.getElementById('aer_empId');
				if(currentStatusMonth >= 12 ){
						$.ajax({
						type: 'POST',
						data: {'employeeId' : aer_empId.value},
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
							var approvedDays = (parseInt(aer_rAnnuals.value) > 0)  ? parseInt(aer_rAnnuals.value) : 0;
							if(data){
								for(var i=0 ; i<data.length ; i++){
								approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
								}
							}
							var totalAnnuals = (totalAnnuals) ?  totalAnnuals : 0;
							var calAnnuals = (totalAnnuals) ? totalAnnuals - approvedDays : totalAnnuals ;
							var annualTotal = document.getElementById('aer_LeaveTotal');
							var annualRemaining = document.getElementById('aer_LeaveRemaining');
							annualTotal.value = "Total Annuals : "+totalAnnuals;;
							annualRemaining.value = "Remaining Annuals : "+calAnnuals;
							console.log(totalAnnuals)
							console.log(calAnnuals)
							},
						error:function(data){console.log(data.responseText);}
					});  
				} 
				if(currentStatusMonth < 12  && currentStatusMonth > 3){
					$.ajax({
						type: 'POST',
						data: {'employeeId' :aer_empId.value},
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
							approvedDays = (parseInt(aer_rSicks.value) > 0)  ? parseInt(aer_rSicks.value) : 0;
							}
							if(data){
								for(var i=0 ; i<data.length ; i++){
								approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
								}
							}
							var totalSick = (totalSicks) ?  totalSicks : 0;
							var calSick = (totalSicks) ? totalSicks - approvedDays : totalSicks ;
							var sickTotal = document.getElementById('aer_LeaveTotal');
							var sickRemaining = document.getElementById('aer_LeaveRemaining');
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
		<h1 class="panel-title bg-teal">Self Requests</h1>
			<br />
		<div class="text-right form-inline">
			<!-- <form class="form-group" id="importRequests" method="post" action="<?php echo base_url('admin/requestFileProcess'); ?>" name="uploadRequestsFile" enctype="multipart/form-data" onSubmit="if(!requestFile) return false;">
						<div class="form-group">
							<input type="file" name="requestFile" id="requestFile" accept='csv/*' />
							<code>Note: only CSV format accepted here.</code>
						</div>

                        <div class="form-group">
                            <div class="col-md-4">
				                  <button type="submit"  name="ImportRequests"  class="btn bg-teal">Import to Portal<i class="icon-arrow-right14 position-right"></i></button>  
                            </div>
                        </div>

			</form>	 -->

			<form class="form-group">
				  <button type="button" data-toggle="modal" data-target="#modal_theme_bg_custom_AddRequest" class="btn bg-teal">Add Request<i class="icon-arrow-right14 position-right"></i></button>   
			</form>	
		</div>
		  <div class="panel-body">
			<table class="table datatable-responsive table-bordered table-hover" id="table">
			<thead>
				<tr class="bg-teal-400" style="white-space : nowrap;">
				    <th>Employee Id</th>
					<th>Employee Name</th>
					<th>Start Date</th>
					<th>End Date</th>
					<!--<th>Total Days</th>-->
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
						   if($request['LTYPE_TYPE'] == 'Annual' ){
                                    
                              if($request['LS_STATUS'] == 'Applied' && $request['EMP_ID'] == $this->session->userdata('id')){
                                ?>
							    	<tr style="white-space : nowrap;">
										<td> <?php echo $request['EMP_BADGE_ID']?> </td>
										<td> <?php echo $request['EMP_NAME']?> </td>
										<td> <?php echo $request['LREQ_START']?> </td>
										<td> <?php echo $request['LREQ_END']?> </td>
										<td><span class="label label-info"><?php echo $request['LTYPE_TYPE']?></span></td>
										<td><span class="label label-primary"><?php echo $request['LS_STATUS']?></span></td>
										<td >

										<?php if($request['EMP_ID'] != $this->session->userdata('id')){ ?>
                                            	<span><!--<input type="hidden" id="editRequstId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick="editRequest('<?php echo $request['LREQ_ID'];?>','<?php echo $request['LREQ_EMP_ID'];?>')"></i>&nbsp;</span>&nbsp;
                                            <?php };?>

										<span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
							  else if($request['LS_STATUS'] == 'Approved' && $request['EMP_ID'] == $this->session->userdata('id') || $request['LS_STATUS'] == 'Done' && $request['EMP_ID'] == $this->session->userdata('id')){
                                    ?>
									<tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-info"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-success"><?php echo $request['LS_STATUS']?></span></td>
											<td >
											<?php if($request['EMP_ID'] != $this->session->userdata('id')){ ?>
                                            	<span><!--<input type="hidden" id="editRequstId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick="editRequest('<?php echo $request['LREQ_ID'];?>','<?php echo $request['LREQ_EMP_ID'];?>')"></i>&nbsp;</span>&nbsp;
                                            <?php };?>

											<span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
							 else if($request['LS_STATUS'] == 'Declined' && $request['EMP_ID'] == $this->session->userdata('id')) {
                                   ?>
								   <tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-info"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-danger"><?php echo $request['LS_STATUS']?></span></td>
											<td ><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
						   }
						   else if($request['LTYPE_TYPE'] == 'Sick' ){
                                    
                              if($request['LS_STATUS'] == 'Applied' && $request['EMP_ID'] == $this->session->userdata('id')){
                                ?>
								<tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-primary"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-primary"><?php echo $request['LS_STATUS']?></span></td>
											<td >

											<?php if($request['EMP_ID'] != $this->session->userdata('id')){ ?>
                                            	<span><!--<input type="hidden" id="editRequstId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick="editRequest('<?php echo $request['LREQ_ID'];?>','<?php echo $request['LREQ_EMP_ID'];?>')"></i>&nbsp;</span>&nbsp;
                                            <?php };?>

											<span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
							  else if($request['LS_STATUS'] == 'Approved' && $request['EMP_ID'] == $this->session->userdata('id') ||  $request['LS_STATUS'] == 'Done' && $request['EMP_ID'] == $this->session->userdata('id') ){
                             ?>
							<tr style="white-space : nowrap;">
									<td> <?php echo $request['EMP_BADGE_ID']?> </td>
									<td> <?php echo $request['EMP_NAME']?> </td>
									<td> <?php echo $request['LREQ_START']?> </td>
									<td> <?php echo $request['LREQ_END']?> </td>
									<td><span class="label label-primary"><?php echo $request['LTYPE_TYPE']?></span></td>
									<td><span class="label label-success"><?php echo $request['LS_STATUS']?></span></td>
									<td >

									<?php if($request['EMP_ID'] != $this->session->userdata('id')){ ?>
                                            	<span><!--<input type="hidden" id="editRequstId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick="editRequest('<?php echo $request['LREQ_ID'];?>','<?php echo $request['LREQ_EMP_ID'];?>')"></i>&nbsp;</span>&nbsp;
                                            <?php };?>

									<span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
							</tr>
							<?php
							  }
							 else if($request['LS_STATUS'] == 'Declined' && $request['EMP_ID'] == $this->session->userdata('id') ) {
                                   ?>
								   <tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-primary"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-danger"><?php echo $request['LS_STATUS']?></span></td>
											<td ><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
						   }
						   else{
                                    
                              if($request['LS_STATUS'] == 'Applied' && $request['EMP_ID'] == $this->session->userdata('id') ){
                                ?>
								<tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-warning"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-primary"><?php echo $request['LS_STATUS']?></span></td>
											<td >

											<?php if($request['EMP_ID'] != $this->session->userdata('id')){ ?>
                                            	<span><!--<input type="hidden" id="editRequstId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick="editRequest('<?php echo $request['LREQ_ID'];?>','<?php echo $request['LREQ_EMP_ID'];?>')"></i>&nbsp;</span>&nbsp;
                                            <?php };?>

											<span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
							  else if($request['LS_STATUS'] == 'Approved' && $request['EMP_ID'] == $this->session->userdata('id')|| $request['LS_STATUS'] == 'Done' && $request['EMP_ID'] == $this->session->userdata('id')){
                                    ?>
									<tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-warning"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-success"><?php echo $request['LS_STATUS']?></span></td>
											<td >
											<?php if($request['EMP_ID'] != $this->session->userdata('id')){ ?>
                                            	<span><!--<input type="hidden" id="editRequstId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick="editRequest('<?php echo $request['LREQ_ID'];?>','<?php echo $request['LREQ_EMP_ID'];?>')"></i>&nbsp;</span>&nbsp;
                                            <?php };?>

											<span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
									</tr>
									<?php
							  }
							  else if($request['LS_STATUS'] == 'Declined' && $request['EMP_ID'] == $this->session->userdata('id') ) {
                                   ?>
								   <tr style="white-space : nowrap;">
											<td> <?php echo $request['EMP_BADGE_ID']?> </td>
											<td> <?php echo $request['EMP_NAME']?> </td>
											<td> <?php echo $request['LREQ_START']?> </td>
											<td> <?php echo $request['LREQ_END']?> </td>
											<td><span class="label label-warning"><?php echo $request['LTYPE_TYPE']?></span></td>
											<td><span class="label label-danger"><?php echo $request['LS_STATUS']?></span></td>
											<td ><span>&nbsp;<i class="icon-eye2" data-toggle="modal" data-target="#modal_theme_bg_custom_ViewRequest" onclick='viewRequest(<?php echo $request['LREQ_ID'];?>)'></i></span></td>
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
