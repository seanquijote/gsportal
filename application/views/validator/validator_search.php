<?php include_once('header2.php');?>

<?php include_once('nav2.php');?>


    <div class="page-content">


	    <div class="row">
			    <div class="col-md-2">
				   <?php include_once('sidebar2.php');?>
			    </div>


  				<div class="col-md-10">

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4><i class="fa fa-search"></i> Search result(s):</h4>
              </div>
              <div class="panel-body">
                <table border="0" style="border-collapse: separate; padding auto; border-spacing: 2px 2px; width: 100%; text-align:left;" >
                <?php if(!empty($list)) {
                  $now = time();
                  $units = 1;
                  
                  foreach($list as $row) {
                    echo '<tr><td rowspan="2"><a href="'.base_url().'validator/search/'.$row->idnumber.'"><img src="'.base_url().'/images/'.$row->picture.'" width="70" height="70" style="border-radius:25px 25px;"></a></td>';
                    echo '<td  style="text-align:left;">Name: <strong>'.$row->firstname.' '.$row->lastname.'</strong></td>';

                    echo '<td class="col-md-6" style="text-align:left;">COEs Uploaded: ';

                    if($row->uploaded_coe == "0"){
                      echo '<span style="color:red; ">'.$row->uploaded_coe.'</span>';
                    } else {
                      echo '<span style="color:green; font-weight:bold;">'.$row->uploaded_coe.'</span>';                      
                    }

                    echo '</td>';

                    echo '</tr>';
                    
                    echo '<tr>';

                    echo '<td style="text-align: left; font-size: 12px;">
                            <a href="'.base_url().'validator/search/'.$row->idnumber.'">
                              <button class="btn btn-success">
                                <i class="glyphicon glyphicon-user" style="font-size:12px;"></i> View full profile
                              </button>
                            </a>
                          </td>';
                    echo '<td  class="col-md-6"  style="text-align:left; vertical-align:top;">COEs Validated: ';

                    if($row->validated_coe == "0"){
                      echo '<span style="color:red; ">'.$row->validated_coe.'</span>';
                    } else {
                      echo '<span style="color:green; font-weight:bold;">'.$row->validated_coe.'</span>';                      
                    }

                    echo '</td>';

                   echo '</tr><tr><td colspan="3"><hr></td></tr>';
                  }
                } else {
                  echo 'None found';
                }
                ?>
                </table>
              </div>
  				  </div>

          </div><!--/col-md-10 -->

			</div><!--/row -->

    </div><!--/page-content -->

<?php include_once('footer2.php'); ?>