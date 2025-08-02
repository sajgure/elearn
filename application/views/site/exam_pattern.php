<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Exam Pattern</title>

<!-- COMMON LEVEL STYLES -->
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
</head>

<body class="page-md page-header-fixed page-sidebar-closed">
<!-- BEGIN HEADER -->
<?php include('header.php'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php include('sidebar.php'); ?>	
	<!-- BEGIN CONTENT -->

	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="col-md-12 ">
				<?php $course_id=$this->session->userdata('course_id'); ?>
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption font-blue">
							<?php if($course_id==1 || $course_id==2 || $course_id==3) { ?>
								<span class="caption-subject bold uppercase"> GCC-TBC 30 W.P.M</span>
							<?php } elseif($course_id==4 || $course_id==5 || $course_id==6) { ?>
								<span class="caption-subject bold uppercase"> GCC-TBC 40 W.P.M</span>
							<?php } elseif($course_id==7) { ?>
								<span class="caption-subject bold uppercase"> GCC-TBC Spcial skill</span>
							<?php } ?>
						</div>
					</div>
					<div class="portlet-body form">
						<?php if($course_id==1 || $course_id==2 || $course_id==3) { ?>
							<center><img src="<?php echo base_url();?>uploads/about/30exam_pattern/01.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30exam_pattern/02.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30exam_pattern/03.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30exam_pattern/04.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30exam_pattern/05.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30exam_pattern/06.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30exam_pattern/07.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30exam_pattern/08.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30exam_pattern/09.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30exam_pattern/10.jpg" style="width: 80% !important;"></center>
						<?php } elseif($course_id==4 || $course_id==5 || $course_id==6) { ?>
							<center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/1.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/2.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/3.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/4.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/5.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/6.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/7.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/8.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/9.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/10.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/11.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/12.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/13.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40exam_pattern/14.jpg" style="width: 80% !important;"></center>
						<?php } elseif($course_id==7) { ?>
							<center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/1.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/2.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/3.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/4.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/5.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/6.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/7.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/8.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/9.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/11.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/12.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/13.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/14.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/15.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/16.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/17.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_pattern/18.jpg" style="width: 80% !important;"></center>
						<?php } ?>
					</div>
				</div>
				<!-- END SAMPLE FORM PORTLET-->
			</div>
		</div>
	</div>
</div>
<!-- BEGIN FOOTER -->
<?php include('footer.php'); ?>	
<!-- COMMON LEVEL js -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>

<!-- PAGE LEVEL js -->
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>js/disable_all.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/common.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {     
   	Metronic.init();
   	Layout.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>