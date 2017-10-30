<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class search_model extends CI_Model {
	
	public function getList() {
		$this->db->from('users u');
		$this->db->join('emphistory m','u.idnumber=m.idnumber','left');
		$this->db->join('credentials z','u.idnumber=z.idnumber','left');
		$this->db->join('courses c','u.courseID=c.courseID','left');
		$this->db->join('years y','y.yearID=u.yearID','left');
		$this->db->where('z.roleID',1);
		
		$query = $this->db->get();
		if($query->num_rows() >0) {
			return $query->result();
		}
	}
	
	public function getUser() {
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];
		$select = array(
                'sex', 'dob', 'civilstatus',
				'address', 'c.course AS course', 'yeargraduated AS year',
				'contactnumber', 'email'
				);
		$this->db->select($select);
		$this->db->from('users u');
		$this->db->join('credentials z','u.idnumber = z.idnumber','left');
		$this->db->join('courses c','u.courseID = c.courseID','left');
		$this->db->join('years y','y.yearID = u.yearID','left');
		$this->db->where('z.roleID',1);
		$this->db->where('u.idnumber',$idno);
		
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function getSpecifiedList($search) {
		$this->db->from('users u');
		$this->db->join('credentials z','u.idnumber=z.idnumber','left');
		$this->db->join('courses c','u.courseID=c.courseID','left');
		$this->db->where('z.roleID',1);
		$this->db->group_start();
		$this->db->where('u.idnumber',$search);
		$this->db->or_like('firstname',$search);
		$this->db->or_like('lastname',$search);
		$this->db->or_like("CONCAT(firstname,' ',lastname)",$search);
		$this->db->group_end();
		
		$query = $this->db->get();
		if($query->num_rows() >0) {
			return $query->result();
		}
	}

	public function getSpecifiedValidatorList($search) {
		$this->db->from('users u');
		$this->db->join('credentials z','u.idnumber=z.idnumber','left');
		$this->db->where('z.roleID',3);
		$this->db->group_start();
		$this->db->where('u.idnumber',$search);
		$this->db->or_like('firstname',$search);
		$this->db->or_like('lastname',$search);
		$this->db->or_like("CONCAT(firstname,' ',lastname)",$search);
		$this->db->group_end();
		
		$query = $this->db->get();
		if($query->num_rows() >0) {
			return $query->result();
		}
	}
	
	public function getSpecifiedUser($id) {
		$select = array(
				'firstname', 'lastname', 'picture',
				'sex', 'dob', 'civilstatus', 'lastupdate',
				'address', 'c.course AS course', 'yeargraduated AS year',
				'contactnumber', 'email', 'u.idnumber', 'userstatus', 'uploaded_coe'
				);
		$this->db->select($select);
		$this->db->from('users u');
		$this->db->join('credentials z','u.idnumber=z.idnumber','left');
		$this->db->join('courses c','u.courseID=c.courseID','left');
		$this->db->join('years y','y.yearID=u.yearID','left');
		$this->db->where('z.roleID',1);
		$this->db->where('u.idnumber',$id);
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}



	public function getCurrentWork(){
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];
		$select = array(
					'empPosition','empCompName', 'empCompAddr',
					'empStartDate', 'empEndDate', 'empID',
					'empHide'
				);
		$this->db->select($select);
		$this->db->from('emphistory m');
		$this->db->join('users u','u.idnumber = m.idnumber','left');
		$this->db->where('m.idnumber',$idno);
		$this->db->order_by('empEndDate', 'ASC');
		$this->db->limit(1);

		$query = $this->db->get();
			if($query->num_rows() > 0) {
				return $query->result();
			} else {
		}
	}
	
	public function getEmpHistory(){
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];
		$select = array(
					'empPosition','empCompName', 'empCompAddr',
					'empStartDate', 'empEndDate', 'empID',
					'empHide'
				);
		$this->db->select($select);
		$this->db->from('emphistory m');
		$this->db->join('users u','m.idnumber=u.idnumber','left');
		$this->db->where('m.idnumber',$idno);
		$this->db->order_by('empEndDate', 'DESC');

		$query = $this->db->get();
			if($query->num_rows() > 0) {
				return $query->result();
			} else {
		}
	}

	public function getSpecifiedCurrentWork($id){
		$select = array(
					'empPosition','empCompName', 'empCompAddr',
					'empStartDate', 'empEndDate', 'empID',
					'empHide'
				);
		$this->db->select($select);
		$this->db->from('emphistory m');
		$this->db->join('users u','u.idnumber = m.idnumber','left');
		$this->db->where('m.idnumber',$id);
		$this->db->order_by('empEndDate', 'ASC');
		$this->db->limit(1);

		$query = $this->db->get();
			if($query->num_rows() > 0) {
				return $query->result();
			} else {
		}
	}

	public function getSpecifiedEmpHistory($id) {
		$select = array(
					'empPosition','empCompName', 'empCompAddr',
					'empStartDate', 'empEndDate', 'empID',
					'empHide'
				);
		$this->db->select($select);
		$this->db->from('emphistory m');
		$this->db->join('users u','m.idnumber = u.idnumber','left');
		$this->db->where('m.idnumber',$id);
		$this->db->order_by('empEndDate', 'DESC');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}


	public function getAll() {
		$this->db->from('users u');
		$this->db->join('credentials z','u.idnumber=z.idnumber','left');
		$this->db->join('courses c','u.courseID=c.courseID','left');
		$this->db->where('z.roleID',1);
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function countNotif() {
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];
		
		$select = array('notificationID', 'count(*) as total');
		
		$this->db->select($select);
		$this->db->from('newsfeed n');
		$this->db->join('notifications nn','n.newsfeedID=nn.newsfeedID','left');
		$this->db->where('nn.idnumber',$idno);
		$this->db->where('subscription','yes');
		$this->db->where('status','unread');
		$this->db->group_start();
		$this->db->where('nfStatus !=','reported');
		$this->db->or_where('nfStatus IS NULL');
		$this->db->group_end();
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function getNotif() {
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];
		$this->db->select('*');
		$this->db->from('newsfeed n');
		$this->db->join('notifications nn','n.newsfeedID=nn.newsfeedID','left');
		$this->db->where('nn.idnumber',$idno);
		$this->db->order_by('updated', 'DESC');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function getNewsFeed() {
		$select =  array(
                'nfPostedBy', 'nfPosterName', 'nfContent',
                'nfDateAdded', 'nfUpdated', 'nfEdited',
				'newsfeedID', 'u.picture'
            );
		$this->db->select($select);
		$this->db->from('newsfeed n');
		$this->db->join('users u','u.idnumber=n.nfPostedBy','left');
		$this->db->order_by('nfUpdated', 'DESC');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function getNFV() {
		$select =  array(
                'newsfeedID', 'nfPostedBy', 'nfPosterName', 'nfContent', 'nfReportedBy'
            );
		$this->db->select($select);
		$this->db->where('nfStatus','reported');
		$this->db->from('newsfeed');
		$this->db->order_by('nfPostedBy','ASC');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function getSpecificPost($id,$id1) {
		$select =  array(
                'nfPostedBy', 'nfPosterName', 'nfContent',
                'nfDateAdded', 'nfUpdated', 'nfEdited',
				'newsfeedID', 'u.picture', 'nfStatus', 'userstatus'
            );
		$this->db->select($select);
		$this->db->from('newsfeed n');
		$this->db->join('users u','u.idnumber=n.nfPostedBy','left');
		$this->db->where('nfPostedBy',$id);
		$this->db->where('newsfeedID',$id1);
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function countNewsFeed() {
		$select = array(
			'COUNT(*) as tola_records'
		);
		$this->db->select($select);
		$this->db->from('newsfeed');
		$query = $this->db->get();
		
		if($query->num_rows()>0) {
			return $query->row()->tola_records;
		}
	}
	
	public function getNewsfeedInf($start,$content_per_page) {		
		$sql = "SELECT `nfPostedBy`, `nfPosterName`, `nfContent`,
                `nfDateAdded`, `nfUpdated`,
				`newsfeedID`, `picture`,
				`nfEdited`,`nfStatus`,`userstatus`
				FROM newsfeed n LEFT JOIN users u ON u.idnumber=n.nfPostedBy ORDER BY `nfUpdated` DESC LIMIT $start,$content_per_page";
        $result = $this->db->query($sql)->result();
        return $result;
	}
	
	public function getSpecNewsfeedInf($start,$content_per_page,$id) {		
		$sql = "SELECT `nfPostedBy`, `nfPosterName`, `nfContent`,
                `nfDateAdded`, `nfUpdated`,
				`newsfeedID`, `picture`,
				`nfEdited`,`nfStatus`,`userstatus`
				FROM newsfeed n LEFT JOIN users u ON u.idnumber=n.nfPostedBy WHERE nfPostedBy='$id' ORDER BY `nfUpdated` DESC LIMIT $start,$content_per_page";
        $result = $this->db->query($sql)->result();
        return $result;
	}
	
	public function getNotifsInf($start,$content_per_page,$idno) {		
		$sql = "SELECT * FROM notifications n LEFT JOIN newsfeed f ON n.newsfeedID=f.newsfeedID WHERE n.idnumber='$idno' ORDER BY updated DESC LIMIT $start,$content_per_page";
        $result = $this->db->query($sql)->result();
        return $result;
	}
	
	public function getSpecificNewsfeed($id) {
		$this->db->where('nfPostedBy',$id);
		$this->db->from('newsfeed');
		
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function getComments() {
		$select = array(
			'nfCommentID', 'm.newsfeedID', 'nfCommentedBy',
			'nfCommentorName', 'nfCommentContent', 'nfTime',
			'u.picture'
		);
		$this->db->select($select);
		$this->db->from('nfcomments m');
		$this->db->join('newsfeed n','m.newsfeedID=n.newsfeedID','left');
		$this->db->join('users u','u.idnumber=m.nfCommentedBy','left');
		$this->db->order_by('nfTime','ASC');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function getShoutOut() {
		$this->db->from('newsfeed');
		$this->db->order_by('nfUpdated', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function getAnnouncementCount() {
		$select = array(
			'COUNT(*) as tol_records'
		);
		$this->db->select($select);
		$this->db->from('announcements');
		$query = $this->db->get();
		
		if($query->num_rows()>0) {
			return $query->row()->tol_records;
		}
	}
	
	public function getAnnouncementInf($start,$content_per_page) {		
		$sql = "SELECT * FROM  announcements ORDER BY `dateAdded` DESC LIMIT $start,$content_per_page";
        $result = $this->db->query($sql)->result();
        return $result;
	}
	
	public function gaNoLimit() {
		$this->db->from('announcements');
		$this->db->order_by('dateAdded', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function getCategoryList() {
		$c1 = $this->input->get('c1');
		$c2 = $this->input->get('c2');
		
		if($c2 == 'all' && $c1 == 'all') {
			$this->db->from('users u');
			$this->db->join('empcertificates f','u.idnumber=f.idnumber','left');
			$this->db->join('credentials z','u.idnumber=z.idnumber','left');
			$this->db->join('courses c','u.courseID=c.courseID','left');
			$this->db->join('years y','y.yearID=u.yearID','left');
			$this->db->where('z.roleID',1);
			$this->db->group_by('u.idnumber');
			$this->db->order_by('u.lastname');
			
			$query = $this->db->get();
			if($query->num_rows()>0) {
				return $query->result();
			}
			
		} elseif($c2 == 'all' && $c1) {
			
			$this->db->from('users u');
			$this->db->join('empcertificates f','u.idnumber=f.idnumber','left');
			$this->db->join('credentials z','u.idnumber=z.idnumber','left');
			$this->db->join('courses c','u.courseID=c.courseID','left');
			$this->db->join('years y','y.yearID=u.yearID','left');
			$this->db->where('z.roleID',1);
			$this->db->where('u.courseID',$c1);
			$this->db->group_by('u.idnumber');
			$this->db->order_by('u.lastname');
			
			$query = $this->db->get();
			if($query->num_rows()>0) {
				return $query->result();
			}
		} elseif($c2 && $c1 == 'all') {
			
			$this->db->from('users u');
			$this->db->join('empcertificates f','u.idnumber=f.idnumber','left');
			$this->db->join('credentials z','u.idnumber=z.idnumber','left');
			$this->db->join('courses c','u.courseID=c.courseID','left');
			$this->db->join('years y','y.yearID=u.yearID','left');
			$this->db->where('z.roleID',1);
			$this->db->where('y.yearID',$c2);
			$this->db->group_by('u.idnumber');
			$this->db->order_by('u.lastname');
			
			$query = $this->db->get();
			if($query->num_rows()>0) {
				return $query->result();
			}
		
		} else {

			$this->db->from('users u');
			$this->db->join('empcertificates f','u.idnumber=f.idnumber','left');
			$this->db->join('credentials z','u.idnumber=z.idnumber','left');
			$this->db->join('courses c','u.courseID=c.courseID','left');
			$this->db->join('years y','y.yearID=u.yearID','left');
			$this->db->where('z.roleID',1);
			$this->db->where('y.yearID',$c2);
			$this->db->where('u.courseID',$c1);
			$this->db->group_by('u.idnumber');
			$this->db->order_by('u.lastname');

			$query = $this->db->get();
			if($query->num_rows()>0) {
				return $query->result();
			}
		}
	}
	
	public function getYear() {
		$this->db->from('years');
		$this->db->order_by('yeargraduated', 'DESC');

		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function getSpecificYear($year) {
		$this->db->where('yearID',$year);
		$this->db->from('years');
		$this->db->order_by('yeargraduated', 'ASC');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function getCourse() {
		$this->db->from('courses');
		$this->db->order_by('course','ASC');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function getSpecificCourse() {
		$sc = $this->input->get('c1');
		
		$this->db->select('course');
		$this->db->from('courses');
		$this->db->where('courseID',$sc);
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	
	public function countData() {
		$count = "SELECT COUNT('userID') AS total FROM users u LEFT JOIN credentials z ON u.idnumber=z.idnumber WHERE z.roleID='1'";
		$q = $this->db->query($count);
		if ($q->num_rows() > 0){
			return $q->row()->total;
		}
	}
	
	public function countDataYear() {
		$select =  array(
                'yeargraduated',
                'count(*) as total'
            );
		$this->db->select($select);
		$this->db->from('users u');
		$this->db->join('years y','y.yearID=u.yearID','left');
		$this->db->join('credentials z','u.idnumber=z.idnumber','left');
		$this->db->where('z.roleID','1');
		$this->db->group_by('y.yeargraduated');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}

	
	public function getquestions() {
		$this->db->from('questionbank');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}

	public function gts_report_model($year){
		$select = array(
				'c.questionID',
				'c.choice_desc',
				's.choiceID',
				'count(*) as Total'
			);
		$this->db->select($select);
		$this->db->from('surveybank s');
		$this->db->join('choicesbank c','c.choiceID=s.choiceID','left');
		$this->db->where_in('c.questionID',array('1','2','3','4','5','6','7','8','9','10','13'));
		$this->db->where('s.yearID',$year);
		$this->db->group_by('s.choiceID');
		$this->db->order_by('c.questionID','ASC');

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	public function gts_report_fjob4($year){
		$select = array(
				'questionID',
				'position_desc',
				'count(*) as Total'
				
			);
		$this->db->select($select);
		$this->db->from('firstjob_pos_bank');
		$this->db->where_in('questionID','5');
		$this->db->where('yearID',$year);
		$this->db->group_by('position_desc');

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	public function preport_jobpos($year){
		$select = array(
				'u.yearID',
				'e.empStatus',
				'e.empPosition',
				'count(*) as Total'
			);
		$this->db->select($select);
		$this->db->from('emphistory e');
		$this->db->join('users u','u.idnumber=e.idnumber','left');
		$this->db->join('years y','y.yearID=u.yearID','left');
		$this->db->where('e.empStatus','');
		$this->db->where('u.yearID',$year);
		$this->db->group_by('e.empPosition');

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	public function preport_pow($year){
		$select = array(
				'u.yearID',
				'e.empStatus',
				'c.choice_desc',
				'count(*) as Total'
			);
		$this->db->select($select);
		$this->db->from('emphistory e');
		$this->db->join('users u','u.idnumber=e.idnumber','left');
		$this->db->join('years y','y.yearID=u.yearID','left');
		$this->db->join('choicesbank c','c.choiceID=e.placeofworkID','left');
		$this->db->where('e.empStatus','');
		$this->db->where('u.yearID',$year);
		$this->db->where('e.placeofworkID !=',0);
		$this->db->group_by('e.placeofworkID');

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	public function preport_ams($year){
		$select = array(
				'u.yearID',
				'e.empStatus',
				'c.choice_desc',
				'count(*) as Total'
			);
		$this->db->select($select);
		$this->db->from('emphistory e');
		$this->db->join('users u','u.idnumber=e.idnumber','left');
		$this->db->join('years y','y.yearID=u.yearID','left');
		$this->db->join('choicesbank c','c.choiceID=e.AMS_ID','right');
		$this->db->where('e.empStatus','');
		$this->db->where('u.yearID',$year);
		$this->db->group_by('e.AMS_ID');

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	
	public function profiling_report_gender($year){
		$select = array(
				'sex',
				'count(*) as Total'
			);
		$this->db->select($select);
		$this->db->from('users');
		$this->db->where('yearID',$year);
		$this->db->group_by('sex');

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	public function profiling_report_cs($year){
		$select = array(
				'civilstatus',
				'count(*) as Total'
			);
		$this->db->select($select);
		$this->db->from('users');
		$this->db->where('yearID',$year);
		$this->db->group_by('civilstatus');

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	public function mcourse($year) {
		$select = array(
				'mdegree',
				'count(*) as Total'
			);
		$this->db->select($select);
		$this->db->from('mdegsurvey');
		$this->db->where('yearID',$year);
		$this->db->group_by('mdegree');

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	public function dcourse($year) {
		$select = array(
				'ddegree',
				'count(*) as Total'
			);
		$this->db->select($select);
		$this->db->from('ddegsurvey');
		$this->db->where('yearID',$year);
		$this->db->group_by('ddegree');

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function sumEmpDates() {
		$this->db->select('SUM(empStartDate) + SUM(empEndDate) as total', FALSE);
		$this->db->from('emphistory m');
		$this->db->join('users u','u.idnumber=m.idnumber','left');	
		$this->db->where('m.empHide','');
		$query = $this->db->get();
		
		if($query->num_rows()>0) {
			return $query->result();
		}
	}

/*
*  ---------- UPDATE ----------
*  TITLE: COE Get Model
*  DESCRIPTION: Responsible for the fetching of the PDF file from the database.
*  BY: Sean Quijote
*  DATE: 7/16/2017
*
*/

	public function getEmpCert() {
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];

		$select = array(
			'certID',
			'empcertificates.idnumber',
			'cert_file',
			'cert_title',
			'cert_date_uploaded',
			'cert_validated'
		);

		$this->db->select($select);	
		$this->db->from('empcertificates');
		$this->db->join('users','users.idnumber = empcertificates.idnumber','left');
		$this->db->join('credentials','credentials.idnumber = users.idnumber','left');
		$this->db->where('empcertificates.idnumber',$idno);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} 
	}

	public function getSpecifiedEmpCert($id) {
		$select = array(
			'certID',
			'e.idnumber',
			'cert_file',
			'cert_title',
			'cert_date_uploaded',
			'cert_validated'
		);
		$this->db->select($select);
		$this->db->from('empcertificates e');
		$this->db->join('users u','e.idnumber=u.idnumber','left');
		$this->db->join('credentials z','e.idnumber=z.idnumber','left');
		$this->db->where('z.roleID',1);
		$this->db->where('e.idnumber',$id);
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}

	public function countCertIdnumber() {
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];

		$this->db->select('idnumber');
		$this->db->from('empcertificates');
		$this->db->where('idnumber',$idno);

		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}


	public function countData2() {
		$count = "SELECT COUNT('uploaded_coe') AS total_cert_upload FROM users u LEFT JOIN credentials z ON u.idnumber=z.idnumber WHERE u.uploaded_coe > '0'";
		$q = $this->db->query($count);
		if ($q->num_rows() > 0){
			return $q->row()->total_cert_upload;
		}
	}

	public function countDataWithEmpCert() {
		$select =  array(
                'uploaded_coe',
                'count(uploaded_coe) as total_cert_upload'
            );
		$this->db->select($select);
		$this->db->from('users u');
		$this->db->where('u.uploaded_coe >', '0');
		$this->db->group_by('u.uploaded_coe');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}

	public function countData3() {
		$count = "SELECT COUNT('uploaded_coe') AS no_cert_upload FROM users u LEFT JOIN credentials z ON u.idnumber=z.idnumber WHERE u.uploaded_coe = '0' AND z.roleID='1' ";
		$q = $this->db->query($count);
		if ($q->num_rows() > 0){
			return $q->row()->no_cert_upload;
		}
	}

	public function countDataNoEmpCert() {
		$select =  array(
                'uploaded_coe',
                'count(*) as no_cert_upload'
            );
		$this->db->select($select);
		$this->db->from('users u');
		$this->db->where('u.uploaded_coe', '0');
		$this->db->group_by('u.uploaded_coe');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}

	public function countData4() {

		$count = "SELECT COUNT('cert_validated') AS total_cert_validated FROM empcertificates f LEFT JOIN credentials z ON f.idnumber=z.idnumber WHERE f.cert_validated = 'yes'";
		$q = $this->db->query($count);
		if ($q->num_rows() > 0){
			return $q->row()->total_cert_validated;
		}
	}

	public function countDataCertValidated() {
		$select =  array(
                'cert_validated',
                'count(cert_validated) as total_cert_validated'
            );
		$this->db->select($select);
		$this->db->from('empcertificates f');
		$this->db->where('f.cert_validated', 'yes');
		$this->db->group_by('f.idnumber');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}

	public function countData5() {

		$count = "SELECT COUNT('cert_validated') AS total_cert_validated FROM empcertificates f LEFT JOIN credentials z ON f.idnumber=z.idnumber WHERE f.cert_validated = 'no' OR f.cert_validated IS NULL ";
		$q = $this->db->query($count);
		if ($q->num_rows() > 0){
			return $q->row()->total_cert_validated;
		}
	}

	public function countDataCertInvalidated() {
		$select =  array(
                'cert_validated',
                'count(cert_validated) as total_cert_validated'
            );
		$this->db->select($select);
		$this->db->from('empcertificates f');
		$this->db->where('f.cert_validated', 'no');
		$this->db->group_by('f.idnumber');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}

	public function countData6() {

		$count = "SELECT COUNT('*') AS total_cert FROM empcertificates f";
		$q = $this->db->query($count);
		if ($q->num_rows() > 0){
			return $q->row()->total_cert;
		}
	}

	public function countDataAllCert() {
		$select =  array(
                'count(*) as total_cert'
            );
		$this->db->select($select);
		$this->db->from('empcertificates f');
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}

	public function getValidator() {
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];
		$select = array(
                'sex',
                'dob',
				'address',
				'contactnumber', 
				'email'
				);
		$this->db->select($select);
		$this->db->from('users u');
		$this->db->join('credentials z','u.idnumber = z.idnumber','left');
		$this->db->where('z.roleID',3);
		$this->db->where('u.idnumber',$idno);
		
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function getSpecifiedValidator($id) {
		$select = array(
				'firstname',
				'lastname',
				'picture',
				'sex',
                'dob',
				'lastupdate',
				'address',
				'contactnumber',
				'email',
				'u.idnumber',
				'userstatus'
				);
		$this->db->select($select);
		$this->db->from('users u');
		$this->db->join('credentials z','u.idnumber=z.idnumber','left');
		$this->db->where('z.roleID',3);
		$this->db->where('u.idnumber',$id);
		
		$query = $this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}


// --------------------------------------------------------------------------------

}	