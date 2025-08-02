<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Result</title>

<!-- COMMON LEVEL STYLES -->
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/layout4/css/light.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
<style type="text/css">
    table, th, td{
        text-align: center;
    }
    .col_width{
        width: 30%;
    }
    ins{
        color: red;
    }
    del{
        color: green;
    }
</style>
</head>
<body class="page-md page-header-fixed page-sidebar-closed">
<!-- BEGIN HEADER -->
<?php include('header.php'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php include('sidebar.php'); ?>	
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
            <?php $type = $this->session->userdata('type');  
            $time = $this->session->userdata('time');
            $course_id = $this->session->userdata('course_id');
            $stud_id = $this->session->userdata('stud_id');

            if($type=="objective") 
            { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col_width">
                                            प्रश्न
                                        </th>
                                        <th>
                                            एकूण गुण
                                        </th>
                                        <th>
                                            प्राप्त गुण
                                        </th>
                                        <th>
                                            Result
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Objective
                                        </td>
                                        <td>
                                            50
                                        </td>
                                        <td>
                                            <?php $obj_marks = $this->session->userdata('obj_marks'); echo round($obj_marks,2); ?>
                                        </td>
                                        <td>
                                            <span class="label label-sm <?php if($obj_marks<26){ echo 'label-warning'; $flag=1;}else{ echo 'label-success';} ?> ">
                                            <b><?php if($obj_marks<26){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></b> </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="caption font-blue caption-subject bold uppercase"> Objective Practice <i class="fa fa-angle-right"></i> Question</span>
                                        <a type="button" href="<?php echo base_url(); ?>objective_practice/<?php echo $time; ?>/0" class="btn btn-sm btn-primary" style="padding: 2px 5px; font-weight: bold; margin: 0px; float: right;"><b><span id="hm_timer"></span></b>Restart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <?php $i=1; $obj_data = $this->session->userdata('obj_data');
                                foreach ($obj_data as $key) 
                                {
                                    $question_id = $key['question_id'];
                                    $option_id = $key['stud_option_id'];
                                    $obj_que_data=$this->common_model->selectDetailsWhr('tbl_question','question_id',$question_id); 
                                    $obj_option_data=$this->common_model->selectAllWhr('tbl_option','question_id',$question_id); ?>
                                    <div class="inline-display" >
                                     
                                    <?php $question=preg_replace('#<[^>]+>#', ' ', $obj_que_data->question); ?>  
                                    <b>Q.<?php echo $i++; ?>) <?php echo isset($question) && !empty($question)?$question:''; ?></b>
                                    </div><br>
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
                                    <br>
                                    <?php if($obj_que_data->option_id==$option_id)
                                    {?>  
                                        <div class="row">
                                            <div class="col-sm-12">                                                  
                                                <div class="alert alert-success">
                                                    <strong>Correct! </strong>You made correct Selection.
                                                </div>
                                            </div>
                                        </div><hr/>
                                    <?php }else if($option_id==null) 
                                    { ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-info">
                                                     You didn't attempted this question.
                                                </div>
                                            </div>
                                        </div><hr/>
                                    <?php   }else{ ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-danger">
                                                    <strong>Incorrect!</strong> You made wrong selection.
                                                </div>
                                            </div>
                                        </div><hr/>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                </div>
            <?php }

            if($type=="email") 
            {
                $email_data = $this->session->userdata('email_data');
                $mail_id = $email_data['que_email_id'];
                $email_que_data=$this->common_model->selectDetailsWhr('tbl_email','email_id',$mail_id); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col_width">
                                            प्रश्न
                                        </th>
                                        <th>
                                            एकूण गुण
                                        </th>
                                        <th>
                                            प्राप्त गुण
                                        </th>
                                        <th>
                                            Result
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td>
                                            05
                                        </td>
                                        <td>
                                            <?php $email_marks = $this->session->userdata('email_marks'); echo round($email_marks,2); ?>
                                        </td>
                                        <td>
                                            <span class="label label-sm <?php if($email_marks < 2.5){ echo 'label-warning'; $flag=1;}else{ echo 'label-success';} ?> ">
                                            <b><?php if($email_marks < 2.5){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></b> </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row main_div">
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="caption font-blue caption-subject bold uppercase"> Email Practice <i class="fa fa-angle-right"></i> Question</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="" style="height:360px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;To:</b></span> &ensp; <?php echo $email_que_data->to; ?></p>
                                    <?php if($course_id == '4' || $course_id == '5' || $course_id == '6'){ ?>
                                        <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Cc:</b></span> &ensp; <?php echo $email_que_data->cc; ?></p>
                                        <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Bcc:</b></span> &ensp; <?php echo $email_que_data->bcc; ?></p>
                                    <?php } ?>
                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Subject:</b></span>&ensp; <?php echo $email_que_data->subject; ?></p>
                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Message:</b></span>&ensp; <br> <span class="que" style="white-space: pre-wrap; font-size: 14px;"><?php echo trim($email_que_data->message); ?></span></p>
                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Attachment:</b></span>&ensp; <?php echo $email_que_data->attachment_file; ?></p>
                                    <?php if($course_id == '4' || $course_id == '5' || $course_id == '6'){ ?>
                                        <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Attachment:</b></span>&ensp; <?php echo $email_que_data->attachment_file1; ?></p>
                                    <?php }  ?>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                    <div class="col-md-6">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Email Practice <i class="fa fa-angle-right"></i> Answer</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <a type="button" href="<?php echo base_url(); ?>email_practice/<?php  echo $time;?>/0" class="btn btn-sm btn-primary" style="padding: 1px 5px; font-weight: bold; margin: 0px; float: right;"><b><span id="hm_timer"></span></b>Restart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="row">
                                    <div class="col-sm-12">
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
                                            <div class="main_div">
                                            <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Message:</b></span>&ensp; <br><span class="ans" style="white-space: pre-wrap; font-size: 14px;"><?php echo trim($email_data['message']);?></span></p>
                                            <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Attachment:</b></span>&ensp;<?php echo $attachment_ans; ?></p>
                                            <?php if($course_id == '4' || $course_id == '5' || $course_id == '6'){ ?>
                                                <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b> &nbsp;Attachment:</b></span>&ensp;<?php echo $attachment_ans1;?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                </div>
            <?php }

            if($type=="letter") 
            {
                $letter_id = $this->session->userdata('letter_id');
                $letter_data=$this->common_model->selectDetailsWhr('tbl_letter','letter_id',$letter_id);
                $letter_que_base64 =$letter_data->letter_base64;
                $latter_ans_base64  = $this->session->userdata('latter_ans_base64');
                $text_data = $this->session->userdata('text_data');

                if($course_id == '1' || $course_id == '2' || $course_id == '3')
                {
                    $letter_result=compare_base64($letter_que_base64,$latter_ans_base64,'Word'); 
                    if($letter_result)
                    {
                        $result=$letter_result->ResultBase64;
                    }
                    else
                    {
                        $result=$latter_ans_base64;
                        $q_letter = explode(' ',trim($letter_data->letter_text));
                        $a_letter = explode(' ',trim($text_data));
                        $wrong = array_udiff($a_letter,$q_letter, 'strcasecmp');
                        $i=1; ?> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <span class="caption font-blue caption-subject bold uppercase"> Letter Practice <i class="fa fa-angle-right"></i> Question</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <?php foreach ($wrong as $val)
                                        {
                                            echo $new=' &nbsp;<span style="color:red; font-weight:bold; font-size: 14PX;">'.$i++.') '.$val.'  &nbsp;</span> ';
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
                else
                {
                    $result=$latter_ans_base64;
                    $q_letter = explode(' ',trim($letter_data->letter_text));
                    $a_letter = explode(' ',trim($text_data));
                    $wrong = array_udiff($a_letter,$q_letter, 'strcasecmp');
                    $i=1; ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span class="caption font-blue caption-subject bold uppercase"> Letter Practice <i class="fa fa-angle-right"></i> Question</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <?php foreach ($wrong as $val)
                                    {
                                        echo $new=' &nbsp;<span style="color:red; font-weight:bold; font-size: 14PX;">'.$i++.') '.$val.'  &nbsp;</span> ';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="row ">
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="caption font-blue caption-subject bold uppercase"> Letter Practice <i class="fa fa-angle-right"></i> Question</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div style="height: 850px;">
                                    <object type="application/x-silverlight-2" height="100%" width="100%;">
                                        <param name="source" value="<?php echo base_url(); ?>uploads/xap/letter.xap"/>
                                        <param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $letter_data->letter_base64;?>">
                                    </object>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Letter Practice <i class="fa fa-angle-right"></i> Answer
                                            <a style="margin-left: 15px; color: #F3565D;" href="data:application/octet-stream;base64,<?php echo $result;?>" download="result.docx">Result <i class="fa fa-download "></i></a></span>
                                    </div>
                                    <div class="col-sm-3">
                                        <a type="button" href="<?php echo base_url(); ?>letter_practice/<?php  echo $time;?>" class="btn btn-sm btn-primary" style="padding: 1px 5px; font-weight: bold; margin: 0px; float: right;"><b><span id="hm_timer"></span></b>Restart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div style="height: 850px; width: 100%">
                                    <object  type="application/x-silverlight-2" height="100%" width="100%;">
                                        <param name="source" value="<?php echo base_url(); ?>uploads/xap/letter.xap"/>
                                        <param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $result;?>">
                                    </object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }

            if($type=="statement") 
            {
                $statement_id = $this->session->userdata('statement_id');
                $statement_data=$this->common_model->selectDetailsWhr('tbl_statement','statement_id',$statement_id);
                $statement_que_base64 =$statement_data->statement_base64;
                $statement_ans_base64 = $this->session->userdata('statement_ans_base64');
                if($course_id == '1' || $course_id == '2' || $course_id == '3')
                {
                    $statement_result=compare_base64($statement_que_base64,$statement_ans_base64,$stud_id,'Excel'); 
                    if($statement_result)
                    {
                        $result=$statement_result->resultBase64File;
                    }
                    else
                    {
                        $result=$statement_ans_base64;
                    }
                }
                else
                {
                    $result=$statement_ans_base64;
                } ?>
                <?php if(isset($statement_result->errList) && !empty($statement_result->errList))
                { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $d_cnt=5; $h1=$h2=$a=$b=1;
                            $datamiss = $heading = $sub_heading = $border = $align = array();
                            foreach ($statement_result->errList as $key) 
                            {
                                if($key->category=='DATAMISS')
                                {

                                    $datamiss[] = array("errorMessage"=>trim($key->errorMessage), "cellDetails"=>trim($key->cellDetails), "expectedData"=>trim($key->expectedData), "actualData"=>trim($key->actualData), "category"=>trim($key->category));
                                    $d_cnt=$d_cnt-0.5;                          
                                }
                                else if($key->category=='FORMATMISS')
                                {
                                    if(trim($key->cellDetails)=='workbook1 -> Sheet1 -> B3')
                                    {
                                        $heading[] = array("errorMessage"=>trim($key->errorMessage), "cellDetails"=>trim($key->cellDetails), "expectedData"=>trim($key->expectedData), "actualData"=>trim($key->actualData), "category"=>trim($key->category));
                                        $h1=0;
                                    }                                                
                                    else if(trim($key->cellDetails)=='workbook1 -> Sheet1 -> B5' || trim($key->cellDetails)=='workbook1 -> Sheet1 -> C5' || trim($key->cellDetails)=='workbook1 -> Sheet1 -> D5' || trim($key->cellDetails)=='workbook1 -> Sheet1 -> E5' || trim($key->cellDetails)=='workbook1 -> Sheet1 -> F5')
                                    {
                                        $sub_heading[] = array("errorMessage"=>trim($key->errorMessage), "cellDetails"=>trim($key->cellDetails), "expectedData"=>trim($key->expectedData), "actualData"=>trim($key->actualData), "category"=>trim($key->category));
                                        $h2=0;
                                    }
                                    else if(trim($key->errorMessage)=='Cell Border Attributes does not Match')
                                    {
                                        $border[] = array("errorMessage"=>trim($key->errorMessage), "cellDetails"=>trim($key->cellDetails), "expectedData"=>trim($key->expectedData), "actualData"=>trim($key->actualData), "category"=>trim($key->category));
                                        $b=0;
                                    }
                                    else
                                    {
                                        $align[] = array("errorMessage"=>trim($key->errorMessage), "cellDetails"=>trim($key->cellDetails), "expectedData"=>trim($key->expectedData), "actualData"=>trim($key->actualData), "category"=>trim($key->category));
                                        $a=0;
                                    }
                                }
                            } ?>
                            <?php if($d_cnt<0){ $d_cnt=0; } $total_marks=$d_cnt+$h1+$h2+$a+$b+1; if($total_marks>10) { $total_marks=10; } ?>
                            <div class="table-scrollable">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="col_width">
                                                प्रश्न
                                            </th>
                                            <th>
                                                एकूण गुण
                                            </th>
                                            <th>
                                                प्राप्त गुण
                                            </th>
                                            <th>
                                                Result
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Statement
                                            </td>
                                            <td>
                                                10
                                            </td>
                                            <td>
                                                <?php echo round($total_marks,2); ?>
                                            </td>
                                            <td>
                                                <span class="label label-sm <?php if($total_marks < 5){ echo 'label-warning'; $flag=1;}else{ echo 'label-success';} ?> ">
                                                <b><?php if($total_marks < 5){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></b> </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="caption font-blue caption-subject bold uppercase"> Statement Practice <i class="fa fa-angle-right"></i> Question</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div style="height: 650px; width: 100%">
                                    <object type="application/x-silverlight-2" height="100%" width="100%;">
                                        <param name="source" value="<?php echo base_url(); ?>uploads/xap/excel.xap"/>
                                        <param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $statement_data->statement_base64;?>">
                                    </object>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Statement Practice <i class="fa fa-angle-right"></i> Answer
                                            <!-- <a style="margin-left: 15px; color: #F3565D;" href="data:application/octet-stream;base64,<?php echo $result;?>" download="result.xlsx">Result <i class="fa fa-download "></i></a> --></span>
                                    </div>
                                    <div class="col-sm-3">
                                        <a type="button" href="<?php echo base_url(); ?>statement_practice/<?php  echo $time;?>/0" class="btn btn-sm btn-primary" style="padding: 1px 5px; font-weight: bold; margin: 0px; float: right;"><b><span id="hm_timer"></span></b>Restart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div style="height: 650px; width: 100%">
                                    <object type="application/x-silverlight-2" height="100%" width="100%;">
                                        <param name="source" value="<?php echo base_url(); ?>uploads/xap/excel.xap"/>
                                        <param name="initParams" value="title=MSCEIA EXAM,iseditable=false,base64result=<?php echo $result;?>">
                                    </object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group accordion" id="accordion3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a style="color: #F3565D; text-decoration: none;" class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
                                    <b>Typing Misteks</b> </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_1" class="panel-collapse in">
                                    <div class="panel-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Error
                                                    </th>
                                                    <th>
                                                        Cell No
                                                    </th>
                                                    <th>
                                                        Expected
                                                    </th>
                                                    <th>
                                                        Actual
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php if(isset($datamiss) && !empty($datamiss)) {
                                                foreach ($datamiss as $key) { ?>
                                                    <tr>
                                                        <td><?php echo (isset($key['errorMessage']))?$key['errorMessage']:'' ?></td>
                                                        <td><?php echo (isset($key['cellDetails']))?$key['cellDetails']:'' ?></td>
                                                        <td><?php echo (isset($key['expectedData']))?str_replace('.0','',$key['expectedData']):'' ?></td>
                                                        <td><?php echo (isset($key['actualData']))?str_replace('.0','',$key['actualData']):'' ?></td>
                                                    </tr>
                                                <?php }
                                            }
                                            else { ?>
                                                <tr>
                                                    <td colspan="4">No Mistek Found</td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a style="color: #F3565D; text-decoration: none;" class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2">
                                    <b>Main Heading Misteks</b> </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Error
                                                    </th>
                                                    <th>
                                                        Cell No
                                                    </th>
                                                    <th>
                                                        Expected
                                                    </th>
                                                    <th>
                                                        Actual
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php if(isset($heading) && !empty($heading)) {
                                                foreach ($heading as $key) { ?>
                                                    <tr>
                                                        <td><?php echo (isset($key['errorMessage']))?$key['errorMessage']:'' ?></td>
                                                        <td><?php echo (isset($key['cellDetails']))?$key['cellDetails']:'' ?></td>
                                                        <td><?php echo (isset($key['expectedData']))?$key['expectedData']:'' ?></td>
                                                        <td><?php echo (isset($key['actualData']))?$key['actualData']:'' ?></td>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="4">No Mistek Found</td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a style="color: #F3565D; text-decoration: none;" class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3">
                                    <b>Sub Heading Misteks</b> </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Error
                                                    </th>
                                                    <th>
                                                        Cell No
                                                    </th>
                                                    <th>
                                                        Expected
                                                    </th>
                                                    <th>
                                                        Actual
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php if(isset($sub_heading) && !empty($sub_heading)) {
                                                foreach ($sub_heading as $key) { ?>
                                                    <tr>
                                                        <td><?php echo (isset($key['errorMessage']))?$key['errorMessage']:'' ?></td>
                                                        <td><?php echo (isset($key['cellDetails']))?$key['cellDetails']:'' ?></td>
                                                        <td><?php echo (isset($key['expectedData']))?$key['expectedData']:'' ?></td>
                                                        <td><?php echo (isset($key['actualData']))?$key['actualData']:'' ?></td>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="4">No Mistek Found</td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a style="color: #F3565D; text-decoration: none;" class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4">
                                    <b>Border Misteks</b> </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Error
                                                    </th>
                                                    <th>
                                                        Cell No
                                                    </th>
                                                    <th>
                                                        Expected
                                                    </th>
                                                    <th>
                                                        Actual
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php if(isset($border) && !empty($border)) {
                                                foreach ($border as $key) { ?>
                                                    <tr>
                                                        <td><?php echo (isset($key['errorMessage']))?$key['errorMessage']:'' ?></td>
                                                        <td><?php echo (isset($key['cellDetails']))?$key['cellDetails']:'' ?></td>
                                                        <td><?php echo (isset($key['expectedData']))?$key['expectedData']:'' ?></td>
                                                        <td><?php echo (isset($key['actualData']))?$key['actualData']:'' ?></td>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="4">No Mistek Found</td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a style="color: #F3565D; text-decoration: none;" class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_5">
                                    <b>Align Misteks</b> </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Error
                                                    </th>
                                                    <th>
                                                        Cell No
                                                    </th>
                                                    <th>
                                                        Expected
                                                    </th>
                                                    <th>
                                                        Actual
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php if(isset($align) && !empty($align)) {
                                                foreach ($align as $key) { ?>
                                                    <tr>
                                                        <td><?php echo (isset($key['errorMessage']))?$key['errorMessage']:'' ?></td>
                                                        <td><?php echo (isset($key['cellDetails']))?$key['cellDetails']:'' ?></td>
                                                        <td><?php echo (isset($key['expectedData']))?$key['expectedData']:'' ?></td>
                                                        <td><?php echo (isset($key['actualData']))?$key['actualData']:'' ?></td>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="4">No Mistek Found</td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }

            if($type=="speed") 
            {
                $passage_data = $this->session->userdata('speed_data');
                $speed_id = $passage_data['speed_id'];
                $passage_que_data=$this->common_model->selectDetailsWhr('tbl_speed','speed_id',$speed_id); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col_width">
                                            प्रश्न
                                        </th>
                                        <th>
                                            एकूण गुण
                                        </th>
                                        <th>
                                            प्राप्त गुण
                                        </th>
                                        <th>
                                            Result
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            गती उतारा / Speed Passage
                                        </td>
                                        <td>
                                            20
                                        </td>
                                        <td>
                                            <?php $speed_marks = $this->session->userdata('speed_marks');
                                            if($speed_marks<=0)
                                            {
                                                echo '0';
                                            }
                                            else
                                            {
                                                echo round($speed_marks,2);
                                            } ?>
                                        </td>
                                        <td>
                                            <span class="label label-sm <?php if($speed_marks<10){ echo 'label-warning'; $flag=1;}else{ echo 'label-success';} ?> ">
                                            <b><?php if($speed_marks<10){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></b></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row main_div">
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="caption font-blue caption-subject bold uppercase"> Speed Practice <i class="fa fa-angle-right"></i> Question</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">                               
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
                                    <p class="que" style="text-align:justify; white-space: pre-wrap; font-size: 14px;"><?php echo $passage_que_data->passage; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Speed Practice <i class="fa fa-angle-right"></i> Answer</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <a type="button" href="<?php echo base_url(); ?>speed_practice/<?php  echo $time;?>/0" class="btn btn-sm btn-primary" style="padding: 1px 5px; font-weight: bold; margin: 0px; float: right;"><b><span id="hm_timer"></span></b>Restart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="scroller" style="height:400px;" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
                                    <p style="text-align:justify; color: black; white-space: pre-wrap; font-size: 14px;" class="ans"><?php echo  trim($passage_data['student_passage']); ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                </div>
            <?php }

            if($type=="mobile") 
            { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col_width">
                                            प्रश्न
                                        </th>
                                        <th>
                                            एकूण गुण
                                        </th>
                                        <th>
                                            प्राप्त गुण
                                        </th>
                                        <th>
                                            Result
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Mobile Computing
                                        </td>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            <?php $mobile_marks = $this->session->userdata('mobile_marks');
                                            if($mobile_marks<=0)
                                            {
                                                echo '0';
                                            }
                                            else
                                            {
                                                echo round($mobile_marks,2);
                                            } ?>
                                        </td>
                                        <td>
                                            <span class="label label-sm <?php if($mobile_marks<2.5){ echo 'label-warning'; $flag=1;}else{ echo 'label-success';} ?> ">
                                            <b><?php if($mobile_marks<2.5){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></b></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php for ($i=0; $i <5; $i++) 
                { 
                    $mobile_session = $this->session->userdata('mobile_data');
                    $que=$mobile_session['que'][$i];
                    $ans=$mobile_session['ans'][$i];
                    $mobile_data=$this->common_model->selectDetailsWhr('tbl_mobile_computing','mobile_id',$que);  ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span class="caption font-blue caption-subject bold uppercase"> Speed Practice <i class="fa fa-angle-right"></i> Question</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <br>
                                    <fieldset>
                                        <p style="font-size: 15px; font-weight: bold;">Que. <?php echo (isset($mobile_data->quesion) && !empty($mobile_data->quesion))?$mobile_data->quesion:'';?></p>
                                        <br>
                                        <center><img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($mobile_data->folder_name) && !empty($mobile_data->folder_name))?$mobile_data->folder_name:'';?>/last.png" style="height: 505px; width: 300px; border: 1px solid #eee;" ></center>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="row">
                                         <div class="col-sm-9">
                                            <span class="caption font-blue caption-subject bold uppercase"> Speed Practice <i class="fa fa-angle-right"></i> Answer</span>
                                        </div>
                                        <div class="col-sm-3">
                                            <a type="button" href="<?php echo base_url(); ?>mobile_practice/<?php  echo $time;?>/0" class="btn btn-sm btn-primary" style="padding: 1px 5px; font-weight: bold; margin: 0px; float: right;"><b><span id="hm_timer"></span></b>Restart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
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
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } 
            }

            if($type=="shorthand") 
            {
                $shorthand_data = $this->session->userdata('shorthand_data');
                $shorthand_id = $shorthand_data['que_id'];
                $passage_que_data=$this->common_model->selectDetailsWhr('tbl_shorthand','shorthand_id',$shorthand_id); ?>
                <div class="row main_div">
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="caption font-blue caption-subject bold uppercase"> Shorhand Practice <i class="fa fa-angle-right"></i> Question</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
                                    <p class="que" style="text-align:justify; white-space: pre-wrap; font-size: 14px;"><?php echo $passage_que_data->desc; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Shorhand Practice <i class="fa fa-angle-right"></i> Answer</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <a type="button" href="<?php echo base_url(); ?>shorthand_practice/<?php  echo $time;?>/0" class="btn btn-sm btn-primary" style="padding: 1px 5px; font-weight: bold; margin: 0px; float: right;"><b><span id="hm_timer"></span></b>Restart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="scroller" style="height:400px;" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
                                    <p style="text-align:justify; color: black; white-space: pre-wrap; font-size: 14px;" class="ans"><?php echo  trim($shorthand_data['student_passage']); ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                </div>
            <?php }  ?>
		</div>
	</div>
</div>
<!-- BEGIN FOOTER -->
<?php include('footer.php'); ?>	
<!-- COMMON LEVEL js -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<!-- PAGE LEVEL js -->
<link type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" />
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>js/gmap.js"></script>
<script src="<?php echo base_url(); ?>js/disable_all.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/common.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {     
   	Metronic.init();
   	Layout.init();
    <?php 
       /* $this->session->unset_userdata("type");
        $this->session->unset_userdata("obj_data");
        $this->session->unset_userdata("obj_marks");
        $this->session->unset_userdata("email_marks");
        $this->session->unset_userdata("speed_marks");
        $this->session->unset_userdata("mobile_marks");
        $this->session->unset_userdata("shorthand_marks");
        $this->session->unset_userdata("email_practice");
        $this->session->unset_userdata("speed_practice");
        $this->session->unset_userdata("mobile_data");
        $this->session->unset_userdata("shorthand_practice");
        $this->session->unset_userdata("letter_id");
        $this->session->unset_userdata("latter_ans_base64");        
        $this->session->unset_userdata("statement_id");
        $this->session->unset_userdata("base64");
        $this->session->unset_userdata("text_data");*/
    ?>
});
$(".que").each(function(){
    var que = $(this).html();
    var ans = $(this).parents('.main_div').find('.ans').html();
    var data = changed(que,ans,0);

    $(this).parents('.main_div').find('.ans').html(data[1]);
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>