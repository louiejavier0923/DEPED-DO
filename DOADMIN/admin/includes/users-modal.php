<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
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
                    	<input type="text" class="form-control" id="email" name="email" required>
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
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<div class="form-horizontal">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-primary btn-flat pull-left" name="pds_btn" id="pds_btn"><i class="fa fa-file"> Edit PDS</button></i>
				</div>
     
               <div class="form-group">
                    <label for="email_edit" class="col-sm-3 control-label">EMAIL</label>

                    <div class="col-sm-9">
                      <input type="hidden" id="id"> 
                      <input type="text" class="form-control" id="email_edit" name="email_edit" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_edit" class="col-sm-3 control-label">PASSWORD</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password_edit" name="password_edit" required>
                    </div>
                </div>
				<div class="form-group">
                    <label for="password_edit" class="col-sm-3 control-label">RE-TYPE PASSWORD</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="repassword_edit" name="password_edit" required>
                    </div>
                </div>
				  	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit" id="update-user"><i class="fa fa-check-square-o"></i> Update</button>
            	</div>
          	</div>
        </div>
    </div>
</div>

<!-- Edit PDS -->
<div class="modal fade" id="view_pds">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<div class="form-horizontal">
				
				<div class="form-group">
                   <?php include 'view-PDS.php';?> 
				</div>
				</div>
				<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit" id="update-user"><i class="fa fa-check-square-o"></i> Update</button>
            	</div>
          	</div>
        </div>
    </div>
</div>


<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="attendance_date"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="attendance_delete.php">
            		<input type="hidden" id="del_attid" name="id">
            		<div class="text-center">
	                	<p>Archive User</p>
	                	<h2 id="del_employee_name" class="bold"></h2>
                    <input type="hidden" id="d_id">
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" id="archive" name="delete"><i class="fa fa-archive"></i> Archive</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     