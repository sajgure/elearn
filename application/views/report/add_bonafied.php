<style type="text/css">
    .btn-group.open .dropdown-toggle {box-shadow: none; } .multiselect-selected-text{float: left; } .caret{margin-top: 8px; float: right; }
</style>
<form action="save_bonafied"  id="popup_save" class="horizontal-form" method="post" >
    <div class="form-body">  
        <div class="row">
            <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">SELECT STUDENT<span class="required" aria-required="true">*</span></label>
                            <div class="input-icon "><i class="fa"></i>
                                <select class="form-control course_change select2" name="stud_id" id="stud_id" > 
                                    <?php if(isset($student_data) && !empty($student_data))
                                    { 
                                        foreach($student_data AS $key)
                                        { ?>                                            
                                            <option value="<?php echo (isset($key->stud_id) && !empty($key->stud_id))?$key->stud_id:'';?>" ><?php echo $key->stud_name.' '.$key->stud_last_name;?>( <?php echo $key->course_name;?> )</option>
                                        <?php } 
                                    }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">REASON <span class="required" aria-required="true">*</span></label>
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <textarea type="text" class="form-control" name="reason" rows="4"  placeholder="Type the lesson" required><?php echo (isset($bonafied_data->reason) && !empty($bonafied_data->reason) )?$bonafied_data->reason:'';?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                         
       </div>
    </div>
</form>              




