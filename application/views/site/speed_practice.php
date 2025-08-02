<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Speed Practice</title>

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
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
<!-- PAGE LEVEL STYLES -->
<link href="<?php echo base_url(); ?>assets/global/css/stopwatch.css" rel="stylesheet" >
</head>

<body class="page-md page-header-fixed page-sidebar-closed">
<!-- BEGIN HEADER -->
<div id="successMessage" class="is-countdown" style="width: 100%; position: fixed; height: 108%; z-index: 99999;background-image : linear-gradient(to bottom right, #123775, #bad4ff); background-repeat: no-repeat; background-size: 100% 108%; top: 0px;"><br><br><br>
    <center>    
    <img style="width: 30%;" src="<?php echo base_url(); ?>assets/img/keyboard.png">
    <span class="is-count" style="margin: 10px; font-size: 40px; font-weight: bold; color: #000; ">
        <br><br> 15 सेकंदात गती उतारा चालू होईल. <br> 
        <div style="font-size: 47px; border-color: #EAE2DF; color: #000;" class="time"></div >
    </span>
    <span  class="btn btn-xs btn-primary skip "> Skip </span>
    </center>
</div>
<?php include('header.php');?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php include('sidebar.php'); ?> 
    <?php $url=$this->uri->segment(1); ?>
    <?php $time=$this->uri->segment(2); ?>  
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="col-md-6">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <i class="fa fa-rocket font-blue"></i>
                                <span class="caption font-blue caption-subject bold uppercase"> Speed Practice <i class="fa fa-angle-right"></i> Question</span>
                            </div>
                            <div class="col-md-4">
                                <div class="inputs" style="text-align: right;">
                                    <div class="portlet-input input-inline input-small ">
                                        <div class="input-icon" style="float: right;">
                                            <div class="product-quantity" style="margin-right: 5px;">
                                                <input style="height:21px; font-size: 13px;" type="text" value="<?php echo $this->uri->segment(3); ?>"  max="<?php echo (isset($speed->cnt) && !empty($speed->cnt) )?trim($speed->cnt):''; ?>" class="form-control input-sm jump_to_val" placeholder="Question Number">
                                            </div>      
                                            <button style="padding: 2px; " type="button" class="btn green btn-xs jump_to" data-url="<?php echo $url; ?>/<?php echo $time; ?>"><i style="font-size: 10px;" class="icon-arrow-right " ></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div style="min-height:500px; max-height: 550px;">
                            <?php if(isset($speed) && !empty($speed)) 
                            { ?>
                                <textarea rows="20" spellcheck="false" style="padding: 5px; width: 100%; text-align:justify;  font-size:15px; line-height: 1.5;  pointer-events:none; -moz-user-select: none;-ms-user-select: none;user-select: none; " class="que"><?php echo (isset($speed->passage) && !empty($speed->passage))?$speed->passage:'';?></textarea> 
                            <?php }?>
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
                            <?php if($time=='no') { ?> <div class="col-sm-6"> <?php } else { ?> <div class="col-sm-9"> <?php } ?>
                                <i class="fa fa-rocket font-blue"></i>
                                <span class="caption font-blue caption-subject bold uppercase"> Speed Practice <i class="fa fa-angle-right"></i> Answer</span>
                            </div>
                            <?php if($time=='yes') { ?>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-sm btn-outline-primary" style="padding: 1px 5px;  margin: 0px; float: right; font-size: 14px; color: #F14C39;"><b><span id="hm_timer"></span></b></button>
                                </div>
                            <?php } else { ?>
                                <div class="stopwatch" style="margin-top: -8px ; margin-right: 15px; margin-bottom: -17px; color: #29A6D3; display: none; float: right;">
                                    <section>
                                        <div class="stopwatch">
                                            <div class="cell">
                                                <span class="num sex ten_minu">0 1 2 3 4 5</span>
                                            </div>
                                            <div class="cell">
                                                <span class="num ten minu">0 1 2 3 4 5 6 7 8 9</span>
                                            </div>
                                            <div class="cell">
                                                <span class="num">:</span>
                                            </div>
                                            <div class="cell">
                                                <span class="num sex ten_sec">0 1 2 3 4 5</span>
                                            </div>
                                            <div class="cell">
                                                <span class="num ten sec">0 1 2 3 4 5 6 7 8 9</span>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form action="javascript:void(0);" rel="save_speed_practice" id="test_form" style="margin:0;">
                            <div style="min-height:506px; max-height: 550px;">
                                <?php $course_id=$this->session->userdata("course_id"); ?>
                                <input type="hidden" name="time" value="<?php echo $time; ?>">
                                <input class="span5 marks" type="hidden" name="marks">
                                <input class="span5 tmarks" type="hidden" name="tmarks" value="40">
                                <input class="span5 deduct" type="hidden" name="deduct" value="1">
                                <textarea autofocus spellcheck="false" style="resize:none; height: 455px; width:100%; padding:10px; font-size: 15px; line-height: 1.5;" class="passage_text tabkey form-control back_del ans" rows="19" name="passage_text" id="typingTest"></textarea><br>
                                <input type="hidden" class="form-control " name="speed_id" id="speed_id" value="<?php echo (isset($speed->speed_id) && !empty($speed->speed_id) )?$speed->speed_id:''; ?>" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <center><button type="button" class="btn btn-sm btn-success btn_submit_test">Submit</button></center>
                                    </div>
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
</script>
<?php if(isset($time) && !empty($time) && ($time)=='yes') { ?>
    <script>
        $(document).on("click",".skip",function(){
            $('.time').countdowntimer({minutes :0, seconds : 0, timeUp: speed_test});
        });
        jQuery(document).ready(function() { 
        window.history.forward();  
        });

        var handicap = "<?php echo $this->session->userdata('handicap');?>";
        $('.time').countdowntimer({minutes :0, seconds : 15, timeUp: speed_test});
        $(this).scrollTop(0);
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
<?php }
else { ?>
    <script type="text/javascript">
        $(document).on("click",".skip",function(){
            speed_test1();
        });
        $('.time').countdowntimer({minutes :0, seconds : 15, timeUp: speed_test1});
        $(this).scrollTop(0);
        function speed_test1()      
        {
            $("#successMessage").hide()
            $("#start").trigger("click");
            $('.stopwatch').css('display','block');
        }
    </script>
<?php } ?>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>