<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validator extends CI_Controller {

	public function index() {
		if($this->session->userdata('logged_in')['role'] == '3'){
					$session_data = $this->session->userdata('logged_in');
					$total_data = $this->search_model->getAnnouncementCount();
					$content_per_page = 5;
					
					$data = array(	
						'idno' => $session_data['idno'],
						'title' => 'COE Validation | Dashboard',
						'firstname' => $session_data['firstname'],
						'lastname' => $session_data['lastname'],
						'picture' => $this->update_model->getimg(),
						'notif' => $this->search_model->countNotif(),
						'total_data' => ceil($total_data/$content_per_page),
						'empcertificate' => $this->search_model->getEmpCert(), // Added for COE conditions
						'utotal' => $this->search_model->countData(),
						'datayear' => $this->search_model->countDataYear(),
						'total_cert_upload' => $this->search_model->countData2(),
						'data_with_empcert' => $this->search_model->countDataWithEmpCert(),
						'no_cert_upload' => $this->search_model->countData3(),
						'data_no_empcert' => $this->search_model->countDataNoEmpCert(),
						'total_cert_validated' => $this->search_model->countData4(),
						'data_cert_validated' => $this->search_model->countDataCertValidated(),
						'total_cert_invalidated' => $this->search_model->countData5(),		
						'data_cert_invalidated' => $this->search_model->countDataCertInvalidated(),
						'total_cert' => $this->search_model->countData6(),
						'data_all_cert' => $this->search_model->countDataAllCert()
					);

					$this->load->view('validator/validator_dashboard',$data);
		} else {
			redirect(base_url());
		}
	}

	public function logout() {
		if($this->session->userdata('logged_in')['role'] == '3'){
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
			redirect(base_url());
		} else {
			redirect(base_url());
		}
	
	}

	public function list_view() {
		if($this->session->userdata('logged_in')['role']=='3') {
			$session_data = $this->session->userdata('logged_in');
			$year = $this->input->get('c2');
			
			$data = array(
				'title' => 'COE Validation | List View',
				'firstname' => $session_data['firstname'],
				'picture' => $this->update_model->getimg(),
				'list1' => $this->search_model->getYear(),
				'list2' => $this->search_model->getCourse(),
				'certlist' => $this->search_model->getEmpCert(),
				'sc' => $this->search_model->getSpecificCourse(),
				'yr' => $this->search_model->getSpecificYear($year),
				'data_cert_validated' => $this->search_model->countDataCertValidated(),
				'total_cert_validated' => $this->search_model->countData4()				
			);
			
			$this->form_validation->set_rules('c1','Course','trim|required');
			$this->form_validation->set_rules('c2','Year Graduated','trim|required');
			
			if($this->form_validation->run()==false) {
				$data['list'] = $this->search_model->getCategoryList();
				$this->load->view('validator/validator_listview', $data);
			} else {
				$this->search_model->getCategoryList();
				$data['list'] = $this->search_model->getCategoryList();
				$this->load->view('validator/validator_listview', $data);
			}			
		} else {
			redirect(base_url());
		}
	}

	public function search($id='') {
		if($this->session->userdata('logged_in')['role']=='3') {
			$this->form_validation->set_rules('search','Search','trim|required');
			$session_data = $this->session->userdata('logged_in');
			$search = $this->input->get('search');
			
			$data = array(
				'title' => 'COE Validation | Search Profile',
				'firstname' => $session_data['firstname'],
				'picture' => $this->update_model->getimg(),
			);
			
			$id = $this->uri->segment(3);
			
				if(!$id && !$search) {
					$this->load->view('validator/validator_search', $data);
				} elseif(!$id && $search) {
					$search = $this->input->get('search');
					$data['list'] = $this->search_model->getSpecifiedList($search);
					$this->load->view('validator/validator_search', $data);
				} elseif($id) {
					$id = $this->uri->segment(3);
					$this->search_model->getSpecifiedUser($id);
					$data['list'] = $this->search_model->getSpecifiedUser($id);
					$data['winfo'] = $this->search_model->getSpecifiedEmpHistory($id);
					$data['cwinfo'] = $this->search_model->getSpecifiedCurrentWork($id);
					$data['certinfo'] = $this->search_model->getSpecifiedEmpCert($id);					
					$this->form_validation->set_rules('idno','ID Number','trim|callback_search_conditions');
					$this->form_validation->set_rules('idno1','ID Number','trim|callback_picture_up');
					if($this->form_validation->run()==false) {
						$this->load->view('validator/validator_searchresult', $data);
					}
				}
		} else {
			redirect(base_url());
		}
	}

	public function validation() {
		if($this->session->userdata('logged_in')['role'] == '3') {
			$session_data = $this->session->userdata('logged_in');
			$validate = $this->input->post('validate');
			$invalidate = $this->input->post('invalidate');
			$certid = $this->input->post('certid');
			$certidnumber = $this->input->post('certidnumber');
			

			if($validate) {
				
				$validated = array('cert_validated'=>'yes');

				$this->update_model->validatedCOE($certidnumber);
				$this->update_model->certValidated($certid,$validated);
				echo '<script>alert("Certificate validation successful!")</script>';
				redirect(base_url('validator/search/'.$certidnumber),'refresh');
				
			} elseif ($invalidate) {
				
				$invalidated = array('cert_validated'=>'no');

				$this->update_model->invalidatedCOE($certidnumber);
				$this->update_model->certInvalidated($certid,$invalidated);
				echo '<script>alert("This certificate has been invalidated!")</script>';
				redirect(base_url('validator/search/'.$certidnumber),'refresh');

			} else {

				redirect(base_url('validator/search/'.$certidnumber),'refresh');

			}
		}
	}


	public function isIdExist($idno) {
		$is_exist = $this->register_model->isIdExist($idno);
		if($is_exist){
			$this->form_validation->set_message(
					'isIdExist', 'ID number already exists.');
				return false;
			} else {
				return true;
			}
	}
	
	function alpha_dash_space($str) {
    if ( ! preg_match("/^([-a-z_ ])+$/i", $str)) {
			$this->form_validation->set_message('alpha_dash_space', 'First name should only contain letters.');
				return FALSE;
		} else {
			return TRUE;
		}
	}
	
	function alpha_dash_space1($str) {
    if ( ! preg_match("/^([-a-z_ ])+$/i", $str)) {
			$this->form_validation->set_message('alpha_dash_space1', 'Last name should only contain letters.');
				return FALSE;
		} else {
			return TRUE;
		}
	}


	public function change_pwd() {
		if($this->session->userdata('logged_in')['role']=='3') {
			$session_data = $this->session->userdata('logged_in');
				
				$data = array(
					'idno' => $session_data['idno'],
					'title' => 'COE Vaidation | Change Password',
					'firstname' => $session_data['firstname'],
					'picture' => $this->update_model->getimg(),
				);
				
				$this->form_validation->set_rules('oldpass','Password','trim|required|max_length[20]|callback_PassCheck');
				$this->form_validation->set_rules('newpass','New password','trim|min_length[3]|matches[re_newpass]|required');
				$this->form_validation->set_rules('re_newpass','Confirm New Password','trim|required');
				
				if($this->form_validation->run()==false){
					$this->load->view('validator/validator_cpass', $data);
				} else {
					$newpass = array('password' => md5($this->input->post('newpass')));

					$this->update_model->saveNewPass($newpass,$data['idno']);
					echo '<script>alert("Successfully changed password!")</script>';
					redirect(base_url('validator'),'refresh');
				}

		} else {
			redirect(base_url());
		}
	}

	public function PassCheck($oldpass) {
		$query = $this->update_model->checkOldPass($oldpass);
		if ($query) {
			return true;
		} else {
			$this->form_validation->set_message('PassCheck', 'Old password is incorrect');
			Return false;
		}
	}


}

?>