<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>



<div class="wrap">
<div class="container">
<div style="position: fixed; top: 52px; bottom: 25px;">
<div class="upperdiv">
	</div>
	<div class="panel pan-green" style="width:70%; margin-left: 15%; height:130px; margin-top:-30%; border:solid 5px white; position: relative; ">
                        <div class="panel-heading" style="padding-top:10%; text-align: center;">
                           <h1>Profile</h1>
                        </div>
						</div>
						<div class="lowerdiv"></div>
						<div class="lowernavdiv">
							<ul class="nav">
						<li class="active">
							<a href="#_posts" onclick="showPosts()">
							<i class="glyphicon glyphicon-tasks"></i>&nbsp
							Posts </a>
						</li>
						<li>
							<a href="#_about" onclick="showAbout()">
							<i class="glyphicon glyphicon-user"></i>&nbsp
							About</a>
						</li>
						<li>
							<a href="#_employment" onclick="showWorkInfo()">
							<i class="glyphicon glyphicon-briefcase"></i>&nbsp
							Employment</a>
						</li>
					</ul>
	<br>
	<a class="btn btn-success" style="color: white;" href="<?php echo base_url('user');?>"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Announcements</a>
	<br><br>
	<a class="btn btn-primary" style="color: white;" href="<?php echo base_url('user/newsfeed');?>"><i class="glyphicon glyphicon-th-list"></i>&nbsp; Newsfeed</a>
	<br><br>
				<?php 
			if(validation_errors()){
			?>
			<i style="color:red; font-size:12px;"><?php echo validation_errors(); ?></i>
			<?php
			}
			?>
</div>
</div>

<div class="col-md-8" style="margin-left: 270px;">
<div class="login-form">
<center>
	<img src="<?php echo base_url().'images/'.$picture;?>" width="200" height="200" style="border-radius: 200px;"></center>
	<h1 style="text-align: center;color:white;"><?php echo $firstname .' '. $lastname;?></h1><hr class="small">
</div>
	
	
<div id="about">
	<div class="panel panel-default shadow">
		<div class="panel-body" style="word-wrap:break-word;">
			<?php if($this->session->flashdata('message')){?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<?php echo $this->session->flashdata('message')?>
				</div>
			<?php } ?>
		<a href="updatepsinfo" class="btn btn-link pull-right" style="background-color:#f3f3f3;">Update<span class="glyphicon glyphicon-pencil" style="font-size:12px;"></span></a>
		<div style="border-bottom: thin solid #c7c7c7;"><h4><strong>Personal information:</strong></h4></div><br>


<!-- ..........CHANGED THE "$info" & "$row" to "$pinfo" & "$prow" for Personal Info -->
<!-- ..........and "$winfo" and "$wrow" for Work Info.............................. -->

			<?php if(!empty($pinfo)) {
				foreach ($pinfo as $prow) {
					echo '<h5><ul type="none">';
					echo '<li>Course: <b><center><br>'.$prow->course.'</b><br></li><hr>';
					echo '<li>Sex: <b><center>'.$prow->sex.'</b><br></li><hr>';
					echo '<li>Year: Graduated <b><center>'.$prow->year.'</b><br></li><hr>';
					echo '<li>Address: <b><center><br>'.$prow->address.'</b><br></li><hr>';
					echo '<li>Birthday: <b><center>'.date("F d, Y", strtotime($prow->dob)).'</b><br></li><hr>';
					echo '<li>Civil status: <b><center>'.$prow->civilstatus.'</b><br></li><hr>';
					echo '<li>Contact number: <b><center>'.$prow->contactnumber.'</b></li><hr>';
					echo '<li>Email: <b><center>'.$prow->email.'</b></li>';
					echo '</h5></ul><br>';
				}
			}
			?>
		</div>
	</div>
</div>
	
<div id="workinfo">
	<div class="panel panel-default shadow">
		<div class="panel-body" style="word-wrap:break-word;">
			<?php 
//----------------------------------WORK INFORMATION
				echo '<div style="border-bottom: thin solid #c7c7c7;">';
				echo '<h4><strong>Work information: </strong></h4>';
				echo '</div>';
			
