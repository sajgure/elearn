<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Dashboard</title>
<?php $skip = $this->session->userdata('skip');
$stud_id = $this->session->userdata('stud_id');
$notification_data = $this->admin_model->stud_notification_data($stud_id);
?>
<link href="<?php echo base_url(); ?>js/popup.css" rel="stylesheet">
<?php if(isset($notification_data) && !empty($notification_data) || date('m/d',strtotime($stud_data->stud_dob))==date("m/d"))
{ ?>
    <div id="modal_screen" style="display:<?php echo(isset($skip) && !empty($skip))?'none':'block'?>; z-index: 99999 ! important;" ></div>
    <div id="modal_content" style="z-index: 999999; display:none; background-image: url(<?php echo base_url(); ?>images/bg.png); background-position: top; background-size: 100% 100%; left: 435.5px; left: 400px;">        
        <a href="<?php echo base_url();?>set_session" style="float: right; padding: 8px; "><i  style="font-size: 20px; color: #fff;" class="fa fa-times-circle"></i></a>
        <br>
        <div id="myCarousel" class="carousel image-carousel slide" style="height: 94%; text-align: center;">
			<div class="carousel-inner">				
				<?php $flag=0;if(date('m/d',strtotime($stud_data->stud_dob))==date("m/d")){ $flag=1; ?>
                    <div class="item active">
                      <p style="font-size: 20px; color: #29A6D3;"><b>Wish you Happy Birthday</b></p><br> <center><img src="<?php echo base_url();?>/images/birth.png" style="height: 165px; width: 252px;"></center>
                    </div>
                <?php } ?>
                <?php if(isset($notification_data) && !empty($notification_data))
                { 
                    $i=0;  foreach ($notification_data as $key ) 
                    { $i++; ?>
                        <div class="item <?php if($i==1 && $flag==0){ echo 'active';}?>">
	                        <p style="font-size: 20px; color: #29A6D3;"><b><?php echo (isset($key->notification) && !empty($key->notification))?$key->notification:'';?></b></p>
	                      	<p style="font-size: 13px;color: white; text-align: justify;"><b><?php echo (isset($key->notification_desc) && !empty($key->notification_desc))?$key->notification_desc:'';?></b></p>
                        </div>
                    <?php }
                }?>
			</div>
			<!-- Carousel nav -->
			<a class="carousel-control left" href="#myCarousel" data-slide="prev">
			<i class="m-icon-big-swapleft m-icon-white"></i>
			</a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next">
			<i class="m-icon-big-swapright m-icon-white"></i>
			</a>
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active">
				</li>
				<li data-target="#myCarousel" data-slide-to="1">
				</li>
				<li data-target="#myCarousel" data-slide-to="2">
				</li>
			</ol>
		</div>
    </div>
<?php }?>
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

<!-- PAGE LEVEL STYLES -->
<link href="<?php echo base_url(); ?>assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>

<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
</head>

