<form action="save_enquiry"  id="popup_save" class="horizontal-form form-row-sepe" method="post" >
    <div class="form-body">  
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">First Name <span class="required" aria-required="true">*</span></label>
                        <div class="input-icon right"> <i class="fa"></i>
                            <input type="text" class="form-control" name="stud_name" value="<?php echo (isset($enquiryData->stud_name) && !empty($enquiryData->stud_name) )?$enquiryData->stud_name:'';?>" placeholder="First Name"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Last Name <span class="required" aria-required="true">*</span></label>
                        <div class="input-icon right"> <i class="fa"></i>
                            <input type="text" class="form-control" name="stud_last_name" value="<?php echo (isset($enquiryData->stud_last_name) && !empty($enquiryData->stud_last_name) )?$enquiryData->stud_last_name:'';?>" placeholder="Last Name"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Mobile Number <span class="required" aria-required="true">*</span></label>
                        <div class="input-icon right"> <i class="fa"></i>
                            <input type="text" class="form-control" name="stud_contact" value="<?php echo (isset($enquiryData->stud_contact) && !empty($enquiryData->stud_contact) )?$enquiryData->stud_contact:'';?>" placeholder="Mobile Number"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Email <span class="required" aria-required="true">*</span></label>
                        <div class="input-icon right"> <i class="fa"></i>
                            <input type="text" class="form-control" name="stud_mail" value="<?php echo (isset($enquiryData->stud_mail) && !empty($enquiryData->stud_mail) )?$enquiryData->stud_mail:'';?>" placeholder="Email"/>
                        </div>
                    </div>
                </div>
                <?php $select_course='';
                if(isset($enquiryData->course_id) && !empty($enquiryData->course_id))
                {
                    $select_course = explode(',', $enquiryData->course_id);
                }?>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Select Course<span class="required" aria-required="true">*</span></label>
                        <select class="form-control select2" id="course_name" name="course_id[]" multiple>
                            <?php  if(isset($courseData) && !empty($courseData))
                            {
                                foreach ($courseData as $key) 
                                { ?>
                                    <option value="<?php echo $key->course_id; ?>" <?php echo (isset($select_course) && !empty($select_course) && (in_array($key->course_id, $select_course)))?'selected="selected"':''; ?> > 
                                        <?php echo $key->course_name; ?>
                                    </option>
                                    
                                <?php } 
                            }?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Qualification </label>
                        <div class="input-icon right"> <i class="fa"></i>
                            <input type="text" class="form-control" name="stud_qualification" value="<?php echo (isset($enquiryData->stud_qualification) && !empty($enquiryData->stud_qualification) )?$enquiryData->stud_qualification:'';?>" placeholder="Qualification"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Residencial Address </label>
                        <div class="input-icon right"> <i class="fa"></i>
                            <textarea class="form-control" name="stud_addrsss" placeholder="Student Address"><?php echo (isset($enquiryData->stud_addrsss) && !empty($enquiryData->stud_addrsss) )?$enquiryData->stud_addrsss:'';?></textarea>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</form>              




