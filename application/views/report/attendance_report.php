<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Attendance Report</title>
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!----- COMMON CSS------->
<link href="<?php echo base_url();?>/assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>

<link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/favicon.png"/>
<style type="text/css">
	td,th{
		padding: 5px !important;
		font-size: 12px !important;
		text-align: center;
		vertical-align: middle !important;
	}
</style>
</head>

<body class="page-md page-header-fixed page-sidebar-closed">
<?php $this->load->view('admin/header'); ?>
<div class="page-container">
	<?php $this->load->view('admin/sidebar'); ?>	
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="col-md-12">
				<div class="form">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-blue">
								<i class="fa fa-table font-blue"></i>
								<span class="caption-subject bold uppercase" style="font-size: 15px;"><?php echo date('F', strtotime($date)); ?> Month Attendence Report</span>
							</div>
							<div class="actions tools" style="display: inline-flex;">
								<input type="search" id="search" class="form-control input-sm" placeholder="Search Students..." style="width: 190px; height: 30px;">
								&nbsp;&nbsp;&nbsp;&nbsp;
								<select class="input-sm form-control select2 get_attendance_report course" name="course_id" id="course_id" style="width: 170px;"> 
									<option value="">All</option>
									<?php  if(isset($courseData) && !empty($courseData))
	                                {
	                                    foreach ($courseData as $key) 
	                                    { ?>
	                                    	<option value="<?php echo (isset($key->course_id) && !empty($key->course_id))?$key->course_id:'';?>" <?php echo (isset($course) && !empty($course) && ($course==$key->course_id))?'selected="selected"':''; ?>> <?php echo (isset($key->course_name) && !empty($key->course_name))?$key->course_name:'';?> </option>
	                                    <?php } 
	                                }?>
								</select>
								&nbsp;&nbsp;&nbsp;&nbsp;
									<input style="width: 170px;" type="text" class="input-sm form-control date-picker1 get_attendance_report months" readonly  data-date-end-date="+0d" name="attendance_month" value="<?php echo date('M-Y', strtotime($date)); ?>"  > 
									<label for="form_control_1"></label>
								<a href="<?php echo base_url(); ?>pdf_attendance_report/<?php echo date('M-Y', strtotime($date)); ?>/<?php echo (isset($course) && !empty($course))?$course:'0'; ?>" class="btn red" title="Download PDF" style="height: 28px;">Download <i class="fa fa-file-pdf-o"></i> </a>
								<a href="javascript:void(0);" class="btn blue manage_attandance" title="Manage Attendence" style="height: 28px;">Edit <i class="fa fa-pencil-square-o"></i> </a>
							</div>	
						</div>
						<div class="portlet-body">						
				            <div class="row">
				            	<div class="col-md-12">
								    <?php 
								    	$month_days=date('t', strtotime($date));
								      	$month = date('m', strtotime($date));
								      	$year = date('Y',strtotime($date));
								      	$present = 0;
								      	$absent = 0;
								      	$days_status = '';
								    ?>
								    <form action="manage_attandance" id="manage_attandance" class="horizontal-form" method="post" enctype="multipart/form-data">
									    <table  class="table table-striped table-bordered table-hover masterTable" id="table">
									        <thead style="height: 55px;">
									            <tr>
									            	<th>S.R No</th>
										            <th>G.R No</th>
									                <th>Name</th>
									                <?php for ($i=1; $i <=$month_days ; $i++) 
									                {?> 
									                	<th>
									                		<?php echo $i; 
									                		$date1 = $year.'-'.$month.'-'.$i;
								                        	$days_num = date('w', strtotime($date1));
								                        	if($days_num!=0){ ?>
								                            	<span class="edit" style="display: none;"> 
																	<div class="md-checkbox">
																		<input type="checkbox" id="ck_<?php echo $i; ?>" class="md-check check_all" rel="<?php echo $i; ?>">
																		<label for="ck_<?php echo $i; ?>" style="padding-left: 11px;"> <span style="height: 25px; width: 25px; left:-5px; top:-5px;"></span> <span class="check" style="width: 6px; height: 12px;  margin-top: 7px;"></span> <span class="box" style="border: 2px solid #666; height: 15px; width: 15px;  margin-top: 4px;"></span> </label>
																	</div>
																</span>
															<?php }
															else
															{ ?>
																<div class="edit" style="display: none; margin-top: 2px;"> <i class="fa fa-lock " style="color:#26A69A;"></i></div>
															<?php } ?>									                		
									                	</th>
									                <?php } ?>
									                <th>P</th>
									                <th>A</th>
									            </tr>
									        </thead>
									        <tbody>
									        <?php if(isset($stud_details) && !empty($stud_details))
								            { $j=1;
								                foreach ($stud_details as $key) 
								                { ?>
								                    <tr>
								                    	<td><?php echo $j; ?></td>
										            	<td><?php echo (isset($key->gr_no) && !empty($key->gr_no))?$key->gr_no:'NA';?></td>
								                        <td style="text-align: left;"><?php echo (isset($key->stud_name) && !empty($key->stud_name))?$key->stud_name:'';?> <?php echo (isset($key->stud_last_name) && !empty($key->stud_last_name))?$key->stud_last_name:'';?><br><small style="color: #479CDC;"><?php echo (isset($key->stud_course_name) && !empty($key->stud_course_name))?$key->stud_course_name:'';?></small></td>
								                        <?php $pr_day = array();
								                        if(isset($key->present) && !empty($key->present)) 
								                        {
								                           	$pr_day = explode(',', $key->present);
								                        }
								                        for ($i=1; $i <=$month_days; $i++) 
								                        {	
								                        	$flag=0;
								                        	$date1 = $year.'-'.$month.'-'.$i;
								                        	$days_num = date('w', strtotime($date1)); 
								                            if (in_array($i, $pr_day))
								                            {
								                            	$flag=1;
								                            	$days_status = '<i class="fa fa-check" style="color:#26A69A;"></i>';
								                                $present++;
								                            }
								                            else
								                            { 
								                                if($days_num==0)
								                                {
								                                	$days_status = '<i class="fa fa-lock" style="color:#26A69A;"></i>';
								                                    $present++;
								                                }
								                                else
								                                {
								                                	$days_status = '<i class="fa fa-times" style="color:#F3565D;"></i>';
								                                    $absent++;
								                                }                  
								                            }?>  
								                            <td>
								                            	<?php if($days_num!=0){ ?>
									                            	<span class="edit" style="display: none;"> 
																		<div class="md-checkbox">
																			<input type="checkbox" <?php echo ($flag==1)?'checked':'';?> id="ck_<?php echo $j.'_'.$i; ?>" class="md-check ck_bx_<?php echo $i; ?>" name="manage_atten[]" value="<?php echo $key->stud_id.','.$date1;?>">
																			<label for="ck_<?php echo $j.'_'.$i; ?>" style="padding-left: 11px;"> <span style="height: 25px; width: 25px; left:-5px; top:-5px;"></span> <span class="check" style="width: 6px; height: 12px; margin-top: 7px;"></span> <span class="box" style="border: 1px solid #666; height: 13px; width: 13px; margin-top: 4px;"></span> </label>
																		</div>
																	</span>
																<?php } ?>
								                            	<span class="<?php echo ($days_num!=0)?'display':'';?>" ><?php echo isset($days_status) && !empty($days_status)?$days_status:'-';?></span>
								                            </td>
								                        <?php } 
								                        $days_status=''; $pr_day = '';?>
								                        <th><?php echo isset($present) && !empty($present)?$present:'0';?></th>
								                        <th><?php echo isset($absent) && !empty($absent)?$absent:'0';?></th>
								                    </tr>
								                <?php $j++; $absent=0; $present=0; }
								            }?>
									        </tbody>
									    </table>  
									    <small style="color:#1F897F; font-weight: bold; font-size: 13px;"><i><span style="color: #26A69A;"><i class="fa fa-check"></i> - Present.</span> &nbsp;&nbsp;  <span style="color: #F3565D;"><i class="fa fa-times"></i> - Absent.</span> &nbsp;&nbsp;  <span style="color: #26A69A;"><i class="fa fa-lock"></i> - Holiday</span> &nbsp;&nbsp; </i></small>
									    <button class="btn btn-success btn-sm pull-right edit common_save" rel="<?php echo date('Y-m', strtotime($date)); ?>" style="display: none;"> Manage </button>
									</form>
								</div>
				            </div>
						</div>
					</div>
				</div>
				<!-- END SAMPLE FORM PORTLET-->
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/search/jquery.searchable.js"></script> 

<!-- COMMON LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/scripts/metronic.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/admin/layout4/scripts/layout.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>
<script src="<?php echo base_url();?>/js/common.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {     
   	Metronic.init();
   	Layout.init();
   	$( '#table' ).searchable();
});


$(".select2").select2();
$(".date-picker1").datepicker( {
    format: "M-yyyy",
    viewMode: "months", 
    minViewMode: "months",
    autoclose: true
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>