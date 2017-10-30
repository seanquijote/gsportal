<?php include_once('header2.php');?>

<?php include_once('nav2.php');?>


    <div class="page-content">


	    	<div class="row">
			    <div class="col-md-2">
				  <?php include_once('sidebar2.php');?>
			  </div>


				<div class="col-md-10">

        <div class="panel panel-default">
        <div class="panel-heading"><h4>
        <i class="fa fa-graduation-cap"></i> Graduate</h4></div>
        <div class="panel-body">
            <?php
            if(!empty($list)) {
              foreach ($list as $row) {
                  $now = time();
                  $units = 1;

                  echo '<img src="'.base_url().'images/'.$row->picture.'" width="100" height="100" style="border-radius: 12px; padding: 10px; float:left;">';
                  echo '<h3>'.$row->firstname.' '.$row->lastname.'</h3>';
                  if(timespan(strtotime($row->lastupdate),$now,$units) == timespan(strtotime('0000-00-00'),$now,$units)) {
                    echo '<h5>Last update: <b>Profile not updated</b></h5>';
                  } else {
                    echo '<h5>Last update: <b>'.timespan(strtotime($row->lastupdate),$now,$units).' ago</b></h5>';
                  }
              }
            }  

           echo '<br><hr>';
/*
*  ---------- UPDATE ----------
*  TITLE: Admin COE View/Download
*  DESCRIPTION: Viewing and Downloading of the uploaded PDF file from the users for the Admins to see the 
*   validity or the details of the uploaded file.
*  BY: Sean Quijote
*  DATE: 7/16/2017
*
*/
            echo '<h3><b>Certificates of Employment:</b></h3><br>';
              if(!empty($certinfo)) {
            ?>

                <div class="table-responsive">
                <table class="table table-hover" border="0" style="margin-left:auto; margin-right:auto;">
                  <thead>
                    <tr class="warning">
                    <th style="text-align: center;">COE Title/Company Name</th>
                    <th style="text-align: center;">Date Uploaded</th>
                    <th style="text-align: center;">View/Download</th>
                    <th style="text-align: center;">Status</th>                    
                    <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
              <?php
                foreach($certinfo as $cert_row) {
                    echo form_open('validator/validation');
                      echo form_hidden('certid',$cert_row->certID);
                      echo form_hidden('certidnumber',$cert_row->idnumber);
              ?>

                  <?php
                    if($cert_row->cert_validated == "yes"){
                  ?>

                        <tr class="success">
                          <td style="text-align: center;">
                            <a href="<?php  echo base_url().'certificates/'.$cert_row->cert_file; ?>" class="btn btn-link" target="blank" style="font-size:16px;">
                              <?php echo $cert_row->cert_title; ?>
                            </a>
                          </td>
                          <td style="font-size:14px; vertical-align: middle; text-align:center;">
                            <?php echo $cert_row->cert_date_uploaded ?>
                          </td>
                          <td style="text-align:center; vertical-align: middle;">
                            <a href="<?php  echo base_url().'certificates/'.$cert_row->cert_file; ?>" data-toggle="tooltip" title="View/Download" target="blank" class="btn btn-link" style="font-size:16px;"><i class="fa fa-download" style="color:#0061ff;" onmouseover="this.style.color = '#005e01'" onmouseout="this.style.color = '#0061ff'"></i></a>
                          </td">
                          <td style="vertical-align: middle; text-align:center;">

                            <?php
                                if($cert_row->cert_validated == "no" || empty($cert_row->cert_validated)){
                                    echo '<i style="color:#a1a1a1;">Not Validated</i>';
                                } else {
                                    echo '<i style="color:green;">Validated</i>';
                                }
                            ?>
                          </td>
                          <td style="text-align: center; vertical-align: middle;">
                            <?php
                              if($cert_row->cert_validated == "no" || empty($cert_row->cert_validated)){
                                echo '<input name="validate" type="submit" class="btn btn-success" value="&#9745;&nbsp; Validate">';
                              } else {
                                echo '<input name="invalidate" type="submit" class="btn btn-danger" value="&#9746;&nbsp; Invalidate">';
                              }
                            ?>
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
                          <td style="font-size:14px; vertical-align: middle; text-align:center;">
                            <?php echo $cert_row->cert_date_uploaded ?>
                          </td>
                          <td style="text-align:center; vertical-align: middle;">
                            <a href="<?php  echo base_url().'certificates/'.$cert_row->cert_file; ?>" data-toggle="tooltip" title="View/Download" target="blank" class="btn btn-link" style="font-size:16px;"><i class="fa fa-download" style="color:#0061ff;" onmouseover="this.style.color = '#005e01'" onmouseout="this.style.color = '#0061ff'"></i></a>
                          </td">
                          <td style="vertical-align: middle; text-align:center;">

                            <?php
                                if($cert_row->cert_validated == "yes"){
                                    echo '<i style="color:green;">Validated</i>';
                                } else {
                                    echo '<i style="color:#a1a1a1;">Not Validated</i>';
                                }
                            ?>
                          </td>
                          <td style="text-align: center; vertical-align: middle;">
                            <?php
                              if($cert_row->cert_validated == "no" || empty($cert_row->cert_validated)){
                                echo '<input name="validate" type="submit" class="btn btn-success" value="&#9745;&nbsp; Validate">';
                              } else {
                                echo '<input name="invalidate" type="submit" class="btn btn-danger" value="&#9746;&nbsp; Invalidate">';
                              }
                            ?>
                          </td>
                        </tr>
                        
                    <?php
                    }
                    echo form_close();
                 ?>

              <?php
                }
              ?>

                </table>
                </div>
            

            <?php
              } else {
            ?>
                <div class="alert alert-danger" style="text-align: center; font-size: 16px;">
                    <strong><i class="fa fa-ban" aria-hidden="true" style="font-size:16px;"></i>&nbsp; No COE uploaded</strong>
                </div>
            <?php
              }

