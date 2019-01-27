
<!-- Delete -->
<div class="modal fade" id="retrieve">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="attendance_date"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="attendance_delete.php">
            		<input type="hidden" id="r_id" name="id">
            		<div class="text-center">
	                	<p>RETRIEVE USER</p>
	                	<h2 id="del_employee_name" class="bold"></h2>
                    <input type="hidden" id="d_id">
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" id="retrieve_user" name="retrieve"><i class="fa fa-check"></i> RETRIEVE</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     