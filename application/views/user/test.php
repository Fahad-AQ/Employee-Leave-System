<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>themelock.com - Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(''); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(''); ?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(''); ?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(''); ?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(''); ?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	
	<?php $cls = 'class="multiselect required2"'; ?>
									<?php foreach ($markets as $market) {
										$mrk[] = $market['m_id'];
									}?>
									
									<?php foreach ($getusermarkets as $getusermarket) {
										$mrk2[] = $getusermarket['stateid'];
									}?>
									<?php echo form_multiselect('m_id[]', $mrk, $mrk2, $cls);?>
									
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/pages/form_validation.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li>
					<a class="sidebar-control sidebar-main-toggle hidden-xs">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-git-compare"></i>
						<span class="visible-xs-inline-block position-right">Git updates</span>
						<span class="badge bg-warning-400">9</span>
					</a>
					
					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-heading">
							Git updates
							<ul class="icons-list">
								<li><a href="#"><i class="icon-sync"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body width-350">
							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>

								<div class="media-body">
									Drop the IE <a href="#">specific hacks</a> for temporal inputs
									<div class="media-annotation">4 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
								</div>
								
								<div class="media-body">
									Add full font overrides for popovers and tooltips
									<div class="media-annotation">36 minutes ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
								</div>
								
								<div class="media-body">
									<a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
									<div class="media-annotation">2 hours ago</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
								</div>
								
								<div class="media-body">
									<a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
									<div class="media-annotation">Dec 18, 18:36</div>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
								</div>
								
								<div class="media-body">
									Have Carousel ignore keyboard events
									<div class="media-annotation">Dec 12, 05:46</div>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-people"></i>
						<span class="visible-xs-inline-block position-right">Users</span>
					</a>
					
					<div class="dropdown-menu dropdown-content">
						<div class="dropdown-content-heading">
							Users online
							<ul class="icons-list">
								<li><a href="#"><i class="icon-gear"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body width-300">
							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">Jordana Ansley</a>
									<span class="display-block text-muted text-size-small">Lead web developer</span>
								</div>
								<div class="media-right media-middle"><span class="status-mark border-success"></span></div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">Will Brason</a>
									<span class="display-block text-muted text-size-small">Marketing manager</span>
								</div>
								<div class="media-right media-middle"><span class="status-mark border-danger"></span></div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">Hanna Walden</a>
									<span class="display-block text-muted text-size-small">Project manager</span>
								</div>
								<div class="media-right media-middle"><span class="status-mark border-success"></span></div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">Dori Laperriere</a>
									<span class="display-block text-muted text-size-small">Business developer</span>
								</div>
								<div class="media-right media-middle"><span class="status-mark border-warning-300"></span></div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading text-semibold">Vanessa Aurelius</a>
									<span class="display-block text-muted text-size-small">UX expert</span>
								</div>
								<div class="media-right media-middle"><span class="status-mark border-grey-400"></span></div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All users"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right">Messages</span>
						<span class="badge bg-warning-400">2</span>
					</a>
					
					<div class="dropdown-menu dropdown-content width-350">
						<div class="dropdown-content-heading">
							Messages
							<ul class="icons-list">
								<li><a href="#"><i class="icon-compose"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body">
							<li class="media">
								<div class="media-left">
									<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									<span class="badge bg-danger-400 media-badge">5</span>
								</div>

								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">James Alexander</span>
										<span class="media-annotation pull-right">04:58</span>
									</a>

									<span class="text-muted">who knows, maybe that would be the best thing for me...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left">
									<img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									<span class="badge bg-danger-400 media-badge">4</span>
								</div>

								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Margo Baker</span>
										<span class="media-annotation pull-right">12:16</span>
									</a>

									<span class="text-muted">That was something he was unable to do because...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Jeremy Victorino</span>
										<span class="media-annotation pull-right">22:48</span>
									</a>

									<span class="text-muted">But that would be extremely strained and suspicious...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Beatrix Diaz</span>
										<span class="media-annotation pull-right">Tue</span>
									</a>

									<span class="text-muted">What a strenuous career it is that I've chosen...</span>
								</div>
							</li>

							<li class="media">
								<div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
								<div class="media-body">
									<a href="#" class="media-heading">
										<span class="text-semibold">Richard Vango</span>
										<span class="media-annotation pull-right">Mon</span>
									</a>
									
									<span class="text-muted">Other travelling salesmen live a life of luxury...</span>
								</div>
							</li>
						</ul>

						<div class="dropdown-content-footer">
							<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/placeholder.jpg" alt="">
						<span>Victoria</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
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
								<li><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Page layouts</span></a>
									<ul>
										<li><a href="layout_navbar_fixed.html">Fixed navbar</a></li>
										<li><a href="layout_navbar_sidebar_fixed.html">Fixed navbar &amp; sidebar</a></li>
										<li><a href="layout_sidebar_fixed_native.html">Fixed sidebar native scroll</a></li>
										<li><a href="layout_navbar_hideable.html">Hideable navbar</a></li>
										<li><a href="layout_navbar_hideable_sidebar.html">Hideable &amp; fixed sidebar</a></li>
										<li><a href="layout_footer_fixed.html">Fixed footer</a></li>
										<li class="navigation-divider"></li>
										<li><a href="boxed_default.html">Boxed with default sidebar</a></li>
										<li><a href="boxed_mini.html">Boxed with mini sidebar</a></li>
										<li><a href="boxed_full.html">Boxed full width</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-copy"></i> <span>Layouts</span></a>
									<ul>
										<li><a href="index.html" id="layout1">Layout 1 <span class="label bg-warning-400">Current</span></a></li>
										<li><a href="../../layout_2/LTR/index.html" id="layout2">Layout 2</a></li>
										<li><a href="../../layout_3/LTR/index.html" id="layout3">Layout 3</a></li>
										<li><a href="../../layout_4/LTR/index.html" id="layout4">Layout 4</a></li>
										<li class="disabled"><a href="../../layout_5/LTR/index.html" id="layout5">Layout 5 <span class="label">Coming soon</span></a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-droplet2"></i> <span>Color system</span></a>
									<ul>
										<li><a href="colors_primary.html">Primary palette</a></li>
										<li><a href="colors_danger.html">Danger palette</a></li>
										<li><a href="colors_success.html">Success palette</a></li>
										<li><a href="colors_warning.html">Warning palette</a></li>
										<li><a href="colors_info.html">Info palette</a></li>
										<li class="navigation-divider"></li>
										<li><a href="colors_pink.html">Pink palette</a></li>
										<li><a href="colors_violet.html">Violet palette</a></li>
										<li><a href="colors_purple.html">Purple palette</a></li>
										<li><a href="colors_indigo.html">Indigo palette</a></li>
										<li><a href="colors_blue.html">Blue palette</a></li>
										<li><a href="colors_teal.html">Teal palette</a></li>
										<li><a href="colors_green.html">Green palette</a></li>
										<li><a href="colors_orange.html">Orange palette</a></li>
										<li><a href="colors_brown.html">Brown palette</a></li>
										<li><a href="colors_grey.html">Grey palette</a></li>
										<li><a href="colors_slate.html">Slate palette</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-stack"></i> <span>Starter kit</span></a>
									<ul>
										<li><a href="starters/horizontal_nav.html">Horizontal navigation</a></li>
										<li><a href="starters/1_col.html">1 column</a></li>
										<li><a href="starters/2_col.html">2 columns</a></li>
										<li>
											<a href="#">3 columns</a>
											<ul>
												<li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
												<li><a href="starters/3_col_double.html">Double sidebars</a></li>
											</ul>
										</li>
										<li><a href="starters/4_col.html">4 columns</a></li>
										<li>
											<a href="#">Detached layout</a>
											<ul>
												<li><a href="starters/detached_left.html">Left sidebar</a></li>
												<li><a href="starters/detached_right.html">Right sidebar</a></li>
												<li><a href="starters/detached_sticky.html">Sticky sidebar</a></li>
											</ul>
										</li>
										<li><a href="starters/layout_boxed.html">Boxed layout</a></li>
										<li class="navigation-divider"></li>
										<li><a href="starters/layout_navbar_fixed_main.html">Fixed main navbar</a></li>
										<li><a href="starters/layout_navbar_fixed_secondary.html">Fixed secondary navbar</a></li>
										<li><a href="starters/layout_navbar_fixed_both.html">Both navbars fixed</a></li>
										<li><a href="starters/layout_fixed.html">Fixed layout</a></li>
									</ul>
								</li>
								<li><a href="changelog.html"><i class="icon-list-unordered"></i> <span>Changelog</span></a></li>
								<!-- /main -->

								<!-- Forms -->
								<li class="navigation-header"><span>Forms</span> <i class="icon-menu" title="Forms"></i></li>
								<li>
									<a href="#"><i class="icon-pencil3"></i> <span>Form components</span></a>
									<ul>
										<li><a href="form_inputs_basic.html">Basic inputs</a></li>
										<li><a href="form_checkboxes_radios.html">Checkboxes &amp; radios</a></li>
										<li><a href="form_input_groups.html">Input groups</a></li>
										<li><a href="form_controls_extended.html">Extended controls</a></li>
										<li>
											<a href="#">Selects</a>
											<ul>
												<li><a href="form_select2.html">Select2 selects</a></li>
												<li><a href="form_multiselect.html">Bootstrap multiselect</a></li>
												<li><a href="form_select_box_it.html">SelectBoxIt selects</a></li>
												<li><a href="form_bootstrap_select.html">Bootstrap selects</a></li>
											</ul>
										</li>
										<li><a href="form_tag_inputs.html">Tag inputs</a></li>
										<li><a href="form_dual_listboxes.html">Dual Listboxes</a></li>
										<li><a href="form_editable.html">Editable forms</a></li>
										<li class="active"><a href="form_validation.html">Validation</a></li>
										<li><a href="form_inputs_grid.html">Inputs grid</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-footprint"></i> <span>Wizards</span></a>
									<ul>
										<li><a href="wizard_steps.html">Steps wizard</a></li>
										<li><a href="wizard_form.html">Form wizard</a></li>
										<li><a href="wizard_stepy.html">Stepy wizard</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-spell-check"></i> <span>Editors</span></a>
									<ul>
										<li><a href="editor_summernote.html">Summernote editor</a></li>
										<li><a href="editor_ckeditor.html">CKEditor</a></li>
										<li><a href="editor_wysihtml5.html">WYSIHTML5 editor</a></li>
										<li><a href="editor_code.html">Code editor</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-select2"></i> <span>Pickers</span></a>
									<ul>
										<li><a href="picker_date.html">Date &amp; time pickers</a></li>
										<li><a href="picker_color.html">Color pickers</a></li>
										<li><a href="picker_location.html">Location pickers</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-insert-template"></i> <span>Form layouts</span></a>
									<ul>
										<li><a href="form_layout_vertical.html">Vertical form</a></li>
										<li><a href="form_layout_horizontal.html">Horizontal form</a></li>
									</ul>
								</li>
								<!-- /forms -->

								<!-- Appearance -->
								<li class="navigation-header"><span>Appearance</span> <i class="icon-menu" title="Appearance"></i></li>
								<li>
									<a href="#"><i class="icon-grid"></i> <span>Components</span></a>
									<ul>
										<li><a href="components_modals.html">Modals</a></li>
										<li><a href="components_dropdowns.html">Dropdown menus</a></li>
										<li><a href="components_tabs.html">Tabs component</a></li>
										<li><a href="components_pills.html">Pills component</a></li>
										<li><a href="components_navs.html">Accordion and navs</a></li>
										<li><a href="components_buttons.html">Buttons</a></li>
										<li><a href="components_notifications_pnotify.html">PNotify notifications</a></li>
										<li><a href="components_notifications_others.html">Other notifications</a></li>
										<li><a href="components_popups.html">Tooltips and popovers</a></li>
										<li><a href="components_alerts.html">Alerts</a></li>
										<li><a href="components_pagination.html">Pagination</a></li>
										<li><a href="components_labels.html">Labels and badges</a></li>
										<li><a href="components_loaders.html">Loaders and bars</a></li>
										<li><a href="components_thumbnails.html">Thumbnails</a></li>
										<li><a href="components_page_header.html">Page header</a></li>
										<li><a href="components_breadcrumbs.html">Breadcrumbs</a></li>
										<li><a href="components_media.html">Media objects</a></li>
										<li><a href="components_sliders.html">Slider components</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-puzzle2"></i> <span>Content appearance</span></a>
									<ul>
										<li><a href="appearance_content_panels.html">Content panels</a></li>
										<li><a href="appearance_panel_heading.html">Panel heading elements</a></li>
										<li><a href="appearance_draggable_panels.html">Draggable panels</a></li>
										<li><a href="appearance_text_styling.html">Text styling</a></li>
										<li><a href="appearance_typography.html">Typography</a></li>
										<li><a href="appearance_helpers.html">Helper classes</a></li>
										<li><a href="appearance_syntax_highlighter.html">Syntax highlighter</a></li>
										<li><a href="appearance_content_grid.html">Grid system</a></li>
									</ul>
								</li>
								<li><a href="components_animations.html"><i class="icon-spinner3 spinner"></i> <span>CSS3 animations</span></a></li>
								<li>
									<a href="#"><i class="icon-gift"></i> <span>Extra components</span></a>
									<ul>
										<li><a href="extra_affix.html">Affix and Scrollspy</a></li>
										<li><a href="extra_session_timeout.html">Session timeout</a></li>
										<li><a href="extra_idle_timeout.html">Idle timeout</a></li>
										<li><a href="extra_trees.html">Dynamic tree views</a></li>
										<li><a href="extra_context_menu.html">Context menu</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-thumbs-up2"></i> <span>Icons</span></a>
									<ul>
										<li><a href="icons_glyphicons.html">Glyphicons</a></li>
										<li><a href="icons_icomoon.html">Icomoon</a></li>
										<li><a href="icons_fontawesome.html">Font awesome</a></li>
									</ul>
								</li>
								<!-- /appearance -->

								<!-- Layout -->
								<li class="navigation-header"><span>Layout</span> <i class="icon-menu" title="Layout options"></i></li>
								<li>
									<a href="#"><i class="icon-indent-decrease2"></i> <span>Sidebars</span></a>
									<ul>
										<li><a href="sidebar_default_collapse.html">Default collapsible</a></li>
										<li><a href="sidebar_default_hide.html">Default hideable</a></li>
										<li><a href="sidebar_mini_collapse.html">Mini collapsible</a></li>
										<li><a href="sidebar_mini_hide.html">Mini hideable</a></li>
										<li>
											<a href="#">Dual sidebar</a>
											<ul>
												<li><a href="sidebar_dual.html">Dual sidebar</a></li>
												<li><a href="sidebar_dual_double_collapse.html">Dual double collapse</a></li>
												<li><a href="sidebar_dual_double_hide.html">Dual double hide</a></li>
												<li><a href="sidebar_dual_swap.html">Swap sidebars</a></li>
											</ul>
										</li>
										<li>
											<a href="#">Double sidebar</a>
											<ul>
												<li><a href="sidebar_double_collapse.html">Collapse main sidebar</a></li>
												<li><a href="sidebar_double_hide.html">Hide main sidebar</a></li>
												<li><a href="sidebar_double_fix_default.html">Fix default width</a></li>
												<li><a href="sidebar_double_fix_mini.html">Fix mini width</a></li>
												<li><a href="sidebar_double_visible.html">Opposite sidebar visible</a></li>
											</ul>
										</li>
										<li>
											<a href="#">Detached sidebar</a>
											<ul>
												<li><a href="sidebar_detached_left.html">Left position</a></li>
												<li><a href="sidebar_detached_right.html">Right position</a></li>
												<li><a href="sidebar_detached_sticky_custom.html">Sticky (custom scroll)</a></li>
												<li><a href="sidebar_detached_sticky_native.html">Sticky (native scroll)</a></li>
												<li><a href="sidebar_detached_separate.html">Separate categories</a></li>
											</ul>
										</li>
										<li><a href="sidebar_hidden.html">Hidden sidebar</a></li>
										<li><a href="sidebar_light.html">Light sidebar</a></li>
										<li><a href="sidebar_components.html">Sidebar components</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-sort"></i> <span>Vertical navigation</span></a>
									<ul>
										<li><a href="navigation_vertical_collapsible.html">Collapsible menu</a></li>
										<li><a href="navigation_vertical_accordion.html">Accordion menu</a></li>
										<li><a href="navigation_vertical_sizing.html">Navigation sizing</a></li>
										<li><a href="navigation_vertical_bordered.html">Bordered navigation</a></li>
										<li><a href="navigation_vertical_right_icons.html">Right icons</a></li>
										<li><a href="navigation_vertical_disabled.html">Disabled navigation links</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-transmission"></i> <span>Horizontal navigation</span></a>
									<ul>
										<li><a href="navigation_horizontal_click.html">Submenu on click</a></li>
										<li><a href="navigation_horizontal_hover.html">Submenu on hover</a></li>
										<li><a href="navigation_horizontal_elements.html">With custom elements</a></li>
										<li><a href="navigation_horizontal_tabs.html">Tabbed navigation</a></li>
										<li><a href="navigation_horizontal_disabled.html">Disabled navigation links</a></li>
										<li><a href="navigation_horizontal_mega.html">Horizontal mega menu</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-menu3"></i> <span>Navbars</span></a>
									<ul>
										<li><a href="navbar_single.html">Single navbar</a></li>
										<li>
											<a href="#">Multiple navbars</a>
											<ul>
												<li><a href="navbar_multiple_navbar_navbar.html">Navbar + navbar</a></li>
												<li><a href="navbar_multiple_navbar_header.html">Navbar + header</a></li>
												<li><a href="navbar_multiple_header_navbar.html">Header + navbar</a></li>
												<li><a href="navbar_multiple_top_bottom.html">Top + bottom</a></li>
											</ul>
										</li>
										<li><a href="navbar_colors.html">Color options</a></li>
										<li><a href="navbar_sizes.html">Sizing options</a></li>
										<li><a href="navbar_hideable.html">Hide on scroll</a></li>
										<li><a href="navbar_components.html">Navbar components</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-tree5"></i> <span>Menu levels</span></a>
									<ul>
										<li><a href="#"><i class="icon-IE"></i> Second level</a></li>
										<li>
											<a href="#"><i class="icon-firefox"></i> Second level with child</a>
											<ul>
												<li><a href="#"><i class="icon-android"></i> Third level</a></li>
												<li>
													<a href="#"><i class="icon-apple2"></i> Third level with child</a>
													<ul>
														<li><a href="#"><i class="icon-html5"></i> Fourth level</a></li>
														<li><a href="#"><i class="icon-css3"></i> Fourth level</a></li>
													</ul>
												</li>
												<li><a href="#"><i class="icon-windows"></i> Third level</a></li>
											</ul>
										</li>
										<li><a href="#"><i class="icon-chrome"></i> Second level</a></li>
									</ul>
								</li>
								<!-- /layout -->

								<!-- Data visualization -->
								<li class="navigation-header"><span>Data visualization</span> <i class="icon-menu" title="Data visualization"></i></li>
								<li>
									<a href="#"><i class="icon-graph"></i> <span>Echarts library</span></a>
									<ul>
										<li><a href="echarts_lines_areas.html">Lines and areas</a></li>
										<li><a href="echarts_columns_waterfalls.html">Columns and waterfalls</a></li>
										<li><a href="echarts_bars_tornados.html">Bars and tornados</a></li>
										<li><a href="echarts_scatter.html">Scatter charts</a></li>
										<li><a href="echarts_pies_donuts.html">Pies and donuts</a></li>
										<li><a href="echarts_funnels_chords.html">Funnels and chords</a></li>
										<li><a href="echarts_candlesticks_others.html">Candlesticks and others</a></li>
										<li><a href="echarts_combinations.html">Chart combinations</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-statistics"></i> <span>D3 library</span></a>
									<ul>
										<li><a href="d3_lines_basic.html">Simple lines</a></li>
										<li><a href="d3_lines_advanced.html">Advanced lines</a></li>
										<li><a href="d3_bars_basic.html">Simple bars</a></li>
										<li><a href="d3_bars_advanced.html">Advanced bars</a></li>
										<li><a href="d3_pies.html">Pie charts</a></li>
										<li><a href="d3_circle_diagrams.html">Circle diagrams</a></li>
										<li><a href="d3_tree.html">Tree layout</a></li>
										<li><a href="d3_other.html">Other charts</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-stats-dots"></i> <span>Dimple library</span></a>
									<ul>
										<li>
											<a href="#">Line charts</a>
											<ul>
												<li><a href="dimple_lines_horizontal.html">Horizontal orientation</a></li>
												<li><a href="dimple_lines_vertical.html">Vertical orientation</a></li>
											</ul>
										</li>
										<li>
											<a href="#">Bar charts</a>
											<ul>
												<li><a href="dimple_bars_horizontal.html">Horizontal orientation</a></li>
												<li><a href="dimple_bars_vertical.html">Vertical orientation</a></li>
											</ul>
										</li>
										<li>
											<a href="#">Area charts</a>
											<ul>
												<li><a href="dimple_area_horizontal.html">Horizontal orientation</a></li>
												<li><a href="dimple_area_vertical.html">Vertical orientation</a></li>
											</ul>
										</li>
										<li>
											<a href="#">Step charts</a>
											<ul>
												<li><a href="dimple_step_horizontal.html">Horizontal orientation</a></li>
												<li><a href="dimple_step_vertical.html">Vertical orientation</a></li>
											</ul>
										</li>
										<li><a href="dimple_pies.html">Pie charts</a></li>
										<li><a href="dimple_rings.html">Ring charts</a></li>
										<li><a href="dimple_scatter.html">Scatter charts</a></li>
										<li><a href="dimple_bubble.html">Bubble charts</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-stats-bars"></i> <span>C3 library</span></a>
									<ul>
										<li><a href="c3_lines_areas.html">Lines and areas</a></li>
										<li><a href="c3_bars_pies.html">Bars and pies</a></li>
										<li><a href="c3_advanced.html">Advanced examples</a></li>
										<li><a href="c3_axis.html">Chart axis</a></li>
										<li><a href="c3_grid.html">Grid options</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-google"></i> <span>Google visualization</span></a>
									<ul>
										<li><a href="google_lines.html">Line charts</a></li>
										<li><a href="google_bars.html">Bar charts</a></li>
										<li><a href="google_pies.html">Pie charts</a></li>
										<li><a href="google_scatter_bubble.html">Bubble &amp; scatter charts</a></li>
										<li><a href="google_other.html">Other charts</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-map5"></i> <span>Maps integration</span></a>
									<ul>
										<li>
											<a href="#">Google maps</a>
											<ul>
												<li><a href="maps_google_basic.html">Basics</a></li>
												<li><a href="maps_google_controls.html">Controls</a></li>
												<li><a href="maps_google_markers.html">Markers</a></li>
												<li><a href="maps_google_drawings.html">Map drawings</a></li>
												<li><a href="maps_google_layers.html">Layers</a></li>
											</ul>
										</li>
										<li><a href="maps_vector.html">Vector maps</a></li>
									</ul>
								</li>
								<!-- /data visualization -->

								<!-- Extensions -->
								<li class="navigation-header"><span>Extensions</span> <i class="icon-menu" title="Extensions"></i></li>
								<li>
									<a href="#"><i class="icon-spinner10 spinner"></i> <span>Velocity animations</span></a>
									<ul>
										<li><a href="extension_velocity_basic.html">Basic usage</a></li>
										<li><a href="extension_velocity_ui.html">UI pack effects</a></li>
										<li><a href="extension_velocity_examples.html">Advanced examples</a></li>
									</ul>
								</li>
								<li><a href="extension_blockui.html"><i class="icon-history"></i> <span>Block UI</span></a></li>
								<li>
									<a href="#"><i class="icon-upload"></i> <span>File uploaders</span></a>
									<ul>
										<li><a href="uploader_plupload.html">Plupload</a></li>
										<li><a href="uploader_bootstrap.html">Bootstrap file uploader</a></li>
										<li><a href="uploader_dropzone.html">Dropzone</a></li>
									</ul>
								</li>
								<li><a href="extension_image_cropper.html"><i class="icon-crop2"></i> <span>Image cropper</span></a></li>
								<li>
									<a href="#"><i class="icon-calendar3"></i> <span>Event calendars</span></a>
									<ul>
										<li><a href="extension_fullcalendar_views.html">Basic views</a></li>
										<li><a href="extension_fullcalendar_styling.html">Event styling</a></li>
										<li><a href="extension_fullcalendar_formats.html">Language and time</a></li>
										<li><a href="extension_fullcalendar_advanced.html">Advanced usage</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-sphere"></i> <span>Internationalization</span></a>
									<ul>
										<li><a href="internationalization_switch_direct.html">Direct translation</a></li>
										<li><a href="internationalization_switch_query.html">Querystring parameter</a></li>
										<li><a href="internationalization_on_init.html">Set language on init</a></li>
										<li><a href="internationalization_after_init.html">Set language after init</a></li>
										<li><a href="internationalization_fallback.html">Language fallback</a></li>
										<li><a href="internationalization_callbacks.html">Callbacks</a></li>
									</ul>
								</li>
								<!-- /extensions -->

								<!-- Tables -->
								<li class="navigation-header"><span>Tables</span> <i class="icon-menu" title="Tables"></i></li>
								<li>
									<a href="#"><i class="icon-table2"></i> <span>Basic tables</span></a>
									<ul>
										<li><a href="table_basic.html">Basic examples</a></li>
										<li><a href="table_sizing.html">Table sizing</a></li>
										<li><a href="table_borders.html">Table borders</a></li>
										<li><a href="table_styling.html">Table styling</a></li>
										<li><a href="table_elements.html">Table elements</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-grid7"></i> <span>Data tables</span></a>
									<ul>
										<li><a href="datatable_basic.html">Basic initialization</a></li>
										<li><a href="datatable_styling.html">Basic styling</a></li>
										<li><a href="datatable_advanced.html">Advanced examples</a></li>
										<li><a href="datatable_sorting.html">Sorting options</a></li>
										<li><a href="datatable_api.html">Using API</a></li>
										<li><a href="datatable_data_sources.html">Data sources</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-alignment-unalign"></i> <span>Data tables extensions</span></a>
									<ul>
										<li><a href="datatable_extension_reorder.html">Columns reorder</a></li>
										<li><a href="datatable_extension_fixed_columns.html">Fixed columns</a></li>
										<li><a href="datatable_extension_colvis.html">Columns visibility</a></li>
										<li><a href="datatable_extension_tools.html">Table tools</a></li>
										<li><a href="datatable_extension_scroller.html">Scroller</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-versions"></i> <span>Responsive options</span></a>
									<ul>
										<li><a href="table_responsive.html">Responsive basic tables</a></li>
										<li><a href="datatable_responsive.html">Responsive data tables</a></li>
									</ul>
								</li>
								<!-- /tables -->

								<!-- Page kits -->
								<li class="navigation-header"><span>Page kits</span> <i class="icon-menu" title="Page kits"></i></li>
								<li>
									<a href="#"><i class="icon-task"></i> <span>Task manager</span></a>
									<ul>
										<li><a href="task_manager_grid.html">Task grid</a></li>
										<li><a href="task_manager_list.html">Task list</a></li>
										<li><a href="task_manager_detailed.html">Task detailed</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-cash3"></i> <span>Invoicing</span></a>
									<ul>
										<li><a href="invoice_template.html">Invoice template</a></li>
										<li><a href="invoice_grid.html">Invoice grid</a></li>
										<li><a href="invoice_archive.html">Invoice archive</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-people"></i> <span>User pages</span></a>
									<ul>
										<li><a href="user_pages_cards.html">User cards</a></li>
										<li><a href="user_pages_list.html">User list</a></li>
										<li><a href="user_pages_profile.html">Simple profile</a></li>
										<li><a href="user_pages_profile_cover.html">Profile with cover</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-user-plus"></i> <span>Login &amp; registration</span></a>
									<ul>
										<li><a href="login_simple.html">Simple login</a></li>
										<li><a href="login_advanced.html">More login info</a></li>
										<li><a href="login_registration.html">Simple registration</a></li>
										<li><a href="login_registration_advanced.html">More registration info</a></li>
										<li><a href="login_unlock.html">Unlock user</a></li>
										<li><a href="login_password_recover.html">Reset password</a></li>
										<li><a href="login_hide_navbar.html">Hide navbar</a></li>
										<li><a href="login_transparent.html">Transparent box</a></li>
										<li><a href="login_background.html">Background option</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-magazine"></i> <span>Timelines</span></a>
									<ul>
										<li><a href="timelines_left.html">Left timeline</a></li>
										<li><a href="timelines_right.html">Right timeline</a></li>
										<li><a href="timelines_center.html">Centered timeline</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-lifebuoy"></i> <span>Support</span></a>
									<ul>
										<li><a href="support_conversation_layouts.html">Conversation layouts</a></li>
										<li><a href="support_conversation_options.html">Conversation options</a></li>
										<li><a href="support_knowledgebase.html">Knowledgebase</a></li>
										<li><a href="support_faq.html">FAQ page</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-search4"></i> <span>Search</span></a>
									<ul>
										<li><a href="search_basic.html">Basic search results</a></li>
										<li><a href="search_users.html">User search results</a></li>
										<li><a href="search_images.html">Image search results</a></li>
										<li><a href="search_videos.html">Video search results</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-images2"></i> <span>Gallery</span></a>
									<ul>
										<li><a href="gallery_grid.html">Media grid</a></li>
										<li><a href="gallery_titles.html">Media with titles</a></li>
										<li><a href="gallery_description.html">Media with description</a></li>
										<li><a href="gallery_library.html">Media library</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-warning"></i> <span>Error pages</span></a>
									<ul>
										<li><a href="error_403.html">Error 403</a></li>
										<li><a href="error_404.html">Error 404</a></li>
										<li><a href="error_405.html">Error 405</a></li>
										<li><a href="error_500.html">Error 500</a></li>
										<li><a href="error_503.html">Error 503</a></li>
										<li><a href="error_offline.html">Offline page</a></li>
									</ul>
								</li>
								<!-- /page kits -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Forms</span> - Validation</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="form_validation.html">Forms</a></li>
							<li class="active">Validation</li>
						</ul>

						<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
									<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Form validation -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Form validation</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<p class="content-group-lg">Validate.js makes simple clientside form validation easy, whilst still offering plenty of customization options. The plugin comes bundled with a useful set of validation methods, including URL and email validation, while providing an API to write your own methods. All bundled methods come with default error messages in english and translations into 37 other languages.</p>
							<form class="form-horizontal form-validate-jquery" action="#">
								<fieldset class="content-group">
									<legend class="text-bold">Basic inputs</legend>

									<!-- Basic text input -->
									<div class="form-group">
										<label class="control-label col-lg-3">Basic text input <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="basic" class="form-control" required="required" placeholder="Text input validation">
										</div>
									</div>
									<!-- /basic text input -->


									<!-- Input group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Input group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="input-group">
												<div class="input-group-addon"><i class="icon-mention"></i></div>
												<input type="text" name="input_group" class="form-control" required="required" placeholder="Input group validation">
											</div>
										</div>
									</div>
									<!-- /input group -->


									<!-- Password field -->
									<div class="form-group">
										<label class="control-label col-lg-3">Password field <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="password" name="password" id="password" class="form-control" required="required" placeholder="Minimum 5 characters allowed">
										</div>
									</div>
									<!-- /password field -->


									<!-- Repeat password -->
									<div class="form-group">
										<label class="control-label col-lg-3">Repeat password <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="password" name="repeat_password" class="form-control" required="required" placeholder="Try different password">
										</div>
									</div>
									<!-- /repeat password -->


									<!-- Email field -->
									<div class="form-group">
										<label class="control-label col-lg-3">Email field <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="email" name="email" class="form-control" id="email" required="required" placeholder="Enter a valid email address">
										</div>
									</div>
									<!-- /email field -->


									<!-- Repeat email -->
									<div class="form-group">
										<label class="control-label col-lg-3">Repeat email <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="email" name="repeat_email" class="form-control" required="required" placeholder="Enter a valid email address">
										</div>
									</div>
									<!-- /repeat email -->


									<!-- Minimum characters -->
									<div class="form-group">
										<label class="control-label col-lg-3">Minimum characters <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="minimum_characters" class="form-control" required="required" placeholder="Enter at least 10 characters">
										</div>
									</div>
									<!-- /minimum characters -->


									<!-- Maximum characters -->
									<div class="form-group">
										<label class="control-label col-lg-3">Maximum characters <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="maximum_characters" class="form-control" required="required" placeholder="Enter 10 characters maximum">
										</div>
									</div>
									<!-- /maximum characters -->


									<!-- Minimum number -->
									<div class="form-group">
										<label class="control-label col-lg-3">Minimum number <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="minimum_number" class="form-control" required="required" placeholder="Enter a value greater than or equal to 10">
										</div>
									</div>
									<!-- /minimum number -->


									<!-- Maximum number -->
									<div class="form-group">
										<label class="control-label col-lg-3">Maximum number <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="maximum_number" class="form-control" required="required" placeholder="Please enter a value less than or equal to 10">
										</div>
									</div>
									<!-- /maximum number -->


									<!-- Basic textarea -->
									<div class="form-group">
										<label class="control-label col-lg-3">Basic textarea <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<textarea rows="5" cols="5" name="textarea" class="form-control" required="required" placeholder="Default textarea"></textarea>
										</div>
									</div>
									<!-- /basic textarea -->

								</fieldset>

								<fieldset class="content-group">
									<legend class="text-bold">Advanced inputs</legend>

									<!-- Number range -->
									<div class="form-group">
										<label class="control-label col-lg-3">Number range <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="number_range" class="form-control" required="required" placeholder="Enter a value between 10 and 20">
										</div>
									</div>
									<!-- /number range -->


									<!-- Touchspin spinners -->
									<div class="form-group">
										<label class="control-label col-lg-3">Touchspin spinner <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="input-group">
												<input type="text" name="touchspin" value="" required="required" class="touchspin-postfix" placeholder="Not valid if empty">
											</div>
										</div>
									</div>
									<!-- /touchspin spinners -->


									<!-- Custom message -->
									<div class="form-group">
										<label class="control-label col-lg-3">Custom message <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="custom" class="form-control" required="required" placeholder="Custom error message">
										</div>
									</div>
									<!-- /custom message -->


									<!-- URL validation -->
									<div class="form-group">
										<label class="control-label col-lg-3">URL validation <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="url" class="form-control" required="required" placeholder="Enter a valid URL address">
										</div>
									</div>
									<!-- /url validation -->


									<!-- Date validation -->
									<div class="form-group">
										<label class="control-label col-lg-3">Date validation <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="date" class="form-control" required="required" placeholder="April, 2014 or any other date format">
										</div>
									</div>
									<!-- /date validation -->


									<!-- ISO date validation -->
									<div class="form-group">
										<label class="control-label col-lg-3">ISO date validation <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="date_iso" class="form-control" required="required" placeholder="YYYY/MM/DD or any other ISO date format">
										</div>
									</div>
									<!-- /iso date validation -->


									<!-- Numbers only -->
									<div class="form-group">
										<label class="control-label col-lg-3">Numbers only <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="numbers" class="form-control" required="required" placeholder="Enter decimal number only">
										</div>
									</div>
									<!-- /numbers only -->


									<!-- Digits only -->
									<div class="form-group">
										<label class="control-label col-lg-3">Digits only <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="digits" class="form-control" required="required" placeholder="Enter digits only">
										</div>
									</div>
									<!-- /digits only -->


									<!-- Credit card validation -->
									<div class="form-group">
										<label class="control-label col-lg-3">Credit card validation <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="text" name="card" class="form-control" required="required" placeholder="Enter credit card number. Try 446-667-651">
										</div>
									</div>
									<!-- /credit card validation -->


									<!-- Basic file uploader -->
									<div class="form-group">
										<label class="control-label col-lg-3">Basic file uploader <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="file" name="unstyled_file" class="form-control" required="required">
										</div>
									</div>
									<!-- /basic file uploader -->


									<!-- Styled file uploader -->
									<div class="form-group">
										<label class="control-label col-lg-3">Styled file uploader <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input type="file" name="styled_file" class="file-styled" required="required">
										</div>
									</div>
									<!-- /styled file uploader -->


									<!-- Basic select -->
									<div class="form-group">
										<label class="control-label col-lg-3">Basic select <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select name="default_select" class="form-control" required="required">
												<option value="">Choose an option</option> 
												<optgroup label="Alaskan/Hawaiian Time Zone">
													<option value="AK">Alaska</option>
													<option value="HI">Hawaii</option>
													<option value="CA">California</option>
												</optgroup>
												<optgroup label="Mountain Time Zone">
													<option value="AZ">Arizona</option>
													<option value="CO">Colorado</option>
													<option value="WY">Wyoming</option>
												</optgroup>
												<optgroup label="Central Time Zone">
													<option value="AL">Alabama</option>
													<option value="AR">Arkansas</option>
													<option value="KY">Kentucky</option>
												</optgroup>
												<optgroup label="Eastern Time Zone">
													<option value="CT">Connecticut</option>
													<option value="DE">Delaware</option>
													<option value="FL">Florida</option>
												</optgroup>
											</select>
										</div>
									</div>
									<!-- /basic select -->


									<!-- Select2 select -->
									<div class="form-group">
										<label class="control-label col-lg-3">Select2 select <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select name="select2" data-placeholder="Select a State..." class="select" required="required">
												<option></option>
												<optgroup label="Alaskan/Hawaiian Time Zone">
													<option value="AK">Alaska</option>
													<option value="HI">Hawaii</option>
												</optgroup>
												<optgroup label="Pacific Time Zone">
													<option value="CA">California</option>
													<option value="NV">Nevada</option>
													<option value="OR">Oregon</option>
													<option value="WA">Washington</option>
												</optgroup>
												<optgroup label="Mountain Time Zone">
													<option value="AZ">Arizona</option>
													<option value="CO">Colorado</option>
													<option value="ID">Idaho</option>
													<option value="WY">Wyoming</option>
												</optgroup>
												<optgroup label="Central Time Zone">
													<option value="AL">Alabama</option>
													<option value="AR">Arkansas</option>
													<option value="IL">Illinois</option>
													<option value="KY">Kentucky</option>
												</optgroup>
											</select>
										</div>
									</div>
									<!-- /select2 select -->


									<!-- Multiple select -->
									<div class="form-group">
										<label class="control-label col-lg-3">Multiple select <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<select name="default_multiple_select" class="form-control" multiple="multiple" required="required">
												<optgroup label="Alaskan/Hawaiian Time Zone">
													<option value="AK">Alaska</option>
													<option value="HI">Hawaii</option>
													<option value="CA">California</option>
													<option value="NV">Nevada</option>
													<option value="WA">Washington</option>
												</optgroup>
												<optgroup label="Mountain Time Zone">
													<option value="AZ">Arizona</option>
													<option value="CO">Colorado</option>
													<option value="ID">Idaho</option>
													<option value="WY">Wyoming</option>
												</optgroup>
												<optgroup label="Central Time Zone">
													<option value="AL">Alabama</option>
													<option value="AR">Arkansas</option>
													<option value="IL">Illinois</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
												</optgroup>
											</select>
										</div>
									</div>
									<!-- /multiple select -->

								</fieldset>

								<fieldset class="content-group">
									<legend class="text-bold">Checkboxes and radios</legend>

									<!-- Basic single checkbox -->
									<div class="form-group">
										<label class="control-label col-lg-3">Basic single checkbox <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="single_basic_checkbox" required="required">
													Accept our terms
												</label>
											</div>
										</div>
									</div>
									<!-- /basic singlecheckbox -->


									<!-- Basic checkbox group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Basic checkbox group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="basic_checkbox" required="required">
													Duis eget nibh purus
												</label>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" name="basic_checkbox">
													Maecenas non nulla ac nunc
												</label>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" name="basic_checkbox">
													Maecenas egestas tristique
												</label>
											</div>
										</div>
									</div>
									<!-- /basic checkbox group -->


									<!-- Inline checkbox group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Basic inline checkbox group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<label class="checkbox-inline">
												<input type="checkbox" name="basic_inline_checkbox" required="required">
												Duis eget nibh purus
											</label>

											<label class="checkbox-inline">
												<input type="checkbox" name="basic_inline_checkbox">
												Maecenas non nulla ac nunc
											</label>
										</div>
									</div>
									<!-- /inline checkbox group -->


									<!-- Basic radio group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Basic radio group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="radio">
												<label>
													<input type="radio" name="basic_radio" required="required">
													Cras leo turpis malesuada eget
												</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="basic_radio">
													Maecenas congue justo vel ipsum
												</label>
											</div>
										</div>
									</div>
									<!-- /basic radio group -->


									<!-- Basic inline radio group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Basic inline radio group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<label class="radio-inline">
												<input type="radio" name="basic_radio_group" required="required">
												Cras leo turpis malesuada eget
											</label>

											<label class="radio-inline">
												<input type="radio" name="basic_radio_group">
												Maecenas congue justo vel ipsum
											</label>
										</div>
									</div>
									<!-- /basic inline radio group -->


									<hr>


									<!-- Single styled checkbox -->
									<div class="form-group">
										<label class="control-label col-lg-3">Single styled checkbox <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="single_styled_checkbox" class="styled" required="required">
													Accept our terms
												</label>
											</div>
										</div>
									</div>
									<!-- /single styled checkbox -->


									<!-- Styled checkbox group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Styled checkbox group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="styled_checkbox" class="styled" required="required">
													Duis eget nibh purus
												</label>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" name="styled_checkbox" class="styled">
													Maecenas non nulla ac nunc
												</label>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" name="styled_checkbox" class="styled">
													Maecenas egestas tristique
												</label>
											</div>
										</div>
									</div>
									<!-- /styled checkbox group -->


									<!-- Inline checkbox group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Inline checkbox group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<label class="checkbox-inline">
												<input type="checkbox" name="styled_inline_checkbox" class="styled" required="required">
												Duis eget nibh purus
											</label>
							
											<label class="checkbox-inline">
												<input type="checkbox" name="styled_inline_checkbox" class="styled">
												Maecenas non nulla ac nunc
											</label>										
										</div>
									</div>
									<!-- /inline checkbox group -->


									<!-- Styled radio group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Styled radio group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="radio">
												<label>
													<input type="radio" name="styled_radio" class="styled" required="required">
													Cras leo turpis malesuada eget
												</label>
											</div>

											<div class="radio">
												<label>
													<input type="radio" name="styled_radio" class="styled">
													Maecenas congue justo vel ipsum
												</label>
											</div>
										</div>
									</div>
									<!-- /styled radio group -->


									<!-- Styled inline radio group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Styled inline radio group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<label class="radio-inline">
												<input type="radio" name="styled_inline_radio" class="styled" required="required">
												Cras leo turpis malesuada eget
											</label>

											<label class="radio-inline">
												<input type="radio" name="styled_inline_radio" class="styled">
												Maecenas congue justo vel ipsum
											</label>
										</div>
									</div>
									<!-- /styled inline radio group -->

								</fieldset>

								<fieldset>
									<legend class="text-bold">Switcher components</legend>

									<!-- Switchery single -->
									<div class="form-group">
										<label class="control-label col-lg-3">Swichery single <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="checkbox checkbox-switchery switchery-xs">
												<label>
													<input type="checkbox" name="switchery_single" class="switchery" required="required">
													Accept our terms
												</label>
											</div>
										</div>
									</div>
									<!-- /switchery single -->


									<!-- Switchery group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Swichery group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="checkbox checkbox-switchery switchery-xs">
												<label>
													<input type="checkbox" name="switchery_group" class="switchery" required="required">
													Duis eget nibh purus
												</label>
											</div>

											<div class="checkbox checkbox-switchery switchery-xs">
												<label>
													<input type="checkbox" name="switchery_group" class="switchery">
													Maecenas non nulla ac nunc
												</label>
											</div>

											<div class="checkbox checkbox-switchery switchery-xs">
												<label>
													<input type="checkbox" name="switchery_group" class="switchery">
													Maecenas egestas tristique
												</label>
											</div>
										</div>
									</div>
									<!-- /switchery group -->


									<!-- Inline switchery group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Inline swichery group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<label class="checkbox-inline checkbox-switchery switchery-xs">
												<input type="checkbox" name="inline_switchery_group" class="switchery" required="required">
												Duis eget nibh purus
											</label>

											<label class="checkbox-inline checkbox-switchery switchery-xs">
												<input type="checkbox" name="inline_switchery_group" class="switchery">
												Maecenas egestas tristique
											</label>
										</div>
									</div>
									<!-- /inline switchery group -->


									<hr>


									<!-- Switch single -->
									<div class="form-group">
										<label class="control-label col-lg-3">Switch single <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="checkbox checkbox-switch">
												<label>
													<input type="checkbox" name="switch_single" data-on-text="Yes" data-off-text="No" class="switch" required="required">
													Accept our terms
												</label>
											</div>
										</div>
									</div>
									<!-- /switch single -->


									<!-- Switch group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Switch group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<div class="checkbox checkbox-switch">
												<label>
													<input type="checkbox" name="switch_group" class="switch" required="required">
													Duis eget nibh purus
												</label>
											</div>

											<div class="checkbox checkbox-switch">
												<label>
													<input type="checkbox" name="switch_group" class="switch">
													Maecenas non nulla ac nunc
												</label>
											</div>

											<div class="checkbox checkbox-switch">
												<label>
													<input type="checkbox" name="switch_group" class="switch">
													Maecenas egestas tristique
												</label>
											</div>
										</div>
									</div>
									<!-- /switch group -->


									<!-- Inline switch group -->
									<div class="form-group">
										<label class="control-label col-lg-3">Inline switch group <span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<label class="checkbox-inline checkbox-switch">
												<input type="checkbox" name="inline_switch_group" class="switch" required="required">
												Duis eget nibh purus
											</label>

											<label class="checkbox-inline checkbox-switch">
												<input type="checkbox" name="inline_switch_group" class="switch">
												Maecenas non nulla ac nunc
											</label>
										</div>
									</div>
									<!-- /inline switch group -->

								</fieldset>

								<div class="text-right">
									<button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
									<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>
						</div>
					</div>
					<!-- /form validation -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html><?php echo base_url(''); ?>