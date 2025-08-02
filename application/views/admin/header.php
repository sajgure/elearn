<?php if($this->authentication->chk_login()==FALSE)redirect('index'); 
$inst_code=$this->session->userdata('inst_code');
$notification_data = $this->admin_model->fetch_notification_data();
?>
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<div class="page-header-inner">
		<div class="page-logo">
			<a href="<?php echo base_url()?>" style="width: 70%;">
			<img src="<?php echo base_url();?>/assets/img/logo.png" alt="logo" class="logo-default img-responsive" style="margin-top: 7px; margin-left: 0px;"/>
			</a>
			<div class="menu-toggler sidebar-toggler">
			</div>
		</div>
		<div class="page-top">
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="separator hide"> </li>
					<li class="dropdown dropdown-extended dropdown-inbox dropdown-grey-cararra" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle popup_save" rel="0" rev="set_user_time">
							<i class="icon-clock font-green"></i> &nbsp; &nbsp;<span> </span>
						</a>
					</li>

					<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
			            <?php $string = file_get_contents("./uploads/update/version.json");
			            $version_data = json_decode ($string,true);
			            $version=$version_data[0]["version"]; ?>
						<a href="javascript:;" class="dropdown-toggle chk_update" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-info font-red"></i> <span class="badge badge-danger"> <?php echo $version; ?> </span> &nbsp; &nbsp;
						</a>
					</li>

					<li class="separator hide"> </li>
					<li class="dropdown dropdown-extended dropdown-inbox dropdown-grey-cararra" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-pencil font-green"></i> <span class="badge badge-success"> <?php echo (isset($notification_data) && !empty($notification_data))?count($notification_data):'0';?> </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3><span class="bold font-green">Your Notifications</span></h3>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 282px;" data-handle-color="#637283">
									<?php if(isset($notification_data) && !empty($notification_data))
					                { foreach ($notification_data as $key) { ?>
									<li>
										<a href="javascript:;" style="padding: 5px 9px 9px;">
										<span class="subject" style="margin-left: 0;">
											<span class="from  popup_save" rel="<?php echo (isset($key->notification_id) && !empty($key->notification_id))?$key->notification_id:'';?>" rev="add_notification"><?php echo (isset($key->notification) && !empty($key->notification))?$key->notification:'';?>  
												<span class="message font-green" style="float: right;">
													<?php echo (isset($key->from_date) && !empty($key->from_date))?date('d',strtotime($key->from_date)):'';?><sup>th</sup> -
													<?php echo (isset($key->to_date) && !empty($key->to_date))?date('d',strtotime($key->to_date)):'';?><sup>th</sup>
												</span>	
											</span>
										</span>
										<span class="message" style="margin-left: 0;">
										<?php echo (isset($key->notification_desc) && !empty($key->notification_desc))?substr($key->notification_desc, 0, 75):'';?>
											<span class="message font-green" style="float: right;">
												<span style="cursor: pointer;" class="tooltips deleteRecord font-red" title="Delete Record" rel="<?php echo (isset($key->notification_id) && !empty($key->notification_id))?$key->notification_id:'';?>" rev="delete_notification"><i class="fa fa-trash-o"></i></span>
											</span>
										</span>
										</a>
									</li>
									<?php } } ?>
								</ul>
							</li>
						</ul>
					</li>

					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<span class="username username-hide-on-mobile">
								<?php $inst_code = $this->session->userdata('inst_code');    
								echo (isset($inst_code) && !empty($inst_code))?$inst_code:'';?> 
							</span>
                			<?php $path = base_url().'uploads/stud_photos/student.jpg'; ?>
							<img alt="" class="img-circle" src="<?php echo $path;?>"/>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li> <a href="<?php echo base_url(); ?>profile"> <i class="icon-user"></i> My Profile </a> </li>
							<li> <a href="javascript:;" class="chk_update"> <i class="icon-lock"></i> Updates <span class="badge badge-danger"> <?php echo $version;?> </span> </a> </li> 
							<li class="divider"> </li> 
							<li> <a href="javascript:;" class="popup_save" rev="change_pass" data-title="Change Password"> <i class="icon-key"></i> Change Password </a> </li>
							<li> <a href="<?php echo base_url(); ?>logout"> <i class="icon-lock"></i> Log Out </a> </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"> </div>