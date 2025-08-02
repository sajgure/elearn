<?php $email_session = $this->session->userdata('email_data');
if(isset($email_session) && !empty($email_session))
{   
    redirect('main_letter');
} ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Elearn | Email</title>

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
    </style>
</head>
<body style="background: url('<?php echo base_url(); ?>assets/exam/img/back.jpg') no-repeat fixed center center / cover ;">
<div class="navbar navbar-fixed-top">
    <?php $this->load->view('exam/header'); ?>
</div> 
<div class="main-inner">
    <br>
    <div class="container" style="border-radius: 5px; background:rgba(234, 226, 223, 0.9);  margin-top: 10px;">
        <div class="row">
            <div class="span6" style="margin-left: 3.5%">
                <div class="widget" style="border: 1px solid #1586ff; border-radius: 15px;  margin: 15px 4px;">
                    <div class="widget-header" style="background: #1586ff; border: 1px solid #1586ff;">
                        <h3></h3>
                    </div>
                    <div class="widget-content">
                        <table style="width: 100%;">
                            <tr>
                                <td width="15%">Mail to:</td>
                                <td><input class="span5" readonly id="appendedPrependedInput" type="text" value="<?php echo (isset($email->to) && !empty($email->to) )?$email->to:''; ?>" style="pointer-events:none; user-select: none; width: 100%;"  ></td>
                            </tr>
                            <?php if(isset($email->course_id) && !empty($email->course_id) && ($email->course_id=='4' || $email->course_id=='5' || $email->course_id=='6'))
                            { ?>
                                <tr>
                                    <td width="15%">CC:</td>
                                    <td><input class="span5" readonly id="appendedPrependedInput" type="text" value="<?php echo (isset($email->cc) && !empty($email->cc) )?$email->cc:''; ?>" style="pointer-events:none; user-select: none; width: 100%;" ></td>
                                </tr>
                                <tr>
                                    <td width="15%">BCC:</td>
                                    <td><input class="span5" readonly id="appendedPrependedInput" type="text" value="<?php echo (isset($email->bcc) && !empty($email->bcc) )?$email->bcc:''; ?>" style="pointer-events:none; user-select: none; width: 100%;" ></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td width="15%">Subject:</td>
                                <td><input class="span5 " readonly id="appendedPrependedInput" type="text"  value="<?php echo (isset($email->subject) && !empty($email->subject) )?$email->subject:''; ?>" style="pointer-events:none; user-select: none; width: 100%;" ></td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea style="pointer-events:none; user-select: none; width: 100%;"  readonly class="inbox-editor inbox-wysihtml5  form-control que" name="message" rows="6"><?php echo (isset($email->message) && !empty($email->message) )?trim($email->message):''; ?></textarea></td>
                            </tr>
                            <tr>
                                <td width="15%">Attachment:</td>
                                <td><div class="input-append">
                                    <input class="span2 m-wrap" id="appendedInputButton" type="text" readonly value="<?php echo (isset($email->attachment_file) && !empty($email->attachment_file) )?$email->attachment_file:''; ?>">
                                    <span class="add-on  icon-paper-clip " style="margin-top: -10px;"></span>
                                    </div>
                                </td>
                            </tr>
                            <?php if(isset($email->course_id) && !empty($email->course_id) && ($email->course_id=='4' || $email->course_id=='5' || $email->course_id=='6'))
                            { ?>
                            <tr>
                                <td width="15%">Attachment:</td>
                                <td><div class="input-append">
                                    <input class="span2 m-wrap" id="appendedInputButton" type="text" readonly value="<?php echo (isset($email->attachment_file1) && !empty($email->attachment_file1) )?$email->attachment_file1:''; ?>">
                                    <span class="add-on  icon-paper-clip " style="margin-top: -10px;"></span>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                        <center><p><button class=" btn btn-success btn-large" style="height: 30px; padding-top: 2px;" disabled>send</button></p></center>
                    </div>
                    <p style="background:#1586ff;  margin: 0px; height: 5px;">&nbsp;</p>
                </div>
            </div>
            <div class="span6" style="margin-left: 0.3%;">
                <div class="widget" style="border: 1px solid #1586ff; border-radius: 15px;  margin: 15px 4px;"">
                    <div class="widget-header" style="background: #1586ff; border: 1px solid #1586ff;"> <h3></h3> </div>
                    <div class="widget-content">
                        <form action="javascript:void(0);" rel="save_main_email" id="test_form" style="margin:0;" >
                            <input  type="hidden" name="email_id" value="<?php echo (isset($email->email_id) && !empty($email->email_id) )?$email->email_id:''; ?>" >
                            <table style="width: 100%;">
                                <tr>
                                    <td width="15%">Mail to:</td>
                                    <td><input class="span5" autocomplete="off" style="width: 100%;" id="appendedPrependedInput" type="text" value="" name="to" >
                                        <input class="span5 marks" type="hidden" name="marks"><input class="span5 tmarks" type="hidden" name="tmarks" value="1"><input class="span5 deduct" type="hidden" name="deduct" value="0.5"></td>
                                </tr>
                                <?php if(isset($email->course_id) && !empty($email->course_id) && ($email->course_id=='4' || $email->course_id=='5' || $email->course_id=='6'))
                                { ?>
                                    <tr>
                                        <td width="15%">CC:</td>
                                        <td><input style="width: 100%;" class="span5" autocomplete="off" id="appendedPrependedInput" type="text" name="cc"></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">BCC:</td>
                                        <td><input class="span5" autocomplete="off" style="width: 100%;" id="appendedPrependedInput" type="text" name="bcc"></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td width="15%">Subject:</td>
                                    <td><input style="width: 100%;" class="span5" autocomplete="off" name="subject" value=""  id="appendedPrependedInput" type="text"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea style="width: 100%;" autocomplete="off" class="tabkey inbox-editor inbox-wysihtml5 form-control ans" name="message" rows="6"></textarea></td>
                                </tr>
                                <tr>
                                    <td width="15%">Attachment:</td>
                                    <td><div class="input-append input-group">
                                        <input  id="appendedPrependedInput" type="text" class="attachment_file span2 m-wrap" name="attachment_file" readonly>
                                        <span class="add-on  icon-paper-clip attachment_btn" style="cursor: pointer; margin-top: -10px;"></span>
                                        </div>
                                    </td>
                                </tr>
                                <?php if(isset($email->course_id) && !empty($email->course_id) && ($email->course_id=='4' || $email->course_id=='5' || $email->course_id=='6'))
                                { ?>
                                    <tr>
                                        <td width="15%">Attachment:</td>
                                        <td><div class="input-append input-group">
                                            <input  id="appendedPrependedInput" type="text" class="attachment_file span2 m-wrap" name="attachment_file1" readonly>
                                            <span class="add-on  icon-paper-clip attachment_btn" style="cursor: pointer; margin-top: -10px;"></span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <center><p><button id="SubmitWord" class="btn blue btn_submit_test btn-success" rel=""></i>Send</button></p></center>
                        </form>
                    </div>
                    <p style="background:#1586ff;  margin: 0px; height: 5px;">&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/exam/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/exam/js/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/common.js"></script>
<script src="<?php echo base_url(); ?>js/gmap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/jquery.countdownTimer.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script> -->
<script>
    jQuery(document).ready(function() {
       $(function(){
            $('#hm_timer').countdowntimer({minutes :5, seconds : 0, timeUp: test_expiry });
        });
    });
</script>
</body>

</html>
