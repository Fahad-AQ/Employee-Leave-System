<style>
.empPhoto {
	text-align: center;
}
  .form2 .row .col-md-6{
	  border: 1px dotted lightgray;
	    padding :3px;
 }
   .form2 .row .col-md-12{
	  border: 1px dotted lightgray;
	  padding :3px;
 }
  #loader3 {
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
<div id="modal_theme_bg_custom_ViewUser" class="modal fade" style="display: none;">
<div id="loader3"></div>
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header bg-teal">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h5 class="modal-title">View User</h5>
							</div>
							<div class="modal-body">
							<form>
						     <fieldset class="content-group">
								<div id="msg" style="display:none;" class="alert alert-error"></div>
									<legend class="text-bold">User Details</legend>
								<div class="form-group form2">
								                <div class="row">
													<div class="empPhoto">	
												    <img style="width: 150px;height: 150px;border-radius: 100px;margin-bottom: 10px;"  id="vu_empPhoto">
													</div>
												</div>
											<div class="row">
												<div class="col-md-6">	
											     <label class="text-bold" for="email">Employee Id:</label>
												<p id="vu_empBatchId"></p></div>
												<div class="col-md-6">
												<label class="text-bold" for="pwd">Employee Name:</label>
												<p id="vu_empName"></p></div>
											</div>
											<div class="row">
												<div class="col-md-6">	
												<label class="text-bold" for="email">Father Name:</label>
												<p id="vu_empFname"></p></div>
												<div class="col-md-6">
												<label class="text-bold" for="pwd">CNIC:</label>
												<p id="vu_empCnic"></p></div>
											</div>
											<div class="row">
												<div class="col-md-6">	
												<label class="text-bold" for="email">Contact No:</label>
												<p id="vu_empContact"></p></div>
												<div class="col-md-6">
												<label class="text-bold" for="pwd">Email:</label>
												<p id="vu_empEmail"></p></div>
											</div>
											<div class="row">
												<div class="col-md-6">	
												<label class="text-bold" for="email">Date of Birth:</label>
												<p id="vu_dob"></p></div>
												<div class="col-md-6">
												<label class="text-bold" for="pwd">Date of Join:</label>
												<p id="vu_doj"></p></div>
											</div>
											<div class="row">
												<div class="col-md-6">	
												<label class="text-bold" for="email">Total Leaves :</label>
												<p id="vu_LeaveTotal"></p></div>
												<div class="col-md-6">
												<label class="text-bold" for="pwd">Total Remaining :</label>
												<p id="vu_LeaveRemaining"></p></div>
											</div>
											<div class="row">
												<div class="col-md-12">	
												<label class="text-bold" for="email">Address:</label>
												<p id="vu_address"></p></div>	
											</div>
												<div class="row">
												<div class="col-md-6">	
												<label class="text-bold" for="email">Department:</label>
												<p id="vu_department"></p></div>
												<div class="col-md-6">
												<label class="text-bold" for="pwd">Designation:</label>
												<p id="vu_designation"></p></div>
											</div>
											<div class="row">
												<div class="col-md-6">	
												<label class="text-bold" for="email">Role:</label>
												<p><span class="label label-info" id="vu_role"></span></p></div>	
												<div class="col-md-6">
												<label class="text-bold">Status:</label>
												<p><span class="label label-info" id="vu_status"></span></p></div>
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

