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
  .redborder{border:1px solid red;}
   #loader-ajax2 {
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

<div id="modal_theme_bg_custom_AddRequest" class="modal fade" style="display: none;">
<div id="loader-ajax2"></div>
	<div class="modal-dialog modal-md">

		<div class="modal-content">
						
			<div class="modal-header bg-teal">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Add Request</h5>
			</div>

            <div class="modal-body">
			 <form id="newRequestForm" action="" >
			    <fieldset class="content-group">
			 		
						<legend class="text-bold">Leave form</legend>
					      <div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Employee Id:</label>
									<input type="hidden" id="mar_leaveType" name="lt" value="1" placeholder="Enter Employee ID"  class="form-control" disabled>
									<input type="hidden" id="mar_leaveStatus" name="ls" value="1" placeholder="Enter Employee ID"  class="form-control" disabled>
									<input type="hidden" id="mar_empId" name="empId"  placeholder="Enter Employee ID"  class="form-control" disabled>
									<input type="number" id="mar_empBatchId" name="batchId"  placeholder="Enter Employee ID"  class="form-control" disabled>
								</div>
								<div class="col-lg-6">
									<label class="col-lg-6 text-bold">Name:</label>
									<input type="text" id="mar_empName" name="name"  placeholder="Enter Name"  class="form-control" disabled>
								</div>
						    </div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Department:</label>
											<div class="col-lg-14">
											<input type="text" name="department" class="form-control"  id="mar_department" disabled>
											</div>
									</div>
								 </div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="control-label text-bold col-lg-6">Designation:</label>
									<div class="col-lg-14">
										<input type="text" name="designation" class="form-control"  id="mar_designation" disabled>
									</div>
									</div>
								</div>
						    </div>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Leave Total:</label>
											<div class="col-lg-14">
											<input type="text" name="leaveTotal" class="form-control"  id="mar_LeaveTotal" disabled>
											</div>
									</div>
								 </div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="control-label text-bold col-lg-6">Leave Remaining:</label>
									<div class="col-lg-14">
										<input type="text" name="LeaveRemaining" class="form-control"  id="mar_LeaveRemaining" disabled>
									</div>
									</div>
								</div>
						    </div>
						
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Start Date:</label>
											<div class="col-lg-14">
											<input type="date" id="mar_startDate" name="startDate" pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" title="Correct dates allowed ex: 09/22/1993"  placeholder="Enter Start Date"  class="form-control required_addRequest" readonly>
											</div>
									</div>
								 </div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="control-label text-bold col-lg-6">End Date:</label>
									<div class="col-lg-14">
										<input type="date" id="mar_endDate" name="endDate" pattern="(0[1-9]|1[012])[/](0[1-9]|[12][0-9]|3[01])[/](19|20)\d\d" title="Correct dates allowed ex: 09/22/2015"  placeholder="Enter End Date"  class="form-control required_addRequest" readonly>
									</div>
									</div>
								</div>
						    </div>
							<div class="row">
								<div class="col-md-6 leaveStyle form-horizontal">
									<p class="text-bold">Leave Type:</p>
										 
								    			<label class="btn btn-primary" style="width :300px" >
													<input type="radio" id="mar_annualType" value="1" checked="checked" class="mar_LType" name="leaveType" >&nbsp;Annual Leave
												</label>
												 <br />
												<label class="btn bg-success" style="width :300px">
													<input type="radio" id="mar_sickType"   value="2" class="mar_LType" name="leaveType" >&nbsp;Sick Leave&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												</label>
												 <br />
												<label class="btn btn-info" style="width :300px">
													<input type="radio" id="mar_unpaidType" value="3"  class="mar_LType" name="leaveType" >&nbsp;Unpaid Leave
												</label>

							    </div>
								<div class="col-lg-6">
								
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Total Days</label>
											<div class="col-lg-14">
												<input id="mar_totalDays"  name="totalDays"  placeholder="Automatically Count days"  class="form-control" disabled>
											</div>
										</div>
										<p style="display:none;" class="message alert alert-error"></p>
								</div>
						    </div>


						   <div class="row">
						     <div class="col-lg-12">
									<div class="form-group">
										<label class="control-label text-bold col-lg-6">Requestor Comment</label>
											<div class="col-lg-14">
												<textarea rows="3" cols="3" class="form-control required_addRequest" placeholder="Enter Reason" id="mar_rComment"  name="rComment" ></textarea>
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
	var loader = document.getElementById('loader-ajax2');
	loader.style.display = "block";
	 $( "#mar_empId" ).val("<?php echo $this->session->userdata('id') ?>");
	 $( "#mar_empBatchId" ).val("<?php echo $this->session->userdata('batchId') ?>");
	 $( "#mar_empName" ).val("<?php echo $this->session->userdata('name') ?>");
	 $( "#mar_department" ).val("<?php echo $this->session->userdata('department') ?>");
	 $( "#mar_designation" ).val("<?php echo $this->session->userdata('designation') ?>");
	 $( "#mar_leaveType" ).val("1")
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
	  function classWithConditionForDprtandDesg(id,content){
            $(id).show();  
			$(id).addClass('alert-warning');
			$(id).removeClass('alert-success');
			$(id).slideDown(2500).html(content);
			setTimeout(function(){$(id).hide()}, 2500)
	}
	function monthDiff(joiningYear, currentYear,joiningMonth,currentMonth,joiningDate,currentDate) {
		var months;
		months = (currentYear - joiningYear) * 12;
		months -= joiningMonth;
		months += currentMonth;
		months -= Math.ceil((joiningDate - currentDate) *12 / 365);
		return months <= 0 ? 0 : months;
	}


	var joiningYear = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getFullYear();
	var joiningMonth = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getMonth()+1;
	var joiningDate = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getDate();
	var currentYear = new Date().getFullYear();
	var currentMonth = new Date().getMonth()+1;
	var currentDate = new Date().getDate();

    var currentStatusMonth = monthDiff(joiningYear,currentYear,joiningMonth,currentMonth,joiningDate,currentDate);
   
   
   
   
    var mar_rAnnuals = "<?php echo $this->session->userdata('remaining_annuals') ?>";
	var mar_rSicks = "<?php echo $this->session->userdata('remaining_sicks') ?>";
	var mar_empId = "<?php echo $this->session->userdata('id') ?>";
	if(currentStatusMonth >= 12 ){
			$.ajax({
			type: 'POST',
			data: {'employeeId' : mar_empId},
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
				var approvedDays = (parseInt(mar_rAnnuals) > 0)  ? parseInt(mar_rAnnuals) : 0;
				if(data){
					for(var i=0 ; i<data.length ; i++){
					approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
					}
				}
				console.log(approvedDays)
				var calAnnuals = (totalAnnuals) ? totalAnnuals - approvedDays : totalAnnuals ;
				var annualTotal = document.getElementById('mar_LeaveTotal');
				var annualRemaining = document.getElementById('mar_LeaveRemaining');
				annualTotal.value = "Total Annuals : "+totalAnnuals;;
				annualRemaining.value = "Remaining Annuals : "+calAnnuals;
				},
			error:function(data){console.log(data.responseText);}
		});  
	} 
	if(currentStatusMonth < 12  && currentStatusMonth > 3){
		$.ajax({
			type: 'POST',
			data: {'employeeId' :mar_empId},
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
				approvedDays = (parseInt(mar_rSicks) > 0)  ? parseInt(mar_rSicks) : 0;
				}
				if(data){
					for(var i=0 ; i<data.length ; i++){
					approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
					}
				}
				var calSick = (totalSicks) ? totalSicks - approvedDays : totalSicks ;
				var sickTotal = document.getElementById('mar_LeaveTotal');
				var sickRemaining = document.getElementById('mar_LeaveRemaining');
				sickTotal.value = "Total Sicks : "+totalSicks;
				sickRemaining.value ="Remaining Sicks : "+calSick;
				},
			error:function(data){console.log(data.responseText);}
			});  
	} 
   
   
   
   
   
   
   
   
   
    $('.message').hide();
	 

