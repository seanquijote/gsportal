<?php include_once('header.php'); ?>

<div id="wrap">

<header class="navbar navbar-bright navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-education" style="font-size:20px;"></span>&nbsp;&nbsp;<b>Graduate's Tracer Survey</b></a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
	  <ul class="nav navbar-right navbar-nav">
		<li><a><img src="<?php echo base_url().'images/'.$picture; ?>" width="20" height="20" style="border-radius: 10px;"><?php echo ' '.$firstname;?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-triangle-bottom" style="font-size:10px; padding:5px;"></span></a>
          <ul class="dropdown-menu">
			<a href="<?php echo base_url().'user/logout'; ?>"><li style="font-size: 12px; color: black;" class="btn pull-right">Logout</li></a>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</header>
<!-- Contains the body -->
<div class="container">
  <!-- upper section -->
  <div class="row" style="background-color:#fff">
  <div style="width:70%; margin:auto;">
       <h3><i class="glyphicon"></i> Welcome <?php echo $firstname . ' !' ?></h3>  
         
       <hr>
            <!-- center left-->	
			<div class="panel panel-default">
                  <div class="panel-heading"><h4>Information Survey</h4></div>
					  <div class="panel-body">
						
						<p>Please answer this survey honestly according to the fields provided.<br><br><small><i>Note: Fields with <b style="color:red">**</b> are required</i></small><br><br>
						</p>
					<?php 
					if(validation_errors()){
					?>
						<strong><?php echo validation_errors(); ?></strong><br>
						<?php
					}
					?>
					<?php
					echo form_open('user/survey',array("onsubmit"=>"this.style.display = 'none'"));
							if(!empty($info)) {
								foreach($info as $row) {
									echo form_label('YEAR : '.$row->year);
								}
							}
							echo '<hr>'.form_label('DEGREE <b style="color:red">**</b>');
							echo '<br><label><input class="master" type="checkbox" name="degmanswer" value="47"> MASTER</label>';
							echo '<br><label><input class="doctor" type="checkbox" name="degdanswer" value="48"> DOCTOR</label>';
							
							echo '<div id="master" style="display:none"><hr><label><u>MASTER DEGREE <b style="color:red">**</b></u></label>';
							
							echo '<br><label><input type="checkbox" name="manswer[]" value="MAVED"> MAVED - Master of Arts in Vocational Education</label>';
							
							echo '<br><br><label>MA. Ed. - Master of Arts in Education</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MA. Ed. - Major in English"> English</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MA. Ed. - Major in Filipino"> Filipino</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MA. Ed. - Major in School Supervision and Administration"> School Supervision and Administration</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MA. Ed. - Major in Teaching Biology"> Teaching Biology</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MA. Ed. - Major in Teaching Chemistry"> Teaching Chemistry</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MA. Ed. - Major in Teaching Physics"> Teaching Physics</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MA. Ed. - Major in Teaching Science"> Teaching Science</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MA. Ed. - Major in English Language Teaching"> English Language Teaching</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MA. Ed. - Major in Teaching Math"> Teaching Math</label><br>';
							
							echo '<br><label><input type="checkbox" name="manswer[]" value="M. Ed - with Thesis"> M. Ed - Master in Education Thesis</label>';
							echo '<br><label><input type="checkbox" name="manswer[]" value="M. Ed - Non-thesis"> M. Ed - Master in Education Non-thesis</label><br>';
							
							echo '<br><label><input type="checkbox" name="manswer[]" value="M.P.A - with Thesis"> M.P.A - Master in Public Administration Thesis</label>';
							echo '<br><label><input type="checkbox" name="manswer[]" value="M.P.A - Non-thesis"> M.P.A - Master in Public Administration Non-thesis</label><br>';
							
							
							echo '<br><label><input type="checkbox" name="manswer[]" value="MSIT"> MSIT - Master of Science in Industrial Technology</label><br>';
							
							
							echo '<br><label><input type="checkbox" name="manswer[]" value="MET"> MET - Master of Engineering Technology</label><br>';
							
							
							echo '<br><label>MTE - Master in Technician Education</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MTE - Major in Automotive Technology"> Automotive Technology</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MTE - Major in Drafting Technology"> Drafting Technology</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MTE - Major in Electrical Technology"> Electrical Technology</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MTE - Major in Electronics Technology"> Electronics Technology</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="manswer[]" value="MTE - Major in Machine Shop Technology"> Machine Shop Technology</label><br>';
							
							echo '<br><label><input type="checkbox" name="manswer[]" value="MS Agri"> MS Agri - Master of Science in Agriculture</label><br>';
							
							
							echo '</div>';
							
							echo '<div id="doctor" style="display:none"><hr><label><u>DOCTORATE DEGREE <b style="color:red">**</b></u></label>';
							
							echo '<br><br><label>Dev. Ed. D - Doctor in Development Education</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in English"> English</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in Filipino"> Filipino</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in Mathematics"> Mathematics</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in Statistics"> Statistics</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in Physical Education"> Physical Education</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in Special Education"> Special Education</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in General Science"> General Science</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in Biology"> Biology</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in Biotech"> Biotech</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in Chemistry"> Chemistry</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in Physics"> Physics</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Dev. Ed. D - Major in Guidance and Counselling"> Guidance and Counselling</label><br>';
							
							echo '<br><label>Ph. D. TM. - Doctor of Philosophy in Technology Management</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Language Teaching"> Language Teaching</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Maritime Education and Engineering Technology"> Maritime Education and Engineering Technology</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Special Education"> Special Education</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Public Health Management"> Public Health Management</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Library Science Management"> Library Science Management</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Hotel Restaurant Service Tourism Technology"> Hotel Restaurant Service Tourism Technology</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Information and Communication Technology"> Information and Communication Technology</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Agriculture Technology Management"> Agriculture Technology Management</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Fishery Technology Management"> Fishery Technology Management</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Technology Education"> Technology Education</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Industrial Technology"> Industrial Technology</label>';
							echo '<br>&nbsp;&nbsp;<label><input type="checkbox" name="danswer[]" value="Ph. D. TM. - Major in Engineering Technology"> Engineering Technology</label><br>';
							
							echo '<br><label><input type="checkbox" name="danswer[]" value="DPA"> DPA - Doctor in Public Administration</label><br>';
							
							
							echo '</div>';
							
							
							echo '<hr><input type="hidden" name="question[1]" value="1">';
							echo '<label>Have you been employed immediateley 6 months or less after graduation? <b style="color:red">**</b></label>
								    <br>
									<div class="radio">
									  <label><input type="radio" name="answer[1]" value="1" required>Yes</label>
									</div>
									<div class="radio">
  									  <label><input type="radio" name="answer[1]"  value="2" required>No</label>
									</div>
									<br><br>';

							echo '<label>Was your first job related to the course you took up in college? <b style="color:red">**</b></label>
								    <br>
								    <input type="hidden" name="question[2]" value="2">
									<div class="radio">
									  <label><input type="radio" name="answer[2]" value="3" required>Yes</label>
									</div>
									<div class="radio">
  									  <label><input type="radio" name="answer[2]" value="4" required>No</label>
									</div>
									<br><br>';
									$firstjob = array(
										'5' => 'Classified Ads',
										'6' => 'Walk-in',
										'7' => 'CTU Job Fair',
										'8' => 'Absorbed from the On-the-Job (OJT) Training',
										'9' => 'Information from friends'
										);
							echo '<label>How did you find your first job? <b style="color:red">**</b></label><input type="hidden" name="question[3]" value="3">';

							echo form_dropdown('answer[3]',$firstjob,'','class="form-control" required').'<br><br>';
							
							echo '<input type="hidden" name="question[4]" value="4">';
							echo '<label>Have you been promoted in your position after graduation? <b style="color:red">**</b></label>
								    <br>
									<div class="radio">
									  <label><input type="radio" name="answer[4]" value="10" required>Yes</label>
									</div>
									<div class="radio">
  									  <label><input type="radio" name="answer[4]"  value="11" required>No</label>
									</div>
									<br><br>';
									
									
									$line = array(
										'12' => 'Industry',
										'13' => 'Academe',
										'14' => 'None',
										);
										
							echo '<input type="hidden" name="question[5]" value="5">';
							echo '<label>What is your line of work? <b style="color:red">**</b></label>';

							echo form_dropdown('answer[5]',$line,'','class="form-control" required').'<br><hr>';

							echo '<input type="submit" value="Next &nbsp; &#8594" class="btn btn-info btn-block" />';

										
					echo form_close();
					?>
					</div>
					</div><!--/panel-body--> 
  	</div><!--/col-span-9-->
  </div><!--/row-->
  <!-- /upper section -->
</div>
	
</div>

<?php include_once('footer.php'); ?>