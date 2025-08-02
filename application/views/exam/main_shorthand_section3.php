<?php $obj_session = $this->session->userdata('obj_data');
if(isset($obj_session) && !empty($obj_session))
{	
	redirect('main_email');
}  ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Elearn | Shorthand Section Two</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.PNG">
  </head>

<body style="background: url('<?php echo base_url(); ?>assets/exam/img/back.jpg') no-repeat fixed center center / cover ;">
<div id="successMessage" class="is-countdown" style="width: 100%; position: fixed; height: 108%; z-index: 99999;background-image : url('<?php echo base_url(); ?>assets/img/splash.jpg'); background-repeat: no-repeat; background-size: 100% 108%; top: 0px;">
    <span class="is-count" style="margin: 10px; font-size: 27px; font-weight: bold; color: #000; "><br><center>
    <img src="<?php echo base_url(); ?>assets/img/keyboard.png" alt="MSCEIA" style="width: 20%; margin: 1px 0px;"><br><br>2 मिनिटात विभाग चालू होईल. <br><br><br> <div style="font-size: 47px; border-color: #EAE2DF; color: #000;" class="time"></div ><p></p></center></span>
</div>
<div class="navbar navbar-fixed-top">
	<div class="navbar navbar-fixed-top">
    	<?php $this->load->view('exam/header'); ?>
	</div> <!-- /navbar -->
</div> <!-- /navbar -->
<div class="main-inner">
	<br><br>
    <div class="container" style="opacity: 1;">
	    <div class="row">	      
	      	<div class="span12">
	      		<div id="target-1" class="widget">
	      			<div class="widget-content" style="border-radius: 20px; height: 470px; padding: 3%">
						<form action="javascript:void(0);" rel="save_main_shorthand_section3" id="test_form" >
							<div class="portlet-body " style="min-height:430px;">
								<center>
									<div class="portlet-body section1" >
							        	<span style="color: #19BC9C; font-size: 20px;"><b >Passage 1 :</b> Please type hear proper</span><br>
										</br>
							        	<div class="inbox-form-group control-group">
											<textarea style="width: 99%;height:360px;" autofocus autocomplete="off" class="tabkey inbox-editor inbox-wysihtml5 form-control <?php echo $this->session->userdata('class'); ?> " name="section_3" rows="10"></textarea>
										</div>
										<!-- <button class="btn sectiona btn-success" rel="" type="button" style="float:left; width: 100px; height: 33px;">Passage 1</button> -->
										<span style="float: right;">
											<button class="btn sectionb btn-success" rel="" type="button" style="width: 100px; height: 33px;">Passage 2</button>
											<button class="btn blue sectionb btn-success" rel="" type="button" style="width: 100px; height: 33px;">submit</button>
										</span>
									</div>
									<div class="portlet-body section2" style="display: none">
										<span style="color: #19BC9C; font-size: 20px;"><b >Passage 2 :</b> Please type hear proper</span><br>
										</br>
							        	<div class="inbox-form-group control-group">
											<textarea style="width: 99%;height:360px;" autofocus autocomplete="off" class="tabkey inbox-editor inbox-wysihtml5 form-control <?php echo $this->session->userdata('class'); ?> " name="section_4" rows="10"></textarea>
										</div>
										<span style="float: right;">
											<button class="btn sectiona btn-success" rel="" type="button" style="width: 100px; height: 33px;">Passage 1</button>
											<button class="btn blue btn_submit_test btn-success" rel="" type="button" style="width: 100px; height: 33px;">submit</button>
										</span>
									</div>
								</center>
							</div>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.countdownTimer.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/common.js"></script>
<script>
	jQuery(document).ready(function() { 
        window.history.forward();  
        });

        $('.time').countdowntimer({minutes :2, seconds : 0, timeUp: sh_test});
        
        function sh_test()      
        {
            $('.passage_text').removeAttr('readonly');
	   		setTimeout(function() {
		   		$("#successMessage").hide()
				<?php $course_id=$this->session->userdata('course_id'); ?>
		   		<?php if($course_id==8 || $course_id==12)
                { ?>
                    $('#hm_timer').countdowntimer({hours :  1, minutes : 15, seconds : 0, timeUp: test_expiry});
                <?php }
                else if($course_id==9 || $course_id==13)
                { ?>
                    $('#hm_timer').countdowntimer({hours :  1, minutes : 40, seconds : 0, timeUp: test_expiry});
                <?php }
                else if($course_id==10 || $course_id==14)
                { ?>
                    $('#hm_timer').countdowntimer({hours :  2, minutes : 0, seconds : 0, timeUp: test_expiry});
                <?php }
                else if($course_id==11 || $course_id==15)
                { ?>
                    $('#hm_timer').countdowntimer({hours :  2, minutes : 30, seconds : 0, timeUp: test_expiry});
		   		<?php } ?>
		   	});
        }
</script>
  </body>
</html>