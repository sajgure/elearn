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
    <style type="text/css">
		#myProgress {
		  width: 50%;
		  height: 10px;
		  border-radius: 20px;
		  background-color: #ddd;
		}

		#myBar {
		  width: 1%;
		  height: 10px;
		  border-radius: 20px;
		  background-color: #00BA8B;
		}
    </style>
  </head>

<body style="background: url('<?php echo base_url(); ?>assets/exam/img/back.jpg') no-repeat fixed center center / cover ;">
<div id="successMessage" class="is-countdown" style="width: 100%; position: fixed; height: 108%; z-index: 99999;background-image : url('<?php echo base_url(); ?>assets/img/splash.jpg'); background-repeat: no-repeat; background-size: 100% 108%; top: 0px;">
    <span class="is-count" style="margin: 10px; font-size: 27px; font-weight: bold; color: #000; "><br><center>
    <img src="<?php echo base_url(); ?>assets/img/headphones.png" alt="MSCEIA" style="width: 20%; margin: 1px 0px;"><br><br>कृपया तुमचा हेडफोन संगणकाला जोडा आणी हेडफोन चालू आहे का ते तपासा. <br><br><br> <div style="font-size: 47px; border-color: #EAE2DF; color: #000;" class="time"></div ><p></p></center></span>
</div>
<div class="navbar navbar-fixed-top">
	<div class="navbar navbar-fixed-top">
    	<?php $this->load->view('exam/header'); ?>
	</div> <!-- /navbar -->
</div> <!-- /navbar -->
<div class="main-inner">
	<br><br><br><br><br>
    <div class="container" style="opacity: 1;">
	    <div class="row">	      
	      	<div class="span12">
	      		<div id="target-1" class="widget">
	      			<div class="widget-content" style="border-radius: 20px; height: 270px; padding: 1% 10%">
						<form action="javascript:void(0);" rel="save_main_shorthand_section2" id="test_form" >
							<div class="portlet-body " style="min-height:385px;">
								<br>
								<center>
									<span style="color: #19BC9C; font-size: 35px;"><b>Section B</b></span><br><br>
									<h3>Please hear audio proper</h3>
									<br><br>
									<input type="hidden" name="section2_que" value="<?php echo (isset($section_data->shorthand_id) && !empty($section_data->shorthand_id) )?$section_data->shorthand_id:''; ?>">
									<audio id="audio" style="width: 70%; height: 50px;">
									 <source src="<?php echo base_url(); ?>uploads/shorthand/<?php echo $section_data->quesion ?>" type="audio/ogg">
									</audio>
								</center>
								<div id="myProgress" style="margin:auto;">
									<div class="progress-bar progress-bar-striped active" id="myBar"></div>
								</div>
								<br><br>
								<center><img style="width: 10%; height: 80px;" src="<?php echo base_url(); ?>assets/img/note.png"></center>
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

        $('.time').countdowntimer({minutes :1, seconds : 0, timeUp: sh_test});
        
        function sh_test()      
        {
            setTimeout(function() {
                $("#successMessage").hide()
                $('#hm_timer').countdowntimer({minutes : 4, seconds : 0, timeUp: test_expiry});
                $("#audio").attr("autoplay","true");                
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 2420);
                function frame()
                {
                    if (width >= 100)
                    {
                        clearInterval(id);
                    } else {
                        width++;
                        elem.style.width = width + '%';
                    }
                }
            });
        }
</script>
  </body>
</html>