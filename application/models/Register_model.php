<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register_model extends CI_Model {
			
	public function __construct(){
		parent::__construct();
		
		}
	
	public function usercreds($regdata,$regdatacred) {
		$this->db->insert('users',$regdata);
		$this->db->insert('credentials',$regdatacred);
	}
	
	public function year_insert($yr) {
		$this->db->insert('years',$yr);
	}
	
	public function course_insert($course) {
		$this->db->insert('courses',$course);
	}
	
	public function isIdExist($idno) {
		$this->db->select('idnumber');
		$this->db->from('credentials');
		$this->db->where('idnumber', $idno);
			
		$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return true;
			} else {
				return false;
			}
	}

	public function emp_insert($addemp,$detailedCompAddr){
		$this->db->from('emphistory m');
		$this->db->join('users u','m.idnumber = u.idnumber','left');
		$this->db->insert('emphistory',$addemp);


	}
	
	public function changework_insert($changecurrwork){
		$this->db->from('emphistory m');
		$this->db->join('users u','m.idnumber = u.idnumber','left');
		$this->db->insert('emphistory', $changecurrwork);
	}
	

	
/*
*  ---------- UPDATE ----------
*  TITLE: COE Update Model
*  DESCRIPTION: Responsible for the sending of the PDF file to the database.
*  BY: Sean Quijote
*  DATE: 7/16/2017
*
*/

	public function upload_certificate_model($pdf,$idno) {
		$this->db->from('empcertificates');
		$this->db->join('users','empcertificates.idnumber = users.idnumber','left');
		$this->db->insert('empcertificates',$pdf);
	}

	public function val_notif_insert($val_notif) {
		$this->db->from('empcertificates f');
		$this->db->join('notifications n','f.certID = n.certID','left');
		$this->db->insert('notifications',$val_notif);
	}

	public function inval_notif_insert($inval_notif) {
		$this->db->from('empcertificates f');
		$this->db->join('notifications n','f.certID = n.certID','left');
		$this->db->insert('notifications',$inval_notif);
	}

}