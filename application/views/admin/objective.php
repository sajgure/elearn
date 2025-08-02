<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Objectives</title>
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
								<span class="caption-subject bold uppercase"> Objectives </span>
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
							<form action="save_objective" id="save_objective" class="horizontal-form" method="post" enctype="multipart/form-data">
								<div class="form-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">SELECT COURSE<span class="required" aria-required="true">*</span></label>
												<select class="form-control select2" name="section_id" id="section_id" > 
													<?php  if(isset($sectionData) && !empty($sectionData))
                                                    {
                                                        foreach ($sectionData as $key) 
                                                        { ?>
                                                        	<option value="<?php echo (isset($key->section_id) && !empty($key->section_id))?$key->section_id:'';?>" <?php echo (isset($objective->section_id) && !empty($objective->section_id) && ($objective->section_id==$key->section_id))?'selected="selected"':''; ?>> <?php echo (isset($key->section_name) && !empty($key->section_name))?$key->section_name:'';?> </option>
                                                        <?php } 
                                                    }?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">QUESTION IN MARATHI<span class="required" aria-required="true">*</span></label>
												<textarea type="text" name="question_mar" rows="2" class="form-control" placeholder="Type objectives in Marathi"><?php echo (isset($objective->question_mar) && !empty($objective->question_mar) )?$objective->question_mar:'';?></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">QUESTION IN HINDI<span class="required" aria-required="true">*</span></label>
												<textarea type="text" name="question_hindi" rows="2" class="form-control" placeholder="Type objectives in Hindi"><?php echo (isset($objective->question_hindi) && !empty($objective->question_hindi) )?$objective->question_hindi:'';?></textarea>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">QUESTION IN ENGLISH<span class="required" aria-required="true">*</span></label>
												<textarea type="text" name="question" rows="2" class="form-control" placeholder="Type objectives in English"><?php echo (isset($objective->question) && !empty($objective->question) )?$objective->question:'';?></textarea>
											</div>
										</div>
									</div>

									<h3 class="form-section">Option Details</h3>
                                   	<div class="table-responsive">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;" width="50%">
                                                        Option
                                                    </th>
                                                    <th style="text-align:center;" width="10%">
                                                        Answer
                                                    </th>
                                                    <th style="text-align:center;" width="10%">
                                                        Action
                                                    </th>                                                          
                                                </tr>
                                            </thead>                                                        
                                            <tbody class="row_group">
                                                <?php  if(isset($option_data) && !empty($option_data))
                                                { $i=1;
                                                    foreach ($option_data as $key) 
                                                    { ?>
                                                        <input type="hidden" value="<?php echo $i;?>" name="list_count">
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" value="<?php echo $key->option_id;?>" name="option_id[]">
                                                                <input type="text" class="form-control" placeholder="Add Option" name="option[]" tabindex="" value="<?php echo (isset($key->option) && !empty($key->option))?htmlentities($key->option):'';?>">
                                                            </td>
                                                            <td style="text-align:center;">
                                                                <div class="form-group">
                                                                    <div class="radio-list">
                                                                        <label><input type="radio" name="ans_option" value="<?php echo $i; ?>" <?php echo ($objective->option_id==$key->option_id)?'checked="checked"':''; ?> ></label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="text-align: center; vertical-align: middle;" width="10%">
                                                                <div class="btn_group">
                                                                    <span class="tooltips add_row" data-placement="top" data-original-title="Add" style="cursor: pointer;">
                                                                        <i class="fa fa-plus"></i>                                                                                                  
                                                                    </span> 
                                                                    <?php if($i>1)
                                                                    { ?>          
                                                                        <span class="tooltips deleteRow" style="cursor: pointer;" data-original-title="Remove" rev="delete_option" rel="<?php echo (isset($key->option_id) && !empty($key->option_id))?$key->option_id:'';?>" data-placement="top">
                                                                            <i class="fa fa-trash-o"></i>
                                                                        </span>
                                                                    <?php } $i++; ?>                                                          
                                                                </div>
                                                            </td>
                                                        </tr> 
                                                	<?php }
                                                }
                                                else
                                                { ?>
                                                    <tr>
                                                        <td style="text-align:center;">
                                                            <input type="text" class="form-control" placeholder="Add Option" name="option[]" tabindex="">
                                                        </td>
                                                        <td style="text-align:center;">
                                                            <div class="form-group">
                                                                <div class="radio-list">
                                                                    <label><input type="radio" name="ans_option" value="1"></label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="text-align: center; vertical-align: middle;" width="10%">
                                                            <div class="btn_group">
                                                                <span class="tooltips add_row" data-placement="top" data-original-title="Add" style="cursor: pointer;">
                                                                    <i class="fa fa-plus"></i>                                                                                                  
                                                                </span>                                                         
                                                            </div>
                                                        </td>
                                                    </tr> 
                                                <?php }?>   
                                            </tbody>
                                        </table>
                                    </div>   
								</div>
									
								<div class="form-actions right">
									<button type="reset" class="btn btn-danger">Cancel</button>
									<button type="submit" class="btn btn-success common_save" rel="<?php echo (isset($objective->question_id) && !empty($objective->question_id))?$objective->question_id:''?>"><?php echo (isset($objective->question_id) && !empty($objective->question_id))?'Update':'Submit'?>
                                    </button>    
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
								<span class="caption-subject bold uppercase"> objective List </span>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered datatable" data-url="objective_table">
								<thead>
									<tr>
										<th style="text-align:center;">Sr. No.</th>
										<th style="text-align:center;">SECTION </th>
										<th style="text-align:center;">MARATHI QUESTIONS</th>
										<th style="text-align:center;">HINDI QUESTIONS</th>
										<th style="text-align:center;">ENGLISH QUESTIONS</th>
										<th style="text-align:center;">ANSWER</th>
										<th style="text-align:center;">ACTION</th>
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