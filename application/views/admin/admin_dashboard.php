<?php include_once('header1.php');?>

<?php include_once('nav1.php');?>

<style>

/* Float Shadow */
.hvr-float-shadow {
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px transparent;
  position: relative;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform;
  transition-property: transform;
}
.hvr-float-shadow:before {
  pointer-events: none;
  position: absolute;
  z-index: -1;
  content: '';
  top: 100%;
  left: 5%;
  height: 10px;
  width: 90%;
  opacity: 0;
  background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.35) 0%, transparent 80%);
  background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.35) 0%, transparent 80%);
  /* W3C */
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform, opacity;
  transition-property: transform, opacity;
}
.hvr-float-shadow:hover, .hvr-float-shadow:focus, .hvr-float-shadow:active {
  -webkit-transform: translateY(-5px);
  transform: translateY(-5px);
  /* move the element up by 5px */
}
.hvr-float-shadow:hover:before, .hvr-float-shadow:focus:before, .hvr-float-shadow:active:before {
  opacity: 1;
  -webkit-transform: translateY(5px);
  transform: translateY(5px);
  /* move the element down by 5px (it will stay in place because it's attached to the element that also moves up 5px) */
}

</style>
  
  <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line"><i class="fa fa-dashboard" aria-hidden="true"></i>&nbsp; Dashboard</h4>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        This is your dashboard page you can register, search users and post announcement(s).
                    </div>
                </div>
            </div>


            <div class="row">
                 <div class="col-md-3 col-sm-3 col-xs-6">
                  <div class="hvr-float-shadow">
                    <a href="<?php echo base_url().'admin/register';?>" style="text-decoration:none;">
                      <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-user dashboard-div-icon"></i>
                        <h5 style="color:white;">Register User</h5></a>
                      </div>
                    </a>
                  </div>
                </div>

                 <div class="col-md-3 col-sm-3 col-xs-6">
                  <div class="hvr-float-shadow">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <a href="<?php echo base_url().'admin/search';?>" style="text-decoration:none;">
                        <i  class="fa fa-search dashboard-div-icon" ></i>
                        <h5 style="color:white;">Search User </h5></a>
                    </div>
                 </div>
                </div>

                 <div class="col-md-3 col-sm-3 col-xs-6">
                  <div class="hvr-float-shadow">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <a href="<?php echo base_url().'admin/announcement';?>" style="text-decoration:none;">
                        <i  class="fa fa-edit dashboard-div-icon" ></i>
                        <h5 style="color:white;">Post Announcement(s) </h5></a>
                    </div>
                  </div>
                </div>
           
                 <div class="col-md-3 col-sm-3 col-xs-6">
                  <div class="hvr-float-shadow">                 
                     <div class="dashboard-div-wrapper bk-clr-four">
                        <a href="<?php echo base_url().'admin/report';?>" style="text-decoration:none;">
                        <i  class="fa fa-bar-chart dashboard-div-icon" ></i>
                        <h5 style="color:white;">Reports </h5></a>
                    </div>
                  </div>
                </div>
            </div>

<!-- Main -->
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-info" style="padding:40px;">
            <?php 
            echo '<span style="font-size:28px;">Total number of graduates/users registered in the system:&nbsp;  </span><span style="color:green; font-size:34px;"><b> [ '.$utotal.' ]</b></span>';
            ?>
    </div>
  </div>
  <div class="col-md-12">
      <div style="height: 300px; width: 100%;" id="usercount">
      </div>
  </div>
</div>

<hr>


<div class="row">
  <div class="col-md-12">
    <div class="alert alert-warning" style="padding:40px;">
      <?php 
          echo '<span style="font-size:28px;">
                  Total number of COEs uploaded: 
                </span><span style="font-size:34px; font-weight:bold; color:green;"> [ '.$total_cert.' ]</span>'; 
      ?>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="col-md-6">
    <div class="alert alert-info">
            <?php 
              echo '<span style="font-size:20px;">
                      Number of graduates who uploaded their COE: 
                    </span><span style="font-size:30px; font-weight:bold; color:green;"> [ '.$total_cert_upload.' ]</span>'; 
            
            ?>
    </div>
  </div>

  <div class="col-md-6">
    <div class="alert alert-info">
            <?php 
                echo '<span style="font-size:24px;">
                        Number of COEs validated: 
                      </span><span style="font-size:30px; font-weight:bold; color:green;"> [ '.$total_cert_validated.' ]</span>'; 
            
            ?>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div style="height: 300px; width: 100%;" id="certuploadcount">
      </div>
  </div>

  <div class="col-md-6">
      <div style="height: 300px; width: 100%;" id="certvalidatedcount">
      </div>
  </div>
</div>

       </div><!--/container-->
    </div><!--/content-wrapper-->
    

<script type="text/javascript">
  window.onload = function () {
    var chart1 = new CanvasJS.Chart("usercount",
    {
      title:{
        text: "User Count"    
      },
      animationEnabled: true,
      axisY: {
        title: "Graduates per year"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme3",
      data: [

      {        
        type: "column",  
        showInLegend: true, 
        legendMarkerColor: "grey",
        legendText: "Years",
        dataPoints: [      
              <?php if(!empty($datayear)) {
              foreach ($datayear as $row) {
                echo '{y: '.$row->total.', label: "'.$row->yeargraduated.'"},';
              }
            }
            ?>
        ]
      }   
      ]
    });

    chart1.render();

   var chart2 = new CanvasJS.Chart("certuploadcount",
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
    
                        echo '{y: '.$no_cert_upload.', label: "Graduest who did NOT yet upload"},';
                    
              ?>


        ]

      }   
      ]
    });

    chart2.render();

   var chart3 = new CanvasJS.Chart("certvalidatedcount",
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

    chart3.render();

  }

</script>


<script type="text/javascript" src="<?php echo base_url();?>assets1/js/canvasjs.min.js"></script>

<?php include_once('footer1.php'); ?>