<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/zoom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plugins/notification/css/bjqs.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plugins/notification/css/demo.css">
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/notification/js/bjqs-1.3.min.js"></script>
<?php $string = file_get_contents("./uploads/update/version.json");
$version_data = json_decode ($string,true);
$version=$version_data[0]["version"]; ?>
<div class="page-footer">
	&copy; <a href="javascript:void(0);" style="text-decoration: none; color: #29A6D3;">E-learn</a> 2018 <?php echo (isset($inst_data->stud_name) && !empty($inst_data->stud_name))?$inst_data->stud_name:'';?>
    <span class="pull-right">version - <a href="javascript:void(0);" style="text-decoration: none; color: #29A6D3;"><?php echo $version; ?>.0</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="pull-right">Powered by - <a href="http://msceia.in" target="new" style="text-decoration: none; color: #29A6D3;">msceia.in</a>
</div>


<?php
$today_date = date('Y-m-d');
$stud_id=$this->session->userdata('stud_id');
$punch_in_data= $this->site_model->punch_in_data($stud_id);
$notification_data = $this->site_model->stud_notification_data($stud_id);
if($punch_in_data->punch_in_time!=$today_date) {
?>
<div style="width: 100%; position: absolute; height: 100%; z-index: 99999;background: rgba(0, 0, 0, 0.5); top: 0px; ">
    <div class=" w3-animate-zoom" style="margin-top: 18px;">
        <div class="modal-dialog" style="width: 27.2%;">
            <div class="modal-content" style="border-radius: 8px;">
                <div class="modal-body">
                  <center>
                    <div class="profile-userpic">
                      <img style="width: 42%; height: 120px;" src="<?php echo base_url(); ?>uploads/stud_photos/<?php echo(isset($stud_data->stud_photo) && !empty($stud_data->stud_photo))?$stud_data->stud_photo:'student.jpg'?>" class="img-responsive" alt="">
                    </div>
                    <div class="profile-usertitle" style="margin-bottom: 14px;">
                      <div class="profile-usertitle-name">
                        <?php echo (isset($stud_data->stud_name) && !empty($stud_data->stud_name))?$stud_data->stud_name:'';?> <?php echo (isset($stud_data->stud_last_name) && !empty($stud_data->stud_last_name))?$stud_data->stud_last_name:'';?>
                      </div>
                      <div class="profile-usertitle-job">
                        (<?php echo (isset($stud_data->course_name) && !empty($stud_data->course_name))?$stud_data->course_name:'';?>)
                      </div>
                    </div>
                    <hr>
                    <a href="<?php echo base_url(); ?>punch_in" class="btn btn-circle green-haze btn-sm" type="submit">Punch In</a>
                  </center>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script type="text/javascript">
	$(window).load(function(){        
 		$('#myModal').modal('show');
    $('.modal-dialog').addClass('modal-sm');
  
    let timer = $('#timer').val();

    if(timer != '0'){
      chk_user_time();
      console.log('---------timer on')
    }else{
      console.log('-----timer off');
    }
    
    function chk_user_time(){
        $.ajax({
            url: completeURL("chk_user_time"),
            dataType:'json',
            success: function(data){
                if(data.status==1)
                {
                    bootbox.alert(data.msg); 
                }
                else if(data.status==2)
                {
                    bootbox.alert(data.msg, function() {
                        setTimeout(function(){
                            document.location.href=completeURL("logout");                                
                        },1500);
                    }); 
                }
            },
            complete: function() {
               setInterval(chk_user_time, 200000); 
            }
        });
    };
  });
</script>