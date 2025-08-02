<?php $obj_session = $this->session->userdata('obj_data');
$course_id = $this->session->userdata('course_id');
if(isset($obj_session) && !empty($obj_session))
{	
	if($course_id==7)
	{
		redirect('main_letter');
	}
	else
	{
		redirect('main_email');
	}
}  ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Elearn | Objective</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/exam/css/jquery.countdownTimer.css" /> 
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.PNG">
    <style type="text/css">
    	span:hover {
		    background-color: #ACCFED;
		    cursor: pointer;
		}
    </style>
  </head>

<body style="background: url('<?php echo base_url(); ?>assets/exam/img/back.jpg') no-repeat fixed center center / cover ;">
<div class="navbar navbar-fixed-top">
	<div class="navbar navbar-fixed-top">
    	<?php $this->load->view('exam/header'); ?>
	</div> <!-- /navbar -->
</div> <!-- /navbar -->
<div class="main-inner">
	<br><br><br><br><br>
    <div class="container" style="opacity: 0.9;">
	    <div class="row">	      
	      	<div class="span12">
	      		<div id="target-1" class="widget">
	      			<div class="widget-content" style="border-radius: 30px; height: 270px; padding: 1% 10%">
						<form action="javascript:void(0);" rel="save_main_objective" id="test_form" >
				      			<?php if(isset($question_data) && !empty($question_data))
								{
									$i=0;
									foreach ($question_data as $key) 
									{ $i++;
										$question=$key['question'];
										$option=$key['option']; 
										$language=$this->session->userdata("language");
										$question_array[]=$question->question_id;?>
										<div class="card portlet light question question_<?php echo $i; ?> <?php if($i>1) echo 'hide'; ?>">
											<div class="portlet-title" style="margin-bottom: 15px;">
												&nbsp;
												<select class="form-control select2me lang_change" tabindex="1" name="section" style="float: right; width:90px;">
													<option value="English" <?php echo (isset($language) && !empty($language) && ($language=='English'))?'selected="selected"':''; ?>>English</option>
													<option value="Marathi" <?php echo (isset($language) && !empty($language) && ($language=='Marathi'))?'selected="selected"':''; ?>>Marathi</option>
													<option value="Hindi" <?php echo (isset($language) && !empty($language) && ($language=='Hindi'))?'selected="selected"':''; ?>>Hindi</option>
												</select>
											</div>
											<div class="portlet-body" style="min-height:170px;">
												<div class="inline-display que_english que_div"  style="font-size:16px;font-weight:bold; <?php echo (isset($language) && !empty($language) && ($language=='English'))?'':'display:none;'; ?>" >
													<?php $question_eng=strip_tags($question->question);?>
												  	<b>Q<?php echo $i;?>. <?php echo (isset($question_eng) && !empty($question_eng))?$question_eng:'';?></b>
												</div>
												<div class="inline-display que_marathi que_div"  style="font-size:16px;font-weight:bold; <?php echo (isset($language) && !empty($language) && ($language=='Marathi'))?'':'display:none;'; ?>" >
													<?php $question_mar=strip_tags($question->question_mar);?>
												  	<b>Q<?php echo $i;?>. <?php echo (isset($question_mar) && !empty($question_mar))?$question_mar:'';?></b>
												</div>
												<div class="inline-display que_hindi que_div"  style="font-size:16px;font-weight:bold; <?php echo (isset($language) && !empty($language) && ($language=='Hindi'))?'':'display:none;'; ?>" >
													<?php $question_hindi=strip_tags($question->question_hindi); ?>
												  	<b>Q<?php echo $i;?>. <?php echo (isset($question_hindi) && !empty($question_hindi))?$question_hindi:'';?></b>
												</div>
												<p></p>
												<div class="radio-list span4">
													<?php if(isset($option) && !empty($option))
													{
														foreach ($option as $row) 
														{ ?>
															<label style="font-size:14px; cursor: pointer;"> <input style="display: inline;" class="que_option" rel="btn_<?php echo $i; ?>" type="radio" name="answer_<?php echo (isset($question->question_id) && !empty($question->question_id))?$question->question_id:'';?>" id="optionsRadios1" value="<?php echo $row->option_id;?>">&nbsp; <?php echo $row->option;?> </label>
														<?php }
													} ?>
												</div>
											</div>
											<div class="portlet-footer">
												<center>
										      		<?php if($i>1){?>
													<button class="btn blue que_next_prev btn-primary " rel="<?php echo $i-1; ?>" type="button">Previous</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<?php }
													if($i>=count($question_data))
													{  ?>
														<button class="btn blue btn_submit_test btn-success" rel="" type="button" >Submit Test</button>
													<?php }
													else{ ?>
														<button class="btn blue que_next_prev btn-primary " rel="<?php echo $i+1; ?>" type="button" >Next</button>
													<?php }?>
												</center>
											</div>
										</div>
						      		<?php } 
						      	} ?>
						      	<div class="portlet-footer">
							      	<center>
							      		<div class="btn-group" style="margin: 5px;">
											<?php if(isset($question_data) && !empty($question_data))
											{ $i=0;
												foreach ($question_data as $key ) 
												{
													$i++;
													$question=$key['question'];
													$option=$key['option']; ?>														
													<span style="border-radius: 10px; color: red;" rel="<?php echo $i;?>" class="que_next_prev btn_<?php echo $i; ?> <?php echo $i==1?'black':'';?>">&nbsp;&nbsp;<b><?php echo $i;?></b>&nbsp;&nbsp;</span>
												<?php } 
											} ?>
										</div>
									</center>
								</div>
			      			<input type="hidden" name="question_array" value="<?php echo base64_encode(serialize($question_array));?>" />
				      	</form>
		      		</div>
	      		</div>
      		</div>
	    </div>
    </div> 
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/exam/js/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/jquery.countdownTimer.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/common.js"></script>

<script>
	jQuery(document).ready(function() {
	   $(function(){
	        $('#hm_timer').countdowntimer({minutes :25, seconds : 0, timeUp: test_expiry });
	    });
	});
</script>
  </body>
</html>