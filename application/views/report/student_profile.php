<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .container{
            padding: 10px;
            border: 2px solid #bbb;
            color:#444;
            font-size: 20px;
        }
        table{
            width:100%;
        }
        label{
            font-size: 14px;
            color:#999;
            display: block;
        }
        td{
            padding: 0px 0px;
        }
    </style>
</head>
<body >
<?php $inst_code=$this->session->userdata('inst_code');
$inst_name=$this->session->userdata('inst_name'); ?>
<div class="container">
    <table>
        <tr>
            <td colspan="2" style="width: 65%; text-align: center;">
                <h2 style="margin: 0px;"><?php echo (isset($inst_name)&& !empty($inst_name))?$inst_name:'-';?></h2>
                <label>Institute code: <?php echo (isset($inst_code)&& !empty($inst_code))?$inst_code:'-';?></label>
            </td>  
            <td style="text-align: right;">    
                <img src="./images/msceia.png" style="width:80px; padding-right: 30px;">
            </td>          
        </tr>
        <tr> <td colspan="3"> <hr style="border: 2px dotted #666;"><h3 style="margin: 5px; color: #444;"><center> Jan-2019 to Aug-2019 </center></h3><hr style="border: 2px dotted #666;"></td> </tr>
        <tr>
            <td rowspan="7" style="vertical-align: top;">
                <center>
                    <img style="border: 2px solid #444; width: 165px;" src="<?php echo base_url(); ?>uploads/stud_photos/<?php echo (isset($stud_data->stud_photo) && !empty($stud_data->stud_photo))?$stud_data->stud_photo:'student.jpg';?>" alt="<?php echo (isset($stud_data->stud_name)&& !empty($stud_data->stud_name))?$stud_data->stud_name:'-';?> " >
                </center>
            </td>
            <td style=" width: 35%;">
                <label> Student Name:</label>
                <span><?php echo (isset($stud_data->stud_name)&& !empty($stud_data->stud_name))?ucfirst($stud_data->stud_name):'-';?> <?php echo (isset($stud_data->stud_father_name)&& !empty($stud_data->stud_father_name))?ucfirst($stud_data->stud_father_name):'-';?> <?php echo (isset($stud_data->stud_last_name)&& !empty($stud_data->stud_last_name))?ucfirst($stud_data->stud_last_name):'-';?></span>
            </td>
            <td>
                <label> Course Name:</label>
                <span><?php echo (isset($stud_data->course_name)&& !empty($stud_data->course_name))?$stud_data->course_name:'-';?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label> G R. No.:</label>
                <span><?php echo (isset($stud_data->gr_no)&& !empty($stud_data->gr_no))?$stud_data->gr_no:'-';?></span>
            </td>
            <td>
                <label> Date of Admission:</label>
                <span><?php echo (isset($stud_data->stud_admission_date)&& !empty($stud_data->stud_admission_date))?$stud_data->stud_admission_date:'-';?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label> Email:</label>
                <span><?php echo (isset($stud_data->stud_mail)&& !empty($stud_data->stud_mail))?$stud_data->stud_mail:'-';?></span>
            </td>
            <td>
                <label> Contact:</label>
                <span><?php echo (isset($stud_data->stud_contact)&& !empty($stud_data->stud_contact))?$stud_data->stud_contact:'-';?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label> Qualification:</label>
                <span><?php echo (isset($stud_data->stud_qualification)&& !empty($stud_data->stud_qualification))?$stud_data->stud_qualification:'-';?></span>
            </td>
            <td>
                <label> DOB:</label>
                <span><?php echo (isset($stud_data->stud_dob)&& !empty($stud_data->stud_dob))?$stud_data->stud_dob:'-';?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label> Aadhar Number:</label>
                <span><?php echo (isset($stud_data->stud_aadhar_no)&& !empty($stud_data->stud_aadhar_no))?$stud_data->stud_aadhar_no:'-';?></span>
            </td>
            <td>
                <label> Handicaped:</label>
                <span><?php echo (isset($stud_data->stud_handicap )&& !empty($stud_data->stud_handicap ))?$stud_data->stud_handicap :'-';?></span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label>Address:</label>
                <span><?php echo (isset($stud_data->stud_permenant_address)&& !empty($stud_data->stud_permenant_address))?$stud_data->stud_permenant_address:'-';?></span>
            </td>
        </tr>
    </table>
</div>
</body>
</html>