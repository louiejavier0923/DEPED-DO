<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Vacancy</b></h4>
          	</div>
          	<div class="modal-body">
            	<div class="form-horizontal">
          		  <div class="form-group">

                  	<label for="title" class="col-sm-3 control-label">Title</label>

                  	<div class="col-sm-9">

                    	<input type="text" class="form-control" id="title" name="title" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="expiration" class="col-sm-3 control-label">Expiration Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="expiration" name="expiration" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                       <textarea class="form-control" rows="5" id="description" name="description" placeholder="Type Description . . ."></textarea>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="noi" class="col-sm-3 control-label">Name of incumbent</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="noi" name="noi" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="place" class="col-sm-3 control-label">Place assignment</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="place" name="place" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="status"  class="col-sm-3 control-label">Status</label>

                    <div class="col-sm-9">
                          <select class="form-control" id="status" name="status">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                          </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="salaries" class="col-sm-3 control-label">Salaries</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="salaries" name="salaries" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="itemno" class="col-sm-3 control-label">Item no</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="itemno" name="itemno" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add" id="submit_vacancy"><i class="fa fa-save"></i> Save</button>
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
            	<h4 class="modal-title"><b>Update Vacancy</b></h4>
          	</div>
          	<div class="modal-body">
            	   <div class="form-horizontal">
                <div class="form-group">
                        <input type="hidden" id="id">
                    <label for="edit_title" class="col-sm-3 control-label">Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_title" name="edit_title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_expiration" class="col-sm-3 control-label">Expiration Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="edit_expiration" name="edit_expiration" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_description" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                       <textarea class="form-control" rows="5" id="edit_description" name="edit_description" placeholder="Type Description . . ."></textarea>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="edit_noi" class="col-sm-3 control-label">Name of incumbent</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_noi" name="edit_noi" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="edit_place" class="col-sm-3 control-label">Place assignment</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_place" name="edit_place" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="edit_status"  class="col-sm-3 control-label">Status</label>

                    <div class="col-sm-9">
                          <select class="form-control" id="edit_status">
                              <option value="1">1</option>
                              <option value="PERMANENT">PERMANENT</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                          </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="edit_salaries" class="col-sm-3 control-label">Salaries</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_salaries" name="edit_salaries" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="edit_itemno" class="col-sm-3 control-label">Item no</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_itemno" name="edit_itemno" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add" id="edit_vacancy"><i class="fa fa-save"></i> Save</button>
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
            	<h4 class="modal-title"><b>Deleting...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="position_delete.php">
            		<input type="hidden" id="del_posid" name="id">
            		<div class="text-center">
	                	<p>DELETE VACANCY</p>
	                	<h2 id="del_position" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
              <input type="hidden" id="delete_id">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" id="delete_vacancy" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     