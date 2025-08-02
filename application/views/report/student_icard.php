<!DOCTYPE html>
<html>
<head>
<style>
body{
    width: 90%;
    margin: auto;
}
th{
    border: 1px dotted #dddddd;    
    width: 40%;
    vertical-align: top;
} 

h3{
    font-size: 15px;
    font-weight: bold;
    margin: 0px;
    padding: 0px;
    color: #5a7391;
}

h1{
    font-size: 22px;
    color: #7F1752;
    font-weight: bold;
}
.box{
    padding: 10px;
    position: absolute;
}

.bg_img{
    height: 470px;
    width: 330px;
}

.user_img{
    border:2px solid #D47E1B;
    padding: 4px;
    height: 100px;

}

ul{
    padding: 0px 20px;
    font-size: 15px;
}
li{
    border-bottom: 2px dotted #eee;
    list-style: outside none none;
    padding: 8px 15px;
    color: #555;
    font-size: 14px;
    text-align: justify;
}
.center_align li{
    text-align: center;
}
</style>
</head>
<body>

<?php $inst_code=$this->session->userdata('inst_code');
$inst_name=$this->session->userdata('inst_name');
$inst_addr=$this->session->userdata('inst_addr'); ?>
<table>
    <tr>
        <th>
            <img class="bg_img" src="<?php echo base_url(); ?>images/id_card.jpg" >
            <div class="box">
                <h3> Inst code: <?php echo (isset($inst_code)&& !empty($inst_code))?$inst_code:'';?> </h3>
                <h1><?php echo (isset($inst_name)&& !empty($inst_name))?$inst_name:'';?></h1>
                <img class="user_img" src="<?php echo base_url(); ?>uploads/stud_photos/<?php echo (isset($stud_data->stud_photo) && !empty($stud_data->stud_photo))?$stud_data->stud_photo:'student.jpg';?>" alt="" />
                <h1><?php echo (isset($stud_data->stud_name)&& !empty($stud_data->stud_name))?$stud_data->stud_name:'';?> <?php echo (isset($stud_data->stud_father_name)&& !empty($stud_data->stud_father_name))?$stud_data->stud_father_name:'';?> <?php echo (isset($stud_data->stud_last_name)&& !empty($stud_data->stud_last_name))?$stud_data->stud_last_name:'';?> </h1>
                <h3><?php echo (isset($stud_data->course_name)&& !empty($stud_data->course_name))?$stud_data->course_name:'';?></h3>
                <ul class="center_align">
                    <li>
                        Mobile No:&nbsp;<?php echo (isset($stud_data->stud_contact)&& !empty($stud_data->stud_contact))?$stud_data->stud_contact:'';?>
                    </li>
                    <li>
                        E-Mail:&nbsp;<?php echo (isset($stud_data->stud_mail)&& !empty($stud_data->stud_mail))?$stud_data->stud_mail:'';?>
                    </li>
                    <li>
                        DOA:&nbsp;<?php echo (isset($stud_data->stud_admission_date)&& !empty($stud_data->stud_admission_date))?date('d-M-Y',strtotime($stud_data->stud_admission_date)):'-';?>
                    </li>
                    <li>
                        Batch:&nbsp;Jan-2019 to Aug-2019
                    </li>
                </ul>
            </div>
        </th>
        <th>
            <img class="bg_img" src="<?php echo base_url(); ?>images/id_card.jpg" >
            <div class="box">
                <h3><?php echo (isset($inst_name)&& !empty($inst_name))?$inst_name:'';?></h3>
                <h1><u>ID card Instructions</u></h1>
                <ul>
                    <li>
                        1)&nbsp;Identification cards are property of <?php echo (isset($inst_name)&& !empty($inst_name))?$inst_name:'';?>.
                    </li>
                    <li>
                        2)&nbsp;If found, please return to the <?php echo (isset($inst_name)&& !empty($inst_name))?$inst_name:'';?>.
                    </li>
                    <li>
                        3)&nbsp;Students are requested to carry their ID card.
                    </li>
                    <li>
                        4)&nbsp;Students are requested to wear their ID card when they are in the institute premises.
                    </li>
                </ul>
                <h3 style="padding: 0px 20px; font-size: 14px; color: #555;"> Inst Address <br><i><?php echo (isset($inst_addr)&& !empty($inst_addr))?$inst_addr:'';?></i> </h3>
            </div>
        </th>
    </tr>
</table>

</body>
</html>
