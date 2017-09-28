<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">
					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left">	
									<img class="img-circle img-sm" src="<?php echo $this->session->userdata('photo')?>" alt="">
										</a>
								<div class="media-body">
									<span class="media-heading text-semibold">
									<?php echo strtoupper($this->session->userdata('name'))?></span>
									<div class="text-size-mini text-muted">
									 <?php echo strtoupper($this->session->userdata('designation'))?>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->
					
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?php if ($this->uri->segment(2) == "dashboard"){ echo "active";}?>"><a href="<?php echo base_url('admin/dashboard');?>"><i class="icon-home4 text-teal-400"></i> <span>Dashboard</span></a></li>			
								<!--<li class="<?php if ($this->uri->segment(2) == "addUser"){ echo "active";}?>"><a href="<?php echo base_url('admin/addUser');?>"><i class="icon-books text-teal-400"></i> <span>Add User</span></a></li>
								<li class="<?php if ($this->uri->segment(2) == "viewUser"){ echo "active";}?>"><a href="<?php echo base_url('admin/viewUser');?>"><i class="icon-books text-teal-400"></i> <span>View User</span></a></li>	-->
								<li class="<?php if ($this->uri->segment(2) == "users"){ echo "active";}?>"><a href="<?php echo base_url('admin/users');?>"><i class="icon-books text-teal-400"></i> <span>Users</span></a></li>	
								<li class="<?php if ($this->uri->segment(2) == "requests"){ echo "active";}?>"><a href="<?php echo base_url('admin/requests');?>"><i class="icon-books text-teal-400"></i> <span>Requests</span></a></li>	
							</ul>
						</div>
					</div>
					<!-- /main navigation -->
				</div>
			</div>
			<!-- /main sidebar -->