//    $('.pickatime-editable').pickatime({
//         editable: true
//     });


//     // Time intervals
//     $('.pickatime-intervals').pickatime({
//         interval: 150
//     });


//     // Time limits


    var from_$input = $('#mar_startDate').pickadate({
		format: 'mm/dd/yyyy', 
		editable : false , today: '',
        clear: '',
        close: ''
		}),
    from_picker = from_$input.pickadate('picker')

	var to_$input = $('#mar_endDate').pickadate({
	format: 'mm/dd/yyyy', 
	editable : false , today: '',
	clear: '',
	close: ''
	}),
    to_picker = to_$input.pickadate('picker')


// Check if there’s a “from” or “to” date to start with.
if ( from_picker.get('value') ) {
  to_picker.set('min', from_picker.get('select'))

}
if ( to_picker.get('value') ) {
  from_picker.set('max', to_picker.get('select'))
}

// When something is selected, update the “from” and “to” limits.
from_picker.on('set', function(event) {
  if ( event.select ) {
    to_picker.set('min', from_picker.get('select'));
	    if(($('#mar_startDate').val() == "") && ($('#mar_endDate').val() == "" )){
		 $('#mar_totalDays').val("Select Start Date and End Date");
		}
		else if (($('#mar_startDate').val() == "") && ($('#mar_endDate').val() != "" )){
            $('#mar_totalDays').val("Select Start Date");
		}
		else if (($('#mar_startDate').val() != "") && ($('#mar_endDate').val() == "" )){
            $('#mar_totalDays').val("Select End Date");
		}
		else if (($('#mar_startDate').val() == $('#mar_endDate').val()) && (($('#mar_startDate').val() != "") && ($('#mar_endDate').val() != "" ))){
            $('#mar_totalDays').val("1");
		}
		else{

		 $('#mar_totalDays').val(1+daydiff(parseDate($('#mar_startDate').val()), parseDate($('#mar_endDate').val()))+"");
		}
  }
  else if ( 'clear' in event ) {
	  
    to_picker.set('min', false)
	 $('#mar_totalDays').val("0");
  }
})
to_picker.on('set', function(event) {
  if ( event.select ) {
    from_picker.set('max', to_picker.get('select'))
	if(($('#mar_startDate').val() == "") && ($('#mar_endDate').val() == "" )){
		 $('#mar_totalDays').val("Select Start Date and End Date");
		}
		else if (($('#mar_startDate').val() == "") && ($('#mar_endDate').val() != "" )){
            $('#mar_totalDays').val("Select Start Date");
		}
		else if (($('#mar_startDate').val() != "") && ($('#mar_endDate').val() == "" )){
            $('#mar_totalDays').val("Select End Date");
		}

		else if (($('#mar_startDate').val() == $('#mar_endDate').val()) && (($('#mar_startDate').val() != "") && ($('#mar_endDate').val() != "" ))){
            $('#mar_totalDays').val("1");
		}

		else{


			 $('#mar_totalDays').val(1+daydiff(parseDate($('#mar_startDate').val()), parseDate($('#mar_endDate').val()))+"");
		}
		
  }
  else if ( 'clear' in event ) {
    from_picker.set('max', false)
		 $('#mar_totalDays').val("0");
  }
})

