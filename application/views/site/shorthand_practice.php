<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Shorthand Practice</title>

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
<link href="<?php echo base_url(); ?>assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
<!-- PAGE LEVEL STYLES -->
<link href="<?php echo base_url(); ?>assets/global/css/stopwatch.css" rel="stylesheet" >
<style>
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

<body class="page-md page-header-fixed page-sidebar-closed">
<!-- BEGIN HEADER -->
<div id="successMessage" class="is-countdown" style="width: 100%; position: fixed; height: 108%; z-index: 99999;background-image : url('../assets/img/splash.jpg'); background-repeat: no-repeat; background-size: 100% 108%; top: 0px;">
    <span class="is-count" style="margin: 10px; font-size: 27px; font-weight: bold; color: #000; "><br><center>
    <img src="<?php echo base_url(); ?>assets/img/headphones.png" alt="MSCEIA" style="width: 20%; margin: 1px 0px;"><br><br>कृपया तुमचा हेडफोन संगणकाला जोडा आणी हेडफोन चालू आहे का ते तपासा. <br> <div style="font-size: 47px; border-color: #EAE2DF; color: #000;" class="time"></div ><p></p></center></span>
</div>
<?php include('header.php');?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php include('sidebar.php'); ?>   
    <!-- BEGIN CONTENT -->
    
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="col-md-12 audio">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="row">
                            <?php if($time=='no') { ?> <div class="col-sm-5"> <?php } else { ?> <div class="col-sm-9"> <?php } ?>
                                <span class="caption font-blue caption-subject bold uppercase"> Shorthand Practice <i class="fa fa-angle-right"></i> Audio</span>
                            </div>
                            <div class="col-sm-3" style="display: none;">
                                <button type="button" class="btn btn-sm btn-outline-primary" style="padding: 1px 5px;  margin: 0px; float: right; font-size: 14px; color: #F14C39;"><b><span id="hm_timer"></span></b></button>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <br>
                        <center><br>
                            <h3>Please hear audio proper</h3>
                            <br><br>
                            <audio autoplay controls id="audio"  style="width: 70%; height: 50px;">
                              <source src="<?php echo base_url(); ?>uploads/shorthand/<?php echo $section_data->quesion; ?>" type="audio/ogg">
                            </audio>
                        </center>
                        <div id="myProgress" style="margin:auto;">
                            <div class="progress-bar progress-bar-striped active" id="myBar"></div>
                        </div>
                        <br><br>
                        <center><img style="width: 10%; height: 80px;" src="<?php echo base_url(); ?>assets/img/note.png"></center>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <div class="col-md-12 sh_answer" style="display: none;">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="row">
                            <?php if($time=='no') { ?> <div class="col-sm-5"> <?php } else { ?> <div class="col-sm-9"> <?php } ?>
                                <span class="caption font-blue caption-subject bold uppercase"> Shorthand Practice <i class="fa fa-angle-right"></i> Passage</span>
                            </div>
                            <?php if($time=='yes') { ?>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-sm btn-outline-primary" style="padding: 1px 5px;  margin: 0px; float: right; font-size: 14px; color: #F14C39;"><b><span class="hm_timer"></span></b></button>
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
                        <form action="javascript:void(0);" rel="save_shorthand_practice" id="test_form" style="margin:0;">
                            <input type="hidden" name="que_id" value="<?php echo (isset($section_data->shorthand_id) && !empty($section_data->shorthand_id) )?$section_data->shorthand_id:''; ?>">
                            <input type="hidden" name="time" value="<?php echo $time; ?>">
                            <input class="span5 marks" type="hidden" name="marks">
                            <input class="span5 tmarks" type="hidden" name="tmarks" value="50"><input class="span5 deduct" type="hidden" name="deduct" value="0.5">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea autofocus style="resize:none; height: 455px; width:100%; padding:10px; font-size: 15px; line-height: 1.5;" class="passage_text tabkey form-control ans" rows="10" name="passage_text" id="typingTest"></textarea>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <center><button type="button" class="btn btn-sm btn-success btn_submit_test">Submit</button></center>
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
    <script>
        jQuery(document).ready(function() { 
        window.history.forward();  
        });

        $('.time').countdowntimer({minutes :0, seconds : 1, timeUp: sh_test});
        
        function sh_test()
        {
            var vid = document.getElementById("audio");
            vid.autoplay = true;
            vid.load();
            $('.passage_text').removeAttr('readonly');
                setTimeout(function() {
                $("#successMessage").hide();
                $('#hm_timer').countdowntimer({minutes : 4, seconds : 0, timeUp: sh_test_expiry});
                    //var sounds = document.getElementById('audio').autoplay;

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
                    //sounds[i].pause();
                    //sounds.autoPlay;
                });
        }

        /*function sh_test()      
        {
            setTimeout(function() {
                $("#successMessage").hide();
                $('#hm_timer').countdowntimer({minutes : 4, seconds : 0, timeUp: sh_test_expiry});
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
        }*/

        function sh_test_expiry()
        {
            var sounds = document.getElementsByTagName('audio');
            for(i=0; i<sounds.length; i++) sounds[i].pause();
            $('html, body').animate({scrollTop:0});
            bootbox.alert("Time Up ! click ok to type the passage.", function(result) {
                $('.audio').css('display','none');  
                $('.sh_answer').css('display','block');  
                //$('.hm_timer').countdowntimer({minutes : 0, seconds : 10, timeUp: test_expiry});

                <?php $course_id=$this->session->userdata('course_id'); 
                if(isset($time) && !empty($time) && ($time)=='yes') 
                {
                    if($course_id==8 || $course_id==12)
                    { ?>
                        $('.hm_timer').countdowntimer({hours :  1, minutes : 15, seconds : 0, timeUp: test_expiry});
                    <?php }
                    else if($course_id==9 || $course_id==13)
                    { ?>
                        $('.hm_timer').countdowntimer({hours :  1, minutes : 40, seconds : 0, timeUp: test_expiry});
                    <?php }
                    else if($course_id==10 || $course_id==14)
                    { ?>
                        $('.hm_timer').countdowntimer({hours :  2, minutes : 0, seconds : 0, timeUp: test_expiry});
                    <?php }
                    else if($course_id==11 || $course_id==15)
                    { ?>
                        $('.hm_timer').countdowntimer({hours :  2, minutes : 30, seconds : 0, timeUp: test_expiry});
                    <?php  }
                } ?>
            }); 
        }

       /* function start_sh_passage()
        {
            <?php $course_id=$this->session->userdata('course_id'); 
            if($course_id==8 || $course_id==12)
            { ?>
                $('.hm_timer').countdowntimer({hours :  1, minutes : 15, seconds : 0, timeUp: test_expiry});
            <?php }
            else if($course_id==9 || $course_id==13)
            { ?>
                $('.hm_timer').countdowntimer({hours :  1, minutes : 40, seconds : 0, timeUp: test_expiry});
            <?php }
            else if($course_id==10 || $course_id==14)
            { ?>
                $('.hm_timer').countdowntimer({hours :  2, minutes : 0, seconds : 0, timeUp: test_expiry});
            <?php }
            else if($course_id==11 || $course_id==15)
            { ?>
                $('.hm_timer').countdowntimer({hours :  2, minutes : 30, seconds : 0, timeUp: test_expiry});
            <?php } ?>
        }*/
    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>