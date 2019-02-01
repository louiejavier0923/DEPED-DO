<!-- success PDS -->
<div class="modal fade" id="success-pds">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            <section class= "success-modal" id= "success-message">
				<section class= "success-container">
					<img src= "../../img/icon-success.png">
					<p id= "success-header">Success!</p>
					<p id= "success-info">You were successful!</p>
					<button id= "closeSuccessBtn">CONTINUE</button>
				</section>
			</section>
				
          	</div>
        </div>
    </div>
</div>				

<!-- error PDS -->
<div class="modal fade" id="error-pds">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            <section class= "error-modal" id= "error-message">
				<section class= "error-container">
					<img src= "../../img/icon-error.png">
					<p id= "error-header">Ooooopps!</p>
					<p id= "error-info">Please make sure that all fields are filled up!</p>
					<button id= "closeErrorBtn">DISMISS</button>
				</section>
			</section>
				
          	</div>
        </div>
    </div>
</div>				
	 
				
<!-- Edit PDS -->
<div class="modal fade" id="view_pds">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	
			<?php include 'PDS.php';?>
			
				
				
          	</div>
			<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit" id="update_pds_info-btn"><i class="fa fa-check-square-o"></i> Update</button>
            	</div>
        </div>
    </div>
</div>				
		