<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Admin Profile</b></h4>
          	</div>
          	<div class="modal-body">
            	<div class="form-horizontal">
          		  <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Email</label>
                     <input type="hidden" id="admin_id" value='<?php echo $user["NO"] ?>'>
                     <input type="hidden" id="admin_pass" value='<?php echo $user["PASSWORD"] ?>'>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="username" name="username" value="">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                </div>
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label"  value='<?php echo $user["FIRSTNAME"] ?>'>Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" id= "admin_save" name="save"><i class="fa fa-check-square-o"></i> Save</button>
            	</div>
          	</div>
        </div>
    </div>
</div>
</script>