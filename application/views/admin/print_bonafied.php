<!DOCTYPE html>
<html>
<head>
    <title>Bonafide</title>
    <style type="text/css">
        .container{
            text-align:center;
        }
        span{
            text-align: left;
        }
        .right{
            text-align: right;
        }
        .left{
            text-align: left;
        }
    </style>
</head>
<body>

<?php $inst_code=$this->session->userdata('inst_code');
    $inst_name=$this->session->userdata('inst_name'); ?>

<div style="width:650px; height:600px; padding:20px; border: 10px solid #787878">
    <div style="width:600px; height:550px; padding:20px;  border: 5px solid #787878">
            <div class="right">Date: 23-11-1994</div>
            <p class="container"  style="font-size:40px; font-weight:bold; margin: -10px;">Bonafied Certificate</p>
            <h1 class="container"  ><?php echo (isset($inst_name)&& !empty($inst_name))?$inst_name:'';?> <span style="font-size: 14px;">(<?php echo (isset($inst_code)&& !empty($inst_code))?$inst_code:'';?>)</span></h1>
            <br><br>
            <span style="font-size:23px;"><i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that  
                <u>
                    <?php echo (isset($stud_data->stud_name)&& !empty($stud_data->stud_name))?$stud_data->stud_name:'';?> <?php echo (isset($stud_data->stud_father_name)&& !empty($stud_data->stud_father_name))?$stud_data->stud_father_name:'';?> <?php echo (isset($stud_data->stud_last_name)&& !empty($stud_data->stud_last_name))?$stud_data->stud_last_name:'';?>
                </u> 
                is a bonafied student of this institute for the course <?php echo (isset($stud_data->course_name)&& !empty($stud_data->course_name))?$stud_data->course_name:'';?> in june 20.
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;His / Her birthdate  as recorded in a General Register of the institute is 23-11-1994.</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;He / She successfully completed the marathi 30 wps course.</p> 
            </i></span>
            <br><br>
            <span style="font-size:30px">
                <b>
                <?php echo (isset($stud_data->stud_name)&& !empty($stud_data->stud_name))?$stud_data->stud_name:'';?> 
                <?php echo (isset($stud_data->stud_father_name)&& !empty($stud_data->stud_father_name))?$stud_data->stud_father_name:'';?> 
                <?php echo (isset($stud_data->stud_last_name)&& !empty($stud_data->stud_last_name))?$stud_data->stud_last_name:'';?>
                </b>
            </span>
            
            <div>
            <div class="left" style="font-size:25px"><i>dated</i></div>
            <div class="right" style="font-size:25px"><i>Principle</i></div>
            </div>
    </div>
</div>

</body>
</html>