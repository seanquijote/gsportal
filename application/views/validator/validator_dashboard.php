<?php include_once('header2.php');?>

<?php include_once('nav2.php');?>


    <div class="page-content">


	    	<div class="row">
			  <div class="col-md-2">
				<?php include_once('sidebar2.php');?>
			  </div>

				<div class="col-md-10">

					<div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 style="font-weight:bold:"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</h4>
                </div>
                <div class="panel-body">

                <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-warning">
                              <?php 
                                  echo '<span style="font-size:19px;">
                                          Total number of COEs uploaded:&nbsp; 
                                        </span><span style="font-size:26px; font-weight:bold; color:green;"> [ '.$total_cert.' ]</span>'; 
                              ?>
                      </div>
                      
                  </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                                <?php 
                                    echo '<span style="font-size:20px;">
                                            Total number of COEs validated:&nbsp; 
                                          </span><span style="font-size:26px; font-weight:bold; color:green;"> [ '.$total_cert_validated.' ]</span>'; 
                                ?>
                        </div>

                      <div style="height: 300px; width: 100%;" id="certvalidatedcount">
                      </div>
                    </div>
                </div>
                <hr>

                  <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                                <?php 
                                    echo '<span style="font-size:19px;">
                                            Total number of graduates who uploaded their COE:&nbsp; 
                                          </span><span style="font-size:26px; font-weight:bold; color:green;"> [ '.$total_cert_upload.' ]</span>'; 
                                ?>
                        </div>

                        <div style="height: 300px; width: 100%;" id="certuploadcount">
                        </div>
                    </div>  
                  </div>
                    

                </div>
              </div><!-- /panel pane-default -->
            </div>
          </div>

					<br><br>
				</div><!--/col-md-10 -->

			</div>

	</div>

<script type="text/javascript">
  window.onload = function () {

   var chart1 = new CanvasJS.Chart("certuploadcount",
    {
      title:{
        text: ""    
      },
      animationEnabled: true,
      axisY: {
        title: "Number of Graduates"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme3",
      data: [

      {        
        type: "column",
        dataPoints: [      
              <?php 
                        echo '{y: '.$total_cert_upload.', label: "Graduates who uploaded"},';
    
                        echo '{y: '.$no_cert_upload.', label: "Graduates who did not yet upload"},';
                    
              ?>


        ]

      }   
      ]
    });

    chart1.render();

   var chart2 = new CanvasJS.Chart("certvalidatedcount",
    {
      title:{
        text: ""    
      },
      animationEnabled: true,
      axisY: {
        title: "Number of COEs"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme3",
      data: [

      {        
        type: "column",
        dataPoints: [      
              <?php 
                        echo '{y: '.$total_cert_validated.', label: "Validated COEs"},';
    
                        echo '{y: '.$total_cert_invalidated.', label: "Non-validated COEs"},';
                    
              ?>


        ]

      }   
      ]
    });

    chart2.render();
  }

</script>


<script type="text/javascript" src="<?php echo base_url();?>assets1/js/canvasjs.min.js"></script>

<?php include_once('footer2.php'); ?>