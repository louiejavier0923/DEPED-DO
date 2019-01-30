<!--  ADD -->       
<div class="modal fade" id="addnew"> 
    <div class="modal-dialog">
        <div class="modal-content">
                   <div style="display: none;" id="error" class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
           
            </div>
       
            
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              	
       



                    <span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add User</b></h4>
          	</div>
          	<div class="modal-body">
               <div class="form-horizontal">
          		  <div class="form-group">
                  	<label for="email" class="col-sm-3 control-label">EMAIL</label>

                  	<div class="col-sm-9">
                    	<input type="email" class="form-control" id="email" name="email" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="my_pass" class="col-sm-3 control-label">PASSWORD</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="my_pass" name="my_pass" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cpassword" class="col-sm-3 control-label">CONFIRM PASSWORD</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">STATUS</label>
                                    <div class="col-sm-9">
                          <select class="form-control" id="status" name="status">
                              <option value="1">ACTIVATE</option>
                              <option value="0">NOT ACTIVATE</option>
                          </select>
                    </div>
               

                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" id="close" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" id="submit-user" name="add"><i class="fa fa-save"></i> Save</button>
         
          	</div>
          </div>
        </div>
    </div>
</div>
 
<!-- Edit -->
       
<div class="modal fade" id="edit"> 
    <div class="modal-dialog">
        <div class="modal-content">
                   <div style="display: none;" id="edit_error" class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
           
            </div>
       
            
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">            
                        <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Update User</b></h4>
            </div>
            <div class="modal-body">
               <div class="form-horizontal">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">EMAIL</label>

                    <div class="col-sm-9">
                      <input type="hidden" class="form-control" id="id" name="id">
                      <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="my_pass" class="col-sm-3 control-label">PASSWORD</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_pass" name="my_pass" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cpassword" class="col-sm-3 control-label">CONFIRM PASSWORD</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_cpass" name="cpassword" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">STATUS</label>
                                    <div class="col-sm-9">
                          <select class="form-control" id="edit_status" name="edit_status ">
                              <option value ="1">ACTIVATE</option>
                              <option value ="0">NOT ACTIVATE</option>
                          </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="close" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" id="edit_user" name="edit"><i class="fa fa-edit"></i> Update</button>
         
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
              <h4 class="modal-title"><b><span id="attendance_date"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal">
                <input type="hidden" id="r_id" name="id">
                <div class="text-center">
                    <p>ARCHIVE USER</p>
                    <h2 id="del_employee_name" class="bold"></h2>
                    <input type="hidden" id="d_id">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="button" class="btn btn-danger btn-flat" id="archive" name="archive"><i class="fa fa-archive"></i> ARCHIVE</button>
              </div>
            </div>
        </div>
    </div>
</div>



 