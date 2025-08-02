<?php $passage_data = $this->session->userdata('passage_data');
$course_id = $this->session->userdata('course_id');
if(isset($passage_data) && !empty($passage_data))
{   
    if($course_id==7)
    {
        redirect('mobile_computing');
    }
    else
    {
        redirect('result');  
    }
}  ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Elearn | Speed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/bootstrap-responsive.min.css" rel="stylesheet">
     
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/exam/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/exam/css/jquery.countdownTimer.css" /> 
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/exam/img/favicon.PNG">
</head>
<body>
<form action="javascript:void(0);" rel="save_main_speed" id="test_form" style="margin:0;">
<div class="navbar navbar-fixed-top">
    <div class="navbar navbar-fixed-top">
        <div id="successMessage" class="is-countdown" style="width: 100%; position: absolute; height: 108%; z-index: 99999;background: #EAE2DF; top: 0px;"><br><br><br><br><br>
            <span class="is-count" style="margin: 10px; font-size: 47px; font-weight: bold; color: #000; "><br><br><br><center>15 सेकंदात गती उतारा चालू होईल. <br><br><br><br><br> <div style="font-size: 47px; background: #EAE2DF; border-color: #EAE2DF; color: #000;" class="time"></div ><p></p></center></span>
        </div>
        <p style="background: #010101; color: #fff; margin-bottom: 0px;">&nbsp;&nbsp;&nbsp;&nbsp;<b>Name:</b> <?php echo $stud_data->stud_name.' '.$stud_data->stud_father_name.' '.$stud_data->stud_last_name; ?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Seat No:</b> <?php echo (isset($stud_data->stud_seat_no) && !empty($stud_data->stud_seat_no))?$stud_data->stud_seat_no:''?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Course:</b> GCC-TBC <?php echo (isset($stud_data->course_lang) && !empty($stud_data->course_lang))? $stud_data->course_lang :'';?> <?php echo (isset($stud_data->course_name) && !empty($stud_data->course_name))? $stud_data->course_name :'';?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Timer:</b> <span  style="color: red; border: solid 1px; padding: 5px; font-size: 20px;" id="hm_timer"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn blue btn_submit_test btn-success" rel="" style="margin: 0px;"></i>Submit</button> 
        <span style="float: right;">
        </span>
        </p>
    </div> 
</div>
<br>
<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span6">
                <?php if(isset($speed_data) && !empty($speed_data)) 
                {  ?> 
                    <textarea  rows="21"  style="text-align:justify; padding:10px; width: 100%;  font-size:16px !important; line-height: 2;  pointer-events:none; -moz-user-select: none;-ms-user-select: none;user-select: none; " class="que"><?php echo (isset($speed_data->passage) && !empty($speed_data->passage))?$speed_data->passage:'';?></textarea > 
                <?php }?>
            </div>
            <div class="span6">
                <?php $stud_id = $this->session->userdata('stud_id'); ?>
                <input class="span5 backcount" type="hidden" name="backspace"><input class="span5 delcount" type="hidden" name="delete">
                <input class="span5 marks" type="hidden" name="marks"><input class="span5 tmarks" type="hidden" name="tmarks" value="40"><input class="span5 deduct" type="hidden" name="deduct" value="1">
                <input type="hidden" class="form-control " name="passage_id" id="passage_id" value="<?php echo (isset($speed_data->speed_id) && !empty($speed_data->speed_id) )?$speed_data->speed_id:''; ?>" >
                <textarea autofocus spellcheck="false" style="padding:10px; width: 95%; resize:none; font-size: 16.5px !important; line-height: 1.5;" class="ans passage_text tabkey form-control back_del"  rows="20" name="passage_text" id="typingTest"></textarea>
            </div>
        </div>
    </div>
</div>
</form>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/exam/js/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/gmap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/jquery.countdownTimer.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/common.js"></script>
<script>
    jQuery(document).ready(function() { 
    window.history.forward();  
    });
    $(this).scrollTop(0);
    var handicap = "<?php echo $this->session->userdata('handicap');?>";
    $('.time').countdowntimer({minutes :0, seconds : 15, timeUp: speed_test});
    function speed_test()      
    {
        $('.passage_text').removeAttr('readonly');
        if(handicap =='Yes')
        {   
            setTimeout(function() {
                $("#successMessage").hide()
                $('#hm_timer').countdowntimer({minutes :10, seconds : 0, timeUp:  test_expiry});
            });
        }
        else
        {
            setTimeout(function() {
                $("#successMessage").hide()
                $('#hm_timer').countdowntimer({minutes :7, seconds : 0, timeUp: test_expiry});
            });
        }
    }
    
</script>
</body>

</html>