<body class="page-md page-header-fixed page-sidebar-closed">
<!-- BEGIN HEADER -->
<?php include('header.php');
$course_id=$this->session->userdata('course_id');
$cnt=count($result_data);
$obj_total=0; $email_total=0; $letter_total=0; $state_total=0; $speed_total=0; $mobile_total=0; $totalm=0;
if(isset($result_data) && !empty($result_data)) 
{ 
    foreach($result_data AS $key) { 
        $obj_total+= $key->objective_marks;
        $email_total+= $key->email_marks;
        $letter_total+= $key->letter_marks;
        $state_total+= $key->statement_marks;
        $speed_total+= $key->speed_marks;
        $mobile_total+= $key->mobile_marks;
    } 
    $totalm =$obj_total + $email_total + $letter_total + $state_total + $speed_total;
}
?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php include('sidebar.php'); ?>	
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<?php if($course_id<10){ ?>
				<div class="row">
					<a  href="javascript:void(0);" class="set_time_popup" rel="objective_practice" rev="set_time" data-title="Set Timer">
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="padding-left: 15px !important; padding-right: 5px !important;">
							<div class="dashboard-stat2">
								<div class="display">
									<div class="number">
										<small>Objective</small>										
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: <?php echo round((($obj_total/$cnt)/50)*100).'%'; ?>;" class="progress-bar progress-bar-success green-sharp">
										<span class="sr-only"><?php echo round((($obj_total/$cnt)/50)*100).'%'; ?> progress</span>
										</span>
									</div>
									<div class="status">
										<div class="status-title">
											 progress
										</div>
										<div class="status-number">
											<?php echo round((($obj_total/$cnt)/50)*100).'%'; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<?php if($course_id!=7 && $course_id!=8 && $course_id!=9) { ?>
						<a  href="javascript:void(0);" class="set_time_popup" rel="email_practice" rev="set_time" data-title="Set Timer">
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="padding-left: 5px !important; padding-right: 5px !important;">
								<div class="dashboard-stat2">
									<div class="display">
										<div class="number">
											<small>Email</small>
										</div>
									</div>
									<div class="progress-info">
										<div class="progress">
											<span style="width: <?php echo round((($obj_total/$cnt)/50)*100).'%'; ?>;" class="progress-bar progress-bar-success red-haze">
											<span class="sr-only"><?php echo round((($email_total/$cnt)/5)*100).'%'; ?> progress</span>
											</span>
										</div>
										<div class="status">
											<div class="status-title">
												progress 
											</div>
											<div class="status-number">
												<?php echo round((($email_total/$cnt)/5)*100).'%'; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
					<a  href="javascript:void(0);" class="set_time_popup" rel="letter_practice" rev="set_time" data-title="Set Timer">
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="padding-left: 5px !important; padding-right: 5px !important;">
							<div class="dashboard-stat2">
								<div class="display">
									<div class="number">
										<small>Letter</small>
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: <?php echo round((($letter_total/$cnt)/15)*100).'%'; ?>;" class="progress-bar progress-bar-success blue-sharp">
										<span class="sr-only"><?php echo round((($letter_total/$cnt)/15)*100).'%'; ?> progress</span>
										</span>
									</div>
									<div class="status">
										<div class="status-title">
											progress
										</div>
										<div class="status-number">
											<?php echo round((($letter_total/$cnt)/15)*100).'%'; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a  href="javascript:void(0);" class="set_time_popup" rel="statement_practice" rev="set_time" data-title="Set Timer">
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="padding-left: 5px !important; padding-right: 5px !important;">
							<div class="dashboard-stat2">
								<div class="display">
									<div class="number">
										<?php if($course_id!=7 && $course_id!=8) { ?>
											<small>Statement</small>
										<?php } else { ?>
											<small>Balance Sheet</small>
										<?php } ?>
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: <?php echo round((($state_total/$cnt)/10)*100).'%'; ?>;" class="progress-bar progress-bar-success purple-soft">
										<span class="sr-only"><?php echo round((($state_total/$cnt)/10)*100).'%'; ?> progress</span>
										</span>
									</div>
									<div class="status">
										<div class="status-title">
											progress
										</div>
										<div class="status-number">
											<?php echo round((($state_total/$cnt)/10)*100).'%'; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a  href="javascript:void(0);" class="set_time_popup" rel="speed_practice" rev="set_time" data-title="Set Timer">
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="padding-left: 5px !important; padding-right: 5px !important;">
							<div class="dashboard-stat2">
								<div class="display">
									<div class="number">
										<small>Speed</small>
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: <?php echo round((($speed_total/$cnt)/20)*100).'%'; ?>;" class="progress-bar progress-bar-success purple-soft">
										<span class="sr-only"><?php echo round((($speed_total/$cnt)/20)*100).'%'; ?>  0% progress</span>
										</span>
									</div>
									<div class="status">
										<div class="status-title">
											progress 
										</div>
										<div class="status-number">
											<?php echo round((($speed_total/$cnt)/20)*100).'%'; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<?php if($course_id==7 || $course_id==8 || $course_id==9 ) { ?>
						<a  href="javascript:void(0);" class="set_time_popup" rel="mobile_practice" rev="set_time" data-title="Set Timer">
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="padding-left: 5px !important; padding-right: 5px !important;">
								<div class="dashboard-stat2">
									<div class="display">
										<div class="number">
											<small>Mobile computing</small>
										</div>
									</div>
									<div class="progress-info">
										<div class="progress">
											<span style="width: <?php echo round((($mobile_total/$cnt)/20)*100).'%'; ?>;" class="progress-bar progress-bar-success purple-soft">
											<span class="sr-only"><?php echo round((($mobile_total/$cnt)/20)*100).'%'; ?>  progress</span>
											</span>
										</div>
										<div class="status">
											<div class="status-title">
												progress
											</div>
											<div class="status-number">
												<?php echo round((($mobile_total/$cnt)/20)*100).'%'; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
					<a href="<?php echo base_url(); ?>exam">
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="padding-left: 5px !important; padding-right: 15px !important;">
							<div class="dashboard-stat2">
								<div class="display">
									<div class="number">
										<small>Total</small>
									</div>
								</div>
								<div class="progress-info">
									<div class="progress">
										<span style="width: <?php echo round((($totalm/$cnt)/100)*100).'%'; ?>;" class="progress-bar progress-bar-success purple-soft">
										<span class="sr-only"><?php echo round((($totalm/$cnt)/100)*100).'%'; ?>  progress</span>
										</span>
									</div>
									<div class="status">
										<div class="status-title">
											progress
										</div>
										<div class="status-number">
											 <?php echo round((($totalm/$cnt)/100)*100).'%'; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php } ?>
			<div class="row">
				<div class="col-md-12">
					<div class="profile-sidebar" style="width: 250px;">
						<div class="portlet light">
							<div class="profile-userpic">
								<img style="width: 54%; height: 120px;" src="<?php echo base_url(); ?>uploads/stud_photos/<?php echo(isset($stud_data->stud_photo) && !empty($stud_data->stud_photo))?$stud_data->stud_photo:'student.jpg'?>" class="img-responsive" alt="">
							</div>
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									<?php echo (isset($stud_data->stud_name) && !empty($stud_data->stud_name))?$stud_data->stud_name:'';?> <?php echo (isset($stud_data->stud_last_name) && !empty($stud_data->stud_last_name))?$stud_data->stud_last_name:'';?>
								</div>
								<div class="profile-usertitle-job">
									(<?php echo (isset($stud_data->course_name) && !empty($stud_data->course_name))?$stud_data->course_name:'';?>)
								</div>
							</div>
							<div class="profile-usermenu" style="margin-bottom: -20px; margin-top: 25px !important;">
								<h6 class="font-grey-mint"><b><center>YOU NEED TO WORK ON</center></b></h6>
                                <?php $i=1;
                                if($course_id!=7) {
	                                $g1=round(((($obj_total/$cnt)/50)*100));
	                                $g2=round(((($email_total/$cnt)/5)*100));
	                                $g3=round(((($letter_total/$cnt)/15)*100));
	                                $g4=round(((($state_total/$cnt)/10)*100));
	                                $g5=round(((($speed_total/$cnt)/20)*100));
	                                $section_arr = array("Objective Section"=>"$g1", "Email Section"=>"$g2", "Letter Section"=>"$g3", "Statement Section"=>"$g4", "Speed Section"=>"$g5");
	                            }
	                            else
	                            {
	                            	$g1=round(((($obj_total/$cnt)/50)*100));
	                                $g2=round(((($mobile_total/$cnt)/5)*100));
	                                $g3=round(((($letter_total/$cnt)/15)*100));
	                                $g4=round(((($state_total/$cnt)/10)*100));
	                                $g5=round(((($speed_total/$cnt)/20)*100));
	                                $section_arr = array("Objective Section"=>"$g1", "Mobile Computing Se..."=>"$g2", "Letter Section"=>"$g3", "Balance Sheet Section"=>"$g4", "Speed Section"=>"$g5");
	                            }
                                asort($section_arr);
                                foreach($section_arr as $key => $section_arr) 
                                { ?>
                                    <p class="font-grey-mint" style="margin: 2px 0px;"><b><i class="fa fa-star" style="<?php if($section_arr <= 50) { echo "color: red"; } else {echo "color: green"; }?>"></i> <?php echo $key; ?> - <span style="float: right;"><?php echo $section_arr; ?> % </span></b></p>
                                <?php   }?>
							</div>
						</div>
					</div>
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light ">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Result Wise Growth</span>
										</div>
									</div>
									<div class="portlet-body">
										<?php if(isset($result_data) && !empty($result_data))
        								{ ?>
											<div id="Result_growth" style="width:100%; height:291px;"></div>
										<?php } else { ?>
											<br><br><br><br><br>
											<center><p class="profile-usertitle-name" style="width:100%; font-weight: bold; font-size: 15px; height:189px;">You didn't attempt any exam</p></center>
										<?php } ?>
									</div>
								</div>

								
								<!-- END PORTLET -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<input type='hidden' id="timer" value='<?php echo $stud_data->practice_time; ?>'>
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
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/serial.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>js/common.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/disable_all.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {     
   	Metronic.init();
   	Layout.init();
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var top = ($(window).outerHeight() - $('#modal_content').outerHeight()) / 2;
        var left = ($(window).outerWidth() - $('#modal_content').outerWidth()) / 2;
        $('#modal_content').css({
          'top': top,
          'left': left
        });
    });
</script>
<?php if(!isset($skip) && empty($skip))
{ ?> 
    <script type="text/javascript">
        $('#modal_content').fadeIn('slow');
    </script>
<?php }?>
<script type="text/javascript">        
        <?php if(isset($result_data) && !empty($result_data))
        { ?>
            var chart = AmCharts.makeChart("Result_growth", {
                "type": "serial",
                "theme": "light",
                "legend": {
                    "useGraphSettings": true
                },
                "dataProvider": [
                <?php $i=1; foreach($result_data AS $key)
                { ?>
                    {
                      "exam_date": "<?php echo (isset($key->created_on) && !empty($key->created_on))?'Exam '.$i++.'('.date('d M Y',strtotime($key->created_on)).')':'0'; ?>",
                      "objective": "<?php echo (isset($key->objective_marks) && !empty($key->objective_marks))?$key->objective_marks:'0'; ?>",
                      "email": "<?php echo (isset($key->email_marks) && !empty($key->email_marks))?$key->email_marks:'0'; ?>",
                      "mobile": "<?php echo (isset($key->mobile_marks) && !empty($key->mobile_marks))?$key->mobile_marks:'0'; ?>",
                      "letter": "<?php echo (isset($key->letter_marks) && !empty($key->letter_marks))?$key->letter_marks:'0'; ?>",
                      "statement": "<?php echo (isset($key->statement_marks) && !empty($key->statement_marks))?$key->statement_marks:'0'; ?>",
                      "speed": "<?php echo (isset($key->speed_marks) && !empty($key->speed_marks))?$key->speed_marks:'0'; ?>",
                      "total": "<?php echo $key->objective_marks+$key->email_marks+$key->letter_marks+$key->statement_marks+$key->speed_marks; ?>"
                    },
                <?php } ?>],
                "valueAxes": [{
                    "axisAlpha": 0,
                    "dashLength": 5,
                    "gridCount": 10,
                    "position": "left",
                    "title": "Obtained Marks"
                }],
                "startDuration": 0.5,
                "graphs": [
                {
                    "balloonText": "Total Marks - [[value]]",
                    "bullet": "round",
                    "title": "Total Marks",
                    "hidden": true,
                    "valueField": "total",
                    "fillAlphas": 0
                }, {
                    "balloonText": "Objective - [[value]]",
                    "bullet": "round",
                    "title": "Objective Marks",
                    "valueField": "objective",
                    "fillAlphas": 0
                }, {
                	<?php if($course_id!=7) { ?>
	                    "balloonText": "Email - [[value]]",
	                    "bullet": "round",
	                    "title": "Email Marks",
	                    "valueField": "email",
	                    "fillAlphas": 0
                	<?php } else { ?>
                		"balloonText": "Mobile Comp - [[value]]",
	                    "bullet": "round",
	                    "title": "Mobile Comp Marks",
	                    "valueField": "mobile",
	                    "fillAlphas": 0
	                <?php } ?>
                    
                }, {
                    "balloonText": "Letter - [[value]]",
                    "bullet": "round",
                    "title": "Letter Marks",
                    "valueField": "letter",
                    "fillAlphas": 0
                }, {
                	<?php if($course_id!=7) { ?>
	                    "balloonText": "Statement - [[value]]",
	                    "bullet": "round",
	                    "title": "Statement Marks",
	                    "valueField": "statement",
	                    "fillAlphas": 0
                	<?php } else { ?>
                		"balloonText": "Balance Sheet - [[value]]",
	                    "bullet": "round",
	                    "title": "Balance Sheet Marks",
	                    "valueField": "statement",
	                    "fillAlphas": 0
	                <?php } ?>
                }, {
                    "balloonText": "Speed Passage - [[value]]",
                    "bullet": "round",
                    "title": "Speed Marks",
                    "valueField": "speed",
                    "fillAlphas": 0
                } ],
                "chartCursor": {
                    "cursorAlpha": 0,
                    "zoomable": false
                },
                "categoryField": "exam_date",
                "categoryAxis": {
                    "gridPosition": "start",
                    "axisAlpha": 0,
                    "labelRotation": 20,
                    "fillAlpha": 0.05,
                    "fillColor": "#001000",
                    "gridAlpha": 0
                }
            });
        <?php } ?>
    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>