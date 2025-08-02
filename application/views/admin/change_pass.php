 <form action="save_password"  id="popup_save" class="form-horizontal" method="post" >
    <div class="form-body">  
        <div class="row">
        <div class="col-md-10">
            <div class="form-group">
            <label class="control-label col-md-5">Your current Password
            </label>
            <div class="col-md-6">
                <div class="input-icon right">
                <i class="fa"></i>
              <input type="password" class="form-control password" name="current_pass" placeholder="your current password"/>
                </div>
            </div>
            <div class="col-md-1 show_pass"><a href="javascript:void(0);" class="btn btn-icon-only default"><i class="fa fa-eye "></i></a></div>
            </div>                      
       </div>
    </div>  
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <label class="control-label col-md-5">New Password
                </label>
                <div class="col-md-6">
                    <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="password" id="user_pass" class="form-control password" name="new_pass" placeholder="New Password"  />
                    </div>
                </div>
                <div class="col-md-1 show_pass"><a href="javascript:void(0);" class="btn btn-icon-only default"><i class="fa fa-eye "></i></a></div>
            </div>                      
        </div>
    </div>                 
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
            <label class="control-label col-md-5">Confirm New Password
            </label>
            <div class="col-md-6">
                <div class="input-icon right">
                <i class="fa"></i>
                <input type="password" class="form-control password" name="confirm_pass" placeholder="Confirm New Password"/>
                </div>
            </div>
            <div class="col-md-1"><a href="javascript:void(0);" class="btn btn-icon-only default"><i class="fa fa-eye show_pass"></i></a></div>
            </div>                      
        </div>
        </div>
    </div>
</form>              
