<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
		    border-collapse: collapse;
		}

		table, th, td {
		    border: 1px solid black;
		}
	</style>
</head>
<body>
	<center>
		<h2><?php echo (isset($inst_data->inst_name) && !empty($inst_data->inst_name))?$inst_data->inst_name:'';?></h2>
		<address><?php echo (isset($inst_data->inst_address) && !empty($inst_data->inst_address))?$inst_data->inst_address:'';?>, <?php echo (isset($inst_data->inst_taluka) && !empty($inst_data->inst_taluka))?$inst_data->inst_taluka:'';?>, <?php echo (isset($inst_data->inst_pincode) && !empty($inst_data->inst_pincode))?$inst_data->inst_pincode:'';?></address>
		<span><i><b>Email :</b> <?php echo (isset($inst_data->inst_mail) && !empty($inst_data->inst_mail))?$inst_data->inst_mail:'';?>, <b>Contact :</b> <?php echo (isset($inst_data->inst_contact) && !empty($inst_data->inst_contact))?$inst_data->inst_contact:'';?></i></span>
		<h3><?php echo date('F', strtotime($date)); ?> Month Attendence Report</h3>
	</center>
	<?php 
    	$month_days=date('t', strtotime($date));
      	$month = date('m', strtotime($date));
      	$year = date('Y',strtotime($date));
      	$present = 0;
      	$absent = 0;
      	/*$currentDaysOfMonth = date('d', strtotime($date1));
      	$days_status = '';*/
    ?>
	<table border="1" width="100%">
	    <thead>
	        <tr>
	            <th>S.R No</th>
	            <th>G.R No</th>
	            <th>Student Name</th>
	            <?php for ($i=1; $i <=$month_days ; $i++) 
	            {?> 
	            	<th align="center" style="padding: 0; margin:0px;"><?php echo $i; ?></th>
	            <?php } ?>
	            <th align="center">P</th>
	            <th align="center">A</th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php if(isset($stud_details) && !empty($stud_details))
	    { $j=1;
	        foreach ($stud_details as $key) 
	        {  ?>
	            <tr>
	            	<td align="center"><?php echo $j; ?></td>
	            	<td width="8%"><?php echo (isset($key->gr_no) && !empty($key->gr_no))?$key->gr_no:'NA';?></td>
	                <td width="20%"><?php echo (isset($key->stud_name) && !empty($key->stud_name))?$key->stud_name:'';?> <?php echo (isset($key->stud_last_name) && !empty($key->stud_last_name))?$key->stud_last_name:'';?><br><small style="color: #479CDC;"><?php echo (isset($key->stud_course_name) && !empty($key->stud_course_name))?$key->stud_course_name:'';?></small></td>
	                <?php $pr_day = array();
	                if(isset($key->present) && !empty($key->present)) 
	                {
	                   	$pr_day = explode(',', $key->present);
	                }
	                for ($i=1; $i <=$month_days; $i++) 
	                {						                        	
	                	$date1 = $year.'-'.$month.'-'.$i;
	                	$days_num = date('w', strtotime($date1)); 
	                    if (in_array($i, $pr_day))
	                    {
	                    	$days_status = 'P';
	                        $present++;
	                    }
	                    else
	                    { 
	                        if($days_num==0)
	                        {
	                            $days_status = 'HO';
	                            $present++;
	                        }
	                        else
	                        {
	                            $days_status = 'AB';
	                            $absent++;
	                        }
	                    }?>  
	                    <td align="center" style="font-size:8px; color: <?php echo($days_status=='P' OR $days_status=='HO')?'#26A69A':'#F3565D';?>""><?php echo isset($days_status) && !empty($days_status)?$days_status:'-';?></td>
	                <?php } $days_status=''; $pr_day = '';?>
	                <td align="center"><?php echo isset($present) && !empty($present)?$present:'0';?></td>
	                <td align="center"><?php echo isset($absent) && !empty($absent)?$absent:'0';?></td>
	            </tr>
	        <?php $j++; $absent=0; $present=0; }
	    } ?>
	    </tbody>
	</table>  
	<small style="color:#1F897F; font-weight: bold; font-size: 13px;"><i><span style="color: #26A69A;">P - Present.</span> &nbsp;&nbsp;  <span style="color: #F3565D;">AB - Absent.</span> &nbsp;&nbsp;  <span style="color: #26A69A;">HO - Holiday</span> &nbsp;&nbsp; </i></small>
</body>
</html>