<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | <?php echo (isset($stud_data->stud_name) && !empty($stud_data->stud_name))?$stud_data->stud_name:'';?> <?php echo (isset($stud_data->stud_last_name) && !empty($stud_data->stud_last_name))?$stud_data->stud_last_name:'';?> Summery</title>
<link href="<?php echo base_url(); ?>js/popup.css" rel="stylesheet">
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
<?php $this->load->view('admin/header');
$course_id=$stud_data->stud_course;
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
	<?php $this->load->view('admin/sidebar'); ?>	
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
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
                                if($course_id!=7 && $course_id!=8 && $course_id!=9) {
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
								<div class="portlet light " style="height: 370px;">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Payment Track</span>
										</div>
									</div>
									<div class="portlet-body">
										<?php if(isset($payment_data) && !empty($payment_data))
										{ ?>
										<table width="100%" class="table table-striped table-hover  ">
											<tr>
										        <th colspan="2">
										           Installment 
										        </th>
										        <th >
										            Date
										        </th>
										        <th style="text-align: right;">
										            Amount
										        </th>
										    </tr>
										    <?php if(isset($payment_data) && !empty($payment_data))
										    { 
										        foreach ($payment_data as $key ) 
										        { $paid=0; $paid=$paid+$key->fee;?>
										            <tr >
										                <td colspan="2">
										                   <center><?php echo (isset($key->installment)&& !empty($key->installment))?$key->installment:'';?></center> 
										                </td>
										                <td >
										                    <center><?php echo (isset($key->payment_date)&& !empty($key->payment_date))?date('d-M-Y',strtotime($key->payment_date)):'NA';?></center>
										                </td>
										                <td style="text-align: right;">
										                    Rs. <?php echo (isset($key->fee)&& !empty($key->fee))?$key->fee:'00';?>
										                </td>
										            </tr>
										        <?php }
										    } ?>
										</table>
										<?php } else { ?>
									    	<center>Record not found</center>
									    <?php } ?>
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-blue">
								<i class="icon-user font-blue"></i>
								<span class="caption-subject bold uppercase"> Detail Result</span>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-responsive table-hover table-outline mb-0 table-fixed" >
                                        <thead class="thead-default" >
                                            <tr>
                                                <th class="text-center" style="border: 1px solid #dddddd; background-color: #3598DC; color: #fff;" >Sr.No</th>
                                                <th style="border: 1px solid #dddddd; background-color: #3598DC; color: #fff;" class="text-center">Date</th>
                                                <th style="border: 1px solid #dddddd; background-color: #3598DC; color: #fff;" class="text-center">Objective</th>
                                                <th style="border: 1px solid #dddddd; background-color: #3598DC; color: #fff;" class="text-center">Email</th>
                                                <th style="border: 1px solid #dddddd; background-color: #3598DC; color: #fff;" class="text-center">Letter</th>
                                                <th style="border: 1px solid #dddddd; background-color: #3598DC; color: #fff;" class="text-center">Statement</th>
                                                <th style="border: 1px solid #dddddd; background-color: #3598DC; color: #fff;" class="text-center">Speed</th>
                                                <th style="border: 1px solid #dddddd; background-color: #3598DC; color: #fff;" class="text-center">Total</th>
                                                <th style="border: 1px solid #dddddd; background-color: #3598DC; color: #fff;" class="text-center">Result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($report) && !empty($report))
                                            { $i=1; $totlm1=0;
                                                foreach ($report as $key) 
                                                { ?>

                                                    <tr>
                                                        <td style="border: 1px solid #dddddd;" align="center"><?php echo $i++;?></td>
                                                        <td style="border: 1px solid #dddddd;">
                                                            <div><?php echo (isset($key->submit_on) && !empty($key->submit_on) &&  $key->submit_on!='0000-00-00')?date('d-m-Y',strtotime($key->submit_on)):'NA'?></div>
                                                        </td>
                                                        <td style="border: 1px solid #dddddd;">
                                                            <div><?php echo (isset($key->objective_marks) && !empty($key->objective_marks))?$key->objective_marks:'0';?></div>
                                                            
                                                        </td>
                                                        <td style="border: 1px solid #dddddd;">
                                                            <div><?php echo (isset($key->email_marks) && !empty($key->email_marks))?$key->email_marks:'0';?></div>
                                                        </td>
                                                        <td style="border: 1px solid #dddddd;">
                                                             <div><?php echo (isset($key->letter_marks) && !empty($key->letter_marks))?$key->letter_marks:'0';?></div>
                                                        </td>
                                                        <td style="border: 1px solid #dddddd;">
                                                             <div><?php echo (isset($key->statement_marks) && !empty($key->statement_marks))?$key->statement_marks:'0';?></div>
                                                        </td>
                                                         <td style="border: 1px solid #dddddd;">
                                                             <div><?php echo (isset($key->speed_marks) && !empty($key->speed_marks))?$key->speed_marks:'0';?></div>
                                                        </td>
                                                        <?php $total=$key->objective_marks+$key->email_marks+$key->letter_marks+$key->statement_marks+$key->speed_marks ?>
                                                        <td style="border: 1px solid #dddddd;">
                                                             <div><?php echo $total ?></div>
                                                        </td>
                                                        <td style="border: 1px solid #dddddd;" class="text-center">
                                                             <div><a class="btn btn-xs green" href="<?php echo base_url(); ?>view_result/<?php echo $key->result_id; ?>" style="text-decoration: none;"><i class="fa fa-search" aria-hidden="true"></i> View</a></div>
                                                        </td>

                                                    </tr>
                                                <?php $totlm1+=$total; } ?>
                                                
                                        </tbody>
                                         <tr  >
                                            <!-- <td style="border: 1px solid #dddddd; background-color: #3598DC;color: white;" class="text-center"><b></td> -->
                                            <td style="border: 1px solid #dddddd;background-color: #3598DC;color: white;" colspan="2"><b>Average</b></td>
                                            <td style="border: 1px solid #dddddd;background-color: #3598DC;color: white;"><b><?php echo round($obj_total/$cnt) ?></b></td>
                                            <td style="border: 1px solid #dddddd;background-color: #3598DC;color: white;"><b><?php echo round($email_total/$cnt) ?></b></td>
                                            <td style="border: 1px solid #dddddd;background-color: #3598DC;color: white;"><b><?php echo round($letter_total/$cnt) ?></b></td>
                                            <td style="border: 1px solid #dddddd;background-color: #3598DC;color: white;"><b><?php echo round($state_total/$cnt) ?></b></td>
                                            <td style="border: 1px solid #dddddd;background-color: #3598DC;color: white;"><b><?php echo round($speed_total/$cnt) ?></b></td>
                                            <td style="border: 1px solid #dddddd;background-color: #3598DC;color: white;" colspan="2"><b><?php echo round($totlm1/$cnt) ?></b></td>
                                            <!-- <td style="border: 1px solid #dddddd;background-color: #3598DC;color: white;"><b></b></td> -->
                                        </tr>
                                        <?php } else { ?>
                                        	<tr>
                                            	<td style="text-align:center;" colspan="9">No data found</td>
                                            </tr>
                                        <?php } ?>
                                    </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- BEGIN FOOTER -->
<?php $this->load->view('admin/footer'); ?>
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