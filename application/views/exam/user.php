<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Elearn | User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
<link href="<?php echo base_url(); ?>assets/exam/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/exam/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/exam/css/font-awesome.css" rel="stylesheet">
 
<link href="<?php echo base_url(); ?>assets/exam/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/exam/css/pages/signin.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/exam/img/favicon.PNG">
<style type="text/css">
    td{
        color: #020201;
    }
    .blinking{
    animation:blinkingText 2.5s infinite;
    }
    @keyframes blinkingText{
        0%{     color: #ff170b;    }
        49%{    color: transparent; }
        50%{    color: #ff4e43; }
        99%{    color: transparent;  }
        100%{   color: #ff170b;    }
    }

>hiii

</style>
</head>
<body style="background: url('<?php echo base_url(); ?>assets/exam/img/back.jpg') no-repeat fixed center center / cover ;">
<div>
    <br>
    <a href="<?php echo base_url(); ?>logout" class="btn btn-danger" style="float: right;margin-left: 5px; margin-right: 5px; ">Logout</a>&nbsp;&nbsp;
    <a href="<?php echo base_url(); ?>dashboard" class="btn  btn-danger" style="float: right; ">Elearn</a>
</div>
<div class="account-container" style="background:#EAE2DF; width: 65%;border-radius: 0px; margin-top: 30px;">
    <div class="navbar navbar-fixed-top">
        <img src="<?php echo base_url(); ?>assets/exam/img/user_logo.jpg" style="width: 100%; height: 80px;">
    </div> 
    <div class="content clearfix">
        <center><span class="blinking" style="font-size: 20px; color: red;">This is not a msceia Pre-Exam, it's only for practice purpose... </span><br>
            <span style="font-size: 17px; color: #000049;"><b>Computer Typing Examission </b></span><br><span style="font-size: 15px; color: #000049;"> Admit Card</span></center>
            <table width="100%">
                <tr>
                    <td width="25%"><b>SEAT NO :</b></td>
                    <td width="55%"><span style="border: solid 1px; padding: 2px;"><?php echo (isset($stud_data->stud_seat_no) && !empty($stud_data->stud_seat_no))?$stud_data->stud_seat_no:''?></span></td>
                    <td rowspan="11">
                        <?php $stud_photo=$this->session->userdata('stud_photo'); ?>
                        <?php $path='./uploads/stud_photos/'.((isset($stud_photo) && !empty($stud_photo))?$stud_photo:'student.jpg');
                        if (file_exists($path)) 
                        { ?>
                          <img alt="" class="img-circle" src="<?php echo $path; ?>"  style="width: 120px; height: 150px; padding:3px; border:2px solid #021a40;">
                        <?php }  
                        else
                        { ?>
                          <img alt="" class="img-circle" src="<?php echo base_url();?>uploads/stud_photos/student.jpg"  style="width: 120px; height: 150px; padding:3px; border:2px solid #021a40;">
                        <?php }?>
                    </td>
                </tr>
                <tr>
                    <td><b>CANDIDATE NAME :</b></td>
                    <td><?php echo $stud_data->stud_name.' '.$stud_data->stud_father_name.' '.$stud_data->stud_last_name; ?></td>
                </tr>
                <tr>
                    <td><b>CENTER NO :</b></td>
                    <td><span style="border: solid 1px; padding: 2px;"><?php echo (isset($stud_data->inst_code) && !empty($stud_data->inst_code))?$stud_data->inst_code:''?></span></td>
                </tr>
                <tr>
                    <td><b>NAME OF THE CENTER :</b></td>
                    <td><?php echo (isset($stud_data->inst_name) && !empty($stud_data->inst_name))?$stud_data->inst_name:'';?></td>
                </tr>
                <tr>
                    <td><b>ADDRESS OF CENTER :</b></td>
                    <td><?php echo (isset($stud_data->inst_address) && !empty($stud_data->inst_address))?$stud_data->inst_address:'NONE'?></td>
                </tr>
                <tr>
                    <td><b>INSTITUTE CODE :</b></td>
                    <td><?php echo (isset($stud_data->inst_code) && !empty($stud_data->inst_code))?$stud_data->inst_code:''?></td>
                </tr>
                <tr>
                    <td><b>INSTITUTE NAME :</b></td>
                    <td><?php echo (isset($stud_data->inst_name) && !empty($stud_data->inst_name))?$stud_data->inst_name:'';?></td>
                </tr>
                <tr>
                    <td><b>SUBJECT :</b></td>
                    <td>GCC-TBC <?php echo (isset($stud_data->course_lang) && !empty($stud_data->course_lang))? $stud_data->course_lang :'';?> <?php echo (isset($stud_data->course_name) && !empty($stud_data->course_name))? $stud_data->course_name :'';?></td>
                </tr>
                <tr>
                    <td><b>DATE :</b></td>
                    <td><?php echo date("d/m/Y"); ?></td>
                </tr>
                <tr>
                    <td><b>HANDICAP :</b></td>
                    <td><?php echo (isset($stud_data->stud_handicap) && !empty($stud_data->stud_handicap))?$stud_data->stud_handicap:'';?></td>
                </tr>
            </table>
        </div>
        <div style="background: #fff;">
            <center>
                <p style="font-size: 15px; color: #000049;"><b>FOR EXAM CONTROLLER </b></p>
                <form action="login" id="login" method="post">
                    <div class="alert alert-success" style="display:none; width: 70%;">
                        <strong>Please wait,</strong> checking login...
                    </div>
                    <div class="alert alert-danger" style="display:none; width: 70%;">
                        <strong>Warning!</strong> Wrong user/password, please try again.
                    </div>
                    <table width="60%" >
                        <tr>
                            <td style="color: #000049; width:20%;"><b>LOGIN :</b></td>
                            <td style="width:25%;">
                                <input type="text" class="icon-lock" id="username" name="username" value="" placeholder=" Controller" style="width:95%; float:right;">
                            </td>
                            <td width="5%"></td>
                            <td style="color: #000049; width:25%;"><b>PASSWORD :</b></td>
                            <td style="width:25%;"> <input type="password" class="icon-lock" id="password" name="password" value="" placeholder=" Password" style="width:95%; float:right;"></td>
                        </tr>
                        <tr>
                            <td colspan="5"><center><button type="submit" class="btn btn-success btn-large chk_login" style="height: 30px; padding-top: 2px;">Login</button></center></td>
                        </tr>
                    </table>
                </form>
            </center><br>
        </div>
    </div>
</div> <!-- /account-container -->
<script src="<?php echo base_url(); ?>assets/exam/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script>
</body>

</html>