$('#mar_annualType').click(function (){
	$( "#mar_leaveType" ).val('1');
   jQuery(function(){
		function RadionButtonSelectedValueSet(cls, SelectdValue) {
			$('.'+cls).each(function() {
					if (this.value == 1) {
							$('input[class="' + cls+ '"][value="' + SelectdValue + '"]').prop('checked', true);
					}
					
				});
		}
		RadionButtonSelectedValueSet('mar_LType', 1);
	})
});

$('#mar_sickType').click(function (){
$( "#mar_leaveType" ).val('2');
   jQuery(function(){
		function RadionButtonSelectedValueSet(cls, SelectdValue) {
			$('.'+cls).each(function() {
					if (this.value == 2) {
							$('input[class="' + cls+ '"][value="' + SelectdValue + '"]').prop('checked', true);
					}
					
				});
		}
		RadionButtonSelectedValueSet('mar_LType', 2);
	})
});

$('#mar_unpaidType').click(function (){
$( "#mar_leaveType" ).val('3');
   jQuery(function(){
		function RadionButtonSelectedValueSet(cls, SelectdValue) {
			$('.'+cls).each(function() {
					if (this.value == 3) {
							$('input[class="' + cls+ '"][value="' + SelectdValue + '"]').prop('checked', true);
					}
					
				});
		}
		RadionButtonSelectedValueSet('mar_LType', 3);
	})
});

