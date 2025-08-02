<!DOCTYPE html>
<html>
<head>
	<style type="text/css"> table {border-collapse: collapse; } table, th, td {border: 1px solid black; padding: 3px; }</style>
</head>
<body>
	<h2 style="text-align: center;">Payment Report</h2>
	<table width="100%">
		<thead>
			<tr>
				<th style="text-align:center; font-size:13px;"> Sr.No </th>
				<th style="text-align:center; font-size:13px;"> Student name </th>
				<th style="text-align:center; font-size:13px;">  Date of Admission </th>
				<th style="text-align:center; font-size:13px;"> 1st Instalment </th>
				<th style="text-align:center; font-size:13px;"> 2nd Instalment  </th>
				<th style="text-align:center; font-size:13px;"> 3rd Instalment  </th>
				<th style="text-align:center; font-size:13px;"> 4th Instalment </th>
				<th style="text-align:center; font-size:13px;"> 5th Instalment  </th>
				<th style="text-align:center; font-size:13px;"> Paid Amt </th>
				<th style="text-align:center; font-size:13px;"> Pending Amt </th>
			</tr>
		</thead>
		<tbody>
			<?php  if(isset($stud_data) && !empty($stud_data))
            {   $no=1;
       			$total_paid=0;
       			$total_remaining=0;
       			$total_fee=0;
                foreach ($stud_data as $key) 
                {  
                	$remaining_amount=0;
                	$paid_amount=0;
                	$paid_fees=$this->admin_model->fetch_amount($key->stud_id);
                	$course_fee = (isset($key->course_fee) && !empty($key->course_fee))?$key->course_fee:'0'; 
                	$total_fee= $total_fee + $key->course_fee; 
                	$gr_no = (isset($key->gr_no) && !empty($key->gr_no))?$key->gr_no:"NA";?>
                	<tr>
                		<td align="center" style="font-size:13px;"><?php echo $no; ?></td>
		                <td style="font-size:13px; text-align: center;"><?php echo (isset($key->stud_name) && !empty($key->stud_name))?$key->stud_name.' '.$key->stud_last_name.'<br>('.$key->course_name.') <br> GR NO :'.$gr_no:'-'; ?></td>
		                <td style="font-size:13px; text-align: center;"><?php echo (isset($key->stud_admission_date) && !empty($key->stud_admission_date))?date('d-m-Y',strtotime($key->stud_admission_date)):'-'; ?></td>
		                <?php if(isset($paid_fees) && !empty($paid_fees))
		                { 
		                    for($i=0;$i<5;$i++)
		                    { ?>
		                    	<td style="font-size:13px; text-align: center;"><?php echo (isset($paid_fees[$i]) && !empty($paid_fees[$i]))?'Amount : '.$paid_fees[$i]->fees.' <br> Date : '.$paid_fees[$i]->paid_date:'-'; ?></td>
			                    <?php if(isset($paid_fees[$i]))
			                    { 
			                        $paid_amount= $paid_amount + $paid_fees[$i]->amount;
			                    }
		                    } $remaining_amount=$key->course_fee-$paid_amount; ?>
		                    <td style="font-size:13px; text-align: center;"><?php echo (isset($paid_amount) && !empty($paid_amount))?$paid_amount:'0'; ?></td>
		                	<td style="font-size:13px; text-align: center;"><?php echo (isset($remaining_amount) && !empty($remaining_amount))?$remaining_amount:'-'; ?></td>
		                <?php $total_paid=$total_paid+$paid_amount;} 
		                else { ?>
			                <td style="font-size:13px; text-align: center;"><?php echo '-'; ?></td>
			                <td style="font-size:13px; text-align: center;"><?php echo '-'; ?></td>
			                <td style="font-size:13px; text-align: center;"><?php echo '-'; ?></td>
			                <td style="font-size:13px; text-align: center;"><?php echo '-'; ?></td>
			                <td style="font-size:13px; text-align: center;"><?php echo '-'; ?></td>
			                <td style="font-size:13px; text-align: center;"><?php echo '0'; ?></td>
			                <td style="font-size:13px; text-align: center;"><?php echo (isset($key->course_fee) && !empty($key->course_fee))?$key->course_fee:'-'; ?></td>
			            <?php }?>
		            </tr>
                <?php $no++; }
                $total_remaining = $total_fee - $total_paid;?>
                <tr> 
                	<td style="font-size:14px; text-align: right;" colspan="8">Total </td>
                	<td style="font-size:13px; text-align: center;" ><?php echo (isset($total_paid) && !empty($total_paid))?$total_paid:'-'; ?></td>
                	<td style="font-size:13px; text-align: center;" ><?php echo (isset($total_remaining) && !empty($total_remaining))?$total_remaining:'-'; ?></td>
                </tr>
            <?php }?>
		</tbody>
	</table>
</body>
</html>