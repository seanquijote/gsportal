<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	
			<div class="panel panel-success">
                <div class="panel-heading"><h4>Change Password</h4></div>
					<div class="panel-body">
						
						<?php 
							if(validation_errors()){
						?>
							<i style="color:red"><?php echo validation_errors(); ?></i>
						<?php
							}
						?>
						<form method="post" action="change_pwd" class="form-horizontal">
						<?php
							$csrf = array(
							'name' => $this->security->get_csrf_token_name(),
							'hash' => $this->security->get_csrf_hash()
							);
						?>
						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

							<div class="form-group">
								<label class="control-label col-sm-4">Old Password:</label>
								<div class="col-sm-4">
									<input type="password" name="oldpass" class="form-control form-width">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-sm-4">New Password:</label>
								<div class="col-sm-4">
									<input type="password" name="newpass" class="form-control form-width">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Confirm New Password:</label>
								<div class="col-sm-4">
									<input type="password" name="re_newpass" class="form-control form-width">
								</div>
							</div>
							
		                    <div class="form-group">
		                    	<div class="col-sm-8">
		                    		<button type="submit" class="btn btn-primary pull-right col-sm-2">Update</button>
		                    		<a href="<?php echo base_url('admin'); ?>" class="btn btn-default pull-right" style="margin-right:15px;"><i class="glyphicon glyphicon-arrow-left"></i> Go Back</a>
		                    	</div>
		                    </div>
						</form>
					
					</div><!--/panel-body-->
              </div><!--/panel-->
	</div>
			
</div><!--/panel-->


<?php include_once('footer1.php'); ?>

<script type="text/javascript" >
$(document).ready(function() {

    //------ BROWSER date COMPATIBILITY Code
    if ( $('.compatibleDate')[0].type != 'date') {
      $('.compatibleDate').datepicker({ dateFormat: 'yy-mm-dd' });
    }
   
});
</script>