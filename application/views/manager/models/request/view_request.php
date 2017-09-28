<style>
  .form2 .row .col-md-6{
	  border: 1px dotted lightgray;
	    padding :3px;
 }
   .form2 .row .col-md-12{
	  border: 1px dotted lightgray;
	  padding :3px;
 }
  #loader-ajax3 {
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
<div id="modal_theme_bg_custom_ViewRequest" class="modal fade" style="display: none;">
<div id="loader-ajax3"></div>
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header bg-teal">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h5 class="modal-title">View Request</h5>
							</div>
							<div class="modal-body">
							<form>
						     <fieldset class="content-group">
								<div id="msg" style="display:none;" class="alert alert-error"></div>
									<legend class="text-bold">Leave Detail</legend>
								<div class="form-group form2">
											<div class="row">
												<div class="col-md-6">	
												<label class="text-bold" for="email">Employee Id:</label>
												<p id="mvr_empBatchId"></p></div>
												<div class="col-md-6">
												<label class="text-bold" for="pwd">Employee Name:</label>
												<p id="mvr_empName"></p></div>
											</div>
											<div class="row">
												<div class="col-md-6">	
												<label class="text-bold" for="email">Employee Department:</label>
												<p id="mvr_empDepartment"></p></div>
												<div class="col-md-6">
												<label class="text-bold" for="pwd">Employee Designation:</label>
												<p id="mvr_empDesignation"></p></div>
											</div>
											<div class="row">
												<div class="col-md-6">	
												<label class="text-bold" for="email">Start Date:</label>
												<p id="mvr_startDate"></p></div>
												<div class="col-md-6">
												<label class="text-bold" for="pwd">End Date:</label>
												<p id="mvr_endDate"></p></div>
											</div>
											<div class="row">
											    <div class="col-md-6">
												<label class="text-bold" for="pwd">Leave Type:</label>
												<p><span class="label label-info" id="mvr_leaveType"></span></p></div>
												<div class="col-md-6">	
												<label class="text-bold" for="email">Total Days:</label>
												<p id="mvr_totalDays"></p></div>
											</div>
											
											<div class="row">
												<div class="col-md-12">	
												<label class="text-bold" for="email">Requestor Comment:</label>
												<p id="mvr_requesterComment"></p></div>
											</div>
											<div class="row">
												<div class="col-md-6">	
												<label class="text-bold" >Status:</label>
												<p><span class="label label-info" id="mvr_leaveStatus"></span></p></div>
												<div class="col-md-6">
												<label class="text-bold">Approver Name:</label>
												<p id="mvr_approverName"></p></div>
											</div>
											<div class="row">
												<div class="col-md-12">	
												<label class="text-bold" >Approver Comment:</label>
												<p id="mvr_approverComment"></p></div>
											</div>
									</div>
									</fieldset>
									</form>
									 <div class="text-right">
										<button class="btn btn-warning" type="button" class="close" data-dismiss="modal">Close</button>
							         </div>
				    	     </div>
							
				      </div>	
			</div>	
	</div>

