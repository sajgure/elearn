<?php if($this->authentication->chk_login()==FALSE)redirect('index'); ?>
<p style="background: #010101; color: #fff; font-size: 100%; margin-bottom: 0px;">&nbsp;&nbsp;&nbsp;&nbsp;<b>Name:</b> <?php echo $stud_data->stud_name.' '.$stud_data->stud_father_name.' '.$stud_data->stud_last_name; ?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Seat No:</b> <?php echo (isset($stud_data->stud_seat_no) && !empty($stud_data->stud_seat_no))?$stud_data->stud_seat_no:''?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Course:</b> GCC-TBC <?php echo (isset($stud_data->course_lang) && !empty($stud_data->course_lang))? $stud_data->course_lang :'';?> <?php echo (isset($stud_data->course_name) && !empty($stud_data->course_name))? $stud_data->course_name :'';?> 
<span>&nbsp;&nbsp;&nbsp;&nbsp;<b>Timer:</b></span> <span id="hm_timer" style="color: red;   border: solid 1px; padding: 1px; font-size: 20px;"></span></p>
<img src="<?php echo base_url(); ?>assets/exam/img/logo.jpg" style="width: 100%; height: 65px;">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/exam/js/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(window).load(function(){              
        $('#myModal').modal('show');
        $('.modal-dialog').addClass('modal-sm');
    
        //chk_user_time();
        function chk_user_time(){
            //alert();  
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