/* ------------------------------------------------------------------------------------------------*/           


              echo '<hr><h3><b>Currently Working At...</b></h3>';

              if(!empty($cwinfo)) {     
                foreach ($cwinfo as $cwrow) {
                  $startDateformat = $cwrow->empStartDate;
                  $newStartDateformat = date("m/d/Y", strtotime($startDateformat));
                  $endDateformat = $cwrow->empEndDate;
                  $newEndDateformat = date("m/d/Y", strtotime($endDateformat));

                  if ($cwrow->empEndDate == "0000-00-00") {
                    echo '<div style="text-align:center;">';
                    echo '<div class="row">
                    <strong style="font-size:18px;">'.$cwrow->empCompName.'</strong><br>
                    '.$cwrow->empCompAddr.'<br>
                    <small><i>Company Name and Address</i></small>
                    </div>';
                    echo '<br>';

                    echo '<div class="row">
                    <strong style="font-size:18px;">'.$cwrow->empPosition.'</strong><br>
                    <small><i>Job Position</i></small>
                    </div>';
                    echo '<br>';

                    echo '<div class="row">
                    <strong style="font-size:18px;">'.$newStartDateformat.'</strong><br>
                    <small><i>Date of Starting Work</i></small>
                    </div>';
                    echo '<br>';
                    echo '</div><br>';
                  } else {
                    echo '<div style="text-align:center;">';
                    echo '<i style="color:#a1a1a1;">Empty</i>';
                    echo '</div><br>';
                  }
                }
              } else {
                    echo '<div style="text-align:center;"><br>';
                    echo '<i style="color:#a1a1a1;">Empty</i>';
                    echo '</div><br>';
              }

/* ------------------------------------------------------------------------------------------------*/

              echo '<hr><h3><b>Employment History:</b></h3><br>';

              //------Table Start
              echo '<div class="table-responsive"><table class="table table-hover" style="font-size:14px;">
              <thead style="background-color:#d3d3d3;">
                <tr>
                  <th style="text-align: center;">Work Period</th>
                  <th style="text-align: center;">Position</th>
                  <th style="text-align: center;">Company Name</th>
                  <th style="text-align: center;">Work Experience</th>
                </tr>
              </thead>
              <tbody>';
              
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
              } else {
                echo '<tr><td colspan="4"><br><p style="text-align:center;color:#a1a1a1;"><i>Empty</i></p></td></tr>';
              }
                echo '</tbody></table></div>'; //--Table End
            ?>
          </div><!--/panel-body-->
      </div><!--/panel--> 
				</div>
        </div>

			</div>

	</div>

<?php include_once('footer2.php'); ?>