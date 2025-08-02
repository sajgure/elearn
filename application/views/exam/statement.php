<?php if($this->authentication->chk_login()==FALSE)redirect('index'); ?>
<?php $statement_session = $this->session->userdata('statement_id');
if(isset($statement_session) && !empty($statement_session))
{   
    redirect('main_speed');
}  ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Elearn | Statement</title>
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
        <div id="successMessage" class="is-countdown" style="width: 100%; position: absolute; height: 108%; z-index: 99999;background: #fff; top: 0px;"><br><br><br><br>
            <span class="is-count" style="margin: 10px; font-size: 27px; font-weight: bold; color: #000; "><center><img src="<?php echo base_url(); ?>assets/exam/img/loading.gif"> <br><br><br><br><br> <div style="display: none; background: #EAE2DF; border-color: #EAE2DF; color: #000;" class="time"></div ><p></p></span>
        </div>
        <form action="javascript:void(0);" rel="save_main_statement" id="test_form" runat="server" style="margin: 0px !important;" >
            <p style="background: #010101; color: #fff; margin-bottom: 0px;">&nbsp;&nbsp;&nbsp;&nbsp;<b>Name:</b> <?php echo $stud_data->stud_name.' '.$stud_data->stud_father_name.' '.$stud_data->stud_last_name; ?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Seat No:</b> <?php echo (isset($stud_data->stud_seat_no) && !empty($stud_data->stud_seat_no))?$stud_data->stud_seat_no:''?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Course:</b> GCC-TBC <?php echo (isset($stud_data->course_lang) && !empty($stud_data->course_lang))? $stud_data->course_lang :'';?> <?php echo (isset($stud_data->course_name) && !empty($stud_data->course_name))? $stud_data->course_name :'';?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Timer:</b> <span  style="color: red; border: solid 1px; padding: 7px; font-size: 20px;" id="hm_timer"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button id="statement_practice" class="btn blue btn_submit_test btn-success" style="margin-top: 1px;" rel="" style="margin: 0px;"></i>Submit</button> </p>
            <div>
                <div class="span6" style="margin-left: 0px; width:50%;">
                    <div class="col-md-6" style="min-height:610px;pointer-events:none; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;">
                        <?php if(isset($statement_data) && !empty($statement_data))
                        { $statement_base64= $statement_data->statement_base64; ?>
                            <div style="height: 610px; width: 100%">
                                <object type="application/x-silverlight-2" height="100%" width="100%;">
                                <param name="source" value="<?php echo base_url(); ?>uploads/xap/excel.xap"/>
                                <param name="initParams" value="title=MSCEIA DEMO EXAM,iseditable=false,base64result=<?php echo $statement_data->statement_base64;?>">
                            </object>
                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="span6" style="margin-left: 0px; width:50%;">
                    <input type="hidden" class="form-control" name="excel_id" id="excel_id" value="<?php echo (isset($statement_data->statement_id) && !empty($statement_data->statement_id) )?$statement_data->statement_id:''; ?>" >
                    <div id="silverlightControlHost" style="height: 610px; width: 100%">
                        <object id="statement"  data="data:application/x-silverlight-2," type="application/x-silverlight-2" height="100%" width="100%;">
                            <param name="source" value="uploads/xap/excel.xap"/>
                            <param name="onError" value="onSilverlightError">
                            <param name="background" value="white">
                            <param name="minRuntimeVersion" value="5.0.61118.0">
                            <param name="onLoad" value="silverlightLoaded">
                            <param name="autoUpgrade" value="true">
                            <param name="initParams" value="title=MSCEIA DEMO EXAM,iseditable=true,urlPath=<?php echo base_url();?>save_main_statement_data">
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
<!-- <script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script> -->
<?php $course_id=$this->session->userdata('course_id'); ?>
<script>
    jQuery(document).ready(function() {   
        $('.time').countdowntimer({minutes :0, seconds : 1, timeUp: word_test});
        function word_test()       
        {
            setTimeout(function() {
                $("#successMessage").hide();
                <?php if($course_id==7) {?>
                    $('#hm_timer').countdowntimer({minutes :23, seconds : 0, timeUp: test_expiry });
                <?php }
                else
                { ?>
                    $('#hm_timer').countdowntimer({minutes :20, seconds : 0, timeUp: test_expiry });
                <?php } ?>
            });
        }
    });
</script>
</body>

</html>
