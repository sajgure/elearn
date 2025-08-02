<!DOCTYPE html>
<html>
<head>
    <title>Payemt Details</title>
    <style type="text/css">
        /*.container{
            text-align:center;
        }
        td{
            font-size: 12px;
           
        }
        body{
            text-align: center;
            border: 1px solid gray;
        }
        th
        {
            font-size: 14px;
            text-align: center;
        }
        hr
        {
            margin-top: 0px;
            color: gray;
            width: 95%;
        }*/
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 4px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<?php $inst_code=$this->session->userdata('inst_code');
$inst_name=$this->session->userdata('inst_name'); 
$inst_addr=$this->session->userdata('inst_addr'); $paid=0;
$receipt_no= end($payment_data); ?>
<p style="font-size: 10px; margin-left: 5px; text-align: right;">Student Copy</p>
<center style="font-weight: bold;"><span style="font-size: 15px;"><?php echo (isset($inst_name)&& !empty($inst_name))?$inst_name:'';?></span> <span style="font-size: 10px;">(<?php echo (isset($inst_code)&& !empty($inst_code))?$inst_code:'';?>)<br><?php echo (isset($inst_addr)&& !empty($inst_addr))?$inst_addr:'';?></span></center>
<span style="font-size: 12px; float: right;"><b>Receipt Number: #<?php echo (isset($receipt_no->payment_track_id)&& !empty($receipt_no->payment_track_id))?str_pad($receipt_no->payment_track_id,4,"0",STR_PAD_LEFT):'';?></b></span>
<br>
<table width="100%">
    <tr>
        <td colspan="4">
            <b>Student Details</b>
        </td>
    </tr>   
    <tr>
        <td><b>GR Number:</b></td>
        <td><?php echo (isset($stud_data->gr_no)&& !empty($stud_data->gr_no))?$stud_data->gr_no:'';?></td>
        <td><b>Admission Date:</b></td>
        <td><?php echo (isset($stud_data->stud_admission_date)&& !empty($stud_data->stud_admission_date))?date('d-M-Y',strtotime($stud_data->stud_admission_date)):'';?></td>
    </tr>
    <tr>
        <td><b>Name:</b></td>
        <td><?php echo (isset($stud_data->stud_name)&& !empty($stud_data->stud_name))?$stud_data->stud_name.' ' .$stud_data->stud_father_name.' '.$stud_data->stud_last_name:'';?></td>
        <td><b>Course:</b></td>
        <td><?php echo (isset($stud_data->course_name)&& !empty($stud_data->course_name))?$stud_data->course_name:'';?></td>
    </tr>
    <tr>
        <td colspan="4">
            <b>Payment Details</b>
        </td>
    </tr>
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
    { $paid=0;
        foreach ($payment_data as $key ) 
        { $paid=$paid+$key->fee;?>
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
    <tr>
        <td colspan="3" style="text-align: right;">Total Amount :</td>
        <td style="text-align: right;">
             <b> Rs. <?php echo (isset($course_fee_data->total_fee)&& !empty($course_fee_data->total_fee))?$course_fee_data->total_fee:'00';?></b>
         </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right;">Paid Amount :</td>
        <td style="text-align: right;">
           <b> Rs. <?php echo (isset($paid)&& !empty($paid))?$paid:'00';?></b>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right;">Pending Amount :</td>
        <td style="text-align: right;">
           <b> Rs. <?php echo (isset($course_fee_data->fee)&& !empty($course_fee_data->fee))?($course_fee_data->total_fee - $paid ):'00';?></b>
        </td>
    </tr>
</table>
<br>
<p style="font-size: 14px; text-align: right;">Authorised Signatory</p>
<br>
<hr style="border: 1px dotted #444;">
<br>
<p style="font-size: 10px; margin-left: 5px; text-align: right;">Office Copy</p>
<center style="font-weight: bold;"><span style="font-size: 15px;"><?php echo (isset($inst_name)&& !empty($inst_name))?$inst_name:'';?></span> <span style="font-size: 10px;">(<?php echo (isset($inst_code)&& !empty($inst_code))?$inst_code:'';?>)<br><?php echo (isset($inst_addr)&& !empty($inst_addr))?$inst_addr:'';?></span></center>
<span style="font-size: 12px; float: right;"><b>Receipt Number: #<?php echo (isset($receipt_no->payment_track_id)&& !empty($receipt_no->payment_track_id))?str_pad($receipt_no->payment_track_id,4,"0",STR_PAD_LEFT):'';?></b></span>
<br>
<table width="100%">
    <tr>
        <td colspan="4">
            <b>Student Details</b>
        </td>
    </tr>   
    <tr>
        <td><b>GR Number:</b></td>
        <td><?php echo (isset($stud_data->gr_no)&& !empty($stud_data->gr_no))?$stud_data->gr_no:'';?></td>
        <td><b>Admission Date:</b></td>
        <td><?php echo (isset($stud_data->stud_admission_date)&& !empty($stud_data->stud_admission_date))?date('d-M-Y',strtotime($stud_data->stud_admission_date)):'';?></td>
    </tr>
    <tr>
        <td><b>Name:</b></td>
        <td><?php echo (isset($stud_data->stud_name)&& !empty($stud_data->stud_name))?$stud_data->stud_name.' ' .$stud_data->stud_father_name.' '.$stud_data->stud_last_name:'';?></td>
        <td><b>Course:</b></td>
        <td><?php echo (isset($stud_data->course_name)&& !empty($stud_data->course_name))?$stud_data->course_name:'';?></td>
    </tr>
    <tr>
        <td colspan="4">
            <b>Payment Details</b>
        </td>
    </tr>
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
    { $paid=0;
        foreach ($payment_data as $key ) 
        { $paid=$paid+$key->fee;?>
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
    <tr>
        <td colspan="3" style="text-align: right;">Total Amount :</td>
        <td style="text-align: right;">
             <b> Rs. <?php echo (isset($course_fee_data->total_fee)&& !empty($course_fee_data->total_fee))?$course_fee_data->total_fee:'00';?></b>
         </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right;">Paid Amount :</td>
        <td style="text-align: right;">
           <b> Rs. <?php echo (isset($paid)&& !empty($paid))?$paid:'00';?></b>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right;">Pending Amount :</td>
        <td style="text-align: right;">
           <b> Rs. <?php echo (isset($course_fee_data->fee)&& !empty($course_fee_data->fee))?($course_fee_data->total_fee - $paid ):'00';?></b>
        </td>
    </tr>
</table>
<br>
<p style="font-size: 14px; text-align: right;">Authorised Signatory</p>
</body>
</html>