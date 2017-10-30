<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function index() {
		if($this->session->userdata('logged_in')['role'] == '1'){
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
					$session_data = $this->session->userdata('logged_in');
					$total_data = $this->search_model->getAnnouncementCount();
					$content_per_page = 5;
					
					$data = array(	
						'idno' => $session_data['idno'],
						'title' => 'Graduate School Portal | Dashboard',
						'firstname' => $session_data['firstname'],
						'lastname' => $session_data['lastname'],
						'picture' => $this->update_model->getimg(),
						'notif' => $this->search_model->countNotif(),
						'total_data' => ceil($total_data/$content_per_page),
						'empcertificate' => $this->search_model->getEmpCert() // Added for COE conditions
					);

					$this->load->view('user/user_dashboard',$data);
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url());
		}
	}


    public function load_more() {
		if($this->session->userdata('logged_in')['role'] == '1'){
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$group_no = $this->input->post('group_no');
				$content_per_page = 5;
				$start = ceil($group_no * $content_per_page);
				$all_content = $this->search_model->getAnnouncementInf($start,$content_per_page);
				if(isset($all_content) && is_array($all_content) && count($all_content)) {
					foreach ($all_content as $key => $row) {
						include('application/views/user/user_dashboard_load_more.php');
					}                              
				}
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function logout() {
		if($this->session->userdata('logged_in')['role'] == '1'){
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
			redirect(base_url());
		} else {
			redirect(base_url());
		}
	
	}
	
	public function survey() {
		if($this->session->userdata('logged_in')['role'] == '1'){
			$session_data = $this->session->userdata('logged_in');
			$data = array(	
				'idno' => $session_data['idno'],
				'title' => 'Graduate School Portal | Survey',
				'firstname' => $session_data['firstname'],
				'lastname' => $session_data['lastname'],
				'picture' => $this->update_model->getimg(),
				'info' => $this->search_model->getUser(),
				'yearID' => $session_data['yearID']
			);

			if($this->session->userdata('logged_in')['tooksurvey'] === 'one') {
				$this->form_validation->set_rules('email','Email','trim|callback_survey_conditions');
				if($this->form_validation->run()==false) {
					$this->load->view('user/user_survey1', $data);
				}
			} elseif($this->session->userdata('logged_in')['tooksurvey'] === 'two') {
				
				$this->form_validation->set_rules('answer[1]','Answer','trim|callback_survey_conditions');
				if($this->form_validation->run()==false) {
					$this->load->view('user/user_survey2', $data);
				}
			} elseif($this->session->userdata('logged_in')['tooksurvey'] === 'three') {
				
				$this->form_validation->set_rules('answer[4]','Answer','trim|callback_survey_conditions');
				if($this->form_validation->run()==false) {
					$this->load->view('user/user_survey3', $data);
				}
			} else {
				redirect(base_url('user'));
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function survey_conditions() {
		if($this->session->userdata('logged_in')['role']=='1') {
			$session_data = $this->session->userdata('logged_in');
			$idno = $session_data['idno'];
			$yearID = $session_data['yearID'];
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');
			$manswer = $this->input->post('manswer');
			$danswer = $this->input->post('danswer');
			$degmanswer = $this->input->post('degmanswer');
			$degdanswer = $this->input->post('degdanswer');
			
			if($this->session->userdata('logged_in')['tooksurvey'] === 'one') {
				
				$data1 = array(
					'civilstatus' => $this->input->post('civilstatus'),
					'address' => $this->input->post('address'),
					'contactnumber' => $this->input->post('mobilenumber'),
					'email' => $this->input->post('email'),
					'tooksurvey' => 'two',
					'lastupdate' => date('Y-m-d')
				);
				$this->survey_model->survey1($data1,$idno);
				$sess_array = array(
					'firstname' => $session_data['firstname'],
					'lastname' => $session_data['lastname'],
					'yearID' => $yearID,
					'idno' => $idno,
					'role' => '1',
					'tooksurvey' => 'two'
				);
				$this->session->unset_userdata('logged_in');
				$this->session->set_userdata('logged_in', $sess_array);
				redirect(base_url('user/survey'));
				
			} elseif($this->session->userdata('logged_in')['tooksurvey'] === 'two') {
				
				if($degmanswer) {
					$degmdata = array(
						'idnumber' => $idno,
						'yearID' => $yearID,
						'questionID' => 13,
						'choiceID' => $degmanswer
					);
					
					$this->survey_model->survey2($degmdata);
					
					$i = 0;
					if($manswer) {
						foreach($manswer as $row) {
							
							$datam = array(
								'idnumber' => $idno,
								'yearID' => $yearID,
								'mdegree' => $manswer[$i]
							);
							
							$this->survey_model->survey_mdeg($datam);
							$i++;
						}
					}
					
					if($degdanswer) {
						$degddata = array(
							'idnumber' => $idno,
							'yearID' => $yearID,
							'questionID' => 13,
							'choiceID' => $degdanswer
						);
						
						$this->survey_model->survey2($degddata);
						
						$i = 0;
						if($danswer) {
							foreach($danswer as $row) {
								
								$datad = array(
									'idnumber' => $idno,
									'yearID' => $yearID,
									'ddegree' => $danswer[$i]
								);
								
								$this->survey_model->survey_ddeg($datad);
								$i++;
							}
						}
					}
					
				} elseif ($degdanswer) {
					$degddata = array(
						'idnumber' => $idno,
						'yearID' => $yearID,
						'questionID' => 13,
						'choiceID' => $degdanswer
					);
					
					$this->survey_model->survey2($degddata);
					
					$i = 0;
					if($danswer) {
						foreach($danswer as $row) {
							
							$datad = array(
								'idnumber' => $idno,
								'yearID' => $yearID,
								'ddegree' => $danswer[$i]
							);
							
							$this->survey_model->survey_ddeg($datad);
							$i++;
						}
					}
				}
				
				$i = 1;
				if($question) {
					foreach($question as $row) {
						
						$data2 = array(
							'idnumber' => $idno,
							'yearID' => $yearID,
							'questionID' => $question[$i],
							'choiceID' => $answer[$i]
						);

						$this->survey_model->survey2($data2);
						
						$i++;
					}
				}
				
				
				
				$data1 = array('tooksurvey' => 'three');
				
				$this->survey_model->survey1($data1,$idno);
				
				$sess_array = array(
					'firstname' => $session_data['firstname'],
					'lastname' => $session_data['lastname'],
					'yearID' => $yearID,
					'idno' => $idno,
					'role' => '1',
					'tooksurvey' => 'three'
				);
				$this->session->unset_userdata('logged_in');
				$this->session->set_userdata('logged_in', $sess_array);
				redirect(base_url('user/survey'));
				
			} elseif($this->session->userdata('logged_in')['tooksurvey'] === 'three') {
				
			if($this->input->post('empEndDate_first_job') == '') {
					$Street1 = $this->input->post('empCompAddrStreet1');
					$City1 = $this->input->post('empCompAddrCity1');
					$Province1 = $this->input->post('empCompAddrProvince1');
					$Country1 = $this->input->post('empCompAddrCountry1');
					$ZIP1 = $this->input->post('empCompAddrZIP1');
					$detailedCompAddr1 = $Street1.', '.$City1.', '.$Province1.', '.$Country1.', '.$ZIP1;

				$empfirstjobdata = array(
					'idnumber' => $idno,
					'empCompName' => $this->input->post('empCompName1'),
					'empCompAddr' => $detailedCompAddr1,
					'empPosition' => $this->input->post('fjob_pos'),
					'empStartDate' => $this->input->post('empStartDate_first_job'),
					'empEndDate' => $this->input->post('empEndDate_first_job'),
					'empHide' => 'hidden',
					'placeofworkID' => $this->input->post('answer[4]'),
					'empStatus' => $this->input->post('fj')
				);
			} else {

					$Street1 = $this->input->post('empCompAddrStreet1');
					$City1 = $this->input->post('empCompAddrCity1');
					$Province1 = $this->input->post('empCompAddrProvince1');
					$Country1 = $this->input->post('empCompAddrCountry1');
					$ZIP1 = $this->input->post('empCompAddrZIP1');
					$detailedCompAddr1 = $Street1.', '.$City1.', '.$Province1.', '.$Country1.', '.$ZIP1;

					$Street2 = $this->input->post('empCompAddrStreet2');
					$City2 = $this->input->post('empCompAddrCity2');
					$Province2 = $this->input->post('empCompAddrProvince2');
					$Country2 = $this->input->post('empCompAddrCountry2');
					$ZIP2 = $this->input->post('empCompAddrZIP2');
					$detailedCompAddr2 = $Street2.', '.$City2.', '.$Province2.', '.$Country2.', '.$ZIP2;


				$empfirstjobdata = array(
					'idnumber' => $idno,
					'empCompName' => $this->input->post('empCompName1'),
					'empCompAddr' => $detailedCompAddr1,
					'empPosition' => $this->input->post('fjob_pos'),
					'empStartDate' => $this->input->post('empStartDate_first_job'),
					'empEndDate' => $this->input->post('empEndDate_first_job'),
					'placeofworkID' => $this->input->post('answer[4]'),
					'empStatus' => $this->input->post('fj')
				);

				$empcurrentjobdata = array(
					'idnumber' => $idno,
					'empCompName' => $this->input->post('empCompName2'),
					'empCompAddr' => $detailedCompAddr2,
					'empPosition' => $this->input->post('cjob_pos'),
					'empStartDate' => $this->input->post('empStartDate_current_job'),
					'empEndDate' => '0000-00-00',
					'empHide' => 'hidden',
					'placeofworkID' => $this->input->post('pow'),
					'AMS_ID' =>  $this->input->post('ams')
				);
			}

				$logupdate = array('lastupdate' => date('Y-m-d H:i:s'));
				
				$firstjobpos_bank = array(
					
					'questionID' => $this->input->post('question4'),
					'yearID' => $yearID,
					'position_desc' => $this->input->post('fjob_pos')				
				);
				
				$this->survey_model->survey4_first_job($firstjobpos_bank);

					if($this->input->post('empCompName1') && empty($this->input->post('empCompName2'))) {
						//First job is also the current job
						
						$this->survey_model->survey3_first_job($empfirstjobdata);
						$this->update_model->logupdate($logupdate,$idno);

						$i = 1;
						if($question) {
							foreach($question as $row) {
								
								$data2 = array(
									'idnumber' => $idno,
									'yearID' => $yearID,
									'questionID' => $question[$i],
									'choiceID' => $answer[$i]
								);
								
								$this->survey_model->survey2($data2);
								if($i++ == 4) break;
							}
						}
						
					} elseif($this->input->post('empCompName1') && $this->input->post('empCompName2')) {
						//First job for survey, current job for survey, 
						
						$this->survey_model->survey3_first_job($empfirstjobdata);
						$this->survey_model->survey3_current_job($empcurrentjobdata);
						$this->update_model->logupdate($logupdate,$idno);

						$i = 1;
						if($question) {
							foreach($question as $row) {
								
								$data2 = array(
									'idnumber' => $idno,
									'yearID' => $yearID,
									'questionID' => $question[$i],
									'choiceID' => $answer[$i]
								);
								$this->survey_model->survey2($data2);
								$i++;
								
							}
						}
					}
					
				
					
				$data1 = array('tooksurvey' => 'yes');
				
				$this->survey_model->survey1($data1,$idno);
				
				$sess_array = array(
					'firstname' => $session_data['firstname'],
					'lastname' => $session_data['lastname'],
					'idno' => $session_data['idno'],
					'role' => '1',
					'tooksurvey' => 'yes'
				);
				
				$this->session->unset_userdata('logged_in');
				$this->session->set_userdata('logged_in', $sess_array);
				redirect(base_url('user/seq'));
				
				
			} else {
				redirect(base_url('user'));
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function profile() {
		if($this->session->userdata('logged_in')['role']=='1') {
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				$total_data = $this->search_model->countNewsFeed();
				$content_per_page = 5;
				$idno = $session_data['idno'];
				$addenddate = $this->input->post('dateID');
				$delcertID = $this->input->post('delcertID');
				$total_idnumber = $this->search_model->countCertIdnumber();
 				$certinfo = $this->search_model->getEmpCert();

				$data = array(
					'title' => $session_data['firstname'] . ' ' . $session_data['lastname'],
					'firstname' => $session_data['firstname'],
					'lastname' => $session_data['lastname'],
					'idno' => $session_data['idno'],
					'picture' => $this->update_model->getimg(),
					'pinfo' => $this->search_model->getUser(),
					'cwinfo' => $this->search_model->getCurrentWork(),
					'winfo' => $this->search_model->getEmpHistory(),
					'total_data' => ceil($total_data/$content_per_page),
					'list' => $this->search_model->getSpecificNewsfeed($idno),
					'certinfo' => $this->search_model->getEmpCert(),  // Fetching COE info from empcertificates table
					'total_idnumber' => $this->search_model->countCertIdnumber() // Counts of certificates uploaded per user
				);

				if($addenddate) {
					$dateID = $this->input->post('dateID');

					$updateenddate = array(
						'empEndDate' => $this->input->post('empEndDate'),
						'empHide' => ''
					);

					$updatelog = array('lastupdate' => date('Y-m-d H:i:s'));

					$this->update_model->logupdate($updatelog,$idno);
					$this->update_model->addenddate($updateenddate, $dateID);
					redirect(base_url('user/profile'),'refresh');
					
				} elseif ($delcertID) {

					$this->update_model->deletedCOE($idno);
					$this->update_model->delCert($delcertID);					
					redirect(base_url('user/profile'),'refresh');
					
				} else {
					$this->load->view('user/user_profile', $data);
				}	
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function profile_load_more() {
		if($this->session->userdata('logged_in')['role'] == '1'){
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				$group_no = $this->input->post('group_no');
				$content_per_page = 5;
				$start = ceil($group_no * $content_per_page);
				$idno = $session_data['idno'];
				$picture = $this->update_model->getimg();
				$all_content = $this->search_model->getNewsfeedInf($start,$content_per_page);
				if(isset($all_content)) {
					foreach ($all_content as $key2 => $row) {
						include('application/views/user/user_profile_load_more.php');
					}
				}
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url());
		}
	}

	public function updatepsinfo() {
		if($this->session->userdata('logged_in')['role']=='1') {
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				
				$data = array(
					'title' => 'Graduate School Portal | Update Profile',
					'firstname' => $session_data['firstname'],
					'info' => $this->search_model->getUser(),
					'picture' => $this->update_model->getimg()
				);
				
				$this->form_validation->set_rules('address','Address','trim|max_length[50]|min_length[4]');
				$this->form_validation->set_rules('email','Email Address','trim|valid_email');
				$this->form_validation->set_rules('contactnumber','Contact number','trim|required|numeric|max_length[11]|min_length[7]');
				
				if($this->form_validation->run()==false){
					$this->load->view('user/user_updatepersonalinfo', $data);
				} else {
					$updatedata = array(
						'address' => ucfirst(strip_tags($this->input->post('address'))),
						'civilstatus' => $this->input->post('civilstatus'),
						'contactnumber' => strip_tags($this->input->post('contactnumber')),
						'email' => strip_tags($this->input->post('email')),
					);
						
					$updatelog = array('lastupdate' => date('Y-m-d H:i:s'));

					$this->update_model->logupdate($updatelog,$session_data['idno']);
					$this->update_model->form_updatepsinfo($updatedata,$session_data['idno']);
					echo '<script>alert("Successfully updated your profile!")</script>';
					redirect(base_url('user/profile'),'refresh');
				}
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url()); 
		}
	}	

	public function changecurrentwork() {
		if($this->session->userdata('logged_in')['role']=='1') {
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				
				$data = array(
					'title' => 'Graduate School Portal | Change Current Workplace ',
					'firstname' => $session_data['firstname'],
					'idno' => $session_data['idno'],
					'winfo' => $this->search_model->getEmpHistory(),
					'picture' => $this->update_model->getimg()
				);

				$this->form_validation->set_rules('empCompName','Company Name','trim|max_length[100]|min_length[3]|required');
				$this->form_validation->set_rules('empCompAddrStreet','Street','trim|max_length[100]|required');
				$this->form_validation->set_rules('empCompAddrCity','City','trim|max_length[30]|required');
				$this->form_validation->set_rules('empCompAddrProvince','Province','trim|max_length[50]|required');
				$this->form_validation->set_rules('empCompAddrCountry','Country','trim|max_length[100]|required');
				$this->form_validation->set_rules('empCompAddrZIP','ZIP','trim|max_length[5]|min_length[4]|numeric|required');
				$this->form_validation->set_rules('empPosition','Position','trim|max_length[100]|required');
				$this->form_validation->set_rules('empStartDate','Date of Starting Work','trim|max_length[10]|min_length[10]|required');
				$this->form_validation->set_rules('empEndDate','Date of Resignation','trim|max_length[10]|min_length[10]|required');
				
				if($this->form_validation->run()==false){	
					$this->load->view('user/user_changecurrentwork', $data);
				} else {
					
					$Street = $this->input->post('empCompAddrStreet');
					$City = $this->input->post('empCompAddrCity');
					$Province = $this->input->post('empCompAddrProvince');
					$Country = $this->input->post('empCompAddrCountry');
					$ZIP = $this->input->post('empCompAddrZIP');
					$detailedCompAddr = $Street.', '.$City.', '.$Province.', '.$Country.', '.$ZIP;

					$changecurrwork = array(
						'idnumber' => $session_data['idno'], 
						'empPosition' => strip_tags($this->input->post('empPosition')),
						'empCompName' => strip_tags($this->input->post('empCompName')),
						'empCompAddr' => $detailedCompAddr,
						'empStartDate' => $this->input->post('empStartDate'),
						'empEndDate' => '0000-00-00',
						'empHide' => 'hidden'
					);

					$updatelog = array('lastupdate' => date('Y-m-d H:i:s'));

					$this->update_model->logupdate($updatelog,$session_data['idno']);
					$this->register_model->changework_insert($changecurrwork);
					redirect(base_url('user/profile'),'refresh');
				}
			}
		}
	}

	public function updateemphistory() {
		if($this->session->userdata('logged_in')['role']=='1') {
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				$empeditID = $this->input->post('empeditID');
				$hideempID = $this->input->post('hideempID');
				
				$data = array(
					'title' => 'Graduate School Portal | Update Work Information',
					'firstname' => $session_data['firstname'],
					'winfo' => $this->search_model->getEmpHistory(),
					'picture' => $this->update_model->getimg()
				);
				
				$this->form_validation->set_rules('empCompName','Company Name','trim|max_length[100]|min_length[4]');
				$this->form_validation->set_rules('empCompAddr','Company Address','trim|max_length[250]|min_length[10]');
				$this->form_validation->set_rules('empPosition','Position','trim|max_length[100]|min_length[4]');
				
				if($this->form_validation->run()==false){
					$this->load->view('user/user_updateemphistory', $data);
				} elseif ($empeditID) {
					
					$updateemp = array(
						'empPosition' => strip_tags($this->input->post('empPosition')),
						'empCompName' => strip_tags($this->input->post('empCompName')),
						'empCompAddr' => strip_tags($this->input->post('empCompAddr')),
						'empStartDate' => $this->input->post('empStartDate'),
						'empEndDate' => $this->input->post('empEndDate')
					);

					$updatelog = array('lastupdate' => date('Y-m-d H:i:s'));

					$this->update_model->logupdate($updatelog,$session_data['idno']);
					$this->update_model->empedit($updateemp,$empeditID);
					redirect(base_url('user/updateemphistory'));
				} elseif ($hideempID) {

					$this->update_model->emphide($hideempID);
					redirect(base_url('user/updateemphistory'),'refresh');
				}
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url()); 
		}
	}

	public function addemphs() {
		if($this->session->userdata('logged_in')['role']=='1') {
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				
				$data = array(
					'title' => 'Graduate School Portal | Add Company ',
					'firstname' => $session_data['firstname'],
					'idno' => $session_data['idno'],
					'winfo' => $this->search_model->getEmpHistory(),
					'picture' => $this->update_model->getimg()
				);

				$this->form_validation->set_rules('empCompName','Company Name','trim|max_length[100]|min_length[3]|required');
				$this->form_validation->set_rules('empCompAddrStreet','Street','trim|max_length[100]|required');
				$this->form_validation->set_rules('empCompAddrCity','City','trim|max_length[30]|required');
				$this->form_validation->set_rules('empCompAddrProvince','Province','trim|max_length[50]|required');
				$this->form_validation->set_rules('empCompAddrCountry','Country','trim|max_length[100]|required');
				$this->form_validation->set_rules('empCompAddrZIP','ZIP','trim|max_length[5]|min_length[4]|numeric|required');
				$this->form_validation->set_rules('empPosition','Position','trim|max_length[100]|required');
				$this->form_validation->set_rules('empStartDate','Date of Starting Work','trim|max_length[10]|min_length[10]|required');
				$this->form_validation->set_rules('empEndDate','Date of Resignation','trim|max_length[10]|min_length[10]|required');
				
				if($this->form_validation->run()==false){	
					$this->load->view('user/user_addemp', $data);
				} else {

					$Street = $this->input->post('empCompAddrStreet');
					$City = $this->input->post('empCompAddrCity');
					$Province = $this->input->post('empCompAddrProvince');
					$Country = $this->input->post('empCompAddrCountry');
					$ZIP = $this->input->post('empCompAddrZIP');
					$detailedCompAddr = $Street.', '.$City.', '.$Province.', '.$Country.', '.$ZIP;


					$addemp = array(
						'idnumber' => $session_data['idno'], 
						'empPosition' => strip_tags($this->input->post('empPosition')),
						'empCompName' => strip_tags($this->input->post('empCompName')),
						'empCompAddr' => $detailedCompAddr,
						'empStartDate' => $this->input->post('empStartDate'),
						'empEndDate' => $this->input->post('empEndDate')
					);

					$updatelog = array('lastupdate' => date('Y-m-d H:i:s'));

					$this->update_model->logupdate($updatelog,$data['idno']);
					$this->register_model->emp_insert($addemp,$detailedCompAddr);
					redirect(base_url('user/updateemphistory'),'refresh');
				}
			}
		}
	}

	public function pwd() {
		if($this->session->userdata('logged_in')['role']=='1') {
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				
				$data = array(
					'idno' => $session_data['idno'],
					'title' => 'Graduate School Portal | Change Password',
					'firstname' => $session_data['firstname'],
					'picture' => $this->update_model->getimg()
				);
				
				$this->form_validation->set_rules('oldpass','Password','trim|required|max_length[20]|callback_PassCheck');
				$this->form_validation->set_rules('newpass','New password','trim|min_length[8]|matches[re_newpass]|required');
				$this->form_validation->set_rules('re_newpass','Confirm New Password','trim|required');
				
				if($this->form_validation->run()==false){
					$this->load->view('user/user_cpass', $data);
				} else {
					$newpass = array('password' => md5($this->input->post('newpass')));

					$updatelog = array('lastupdate' => date('Y-m-d H:i:s'));

					$this->update_model->logupdate($updatelog,$session_data['idno']);
					$this->update_model->saveNewPass($newpass,$data['idno']);
					echo '<script>alert("Successfully changed password!")</script>';
					redirect(base_url('user/pwd'),'refresh');
				}
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function seq() {
		if($this->session->userdata('logged_in')['role']=='1') {
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');

				$data = array(
					'idno' => $session_data['idno'],
					'title' => 'Graduate School Portal | Change Security Measures',
					'firstname' => $session_data['firstname'],
					'picture' => $this->update_model->getimg()
				);
				
				$this->form_validation->set_rules('sq','Security Question','trim');
				$this->form_validation->set_rules('answer','Security Answer','trim|required|max_length[20]');
				
				if($this->form_validation->run()==false){
					$this->load->view('user/user_security', $data);
				} else {
					$updateseq = array(
					'securityquestion' => $this->input->post('sq'),
					'securityanswer' => strtolower($this->input->post('answer'))
					);

					$updatelog = array('lastupdate' => date('Y-m-d H:i:s'));

					$this->update_model->logupdate($updatelog,$session_data['idno']);
					$this->update_model->seq_update($updateseq,$data['idno']);
					echo '<script>alert("Account recovery measures updated successfully!")</script>';
					redirect(site_url('user'),'refresh');
				}
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function newsfeed($id='',$id1='') {
		if($this->session->userdata('logged_in')['role']=='1') {
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				$total_data = $this->search_model->countNewsFeed();
				$content_per_page = 5; 
				$id = $this->uri->segment(3);
				$id1 = $this->uri->segment(4);
				$post = $this->input->post('newsfeed');
				
				$data = array(
					'title' => 'Graduate School Portal | Newsfeed',
					'idno' => $session_data['idno'],
					'firstname' => $session_data['firstname'],
					'lastname' => $session_data['lastname'],
					'picture' => $this->update_model->getimg(),
					'so' => $this->search_model->getShoutOut(),
					'notif' => $this->search_model->countNotif(),
					'getnotif' => $this->search_model->getNotif(),
					'list2' => $this->search_model->getNewsFeed(),
					'total_data' => ceil($total_data/$content_per_page),
					'list' => $this->search_model->getSpecificPost($id,$id1),
					'list1' => $this->search_model->getComments(),
					'id' => $this->uri->segment(3),
					'id1' => $this->uri->segment(4),
					'empcertificate' => $this->search_model->getEmpCert()  // Added for COE conditions
				);


				if($id && $id1) {
					$this->form_validation->set_rules('nfcomment','Comment','trim|callback_newsfeed_conditions');
					if($this->form_validation->run()==false) {
						$readpost = array('status' => 'read');
						
						$this->update_model->readPost($data['idno'],$id1,$readpost);
						$this->load->view('user/user_posts',$data);
						}
					} elseif(!$id || !$id1) {
						if($post) {
							$nfpost = array(
								'nfPostedBy' => $session_data['idno'],
								'nfPosterName' => $session_data['firstname'] .' '. $session_data['lastname'],
								'nfContent' => nl2br(strip_tags($this->input->post('newsfeed'))),
								'nfDateAdded' => date('Y-m-d H:i:s'),
								'nfUpdated' => date('Y-m-d H:i:s')
							);
							
							$this->update_model->postFeed($nfpost);
							redirect(base_url('user/newsfeed'));
						} else {
							$this->load->view('user/user_newsfeed', $data);
						}
					}
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function nf_load_more() {
		if($this->session->userdata('logged_in')['role'] == '1'){
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				$idno = $session_data['idno'];
				$picture = $this->update_model->getimg();
				$group_no = $this->input->post('group_no1');
				$content_per_page = 5;
				$start = ceil($group_no * $content_per_page);
				$all_content = $this->search_model->getNewsfeedInf($start,$content_per_page);
				if(isset($all_content)) {
					foreach ($all_content as $key1 => $row) {
						include('application/views/user/user_newsfeed_load_more.php');
					}
				}
			} else {
					redirect(base_url('user/survey'));
				}
		} else {
			redirect(base_url());
		}
	}
	
	public function notifications() {
		if($this->session->userdata('logged_in')['role'] == '1'){
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				$total_data = $this->search_model->countNewsFeed();
				$content_per_page = 5;
				
				$data = array(
					'title' => 'Graduate School Portal | Newsfeed',
					'idno' => $session_data['idno'],
					'firstname' => $session_data['firstname'],
					'lastname' => $session_data['lastname'],
					'picture' => $this->update_model->getimg(),
					'so' => $this->search_model->getShoutOut(),
					'notif' => $this->search_model->countNotif(),
					'getnotif' => $this->search_model->getNotif(),
					'total_data' => ceil($total_data/$content_per_page)
				);
				
				$this->load->view('user/user_notifications',$data);
			} else {
					redirect(base_url('user/survey'));
				}
		} else {
			redirect(base_url());
		}
	}
	
	public function notifications_load_more() {
		if($this->session->userdata('logged_in')['role'] == '1'){
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				$idno = $session_data['idno'];
				$picture = $this->update_model->getimg();
				$group_no = $this->input->post('group_no1');
				$content_per_page = 5;
				$start = ceil($group_no * $content_per_page);
				$all_content = $this->search_model->getNotifsInf($start,$content_per_page,$idno);
				if(!empty($all_content)) {
					foreach ($all_content as $key4 => $row) {
						include('application/views/user/user_notifications_load_more.php');
					}
				}
			} else {
					redirect(base_url('user/survey'));
				}
		} else {
			redirect(base_url());
		}
	}
	
	public function search($id='') {
		if($this->session->userdata('logged_in')['role']=='1') {
			$this->form_validation->set_rules('search','Search','trim|required');
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				$total_data = $this->search_model->countNewsFeed();
				$content_per_page = 5;
				
				
				$data = array(
					'title' => 'Graduate School Portal | Search Profile',
					'firstname' => $session_data['firstname'],
					'picture' => $this->update_model->getimg(),
					'idno' => $session_data['idno'],
					'total_data' => ceil($total_data/$content_per_page)
				);
				
				if($id == $data['idno']) {
					redirect(base_url('/user/profile'));
				} elseif(!$id) {
					$search = $this->input->get('search');
					$data['list'] = $this->search_model->getSpecifiedList($search);
					$this->load->view('user/user_search', $data);
				} else {

				$id = $this->uri->segment(3);

					$data = array(
						'list' => $this->search_model->getSpecifiedUser($id),
						'cwinfo' => $this->search_model->getSpecifiedCurrentWork($id),
						'winfo' => $this->search_model->getSpecifiedEmpHistory($id),
						'certinfo' => $this->search_model->getSpecifiedEmpCert($id),
						'id' => $this->uri->segment(3),
						'list1' => $this->search_model->getSpecificNewsfeed($id),
						'picture' => $this->update_model->getimg(),
						'firstname' => $session_data['firstname'],
						'total_data' => ceil($total_data/$content_per_page)
					);
					
					$this->load->view('user/user_searchresult', $data);
				}
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function searchresult_load_more($id=''){
		if($this->session->userdata('logged_in')['role'] == '1'){
			if($this->session->userdata('logged_in')['tooksurvey'] == 'yes'){
				$session_data = $this->session->userdata('logged_in');
				$group_no = $this->input->post('group_no');
				$content_per_page = 5;
				$start = ceil($group_no * $content_per_page);
				$picture = $this->update_model->getimg();
				$id = $this->uri->segment(3);
				$all_content = $this->search_model->getSpecNewsfeedInf($start,$content_per_page,$id);
				if(isset($all_content)) {
					foreach ($all_content as $key3 => $row) {
						include('application/views/user/user_searchresult_load_more.php');
					}
				}
			} else {
				redirect(base_url('user/survey'));
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function newsfeed_conditions() {
		if($this->session->userdata('logged_in')['role']=='1') {
			$session_data = $this->session->userdata('logged_in');
			$idno = $session_data['idno'];
			$idcc = $this->input->post('idcc');
			$nfcdel = $this->input->post('nfcdel');
			$nfdelid = $this->input->post('nfdelid');
			$nfhideID = $this->input->post('nfhideID');
			$editID = $this->input->post('nfeditID');
			$id = $this->uri->segment(3);
			$id1 = $this->uri->segment(4);
			$uf = $this->input->post('uf');
			$report = $this->input->post('report');
			
			if ($idcc) { 
			
				$cnfpost = array(
					'newsfeedID' => $this->input->post('idcc'),
					'nfCommentedBy' => $session_data['idno'],
					'nfCommentorName' => $session_data['firstname'],
					'nfCommentContent' => strip_tags($this->input->post('nfcomment')),
					'nfTime' => date('Y-m-d H:i:s')
				);
				
				$upfollow = array('subscription' => 'yes');
				
				$addfollow = array(
					'newsfeedID' => $id1,
					'idnumber' => $session_data['idno'],
					'subscription' => 'yes'
				);
				
				$this->update_model->postCommentFeed($cnfpost,$addfollow,$id1,$upfollow);
				
				$cnfupdate = array('nfUpdated' => date('Y-m-d H:i:s'));
				$this->update_model->updateNewsfeed($idcc,$cnfupdate);
				
				$unreadpost = array(
					'status' => 'unread',
					'updated' => date('Y-m-d H:i:s')
				);
				
				$this->update_model->unreadPost($idno,$id1,$unreadpost);
				redirect(base_url('user/newsfeed/'.$id.'/'.$id1));
				
			} elseif ($nfdelid){
				
				$this->update_model->delNfPost($nfdelid);
				
				redirect(base_url('user/newsfeed/'),'refresh');
				
			} elseif ($nfcdel) {
				
				$this->update_model->delNfC($nfcdel);
				redirect(base_url('user/newsfeed/'.$id.'/'.$id1));
				
			} elseif ($editID) {
				
				$updatenfpost = array(
					'nfContent' => nl2br(strip_tags($this->input->post('newsfeed_edit'))),
					'nfEdited' => 'Edited'
				);

				$this->update_model->editPost($updatenfpost,$editID);
				redirect(base_url('user/newsfeed/'.$id.'/'.$id1));
				
			} elseif ($uf) {
				
				$this->update_model->Un_FollowPost($idno,$id1);
				redirect(base_url('user/newsfeed/'.$id.'/'.$id1));
				
			} elseif ($report) {
				
				$reportpost = array(
					'nfStatus' => 'reported',
					'nfReportedBy' => $idno
				);
				
				$this->update_model->reportPost($id,$id1,$reportpost);
				echo '<script>alert("Thank you for reporting this post. The administrator will review this ASAP. Take note: Abusing the report button can lead your account to be disabled.")</script>';
				redirect(base_url('user/newsfeed/'.$id.'/'.$id1),'refresh');
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

/*
*  ---------- UPDATE ----------
*  TITLE: COE Controller
*  DESCRIPTION: Responsible for the uploading of the PDF file
*  BY: Sean Quijote
*  DATE: 7/16/2017
*
*/

	public function uploading_certificate() {
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];
		$cert_title = $this->input->post('cert_title');

		$config = array(
			'upload_path' => "./certificates",
			'allowed_types' => "pdf",
			'file_name' => $idno."_".$cert_title."_coe",
			'overwrite' => FALSE,
			'max_size' => "2048000"
		);
		
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload()) {
				echo link_tag('assets2/dist/sweetalert.css');
				echo '<script src="'.base_url().'assets2/dist/sweetalert.min.js"></script>';
				echo '<body><script>swal("Oops!","Something is wrong!","error");
				setTimeout(function() {window.location.href="'.base_url('user/profile').'"},2000);</script></body>';
			} else {
				$data['upload_data'] = $this->upload->data();
				
				$pdf = array(
					'cert_file' => $data['upload_data']['file_name'],
					'idnumber' => $session_data['idno'], 
					'cert_title' => $this->input->post('cert_title'),
					'cert_date_uploaded' => date('M d, Y'),
					'cert_validated' => 'no'
				);

				$updatelog = array('lastupdate' => date('Y-m-d H:i:s'));

				$this->register_model->upload_certificate_model($pdf,$idno);
				$this->update_model->logupdate($updatelog,$session_data['idno']);
				$this->update_model->uploadedCOE($idno);
				echo link_tag('assets2/dist/sweetalert.css');
				echo '<script src="'.base_url().'assets2/dist/sweetalert.min.js"></script>';
				echo '<body><script>swal("Success!","Certificate of Employment has been uploaded!","success");
				setTimeout(function() {window.location.href="'.base_url('user/profile').'"},2000);</script></body>';
			}
			

	}

}