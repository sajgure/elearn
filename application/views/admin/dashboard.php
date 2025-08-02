<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Dashboard</title>
<!----- COMMON CSS------->
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
<link href="<?php echo base_url();?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<!----- PAGE CSS------->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />

<!----- COMMON CSS------->
<link href="<?php echo base_url();?>/assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/favicon.png"/>

</head>

<body class="page-md page-header-fixed page-sidebar-closed"> <!-- page-sidebar-closed page-sidebar-closed-hide-logo -->
<?php $this->load->view('admin/header'); ?>
<div class="page-container">
	<?php $this->load->view('admin/sidebar'); ?>	
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light blue get_msceia_student" rev="get_msceia_student" href="javascript:;">
					<div class="visual">
						<i class="fa fa-cloud-download bold"></i>
					</div>
					<div class="details">
						<div class="number" style="font-weight: 600; font-size: 22px;"> GET STUDENTS </div>
						<div class="desc" style="font-size: 12px;"> CLICK TO DOWNLOAD </div>
					</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light purple-studio get_msceia_student" rev="backup_db"  href="javascript:;">
					<div class="loading"></div>
					<div class="visual">
						<i class="fa fa-download bold"></i>
					</div>
					<div class="details">
						<div class="number" style="font-weight: 600; font-size: 22px;"> BACKUP DATABASE </div>
						<div class="desc" style="font-size: 12px;"> CLICK TO BACKUP </div>
					</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light yellow-gold chk_update" href="javascript:;">
					<div class="loading"></div>
					<div class="visual">
						<i class="fa fa-level-up bold"></i>
					</div>
					<div class="details">
						<div class="number" style="font-weight: 600; font-size: 22px;"> UPDATE ELEARN </div>
						<div class="desc" style="font-size: 12px;"> CLICK TO UPDATE </div>
					</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light green-jungle popup_save" rev="add_notification" href="javascript:;">
						<div class="visual"> <i class="fa fa-pencil bold"></i> </div>
						<div class="details">
							<div class="number" style="font-weight: 600; font-size: 22px;"> ADD NOTIFICATION </div>
							<div class="desc" style="font-size: 12px;"> CLICK TO ADD NOTIFICATION </div>
						</div>
					</a>
				</div>
			</div>
			<div class="profile-content">
				<div class="row">
					<div class="col-md-9">
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption caption-md">
									<i class="icon-users font-blue-madison"></i>
									<span class="caption-subject bold font-blue-madison uppercase">STUDENTS DETAILS</span>
								</div>
								<div class="inputs">
									<div class="portlet-input input-large input-inline">
										<div class="input-icon right">
											<i class="icon-magnifier"></i>
											<input type="search" id="search" class="form-control " placeholder="Search Students...">
										</div>
									</div>
								</div>
							</div>
							<div class="portlet-body slimscroll">
								<div class="scroller" style="height: 345px; " data-always-visible="1" data-rail-visible1="0" data-handle-color="#82DAFF">
								<div class="table-scrollable table-scrollable-borderless">
									<table class="table table-hover table-light" id="table">
										<thead>
											<tr class="uppercase">
												<th> <i class="fa fa-image"></i> </th>
												<th> <strong>STUDENTS </strong></th>
												<th> <strong>SEAT NO & PASSWORD </strong></th>
												<th> <strong>GROWTH </strong></th>
												<th style="text-align: center;"> <strong>ACTION </strong></th>
											</tr>
										</thead>
										<?php if(isset($stud_data) && !empty($stud_data))
	                                    { $i=1;
	                                        foreach ($stud_data as $key) 
	                                        { 
	                                            $result_data = $this->common_model->selectAllWhr('tbl_result','stud_id',$key->stud_id);
	                                            $cnt=count($result_data); $totalm=0;
	                                            if(isset($result_data) && !empty($result_data)) 
	                                            {   
	                                                foreach($result_data AS $row) { 
	                                                    $totalm +=$row->objective_marks + $row->email_marks + $row->letter_marks + $row->statement_marks + $row->speed_marks;      
	                                                }
	                                            }
	                                            $growth = round((($totalm/$cnt)/100)*100);
	                                            ?>
												
												<tr>
													<td class="fit" width="5%"> <img class="user-pic" src="<?php echo base_url(); ?>uploads/stud_photos/<?php echo (isset($key->stud_photo) && !empty($key->stud_photo))?$key->stud_photo:'student.jpg';?>"> </td>
													<td width="25%"><a style="text-decoration: none; cursor: pointer;" href="<?php echo base_url(); ?>student_summery/<?php echo (isset($key->stud_id) && !empty($key->stud_id))?$key->stud_id:'';?>"><?php echo $i++; ?>. <?php echo (isset($key->stud_name) && !empty($key->stud_name))?$key->stud_name:'';?> <?php echo (isset($key->stud_last_name) && !empty($key->stud_last_name))?$key->stud_last_name:'';?><br><span style="color: #29A6D3; font-size: 12px; padding-left: 14px;"><?php echo (isset($key->course) && !empty($key->course))?$key->course:'';?></span></a> </td>
													<td width="20%"><i class="fa fa-user"></i>&nbsp;<?php echo (isset($key->stud_seat_no) && !empty($key->stud_seat_no))?$key->stud_seat_no:'';?><br> 
														<i class="fa fa-key"></i>&nbsp;<?php echo (isset($key->stud_password) && !empty($key->stud_password))?$key->stud_password:'';?></td>
													<td width="20%">
														<div class="progress-info">
															<div class="progress progress-striped active"  style=" margin-bottom: 0px;">
																<div class="progress-bar <?php echo ($growth>=50)?'progress-bar-success':'progress-bar-danger'; ?>"  style="transform: rotate(180deg) !important; width: <?php echo $growth.'%'; ?> "></div>
															</div>
															<div class="status">
																<div class="status-title" style="display: inline;">
																	progress
																</div>
																<div class="status-number" style="float: right;">
																	<?php echo $growth.'%'; ?>
																</div>
															</div>
														</div> 
													</td>
													<td width="20%">
														<center>
															<?php if($key->status=='Active') { ?>
			                                                	<span style="cursor: pointer;" class="tooltips active_link btn btn-xs btn-success" rel="<?php echo (isset($key->stud_id) && !empty($key->stud_id))?$key->stud_id:'';?>" data-status="Deactive" data-title="Deactive Student" rev="stud_status" title=""> 
			                                                		<i class="fa fa-unlock-alt"></i>
			                                               	 	</span>
			                                                <?php } else { ?>
			                                                	<span style="cursor: pointer;" class="tooltips active_link btn btn-xs btn-warning" rel="<?php echo (isset($key->stud_id) && !empty($key->stud_id))?$key->stud_id:'';?>" data-status="Active" data-title="Active Student" rev="stud_status" title=""> 
			                                                		<i class="fa fa-lock"></i>
			                                                	</span>
			                                                <?php } ?>
			                                                <a href="<?php echo base_url();?>student_icard/<?php echo (isset($key->stud_id)&& !empty($key->stud_id))?$key->stud_id:'';?>" style="cursor: pointer;" class="tooltips btn btn-xs purple-studio" data-title="Click to download ID card" title=""> 
		                                                		<i class="fa fa-id-badge"></i>
		                                               	 	</a>
		                                               	 	<a href="<?php echo base_url();?>student_profile/<?php echo (isset($key->stud_id)&& !empty($key->stud_id))?$key->stud_id:'';?>" style="cursor: pointer;" class="tooltips btn btn-xs yellow-gold" data-title="Download student profile" title=""> 
		                                                		<i class="fa fa-user"></i>
		                                               	 	</a>
		                                                </center>
													</td>
												</tr>
											<?php } 
	                                    }?>	
									</table>
								</div>
							</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="portlet light " style="padding: 10px;">
							<div class="portlet-body">
								<img src="<?php echo base_url(); ?>images/birth.png" style="width: 100%; margin-top: -12px; margin-bottom: 12px; height: 170px;"/>
								<marquee style="height: 230px;" direction="up" scrollamount="1" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 3, 0);">
									<table class="table table-hover table-light">
										<?php if(isset($birthday_data) && !empty($birthday_data))
		                                { $i=1; foreach ($birthday_data as $key) { ?>
		                                	<?php $current_date = date("d/m");
                                            $student_bod= date('d/m',strtotime($key->stud_dob)); ?>
											<tr style="<?php if($current_date==$student_bod){ echo 'background-image: url(./images/birthday.gif);';} ?> background-size: auto 100%;">
												<td width="10%"></td>
												<td class="fit"> 
													<img class="user-pic" src="<?php echo base_url(); ?>uploads/stud_photos/<?php echo (isset($key->stud_photo) && !empty($key->stud_photo))?$key->stud_photo:'student.jpg';?>"> 
												</td>
												<td width="5%"></td>
												<td>
													<div class="font-green"><?php echo (isset($key->stud_name) && !empty($key->stud_name))?$key->stud_name:'';?> <?php echo (isset($key->stud_last_name) && !empty($key->stud_last_name))?$key->stud_last_name:'';?></div> 
													<div>
														<span><i class="fa fa-birthday-cake font-green" aria-hidden="true"></i></span>
														<?php echo (isset($key->stud_dob) && !empty($key->stud_dob))?date('d-M-Y',strtotime($key->stud_dob)):''?>
													</div>
												</td>
											</tr>
											<?php } 
		                                }?>	
									</table>
								</marquee>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- BEGIN FOOTER -->
<?php $this->load->view('admin/footer'); ?>	
<!-- COMMON LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/uniform/jquery.uniform.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" ></script>
<!-- PAGE LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/js/components-bootstrap-multiselect.js" type="text/javascript"></script>
	
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<!-- COMMON LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/scripts/metronic.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/admin/layout4/scripts/layout.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/search/jquery.searchable.js"></script> 
<script src="<?php echo base_url();?>/js/common.js" type="text/javascript"></script>

<script>
jQuery(document).ready(function() {     
   	Metronic.init();
   	Layout.init();
   	$( '#table' ).searchable();
});
jQuery(document).ready(function($) {
    $(".link").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>