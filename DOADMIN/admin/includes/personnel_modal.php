<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Personnel</b></h4>
          	</div>
          	<div class="modal-body">
            	<div class="form-horizontal">
              
          		  <div class="form-group">
                  	<label for="title" class="col-sm-3 control-label">Last Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lname" name="lastname" required>
                  	</div>
                </div>
                  <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">First Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="fname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Middle Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="middlename" name="middlename" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Password(max 10 char)</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" maxlength="10 "id="pass" name="pass" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Confirm Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" maxlength="10 " id="cpass" name="cpass" required>
                    </div>
                </div>
                 
               
                	<div class="modal-footer">
            	<button type="button" id="close" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="submit_personnel" id="submit_personnel"><i class="fa fa-save"></i> Save</button>
            	</div>
          	</div>
        </div>
    </div>
</div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Personnel</b></h4>
            </div>
            <div class="modal-body">
              <div class="form-horizontal">
              
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Last Name</label>

                    <div class="col-sm-9">
                      <input type="hidden" id="id">
                      <input type="text" class="form-control" id="edit_ln" name="edit_ln" required>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">First Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_fn" name="edit_fn" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Middle Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_mn" name="edit_mn" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_email" name="edit_email" required>
                    </div>
                </div>
                 
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_pass" name="edit_pass" maxlength="10 " required>
                    </div>
                </div>
                  
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Confirm Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_cpass" maxlength="10" name="edit_cpass" required>
                </div>
                  </div>
                   
               
                  <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="update_personnel" id="update_personnel"><i class="fa fa-edit"></i>Update</button>
              </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Delete -->
<div class="modal fade" id="archive">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Archive...</b></h4>
          	</div>
          	<div class="modal-body">
            	<div class="form-horizontal">
            		<div class="text-center">
	                	<p>Archive Personnel</p>

              <input type ="hidden" id="archive_id"/>  
	                	<h2 id="del_position" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">   
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="arhive" id="archive_personnel"><i class="fa fa-archive"></i> Archive</button>
            	</div>
          	</div>
        </div>
    </div>
</div>


     