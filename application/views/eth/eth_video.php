<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Video</title>

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

<body class="page-md page-header-fixed">
<!-- BEGIN HEADER -->
<?php $this->load->view('eth/header'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php $this->load->view('eth/sidebar'); ?>	
	<!-- BEGIN CONTENT -->

	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="col-md-12 ">
				<?php $course_id=$this->session->userdata('course_id'); ?>
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption font-blue">
							<span class="caption-subject bold uppercase">Tutorials > <?php $dir1 = str_replace('%20', ' ', $dir); echo $dir1; ?> > <?php echo str_replace('%20', ' ', $file); ?></span>
						</div>
					</div>
					<div class="portlet-body form">
			            <div class="row">
			            	<?php if($dir1 == 'CorelDraw' || $dir1 == 'Photoshop' || $dir1 == 'Pagemaker' || $dir1 == 'In_Design' || $dir1 == 'Karizma')
					        {
					            $my_file = './uploads/eth/DTP/'.$dir1.'/'.$file;
					        }
					        elseif($dir1 == 'Tally' || $dir1 == 'GST')
					        {
					            $my_file = './uploads/eth/Financial_Accounting/'.$dir1.'/'.$file; 
					        }
					        else
					        {
					            $my_file = './uploads/eth/'.$dir1.'/'.$file; 
					        }
					        $my_file1=str_replace('%20', ' ', $my_file);
							if (file_exists($my_file1)) { 
		                        $handle = fopen($my_file1, 'r');
		                        $data = fread($handle,filesize($my_file1));
		                        $encryptionMethod = "AES-256-CBC";  
		                        $secretHash = "Invictus";
		                        $iv='';
		                        $data = openssl_decrypt($data, $encryptionMethod, $secretHash,0,$iv);   ?>
		                        <video controls style="margin:auto; width: 100%;" poster="<?php echo base_url();?>assets/img/screen.png">
		                            <source type="video/mp4" src="data:video/mp4;base64,<?php echo $data ?>">
		                        </video>    
	 						<?php } 
	                        else {?>
							    <div style="text-align: center;">
							    	<br><br><br><br><br><br><br><br>
							    	<h2>The file does not exist</h2>
							    </div>
							<?php } ?>                  
	                    </div>
					</div>
				</div>
				<!-- END SAMPLE FORM PORTLET-->
			</div>
		</div>
	</div>
</div>
<!-- BEGIN FOOTER -->
<?php $this->load->view('eth/footer'); ?>	
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