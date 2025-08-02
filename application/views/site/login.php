<?php /* $con = mysqli_connect("localhost","root","");
if ($con) 
{
	$con->query("DROP DATABASE elearn_24_first_sem");
	$con->query("DROP DATABASE elearn_24_second_sem");
} 
mysqli_close($con); */?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Elearn | Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/zoom.css">
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
	<?php $error= $this->db->error(); 
    if($error['code'] == '1049')
    { ?>
		<div style="width:100%; height:1000px; position: fixed; background-color: #2A86B9; margin-top: -20px; ">
			<center>
				<img src="<?php echo base_url(); ?>assets/img/loading.gif" style="width: 30%; margin-top: 150px;">
				<p style="font-size: 15px; margin-top: 20px; color: #fff;">Working on Database installation...</p>
				<p style="font-size: 18px; color: #fff;">Do not reload page, this will take a while</p>
			</center>
		</div>
		<script type="text/javascript">
            $.ajax({
                url:'import_db',          
                type:'POST',
                dataType:'json',
                success:function(data)
	            { 
	            	document.location.href =document.location.href;
	            }
            });
        </script>
	<?php }
	else
	{
		$path='C:\Program Files/Common Files/System/Windows_MS/system.txt';
		$file = fopen($path,"r");
		$file_mack = fread($file, '100');
		$inst_data = $this->common_model->fetchDataASC('tbl_institute','inst_id');

	    if(!file_exists($path) || empty($inst_data) || $file_mack !== $mack)
	    { ?>
	    	<div style="width: 100%; position: absolute; height: 100%; z-index: 99999;background: rgba(0, 0, 0, 0.5); top: 0px; ">
	    		<br><br><br><br><br><br>
	    		<div class="w3-container w3-center w3-animate-zoom" style="margin-top: 18px;">
		        	<div class="modal-dialog" style="width: 27.2%;">
		                <div class="modal-content" style="border-radius: 8px;">
		                    <div id="div-forms">
		                    	<img class="img-circle img-responsive" id="img_logo" src="<?php echo base_url(); ?>images/msceia.png" style="border-radius: 50px; margin-left: 40%; margin-top: 5%; width: 20%;">
		                        <form action="check_user" id="login-form" method="post">
		                            <div class="modal-body">
		                                <center><div style="color: orangered;"><b style="font-size: 15px;">Enter your MSCEIA institute user name and password</b></div><br></center>
		                                <div class="alert alert-success" style="display:none; padding: 5px; font-size: 13px;"><strong>Please wait,</strong> checking login...</div>
		                                <div class="alert alert-danger" style="display:none; padding: 5px; font-size: 13px;"></div>
		                                <input id="username" name="inst_code" value="" placeholder="MSCEIA user name" class="form-control" required>
		                                <input type="password" id="password" name="password" value="" placeholder="MSCEIA Password" class="password form-control" required style="margin-top: 10px;">
		                            </div>
		                            <div class="modal-footer" style="margin-top: 18px; margin-bottom: 5px;">
		                                <div>
		                                   <!-- <a href="http://msceia.in" target="new" class="btn btn-danger">Sign up</a> -->
		                                   <button type="submit" class="btn btn-success chk_login">Login</button>
		                                </div>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		        </div>
			</div>
	    <?php }  
		$path='./uploads/eth';
	    if(file_exists($path))
	    { ?>
		    <div style="margin-top: -60px; padding: 10px; float: right;">
			    <a href="<?php echo base_url(); ?>eth_dashboard" style="text-decoration: none;"><span class="label label-sm label-danger" style="border-radius: 15px; padding: 4px;"><b><i class="fa fa-magic" aria-hidden="true"></i> Tutorials</b></span></a>
			</div>
		<?php } ?>
		<div class="logo">
			<a href="javascript:;">
			<img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" style="width: 15%;"/>
			</a>
		</div>
		<div class="content">
			<form class="login-form" action="login" id="elearn" method="post">
				<h3 class="form-title">Login to Elearn Account</h3>
				<div class="alert alert-danger display-hide">
					<span> Enter MSCEIA Username and Password. </span>
				</div>
				<div class="form-group">
					<label class="control-label visible-ie8 visible-ie9">Username</label>
					<div class="input-icon">
						<i class="fa fa-user"></i>
						<input type="text" placeholder="Username" name="username" class="form-control placeholder-no-fix"  />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label visible-ie8 visible-ie9">Password</label>
					<div class="input-icon">
						<i class="fa fa-lock"></i>
						<input type="password" placeholder="Password" name="password"  class="form-control placeholder-no-fix" autocomplete="off" />
					</div>
				</div>
				<div class="form-actions">
					<label class="checkbox">
					<input type="checkbox" name="remember" value="1"/> Remember me </label>
					<button type="submit" class="btn blue pull-right chk_login">
					Login <i class="m-icon-swapright m-icon-white"></i>
					</button>
				</div>
				<div class="forget-password" style="margin-top: -8px !important;">
					<h4 style="font-size: 16px;">Elearn Practice Software.</h4>
				</div>
				<div class="create-account">
					<p style="font-size: 12px;">
						Don't have an account yet?&nbsp; <a target="new" href="http://www.msceia.in"> Register on MSCEIA</a>
					</p>
				</div>
			</form>
		</div>
		<div class="copyright" style="color: #37383D;">
			2018 &copy; MSCEIA - Elearn practice software.
		</div>
		<!-- <div style=' text-align: center; color: orangered;' >
			<?php 
				// $givenDate = new DateTime($exp_dt[0]->date);
				// $currentDate = new DateTime();
				// $interval = $currentDate->diff($givenDate);
				// $days = $interval->days;
				
				// if($days < 30){
				// 	echo "Your copy Expire in: $days days.";
				// }
			?>
		</div> -->

	<?php } ?>
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/common.js" type="text/javascript"></script>
	<script>
	jQuery(document).ready(function() {     
	  	Metronic.init();
       	$.backstretch([
        "<?php echo base_url(); ?>assets/img/bg/1.jpg",
        "<?php echo base_url(); ?>assets/img/bg/2.jpg"
        ], {
	          fade: 1000,
	          duration: 8000
	    });
	});	
	</script>
	<?php $connected = @fsockopen("www.msceia.in", 80);
    if ($connected){ ?>
        <script type="text/javascript">
            $.ajax({
                url:'check_update',          
                type:'POST',
                dataType:'json'
            });
        </script>
    <?php }?>
</body>
</html>