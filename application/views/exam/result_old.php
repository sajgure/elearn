<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Elearn | Result</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
	<link href="<?php echo base_url(); ?>assets/exam/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/exam/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/exam/css/font-awesome.css" rel="stylesheet">
	     
	<link href="<?php echo base_url(); ?>assets/exam/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/exam/css/pages/signin.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/exam/img/favicon.PNG">
	<style type="text/css">
        ins{
            color: red;
        }
        del{
            color: green;
        }
    </style>
</head>
<body style="background: url('<?php echo base_url(); ?>assets/exam/img/back.jpg') no-repeat fixed center center / cover ;">
<div class="navbar navbar-fixed-top">
	<p style="background: #010101; color: #fff; margin-bottom: 0px; height: 28px;">&nbsp;&nbsp;&nbsp;&nbsp;<b>Name:</b> <?php echo $stud_data->stud_name.' '.$stud_data->stud_father_name.' '.$stud_data->stud_last_name; ?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Seat No:</b> <?php echo (isset($stud_data->stud_seat_no) && !empty($stud_data->stud_seat_no))?$stud_data->stud_seat_no:''?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Course:</b> GCC-TBC <?php echo (isset($stud_data->course_lang) && !empty($stud_data->course_lang))? $stud_data->course_lang :'';?> <?php echo (isset($stud_data->course_name) && !empty($stud_data->course_name))? $stud_data->course_name :'';?><a href="<?php echo base_url();?>back_to_home" class="btn blue btn-primary clear_session" style="float:right; margin: 0px;"></i><i class="icon-chevron-left"></i> &nbsp; Back to Home</a> </p> 
	<img src="<?php echo base_url(); ?>assets/exam/img/logo.jpg" style="width: 100%; height: 65px;">
