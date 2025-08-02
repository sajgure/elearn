<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Objective Practice</title>

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
	<?php $course_id=$this->session->userdata('course_id'); ?>
	<?php $time=$this->uri->segment(2);
	if($time=='yes') { ?>
		<form action="javascript:void(0);" rel="save_objective_practice" id="test_form" >
	<?php } ?>
	    <input type="hidden" name="time" id='time' value="<?php echo $time; ?>">
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="col-md-9">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="row">
                                <div class="col-sm-4">
                                    <div class="caption font-blue">
                                    	<i class="fa fa-dot-circle-o font-blue"></i>
										<span class="caption-subject bold uppercase">Objective Questions</span>
									</div>
                                </div>
                                <?php if($time=='yes') { ?>
	                                <div class="col-sm-1 pull-right">
	                                	<button type="button" class="btn btn-sm btn-outline-primary" style="padding: 1px 5px; float: right; margin: 0px; float: right; font-size: 14px; color: #F14C39;"><b><span id="hm_timer"></span></b></button>
	                                </div>
	                            <?php } ?>
                                <div class="col-sm-3 pull-right">
                                    <select class="form-control  lang_change" tabindex="1" name="section" style="float: right; height: 26px; padding: 0 3px; ">
                                        <option value="English" <?php echo (isset($language) && !empty($language) && ($language=='English'))?'selected="selected"':''; ?>>English</option>
                                        <option value="Marathi" <?php echo (isset($language) && !empty($language) && ($language=='Marathi'))?'selected="selected"':''; ?>>Marathi</option>
                                        <option value="Hindi" <?php echo (isset($language) && !empty($language) && ($language=='Hindi'))?'selected="selected"':''; ?>>Hindi</option>
                                    </select>
                                </div>  
								<?php if($time=='no') { ?>
	                                <div class="col-sm-2 pull-right">
	                                    <select class="form-control obj_reload" tabindex="3" id="que_cnt"  style="height: 26px; padding: 0 3px; ">
	                                        <option value="25" <?php echo (isset($que_cnt) && ($que_cnt==25))?'selected="selected"':'';?>>25</option>
	                                        <option value="50" <?php echo (isset($que_cnt) && ($que_cnt==50))?'selected="selected"':'';?>>50</option>
	                                        <option value="75" <?php echo (isset($que_cnt) && ($que_cnt==75))?'selected="selected"':'';?>>75</option>
	                                        <option value="100" <?php echo (isset($que_cnt) && ($que_cnt==100))?'selected="selected"':'';?>>100</option>
	                                    </select>
	                                </div>
	                            <?php } ?>                              
								<div class="col-sm-3 pull-right">
									<select class="form-control obj_reload" tabindex="2" id="section_id" style="height: 26px; padding: 0 3px; ">
										<option value="0">ALL</option>
										<?php  if(isset($section_data) && !empty($section_data))
										{
											foreach ($section_data as $key) 
											{ ?>
												<option value="<?php echo $key->section_id; ?>" <?php echo (isset($section_id) && !empty($section_id) && ($section_id==$key->section_id))?'selected="selected"':''; ?> > <?php echo $key->section_name; ?> </option>
											<?php } 
										}?>
									</select>
								</div>								
                            </div>
						</div>
						<div class="portlet-body form">
							<?php $question_array=array();
	                        if(isset($question_data) && !empty($question_data))
	                        {
	                            $i=0;
	                            foreach ($question_data as $key) 
	                            { $i++;
	                                $question=$key['question'];
	                                $option=$key['option']; 
	                                $language=$this->session->userdata("language");
	                                $question_array[]=$question->question_id;?>
	                                <div class="question question_<?php echo $i; ?> <?php if($i>1) echo 'hide'; ?>">    <div class="portlet-body " style="min-height:250px;">
	                                        <div class="inline-display que_div que_english"  style="font-size:15px;font-weight:bold; <?php echo (isset($language) && !empty($language) && ($language=='English'))?'':'display:none;'; ?>" >
	                                            <?php $question_eng=strip_tags($question->question);?>
	                                            <b>Q<?php echo $i; ?>. <?php echo (isset($question_eng) && !empty($question_eng))?$question_eng:'';?></b>
	                                        </div>
	                                        <div class="inline-display que_div que_marathi"  style="font-size:15px;font-weight:bold; <?php echo (isset($language) && !empty($language) && ($language=='Marathi'))?'':'display:none;'; ?>" >
	                                            <?php $question_mar=strip_tags($question->question_mar);?>
	                                            <b>Q<?php echo $i; ?>. <?php echo (isset($question_mar) && !empty($question_mar))?$question_mar:'';?></b>
	                                        </div>
	                                        <div class="inline-display que_div que_hindi"  style="font-size:15px;font-weight:bold; <?php echo (isset($language) && !empty($language) && ($language=='Hindi'))?'':'display:none;'; ?>" >
	                                            <?php $question_hindi=strip_tags($question->question_hindi); ?>
	                                            <b>Q<?php echo $i; ?>. <?php echo (isset($question_hindi) && !empty($question_hindi))?$question_hindi:'';?></b>
	                                        </div>
	                                        <p></p>
	                                        <div class="radio-list">
	                                            <?php if(isset($option) && !empty($option) &&($time=='no'))
	                                            {
	                                                foreach ($option as $row) 
	                                                { ?>
	                                                    <label style="font-size:14px; margin-left: 10px; cursor: pointer;" > <input style="display: inline;" class="que_option " rel="btn_<?php echo $i; ?>" type="radio" name="answer_<?php echo (isset($question->question_id) && !empty($question->question_id))?$question->question_id:'';?>" id="optionsRadios1" value="<?php echo $row->option_id;?>">&nbsp; <?php echo $row->option;?> 
	                                                     &nbsp;<b><i class="<?php echo ($question->option_id==$row->option_id)?'right icon-check':'icon-close'; ?>" style="color:<?php echo ($question->option_id==$row->option_id)?'green':'red'; ?>; display:none;"></i></b></label>
	                                                <?php }
	                                            } else { ?>
	                                            	<?php if(isset($option) && !empty($option))
                                                    {
                                                        foreach ($option as $row) 
                                                        { ?>
                                                            <label style="font-size:14px; margin-left: 10px; cursor: pointer;"> <input style="display: inline;" class="que_option" rel="btn_<?php echo $i; ?>" type="radio" name="answer_<?php echo (isset($question->question_id) && !empty($question->question_id))?$question->question_id:'';?>" id="optionsRadios1" value="<?php echo $row->option_id;?>">&nbsp; <?php echo $row->option;?> </label>
                                                        <?php }
                                                    } 
                                                } ?>
	                                        </div>
	                                    </div>
	                                    <div class="form-actions right">
											<?php if($i>1){?>
	                                        <button class="btn blue que_next_prev btn-primary " rel="<?php echo $i-1; ?>" type="button" style="float:left;">Previous</button>
	                                        <?php }
	                                        if($i>=count($question_data))
	                                        {
	                                        	if($time=='no') { ?>
	                                            	<a class="btn reload btn-danger" href="<?php echo base_url(); ?>objective_practice/<?php echo $time; ?>/0" style="float:right;">Start Again</a>
	                                        	<?php } else { ?>
	                                        		<button class="btn btn_submit_test btn-danger" rel="" style="float: right;" type="button" >Submit Test</button>
	                                        	<?php }
	                                        }else{ ?>
	                                            <button class="btn blue que_next_prev btn-primary " rel="<?php echo $i+1; ?>" type="button" style="float:right;">Next</button>
	                                        <?php } ?>    
										</div>
	                                </div>
	                            <?php }
	                        }?>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
				<div class="col-md-3">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="row">
	                            <div class="col-sm-10">
	                            	<div class="caption font-blue">
										<span class="caption-subject bold uppercase">Question Number</span>
									</div>
	                            </div>
	                        </div>
						</div>
						<div class="portlet-body form">
							<div class="row">
	                            <div class="col-sm-12">
									<div style="min-height:293px;">
							            <?php if(isset($question_data) && !empty($question_data))
				                        { $i=0;
				                            foreach ($question_data as $key ) 
				                            {
				                                $i++;
				                                $question=$key['question'];
				                                $option=$key['option']; ?>   
				                                <button type="button" style="width: 35px; padding: 7px; margin: 5px;  border-radius: 20px;" rel="<?php echo $i;?>" class="btn btn-default que_next_prev btn_<?php echo $i; ?> <?php echo $i==1?'btn-danger':'';?>"><?php echo $i;?></button>
				                            <?php } 
				                        } ?><br><br>
				                    </div>
				                </div>
				            </div>
						</div>
						<div class="form-actions right">
							<span style="line-height: 32px;"> <i class="btn btn-danger btn-sm" style="color: #E85425; padding: 6px 8px !important;"></i> Current </span> &nbsp; &nbsp;
	                        <span style="line-height: 32px;"> <i class="btn btn-success btn-sm" style="color: #7eb216; padding: 6px 8px !important;"></i> Solved </span> &nbsp; &nbsp;
	                        <span style="line-height: 32px;"> <i class="btn btn-secondary btn-sm" style="color: #dddddd; padding: 6px 8px !important;"></i> Unsolved </span>   
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
		</div>
		<input type="hidden" name="question_array" value="<?php echo base64_encode(serialize($question_array));?>" />
	<?php if($time=='yes') { ?>
		</form>
	<?php } ?>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.countdownTimer.js"></script>
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
<script>
    jQuery(document).ready(function() {
       $(function(){
            $('#hm_timer').countdowntimer({minutes :25, seconds : 0, timeUp: test_expiry });
        });
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>