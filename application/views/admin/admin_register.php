<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	
    <div class="col-sm-12px">
	   <div class="row">
						<?php 
							if(validation_errors()){
							?>
							<div style="margin-left: 30px;">
								<i style="color:red;"><?php echo validation_errors(); ?></i>
							</div>
						<?php
							}
						?>
            <!-- center left-->	
         	<div class="col-md-6">
			<div class="panel panel-success">
                <div class="panel-heading">

						<!-- Button trigger modal -->
							<button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus" aria-hidden="true"></i>
							&nbsp; Add Year category
							</button>
                	<h4><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Register Graduate</h4> 
                </div>
					<div class="panel-body">
							<?php

								echo form_open('admin/register');
							?>
							<?php
								echo '<div class="form-group">';
								echo '<label>ID Number:<i style="color:red;">*</i></label>';
								echo form_input('idno','','class="form-control form-width" autofocus required');
								echo '</div>';

								echo '<div class="form-group">';
								echo '<label>First Name:<i style="color:red;">*</i></label>';
								echo form_input('firstname','','class="form-control form-width" autofocus required');
								echo '</div>';

								echo '<div class="form-group">';
								echo '<label>Last Name:<i style="color:red;">*</i></label>';
								echo form_input('lastname','','class="form-control form-width" required');
								echo '</div>';

								$options = array(
								'Male' => 'Male',
								'Female' => 'Female'
								);

								echo '<div class="form-group">';
								echo '<label>Sex:<i style="color:red;">*</i></label>';
								echo form_dropdown('sex',$options,'','class="form-control form-width" required');
								echo '</div>';

								echo '<div class="form-group">';
								echo '<label>Course:<i style="color:red;">*</i></label>';
								echo '<td><select name="course" class="form-control form-width">';
								if(!empty($list1)){
									foreach ($list1 as $row) {
									echo '<option value="'.$row->courseID.'">'.$row->course.'</option>';
									}
								}
								echo '</select></td>';
								echo '</div>';

								echo '<div class="form-group">';
								echo '<label>Year Graduated:<i style="color:red;">*</i></label>';
								echo '<td><select name="year" class="form-control form-width">';
								if(!empty($list)){
									foreach ($list as $row) {
									echo '<option value="'.$row->yearID.'">'.$row->yeargraduated.'</option>';
									}
								}
								echo '</select></td>';
								echo '</div>';

								echo '<div class="form-group has-feedback">';
								echo '<label>Date of Birth:<i style="color:red;">*</i></label>';
								echo '<input type="date" class="form-control form-width compatibleDate" name="dob" placeholder="yyyy/mm/dd" required>';
								echo '<i class="glyphicon glyphicon-calendar form-control-feedback" style="margin-top:8px;"></i>';
								echo '<span class="help-block pull-right" style="font-size:12px;">Date format: YYYY-MM-DD</span>';
								echo '</div><br><hr>';
							?>
							<?php
								echo form_submit('admin/register','Register','class="btn btn-success btn-block"');
							?>
							<?php
								echo form_close();
							?>
					
					<!-- Modal -->
					<div class="modal fade" id="myModal" role="dialog">
					  <div class="modal-dialog modal-sm">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <i class="fa fa-times" aria-hidden="true"></i>
					        </button>
					        <h4 class="modal-title" id="exampleModalLabel">Add Year</h4>
					      </div>
					      <div class="modal-body">
					      		<?php 
									if(validation_errors()){
									?>
										<i style="color:red;"><?php echo validation_errors(); ?></i>
								<?php
									}
									echo form_open('admin/add_year');
								?>

								<div class="form-group">
										<label class="control-label">Year Graduated:</label>				
										<input type="number" name="yg" class="form-control" placeholder="Enter a new year" autofocus required />
								</div>
					      </div>
					      <div class="modal-footer">
								<?php
									echo form_submit('admin/add_year','Submit','class="btn btn-info pull-right"');
								?>
									<button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-label="Close" style="margin-right:10px;">
										Cancel
									</button>
								<?php
									echo form_close();
								?>					      	
					      </div>
					    </div>
					  </div>
					</div>					
				</div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-->
			
			
            <!--center-right-->
        	<div class="col-md-6">
			<div class="panel panel-info">
                <div class="panel-heading">
                	<h4><i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp; Register Validator</h4> 
                </div>
					<div class="panel-body">

							<?php
								echo form_open('admin/register_validator');
								echo '<div class="form-group">';
								echo '<label>ID Number:<i style="color:red;">*</i></label>';
								echo form_input('idno','','class="form-control form-width" autofocus required');
								echo '</div>';

								echo '<div class="form-group">';
								echo '<label>First Name:<i style="color:red;">*</i></label>';
								echo form_input('firstname','','class="form-control form-width" autofocus required');
								echo '</div>';

								echo '<div class="form-group">';
								echo '<label>Last Name:<i style="color:red;">*</i></label>';
								echo form_input('lastname','','class="form-control form-width" required');
								echo '</div>';

								$options = array(
								'Male' => 'Male',
								'Female' => 'Female'
								);

								echo '<div class="form-group">';
								echo '<label>Sex:<i style="color:red;">*</i></label>';
								echo form_dropdown('sex',$options,'','class="form-control form-width" required');
								echo '</div>';

								echo '<div class="form-group">';
								echo '<label>Contact number:<i style="color:red;">*</i></label>';
								echo '<input class="form-control form-width" type="number" name="contactnumber" required />';
								echo '</div>';

								echo '<div class="form-group">';
								echo '<label>Email address:<i style="color:red;">*</i></label>';
								echo '<input class="form-control form-width" type="email" name="email" required />';
								echo '</div><hr>';

							?>
							<?php
								echo form_submit('admin/register','Register','class="btn btn-info btn-block');
							?>
							<?php
								echo form_close();
							?>			


					
			
             </div><!--/panel-->
			</div><!--/col-span-5-->
			</div>
       </div><!--/row-->
  	</div><!--/col-span-9-->
    
  </div><!--/row-->
  <!-- /upper section -->
  
</div><!--/container-->
<!-- /Main -->


<?php include_once('footer1.php'); ?>

<script type="text/javascript" >
$(document).ready(function() {

    //------ BROWSER date COMPATIBILITY Code
    if ( $('.compatibleDate')[0].type != 'date') {
      $('.compatibleDate').datepicker({ dateFormat: 'yy-mm-dd' });
    }
   
});
</script>