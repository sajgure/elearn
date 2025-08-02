<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Shorthand</title>
<!----- COMMON CSS------->
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
<link href="<?php echo base_url();?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<!----- PAGE CSS------->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
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
</head>

<body class="page-md page-header-fixed page-sidebar-closed"> <!--  page-sidebar-closed-hide-logo -->
<?php $this->load->view('admin/header'); ?>
<div class="page-container">
	<?php $this->load->view('admin/sidebar'); ?>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-blue">
								<i class="fa fa-dot-circle-o font-blue"></i>
								<span class="caption-subject bold uppercase"> Shorthand </span>
							</div>
							<div class="actions tools">
								<a class="btn btn-circle btn-icon-only blue collapse" href="javascript:;" style="margin-top: -6px;">
									<i class="fa fa-angle-double-down" style="font-size:15px;"></i>
								</a>
								<a class="btn btn-circle btn-icon-only red remove" href="javascript:;" style="margin-top: -6px;">
								<i class="icon-trash"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<form action="save_shorthand" id="save_shorthand" class="horizontal-form" method="post" enctype="multipart/form-data">
								<div class="form-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">SELECT COURSE<span class="required" aria-required="true">*</span></label>
												<select class="form-control select2" name="course_id" id="course_id" > 
													<?php  if(isset($courseData) && !empty($courseData))
                                                    {
                                                        foreach ($courseData as $key) 
                                                        { ?>
                                                        	<option value="<?php echo (isset($key->course_id) && !empty($key->course_id))?$key->course_id:'';?>" <?php echo (isset($shorthand->course_id) && !empty($shorthand->course_id) && ($shorthand->course_id==$key->course_id))?'selected="selected"':''; ?>> <?php echo (isset($key->course_name) && !empty($key->course_name))?$key->course_name:'';?> </option>
                                                        <?php } 
                                                    }?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="fileinput fileinput-new form-group" data-provides="fileinput">
                                                <label class="control-label">Upload Question File</label>
                                                <div class="input-icon "><i class="fa"></i>
                                                    <span class="btn default btn-file">
                                                        <input type="hidden" name="hidden_quesion_file" value="<?php echo (isset($shorthand->quesion) && !empty($shorthand->quesion))?$shorthand->quesion:''; ?>">
                                                        <?php if(isset($shorthand->quesion) && !empty($shorthand->quesion))
                                                        { ?>
                                                        	<span class="fileinput-new">Change</span>
                                                            <span class="fileinput-exists" >Change</span>
                                                    	<?php } 
                                                    	else 
                                                    	{ ?>
	                                                        <span class="fileinput-new" >Select file</span>
	                                                        <span class="fileinput-exists" >Change</span>
	                                                    <?php } ?>
	                                                    <input type="file" name="quesion_file"  class="form-control"  />
													</span>
                                                    <span class="fileinput-filename"><?php echo (isset($shorthand->quesion) && !empty($shorthand->quesion))?$shorthand->quesion:''; ?></span>
                                                    &nbsp;
                                                    <a href="javascript:void(0);" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">DESCRIPTION<span class="required" aria-required="true">*</span></label>
												<textarea type="text" name="desc" rows="2" class="form-control" placeholder="Type Description Here"><?php echo (isset($shorthand->desc) && !empty($shorthand->desc) )?$shorthand->desc:'';?></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions right">
									<button type="reset" class="btn btn-danger">Cancel</button>
									<button type="submit" class="btn btn-success common_save" rel="<?php echo (isset($shorthand->shorthand_id) && !empty($shorthand->shorthand_id))?$shorthand->shorthand_id:''?>"><?php echo (isset($shorthand->shorthand_id) && !empty($shorthand->shorthand_id))?'Update':'Submit'?></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-blue">
								<i class="icon-list font-blue"></i>
								<span class="caption-subject bold uppercase"> shorthand List </span>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered datatable" data-url="shorthand_table">
								<thead>
									<tr>
										<th style="text-align:center;"> Sr. No. </th>
										<th style="text-align:center;"> COURSE NAME </th>
										<th style="text-align:center;"> desc </th>
										<th style="text-align:center;"> quesion </th>
										<th style="text-align:center;"> ACTION </th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('admin/footer'); ?>	
<!-- COMMON LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/uniform/jquery.uniform.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" ></script>
<!-- PAGE LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/js/components-bootstrap-multiselect.js" type="text/javascript"></script>
	
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/table-advanced.js"></script>
<!-- COMMON LEVEL js -->
<script type="text/javascript" src="<?php echo base_url();?>/assets/global/scripts/metronic.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/admin/layout4/scripts/layout.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>
<script src="<?php echo base_url();?>/js/common.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {     
   	Metronic.init();
   	Layout.init();
   	TableAdvanced.init();
});
</script>
</body>
</html>