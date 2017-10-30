<?php include_once('header2.php');?>

<?php include_once('nav2.php');?>

    <div class="page-content">

	    	<div class="row">
			       <div class="col-md-2">
			     	<?php include_once('sidebar2.php');?>
			  </div>


				<div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><i class="fa fa-th-list"></i> Users List</h4></div>
          <div class="panel-body">
          <form class="form-inline" method="GET">
            
            <div class="form-group">
              <label class="control-label">Degree:</label>   
                <select name="c1" class="form-control">
                <option value="all">All</option>
                  <?php if(!empty($list2)){
                    foreach ($list2 as $row1) {
                    echo '<option value="'.$row1->courseID.'">'.$row1->course.'</option>';
                    }
                  }?>
                </select>
            </div>

            <div class="form-group">
              <label class="form-group">Year:</label>
                <select name="c2" class="form-control">
                  <option value="all">All</option>
                    <?php if(!empty($list1)){
                      foreach ($list1 as $row) {
                      echo '<option value="'.$row->yearID.'">'.$row->yeargraduated.'</option>';
                      }
                    }?>     
                </select>
            </div>
            
            <br><br>
            
            <button type="submit" class="btn btn-success btn-block">Go</button>



          </form>
          <hr>
          <label>Degree selected: 
          
          <?php 
          if(!empty($this->input->get('c1'))) {
            if(!empty($sc)) {
              echo '<b><u>'.$sc['0']->course.'</u></b>'; 
            } else {
              echo '<b><u>All Degree</u></b>';
            }
          } else {
            echo '';
          }
            ?>
            
            <br>Year: 
          
          <?php 
          if(!empty($this->input->get('c2'))) {
            if(!empty($yr)) {
              echo '<b><u>'.$yr['0']->yeargraduated.'</u></b>';
            } else {
              echo '<b><u>All Year</u></b>';
            }
          } else {
            echo '';
          }
            ?>

          <br>
          </label>
          <hr>

              <?php 
                $now = time();
                $units = 1;
                if(!empty($list) ) {
              ?>
                <table class="table table-hover" border='0' style="padding 10px; border-spacing: 1px 1px; width:100%;">
                  <thead style="background-color:#d3d3d3; border-color:#fff; border-collapse: separate; ">
                    <tr>
                      <th>Name</th>
                      <th style="text-align:center;">COEs Validated</th>
                      <th style="text-align:center;"></th>
                      <th style="text-align:center;">COEs Uploaded</th>
                      <th style="text-align:center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>

            <?php
                  foreach($list as $row) {
                    if($row->validated_coe == $row->uploaded_coe && $row->validated_coe != 0 && $row->uploaded_coe != 0 ){
                      echo '<tr class="success">';
                      echo '<td>'.$row->lastname.', '.$row->firstname.'</td>';
                     
                      echo '<td style="text-align:center;">';
                        if($row->validated_coe == "0"){
                            echo '<span style="color:red;">'.$row->validated_coe.'</span>';
                        } else {
                            echo '<span style="color:green;font-weight:bold;">'.$row->validated_coe.'</span>';
                        }
                      echo '</td>';

                      echo '<td style="text-align:center;"><i>out of</i></td>';
                      
                      echo '<td style="text-align:center;">';
                        if($row->uploaded_coe == "0"){
                            echo '<span style="color:red;">'.$row->uploaded_coe.'</span>';
                        } else {
                            echo '<span style="color:green;font-weight:bold;">'.$row->uploaded_coe.'</span>';
                        }
                      echo '</td>';


                      echo '<td style="text-align:center;"><a href="'.base_url().'validator/search/'.$row->idnumber.'" class="btn btn-success"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; View</a></td>';
                      echo '</tr>';
                    } elseif($row->validated_coe >= 0 && $row->uploaded_coe > 0) {
                      echo '<tr class="warning">';
                      echo '<td>'.$row->lastname.', '.$row->firstname.'</td>';
                     
                      echo '<td style="text-align:center;">';
                        if($row->validated_coe == "0"){
                            echo '<span style="color:red;">'.$row->validated_coe.'</span>';
                        } else {
                            echo '<span style="color:green;font-weight:bold;">'.$row->validated_coe.'</span>';
                        }
                      echo '</td>';

                      echo '<td style="text-align:center;"><i>out of</i></td>';
                      
                      echo '<td style="text-align:center;">';
                        if($row->uploaded_coe == "0"){
                            echo '<span style="color:red;">'.$row->uploaded_coe.'</span>';
                        } else {
                            echo '<span style="color:green;font-weight:bold;">'.$row->uploaded_coe.'</span>';
                        }
                      echo '</td>';


                      echo '<td style="text-align:center;"><a href="'.base_url().'validator/search/'.$row->idnumber.'" class="btn btn-success"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; View</a></td>';
                      echo '</tr>';                      
                    } elseif($row->uploaded_coe == 0) {
                      echo '<tr class="danger">';
                      echo '<td>'.$row->lastname.', '.$row->firstname.'</td>';
                     
                      echo '<td style="text-align:center;">';
                        if($row->validated_coe == "0"){
                            echo '<span style="color:red;">'.$row->validated_coe.'</span>';
                        } else {
                            echo '<span style="color:green;font-weight:bold;">'.$row->validated_coe.'</span>';
                        }
                      echo '</td>';

                      echo '<td style="text-align:center;"><i>out of</i></td>';
                      
                      echo '<td style="text-align:center;">';
                        if($row->uploaded_coe == "0"){
                            echo '<span style="color:red;">'.$row->uploaded_coe.'</span>';
                        } else {
                            echo '<span style="color:green;font-weight:bold;">'.$row->uploaded_coe.'</span>';
                        }
                      echo '</td>';


                      echo '<td style="text-align:center;"><a href="'.base_url().'validator/search/'.$row->idnumber.'" class="btn btn-success"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; View</a></td>';
                      echo '</tr>';
                    }
                  }

                echo '</tbody></table>';
                } else {
                  echo '<div style="text-align:center;">None found</div>';
                }
              ?>

          </div><!--/panel-body-->
      </div><!--/panel-->   
				</div>

			</div>

	</div>



<?php include_once('footer2.php'); ?>