<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Games</title>

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
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light">
					<div class="portlet-body form">
						<div class="row">
							<div class="col-md-12">
								<center><p><b>NOTE : If the game is not working properly in mozila or msceia broswer then use chrome broswer only for the game.</b></p></center>
							</div>
						</div>
			            <div class="row">
			            	<?php if($game=='Speed') { ?>
								<center>
				                    <iframe src="<?php echo base_url(); ?>uploads/game/typing/index.html" width="964" height="700" style="border:black;"></iframe>
				                </center>
			            	<?php } else { ?>
				                <center>
		                          <object width="650" height="440" data="<?php echo base_url(); ?>uploads/game/<?php echo $game ?>.swf"></object>
		                        </center>
		                    <?php } ?>
						</div>
					</div>
				</div>

				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption font-blue">
							<span class="caption-subject bold uppercase">More Gmaes...</span>
						</div>
					</div>
					<div class="portlet-body form">
			            <div class="row">
	                        <div class="col-md-3">
	                            <a href="<?php echo base_url(); ?>game/Cups">
	                                <img class="game" src="<?php echo base_url(); ?>uploads/game/game/cupcake.png" style="height:130px;width: 250px;">
	                            </a>
	                        </div>
	                        <div class="col-md-3">
	                            <a href="<?php echo base_url(); ?>game/Numpad">
	                                <img class="game" src="<?php echo base_url(); ?>uploads/game/game/numpad.png" style="height:130px;width: 250px;">
	                            </a>
	                        </div>
	                        <div class="col-md-3">
	                            <a href="<?php echo base_url(); ?>game/Typingspeed">
	                                <img class="game" src="<?php echo base_url(); ?>uploads/game/game/typespeed.png" style="height:130px;width: 250px;">
	                            </a>
	                        </div>
	                        <div class="col-md-3">
	                            <a href="<?php echo base_url(); ?>game/Arachnidfalls1">
	                                <img class="game" src="<?php echo base_url(); ?>uploads/game/game/Arachnidfalls1.png" style="height:130px;width: 250px;">
	                            </a>
	                        </div>
	                    </div><br>
	                    <div class="row">
	                        <div class="col-md-3">
	                            <a href="<?php echo base_url(); ?>game/Homekeys">
	                                <img class="game" src="<?php echo base_url(); ?>uploads/game/game/homek.png" style="height:130px;width: 250px;">
	                            </a>
	                        </div>
	                        <div class="col-md-3">
	                            <a href="<?php echo base_url(); ?>game/Adventures">
	                                <img class="game" src="<?php echo base_url(); ?>uploads/game/game/adv.png" style="height:130px;width: 250px;">
	                            </a>
	                        </div>
	                        <div class="col-md-3">
	                            <a href="<?php echo base_url(); ?>game/Typingfactory">
	                                <img class="game" src="<?php echo base_url(); ?>uploads/game/game/typingfactory.png" style="height:130px;width: 250px;">
	                            </a>
	                        </div>
	                    </div><br>
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