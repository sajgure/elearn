<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Internal Exam Report</title>
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
			<div class="profile-content">
				<div class="row">
					<div class="col-md-12">
						<div class="portlet light ">
							<div class="portlet-title">
								<div class="caption caption-md">
									<i class="fa fa-graduation-cap font-blue-madison"></i>
									<span class="caption-subject bold font-blue-madison uppercase">INTERNAL EXAM STUDENT DETAILS</span>
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
								<div class="scroller" style="height: 430px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
								<div class="table-scrollable table-scrollable-borderless">
									<table class="table table-hover table-light" id="table">
									<thead>
									<tr class="uppercase">
										<th style="width: 5%;"> <i class="fa fa-image"> </th>
										<th style="width: 10%;"> <strong>STUDENTS </strong></th>
										<th> <strong>G.R NO </strong></th>
										<th> <strong>SEAT NO & PASSWORD </strong></th>
										<th style="text-align: center;"> <strong>GROWTH </strong></th>
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
												<td width="25%"><?php echo $i++; ?>. <?php echo (isset($key->stud_name) && !empty($key->stud_name))?$key->stud_name:'';?> <?php echo (isset($key->stud_last_name) && !empty($key->stud_last_name))?$key->stud_last_name:'';?><br><span style="color: #29A6D3; font-size: 12px; padding-left: 14px;"><?php echo (isset($key->course) && !empty($key->course))?$key->course:'';?></span> </td>
												<td><?php echo (isset($key->gr_no) && !empty($key->gr_no))?$key->gr_no:'NA';?></td>
												<td width="25%"><i class="fa fa-user"></i>&nbsp;<?php echo (isset($key->stud_seat_no) && !empty($key->stud_seat_no))?$key->stud_seat_no:'';?><br> 
													<i class="fa fa-key"></i>&nbsp;<?php echo (isset($key->stud_password) && !empty($key->stud_password))?$key->stud_password:'';?></td>
												<td width="25%">
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
												<td width="10%">
													<center>
														<a class="btn btn-xs green" style="cursor: pointer; text-decoration: none;" class="tooltips" href="<?php echo base_url(); ?>single_exam_report/<?php echo (isset($key->stud_id) && !empty($key->stud_id))?$key->stud_id:'';?>"><i class="fa fa-search" style="color:white;"></i>View</a>
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
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>