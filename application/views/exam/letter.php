<?php if($this->authentication->chk_login()==FALSE)redirect('index'); ?>
<?php $letter_session = $this->session->userdata('letter_id');
if(isset($letter_session) && !empty($letter_session))
{   
    redirect('main_statement');
}  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Elearn | Letter</title>
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
<div class="navbar navbar-fixed-top"> 
    <div class="navbar navbar-fixed-top">
        <div id="successMessage" class="is-countdown" style="width: 100%; position: absolute; height: 120%; z-index: 99999;background: #fff; top: 0px;"><br><br><br><br>
            <span class="is-count" style="margin: 10px; font-size: 27px; font-weight: bold; color: #000; "><center><img src="<?php echo base_url(); ?>assets/exam/img/loading.gif"> <br><br><br><br><br> <div style="display: none; background: #EAE2DF; border-color: #EAE2DF; color: #000;" class="time"></div ><p></p></span>
        </div>
        <form action="javascript:void(0);" rel="save_main_letter" id="test_form" runat="server">
            <p style="background: #010101; color: #fff; margin-bottom: 0px;">&nbsp;&nbsp;&nbsp;&nbsp;<b>Name:</b> <?php echo $stud_data->stud_name.' '.$stud_data->stud_father_name.' '.$stud_data->stud_last_name; ?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Seat No:</b> <?php echo (isset($stud_data->stud_seat_no) && !empty($stud_data->stud_seat_no))?$stud_data->stud_seat_no:''?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Course:</b> GCC-TBC <?php echo (isset($stud_data->course_lang) && !empty($stud_data->course_lang))? $stud_data->course_lang :'';?> <?php echo (isset($stud_data->course_name) && !empty($stud_data->course_name))? $stud_data->course_name :'';?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Timer:</b> <span  style="color: red; border: solid 1px; padding: 5px; font-size: 20px;" id="hm_timer"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button id="letter_practice" class="btn blue btn_submit_test btn-success" style="margin-top: 1px;" rel="" style="margin: 0px;"></i>Submit</button> </p>
            <div>
                <div class="span6" style="margin-left: 0px; width:50%;">
                    <div class="col-md-6" style="min-height:780px;pointer-events:none; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;">
                        <?php if(isset($letter_data) && !empty($letter_data))
                        { $statement_base64= $letter_data->letter_base64; ?>
                            <div style="height: 850px; width: 100%">
                                <object   type="application/x-silverlight-2" height="100%" width="100%;">
                                    <param name="source" value="uploads/xap/letter.xap"/>
                                    <param name="initParams" value="title=MSCEIA DEMO EXAM,iseditable=false,base64result=<?php echo $statement_base64;?>">
                                </object>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="span6" style="margin-left: 0px; width:50%;">
                    <input type="hidden" class="form-control" name="word_id" id="word_id" value="<?php echo (isset($letter_data->letter_id) && !empty($letter_data->letter_id) )?$letter_data->letter_id:''; ?>" >
                    <div id="silverlightControlHost" style="height: 850px; width: 100%">
                        <object id="letter" data="data:application/x-silverlight-2," type="application/x-silverlight-2" height="100%" width="100%;">
                            <param name="source" value="uploads/xap/letter.xap"/>
                            <param name="onError" value="onSilverlightError">
                            <param name="background" value="white">
                            <param name="minRuntimeVersion" value="5.0.61118.0">
                            <param name="onLoad" value="silverlightLoaded">
                            <param name="initParams" value="title=MSCEIA DEMO EXAM,iseditable=true,urlPath=<?php echo base_url();?>save_main_letter_data">
                        </object>
                        <iframe id="_sl_historyFrame" style="visibility:hidden;height:0px;width:0px;border:0px"></iframe>
                    </div>
                </div>
            </div>
        </form>
    </div> <!-- /navbar -->
</div> <!-- /navbar -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/exam/js/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/common.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/jquery.countdownTimer.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script>
<script>
    jQuery(document).ready(function() {   
        document.body.style.zoom = "90%" 
        $('.time').countdowntimer({minutes :0, seconds : 10, timeUp: word_test});
        function word_test()       
        {
            setTimeout(function() {
                $("#successMessage").hide()
                $('#hm_timer').countdowntimer({minutes :30, seconds : 0, timeUp: test_expiry });
            });
        }
    });
</script>
</body>

</html>
