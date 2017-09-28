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
			var mvr_approverName = document.getElementById('mvr_approverName');
			mvr_approverName.innerHTML = user.EMP_NAME;
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
				var mvr_empBatchId = document.getElementById('mvr_empBatchId');
				var mvr_empName = document.getElementById('mvr_empName');
				var mvr_empDepartment = document.getElementById('mvr_empDepartment');
				var mvr_empDesignation = document.getElementById('mvr_empDesignation');
				var mvr_startDate = document.getElementById('mvr_startDate');
				var mvr_endDate = document.getElementById('mvr_endDate');
				var mvr_leaveType = document.getElementById('mvr_leaveType');
				var mvr_totalDays = document.getElementById('mvr_totalDays');
				var mvr_rComment = document.getElementById('mvr_requesterComment');
				var mvr_leaveStatus = document.getElementById('mvr_leaveStatus');
				var mvr_approverName = document.getElementById('mvr_approverName');
				var mvr_approverComment = document.getElementById('mvr_approverComment');
				mvr_empBatchId.innerHTML = user.EMP_BADGE_ID;
				mvr_empName.innerHTML = user.EMP_NAME
				mvr_empDepartment.innerHTML = user.DEPT_NAME;
				mvr_empDesignation.innerHTML = user.DESG_NAME;
				mvr_startDate.innerHTML = incr_date(user.LREQ_START);
				mvr_endDate.innerHTML = incr_date(user.LREQ_END);
				mvr_leaveType.innerHTML = user.LTYPE_TYPE;
				mvr_totalDays.innerHTML = 1+daydiff(parseDate(incr_date(user.LREQ_START)),parseDate(incr_date(user.LREQ_END)));
				mvr_rComment.innerHTML = user.LREQ_REQ_COMMENTS;
				mvr_leaveStatus.innerHTML = user.LS_STATUS;
				mvr_approverName.innerHTML = (user.LREQ_APP_ID) ? getApproverName(user.LREQ_APP_ID): "Not Available";
				mvr_approverComment.innerHTML = (user.LREQ_APP_COMMENTS) ? user.LREQ_APP_COMMENTS: "Not Available";
			}
		},
		error:function(data){console.log(data.responseText);}
		});  
	
}
function editRequest(id,requestEmpId){  
	 var loader = document.getElementById('loader-ajax');
	 loader.style.display = "block";
	 var sesstionId = "<?php echo $this->session->userdata('id'); ?>";
     var designationId = '<?php echo $this->session->userdata('designationId') ?>';
	 if(designationId == 1){

		jQuery(function(){
			$("#mer_startDate").prop('disabled', false);
			$("#mer_endDate").prop('disabled', false);
			$(".mer_LType").prop('disabled', false);
			$("#mer_rComment").prop('disabled', false);
		})

	}

	if(requestEmpId != sesstionId){
		jQuery(function(){
			$("#mer_startDate").prop('disabled', true);
			$("#mer_endDate").prop('disabled', true);
			$(".mer_LType").prop('disabled', true);
			$("#mer_rComment").prop('disabled', true);
		})
	}
	if( requestEmpId == sesstionId){
		jQuery(function(){
			$("#mer_startDate").prop('disabled', false);
			$("#mer_endDate").prop('disabled', false);
			$(".mer_LType").prop('disabled', false);
			$("#mer_rComment").prop('disabled', false);
		})
	}

	
     if(sesstionId == requestEmpId && designationId != 34){
	  var approverActionNoT = document.getElementById('approverActionNoT');
	  var approverCommentNoT = document.getElementById('approverCommentNoT');
          approverActionNoT.style.display = "none";
		  approverCommentNoT.style.display = "none";
	 }
	 else{

	 if(designationId == 34 && requestEmpId == sesstionId){

	   var approverActionNoT = document.getElementById('approverActionNoT');
       var approverCommentNoT = document.getElementById('approverCommentNoT');
          approverActionNoT.style.display = "none";
		  approverCommentNoT.style.display = "none";

	 	}
	 	else{

	 	var approverActionNoT = document.getElementById('approverActionNoT');
	    var approverCommentNoT = document.getElementById('approverCommentNoT');	
	      approverActionNoT.style.display = "block";
		  approverCommentNoT.style.display = "block";

	 	}
	  
	 }

	 $.ajax({
				type: 'POST',
				data: {'r_id' : id},
				url: '<?php echo base_url('manager/getUserRequest');?>',	
				dataType: 'json',
				success: function (data){
				if (data.status === 'get'){
					 var sesstion2Id = "<?php echo $this->session->userdata('designationId'); ?>";

					if(data.object[0].EMP_DESG_ID == sesstion2Id && data.object[0].LREQ_STATUS_ID == 2){
                       console.log(true);
					   var approverActionNoT = document.getElementById('approverActionNoT');
				       var approverCommentNoT = document.getElementById('approverCommentNoT');

				          approverActionNoT.style.display = "block";
						  approverCommentNoT.style.display = "block";
						  	$("#mer_startDate").prop('disabled', true);
							$("#mer_endDate").prop('disabled', true);
							$(".mer_LType").prop('disabled', true);
							$("#mer_rComment").prop('disabled', true);

				 	}

				var manager_batchId = '<?php echo $this->session->userdata('batchId') ?>';
			    var user = data.object[0];
			    mer_approverId
			    var mer_approverId = document.getElementById('mer_approverId');
				var mer_rAnnuals = document.getElementById('mer_rAnnuals');
				var mer_rSicks = document.getElementById('mer_rSicks');
				var mer_annualType = document.getElementById('mer_annualType');
				var mer_sickType = document.getElementById('mer_sickType');
				var mer_unpaidType = document.getElementById('mer_unpaidType');
				var mer_doj = document.getElementById('mer_doj');
				var mer_r_id = document.getElementById('mer_r_id');
				var mer_empId = document.getElementById('mer_empId');
			 	var mer_empBatchId = document.getElementById('mer_empBatchId');
				var mer_department = document.getElementById('mer_department');
				var mer_designation = document.getElementById('mer_designation');
				var mer_empName = document.getElementById('mer_empName');
				var mer_startDate = document.getElementById('mer_startDate');
				var mer_endDate = document.getElementById('mer_endDate');
				var mer_totalDays = document.getElementById('mer_totalDays');
				var mer_leaveType = document.getElementById('mer_leaveType');
				var mer_rComment = document.getElementById('mer_rComment');
				var mer_leaveStatus = document.getElementById('mer_leaveStatus');
				var mer_approverAction = document.getElementById('mer_approverAction');
				var mer_approverComment = document.getElementById('mer_approverComment');
				mer_rAnnuals.value = user.EMP_REMAINING_ANNUAL;
				mer_rSicks.value = user.EMP_REMAINING_SICK;
				mer_doj.value = user.EMP_DOJ;
				mer_empId.value = user.EMP_ID;
				mer_department.value = user.EMP_DEPT_ID;
				mer_designation.value = user.EMP_DESG_ID;
				mer_empBatchId.value = user.EMP_BADGE_ID;
				mer_empName.value = user.EMP_NAME;
				mer_r_id.value = id;
				mer_approverId.value = user.LREQ_APP_ID;
				mer_startDate.value = incr_date(user.LREQ_START);
				mer_endDate.value = incr_date(user.LREQ_END);

				mer_totalDays.value = 1+daydiff(parseDate(incr_date(user.LREQ_START)),parseDate(incr_date(user.LREQ_END)));
				mer_rComment.value = user.LREQ_REQ_COMMENTS;
				mer_approverAction.value = user.LREQ_STATUS_ID;
				mer_approverComment.innerHTML = (user.LREQ_APP_COMMENTS) ? user.LREQ_APP_COMMENTS: "Not Available";
				mer_annualType = 1;
				mer_sickType = 2;
				mer_unpaidType = 3;
				mer_leaveType.value = user.LTYPE_ID;

				
					jQuery(function(){
						function RadionButtonSelectedValueSet(cls, SelectdValue) {
							$('.'+cls).each(function() {
									if (this.value == SelectdValue) {
										$('input[class="' + cls+ '"][value="' + SelectdValue + '"]').prop('checked', true);
									}
									
								});
						}

						var getDate = new Date (mer_startDate.value).getDate();
						var getMonth = new Date (mer_startDate.value).getMonth();
						var getFullYear = new Date (mer_startDate.value).getFullYear();
						var $input_from = $('#mer_startDate').pickadate();
						var picker_from = $input_from.pickadate('picker');
						picker_from.set('select', [getFullYear,getMonth,getDate]);

						RadionButtonSelectedValueSet('mer_LType', mer_leaveType.value);
						
					})

				var mer_doj = document.getElementById('mer_doj');
				var joiningYear = new Date( parseDate(incr_date( mer_doj.value))).getFullYear();
				var joiningMonth = new Date( parseDate(incr_date( mer_doj.value))).getMonth()+1;
				var joiningDate = new Date( parseDate(incr_date( mer_doj.value))).getDate();
				var currentYear = new Date().getFullYear();
				var currentMonth = new Date().getMonth()+1;
				var currentDate = new Date().getDate();

				var currentStatusMonth = monthDiff(joiningYear,currentYear,joiningMonth,currentMonth,joiningDate,currentDate);
				var mer_rAnnuals = document.getElementById('mer_rAnnuals');
				var mer_rSicks = document.getElementById('mer_rSicks');
				var mer_empId = document.getElementById('mer_empId');
				if(currentStatusMonth >= 12 ){
						$.ajax({
						type: 'POST',
						data: {'employeeId' : mer_empId.value},
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
							var approvedDays = (parseInt(mer_rAnnuals.value) > 0)  ? parseInt(mer_rAnnuals.value) : 0;
							if(data){
								for(var i=0 ; i<data.length ; i++){
								approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
								}
							}
							var totalAnnuals = (totalAnnuals) ?  totalAnnuals : 0;
							var calAnnuals = (totalAnnuals) ? totalAnnuals - approvedDays : totalAnnuals ;
							var annualTotal = document.getElementById('mer_LeaveTotal');
							var annualRemaining = document.getElementById('mer_LeaveRemaining');
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
						data: {'employeeId' :mer_empId.value},
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
							approvedDays = (parseInt(mer_rSicks.value) > 0)  ? parseInt(mer_rSicks.value) : 0;
							}
							if(data){
								for(var i=0 ; i<data.length ; i++){
								approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
								}
							}
							var totalSick = (totalSicks) ?  totalSicks : 0;
							var calSick = (totalSicks) ? totalSicks - approvedDays : totalSicks ;
							var sickTotal = document.getElementById('mer_LeaveTotal');
							var sickRemaining = document.getElementById('mer_LeaveRemaining');
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
		
			<div class="form-group">
				<div class="col-md-4">
					<button type="button" data-toggle="modal" data-target="#modal_theme_bg_custom_AddRequest" class="btn bg-teal">Add Request<i class="icon-arrow-right14 position-right"></i></button>
				</div>
			</div>

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
					<th>Status</th>
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
											    <?php if($this->session->userdata('designationId') == 1 && $request['LS_STATUS'] == 'Approved'){?>
                                            	<span><!--<input type="hidden" id="editRequstId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick="editRequest('<?php echo $request['LREQ_ID'];?>','<?php echo $request['LREQ_EMP_ID'];?>')"></i>&nbsp;</span>&nbsp;
                                                <?php
                                                 }
                                                ?>
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

									 <?php if($this->session->userdata('designationId') == 1 && $request['LS_STATUS'] == 'Approved'){?>
                                            	<span><!--<input type="hidden" id="editRequstId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick="editRequest('<?php echo $request['LREQ_ID'];?>','<?php echo $request['LREQ_EMP_ID'];?>')"></i>&nbsp;</span>&nbsp;
                                       <?php
                                                 }
                                                ?>

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

                                            <?php if($this->session->userdata('designationId') == 1 && $request['LS_STATUS'] == 'Approved'){?>
                                            	<span><!--<input type="hidden" id="editRequstId" />--><i class="icon-pencil" data-toggle="modal" data-target="#modal_theme_bg_custom_EditRequest" onclick="editRequest('<?php echo $request['LREQ_ID'];?>','<?php echo $request['LREQ_EMP_ID'];?>')"></i>&nbsp;</span>&nbsp;
                                                <?php
                                                 }
                                                ?>
                                            	
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
 <!--<script>

$(".icon-pencil").click(function(e) {
    var $tr = $(this).closest('tr');
    var rowIndex = $('#request_table').DataTable().row($tr).index();
    $("#editRequstId").val(rowIndex);
});

</script>-->