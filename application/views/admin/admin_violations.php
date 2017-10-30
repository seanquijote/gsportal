<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
	
    <div class="col-sm-10 col-md-offset-1">
	   <div class="row">
			<div class="panel panel-danger">
			  <div class="panel-heading"><h4><i class="fa fa-ban" aria-hidden="true"></i>&nbsp; Reported Posts</h4></div>
				<div class="panel-body">
				<?php
				if(!empty($list)){
					echo '<table class="table">
					<th>ID Number</th>
					<th>Name</th>
					<th>Content</th>
					<th>Reporter</th>
					<th>Action</th>';
					foreach($list as $row){
						echo '<tr><td>'.form_open('admin/violations').form_hidden('id',$row->newsfeedID).form_hidden('idno',$row->nfPostedBy).'<a style="text-decoration:none;" href="'.base_url('admin/search/'.$row->nfPostedBy).'">'.$row->nfPostedBy.'</td><td>'
						.$row->nfPosterName.'</td><td>'
						.strip_tags($row->nfContent).'</td><td><a style="text-decoration:none;" href="'.base_url('admin/search/'.$row->nfReportedBy).'">'.$row->nfReportedBy.'</a></td><td>
						<input type="submit" style="border:none; " class="btn btn-primary" name="retain" value="Retain"> <input type="submit" style="border:none;" class="btn btn-danger" name="delete" value="Violated"></td></tr>'.form_close();
					}
					echo '</table>';
				} else {
					echo 'None at the moment.';
				}
				?>
		</div><!--/panel-body-->
	  </div><!--/panel-->
	</div><!--/col-->
  </div><!--/row-->
  <!-- /upper section -->
  
</div><!--/container-->
<!-- /Main -->

<?php include_once('footer1.php'); ?>