<?php include_once('header.php'); ?>

<div id="wrap">
    <?php include_once('nav.php'); ?>
        <div class="container">
            <?php include_once('sidebar.php'); ?>
            
            <div class="col-md-8" style="margin-left:310px; margin-top:2px;">
                <div class="login-form" style="height:250px; padding-top:10%;  background: url(<?php echo base_url();?>images/56.jpg) no-repeat center; background-size:cover;">
                    <p style="text-align:center; font-size:4em; color:white;">Announcements</p>
                    <hr class="small">
                </div>
            
                <div class="panel panel-default" style="background:transparent;">
                    <div class="panel-body">
        		  	   <div id="results"></div>
                    </div>
                </div>
            </div>

<!--
*  ............ UPDATE .............
*  TITLE: COE Modal
*  DESCRIPTION: A Modal for uploading their COE will display once the Modal button in the Sidebar (sidebar.php)
*   is clicked. 
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
<!-- _____________________________________________________________ -->

        </div>

<script src="<?php echo base_url();?>assets2/scrolljs/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	
var total_record = 0;
var total_groups = <?php echo $total_data; ?>;

$('#results').load("<?php echo base_url();?>user/load_more", {'group_no':total_record}, function() {total_record++;});

$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
            loading = true; 
            $('.loader_image').show(); 
            $.post('<?php echo base_url();?>user/load_more',{'group_no': total_record},
            function(data2){ 
                if (data2 != "") {                               
                    $("#results").append(data2);
                    $('.loader_image').hide();              
                    total_record++;
                }
            });     
        }
    }
});

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