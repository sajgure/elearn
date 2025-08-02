<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Lesson</title>

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
<style type="text/css">
    .false {
        color: red;
    }
    .true {
        color : green;
    }
    .text_div{
        word-wrap: break-word; height: 450px; border: 1px solid #ccc; padding:10px; width:100%; resize:none; font-size: 16px !important; text-align:justify; line-height: 1.4;  overflow:scroll; -moz-user-select: none; user-select:none;
    }	
</style>
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
			<div class="col-md-6">
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption font-blue">
							<span class="caption-subject bold uppercase"><?php echo (isset($lesson_data->lesson_name) && !empty($lesson_data->lesson_name))?$lesson_data->lesson_name:'';?> <i class="fa fa-angle-right"></i> Question</span>
						</div>
					</div>
					<div class="portlet-body form">
			            <?php if(isset($lesson_data) && !empty($lesson_data)) 
                        {  ?> 
                            <div class="que text_div"><?php echo (isset($lesson_data->lesson_desc) && !empty($lesson_data->lesson_desc))?trim(preg_replace('/\s\s+/', ' ', $lesson_data->lesson_desc)):'';?></div>
                        <?php }?>
					</div>
				</div>
				<!-- END SAMPLE FORM PORTLET-->
			</div>
			<div class="col-md-6">
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption font-blue">
							<span class="caption-subject bold uppercase"><?php echo (isset($lesson_data->lesson_name) && !empty($lesson_data->lesson_name))?$lesson_data->lesson_name:'';?> <i class="fa fa-angle-right"></i> Answer</span>
						</div>
						<div class="tools">
							<a type="button" href="<?php echo base_url(); ?>lesson_practice" class="btn btn-sm btn-primary" style="padding: 1px 5px; font-weight: bold; margin: 0px; float: right;"><b><span id="hm_timer"></span></b>Restart</a>
						</div>
					</div>
					<div class="portlet-body form">
			            <div class="text_div" spellcheck="false" id="editor" contenteditable="true"></div>
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