/*
*  ---------- UPDATE ----------
*  TITLE: COE View/Download, Modal Trigger Button, AND Modal
*  DESCRIPTION: Viewing and Downloading of the uploaded PDF file from the users. Also
*   the users can upload here if they still have not uploaded their COE.
*  BY: Sean Quijote
*  DATE: 7/16/2017
*
*/
		echo '<br><strong>&nbsp;&nbsp;&nbsp;Certificates of Employment</strong>';
			if(!empty($certinfo)) {
			?>

				&nbsp;&nbsp;
				<button data-toggle="modal" data-target="#UploadCertModal" type="button" class="btn btn-link pull-right" style="background-color:#f3f3f3;">Add&nbsp;<span class="glyphicon glyphicon-plus" style="font-size:11px;"></span></button></strong><br><br>

						
				<div class="table-responsive">
				<table class="table" border="0" style="margin-left:auto; margin-right:auto; font-size:11px;">
					<thead>
						<tr>
							<th>Company Name</th>
							<th>Date Uploaded</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
				foreach($certinfo as $cert_row) {
						echo form_open('user/profile');
						echo form_hidden('delcertID',$cert_row->certID);
			?>		
						<tr>
							<td style="vertical-align: middle;">
								<a href="<?php  echo base_url().'certificates/'.$cert_row->cert_file; ?>" class="btn btn-link" target="blank" style="font-size:14px;">
									<?php echo $cert_row->cert_title; ?>
								</a>
							</td>
							<td style="font-size:11px; vertical-align:middle;">
								<?php echo $cert_row->cert_date_uploaded ?>
							</td>
							<td style="vertical-align: middle;">
								<?php
									if($cert_row->cert_validated == "yes"){
										echo '<i style="color:green; text-align:center;">Validated</i>';
									} else {
										echo '<i style="color:#aaaaaa; text-align:center;">Not Validated</i>';
									}
								 ?>
							</td>
							<td style="vertical-align: middle;">
								<a href="<?php  echo base_url().'certificates/'.$cert_row->cert_file; ?>" data-toggle="tooltip" title="View/Download" target="blank" class="btn btn-link" style="font-size:16px;"><i class="fa fa-download" style="color:#0061ff;" onmouseover="this.style.color = '#005e01'" onmouseout="this.style.color = '#0061ff'"></i></a>

								<button class="btn btn-link" data-toggle="tooltip" title="Delete" style="color:red;" type="submit" onclick="return delCert('<?php echo $cert_row->certID; ?>')" onmouseover="this.style.color = '#720500'" onmouseout="this.style.color = 'red'">

								<i class="glyphicon glyphicon-remove" ></i>
								</button>
								
							</td>
						</tr>
			<?php
						echo form_close();
				}		
			?>
				</tbody>
				</table>
				</div>
			
			<?php
			} else {
			?>
						<br><br>
						<button data-toggle="modal" data-target="#UploadCertModal" type="button" class="btn btn-danger btn-block">
							<i class="fa fa-warning" aria-hidden="true" style="font-size: 14px;"></i>
								Please upload your
							<strong>Certificate of Employment</strong>. <i style="font-size: 12px;">(Must be in a &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i> <strong>PDF</strong> file format.)</i>
						</button>
						
			
			<?php
				}
			?>
			


			<!-- UPLOAD CERTIFICATE OF EMPLOYMENT Modal -->

					<div id="UploadCertModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Upload your Certificate of Employment</h4>
						  </div>
						  <div class="modal-body">
							<?php
								echo '<div style="padding:20px;">';
								echo form_open_multipart('user/uploading_certificate', array('style'=>'text-align:center'));
								echo form_hidden('idno',$idno).
								'<div class="form-group" style="text-align:center:">
									<label>Company Name: </label>
									<select name="cert_title" class="form-control" placeholder="Company Name..." required autofocus>';
										echo '<option value="">*** Select a company ***</option>';
										if(!empty($winfo)){
											foreach($winfo as $wrow){
												echo '<option value="'.$wrow->empCompName.'">'.$wrow->empCompName.'</option>';
											}
										} else {
											echo '<option value="" disabled selected>Add your current job or your previous jobs below.</option>';
										}
								echo '</select>
								</div>
								<br>
								<div class="input-group">
									<label class="input-group-btn">
										<span class="btn btn-primary">
											<i class="fa fa-folder-open" aria-hidden="true"></i> Choose your file&hellip; <input type="file" name="userfile" style="display: none;" required>
										 </span>
									 </label>
									 <input type="text" class="form-control" readonly required>
								</div>
												
								<span class="help-block" style="float:left;">
									It must be in a &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i> <strong>PDF</strong> file format.
								</span><br>';
							?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" value="Upload" class="btn btn-success" onclick="this.style.display = 'none'; getElementById('upload-loading').style.display = 'inline'"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
								<a href="<?php echo base_url('user/profile'); ?>" id="upload-loading" class="btn btn-success" style="display:none;"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>
							</div>	
							<?php
								echo form_close();
								echo '</div>';
							?>
						</div>

					  </div>
					</div>
		
