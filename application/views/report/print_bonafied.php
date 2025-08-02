<!DOCTYPE html>
<html>
<head>
    <title>Bonafide</title>
    <style type="text/css">
        .container{
            text-align:center;
        }
        .right{
            text-align: right;
        }
    </style>
</head>
<body>

<?php $inst_code=$this->session->userdata('inst_code');
$inst_name=$this->session->userdata('inst_name'); 
$inst_addr=$this->session->userdata('inst_addr');?>

<div style="width:650px; height:585px; padding:2%; border: 8px solid #787878">
    <div style="width:95%; height:560px; padding:10px; border: 5px solid #787878">
            <p class="container"  style="font-size:35px; font-weight:bold; margin: 10px;"><?php echo (isset($inst_name)&& !empty($inst_name))?$inst_name:'';?>
                <span style="font-size: 14px;">(<?php echo (isset($inst_code)&& !empty($inst_code))?$inst_code:'';?>)</span><br>
                <span style="font-size: 14px; font-style: italic;">
                    <?php echo (isset($inst_contact)&& !empty($inst_contact))?$inst_contact:'';?> <?php echo (isset($inst_addr)&& !empty($inst_addr))?$inst_addr:'';?> <?php echo (isset($inst_pincode)&& !empty($inst_pincode))?$inst_pincode:'';?> 
                </span>
            </p><br>
            <h2 class="container" style="margin: -6px;">Bonafide Certificate<br> 
            </h2>
            <br>
            <p style="font-size:20px; text-align: justify;"><i>
                <span style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that &nbsp;<u><b><?php echo (isset($stud_data->stud_name)&& !empty($stud_data->stud_name))?$stud_data->stud_name:'';?> <?php echo (isset($stud_data->stud_father_name)&& !empty($stud_data->stud_father_name))?$stud_data->stud_father_name:'';?> <?php echo (isset($stud_data->stud_last_name)&& !empty($stud_data->stud_last_name))?$stud_data->stud_last_name:'';?></b></u>
                is a Bonafide student of this institute for the course &nbsp;<u><b><?php echo (isset($stud_data->course_name)&& !empty($stud_data->course_name))?$stud_data->course_name:'';?></b></u> in Jan 2020. 
                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;His / Her birthdate  as recorded in a General Register of the institute is <?php echo (isset($stud_data->stud_dob)&& !empty($stud_data->stud_dob))?date('d-m-Y', strtotime($stud_data->stud_dob)):'';?> and his/her Sr. No. in our General Register is <b><u> <?php echo (isset($stud_data->gr_no)&& !empty($stud_data->gr_no))?$stud_data->gr_no:'_____';?></u></b>.
                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;He / She appearing the &nbsp;<u><b><?php echo (isset($stud_data->course_name)&& !empty($stud_data->course_name))?$stud_data->course_name:'';?></b></u> course.
                <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certificate is issued for <b><u> <?php echo (isset($stud_data->reason)&& !empty($stud_data->reason))?$stud_data->reason:'_______';?></u></b> (purpose) and valid till ___/___/20___ .</b></u></span>
            </i></p> 
            <br><br>
            <div class="right" style="font-size:22px; padding-right: 30px;"><i>Principal</i></div>
    </div>
</div>

</body>
</html>