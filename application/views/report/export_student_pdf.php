<!DOCTYPE html>
<html>
<head>
	<style type="text/css"> table {border-collapse: collapse; } table, th, td {border: 1px solid black; padding: 3px; }</style>
</head>
<body>
	<table width="100%">
		<thead>
			<tr>
				<th style="text-align:center; font-size:13px;"> Sr.No </th>
				<th style="text-align:center; font-size:13px;"> G.R. No </th>
				<th style="text-align:center; font-size:13px;"> Last Name </th>
				<th style="text-align:center; font-size:13px;"> First Name </th>
				<th style="text-align:center; font-size:13px;"> Middle Name </th>
				<th style="text-align:center; font-size:13px;"> Mother Name </th>
				<th style="text-align:center; font-size:13px;"> Date of Birth </th>
				<th style="text-align:center; font-size:13px;"> Date of Admission </th>
				<th style="text-align:center; font-size:13px;"> Email </th>
				<th style="text-align:center; font-size:13px;"> Contact </th>
				<th style="text-align:center; font-size:13px;"> Telephone No </th>
				<th style="text-align:center; font-size:13px;"> Address </th>
				<th style="text-align:center; font-size:13px;"> Aadhar Number </th>
				<th style="text-align:center; font-size:13px;"> Course Name </th>
				<th style="text-align:center; font-size:13px;"> Qualification </th>
			</tr>
		</thead>
		<tbody>
			<?php  if(isset($stud_data) && !empty($stud_data))
            { $no=1;
                foreach ($stud_data as $key) 
                { ?>
                	<tr>
                		<td align="center" style="font-size:13px;"><?php echo $no; ?></td>
		                <td align="center" style="font-size:13px;">-</td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_last_name) && !empty($key->stud_last_name))?$key->stud_last_name:''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_name) && !empty($key->stud_name))?$key->stud_name:''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_father_name) && !empty($key->stud_father_name))?$key->stud_father_name:''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_mother_name) && !empty($key->stud_mother_name))?$key->stud_mother_name:''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_dob) && !empty($key->stud_dob))?date('d-m-Y',strtotime($key->stud_dob)):''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_admission_date) && !empty($key->stud_admission_date))?date('d-m-Y',strtotime($key->stud_admission_date)):''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_mail) && !empty($key->stud_mail))?$key->stud_mail:''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_contact) && !empty($key->stud_contact))?$key->stud_contact:''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_telephone) && !empty($key->stud_telephone))?$key->stud_telephone:''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_permenant_address) && !empty($key->stud_permenant_address))?$key->stud_permenant_address:''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_aadhar_no) && !empty($key->stud_aadhar_no))?$key->stud_aadhar_no:''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_course_name) && !empty($key->stud_course_name))?$key->stud_course_name:''; ?></td>
		                <td style="font-size:13px;"><?php echo (isset($key->stud_qualification) && !empty($key->stud_qualification))?$key->stud_qualification:''; ?></td>
                	</tr>
                <?php $no++; } 
            }?>
		</tbody>
	</table>
</body>
</html>