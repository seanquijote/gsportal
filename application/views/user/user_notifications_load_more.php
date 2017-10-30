<?php
	if($row->nfStatus != 'reported'){
		if($row->subscription == 'yes') {
			if($row->status == 'unread') {
				
				if($row->nfPostedBy == $idno){
					echo '<a class="btn btn-block btn-info shadow" href="'.base_url('user/newsfeed/'.$row->nfPostedBy.'/'.$row->newsfeedID).'"  style="text-align:left; padding:15px;">';
							echo '<b>[ NEW ] -</b> One of your specific <b>post</b> just got a new comment!';
					echo '</a>';
				} else { 
					echo '<a class="btn btn-block btn-info shadow" href="'.base_url('user/newsfeed/'.$row->nfPostedBy.'/'.$row->newsfeedID).'" style="text-align:left; padding:15px;">';
					echo "<b>[ NEW ] -</b> Someone commented on ".$row->nfPosterName."'s  <b>post</b> that you have followed.";
					echo '</a>';
				}

			} else {
				if($row->idnumber == $idno){
					if($row->nfPostedBy == $idno) {
						echo '<a class="btn btn-block btn-default shadow" href="'.base_url('user/newsfeed/'.$row->nfPostedBy.'/'.$row->newsfeedID).'" style="text-align:left; padding:15px;">';
						echo "<b>[ OLD ] -</b> One of your specific <b>post</b> has no new comments yet.";
						echo '</a>';
					} else {
						echo '<a class="btn btn-block btn-default shadow" href="'.base_url('user/newsfeed/'.$row->nfPostedBy.'/'.$row->newsfeedID).'" style="text-align:left; padding:15px;">';
						echo "<b>[ OLD ] -</b> Someone commented on ".$row->nfPosterName."'s <b>post</b> that you have followed.";
						echo '</a>';
					} 
				}
			}
		} else {
			echo '<a class="btn btn-block btn-danger" href="'.base_url('user/newsfeed/'.$row->nfPostedBy.'/'.$row->newsfeedID).'" style="text-align:left; padding:15px; margin-bottom:5px;">';
			echo "<b>[ UNFOLLOWED ] -</b> You won't get notified by ".$row->nfPosterName."'s <b>post</b> since you unfollowed this specific post. ";
			echo '</a>';
		}
	}

/*
			if($nf_row->status == 'unread') {
				if($all_cert_content['certidnumber'] == $idno) {	
					if($all_cert_content['cert_validated'] == 'yes') {
						echo '<a class="btn btn-block btn-info" href="'.base_url().'certificates/'.$all_cert_content['cert_file'];.'" style="background-color:#337fff; padding:15px;">';
						echo "<b>[ NEW ] -</b> Your Certificate of Employment in <b>".$all_cert_content['cert_title']."</b>  has been <i style='color:green;'>validated</i>!";
						echo '</a>';
					} else { 
						echo '<a class="btn btn-block btn-danger" href="'.base_url().'certificates/'.$all_cert_content['cert_file'];.'" style="background-color:#337fff; padding:15px;">';
						echo "<b>[ NEW ] -</b> Your Certificate of Employment in <b>".$all_cert_content['cert_title']."</b>  has been <i style='color:red;'>invvalidated</i>!";
						echo '</a>';					}
				} 
			} else {
				if($all_cert_content['idnumber'] == $idno){
					if($all_cert_content['certid]number'] == $idno) {
						if($all_cert_content['cert_validated'] == 'yes') {
								echo '<a class="btn btn-block btn-default" href="'.base_url().'certificates/'.$all_cert_content['cert_file'];.'" style="background-color:#337fff; padding:15px;">';
								echo "<b>[ OLD ] -</b> Your Certificate of Employment in <b>".$all_cert_content['cert_title']."</b>  has been <i style='color:green;'>validated</i>!";
								echo '</a>';
							} else {
								echo '<a class="btn btn-block btn-default" href="'.base_url().'certificates/'.$all_cert_content['cert_file'];.'" style="background-color:#337fff; padding:15px;">';
								echo "<b>[ OLD ] -</b> Your Certificate of Employment in <b>".$all_cert_content['cert_title']."</b>  has been <i style='color:red;'>invalidated</i>!";
								echo '</a>';
							}
						} 
					}	
			}
*/
?>