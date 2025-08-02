<form action="save_batch"  id="popup_save" class="horizontal-form" method="post" >
    <div class="form-body">  
        <div class="row">
            <div class="col-md-12">                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">STUDENT NAME <span class="required" aria-required="true">*</span></label>
                        <input readonly class="form-control" type="text" name="stud_name" value="<?php echo (isset($stud_data->stud_name)&& !empty($stud_data->stud_name))?$stud_data->stud_name:'-';?> <?php echo (isset($stud_data->stud_last_name)&& !empty($stud_data->stud_last_name))?$stud_data->stud_last_name:'-';?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">G.R. Number<span class="required" aria-required="true">*</span></label>
                        <input class="form-control duplicate" type="text" name="gr_no" data-tbl="tbl_student_details" data-p_key="stud_detail_id" data-where="gr_no" rel="<?php echo (isset($stud_data->stud_detail_id)&& !empty($stud_data->stud_detail_id))?$stud_data->stud_detail_id:'';?>" value="<?php echo (isset($stud_data->gr_no)&& !empty($stud_data->gr_no))?$stud_data->gr_no:'';?>" placeholder="G.R. Number">
                    </div>
                </div>
                <input type="hidden" name="stud_id" value="<?php echo (isset($stud_data->stud_id)&& !empty($stud_data->stud_id))?$stud_data->stud_id:'';?>" class="stud_id">
                <input type="hidden" name="stud_detail_id" value="<?php echo (isset($stud_data->stud_detail_id)&& !empty($stud_data->stud_detail_id))?$stud_data->stud_detail_id:'';?>">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Batch Time <span class="required" aria-required="true">*</span></label>
                        <select class="form-control select2 batch_time chk_batch"  name="batch_time" id="batch_time" >
                            <option value="">Select Batch</option>
                            <option value="7 AM to 8 AM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="7 AM to 8 AM"))?'selected="selected"':''; ?>>7 AM to 8 AM</option>
                            <option value="8 AM to 9 AM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="8 AM to 9 AM"))?'selected="selected"':''; ?>>8 AM to 9 AM</option>
                            <option value="9 AM to 10 AM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="9 AM to 10 AM"))?'selected="selected"':''; ?>>9 AM to 10 AM</option>
                            <option value="10 AM to 11 AM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="10 AM to 11 AM"))?'selected="selected"':''; ?>>10 AM to 11 AM</option>
                            <option value="11 AM to 12 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="11 AM to 12 PM"))?'selected="selected"':''; ?>>11 AM to 12 PM</option>
                            <option value="12 PM to 1 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="12 PM to 1 PM"))?'selected="selected"':''; ?>>12 PM to 1 PM</option>
                            <option value="1 PM to 2 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="1 PM to 2 PM"))?'selected="selected"':''; ?>>1 PM to 2 PM</option>
                            <option value="2 PM to 3 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="2 PM to 3 PM"))?'selected="selected"':''; ?>>2 PM to 3 PM</option>
                            <option value="3 PM to 4 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="3 PM to 4 PM"))?'selected="selected"':''; ?>>3 PM to 4 PM</option>
                            <option value="4 PM to 5 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="4 PM to 5 PM"))?'selected="selected"':''; ?>>4 PM to 5 PM</option>
                            <option value="5 PM to 6 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="5 PM to 6 PM"))?'selected="selected"':''; ?>>5 PM to 6 PM</option>
                            <option value="6 PM to 7 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="6 PM to 7 PM"))?'selected="selected"':''; ?>>6 PM to 7 PM</option>
                            <option value="7 PM to 8 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="7 PM to 8 PM"))?'selected="selected"':''; ?>>7 PM to 8 PM</option>
                            <option value="8 PM to 9 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="8 PM to 9 PM"))?'selected="selected"':''; ?>>8 PM to 9 PM</option>
                            <option value="9 PM to 10 PM"  <?php echo (isset($stud_data->batch_time) && !empty($stud_data->batch_time) && ($stud_data->batch_time=="9 PM to 10 PM"))?'selected="selected"':''; ?>>9 PM to 10 PM</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Allocated Machine <span class="required" aria-required="true">*</span></label>
                        <select class="form-control select2 multi_duplicate machin_no chk_batch" name="machin_no" >
                            <option value="">Select Machine</option>
                            <?php $i=1;  for($i=1;$i<=20; $i++) { ?>
                                <option value="M-<?php echo $i; ?>" <?php echo (isset($stud_data->machin_no) && !empty($stud_data->machin_no) && ($stud_data->machin_no=='M-'.$i))?'selected="selected"':''; ?>>Machin <?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>   
            </div>                         
       </div>
    </div>
</form>              




