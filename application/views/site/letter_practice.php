<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Letter Practice</title>

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
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-touchspin/style-shop.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/zoom.css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
<style type="text/css">
    .page-content-wrapper {
        float: left;
        width: 98%;
    }
</style>
</head>

<body class="page-md page-header-fixed page-sidebar-closed">
<!-- BEGIN HEADER -->
<?php include('header.php'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container" style="padding-right: 5px;">
    <!-- BEGIN SIDEBAR -->
    <?php include('sidebar.php'); ?>   
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <?php $url=$this->uri->segment(1);
        $time=$this->uri->segment(2);
        $type=$this->uri->segment(3); ?>
        <div class="page-content" style="padding-left: 5px;">
            <div class="col-md-6" style="padding: 2px;">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light" style="padding: 1px;">
                    <div class="portlet-title" style="padding: 15px;">
                        <div class="row">
                            <div class="col-sm-8">
                                <i class="fa fa-file-text-o font-blue"></i>
                                <span class="caption font-blue caption-subject bold uppercase"> Letter Practice <i class="fa fa-angle-right"></i> Question</span>
                            </div>
                            <div class="col-md-4">
                                <div class="inputs" style="text-align: right;">
                                    <div class="portlet-input input-inline input-small ">
                                        <div class="input-icon" style="float: right;">
                                            <?php 
                                            $course_id = $this->session->userdata('course_id');
                                            if ($course_id == 1 || $course_id == 2 || $course_id ==3) {
                                                $url1 = $url.'/'.$time;
                                            }
                                            else
                                            {
                                                $url1 = $url.'/'.$time.'/'.$type;
                                            }
                                            ?>
                                            <div class="product-quantity" style="margin-right: 5px;">
                                                <input style="height:21px; font-size: 13px;" type="text" value="<?php echo $this->uri->segment(3); ?>"  max="<?php echo (isset($letter->cnt) && !empty($letter->cnt) )?trim($letter->cnt):''; ?>" class="form-control input-sm jump_to_val" placeholder="Question Number">
                                            </div>      
                                            <button style="padding: 2px; " type="button" class="btn green btn-xs jump_to" data-url="<?php echo $url; ?>/<?php echo $time; ?>"><i style="font-size: 10px;" class="icon-arrow-right " ></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div style="height: 850px;">
                            <object   type="application/x-silverlight-2" height="100%" width="100%;">
                                <param name="source" value="<?php echo base_url(); ?>uploads/xap/letter.xap"/>
                                <param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $letter->letter_base64;?>">
                            </object>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin:10px;">
                                <center><button class="btn blue btn-success " disabled></i>Submit</button></center>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <div class="col-md-6" style="padding: 2px;">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light" style="padding: 1px;">
                    <div class="portlet-title" style="padding: 13px;">
                        <div class="row">
                            <?php if($time=='no') { ?> <div class="col-sm-5"> <?php } else { ?> <div class="col-sm-9"> <?php } ?>
                                <i class="fa fa-file-text-o font-blue"></i>
                                <span class="caption font-blue caption-subject bold uppercase"> Letter Practice <i class="fa fa-angle-right"></i> Answer</span>
                            </div>
                            <?php if($time=='yes') { ?>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-sm btn-outline-primary" style="padding: 1px 5px;  margin: 0px; float: right; font-size: 14px; color: #F14C39;"><b><span id="hm_timer"></span></b></button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form action="javascript:void(0);" rel="save_letter_practice" id="test_form" runat="server">
                            <input type="hidden" name="time" value="<?php echo (isset($type) && !empty($type))?$time.'/'.$type:$time; ?>">
                            <input type="hidden" class="form-control" name="letter_id" id="letter_id" value="<?php echo (isset($letter->letter_id) && !empty($letter->letter_id) )?$letter->letter_id:''; ?>" >
                            <div id="silverlightControlHost" style="height: 850px; width: 100%">
                                <object id="letter" data="data:application/x-silverlight-2," type="application/x-silverlight-2" height="100%" width="100%;">
                                    <param name="source" value="<?php echo base_url(); ?>uploads/xap/letter.xap"/>
                                    <param name="onLoad" value="silverlightLoaded">
                                    <param name="initParams" value="title=MSCEIA PRACTICE,iseditable=true,urlPath=<?php echo base_url();?>save_letter_practice1">
                                </object>
                                <iframe id="_sl_historyFrame" style="visibility:hidden;height:0px;width:0px;border:0px"></iframe>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin:10px;">
                                    <center><button id="letter_practice" class="btn blue btn-success btn_submit_test" rel=""></i>Submit</button> </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
</div>
<!-- BEGIN FOOTER -->
<?php include('footer.php'); ?>    
<!-- COMMON LEVEL js -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<!-- PAGE LEVEL js -->
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.countdownTimer.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>js/gmap.js"></script>
<script src="<?php echo base_url(); ?>js/disable_all.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/common.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function() {     
        Metronic.init();
        Layout.init();
    });
    <?php if(isset($time) && !empty($time) && ($time)=='yes') { ?>
        $('#hm_timer').countdowntimer({minutes :30, seconds : 2, timeUp: test_expiry });
    <?php } else { ?>
        $('.time_hide').css("display","none");
    <?php } ?>
</script>
<style type="text/css">
    .modal-dialog{all:unset; }
    .modal-content{margin: 30px auto; width: 600px; z-index: 99999; }
    .modal-content{animation:animatetop 0.5s}@keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}
</style>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>