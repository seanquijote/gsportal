<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">

	   <div class="row">
            <!-- center left-->	
         	<div class="col-md-7">
			<div class="panel panel-Success">
                <div class="panel-heading">
                <?php if(!empty($list)) {
					foreach ($list as $row) {
						echo '<h4>Editing profile of '.$row->firstname.'</h4></div>';
						echo '<div class="panel-body">';
						echo form_open('admin/edit/'.$row->idnumber);
						echo form_hidden('idno',$row->idnumber);

						echo '<div class="form-group has-feedback">';
						echo '<label>First Name:</label>';
						echo form_input('firstname',$row->firstname,'class="form-control form-width" placeholder="First Name" autofocus');
						echo '</div>';

						echo '<div class="form-group has-feedback">';
						echo '<label>Last Name:</label>';
						echo form_input('lastname',$row->lastname,'class="form-control form-width" placeholder="Last Name"');
						echo '</div>';

						$options = array(
						'Male' => 'Male',
						'Female' => 'Female'
						);

						echo '<div class="form-group has-feedback">';
						echo '<label>Sex:</label>';
						echo form_dropdown('sex',$options,'','class="form-control form-width"');
						echo '</div>';						

						echo '<div class="form-group has-feedback">';
						echo '<label>Course:</label>';
						echo '<td><select name="course" class="form-control form-width">';
						if(!empty($list2)){
							foreach ($list2 as $row2) {
							echo '<option value="'.$row2->courseID.'">'.$row2->course.'</option>';
							}
						}
						echo '</select></td>';
						echo '</div>';

						echo '<div class="form-group has-feedback">';
						echo '<label>Year Graduated:</label>';						
						echo '<td><select name="year" class="form-control form-width">';
						if(!empty($list1)){
							foreach ($list1 as $row1) {
							echo '<option value="'.$row1->yearID.'">'.$row1->yeargraduated.'</option>';
							}
						}
						echo '</select></td>';
						echo '</div>';						

						echo '<div class="form-group has-feedback">';
						echo '<label>Date of Birth:</label>';	
						echo '<input type="date" name="dob" value="'.$row->dob.'" class="form-control form-width compatibleDate">';
						echo '<span class="help-block pull-right" style="font-size:12px;">Date format: YYYY-MM-DD</span>';
						echo '<i class="glyphicon glyphicon-calendar form-control-feedback" style="margin-top:8px;"></i>';
						echo '</div><br><hr>';

						echo form_submit('admin/edit/'.$row->idnumber,'Save Changes','class="btn btn-info pull-right"');
						echo form_close();
					}
				}

				if(!empty($vlist)){
					foreach ($vlist as $row) {
						echo '<h4>Editing profile of '.$row->firstname.'</h4></div>';
						echo '<div class="panel-body">';
						echo form_open('admin/edit/'.$row->idnumber);
						echo form_hidden('idno',$row->idnumber);

						echo '<div class="form-group has-feedback">';
						echo '<label>First Name:</label>';
						echo form_input('firstname',$row->firstname,'class="form-control form-width" placeholder="First Name" autofocus');
						echo '</div>';

						echo '<div class="form-group has-feedback">';
						echo '<label>Last Name:</label>';
						echo form_input('lastname',$row->lastname,'class="form-control form-width" placeholder="Last Name"');
						echo '</div>';

						$options = array(
						'Male' => 'Male',
						'Female' => 'Female'
						);

						echo '<div class="form-group has-feedback">';
						echo '<label>Sex:</label>';
						echo form_dropdown('sex',$options,'','class="form-control form-width"');
						echo '</div>';						

						echo '<div class="form-group">';
						echo '<label>Contact number:</label>';
						echo '<input class="form-control form-width" type="number" value="'.$row->contactnumber.'" name="contactnumber" />';
								echo '</div>';

						echo '<div class="form-group">';
						echo '<label>Email address:</label>';
						echo '<input class="form-control form-width" type="email" name="email" value="'.$row->email.'" />';
						echo '</div><hr>';

						echo form_submit('admin/edit/'.$row->idnumber,'Save Changes','class="btn btn-info pull-right"');
						echo form_close();
					}
				}
				?>
					</div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-->
			
			
            <!--center-right-->
        	<div class="col-md-5">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Errors:</h4></div>
				  <div class="panel-body">
						<?php 
						if(validation_errors()){
							echo '<i style="color:red;">'.validation_errors().'</i>';
						} else {
								echo 'No errors found.';
						}
						?>
				</div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-span-6-->
       </div><!--/row-->
    
  </div>
  
<?php include_once('footer1.php'); ?>

<script type="text/javascript" >
$(document).ready(function() {

    //------ BROWSER date COMPATIBILITY Code
    if ( $('.compatibleDate')[0].type != 'date') {
      $('.compatibleDate').datepicker({ dateFormat: 'yy-mm-dd' });
    }
   
});
</script>