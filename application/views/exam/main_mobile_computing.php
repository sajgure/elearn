<?php $mobile_session = $this->session->userdata('mobile_data');
if(isset($mobile_session) && !empty($mobile_session))
{   
    redirect('main_result');
} ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Elearn | Mobile Computing</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    <link href="<?php echo base_url(); ?>assets/exam/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/exam/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/exam/css/font-awesome.css" rel="stylesheet">
     
    <link href="<?php echo base_url(); ?>assets/exam/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/exam/css/pages/signin.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/exam/css/jquery.countdownTimer.css" /> 
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/exam/img/favicon.png">
    <style type="text/css">
        .control-group{
            margin-bottom: 10px !important;
        }
        .orange{
            color:white;
            background: orange;
        }
    </style>
</head>
<body style="background: url('<?php echo base_url(); ?>assets/exam/img/back.jpg') no-repeat fixed center center / cover ;">
<div class="navbar navbar-fixed-top">
    <?php $this->load->view('exam/header'); ?>
</div> 
<div class="main-inner">
    <br>
    <div class="container" style="border-radius: 5px; background:rgba(234, 226, 223, 0.9);  margin-top: 10px;">
        <form action="javascript:void(0);" class="row" rel="save_main_mobile_computing" id="test_form" >
            <?php if(isset($question_data) && !empty($question_data))
            { $i=0;
                foreach ($question_data as $key ) 
                {
                    $i++;?> 
                    <input type="hidden" name="que[]" value="<?php echo $key->mobile_id; ?>">
                    <input type="hidden" name="ans[]" class="q<?php echo $i; ?>" value="0">
                    <div class="<?php if($i!=1){ echo 'hide'; } ?> mob_div mob_<?php echo $i; ?>">
                        <div class="span6" style="margin-left: 3.5%">
                            <div class="widget" style="border: 1px solid #1586ff; border-radius: 15px;  margin: 15px 4px;"">
                                <div class="widget-header" style="background: #1586ff; border: 1px solid #1586ff;">
                                    <h3></h3>
                                </div>
                                <div class="widget-content">
                                    <div class="tab-pane" id="formcontrols">
                                        <fieldset>
                                            <h4>Que. <?php echo (isset($key->quesion) && !empty($key->quesion))?$key->quesion:'';?></h4>
                                            <br>
                                            <center><img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($key->folder_name) && !empty($key->folder_name))?$key->folder_name:'';?>/last.png" style="height: 519px; width: 300px; border: 1px solid #eee;" ></center>
                                        </fieldset>
                                    </div>
                                </div>
                                <p style="background:#1586ff;  margin: 0px; height: 5px;">&nbsp;</p>
                            </div>
                        </div>
                        <div class="span6" style="margin-left: 0.3%;">
                            <div class="widget" style="border: 1px solid #1586ff; border-radius: 15px;  margin: 15px 4px;"">
                                <div class="widget-header" style="background: #1586ff; border: 1px solid #1586ff;"> <h3></h3> </div>
                                <div class="widget-content">
                                    <div class="tab-pane" id="formcontrols">
                                        <fieldset>
                                            <center>
                                                <table>
                                                    <tr>
                                                        <th width="25%">
                                                            <?php if($i>1){?>
                                                                <button class="btn blue mob_next_prev btn-primary " rel="<?php echo $i-1; ?>" type="button" style="float:left; line-height: 15px;">Previous</button>
                                                            <?php } ?>
                                                        </th>
                                                        <th width="50%">
                                                            <center>
                                                                <button class="btn btn-default mob_next_prev btn_1 orange" rel="1" style="width: 35px; padding: 4px; margin: 3px; line-height: 15px; border-radius: 25px;" type="button">1</button>
                                                                <button class="btn btn-default mob_next_prev btn_2" rel="2" style="width: 35px; padding: 4px; margin: 3px; line-height: 15px; border-radius: 25px;" type="button">2</button>
                                                                <button class="btn btn-default mob_next_prev btn_3" rel="3" style="width: 35px; padding: 4px; margin: 3px; line-height: 15px; border-radius: 25px;" type="button">3</button>
                                                                <button class="btn btn-default mob_next_prev btn_4" rel="4" style="width: 35px; padding: 4px; margin: 3px; line-height: 15px; border-radius: 25px;" type="button">4</button>
                                                                <button class="btn btn-default mob_next_prev btn_5" rel="5" style="width: 35px; padding: 4px; margin: 3px; line-height: 15px; border-radius: 25px;" type="button">5</button>
                                                            </center>
                                                        </th> 
                                                        <th width="25%">
                                                            <?php if($i>=count($question_data))
                                                            {  ?>
                                                                <button class="btn blue btn_submit_test btn-success" rel="" type="button" style="float:right; line-height: 15px;">Submit Test</button>
                                                            <?php }
                                                            else{ ?>
                                                                <button class="btn blue mob_next_prev btn-primary " rel="<?php echo $i+1; ?>" type="button" style="float:right; line-height: 15px;">Next</button>
                                                            <?php }?>
                                                        </th>
                                                      </tr>
                                                </table>
                                            </center>
                                            <br>
                                            <input type="hidden" name="que_id" value="<?php echo (isset($key->mobile_id) && !empty($key->mobile_id))?$key->mobile_id:'';?>">
                                            <iframe src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($key->folder_name) && !empty($key->folder_name))?$key->folder_name:'';?>/ans.php" height="515px" width="100%" style="border:none; margin-top: -14px;"></iframe>
                                        </fieldset>
                                    </div>
                                </div>
                                <p style="background:#1586ff;  margin: 0px; height: 5px;">&nbsp;</p>
                            </div>
                        </div>
                    </div>
                <?php } 
            } ?>
        </form>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/exam/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/exam/js/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>0
<script src="<?php echo base_url(); ?>js/gmap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/jquery.countdownTimer.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/common.js"></script>
<script>
    jQuery(document).ready(function() {
       $(function(){
            $('#hm_timer').countdowntimer({minutes :5, seconds : 0, timeUp: test_expiry });
        });
    });
</script>
</body>

</html>
