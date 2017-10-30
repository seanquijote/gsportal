<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>

<!-- Contains the body -->
<div class="container shadow" style="background-color:#ffffff">
<h3>Account Recovery Information</h3>
<hr>
	<div class="col-md-7">
		<div class="panel panel-default shadow">
			<div class="panel-body">

			<?php 
				if(validation_errors()){
			?>
				<i style="color:red;"><?php echo validation_errors(); ?></i>
			<?php
			}
			?>
				<form method="post" action="seq" class="form-horizontal">
			<?php
				$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
				);
			?>
				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

						<div class="form-group">
							<label class="control-label col-sm-4">Security Question:</label>
							<div class="col-sm-7">
								<select id="select-box" name="sq" class="form-control" onchange="newSeqQuestionInput();">
									<option value="What is your first pet's name?">What is your first pet's name?</option>
									<option value="What city you were born in?">What city you were born in?</option>
									<option value="What is your favorite color?">What is your favorite color?</option>
									<option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
									<option value="What is your father's middle name?">What is your father's middle name?</option>
									<option value="What is your favorite past-time?">What is your favorite past-time?</option>
									<option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
									<option value="Who is your favorite actor/actress?">Who is your favorite actor/actress?</option>
									<option value="Who was your childhood hero?">Who was your childhood hero?</option>
									<option value=""> ** Create your own Security Question ** </option>
								</select>
							</div>
						</div>

						<div id="sq-custom-div" class="form-group" style="display:none;">
							<label class="control-label col-sm-4">Own Question:</label>
							<div id="sq-custom-input" class="col-sm-7">
								<input name="sq" type='text' class='form-control' />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-4">Answer:</label>
							<div class="col-sm-7">
								<div class="input-group">
									<input id="seq-ans" type="password" name="answer" class="form-control" required autofocus>
									
									<div class="input-group-btn">
										<a href="#" class="btn btn-default" onclick="toggle_showhide('seq-ans');" id="showhide">Show</a>
									</div>
								</div>
							</div>
						</div>					

						<br>

	                     <div class="form-group">
	                     	<div class="col-sm-11">
	                     		<button type="submit" class="btn btn-primary pull-right col-sm-2">Save</button>
	                     	</div>
	                     </div>
				</form>
			</div>
		</div>
	</div>

<div class="col-md-5">

	<div class="well">
		<strong>Take note:</strong><br><br>
		This is the section where you will set your security question and answer. Should you remember this incase of forgotten password. 
	</div>

</div>

</div>
</div>

<script type="text/javascript">

function swapSeqAnswerInput(inputID, type) {
  var changedInput = document.createElement('input');
  changedInput.id = inputID.id;
  changedInput.type = type;
  changedInput.name = inputID.name;
  changedInput.value = inputID.value;
  changedInput.className = "form-control"; 
  inputID.parentNode.insertBefore(changedInput, inputID);
  inputID.parentNode.removeChild(inputID);
}

function toggle_showhide(target){
    var inputID = document.getElementById(target);
    var buttonID = document.getElementById("showhide");

    if (buttonID.innerHTML == 'Show'){

        swapSeqAnswerInput(inputID, 'text');
        buttonID.innerHTML = 'Hide';

    } else {
        
        swapSeqAnswerInput(inputID, 'password');   
        buttonID.innerHTML = 'Show';

    }
}

function newSeqQuestionInput(){
	var selectBox = document.getElementById("select-box");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    if(selectedValue == ""){
    	//alert("Empty");
		document.getElementById("sq-custom-div").style.display = "block";
	} else {
		document.getElementById("sq-custom-div").style.display = "none";
	}
}



</script>


<?php include_once('footer.php'); ?>	