</div> 
<div class="main-inner">
    <br>
    <div class="container" style="border-radius: 5px; border-radius: 15px; background:#ddd; padding: 14px;">
        <?php $stud_id = $this->session->userdata('stud_id');
        $course_id = $this->session->userdata('course_id'); 
		$first_name = $this->session->userdata('first_name'); 
		$last_name = $this->session->userdata('last_name'); ?>
      	<div class="row">
	      	<div class="span12">
	      		<div class="widget">
					<div class="widget-content">
						<table width="100%" style=" width:100%; border-color: #000;" border="1">
							<tr>
								<th style="text-align:center; color: #000; font-size:15px;" >प्रश्न</th>
								<th style="text-align:center; color: #000; font-size:15px;">एकूण गुण </th>
								<th style="text-align:center; color: #000; font-size:15px;">प्राप्त गुण  </th>
								<th style="text-align:center; color: #000; font-size:15px;"> Result  </th>
							</tr>
							<tr>
								<td style="text-align:center; color: #000;">Objective </td>
								<?php if($course_id!=7){ ?>
								<td style="text-align:center; color: #000;">50</td>
								<?php } else { ?>
								<td style="text-align:center; color: #000;">40</td>
								<?php } ?>
								<td style="text-align:center; color: #000;"><?php $obj_marks = $this->session->userdata('obj_marks'); echo round($obj_marks,2); ?></td>
								<td style="text-align:center; color: #000;"><?php if($obj_marks<26){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></td>
							</tr>
							<?php if($course_id!=7){ ?>
							<tr>
								<td style="text-align:center; color: #000;">Email / Email </td>
								<td style="text-align:center; color: #000;">05</td>
								<td style="text-align:center; color: #000;"><?php $email_marks = $this->session->userdata('email_marks'); echo round($email_marks,2); ?></td>
								<td style="text-align:center; color: #000; text-align: center; vertical-align: middle; margin-top: 5px;" ><?php if($email_marks < 2.5){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></td>
							</tr>
							<?php } ?>
							<tr>
								<td style="text-align:center; color: #000;">गती उतारा / Speed Passage </td>
								<td style="text-align:center; color: #000;">20</td>
								<td style="text-align:center; color: #000;">
								<?php $speed_marks = $this->session->userdata('speed_marks');
								$course_id = $this->session->userdata('course_id'); 

								if($speed_marks<=0)
								{
									echo '0';
								}
								else
								{
								 	echo round($speed_marks,2);
								} ?>
								</td>
								<td style="text-align:center; color: #000;"><?php if($speed_marks<10){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></td>
							</tr>
							<?php if($course_id==7){ ?>
							<tr>
								<td style="text-align:center; color: #000;">मोबाइल कम्प्युटिंग / Mobile Computing </td>
								<td style="text-align:center; color: #000;">05</td>
								<td style="text-align:center; color: #000;"><?php $mobile_marks = $this->session->userdata('mobile_marks'); echo round($mobile_marks,2); ?></td>
								<td style="text-align:center; color: #000; text-align: center; vertical-align: middle; margin-top: 5px;" ><?php if($mobile_marks < 2.5){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>	
				</div> 		
			</div>
			<div class="span12">
	      		<div class="widget">
					<div class="widget-content">
						<span class=" bold uppercase" style="font-size: 15px; color: #000;"><b>Section 1 &nbsp;<i class="icon-arrow-right  "></i> Objective </b></span>
					</div>	
				</div> 		
			</div>
			<div class="span12">
	      		<div class="widget">
					<div class="widget-content">		
						<?php $i=1; $obj_data = $this->session->userdata('obj_data');
						foreach ($obj_data as $key) 
						{
							$question_id = $key['question_id'];
							$option_id = $key['stud_option_id'];

							$obj_que_data=$this->common_model->selectDetailsWhr('tbl_question','question_id',$question_id); 
							$obj_option_data=$this->common_model->selectAllWhr('tbl_option','question_id',$question_id); ?>
							<div class="inline-display" style="color: #000;">
							Q.<?php echo $i++; ?>) <?php echo isset($obj_que_data->question) && !empty($obj_que_data->question)?$obj_que_data->question:''; ?>
							</div>
							<div class="radio-list">
								<?php  $j=1; if(isset($obj_option_data) && !empty($obj_option_data)){
									foreach ($obj_option_data as $row) 
									{ ?>
										<label style="<?php if($obj_que_data->option_id==$row->option_id){ echo 'color:green; font-weight: bold;';}else if($option_id==$row->option_id){ echo 'color:red;';} ?>">
										[<?php echo $j; ?>]
										<?php echo $row->option;?>
										</label>
									<?php $j++; }
								} ?>
							</div>

							<?php if($obj_que_data->option_id==$option_id)
							{?>																	
								<div class="alert alert-success">
									<strong style="color:green;">Correct! </strong>You made correct Selection.
								</div><hr/>
							<?php }else if($option_id==null) 
							{ ?>
								<div class="alert alert-warning" style="color:brown;">
									 You didn't attempted this question.
								</div><hr/>
							<?php	}else{ ?>
								<div class="alert alert-danger">
									<strong style="color:red;">Incorrect!</strong> You made wrong selection.
								</div><hr/>
							<?php } ?>
						<?php } ?> 	
						<div style="page-break-before: always;"></div>
					</div>	
				</div> 		
			</div>
			<?php if($course_id!=7){ ?>	
				<div class="span12">
		      		<div class="widget">
						<div class="widget-content">
							<span class=" bold uppercase" style="font-size: 15px; color: #000;"><b>Section 2 &nbsp;<i class="icon-arrow-right  "></i>  Email</b></span>
						</div>	
					</div> 		
				</div>	
				<span class="main_div">	
					<div class="span6">
			      		<div class="widget">
							<div class="widget-content">	
								<?php $email_data = $this->session->userdata('email_data');
								$mail_id = $email_data['email_id'];
								$email_que_data=$this->common_model->selectDetailsWhr('tbl_email','email_id',$mail_id); ?>
								<div class="caption">
									<span class="caption-subject font-green-sharp bold uppercase">Question:</span>			
								</div>			
								<hr>
								<div class="portlet-body portlet-section" style="min-height:250px; max-height: 350px;" id="portlet-section">
									<div class="" style="height:360px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
										<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;To:</b></span> &ensp; <?php echo $email_que_data->to; ?></p>
										<?php $course_id = $this->session->userdata('course_id');
										if($course_id == '4' || $course_id == '5' || $course_id == '6'){ ?>
											<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Cc:</b></span> &ensp; <?php echo $email_que_data->cc; ?></p>
											<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Bcc:</b></span> &ensp; <?php echo $email_que_data->bcc; ?></p>
										<?php } ?>
										<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Subject:</b></span>&ensp; <?php echo $email_que_data->subject; ?></p>
										<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Message:</b></span>&ensp; <br> <span class="que"><?php echo trim($email_que_data->message); ?></span></p>
										<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Attachment:</b></span>&ensp; <?php echo $email_que_data->attachment_file; ?></p>
										<?php if($course_id == '4' || $course_id == '5' || $course_id == '6'){ ?>
											<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Attachment:</b></span>&ensp; <?php echo $email_que_data->attachment_file1; ?></p>
										<?php }  ?>
									</div>								
								</div>		
							</div>	
						</div> 		
					</div>			
					<div class="span6">
						<div class="widget" >
							<div class="widget-content">
								<div class="caption">
									<span class="caption-subject font-green-sharp bold uppercase">Answer:</span>			
								</div>									
								<hr>
								<div class="portlet-body portlet-section" style="min-height:250px; max-height: 350px;" id="portlet-section">
									<div class="" style="height:360px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
										<?php $que_to = trim($email_que_data->to);
                                            $ans_to = trim($email_data['to']);
                                            if($que_to==$ans_to) {$to_ans=$ans_to; } else {$to_ans='<span style="color:red;">'.$ans_to.'</span>'; }

                                            $que_cc = trim($email_que_data->cc);
                                            $ans_cc = trim($email_data['cc']);
                                            if ($que_cc==$ans_cc) {$cc_ans=$ans_cc; } else {$cc_ans='<span style="color:red;">'.$ans_cc.'</span>'; }

                                            $que_bcc = trim($email_que_data->bcc);
                                            $ans_bcc = trim($email_data['bcc']);
                                            if ($que_bcc==$ans_bcc) {$bcc_ans=$ans_bcc; } else {$bcc_ans='<span style="color:red;">'.$ans_bcc.'</span>'; }

                                            $que_sub = trim($email_que_data->subject);
                                            $ans_sub = trim($email_data['subject']);
                                            if ($que_sub==$ans_sub) {$sub_ans=$ans_sub; } else {$sub_ans='<span style="color:red;">'.$ans_sub.'</span>'; }

                                            $que_attachment = trim($email_que_data->attachment_file);
                                            $ans_attachment = trim($email_data['attachment_file']);
                                            if($que_attachment==$ans_attachment) {$attachment_ans=$ans_attachment; } else {$attachment_ans='<span style="color:red;">'.$ans_attachment.'</span>'; }
                                           
                                            $que_attachment1 = trim($email_que_data->attachment_file1);
                                            $ans_attachment1 = trim($email_data['attachment_file1']);
                                            if($que_attachment1==$ans_attachment1) {$attachment_ans1=$ans_attachment1; } else {$attachment_ans1='<span style="color:red;">'.$ans_attachment1.'</span>'; } ?>
						                <input class="email_que" type="hidden" value="<?php echo trim($email_que_data->message); ?>" >
										<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;To:</b></span> &ensp; <?php echo $to_ans; ?></p>
										<?php if($course_id == '4' || $course_id == '5' || $course_id == '6'){ ?>
											<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Cc:</b></span> &ensp; <?php echo $cc_ans; ?></p>
											<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Bcc:</b></span> &ensp; <?php echo $bcc_ans; ?></p>
										<?php } ?>
										<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Subject:</b></span>&ensp; <?php echo $sub_ans; ?></p>
										<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Message:</b></span>&ensp; <br><span class="ans"><?php echo trim($email_data['message']);?></span></p>
										<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Attachment:</b></span>&ensp;<?php echo $attachment_ans; ?></p>
										<?php if($course_id == '4' || $course_id == '5' || $course_id == '6'){ ?>
											<p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Attachment:</b></span>&ensp;<?php echo $attachment_ans1;?></p>
										<?php } ?>
									</div>								
								</div>	
								<div style="page-break-before: always;"></div>
							</div>							
						</div>
					</div>
				</span>
			<?php } ?>
			<div class="span12">
				<div class="widget" >
					<div class="widget-content">
						<span class=" bold uppercase" style="font-size: 15px; color: #000;"><b>Section 3&nbsp;<i class="icon-arrow-right  "></i> Letter Writting</b></span>
					</div>
				</div>
			</div>	
			<div class="span6">
				<div class="widget" >
					<div class="widget-content">
						<div class="caption">
							<?php $letter_data = $this->session->userdata('letter_data');
							$letter_id = $this->session->userdata('letter_id'); 
							$letter_que_data=$this->common_model->selectDetailsWhr('tbl_letter','letter_id',$letter_id); ?>
							<span class="caption-subject font-green-sharp bold uppercase">Question :</span>
						</div>	
						<hr>
						<div class="portlet-body portlet-section" style="max-height: 920px;" id="portlet-section">
							<div style="min-height:370px;pointer-events:none; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none; height: 920px; max-height: 920px; background-image: url('<?php echo base_url(); ?>uploads/letter.png'); background-size: 100% 100%;">
								<div class="letter" style="padding: 37% 8% 5% 10%;">
									<?php if ($letter_que_data->course_id==12 || $letter_que_data->course_id==13 || $letter_que_data->course_id==15 || $letter_que_data->course_id==16) { ?>
									<style type="text/css"> .letter > .Normal > span { line-height: 20px; } </style>	
									<?php } ?>
									<style type="text/css">
									.letter > p { margin-top: 0px;margin-bottom: 0px;line-height: 1.15; } 
									.letter { font-family: 'Verdana';font-style: Normal;font-weight: normal; color: black; } 
									.letter > .Normal > span { font-size:14.5px; } 
									.letter > .Normal > span { text-align: justify; } 
									.letter > .TableNormal {width: 100%;}
									.letter > .TableNormal .Normal > span{font-size: 12px; }
									.letter > .TableNormal > .Normal {margin: 0 !important;}
									.letter > .p_F07355AD {text-align: justify; } 
									.letter > .p_1C2A55AB > span {font-weight: bold;}
									<?php $latter=$letter_que_data->letter_html;
									echo substr($latter, strpos( $latter, '.Normal') + 0); ?> 
								</div>
							</div>						
						</div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="widget" >
					<div class="widget-content">
						<div class="caption">
							<span class="caption-subject font-green-sharp bold uppercase">Answer:</span>			
						</div>									
						<hr>
						<div style="pointer-events:none; -webkit-touch-callout: none; -webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none; height: 920px; max-height: 920px; background-image: url('<?php echo base_url(); ?>uploads/letter.png'); background-size: 100% 100%;">
							<div class="letter1" style="padding: 37% 8% 5% 10%;">
								<style type="text/css">
								.letter1 > p { margin-top: 0px;margin-bottom: 0px;line-height: 1.15; } 
								.letter1 { font-family: 'Verdana';font-style: Normal;font-weight: normal;font-size: 16px; color: black; }
								<?php $latter=$letter_data['letter_html'];
								echo substr($latter, strpos( $latter, '.Normal') + 0); ?>
					        </div>
						</div>
					</div>
				</div>
			</div>
			<div class="span12">
				<div class="widget" >
					<div class="widget-content">
						<span class=" bold uppercase" style="font-size: 15px; color: #000;"><b>Your Wrong words <i class="icon-arrow-right  "></i></b></span>
						<?php 
						$q_letter = explode(' ',trim($letter_que_data->letter_text));
						$a_letter = explode(' ',trim($letter_data['letter_text']));
			            $wrong = array_udiff($a_letter,$q_letter, 'strcasecmp');
						$i=1;     
						foreach ($wrong as $val)
		                {
		                	echo $new=' &nbsp;<span style="color:red; font-weight:bold; font-size: 14PX;">'.$i++.') '.$val.'  &nbsp;</span> ';
		                } ?>
					</div>
				</div>
			</div>	
			<div class="span12">
				<div class="widget" >
					<div class="widget-content">
						<span class=" bold uppercase" style="font-size: 15px; color: #000;"><b>Section 4 &nbsp;<i class="icon-arrow-right  "></i> Statement Writting</b></span>
					</div>
				</div>
			</div>	
			<div class="span6">
				<div class="widget" >
					<div class="widget-content">
						<?php 
							$statement_data = $this->session->userdata('statement_data'); 
							$excel_id = $this->session->userdata('statement_id'); 
							$statement_base64 = $statement_data['statement_base64'];
							$statement_que_data=$this->common_model->selectDetailsWhr('tbl_statement','statement_id',$excel_id); 
						?>
						<span class="caption-subject font-green-sharp bold uppercase">Question :</span>			
						<hr>
						<div class="portlet-body portlet-section" style="max-height: 650px" id="portlet-section">
							<?php if(isset($statement_que_data) && !empty($statement_que_data))
							{ $statement_que= $statement_que_data->statement_base64; ?>
								<div id="silverlightControlHost" style="height: 650px; width: 100%">
						            <object id="Excel"  data="data:application/x-silverlight-2," type="application/x-silverlight-2" height="100%" width="100%;">
						                <param name="source" value="uploads/xap/excel.xap"/>
						                <param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $statement_que;?>">
						  			</object>
						            <iframe id="_sl_historyFrame" style="visibility:hidden;height:0px;width:0px;border:0px"></iframe>
						        </div>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="widget" >
					<div class="widget-content">
						<span class="caption-subject font-green-sharp bold uppercase">Answer :</span>			
						<hr>
						<div id="silverlightControlHost" style="height: 650px; width: 100%">
				            <object id="Excel"  data="data:application/x-silverlight-2," type="application/x-silverlight-2" height="100%" width="100%;">
				                <param name="source" value="uploads/xap/excel.xap"/>
				                <param name="onError" value="onSilverlightError">
				                <param name="background" value="white">
				                <param name="minRuntimeVersion" value="5.0.61118.0">
				                <param name="onLoad" value="silverlightLoaded">
				                <param name="autoUpgrade" value="true">
				                <param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $statement_base64;?>">
				  			</object>
				            <iframe id="_sl_historyFrame" style="visibility:hidden;height:0px;width:0px;border:0px"></iframe>
				        </div>
					</div>
				</div>
			</div>?>
			<div class="span12">
				<div class="widget" >
					<div class="widget-content">	
						<span class=" bold uppercase" style="font-size: 15px; color: #000;"><b>Section 5 &nbsp;<i class="icon-arrow-right  "></i> Speed Passage</b></span>
					</div>
				</div>
			</div>
			<span class="main_div">
				<div class="span6">
					<div class="widget" >
						<div class="widget-content">	
							<?php $passage_data = $this->session->userdata('passage_data');
							$passage_id = $passage_data['speed_id'];
							$passage_que_data=$this->common_model->selectDetailsWhr('tbl_speed','speed_id',$passage_id); ?>
							<div class="caption">
								<span class="caption-subject font-green-sharp bold uppercase">Question:</span>			
							</div>	
							<hr>								
							<div class="portlet-body portlet-section" style="min-height:450px;" id="portlet-section">
								<div class="scroller" style="height:450px;" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
									<p style="text-align:justify; color: black;" class="que"><?php echo trim($passage_que_data->passage); ?></p>
								</div>								
							</div>								
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="widget" >
						<div class="widget-content">	
							<div class="caption">
								<span class="caption-subject font-green-sharp bold uppercase">Answer:</span>
								<span style="float: right;">
								<?php $course_id = $this->session->userdata('course_id'); ?>
								<!-- Delete: <b><?php echo (isset($delcount) && !empty($delcount))?$delcount:'0'?></b></span> -->			
							</div>
							<hr>
							<div class="scroller" style="height:450px;" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
								<p style="text-align:justify; color: black;" class="ans"><?php echo  trim($passage_data['passage']); ?></p>
							</div>	
						</div>
					</div>
				</div>
			</span>
			<?php if($course_id==7){ ?>	
				<div class="span12">
		      		<div class="widget">
						<div class="widget-content">
							<span class=" bold uppercase" style="font-size: 15px; color: #000;"><b>Section 2 &nbsp;<i class="icon-arrow-right  "></i>  Email</b></span>
						</div>	
					</div> 		
				</div>	
				<?php for ($i=0; $i <5; $i++) { ?>
					<span class="main_div">	
						<div class="span6">
				      		<div class="widget">
								<div class="widget-content">
									<div class="caption">
										<span class="caption-subject font-green-sharp bold uppercase">Question:</span>	
									</div>			
									<hr>
									<?php $mobile_session = $this->session->userdata('mobile_data');
                                    $que=$mobile_session['que'][$i];
                                    $ans=$mobile_session['ans'][$i];
                                    $mobile_data=$this->common_model->selectDetailsWhr('tbl_mobile_computing','mobile_id',$que);  ?>
                                    <fieldset>
                                        <p style="font-size: 15px; font-weight: bold;">Que. <?php echo (isset($mobile_data->quesion) && !empty($mobile_data->quesion))?$mobile_data->quesion:'';?></p>
                                        <br>
                                        <center><img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($mobile_data->folder_name) && !empty($mobile_data->folder_name))?$mobile_data->folder_name:'';?>/last.png" style="height: 505px; width: 300px; border: 1px solid #eee;" ></center>
                                    </fieldset> 		
								</div>	
							</div> 		
						</div>			
						<div class="span6">
							<div class="widget" >
								<div class="widget-content">
									<div class="caption">
										<span class="caption-subject font-green-sharp bold uppercase">Answer:</span>			
									</div>									
									<hr>
									<fieldset>
                                        <center>
                                            <?php if($mobile_data->ans_steps==$ans) { ?>
                                                <div class="alert alert-success" style=" padding: 9px; font-size: 13px;"><strong>Well done,</strong> Your Answer Is Correct...!</div>
                                                <img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($mobile_data->folder_name) && !empty($mobile_data->folder_name))?$mobile_data->folder_name:'';?>/last.png" style="height: 519px; width: 300px; border: 1px solid #eee;" >
                                            <?php } 
                                            else 
                                            { 
                                                if($ans==0 || $ans==1)
                                                {
                                                    if($ans==0)
                                                    {
                                                        $ans='ans';
                                                    }
                                                    else
                                                    {
                                                        $ans='ans1';
                                                    }
                                                }
                                                else
                                                {
                                                    $ans1=$ans-1;
                                                    $ans=''.$mobile_data->folder_name.'/'.$ans1;
                                                } ?>
                                                <div class="alert alert-danger" style=" padding: 9px; font-size: 13px;"><strong>Oops,</strong> Your Answer Is Wrong...!</div>
                                                <img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo $ans; ?>.png" style="height: 519px; width: 300px; border: 1px solid #eee;" >
                                            <?php } ?>
                                        </center>
                                    </fieldset>
								</div>							
							</div>
						</div>
					</span>
				<?php } ?>
			<?php } ?>
		</div>
    </div>
    <br>
</div>
<script src="<?php echo base_url(); ?>assets/exam/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>

<script src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/common.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/gmap.js"></script>
<script type="text/javascript">
	$(".que").each(function(){
		var que = $(this).html();
        var ans = $(this).parents('.main_div').find('.ans').html();
        var data = changed(que,ans,0);

        $(this).parents('.main_div').find('.ans').html(data[1]);
    }); 	
</script>
</body>
</html>
