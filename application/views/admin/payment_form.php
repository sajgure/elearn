<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript">
    $(".select2").select2();
    $(".date-picker1").datepicker( {
        format: "d-M-yyyy",
        viewMode: "date", 
        minViewMode: "date",
        autoclose: true
    });
</script>
<form action="save_payment"  id="popup_save" class="horizontal-form form-row-sepe" method="post" >
    <div class="form-body">  
        <div class="row">
            <div class="col-md-8">
                <span><b style="font-size: 15px;"><?php echo (isset($studentData->stud_name) && !empty($studentData->stud_name) )?$studentData->stud_name.' '.$studentData->stud_father_name.' '.$studentData->stud_last_name:'';?></b></span><br>
                <span style="color: rgb(116,184,214)">(<?php echo (isset($studentData->course_name) && !empty($studentData->course_name) )?$studentData->course_name:'';?>)</span><br>
                <span>GR No : <?php echo (isset($studentData->gr_no) && !empty($studentData->gr_no) )?$studentData->gr_no:' NA';?></span><br>
                <span>Admission Date : <?php echo (isset($studentData->stud_admission_date) && !empty($studentData->stud_admission_date) )?date('d-M-Y',strtotime($studentData->stud_admission_date)):'';?></span>
            </div>
            <div class="col-md-4">
                <img src="<?php echo base_url();?>uploads/stud_photos/<?php echo (isset($studentData->stud_photo ) && !empty($studentData->stud_photo ) )?$studentData->stud_photo :'student.jpg';?>" style="width: 100px;height: 100px;border-radius: 50px;">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label"> Select Instalment<span class="required" aria-required="true">*</span></label>
                    <select class="form-control select2 input-sm" id="" name="instalment" >
                        <option value=""> select</option>
                        <option value="Instalment-1"> Instalment-1</option>
                        <option value="Instalment-2"> Instalment-2</option>
                        <option value="Instalment-3"> Instalment-3</option>
                        <option value="Instalment-4"> Instalment-4</option>
                        <option value="Instalment-5"> Instalment-5</option>
                     </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label"> Payment Date<span class="required" aria-required="true">*</span></label>
                    <input style="width: 170px;" type="text" class="input-sm form-control date-picker1" readonly  data-date-end-date="+0d" name="payment_date" value="<?php echo date('d-M-Y'); ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label ">Fee<span class="required" >*</span></label>
                    <div class="input-icon input-group right"><i class="fa"></i>
                        <i class="fa"></i>
                        <input type="text" id="fee" name="fee"  class="form-control input-sm " placeholder=" Fee" value="">
                        <input type="hidden"  name="stud_id"  class="form-control input-sm "  value="<?php echo $stud_id;?>">
                        <span class="input-group-addon">
                        <i class="fa "><b>Rs</b></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <?php $paid_fee=0;$remaining=0;$course_fee=(isset($fees_details->total_fee) && !empty($fees_details->total_fee) )?$fees_details->total_fee:'0'; 
                if(isset($payment_data) && !empty($payment_data))
                { ?>
                    <table class="table table-striped table-hover  " >
                        <thead>
                            <tr>
                                <th style="text-align:center;"> Sr.No </th>
                                <th style="text-align:center;"> Installment </th>
                                <th style="text-align:center;"> Fee </th>
                                <th style="text-align:center;"> Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; 
                                foreach ($payment_data as $key) 
                                { 
                                    $paid_fee=$paid_fee+$key->fee; ?>
                                    <tr>
                                        <td>
                                            <?php echo $i++;?>
                                        </td>
                                        <td>
                                            <?php echo (isset($key->installment) && !empty($key->installment) )?$key->installment:'';?>
                                        </td>
                                        <td>
                                            <i class="fa fa-inr"></i> <?php echo (isset($key->fee) && !empty($key->fee) )?$key->fee:'0';?>
                                        </td>
                                        <td>
                                             <?php echo (isset($key->payment_date) && !empty($key->payment_date) )?date('d-M-Y',strtotime($key->payment_date)):'';?>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
            <div class="col-md-4">
                <b style="font-size: 15px;">Course Fee :<i class="fa fa-inr" style="margin-left: 30px;"></i>  <?php echo (isset($fees_details->total_fee) && !empty($fees_details->total_fee) )?$fees_details->total_fee:'0';?></b><br>
                <b style="font-size: 15px;">Paid Fee : <i class="fa fa-inr" style="margin-left: 46px;"></i>  <?php echo (isset($paid_fee) && !empty($paid_fee) )?$paid_fee:'0';?></b><br>
                <b style="font-size: 15px;">Remaining Fee :<i class="fa fa-inr" style="margin-left: 5px;"></i><?php $remaining = $course_fee - $paid_fee; echo (isset($remaining) && !empty($remaining) )?$remaining:'0'; ?></b>
            </div>
        </div>
    </div>
</form>              




