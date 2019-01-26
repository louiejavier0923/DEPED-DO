<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add News</b></h4>
          	</div>
          	<div class="modal-body">
            	<div class="form-horizontal">
              
          		  <div class="form-group">
                  	<label for="title" class="col-sm-3 control-label">News Title</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="title" name="title" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">News Description</label>

                    <div class="col-sm-9">
                       <textarea class="form-control" rows="3" id="description" name="description" placeholder="Type Address . . ."></textarea>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="expiration" class="col-sm-3 control-label">Date Posted</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                </div>
               
                	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="submit_news" id="submit_news"><i class="fa fa-save"></i> Save</button>
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
              <h4 class="modal-title"><b>Update News</b></h4>
            </div>
            <div class="modal-body">
              <div class="form-horizontal">
                <div class="form-group">

                    <div class="col-sm-9">
                      <input type="hidden" class="form-control"  id="edit_uid" name="edit_uid" required >
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">News Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_title" name="edit_title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">News Description</label>

                    <div class="col-sm-9">
                       <textarea class="form-control" rows="3" id="edit_desc" name="edit_desc" placeholder="Type Description . . ."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="expiration" class="col-sm-3 control-label">Date Posted</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="edit_date" name="edit_date" required>
                    </div>
                </div>
                  <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="edit_news" id="edit_news"><i class="fa fa-save"></i> Save</button>
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
            		<input type="hidden" id="d_id" name="d_id">
            		<div class="text-center">
	                	<p>Archive News</p>
	                	<h2 id="del_position" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
              <input type ="hidden" id="delete_id">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete" id="archive"><i class="fa fa-trash"></i> Archive</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     