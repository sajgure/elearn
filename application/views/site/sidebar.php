<?php $course_id=$this->session->userdata('course_id'); ?>
<div class="page-sidebar-wrapper">
	<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
		<ul class="page-sidebar-menu page-sidebar-menu-closed  " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<li class="start ">
				<a href="<?php echo base_url(); ?>dashboard">
				<i class="fa fa-home"></i>
				<span class="title">Dashboard</span>
				</a>
			</li>
			<li class="start">
				<a href="<?php echo base_url(); ?>user_help">
				<i class="fa fa-question-circle "></i>
				<span class="title">How To Use Software </span>
				</a>
			</li>
			<li>
				<a href="javascript:;">
				<i class="fa fa-book"></i>
				<span class="title">Introduction</span>
				<span class="arrow "></span>
				</a>
				<ul class="sub-menu">
					<li>
						<a href="<?php echo base_url(); ?>about">
						<i class="fa fa-desktop"></i>
						About GCC-TBC</a>
					</li>
					<!-- <li>
						<a href="<?php echo base_url(); ?>exam_pattern">
						<i class="fa fa-tasks"></i>
						Exam Pattern</a>
					</li> -->
					<li>
						<a href="<?php echo base_url(); ?>marking">
						<i class="fa fa-bar-chart-o"></i>
						Marking System</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;">
				<i class="fa fa-video-camera "></i>
				<span class="title">Video Tutorials</span>
				<span class="arrow "></span>
				</a>
				<ul class="sub-menu">
					<li>
						<a href="<?php echo base_url(); ?>tutorials">
						<i class="fa fa-video-camera"></i>
						Video Tutorials</a>
					</li>
				</ul>
			</li>
			<?php if($course_id<10) { ?>
				<li >
					<a href="javascript:;">
					<i class="fa fa-book"></i>
					<span class="title">Lessons</span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo base_url(); ?>lesson_practice">
							<i class="fa fa-book"></i>
							Lessons</a>
						</li>
					</ul>
				</li>
				<li >
					<a href="javascript:;">
					<i class="fa fa-keyboard-o"></i>
					<span class="title">Practice</span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a  href="javascript:void(0);" class="set_time_popup" rel="objective_practice" rev="set_time" data-title="Set Timer">
							<i class="fa fa-dot-circle-o"></i>
							Objective</a>
						</li>
						<?php if($course_id!=7 && $course_id!=8 && $course_id!=9){ ?>
							<li >
								<a  href="javascript:void(0);" class="set_time_popup" rel="email_practice" rev="set_time" data-title="Set Timer">
								<i class="fa fa-envelope"></i>
								Email</a>
							</li>
						<?php } ?>
						<li>
							<a  href="javascript:void(0);" class="set_time_popup" rel="letter_practice" rev="set_time" data-title="Set Timer">
							<i class="fa fa-file-text-o"></i>
							Letter</a>
						</li>
						<?php if($course_id!=7){ ?>
							<li>
								<a  href="javascript:void(0);" class="set_time_popup" rel="statement_practice" rev="set_time" data-title="Set Timer">
								<i class="fa fa-file-text"></i>
								Statement</a>
							</li>
						<?php } else { ?>
							<li>
								<a  href="javascript:void(0);" class="set_time_popup" rel="statement_practice" rev="set_time" data-title="Set Timer">
								<i class="fa fa-table"></i>
	 							Balance Sheet </a>
							</li>
						<?php } ?>
						<li>
							<a  href="javascript:void(0);" class="set_time_popup" rel="speed_practice" rev="set_time" data-title="Set Timer">
							<i class="fa fa-rocket"></i>
							Speed Passage</a>
						</li>
						<?php if($course_id==7 || $course_id == 8 || $course_id == 9){ ?>
							<li >
								<a  href="javascript:void(0);" class="set_time_popup" rel="mobile_practice" rev="set_time" data-title="Set Timer">
								<i class="fa fa-mobile"></i>
								Mobile Computing</a>
							</li>
						<?php } ?>
					</ul>
				</li>
			<?php } ?>
			<?php if($course_id>10) { ?>
				<li>
					<a href="javascript:;">
					<i class="fa fa-keyboard-o"></i>
					<span class="title">Practice</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a  href="javascript:void(0);" class="set_time_popup" rel="shorthand_practice" rev="set_time" data-title="Set Timer">
							<i class="fa fa-keyboard-o"></i>
							Practice</a>
						</li>
					</ul>
				</li>
			<?php } ?>
			<li >
				<a href="javascript:;">
				<i class="fa fa-dropbox "></i>
				<span class="title">Extra</span>
				<span class="arrow open"></span>
				</a>
				<ul class="sub-menu">
					<li>
						<a href="<?php echo base_url(); ?>shortcut_keys">
						<i class="fa fa-keyboard-o"></i> Keyboard Shortcuts </a>
					</li>
					<?php if($course_id<8) { ?>
						<li >
							<a href="<?php echo base_url(); ?>prev_exam">
							<i class="fa fa-undo"></i> Previous Exam </a>
						</li>
					<?php } ?>
					<li>
						<a href="<?php echo base_url(); ?>app_store">
						<i class="fa fa-mobile"></i> App Store </a>
					</li>
					<?php if($course_id<8) { ?>
						<li>
							<a href="<?php echo base_url(); ?>speed_fast">
							<i class="fa fa-tachometer"></i> Speedometer </a>
						</li>
					<?php } ?>
				</ul>
			</li>
			<li >
				<a href="javascript:;">
				<i class="fa fa-gamepad "></i>
				<span class="title">Games</span>
				<span class="arrow open"></span>
				</a>
				<ul class="sub-menu">
					<li>
						<a href="<?php echo base_url(); ?>game/Speed">
						<i class="fa fa-gamepad"></i> Game</a>
					</li>
				</ul>
			</li>
			<li class="start ">
				<a href="<?php echo base_url(); ?>exam">
				<i class="fa fa-pencil"></i>
				<span class="title">Internal Exam</span>
				</a>
			</li>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>