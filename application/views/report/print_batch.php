<!DOCTYPE html>
<html>
<head>
    <style type="text/css"> table {border-collapse: collapse; } table, th, td {border: 1px solid black; padding: 3px; }</style>
</head>
<body>
<?php $inst_code=$this->session->userdata('inst_code');
$inst_name=$this->session->userdata('inst_name');
$inst_addr=$this->session->userdata('inst_addr'); ?>



<?php if(isset($stud_data) && !empty($stud_data)){ ?>
<?php $batch = array('7 AM to 8 AM', '8 AM to 9 AM','9 AM to 10 AM', '10 AM to 11 AM ', '11 AM to 12 AM', '12 PM to 1 PM', '1 PM to 2 PM', '2 PM to 3 PM', '3 PM to 4 PM', '4 PM to 5 PM', '5 PM to 6 PM', '6 PM to 7 PM', '7 PM to 8 PM', '8 PM to 9 PM', '9 PM to 10 PM'); ?>
<center>
    <h1><?php echo (isset($inst_name)&& !empty($inst_name))?$inst_name:'';?></h1>
    <h3><?php echo (isset($inst_code)&& !empty($inst_code))?$inst_code:'';?></h3>
</center>

<table align="center">
    <thead>
        <tr>
            <th style="text-align:center; font-size:12px;"> Batch Time </th>
            <?php $i=1;  for($i=1;$i<=20; $i++) { ?>
                <th style="text-align:center; font-size:12px;"> M-<?php echo $i; ?> </th>
            <?php } ?>
        </tr>
    </thead>
    <!-- <img  class="stud-pic" src="./uploads/stud_photos/'.$pic.'"> -->
    <tbody>
        <?php $n=1;
        foreach ($batch as $key) { ?>
            <tr>
                <td style="text-align:center; font-size:12px;"> <?php echo $key; ?> </td>
                <?php $i=1;  for($i=1;$i<=20; $i++) { 
                    $m_no = 'M-'.$i; 
                    $result = $this->admin_model->get_batch_list($key,$m_no); ?>
                <td style="text-align:center;">
                    <?php $pic = (isset($result->stud_photo) && !empty($result->stud_photo))?$result->stud_photo:"student.jpg";
                    $gr_no = (isset($result->gr_no) && !empty($result->gr_no))?$result->gr_no:"NA";
                    echo (isset($result) && !empty($result))?'
                    <span style="font-size:12px;"><b>'.$result->stud_name.' '.$result->stud_last_name.'</b></span><br> 
                    <span style="font-size:10px; color:rgb(53,152,220)">('.$result->course_name .')</span><br>
                    <span style="font-size:10px;"><i>GR. NO: '.$gr_no.'</i></span>':'-'; ?>
                </td>
            <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php } ?>


</body>
</html>
