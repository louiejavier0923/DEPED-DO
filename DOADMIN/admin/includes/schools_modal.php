<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add School</b></h4>
          	</div>
          	<div class="modal-body">
            	<div class="form-horizontal">
          		  <div class="form-group">
                  	<label for="title" class="col-sm-3 control-label">School Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="school_name" name="school_name" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">School Address</label>

                    <div class="col-sm-9">
                       <textarea class="form-control" rows="3" id="school_address" name="school_address" placeholder="Type Address . . ."></textarea>
                    </div>
                </div>
                	<div class="modal-footer">
            	<button type="button" id="close" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="submit_school" id="submit_school"><i class="fa fa-save"></i> Save</button>
            	</div>
          	</div>
        </div>
    </div>
</div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit" name="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Update Schools</b></h4>
            </div>
            <div class="modal-body">
              <div class="form-horizontal">
                <div class="form-group">

                    <div class="col-sm-9">
                      <input type="hidden" class="form-control"  id="edit_id" name="edit_id" required >
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">School Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="edit_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">School Address</label>

                    <div class="col-sm-9">
                       <textarea class="form-control" rows="3" id="edit_address" name="edit_address" placeholder="Type Address . . ."></textarea>
                    </div>
                </div>
                  <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit_school" id="edit_school"><i class="fa fa-edit"></i> Update</button>
              </div>
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
            	<h4 class="modal-title"><b>Archive...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="position_delete.php">
            		<input type="hidden" id="del_posid" name="id">
            		<div class="text-center">
	                	<p>Archive School</p>
	                	<h2 id="del_position" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
              <input type ="hidden" id="d_id">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete" id="archive"><i class="fa fa-archive"></i> Archive</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     