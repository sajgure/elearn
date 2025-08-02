<form action="save_fee"  id="popup_save" class="horizontal-form form-row-sepe" method="post" >
    <div class="form-body">  
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Select Course<span class="required" aria-required="true">*</span></label>
                    <select class="form-control select2 input-sm duplicate" id="course_name" name="course_id" data-tbl="    tbl_fees_details" data-p_key="fees_id" data-where="course_id" rel="<?php echo (isset($feeData->fees_id)&& !empty($feeData->fees_id))?$feeData->fees_id:'';?>">
                        <option value="">Select</option>     
                        <?php  if(isset($courseData) && !empty($courseData))
                        {
                            foreach ($courseData as $key) 
                            { ?>
                                <option value="<?php echo $key->course_id; ?>" <?php echo (isset($feeData->course_id) && !empty($feeData->course_id) && ($feeData->course_id==$key->course_id))?'selected="selected"':'';?> > 
                                    <?php echo $key->course_name; ?>
                                </option>                                
                            <?php } 
                        }?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Description<span class="required" aria-required="true">*</span></label>
                    <div class="input-icon right"> <i class="fa"></i>
                        <input type="text" class="form-control input-sm" name="description" value="<?php echo (isset($feeData->desc) && !empty($feeData->desc) )?$feeData->desc:'';?>" placeholder="Short Description"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label ">Fee<span class="required" >*</span></label>
                    <div class="input-icon input-group right"><i class="fa"></i>
                        <i class="fa"></i>
                        <input type="text" id="fee" name="fee"  class="form-control course_fee input-sm" placeholder="Fee" value="<?php echo (isset($feeData->fee) && !empty($feeData->fee))?$feeData->fee:''; ?>">
                        <span class="input-group-addon">
                        <i class="fa "><b>Rs</b></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label ">Other Fee<span class="required" >*</span></label>
                    <div class="input-icon input-group right"><i class="fa"></i>
                        <i class="fa"></i>
                        <input type="text" id="other_fee" name="other_fee"  class="form-control course_fee input-sm" placeholder="Other Fee" value="<?php echo (isset($feeData->other_fee) && !empty($feeData->other_fee))?$feeData->other_fee:''; ?>">
                        <span class="input-group-addon">
                        <i class="fa "><b>Rs</b></i>
                        </span>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label ">Total Fee</label>
                    <div class="input-icon input-group right"><i class="fa"></i>
                        <i class="fa"></i>
                        <input type="text" id="total_fee" name="total_fee"  class="form-control total_fee input-sm" placeholder="Total Fee" value="<?php echo (isset($feeData->total_fee) && !empty($feeData->total_fee))?$feeData->total_fee:''; ?>" readonly>
                        <span class="input-group-addon">
                        <i class="fa "><b>Rs</b></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>              




