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
<?php $this->load->view('admin/header'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php $this->load->view('admin/sidebar'); ?>    
    <!-- BEGIN CONTENT -->
    <?php $course_id = $stud_data->stud_course; ?>
    <div class="page-content-wrapper">
        <div class="page-content">
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
                                <?php if($course_id<10) { ?>
                                    <tr>
                                        <td>
                                            Objective
                                        </td>
                                        <td>
                                            25
                                        </td>
                                        <td>
                                            <?php $obj_marks = $result_data->objective_marks; echo round($obj_marks,2); ?>
                                        </td>
                                        <td>
                                            <span class="label label-sm <?php if($obj_marks<10){ echo 'label-warning'; $flag=1;}else{ echo 'label-success';} ?> ">
                                            <b><?php if($obj_marks<10){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></b> </span>
                                        </td>
                                    </tr>
                                    <?php if($course_id!=7 && $course_id!=8 && $course_id!=9){ ?>
                                        <tr>
                                            <td>
                                                Email / Email
                                            </td>
                                            <td>
                                                05
                                            </td>
                                            <td>
                                                <?php $email_marks = $result_data->email_marks; echo round($email_marks,2); ?>
                                            </td>
                                            <td>
                                                <span class="label label-sm <?php if($email_marks < 2.5){ echo 'label-warning'; $flag=1;}else{ echo 'label-success';} ?> ">
                                                <b><?php if($email_marks < 2.5){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></b> </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>
                                            गती उतारा / Speed Passage
                                        </td>
                                        <td>
                                            40
                                        </td>
                                        <td>
                                            <?php $speed_marks = $result_data->speed_marks;
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
                                            <b><?php if($speed_marks<16){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></b></span>
                                        </td>
                                    </tr>
                                    <?php if($course_id==7 || $course_id==8 || $course_id==9 ){ ?>
                                        <tr>
                                            <td>
                                                Mobile Computing
                                            </td>
                                            <td>
                                                5
                                            </td>
                                            <td>
                                                <?php $mobile_marks = $result_data->mobile_marks;
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
                                    <?php } 
                                } if($course_id>9) { ?>
                                    <tr>
                                        <td>
                                            Shorthand Practice
                                        </td>
                                        <td>
                                            50
                                        </td>
                                        <td>
                                            <?php $shorthand_marks = $this->session->userdata('shorthand_marks');
                                            if($shorthand_marks<=0)
                                            {
                                                echo '0';
                                            }
                                            else
                                            {
                                                echo round($shorthand_marks,2);
                                            } ?>
                                        </td>
                                        <td>
                                            <span class="label label-sm <?php if($shorthand_marks<25){ echo 'label-warning'; $flag=1;}else{ echo 'label-success';} ?> ">
                                            <b><?php if($shorthand_marks<25){ echo 'FAIL'; $flag=1;}else{ echo 'PASS';} ?></b></span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php if($course_id<10) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="caption font-blue caption-subject bold uppercase"> Section 1 <i class="fa fa-angle-right"></i> Objective</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <?php $i=1; foreach ($question_data as $key)
                                {
                                    $obj_option_data=$this->common_model->selectAllWhr('tbl_option','question_id',$key->question_id); ?>
                                    <div class="inline-display" > <b>Q.<?php echo $i++; ?>) <?php echo isset($key->question) && !empty($key->question)?$key->question:''; ?> </b></div><br>
                                    <div class="radio-list">
                                        <?php  $j=1; if(isset($obj_option_data) && !empty($obj_option_data)){
                                            foreach ($obj_option_data as $row) 
                                            { ?>
                                                <label style="<?php if($key->option_id==$row->option_id){ echo 'color:green;';}else if($key->stud_option_id==$row->option_id){ echo 'color:red;';} ?> margin-left: 15px;">
                                                [<?php echo $j; ?>]
                                                <?php echo $row->option;?>
                                                </label>
                                            <?php $j++; }
                                        } ?>
                                    </div>
                                    <?php if($key->option_id==$key->stud_option_id){?>                
                                        <div class="row">
                                            <div class="col-sm-12">                                                  
                                                <div class="alert alert-success">
                                                    <strong>Correct! </strong>You made correct Selection.
                                                </div>
                                            </div>
                                        </div><hr style="padding: 1px; margin: 1px;">
                                    <?php }else if($key->stud_option_id==null) { ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-info">
                                                     You didn't attempted this question.
                                                </div>
                                            </div>
                                        </div><hr style="padding: 1px; margin: 1px;">
                                    <?php }else{ ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-danger">
                                                    <strong>Incorrect!</strong> You made wrong selection.
                                                </div>
                                            </div>
                                        </div><hr style="padding: 1px; margin: 1px;">
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($course_id!=7){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light">
                                <div class="portlet-title" style="margin-bottom: -30px;">
                                    <div class="row">
                                         <div class="col-sm-9">
                                            <span class="caption font-blue caption-subject bold uppercase"> Section 2 <i class="fa fa-angle-right"></i> Email</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row main_div">
                        <div class="col-md-6">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span class="caption font-blue caption-subject bold uppercase"> Email <i class="fa fa-angle-right"></i> Question</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="" style="height:360px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
                                        <?php $email_id=$result_data->email_id; 
                                        $email_data = $this->common_model->selectDetailsWhr('tbl_email','email_id',$email_id);
                                        if(isset($email_data) && !empty($email_data)) 
                                        { ?>
                                            <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>To:</b></span> &ensp; <?php echo (isset($email_data->to) && !empty($email_data->to))?$email_data->to:''; ?></p>

                                            <?php if($email_data->email_id == 4 || $email_data->email_id == 5 || $email_data->email_id == 6) 
                                            { ?>
                                                <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Cc:</b></span> &ensp; <?php echo (isset($email_data->cc) && !empty($email_data->cc))?$email_data->cc:''; ?></p>
                                                <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Bcc:</b></span> &ensp; <?php echo (isset($email_data->bcc) && !empty($email_data->bcc))?$email_data->bcc:''; ?></p>
                                            <?php }?>
                                            <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Subject:</b></span>&ensp; <?php echo (isset($email_data->subject) && !empty($email_data->subject))?$email_data->subject:''; ?></p>
                                            <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Message:</b></span>&ensp; <br> <span class="que"><?php echo (isset($email_data->message) && !empty($email_data->message))?$email_data->message:''; ?></span></p>
                                            <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Attachment:</b></span>&ensp; <?php echo (isset($email_data->attachment_file) && !empty($email_data->attachment_file))?$email_data->attachment_file:''; ?></p>
                                            <?php if($email_data->email_id == 4 || $email_data->email_id == 5 || $email_data->email_id == 6) 
                                            { ?>
                                                <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Attachment:</b></span>&ensp; <?php echo (isset($email_data->attachment_file1) && !empty($email_data->attachment_file1))?$email_data->attachment_file1:''; ?></p>
                                            <?php }?>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="row">
                                         <div class="col-sm-9">
                                            <span class="caption font-blue caption-subject bold uppercase"> Email <i class="fa fa-angle-right"></i> Answer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="" style="height:360px" data-always-visible="1" data-rail-visible="1" data-rail-color="blue" data-handle-color="red">
                                                <?php if(isset($result_data) && !empty($result_data)) 
                                                { 

                                                    $que_to = $email_data->to;
                                                    $ans_to = $result_data->to;
                                                    if($que_to==$ans_to) {$to_ans=$ans_to; } else {$to_ans='<span style="color:red; background:#FFE6E6;">'.$ans_to.'</span>'; }

                                                    $que_cc = $email_data->cc;
                                                    $ans_cc = $result_data->cc;
                                                    if ($que_cc==$ans_cc) {$cc_ans=$ans_cc; } else {$cc_ans='<span style="color:red; background:#FFE6E6;">'.$ans_cc.'</span>'; }

                                                    $que_bcc = $email_data->bcc;
                                                    $ans_bcc = $result_data->bcc;
                                                    if ($que_bcc==$ans_bcc) {$bcc_ans=$ans_bcc; } else {$bcc_ans='<span style="color:red; background:#FFE6E6;">'.$ans_bcc.'</span>'; }

                                                    $que_sub = $email_data->subject;
                                                    $ans_sub = $result_data->subject;
                                                    if ($que_sub==$ans_sub) {$sub_ans=$ans_sub; } else {$sub_ans='<span style="color:red; background:#FFE6E6;">'.$ans_sub.'</span>'; }

                                                    $que_attachment = $email_data->attachment_file;
                                                    $ans_attachment = $result_data->attachment_file;
                                                    if( $que_attachment==$ans_attachment) {$attachment_ans=$ans_attachment; } else {$attachment_ans='<span style="color:red; background:#FFE6E6;">'.$ans_attachment.'</span>'; }
                                                   
                                                    $que_attachment1 = $email_data->attachment_file1;
                                                    $ans_attachment1 = $result_data->attachment_file1;
                                                    if( $que_attachment1==$ans_attachment1) {$attachment_ans1=$ans_attachment1; } else {$attachment_ans1='<span style="color:red; background:#FFE6E6;">'.$ans_attachment1.'</span>'; }
                                                }?>
                                                <span class="email_que" style="display:none;" ><?php echo trim($result_data->message); ?></span>
                                                <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>To:</b></span> &ensp; <?php echo (isset($to_ans) && !empty($to_ans))?$to_ans:''; ?></p>
                                                <?php if($email_data->email_id == 4 || $email_data->email_id == 5 || $email_data->email_id == 6) 
                                                { ?>
                                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Cc:</b></span> &ensp; <?php echo (isset($cc_ans) && !empty($cc_ans))?$cc_ans:''; ?></p>
                                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Bcc:</b></span> &ensp; <?php echo (isset($bcc_ans) && !empty($bcc_ans))?$bcc_ans:''; ?></p>
                                                <?php }?>
                                                <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Subject:</b></span>&ensp; <?php echo (isset($sub_ans) && !empty($sub_ans))?$sub_ans:''; ?></p>
                                                <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Message:</b></span>&ensp; <br><span class="ans"><?php echo (isset($result_data->message) && !empty($result_data->message))?$result_data->message:''; ?></span></p>
                                                <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Attachment:</b></span>&ensp; <?php echo (isset($attachment_ans) && !empty($attachment_ans))?$attachment_ans:''; ?></p>
                                                <?php if($email_data->email_id == 4 || $email_data->email_id == 5 || $email_data->email_id == 6) 
                                                { ?>
                                                    <p style="text-align:justify;" ><span class="caption-subject font-green-sharp uppercase"><b>Attachment:</b></span>&ensp; <?php echo (isset($attachment_ans1) && !empty($attachment_ans1))?$attachment_ans1:''; ?></p>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title" style="margin-bottom: -30px;">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Section 3 <i class="fa fa-angle-right"></i> Letter</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="caption font-blue caption-subject bold uppercase"> Letter <i class="fa fa-angle-right"></i> Question</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <?php $letter_que_data=$this->common_model->selectDetailsWhr('tbl_letter','letter_id',$result_data->letter_id); ?>
                                <div class="portlet-body portlet-section" style="max-height: 950px" id="portlet-section">
                                    <?php if(isset($letter_que_data) && !empty($letter_que_data))
                                    { $letter_que= $letter_que_data->letter_base64; ?>
                                        <div id="silverlightControlHost" style="height: 950px; width: 100%">
                                            <object id="Excel"  data="data:application/x-silverlight-2," type="application/x-silverlight-2" height="100%" width="100%;">
                                                <param name="source" value="<?php echo base_url(); ?>uploads/xap/letter.xap"/>
                                                <param name="onLoad" value="silverlightLoaded">
                                                <param name="initParams" value="title=MSCEIA EXAM,iseditable=true,base64result=<?php echo $letter_que;?>">
                                            </object>
                                            <iframe id="_sl_historyFrame" style="visibility:hidden;height:0px;width:0px;border:0px"></iframe>
                                        </div>
                                    <?php }?>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Letter <i class="fa fa-angle-right"></i> Answer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="portlet-body portlet-section" style="max-height: 950px" id="portlet-section">
                                            <?php if(isset($result_data) && !empty($result_data))
                                            { $letter_ans= $result_data->letter_base64; ?>
                                                <div id="silverlightControlHost" style="height: 950px; width: 100%">
                                                    <object id="Excel"  data="data:application/x-silverlight-2," type="application/x-silverlight-2" height="100%" width="100%;">
                                                        <param name="source" value="<?php echo base_url(); ?>uploads/xap/letter.xap"/>
                                                        <param name="onLoad" value="silverlightLoaded">
                                                        <param name="initParams" value="title=MSCEIA EXAM,iseditable=true,base64result=<?php echo $letter_ans;?>">
                                                    </object>
                                                    <iframe id="_sl_historyFrame" style="visibility:hidden;height:0px;width:0px;border:0px"></iframe>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title" style="margin-bottom: -30px;">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Section 4 <i class="fa fa-angle-right"></i> Statement</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="caption font-blue caption-subject bold uppercase"> Statement <i class="fa fa-angle-right"></i> Question</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <?php $statement_que_data=$this->common_model->selectDetailsWhr('tbl_statement','statement_id',$result_data->statement_id); ?>
                                <div class="portlet-body portlet-section" style="max-height: 950px" id="portlet-section">
                                    <?php if(isset($statement_que_data) && !empty($statement_que_data))
                                    { $statement_que= $statement_que_data->statement_base64; ?>
                                        <div id="silverlightControlHost" style="height: 950px; width: 100%">
                                            <object id="Excel"  data="data:application/x-silverlight-2," type="application/x-silverlight-2" height="100%" width="100%;">
                                                <param name="source" value="<?php echo base_url(); ?>uploads/xap/excel.xap"/>
                                                <param name="onLoad" value="silverlightLoaded">
                                                <param name="initParams" value="title=MSCEIA EXAM,iseditable=true,base64result=<?php echo $statement_que;?>">
                                            </object>
                                            <iframe id="_sl_historyFrame" style="visibility:hidden;height:0px;width:0px;border:0px"></iframe>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Statement <i class="fa fa-angle-right"></i> Answer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <?php if(isset($result_data) && !empty($result_data))
                                { $statement_ans= $result_data->statement_base64; ?>
                                    <div id="silverlightControlHost" style="height: 950px; width: 100%">
                                        <object id="Excel"  data="data:application/x-silverlight-2," type="application/x-silverlight-2" height="100%" width="100%;">
                                            <param name="source" value="<?php echo base_url(); ?>uploads/xap/excel.xap"/>
                                            <param name="onLoad" value="silverlightLoaded">
                                            <param name="initParams" value="title=MSCEIA EXAM,iseditable=true,base64result=<?php echo $statement_ans;?>">
                                        </object>
                                        <iframe id="_sl_historyFrame" style="visibility:hidden;height:0px;width:0px;border:0px"></iframe>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title" style="margin-bottom: -30px;">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Section 5 <i class="fa fa-angle-right"></i> Speed Passage</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row main_div">
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="caption font-blue caption-subject bold uppercase"> Speed Passage <i class="fa fa-angle-right"></i> Question</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <?php $speed_que_data=$this->common_model->selectDetailsWhr('tbl_speed','speed_id',$result_data->speed_id); 
                                $speed_que= $speed_que_data->passage;
                                if(isset($result_data) && !empty($result_data)) 
                                { ?>
                                    <p style="text-align:justify;" class="que marathi"><?php echo (isset($speed_que) && !empty($speed_que))?$speed_que:''; ?></p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Speed Passage <i class="fa fa-angle-right"></i> Answer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p style="text-align:justify;" class="ans marathi"><?php echo (isset($result_data->passage) && !empty($result_data->passage))?$result_data->passage:''; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } 
            if($course_id==7){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light">
                            <div class="portlet-title" style="margin-bottom: -30px;">
                                <div class="row">
                                     <div class="col-sm-9">
                                        <span class="caption font-blue caption-subject bold uppercase"> Section 5 <i class="fa fa-angle-right"></i> Mobile Computing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php for ($i=0; $i <5; $i++) { 
                    $que=explode(',', $result_data->mobile_que);
                    $ans=explode(',', $result_data->mobile_ans);
                    $mobile_data=$this->common_model->selectDetailsWhr('tbl_mobile_computing','mobile_id',$que[$i]);  ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portlet light" style="height: 653px;">
                                <div class="portlet-title">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span class="caption font-blue caption-subject bold uppercase"> Question <i class="fa fa-angle-right"></i> <?php echo (isset($mobile_data->quesion) && !empty($mobile_data->quesion))?$mobile_data->quesion:'';?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <center><img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($mobile_data->folder_name) && !empty($mobile_data->folder_name))?$mobile_data->folder_name:'';?>/last.png" style="height: 505px; width: 300px; border: 1px solid #eee;" ></center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light" style="height: 653px;">
                                <div class="portlet-title">
                                    <div class="row">
                                         <div class="col-sm-9">
                                            <span class="caption font-blue caption-subject bold uppercase"> Mobile Computing <i class="fa fa-angle-right"></i> Answer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <center>
                                        <?php if($mobile_data->ans_steps==$ans[$i]) { ?>
                                            <div class="alert alert-success" style=" padding: 9px; font-size: 13px;"><strong>Well done,</strong> Your Answer Is Correct...!</div>
                                            <img src="<?php echo base_url(); ?>uploads/mobile_computing/<?php echo (isset($mobile_data->folder_name) && !empty($mobile_data->folder_name))?$mobile_data->folder_name:'';?>/last.png" style="height: 519px; width: 300px; border: 1px solid #eee;" >
                                        <?php } 
                                        else 
                                        { 
                                            if($ans[$i]==0 || $ans[$i]==1)
                                            {
                                                if($ans[$i]==0)
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
                                                $ans1=$ans[$i]-1;
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
            } ?>
        </div>
    </div>
</div>
<!-- BEGIN FOOTER -->
<?php $this->load->view('admin/footer'); ?> 
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