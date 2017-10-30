<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	
    <div class="col-sm-10 col-md-offset-1">
	   <div class="row">
			<div class="panel panel-Success">
			  <div class="panel-heading"><h4>Search:</h4></div>
				<div class="panel-body">
						<?php
						if(!empty($list)) {
							foreach ($list as $row) {
							$now = time();
							$units = 1;
							echo form_open_multipart('admin/search/'.$row->idnumber,array('style'=>'float:right; text-align:center'));
							echo '<img src="'.base_url().'images/'.$row->picture.'" width="300" height="300" style="border-radius: 12px; padding: 10px;">';
							echo form_hidden('idno',$row->idnumber).'<input type="file" name="userfile"/><br><button type="submit" value="Upload" class="btn btn-success">Upload</button>'.form_close();
							echo '<h3>'.$row->firstname.' '.$row->lastname.'</h3>';
							if(timespan(strtotime($row->lastupdate),$now,$units) == timespan(strtotime('0000-00-00'),$now,$units)) {
								echo '<h5>Last update: <b>Profile not updated</b></h5>';
							} else {
								echo '<h5>Last update: <b>'.timespan(strtotime($row->lastupdate),$now,$units).' ago</b></h5>';
							}
							echo '<b>'.form_open('admin/search/'.$row->idnumber, array('style'=>'display: inline-block;')).'Action:</b><br> <a href="'.base_url().'admin/edit/'.$row->idnumber.'" class="btn-link" >Edit User</a>&nbsp; |
							'.form_hidden('idno',$row->idnumber).'
							<input type="submit" class="btn-link" style="background:none; border:0px; color:red;" name="resetpass" value="Reset Password" readonly> |';
							
							if($row->userstatus == 'disabled') {
								echo '<input type="submit" class="btn-link" style="background:none; border:0px; color:green;" name="activate" value="Reactivate account" readonly>';
							} else {
								echo '<input type="submit" class="btn-link" style="background:none; border:0px; color:red;" name="disable" value="Disable account" readonly>';
							}
							
							echo form_close();
		

							echo '<hr><h3 style="font-weight:bold;">Personal Information:</h3>';
							echo '<ul type="disc"><li>Course: <b>'.$row->course.'</b></li>';
							echo '<li>Sex: <b>'.$row->sex.'</b></li>';
							echo '<li>Year Graduated: <b>'.$row->year.'</b></li>';
							echo '<li>Address: <b>'.$row->address.'</b></li>';
							echo '<li>Birthday: <b>'.$row->dob.'</b></li>';
							echo '<li>Civil Status: <b>'.$row->civilstatus.'</b></li>';
							echo '<li>Contact Number: <b>'.$row->contactnumber.'</b></li>';
							echo '<li>Email: <b>'.$row->email.'</b></li></ul><hr>';

/*
*  ---------- UPDATE ----------
*  TITLE: Admin COE View/Download
*  DESCRIPTION: Viewing and Downloading of the uploaded PDF file from the users for the Admins to see the 
*   validity or the details of the uploaded file.
*  BY: Sean Quijote
*  DATE: 7/16/2017
*
*/
						echo '<h3 style="font-weight:bold;">Certificates of Employment:</h3><br>';
							if(!empty($certinfo)) {
						?>

								<div class="table-responsive">
								<table class="table table-hover" border="0" style="margin-left:auto; margin-right:auto;">
									<thead>
										<tr class="warning">
										<th style="text-align: center;">COE Title/Company Name</th>
										<th style="text-align: center;">Date Uploaded</th>
										<th style="text-align: center;">Status</th>				
										<th style="text-align: center;">Action</th>
										</tr>
									</thead>
							<?php
									foreach($certinfo as $cert_row) {
										if($cert_row->cert_validated == "yes"){
							?>		
											<tr class="success">
												<td style="text-align: center;">
													<a href="<?php  echo base_url().'certificates/'.$cert_row->cert_file; ?>" class="btn btn-link" target="blank" style="font-size:16px;">
														<?php echo $cert_row->cert_title; ?>
													</a>
												</td>
												<td style="font-size:14px; padding:15px; text-align: center;">
													<?php echo $cert_row->cert_date_uploaded; ?>
												</td>
												<td style="text-align: center;">
													<?php
							                            if($cert_row->cert_validated == "yes"){
							                                echo '<i style="color:green;">Validated</i>';
							                            } else {
							                                echo '<i style="color:#a1a1a1;">Not Validated</i>';
							                            }
													?>
												</td>
												<td style="text-align: center;">
													<a href="<?php  echo base_url().'certificates/'.$cert_row->cert_file; ?>" data-toggle="tooltip" title="View/Download" target="blank" class="btn btn-link" style="font-size:16px;"><i class="fa fa-download" style="color:#0061ff;" onmouseover="this.style.color = '#005e01'" onmouseout="this.style.color = '#0061ff'"></i></a>
											
												</td>
											</tr>

							<?php
										} else {
							?>				
							
											<tr class="danger">
												<td style="text-align: center;">
													<a href="<?php  echo base_url().'certificates/'.$cert_row->cert_file; ?>" class="btn btn-link" target="blank" style="font-size:16px;">
														<?php echo $cert_row->cert_title; ?>
													</a>
												</td>
												<td style="font-size:14px; padding:15px; text-align: center;">
													<?php echo $cert_row->cert_date_uploaded; ?>
												</td>
												<td style="text-align: center;">
													<?php
							                            if($cert_row->cert_validated == "yes"){
							                                echo '<i style="color:green;">Validated</i>';
							                            } else {
							                                echo '<i style="color:#a1a1a1;">Not Validated</i>';
							                            }
													?>
												</td>
												<td style="text-align: center;">
													<a href="<?php  echo base_url().'certificates/'.$cert_row->cert_file; ?>" data-toggle="tooltip" title="View/Download" target="blank" class="btn btn-link" style="font-size:16px;"><i class="fa fa-download" style="color:#0061ff;" onmouseover="this.style.color = '#005e01'" onmouseout="this.style.color = '#0061ff'"></i></a>
											
												</td>
											</tr>

							<?php
										}
									}
							?>

								</table>
								</div>
						

						<?php
							} else {
						?>
								<div class="alert alert-danger" style="text-align: center; font-size: 16px;">
	  								<strong><i class="fa fa-ban" aria-hidden="true" style="font-size:16px;"></i>&nbsp; No COE file found.</strong>
								</div>
						<?php
							}

/* ------------------------------------------------------------------------------------------------*/						


							echo '<hr><h3 style="font-weight:bold;">Currently Working At...</h3>';

							if(!empty($cwinfo)) {			
								foreach ($cwinfo as $cwrow) {
									$startDateformat = $cwrow->empStartDate;
									$newStartDateformat = date("m/d/Y", strtotime($startDateformat));
									$endDateformat = $cwrow->empEndDate;
									$newEndDateformat = date("m/d/Y", strtotime($endDateformat));

									if ($cwrow->empEndDate == "0000-00-00") {
										echo '<div style="text-align:center;">';
										echo '<div class="row">
										<strong>'.$cwrow->empCompName.'</strong><br>
										'.$cwrow->empCompAddr.'<br>
										<small><i>Company Name and Address</i></small>
										</div>';
										echo '<br>';

										echo '<div class="row">
										<strong>'.$cwrow->empPosition.'</strong><br>
										<small><i>Job Position</i></small>
										</div>';
										echo '<br>';

										echo '<div class="row">
										<strong>'.$newStartDateformat.'</strong><br>
										<small><i>Date of Starting Work</i></small>
										</div>';
										echo '<br>';
										echo '</div><br>';
									} else {
										echo '<div style="text-align:center;">';
										echo '<i style="color:#a1a1a1;">Not set</i>';
										echo '</div><br>';
									}
								}
							}

							echo '<hr><h3 style="font-weight:bold;">Employment History:</h3><br>';

							//------Table Start
							echo '<div class="table-responsive"><table class="table table-hover" style="font-size:11px;">
									<thead style="background-color:#d3d3d3;">
										<tr>
											<th style="text-align: center;">Work Period</th>
											<th style="text-align: center;">Position</th>
											<th style="text-align: center;">Company Name</th>
											<th style="text-align: center;">Work Experience</th>
										</tr>
									</thead>';
							
							if(!empty($winfo)) {
								foreach ($winfo as $wrow){
									//-----Variables for the Dates
									$startDateformat = $wrow->empStartDate;
									$newStartDateformat = date("M d, Y", strtotime($startDateformat));
									$endDateformat = $wrow->empEndDate; 

											//-----IF empStillWorking is equal to "yes",
											if($wrow->empEndDate == "0000-00-00") {
												//-----ELSE display the string 'Present'
												$newEndDateformat = 'Present';
											} else {
												//-----THEN display and change the format to MM-DD-YYYY
												$newEndDateformat = date("M d, Y", strtotime($endDateformat));
											}

									if($wrow->empEndDate == "0000-00-00"){
											echo '<tr class="hidden">
											<td><b>'.$newStartDateformat.'</b><br>to<br><b>'.$newEndDateformat.'</b></td>
											<td style="vertical-align:middle;">'.$wrow->empPosition.'</td>            
											<td style="text-align:center; padding:5px; vertical-align:middle;">'.$wrow->empCompName.'</td>
											</tr>';
									} else {
										if($wrow->empHide == ""){
											$date1 = new DateTime($wrow->empStartDate);
											$date2 = new DateTime($wrow->empEndDate);
											$interval = $date1->diff($date2);
											echo '<tr style="text-align: center;">
											<td><b>'.$newStartDateformat.'</b><br><i>to</i><br><b>'.$newEndDateformat.'</b></td>
											<td style="vertical-align:middle;">'.$wrow->empPosition.'</td>            
											<td style="vertical-align:middle;">'.$wrow->empCompName.'</td>
											<td style="vertical-align:middle;">'.$interval->y . ' year(s), ' . $interval->m.' month(s), '.$interval->d.' day(s)
											</tr>';
											
										}
									}
								}
							
								echo '</table></div>';
							//--Table End
							} else {
								echo '<p style="text-align:center">No previous employment set.</p>';
						}
							}
						} elseif(!empty($vlist)) {
							foreach ($vlist as $row) {
							$now = time();
							$units = 1;
							echo form_open_multipart('admin/search/'.$row->idnumber,array('style'=>'float:right; text-align:center'));
							echo '<img src="'.base_url().'images/'.$row->picture.'" width="300" height="300" style="border-radius: 12px; padding: 10px;">';
							echo form_hidden('idno',$row->idnumber).'<input type="file" name="userfile"/><br><button type="submit" value="Upload" class="btn btn-success">Upload</button>'.form_close();
							echo '<h3>'.$row->firstname.' '.$row->lastname.'</h3>';
							if(timespan(strtotime($row->lastupdate),$now,$units) == timespan(strtotime('0000-00-00'),$now,$units)) {
								echo '<h5>Last update: <b>Profile not updated</b></h5>';
							} else {
								echo '<h5>Last update: <b>'.timespan(strtotime($row->lastupdate),$now,$units).' ago</b></h5>';
							}
							echo '<b>'.form_open('admin/search/'.$row->idnumber, array('style'=>'display: inline-block;')).'Action:</b><br> <a href="'.base_url().'admin/edit/'.$row->idnumber.'" class="btn-link" >Edit User</a>&nbsp; |
							'.form_hidden('idno',$row->idnumber).'
							<input type="submit" class="btn-link" style="background:none; border:0px; color:red;" name="resetpass" value="Reset Password" readonly> |';
							
							if($row->userstatus == 'disabled') {
								echo '<input type="submit" class="btn-link" style="background:none; border:0px; color:green;" name="activate" value="Reactivate account" readonly>';
							} else {
								echo '<input type="submit" class="btn-link" style="background:none; border:0px; color:red;" name="disable" value="Disable account" readonly>';
							}
							
							echo form_close();
		

							echo '<hr><h4>Personal Information</h4>';
							echo '<li>Sex: <b>'.$row->sex.'</b></li>';
							echo '<li>Contact Number: <b>'.$row->contactnumber.'</b></li>';
							echo '<li>Email: <b>'.$row->email.'</b></li></ul><hr>';

							}
						}
						?>
					</div><!--/panel-body-->
			</div><!--/panel-->		
       </div><!--/row-->
  	</div><!--/col-span-9-->
  </div><!--/row-->
  <!-- /upper section -->
  
</div><!--/container-->
<!-- /Main -->


<?php include_once('footer1.php'); ?>