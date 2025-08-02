<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Elearn | Email Practice</title>
        <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"  type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-touchspin/style-shop.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/img/favicon.png" rel="shortcut icon"/>
    </head>

    <body class="page-md page-header-fixed page-sidebar-closed">
        <?php include('header.php'); ?>
        <div class="page-container">
        	<?php include('sidebar.php'); ?>
            <?php $url=$this->uri->segment(1); ?>
        	<?php $time=$this->uri->segment(2); ?>
        	<div class="page-content-wrapper dump">
        		<div class="page-content">
        			<div class="col-md-6">
        				<div class="portlet light">
                            <div class="portlet-title light">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="caption caption-md">
                                            <i class="fa fa-envelope font-blue"></i>    
                                            <span class="caption font-blue caption-subject bold uppercase"> Email Practice <i class="fa fa-angle-right"></i> Question</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-icon " style="float: right;">
                                            <div class="product-quantity" style="margin-right: 5px;">
                                                <input style="height:21px; font-size: 13px;" type="text" value="<?php echo $this->uri->segment(3); ?>"  max="<?php echo (isset($email->cnt) && !empty($email->cnt) )?trim($email->cnt):''; ?>" class="form-control input-sm jump_to_val" placeholder="Question Number">
                                            </div>      
                                            <button style="padding: 2px; " type="button" class="btn green btn-xs jump_to" data-url="<?php echo $url; ?>/<?php echo $time; ?>"><i style="font-size: 10px;" class="icon-arrow-right " ></i></button>
                                        </div>
                                    </div>
                                </div>    
                            </div>
        					<div class="portlet-body form">
        						<div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"> TO </span>
                                        <input type="text" id="to" name="to" class="form-control" readonly value="<?php echo (isset($email->to) && !empty($email->to) )?$email->to:''; ?>" style="pointer-events:none; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;">
                                    </div>
                                </div>
                                <div class="form-group" style="<?php echo(isset($email->course_id) && !empty($email->course_id) && ($email->course_id=='4' || $email->course_id=='5' || $email->course_id=='6'))?'display:block':'display:none'; ?>">
                                    <div class="input-group">
                                        <span class="input-group-addon"> CC </span>
                                        <input type="text" id="cc" name="cc" class="form-control" readonly value="<?php echo (isset($email->cc) && !empty($email->cc) )?$email->cc:''; ?>" style="text-align:justify;pointer-events:none; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;">
                                    </div>
                                </div>
                                <div class="form-group" style="<?php echo(isset($email->course_id) && !empty($email->course_id) && ($email->course_id=='4' || $email->course_id=='5' || $email->course_id=='6'))?'display:block':'display:none'; ?>">
                                    <div class="input-group">
                                        <span class="input-group-addon"> BCC </span>
                                        <input type="text" id="bcc" name="bcc" class="form-control" readonly  value="<?php echo (isset($email->bcc) && !empty($email->bcc) )?$email->bcc:''; ?>" style="text-align:justify;pointer-events:none; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"> Subject </span>
                                        <input type="text" id="subject" name="subject" class="form-control" readonly value="<?php echo (isset($email->subject) && !empty($email->subject) )?$email->subject:''; ?>" style="-webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    Message
                                    <div class="input-group" style=" width: 100%;">
                                        <textarea style="-webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;" readonly class="que form-control <?php echo (isset($language) && !empty($language) && $language!='2' )?'marathi':'';?>" name="message" rows="6"><?php echo (isset($email->message) && !empty($email->message) )?trim($email->message):''; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-md-6">
                                        Attachment
                                        <div class="input-group ">
                                            <input type="text" name="attachment_file" class="form-control" readonly value="<?php echo (isset($email->attachment_file) && !empty($email->attachment_file) )?$email->attachment_file:'';?>">
                                            <span class="input-group-addon" style="cursor: pointer;"><i class="fa fa-paperclip"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="float: right; <?php echo(isset($email->course_id) && !empty($email->course_id) && ($email->course_id=='4' || $email->course_id=='5' || $email->course_id=='6'))?'display:block':'display:none'; ?>">
                                        Attachment
                                        <div class="input-group ">
                                            <input type="text" name="attachment_file" class="form-control" readonly value="<?php echo (isset($email->attachment_file1) && !empty($email->attachment_file1) )?$email->attachment_file1:''; ?>">
                                            <span class="input-group-addon" style="cursor: pointer;"><i class="fa fa-paperclip"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-actions">
                                    <center><button type="submit" class="btn btn-sm btn-success" disabled>&nbsp;&nbsp;Send&nbsp;&nbsp;</button></center>
                                </div>
        					</div>
        				</div>
        				<!-- END SAMPLE FORM PORTLET-->
        			</div>
        			<div class="col-md-6">
        				<!-- BEGIN SAMPLE FORM PORTLET-->
        				<div class="portlet light">
        					<div class="portlet-title">
                                <div class="row">
                                    <?php if($time=='no') { ?> <div class="col-sm-5"> <?php } else { ?> <div class="col-sm-9"> <?php } ?>
                                        <i class="fa fa-envelope font-blue"></i>
                                        <span class="caption font-blue caption-subject bold uppercase"> Email Practice <i class="fa fa-angle-right"></i> Answer</span>
                                    </div>
                                    <?php if($time=='yes') { ?>
                                        <div class="col-sm-3">
                                        	<button type="button" class="btn btn-sm btn-outline-primary" style="padding: 1px 5px;  margin: 0px; float: right; font-size: 14px; color: #F14C39;"><b><span id="hm_timer"></span></b></button>
                                        </div>
                                    <?php } ?>
                                </div>
        					</div>
        					<div class="portlet-body form" style="margin-left: 12px; margin-right: 12px;">
        				        <form action="javascript:void(0);" class="form-horizontal" rel="save_email_practice" id="test_form" >
                                    <input  type="hidden" name="email_id" value="<?php echo (isset($email->email_id) && !empty($email->email_id) )?$email->email_id:''; ?>" >
                                    <input type="hidden" name="time" value="<?php echo $time; ?>">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"> TO </span>
                                            <input type="text" id="to" name="to" class="form-control">
                                            <input class="marks" type="hidden" name="marks"><input class="tmarks" type="hidden" name="tmarks" value="1"><input class="deduct" type="hidden" name="deduct" value="0.5">
                                        </div>
                                    </div>
                                    <div class="form-group" style="<?php echo(isset($email->course_id) && !empty($email->course_id) && ($email->course_id=='4' || $email->course_id=='5' || $email->course_id=='6'))?'display:block':'display:none'; ?>">
                                        <div class="input-group">
                                            <span class="input-group-addon"> CC </span>
                                            <input type="text" id="cc" name="cc" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group" style="<?php echo(isset($email->course_id) && !empty($email->course_id) && ($email->course_id=='4' || $email->course_id=='5' || $email->course_id=='6'))?'display:block':'display:none'; ?>">
                                        <div class="input-group">
                                            <span class="input-group-addon"> BCC</span>
                                            <input type="text" id="bcc" name="bcc" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"> Subject</span>
                                            <input type="text" id="subject" name="subject" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         Message
                                        <div class="input-group" style="width: 100%;">
                                            <textarea class=" inbox-editor inbox-wysihtml5 form-control ans tabkey" name="message" rows="6" ></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-left: -30px;">
                                        <div class="col-md-6">
                                            Attachment
                                            <div class="input-group ">
                                                <input type="text" name="attachment_file" class="form-control attachment_file" readonly >
                                                <span class="input-group-addon attachment_btn" style="cursor: pointer;"><i class="fa fa-paperclip"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="float: right; <?php echo(isset($email->course_id) && !empty($email->course_id) && ($email->course_id=='4' || $email->course_id=='5' || $email->course_id=='6'))?'display:block':'display:none'; ?>" >
                                            Attachment
                                            <div class="input-group">
                                                <input type="text" name="attachment_file1" class="form-control attachment_file" readonly>
                                                <span class="input-group-addon attachment_btn" style="cursor: pointer;"><i class="fa fa-paperclip"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-actions">
                                        <center><button type="button" class="btn btn-sm btn-success btn_submit_test">&nbsp;&nbsp;Send&nbsp;&nbsp;</button></center>
                                    </div>
                                </form>
        					</div>
        				</div>
        				<!-- END SAMPLE FORM PORTLET-->
        			</div>
        		</div>
        	</div>
        </div>
        <?php include('footer.php'); ?>	
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.countdownTimer.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js" type="text/javascript" ></script>
        <script src="<?php echo base_url(); ?>js/gmap.js"></script>
        <script src="<?php echo base_url(); ?>js/disable_all.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/common.js" type="text/javascript"></script>
        <script>
            jQuery(document).ready(function() {     
               	Metronic.init();
               	Layout.init();
            });
        </script>
        <?php if(isset($time) && !empty($time) && ($time)=='yes') { ?>
            <script>
                jQuery(document).ready(function() {
                   $(function(){
                        $('#hm_timer').countdowntimer({minutes :5, seconds : 0, timeUp: test_expiry });
                    });
                });
            </script>
        <?php } else { ?>
            <script>
                jQuery(document).ready(function() {
                   $(function(){
                        $('.time_hide').css("display","none");
                    });
                });
            </script>
        <?php } ?>
    </body>
</html>