<!-- ____________________________________________________________ -->



<!-- .......... "CURRENTLY WORKING AT..." .............. -->  
			<?php	
				echo '<br><strong>&nbsp;&nbsp;&nbsp;Currently Working At...</strong>';
		
				if(!empty($cwinfo)) {					
					foreach ($cwinfo as $cwrow) {
						$startDateformat = $cwrow->empStartDate;
						$newStartDateformat = date("m/d/Y", strtotime($startDateformat));
						$endDateformat = $cwrow->empEndDate;
						$newEndDateformat = date("m/d/Y", strtotime($endDateformat));

						if ($cwrow->empEndDate == "0000-00-00") {
							echo '<a href="#" class="btn btn-link pull-right" data-toggle="modal" data-target="#endDateModal" style="background-color:#f3f3f3;">Change&nbsp;<span class="glyphicon glyphicon-pencil" style="font-size:12px;"></span></a></strong><br><br>';
							echo '<div style="text-align:center;">';
							echo '<div class="row">
							<strong>'.$cwrow->empCompName.'</strong><br>
							'.$cwrow->empCompAddr.'<br>
							<small><i>Company Name and Address</i></small>
							</div>';
							echo '<hr style="border-color:#ffffff">';

							echo '<div class="row">
							<strong>'.$cwrow->empPosition.'</strong><br>
							<small><i>Job Position</i></small>
							</div>';
							echo '<hr style="border-color:#ffffff">';

							echo '<div class="row">
							<strong>'.$newStartDateformat.'</strong><br>
							<small><i>Date of Starting Work</i></small>
							</div>';
							echo '<hr style="border-color:#ffffff">';
							echo '</div><br>';
						} else {
							echo '<a href="changecurrentwork" class="btn btn-link pull-right" style="background-color:#f3f3f3;">Set&nbsp;<span class="glyphicon glyphicon-calendar" style="font-size:12px;"></span></a></strong><br><br>';
							echo '<div style="text-align:center;">';
							echo '<i style="color:#a1a1a1;">Empty</i>';
							echo '</div><br>';
						}


						//--------- Modal
						echo form_open('user/profile'); 
						echo form_hidden('dateID',$cwrow->empID);
						echo '<div id="endDateModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Please provide the following:</h4>
									</div>
									<div class="modal-body">
										<div class="form-group has-feedback">
										<label>Date of Resignation: </label><i style="font-size:10px;">&nbsp; (Format:YYYY/MM/DD)</i><br>
										<input type="date" id="empEndDate" name="empEndDate" value="" class="form-control compatibleDate" placeholder="yyyy/mm/dd" required>
										<i class="glyphicon glyphicon-calendar form-control-feedback"></i>
										</div>
										<br>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-info">Confirm</button>
									</div>
									</div>

								</div>
							 </div>';
						echo form_close();
					}
				} else {
							echo '<a href="changecurrentwork" class="btn btn-link pull-right" style="background-color:#f3f3f3;">Set&nbsp;<span class="glyphicon glyphicon-calendar" style="font-size:12px;"></span></a></strong><br><br>';
							echo '<div style="text-align:center;">';
							echo '<i style="color:#a1a1a1;">Empty</i>';
							echo '</div><br>';
				}

				//------"EMPLOYMENT HISTORY"
				echo '<strong>&nbsp;&nbsp;&nbsp;Employment History&nbsp;&nbsp;</strong><a href="updateemphistory" class="btn btn-link pull-right" style="background-color:#f3f3f3;">Update&nbsp;<span class="glyphicon glyphicon-pencil" style="font-size:12px;"></span></a><br><br>';
				
					echo '<div class="table-responsive"><table class="table" border="0" style="font-size:11px;"><thead><tr>
					<th>Work Period</th>
					<th>Position</th>
					<th>Company Name</th>
					<th>Work Experience</th>
					</tr></thead><tbody>';
				if(!empty($winfo)) {
					//------Table Start
					foreach ($winfo as $wrow){
						//-----Variables for the Dates
						$startDateformat = $wrow->empStartDate;
						$newStartDateformat = date("M d, Y", strtotime($startDateformat));
						$endDateformat = $wrow->empEndDate; 

								//-----IF empStillWorking is equal to "0000-00-00",
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

								$date1 = new DateTime($wrow->empStartDate);
								$date2 = new DateTime($wrow->empEndDate);
								$interval = $date1->diff($date2);
								echo '<tr>
								<td><b>'.$newStartDateformat.'</b><br><i>to</i><br><b>'.$newEndDateformat.'</b></td>
								<td style="vertical-align:middle;">'.$wrow->empPosition.'</td>            
								<td style="text-align:center; padding:5px; vertical-align:middle;">'.$wrow->empCompName.'</td>
								<td style="text-align:center; padding:5px; vertical-align:middle;">'.$interval->y . ' year(s), ' . $interval->m.' month(s), '.$interval->d.' day(s)
								</tr>';
						}
					}
				
				//--Table End
				} else {
					echo '<tr><td colspan="4">
						<br>
						<i style="text-align:center;color:#a1a1a1;">Empty</i>
						</td></tr>';
			}
					echo '</tbody></table></div>';
		?>
		</div>
	</div>
