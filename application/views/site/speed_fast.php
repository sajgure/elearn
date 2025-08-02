<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Speedometer</title>

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
<!-- PAGE LEVEL STYLES -->
<link href="<?php echo base_url(); ?>assets/global/css/fast.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/global/plugins/speedometer/css/speedometer.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
</head>

<body class="page-md page-header-fixed page-sidebar-closed" onload="document.getElementById('S1').cols=long_max; document.getElementById('S1').rows=num_files; document.getElementById('S1').style.fontSize=tamano_px; document.getElementById('S1').focus(); escrit_inicial();" onclick="document.getElementById('S1').focus();">
<!-- BEGIN HEADER -->
<?php include('header.php'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php include('sidebar.php'); ?>	
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="animated fadeIn">
				<span id="fast" style="display: none;"><?php echo (isset($speed->passage) && !empty($speed->passage))?trim(preg_replace('/\s\s+/', ' ',$speed->passage)):'';?></span>
	            <script type="text/javascript">
	                var texte=$('#fast').html();
	            </script>
	            <script type="text/javascript" src="<?php echo base_url();?>assets/global/js/fast.js"></script>
				<div class="col-md-9">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-body form">
							<div class="row">
								<div class="col-mod-12">
									<textarea style="border: medium none; height: 0px; width:5px; display: inherit;" id="S1" onkeydown="CheckKey(event);"  onkeypress="Comprova_ok(event);" onkeyup="this.value=Fer_en_funcio_de_SO(this.value,event); moveCaretToEnd(this);" onpaste="return false;" spellcheck="false"></textarea>
                                        <span id="clock"  style="text-align:justify; line-height: 1.5;  pointer-events:none; -moz-user-select: none;-ms-user-select: none;user-select: none;"></span>
                                    
                                    <?php $course_id = $this->session->userdata('course_id'); 
                                    if ($course_id == 1 || $course_id == 4 )
                                    {?> 
                                        <center><br><img style="width: 60%;" src="<?php echo base_url(); ?>assets/img/eng_key.png"></center>
                                    <?php } 
                                    else
                                    {?> 
                                        <center><br><img style="width: 60%;" src="<?php echo base_url(); ?>assets/img/mar_key.png"></center>
                                    <?php }?>
								</div>
							</div>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
				<div class="col-md-3">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-body form">
							<div class="row">
								<div class="col-mod-12">
									<div style="display: inline-flex; margin-bottom: 30px; width: 100%">
										<span class="label label-sm label-success" style="width: 50%; font-size: 13px; margin:-1px;px;">Words : <span id="wordcount">0</span></span>&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="label label-sm label-warning" style="width: 50%; font-size: 13px; margin:-1px;px;">Timer : <span id="timer">0</span> Sec</span>
                                        <!--  <button class="btn btn-success" style="width: 50%;" type="button"><b>Words : <span id="wordcount">0</span></b></button> 
                                        <button class="btn btn-warning" style="width: 50%; " type="button"><b>Timer : <span id="timer">0</span> Sec</b></button> -->
                                    </div>
                                    <input type="hidden" class="speedometer" id="wpm" value="0">
                                    <p style="color: rgb(13, 165, 209); font-weight: bold; text-align: justify; font-size: 14px; padding: 15px 12px 12px; margin: 0px;">Click on Pause button to pause the timer, and for new passage click on Restart button.</p>
                                    <div style="display: inline-flex; text-align: center; padding-left: 58px; padding-right: 45px;">
	                                    <div class="profile-userbuttons">
											<button class="btn btn-circle green-haze btn-sm" id="pause" type="button">Pause</button>
											<a href="<?php echo base_url(); ?>speed_fast" class="btn btn-circle btn-danger btn-sm" type="button">Restart</a>
										</div>
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
</div>
<!-- BEGIN FOOTER -->
<?php include('footer.php'); ?>	
<!-- COMMON LEVEL js -->

<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<!-- PAGE LEVEL js -->
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/speedometer/js/speedometer.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/speedometer/js/speed.js"></script>
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
    $("#wpm").myfunc({divFact:10,eventListenerType:'change'});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>