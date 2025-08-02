<?php $obj_session = $this->session->userdata('obj_data');
if(isset($obj_session) && !empty($obj_session))
{	
	redirect('main_email');
}  ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Elearn | Shorthand Section Two</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.PNG">
  </head>

<body style="background: url('<?php echo base_url(); ?>assets/exam/img/back.jpg') no-repeat fixed center center / cover ;">
<div class="navbar navbar-fixed-top">
	<div class="navbar navbar-fixed-top">
    	<p style="background: #010101; color: #fff; margin-bottom: 0px; height: 28px;">&nbsp;&nbsp;&nbsp;&nbsp;<b>Name:</b> <?php echo $stud_data->stud_name.' '.$stud_data->stud_father_name.' '.$stud_data->stud_last_name; ?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Seat No:</b> <?php echo (isset($stud_data->stud_seat_no) && !empty($stud_data->stud_seat_no))?$stud_data->stud_seat_no:''?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Course:</b> GCC-TBC <?php echo (isset($stud_data->course_lang) && !empty($stud_data->course_lang))? $stud_data->course_lang :'';?> <?php echo (isset($stud_data->course_name) && !empty($stud_data->course_name))? $stud_data->course_name :'';?><a href="<?php echo base_url();?>back_to_home" class="btn blue btn-primary clear_session" style="float:right; margin: 0px;"></i><i class="icon-chevron-left"></i> &nbsp; Back to Home</a> </p> 
	<img src="<?php echo base_url(); ?>assets/exam/img/logo.jpg" style="width: 100%; height: 65px;">
	</div> <!-- /navbar -->
</div> <!-- /navbar -->
<div class="main-inner">
	<br><br>
    <div class="container" style="opacity: 1;">
	    <div class="row">	      
	      	<div class="span12">
	      		<div id="target-1" class="widget">
	      			<div class="widget">
						<div class="widget-content">
							<div class="row">
								<div class="span12">
									<span class=" bold uppercase" style="font-size: 15px; color: #000;"><b>Section One &nbsp;<i class="icon-arrow-right  "></i> Type Passage </b></span>
								</div>
								<div class="span12" style="padding: 10px;">
									<div style="margin-right: 45px;">
										<?php $section_3 = $this->session->userdata('section_3'); echo $section_3; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="widget-content">
							<div class="row">
								<div class="span12">
									<span class=" bold uppercase" style="font-size: 15px; color: #000;"><b>Section Two &nbsp;<i class="icon-arrow-right  "></i> Type Passage </b></span>
								</div>
								<div class="span12" style="padding: 10px;">
									<div style="margin-right: 45px;">
										<?php $section_4 = $this->session->userdata('section_4'); echo $section_4; ?>
								</div>
							</div>
						</div>
					</div>
	      		</div>
      		</div>
	    </div>
    </div> 
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/exam/js/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.countdownTimer.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/common.js"></script>
  </body>
</html>