</div>
	
	<div id="posts">
		<div class="panel panel-default" style="background:transparent"><br>
			<?php 
				if(!empty($list)) {
						echo '<div id="results"></div>'; 
				} else { 
						echo '<div class="shadow" style="background-color:#ffffff;padding-bottom:15px; text-align:center; margin-bottom:10px;">';
						echo "<br><h2>Oh no!</h2><br>You have posted nothing at the moment. <br><br>Why don't you try to share something or see what other's posted at the newsfeed section! </div>";
				} 
			?>

		</div>
	</div>
	</div>
	</div>
	</div>

<script type="text/javascript">

function delCert(delcertID) {
  if(confirm("Are you sure you want to delete this certificate?")) {
    return true;
  } else {
    return false;
  }
}
</script>

<script type="text/javascript" language="javascript">

function showPosts(){
    document.getElementById('posts').style.display="block";
	document.getElementById('about').style.display="none";
	document.getElementById('workinfo').style.display="none";
}

function showAbout(){
	document.getElementById('posts').style.display="none";
	document.getElementById('about').style.display="block";
	document.getElementById('workinfo').style.display="none";
}

function showWorkInfo(){
    document.getElementById('posts').style.display="none";
	document.getElementById('about').style.display="none";
	document.getElementById('workinfo').style.display="block";
}




</script>

<script src="<?php echo base_url();?>assets2/scrolljs/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	
var total_record = 0;
var total_groups = <?php echo $total_data; ?>;

//------ BROWSER date COMPATIBILITY Code
if ( $('.compatibleDate')[0].type != 'date' ) $('.compatibleDate').datepicker({ dateFormat: 'yy/mm/dd' });
//---------------------------------------

$('#results').load("<?php echo base_url();?>user/profile_load_more", {'group_no':total_record}, function() {total_record++;});
	$(window).scroll(function() {       
	    if($(window).scrollTop() + $(window).height() == $(document).height())  
	    {           
	        if(total_record <= total_groups)
	        {
	            loading = true; 
	            $('.loader_image').show(); 
	            $.post('<?php echo base_url();?>user/profile_load_more',{'group_no': total_record},
	            function(data2){ 
	                if (data2 != "") {                               
	                    $("#results").append(data2);
	                    $('.loader_image').hide();              
	                    total_record++;
	                }
	            });     
	        }
	    }
	});


});



</script>


<?php include_once('footer.php'); ?>


<script type="text/javascript">

$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
</script>

