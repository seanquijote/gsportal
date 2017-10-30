<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
  
  <!-- upper section -->

	

      
	   <div class="row col-md-offset-2">
            <!-- center left-->	
			<div class="col-md-10">
			<div class="panel panel-default" style="background-color:#4f4f4f;">
			  <div class="panel-heading"><h4><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp; Make an Announcement!</h4></div>
				  <div class="panel-body">
					<?php 
						echo form_open('admin/announcement');
						echo form_input('title','','class="form-control" placeholder="-Title-" required');
						echo form_textarea('content','','maxlength="200" class="form-control" style="resize:none; width:100%; background-color:#dddddd" placeholder="-Content goes here-" required');
						echo '<br><button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-edit"></span> Post</button>';
						echo form_close();
					?>
				</div>
              </div>
			</div>
         	<div class="col-md-10">
			<div class="panel panel-default" style="background-color:#4f4f4f;">
                  <div class="panel-heading"><h4>Announcements you have made:</h4></div>
					  <div class="panel-body">
						<hr>
						<?php if(!empty($ranl)) {
							foreach ($ranl as $row) {
								echo form_open('admin/announcement');
								echo form_hidden('delid',$row->announcementID);
								echo '<button onclick="return deleteann('.$row->announcementID.');" class="btn" style="float: right; background-color:#f3f3f3;">x</button>';
								echo form_close();
								echo '<div style="background-color:f3f3f3; border-radius: 1px; padding: 10px; word-break: break-word;">';
								echo '<b><p style="font-size:20px;">'.$row->title.'</p></b>';
								echo 'by: Administrator '.$row->postedBy.' - '.$row->dateAdded.'<hr>';
								echo '<div style="break-word: word-break; width:85%;"><p>'.$row->content.'</p></div></div><hr>';
							}
						} else {
							echo 'No announcements yet.';
						}
						?>
						
					  </div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-->
			
            <!--center-right-->
        	
			
       </div>
  	</div>
    

  


<script>

function deleteann(delann) {
	if(confirm("Are you sure you want to delete this announcement?")) {
		return true;
	} else {
		return false;
	}
}

</script>


<?php include_once('footer1.php'); ?>