	<!-- script references 
		https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js
	-->
		<script src="<?= base_url(); ?>assets1/js/jquery.min.js"></script>
		<script src="<?= base_url(); ?>assets2/js/external/jquery/jquery.js"></script>
		<script src="<?= base_url(); ?>assets2/js/jquery-ui.js"></script>	
		<script type="text/javascript" src="<?php echo base_url();?>assets1/js/jQuery.print.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets1/js/bootstrap.min.js"></script>

		<script>
    		$(document).ready(function(){

      			$("#navPwd_List").hover(function(){
          			$(this).css("background-color", "#c64359");
          			$(this).css("color", "#ffffff");
          			$("#navPwd_Link").css("background-color", "#c64359");
          			$("#navPwd_Link").css("color", "#ffffff");
          				}, function(){
          					$(this).css("background-color", "#c64359");
          					$(this).css("color", "#595959");
          					$("#navPwd_Link").css("background-color", "#ffffff");
        					$("#navPwd_Link").css("color", "#595959");
     						});
      			$("#navLogOut_List").hover(function(){
          			$(this).css("background-color", "#c64359");
          			$(this).css("color", "#ffffff");
          			$("#navLogOut_Link").css("background-color", "#c64359");
          			$("#navLogOut_Link").css("color", "#ffffff");
          				}, function(){
          					$(this).css("background-color", "#ffffff");
          					$(this).css("color", "#595959");
          					$("#navLogOut_Link").css("background-color", "#ffffff");
        					$("#navLogOut_Link").css("color", "#595959");
     						});
    		});
		</script>

		<script>
		$("select[name='c1']").change(function() {
			if($(this).val() == "Doctors") {
				$('#doctor').css('display', 'inline-block');
				$('#master').hide();
				$("select[name='c3']").change(function() {
					if($(this).val() == "Doctors1") {
						$('#doctormajor1').css('display', 'inline-block');
						$('#doctormajor2').hide();
					} else {
						$('#doctormajor1').hide();
						$('#doctormajor2').css('display', 'inline-block');
					}
				});
			} else {
			  	$('#doctor').hide();
				$('#master').show();
				$('#doctormajor1').hide();
				$('#doctormajor2').hide();
			}});
		</script>
		
	</body>
</html>
