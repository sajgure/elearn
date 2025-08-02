<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Marking System</title>

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
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
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
							<center><img src="<?php echo base_url();?>uploads/about/30wpm/01.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/02.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/03.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/04.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/05.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/06.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/07.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/08.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/09.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/10.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/11.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/12.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/13.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/14.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/15.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/16.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/17.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/18.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/19.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/20.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/21.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/22.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/23.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/24.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/25.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/30wpm/26.jpg" style="width: 80% !important;"></center>
						<?php } elseif($course_id==4 || $course_id==5 || $course_id==6) { ?>
							<center><img src="<?php echo base_url();?>uploads/about/40wpm/01.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/02.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/03.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/04.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/05.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/06.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/07.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/08.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/09.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/11.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/12.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/13.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/14.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/15.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/16.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/17.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/18.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/19.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/20.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/21.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/22.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/23.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/24.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/25.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/40wpm/26.jpg" style="width: 80% !important;"></center>
						<?php } elseif($course_id==7) { ?>
							<center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/1.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/2.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/3.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/4.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/5.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/6.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/7.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/8.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/9.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/10.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/11.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/12.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/13.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/14.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/15.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/16.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/17.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/18.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/19.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/20.jpg" style="width: 80% !important;"></center>
                                                 <center><img src="<?php echo base_url();?>uploads/about/ssd_marking_system/21.jpg" style="width: 80% !important;"></center>
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