$('#newRequestForm').on('submit', function(e){
     e.preventDefault();
	$('.message').show();  
	$('.message').addClass('alert-success');
	$('.message').slideDown(2500).html("Please Wait");
				if( $( "#mar_startDate" ).val() && $( "#mar_endDate" ).val() &&  $( "#mar_totalDays" ).val() && $( "#mar_rComment" ).val() ){
				
						if($( "#mar_leaveType" ).val() == '1'){
                                if(currentStatusMonth < 12){

                                      if(currentStatusMonth >= 11){

										var joiningYear = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getFullYear();
										var joiningMonth = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getMonth()+1;
										var joiningDate = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getDate();
										var currentYear = new Date().getFullYear();
										var currentMonth = new Date().getMonth()+1;
										var currentDate = new Date().getDate();
										var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
										var firstDate = new Date(joiningYear,joiningMonth,joiningDate);
										var secondDate = new Date(currentYear,currentMonth,currentDate);

										var diffDays =  365 - Math.round(Math.abs(((firstDate.getTime() - secondDate.getTime())/oneDay)  ));	
											$('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("Your "+ diffDays + " Days is remaining eligible for Annual Leave");
										
										}

									else{

											var elegibleMonth = 12 - currentStatusMonth;
											$('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("Your "+ elegibleMonth + " month is remaining eligible for Annual Leave");
										
									  }
									

								}

                                else if(currentStatusMonth >= 12){
								   $.ajax({
										type: 'POST',
										data: {'employeeId' : $("#mar_empId").val()},
										url: '<?php echo base_url('user/getALApprovedDays');?>',	
										dataType: 'json',
										success: function (data){
											var totalAnnuals = 0;
											if(currentStatusMonth >= 12 ){
												var exceeded =  Math.floor(currentStatusMonth / 12) ;
												totalAnnuals = (exceeded > 0) ? 21 * exceeded : 21;
											} 
											var approvedDays = (parseInt('<?php echo $this->session->userdata('remaining_annuals') ?>') > 0)  ? parseInt('<?php echo $this->session->userdata('remaining_annuals') ?>') : 0;
											if(data){
                                              for(var i=0 ; i<data.length ; i++){
											   approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
											 }
											}
											console.log(totalAnnuals)
											console.log(approvedDays)
											if(currentStatusMonth >= 12 && (parseInt(totalAnnuals) + 1  - (parseInt(approvedDays) + parseInt($( "#mar_totalDays" ).val())) ) > 0){

												if($( "#mar_totalDays" ).val() > 12){

													$('.message').show();  
													$('.message').addClass('alert-warning');
													$('.message').removeClass('alert-success');
													$('.message').slideDown(2500).html("You are required to Select less than and Equal 12 Days for Annual Leave");

												}
												else{

												var startDate = $("#mar_startDate").val(); 
												var DateinISO = $.datepicker.parseDate('mm/dd/yy', startDate); 
												var DateNewFormat = $.datepicker.formatDate( "yy-mm-dd", new Date( DateinISO ) );

												var endDate = $("#mar_endDate").val(); 
												var DateinISO2 = $.datepicker.parseDate('mm/dd/yy', endDate); 
												var DateNewFormat2 = $.datepicker.formatDate( "yy-mm-dd", new Date( DateinISO2 ) );
												
												$.ajax({
													type: 'POST',
													data: {'employeeId' : $("#mar_empId").val(),'employeeLType' :$( "#mar_leaveType" ).val()
													,'startDate' : DateNewFormat,'endDate' : DateNewFormat2,'r_Comment' : $("#mar_rComment").val() ,'leaveStatus' : $("#mar_leaveStatus").val()  ,'userEmail' : '<?php echo $this->session->userdata('email'); ?>', 'roleId' : '<?php echo  $this->session->userdata('roleId'); ?>'  , 'designationId' : '<?php echo  $this->session->userdata('designationId'); ?>'},
													url: '<?php echo base_url('manager/addRequest');?>',	
													dataType: 'json',
													success: function (data){
														if(data.status == 'exist' ){
															classWithConditionForDprtandDesg('.message',"Request Already Exist , Kindly check Date etc");
														}
														else if (data.status === 'added'){
															
															$('.message').show();  
															$('.message').removeClass('alert-warning');
															$('.message').addClass('alert-success');
															$('.message').slideDown(2500).html("Request Added");
															$('#newRequestForm')[0].reset();
															setTimeout(function(){
																window.location.href = '<?php base_url('manager/requests')?>'; 
															}, 1200)
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
														},
														error:function(data){console.log(data.responseText);}
														});  


												}
                                               
											}
											else{
										    var greaterDays = parseInt(totalAnnuals) - parseInt(approvedDays);
											if(greaterDays == 0 || greaterDays < 0 ){
	                                        $('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("You dont have enough Annual leaves");
											console.log(totalAnnuals)
											    console.log(approvedDays)
										
											}
											else{
                                            $('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("You are required to Select less than and Equal 12 Days for Annual Leave");
											
											}
											}
											},
										error:function(data){console.log(data.responseText);}
										});  
							     	}

						}

						else if($( "#mar_leaveType" ).val() == '2'){
							 

									if(currentStatusMonth < 3){
										 if(currentStatusMonth >= 2){
                                          function getDaysInMonth(month, year) {
												return new Date(year, month, 0).getDate();
											}
										var joiningYear = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getFullYear();
										var joiningMonth = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getMonth()+1;
										var joiningDate = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getDate();
										var currentYear = new Date().getFullYear();
										var currentMonth = new Date().getMonth()+1;
										var currentDate = new Date().getDate();
										var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
										var firstDate = new Date(joiningYear,joiningMonth,joiningDate);
										var secondDate = new Date(currentYear,currentMonth,currentDate);

										var diffDays = parseInt(getDaysInMonth(joiningMonth+1, 2012)+getDaysInMonth(joiningMonth+2, 2012)+getDaysInMonth(joiningMonth+3, 2012)) - Math.round(Math.abs(((firstDate.getTime() - secondDate.getTime())/oneDay)));	
											$('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("Your "+ diffDays + " Days is remaining eligible for Annual Leave");
										}

									else{

											var elegibleMonth = 12 - currentStatusMonth;
											$('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("Your "+ elegibleMonth + " month is remaining eligible for Annual Leave");
										
									  }
									
									
									
									}

									else if(currentStatusMonth >= 3 ){
										if(currentStatusMonth >=12){
												$('.message').show();  
												$('.message').addClass('alert-warning');
												$('.message').removeClass('alert-success');
												$('.message').slideDown(2500).html("Your are required to Select Annual Leave or Unpaid Leave");
												setTimeout(function(){$('.message').hide(); },5000)
											}
											else{
                                   $.ajax({
										type: 'POST',
										data: {'employeeId' : $("#mar_empId").val()},
										url: '<?php echo base_url('user/getSLApprovedDays');?>',	
										dataType: 'json',
										success: function (data){
											var totalSicks = 0;
											if(currentStatusMonth >= 3){
                                                   totalSicks = 6;
											}
											var approvedDays = (parseInt('<?php echo $this->session->userdata('remaining_sicks') ?>') > 0)  ? parseInt('<?php echo $this->session->userdata('remaining_sicks') ?>') : 0;
											if(data){
												
                                              for(var i=0 ; i<data.length ; i++){
											   approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
											 }
											}
											console.log(totalSicks)
											console.log(approvedDays)
											if(currentStatusMonth >= 3 && (parseInt(totalSicks) +1 - (parseInt(approvedDays) + parseInt($( "#mar_totalDays" ).val()) ) ) > 0){
                                                var startDate = $("#mar_startDate").val(); 
												var DateinISO = $.datepicker.parseDate('mm/dd/yy', startDate); 
												var DateNewFormat = $.datepicker.formatDate( "yy-mm-dd", new Date( DateinISO ) );

												var endDate = $("#mar_endDate").val(); 
												var DateinISO2 = $.datepicker.parseDate('mm/dd/yy', endDate); 
												var DateNewFormat2 = $.datepicker.formatDate( "yy-mm-dd", new Date( DateinISO2 ) );
												
												$.ajax({
													type: 'POST',
													data: {'employeeId' : $("#mar_empId").val(),'employeeLType' :$( "#mar_leaveType" ).val()
													,'startDate' : DateNewFormat,'endDate' : DateNewFormat2,'r_Comment' : $("#mar_rComment").val() ,'leaveStatus' : $("#mar_leaveStatus").val()  ,'userEmail' : '<?php echo $this->session->userdata('email'); ?>', 'roleId' : '<?php echo  $this->session->userdata('roleId'); ?>'  , 'designationId' : '<?php echo  $this->session->userdata('designationId'); ?>'},
													url: '<?php echo base_url('manager/addRequest');?>',	
													dataType: 'json',
													success: function (data){
														if(data.status == 'exist' ){
															classWithConditionForDprtandDesg('.message',"Request Already Exist, Kindly check Date etc");
														}
														else if (data.status === 'added'){
															
															$('.message').show();  
															$('.message').removeClass('alert-warning');
															$('.message').addClass('alert-success');
															$('.message').slideDown(2500).html("Request Added");
															// $('#newRequestForm')[0].reset();
															// setTimeout(function(){
															// 	window.location.href = '<?php base_url('manager/requests')?>'; 
															// }, 1200)
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
														},
														error:function(data){console.log(data.responseText);}
														});  
											}
											else{
											var greaterDays = parseInt(totalSicks) - parseInt(approvedDays);
											if(greaterDays == 0 || greaterDays < 0 ){
	                                        $('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("You dont have enough Sick leaves");
										      
											}     
											else{
                                            $('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("You are required to Select Days less than and Equal "+greaterDays+" for Sick Leave");
											
											}
										
										 }
											},
										error:function(data){console.log(data.responseText);}
										});  	
											}
														
									}
						 }

						else if($( "#mar_leaveType" ).val() == '3'){
							
									if(currentStatusMonth < 3 ){
																	
									 if(currentStatusMonth >= 2){
                                          function getDaysInMonth(month, year) {
												return new Date(year, month, 0).getDate();
											}
										var joiningYear = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getFullYear();
										var joiningMonth = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getMonth()+1;
										var joiningDate = new Date(incr_date("<?php echo $this->session->userdata('doj') ?>")).getDate();
										var currentYear = new Date().getFullYear();
										var currentMonth = new Date().getMonth()+1;
										var currentDate = new Date().getDate();
										var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
										var firstDate = new Date(joiningYear,joiningMonth,joiningDate);
										var secondDate = new Date(currentYear,currentMonth,currentDate);

										var diffDays = parseInt(getDaysInMonth(joiningMonth+1, 2012)+getDaysInMonth(joiningMonth+2, 2012)+getDaysInMonth(joiningMonth+3, 2012)) - Math.round(Math.abs(((firstDate.getTime() - secondDate.getTime())/oneDay)));	
											$('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("Your "+ diffDays + " Days is remaining eligible for Unpaid Leave");
										}

									else{

											var elegibleMonth = 12 - currentStatusMonth;
											$('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("Your "+ elegibleMonth + " month is remaining eligible for Unpaid Leave");
										
									  }
									  
									  }
									else if(currentStatusMonth >= 3){
								   $.ajax({
										type: 'POST',
										data: {'employeeId' : $("#mar_empId").val()},
										url: '<?php echo base_url('user/getULApprovedDays');?>',	
										dataType: 'json',
										success: function (data){
											var totalUnpaid = 0;
											if(currentStatusMonth >= 3){
                                                   totalUnpaid = 15;
											}
											var approvedDays = 0;
											if(data){
                                              for(var i=0 ; i<data.length ; i++){
											   approvedDays+= parseInt(1+daydiff(parseDate(incr_date(data[i].LREQ_START)),parseDate(incr_date(data[i].LREQ_END))));
											 }
											}
											console.log(totalUnpaid)
											console.log(approvedDays)
											if(currentStatusMonth >= 3 && (parseInt(totalUnpaid) +1  - (parseInt(approvedDays) + parseInt($( "#mar_totalDays" ).val())) ) > 0){
                                                
												var startDate = $("#mar_startDate").val(); 
												var DateinISO = $.datepicker.parseDate('mm/dd/yy', startDate); 
												var DateNewFormat = $.datepicker.formatDate( "yy-mm-dd", new Date( DateinISO ) );

												var endDate = $("#mar_endDate").val(); 
												var DateinISO2 = $.datepicker.parseDate('mm/dd/yy', endDate); 
												var DateNewFormat2 = $.datepicker.formatDate( "yy-mm-dd", new Date( DateinISO2 ) );
												
												$.ajax({
													type: 'POST',
													data: {'employeeId' : $("#mar_empId").val(),'employeeLType' :$( "#mar_leaveType" ).val()
													,'startDate' : DateNewFormat,'endDate' : DateNewFormat2,'r_Comment' : $("#mar_rComment").val() ,'leaveStatus' : $("#mar_leaveStatus").val()  ,'userEmail' : '<?php echo $this->session->userdata('email'); ?>', 'roleId' : '<?php echo  $this->session->userdata('roleId'); ?>'  , 'designationId' : '<?php echo  $this->session->userdata('designationId'); ?>'},
													url: '<?php echo base_url('manager/addRequest');?>',	
													dataType: 'json',
													success: function (data){
														if(data.status == 'exist' ){
															classWithConditionForDprtandDesg('.message',"Request Already Exist, Kindly check Date etc");
														}
														else if (data.status === 'added'){
															
															$('.message').show();  
															$('.message').removeClass('alert-warning');
															$('.message').addClass('alert-success');
															$('.message').slideDown(2500).html("Request Added");
															$('#newRequestForm')[0].reset();
															setTimeout(function(){
																window.location.href = '<?php base_url('manager/requests')?>'; 
															}, 1200)
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
														},
														error:function(data){console.log(data.responseText);}
														});  
											}
											else{
										   var greaterDays = parseInt(totalUnpaid) - parseInt(approvedDays);
											if(greaterDays == 0 || greaterDays < 0 ){
	                                        $('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("You dont have enough Sick leaves");
										      
											}     
											else{
                                            $('.message').show();  
											$('.message').addClass('alert-warning');
											$('.message').removeClass('alert-success');
											$('.message').slideDown(2500).html("You are required to Select Days less than and Equal "+greaterDays+" for Sick Leave");
											
											}
											}
											},
										error:function(data){console.log(data.responseText);}
										});  
							     	}
									
								   
						}

						else {

						$('.message').show();  
						$('.message').addClass('alert-warning');
						$('.message').removeClass('alert-success');
						$('.message').slideDown(2500).html("Please Select Leave type");

						}
				   }

				else{
					  $('.required_addRequest').each(function(){
							if($(this).val() == ''){
								$(this).addClass('redborder');
							}else{
								$(this).removeClass('redborder');
							}
						});
					 classWithConditionForDprtandDesg('.message',"Fill out all field");
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