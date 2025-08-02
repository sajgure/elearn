<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Profile</title>
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
<link href="<?php echo base_url(); ?>assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<!----- COMMON CSS------->
<link href="<?php echo base_url();?>/assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>

<link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/favicon.png"/>
<style>
.control-label{
    text-align: left !important;
}
</style>
</head>
<body class="page-md page-header-fixed page-sidebar-closed"> <!--  page-sidebar-closed-hide-logo -->

<?php $this->load->view('admin/header'); ?>

<div class="page-container">
	<?php $this->load->view('admin/sidebar'); ?>	
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<div class="profile-sidebar" style="width: 300px;">
						<div class="portlet light">
							<div class="profile-userpic">
								<img style="width: 50%; margin-top: 10px;" src="<?php echo base_url(); ?>uploads/stud_photos/<?php echo(isset($single_instutute->stud_photo) && !empty($single_instutute->stud_photo))?$single_instutute->stud_photo:'student.jpg'?>" class="img-responsive" alt="">
							</div>
							<div class="profile-usertitle" style="margin-top: 19px;">
								<div class="profile-usertitle-name">
									<?php echo (isset($single_instutute->inst_name) && !empty($single_instutute->inst_name))?$single_instutute->inst_name:'';?>
								</div>
                                <div class="profile-usertitle-name">
                                    (<?php echo (isset($single_instutute->inst_code) && !empty($single_instutute->inst_code))?$single_instutute->inst_code:'';?>)
                                </div>
							</div>
							<div>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-user"></i>
                                    <a href="javascript:;"> <?php echo (isset($single_instutute->inst_owner_name) && !empty($single_instutute->inst_owner_name))?$single_instutute->inst_owner_name:'';?> </a>
                                </div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-phone"></i>
									<a href="javascript:;"> <?php echo (isset($single_instutute->inst_contact) && !empty($single_instutute->inst_contact))?$single_instutute->inst_contact:'';?> </a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-globe"></i>
									<a href="javascript:;"> <?php echo (isset($single_instutute->inst_mail) && !empty($single_instutute->inst_mail))?$single_instutute->inst_mail:'';?> </a>
								</div>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-home"></i>
                                    <a href="javascript:;"> 
                                        <?php echo (isset($single_instutute->inst_address) && !empty($single_instutute->inst_address))?$single_instutute->inst_address:''?>,
                                        <?php echo (isset($single_instutute->inst_taluka) && !empty($single_instutute->inst_taluka))?$single_instutute->inst_taluka:''?>,
                                        <?php echo (isset($single_instutute->city_name) && !empty($single_instutute->city_name))?$single_instutute->city_name:''?>,
                                        <?php echo (isset($single_instutute->inst_pincode) && !empty($single_instutute->inst_pincode))?$single_instutute->inst_pincode:''?>
                                    </a>
                                </div>
							</div>
						</div>
					</div>
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-blue"></i>
                                            <span class="caption-subject font-blue bold uppercase">institute Details</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <form class="form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Institute Name:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_name) && !empty($single_instutute->inst_name))?$single_instutute->inst_name:'';?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Institute Code:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_code) && !empty($single_instutute->inst_code))?$single_instutute->inst_code:'';?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Owner Name:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_owner_name) && !empty($single_instutute->inst_owner_name))?$single_instutute->inst_owner_name:'';?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Owner Qualification:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_owner_qual) && !empty($single_instutute->inst_owner_qual))?$single_instutute->inst_owner_qual:''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Principle Name:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_princ_name) && !empty($single_instutute->inst_princ_name))?$single_instutute->inst_princ_name:''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Principle Qualification:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_princ_qual) && !empty($single_instutute->inst_princ_qual))?$single_instutute->inst_princ_qual:''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Contact No.:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_contact) && !empty($single_instutute->inst_contact))?$single_instutute->inst_contact:''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Alternate Contact No.:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_alt_contact) && !empty($single_instutute->inst_alt_contact))?$single_instutute->inst_alt_contact:''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Email ID.:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_mail) && !empty($single_instutute->inst_mail))?$single_instutute->inst_mail:''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Institute Address:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_address) && !empty($single_instutute->inst_address))?$single_instutute->inst_address:''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">District:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->city_name) && !empty($single_instutute->city_name))?$single_instutute->city_name:''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Taluka:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_taluka) && !empty($single_instutute->inst_taluka))?$single_instutute->inst_taluka:''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Pincode:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_pincode) && !empty($single_instutute->inst_pincode))?$single_instutute->inst_pincode:''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Institute Reg. Date:</label>
                                                            <div class="col-md-7">
                                                                <p class="form-control-static">
                                                                    <?php echo (isset($single_instutute->inst_reg_date) && !empty($single_instutute->inst_reg_date))?date('d-M-Y',strtotime($single_instutute->inst_reg_date)):''?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
<!-- COMMON LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/scripts/metronic.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/admin/layout4/scripts/layout.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>
<script src="<?php echo base_url();?>/js/common.js" type="text/javascript"></script>
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