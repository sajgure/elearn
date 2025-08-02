<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Email Practice</title>

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
<style type="text/css">
    .orange{
      background:#E85425;
      color: #ffffff;
    }
</style>
</head>

<body class="page-md page-header-fixed page-sidebar-closed">
<!-- BEGIN HEADER -->
<?php include('header.php'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php include('sidebar.php'); ?>	
	<!-- BEGIN CONTENT -->
	<?php $time=$this->uri->segment(2); ?>
	<div class="page-content-wrapper">
		<div class="page-content">
            <div class="row">
                <div class="col-md-6" style="z-index: 9; position: absolute; right: 1%; width: 44%; top: 32px;">
                    <div class="portlet-title">
                        <div class="row">
                            <?php if($time=='no') { ?> <div class="col-sm-7"> <?php } else { ?> <div class="col-sm-9"> <?php } ?>
                                <span class="caption font-blue caption-subject bold uppercase"> Mobile Computing Practice <i class="fa fa-angle-right"></i> Answer</span>
                            </div>
                            <?php if($time=='yes') { ?>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-sm btn-outline-primary" style="padding: 1px 5px;  margin: 0px; float: right; font-size: 14px; color: #F14C39;"><b><span id="hm_timer"></span></b></button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <form action="javascript:void(0);" class="row" rel="save_mobile_computing" id="test_form" >
            <?php if(isset($question_data) && !empty($question_data))
            { $i=0;
                foreach ($question_data as $key ) 
                {
                    $i++;?> 
                    <input type="hidden" name="que[]" value="<?php echo $key->mobile_id; ?>">
                    <input type="hidden" name="time" value="<?php echo $time; ?>">
                    <input type="hidden" name="ans[]" class="q<?php echo $i; ?>" value="0">
                    <div class="<?php if($i!=1){ echo 'hide'; } ?> mob_div mob_<?php echo $i; ?>">
            			<div class="col-md-6">
            				<!-- BEGIN SAMPLE FORM PORTLET-->
            				<div class="portlet light">
            					<div class="portlet-title">
            						<div class="row">
                                        <div class="col-sm-12">
                                            <span class="caption font-blue caption-subject bold uppercase"> Mobile Computing Practice <i class="fa fa-angle-right"></i> Question</span>
                                        </div>
                                    </div>
            					</div>
            					<div class="portlet-body form">
            						<fieldset>
                                        <p style="-moz-user-select: none; user-select: none; font-size: 14px; font-weight: bold;">Que. <?php echo (isset($key->quesion) && !empty($key->quesion))?$key->quesion:'';?></p>
                                        <br>
                                        <center><img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($key->folder_name) && !empty($key->folder_name))?$key->folder_name:'';?>/last.png" style="height: 519px; width: 300px; border: 1px solid #eee;" ></center>
                                    </fieldset>
            					</div>
            				</div>
            				<!-- END SAMPLE FORM PORTLET-->
            			</div>
            			<div class="col-md-6">
            				<!-- BEGIN SAMPLE FORM PORTLET-->
            				<div class="portlet light">
            					<div class="portlet-body form" style="margin-left: 12px; margin-right: 12px; margin-top: 45px;">
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
                                                            <button class="btn blue btn_submit_test btn-danger" rel="" type="button" style="float:right; line-height: 15px;">Submit Test</button>
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
            				<!-- END SAMPLE FORM PORTLET-->
            			</div>
                    </div>
                <?php } 
            } ?>
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
<?php } ?>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>