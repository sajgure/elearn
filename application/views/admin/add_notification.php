<style type="text/css">
    .btn-group.open .dropdown-toggle {box-shadow: none; } .multiselect-selected-text{float: left; } .caret{margin-top: 8px; float: right; }
</style>
<form action="save_notification"  id="popup_save" class="horizontal-form" method="post" >
    <div class="form-body">  
        <div class="row">
            <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">SELECT STUDENT<span class="required" aria-required="true">*</span></label>
                            <div class="input-icon "><i class="fa"></i>
                                <select class="mt-multiselect multiselect form-control"  name="student_name[]" id="student_name" multiple="multiple" data-label="left" data-select-all="true" data-width="100%" data-filter="true" data-action-onchange="true" data-height="300">
                                     <?php if(isset($student_data) && !empty($student_data))
                                    { 
                                        foreach($student_data AS $key)
                                        { 
                                            $flag=0;
                                            if(isset($notification_data->stud_id) && !empty($notification_data->stud_id))
                                            {
                                                $available_stud=explode(',',$notification_data->stud_id);
                                                foreach ($available_stud as $row) {
                                                if($row==$key->stud_id)
                                                {
                                                    $flag=1;
                                                    break;
                                                }
                                            }
                                        } ?>
                                        <option value="<?php echo (isset($key->stud_id) && !empty($key->stud_id))?$key->stud_id:'';?>" <?php echo ($flag)?'selected="selected"':'';?>><b><?php echo $key->stud_name.' '.$key->stud_last_name;?></b> (<?php echo $key->course_name;?>) </option>
                                        <?php } 
                                    }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">NOTIFICATION HEADING <span class="required" aria-required="true">*</span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" class="form-control" name="notification" value="<?php echo (isset($notification_data->notification) && !empty($notification_data->notification) )?$notification_data->notification:'';?>" placeholder="NOTIFICATION HEADING"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div class="input-icon right">
                                <div class="input-group  date-picker input-daterange" data-date-start-date="+0d" style="width: 100%;">
                                    <span class="input-group-addon"> FROM <span class="required" aria-required="true">*</span></span> 
                                    <input type="text" class="form-control" name="from_date" readonly="" value="<?php echo (isset($notification_data->from_date) && !empty($notification_data->from_date) )?$notification_data->from_date:'';?>">
                                    <span class="input-group-addon"> TO <span class="required" aria-required="true">*</span></span> 
                                    <input type="text" class="form-control" name="to_date" readonly="" value="<?php echo (isset($notification_data->to_date) && !empty($notification_data->to_date) )?$notification_data->to_date:'';?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">DESCRIPTION <span class="required" aria-required="true">*</span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <textarea class="form-control" maxlength="350" rows="5" name="notification_desc" placeholder="TYPE NOTIFICATION HERE"><?php echo (isset($notification_data->notification_desc) && !empty($notification_data->notification_desc) )?$notification_data->notification_desc:'';?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                         
       </div>
    </div>
</form>              




