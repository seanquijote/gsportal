 <?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>
<div class="container">
<?php include_once('sidebar.php'); ?>
         
<div class="col-md-8" style="margin-left:310px; margin-top:2px;">
	<div class="panel panel-default" style="background:transparent;">
		
		<div class="panel-body">
		<div class="shadow" id="posts" style="background-color:white; padding:10px; padding-top:10px; padding-bottom:30px;">
			<h4>Share something:</h4>

<!-- .......................NEWSFEED POST FORM................... -->

<?php echo form_open('user/newsfeed') ; ?>
	<textarea name="newsfeed" id="post_txtarea" id="myForm" maxlength="200" width="100%" class="form-control" id="content" placeholder="What's new, <?php echo $firstname ?>?" onkeypress="charcount()" required autofocus></textarea>
	<br>
	<button class="btn btn-primary" type="submit" onclick="this.style.display = 'none'; getElementById('post-loading').style.display = 'inline'" class="button" style="float:right;"><span class="glyphicon glyphicon-edit"></span> Post</button>
  <a href="<?php echo base_url('user/newsfeed'); ?>" id="post-loading" class="btn btn-primary" style="display:none; float:right;"><span class="glyphicon glyphicon-edit"></span> Post</a>

	<span id="charcounter" class="help-block" style="margin-top:7px; margin-right:10px; float:right; color:#bbbbbb; font-size:14px;">Characters left: 200</span>
	<br>
	</div>
<?php echo form_close(); ?>
<hr>

<!--
*  ............ UPDATE ______________
*  TITLE: COE Modal
*  DESCRIPTION: A Modal for uploading their COE will display once the 
*   Modal button in the Sidebar (sidebar.php) is clicked. 
*  BY: Sean Quijote
*  DATE: 7/16/2017
*
-->

<!-- UPLOAD CERTIFICATE OF EMPLOYMENT Modal -->
            <div id="UploadCertModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload your Certificate of Employment</h4>
                  </div>
                  <div class="modal-body">
                    <?php
                        echo '<div style="padding:20px;">';
                        echo form_open_multipart('user/uploading_certificate', array('style'=>'text-align:center'));
                        echo form_hidden('idno',$idno).
                        '<div class="input-group">
                             <label class="input-group-btn">
                                 <span class="btn btn-primary">
                                     <i class="fa fa-folder-open" aria-hidden="true"></i> Choose your file&hellip; <input type="file" name="userfile" style="display: none;">
                                 </span>
                             </label>
                             <input type="text" class="form-control"readonly>
                        </div>
                        <span class="help-block" style="float:left;">
                            It must be in a &nbsp;<i class="fa fa-file-pdf-o" aria-hidden="true"></i> <strong>PDF</strong> file format.
                        </span>
                        <br><br><button type="submit" value="Upload" class="btn btn-success"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>'.
                        form_close();
                        echo '</div>';
                    ?>
                  </div>
                </div>

              </div>
            </div>
            
<!-- ____________________________________________________________________________ -->


			<?php 
			if(empty($list2)) {
				echo '<div class="shadow" style="background-color:#ffffff;padding-bottom:15px; text-align:center; margin-bottom:10px;">';
				echo "<br><h2>Oh no!</h2><br>The newsfeed is empty!<br><br>Why don't you try and break the ice and let other's see what you are up to!</div>";
			} else {
				echo '<div id="results1"></div>';
			}
			?>
		</div>
	</div>

</div>

</div>

</div>


<script type="text/javascript" language="javascript">

function charcount() {		
	document.getElementById('post_txtarea').onkeyup = function () {
	document.getElementById('charcounter').innerHTML = "Characters left: " + (200 - this.value.length);
	};
}

function editform(id,id1){
	document.getElementById(id).style.display="block";
	document.getElementById(id1).style.display="none";
}

function cancelEform(id,id1){	
	document.getElementById(id).style.display="none";
	document.getElementById(id1).style.display="block";
}

function deletenf(nfdel,nfdelid) {
	if(confirm("Are you sure you want to delete this post?")) {
		return true;
	} else {
		return false;
	}
}

function deletenfc(nfcdel) {
	if(confirm("Are you sure you want to delete this comment?")) {
		return true;
	} else {
		return false;
	}
}


</script>

<script src="<?php echo base_url();?>assets2/scrolljs/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	
var total_record = 0;
var total_groups = <?php echo $total_data; ?>;

$('#results1').load("<?php echo base_url();?>user/nf_load_more", {'group_no1':total_record}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
            loading = true; 
            $('.loader_image').show(); 
            $.post('<?php echo base_url();?>user/nf_load_more',{'group_no1': total_record},
            function(data1){ 
                if (data1 != "") {                               
                    $("#results1").append(data1);                 
                    $('.loader_image').hide();
                    total_record++;
                }
            });     
        }
    }
});
});
</script>
<script src="<?php echo base_url();?>assets2/scrolljs/jquery.min.js"></script>
<script type="text/javascript">
	var fixed = $('#posts').offset().top;
$(window).scroll(function() {
    var currentScroll = $(window).scrollTop();
    if (currentScroll >= fixed) {
        $('#posts').css({
            position: 'relative',
            top: '0',


        });
    } else {
        $('#posts').css({
            position: 'relative'
        });
    }
});

</script>


<script type="text/javascript">

$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
</script>


<?php include_once('footer.php'); ?>