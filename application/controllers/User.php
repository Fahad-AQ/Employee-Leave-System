<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/admin_guide/general/urls.html
	 */
	public function index(){
       	if($this->session->userdata('role') == 'Requester' && $this->session->userdata('status') == '1' ){
         redirect(base_url("user/dashboard"));
		}
		else{
          $this->load->view('user/login');
		}
	}
	public function login(){
	   if($_POST){
			$user = $this->admin_m->login($_POST);
			if($user == "Credential Not Created"){
				$data = array('status'=> "Credential Not Created");
			}
			else if($user){
                    $userdata = array('id'=> $user[0]['EMP_ID'] ,'batchId'=> $user[0]['EMP_BADGE_ID'], 'name' => $user[0]['EMP_NAME'], 'email' => $user[0]['EMP_EMAIL'] , 'photo' => $user[0]['EMP_PHOTO'] , 'role' => $user[0]['ROLE_NAME'] ,'roleId' => $user[0]['ROLE_ID'] , 'designation' => $user[0]['DESG_NAME'] ,'designationId' => $user[0]['DESG_ID'], 'department' => $user[0]['DEPT_NAME'], 'departmentId' => $user[0]['DEPT_ID'], 'cnic' => $user[0]['EMP_CNIC'], 'contact' => $user[0]['EMP_CONTACT'], 'address' => $user[0]['EMP_ADD'],'dob' => $user[0]['EMP_DOB'],'doj' => $user[0]['EMP_DOJ'],'status' => $user[0]['EMP_STATUS'],'remaining_annuals' => $user[0]['EMP_REMAINING_ANNUAL'],'remaining_sick' => $user[0]['EMP_REMAINING_SICK']);
					$this->session->set_userdata($userdata);
					$data = array('status'=> 'added' ,'object'=>$userdata);
			}
			else{
				$data = array('status'=> 'error' ,'object'=>$user);
			}
			echo json_encode($data);
		}	
   }

     public function dashboard(){
		 check_user_login();
		    $year=array(1,2,3,4,5,6,7,8,9,10,11,12);
			$reviewcount=array(0,0,0,0,0,0,0,0,0,0,0,0);
			foreach ($year as $key => $month){
				$mcount = $this->user_m->getMonthlyWithStandAndEnDLeave($this->session->userdata('id'),$month);
				
				for($i = 0; $i < count($mcount); $i++) {
						if($month == $mcount[$i]["selectMONTH"]){
							$reviewcount[$key] = (int)$mcount[$i]["Days"];
						}
					}
			}
			foreach ($year as $key => $month){
				$mcount3 = $this->user_m->getMonthlyEnDLeave($this->session->userdata('id'),$month);
				for($k = 0; $k < count($mcount3); $k++) {
					if($month == $mcount3[$k]["selectMONTH"]){
							$reviewcount[$key] += (int)$mcount3[$k]["Days"];
						}
				}
			}
            foreach ($year as $key => $month){
				$mcount2 = $this->user_m->getMonthlyStartLeave($this->session->userdata('id'),$month);
				for($j = 0; $j < count($mcount2); $j++) {
				 if($month == $mcount2[$j]["selectMONTH"]){
				 		$reviewcount[$key] += (int)$mcount2[$j]["Days"];
					}
				}
			}
            $data['leaves'] = $reviewcount; 
			$this->load->view('user/header');
			$this->load->view('user/home',$data);
			$this->load->view('user/footer');
	}
	 public function userChart(){
		    $year=array(1,2,3,4,5,6,7,8,9,10,11,12);
			$reviewcount=array(0,0,0,0,0,0,0,0,0,0,0,0);
			foreach ($year as $key => $month){
				$mcount = $this->user_m->getMonthlyWithStandAndEnDLeave($this->session->userdata('id'),$month);
				
				for($i = 0; $i < count($mcount); $i++) {
						if($month == $mcount[$i]["selectMONTH"]){
							$reviewcount[$key] = (int)$mcount[$i]["Days"];
						}
					}
			}
			foreach ($year as $key => $month){
				$mcount3 = $this->user_m->getMonthlyEnDLeave($this->session->userdata('id'),$month);
				for($k = 0; $k < count($mcount3); $k++) {
					if($month == $mcount3[$k]["selectMONTH"]){
							$reviewcount[$key] += (int)$mcount3[$k]["Days"];
						}
				}
			}
            foreach ($year as $key => $month){
				$mcount2 = $this->user_m->getMonthlyStartLeave($this->session->userdata('id'),$month);
				for($j = 0; $j < count($mcount2); $j++) {
				 if($month == $mcount2[$j]["selectMONTH"]){
				 		$reviewcount[$key] += (int)$mcount2[$j]["Days"];
					}
				}
			}
			
	   $data = array('status'=> 'success' ,'chartArray'=>$reviewcount);
       echo json_encode($data);
	}

	public function getUserDetails(){
		$user = $this->user_m->getUserDetails($_POST);
		$data = array();
		if($user){
			$data = array('status'=> 'get' ,'object'=> $user);
		}
		else{
			$data = array('status'=> 'error' ,'object'=>$user);
		}
		 echo json_encode($data);
	}

   public function viewUser(){
		   $this->load->view('user/header');
		   $this->load->view('user/userDetails');
		   $this->load->view('user/footer');
	}
	

      public function requests(){
		  check_user_login();
	       $data["allRequests"] = $this->user_m->allRequests();
		   $this->load->view('user/header');
		   $this->load->view('user/requests',$data);
		   $this->load->view('user/footer');
	}

	 public function addRequest(){
	        $user = $this->user_m->addRequest($_POST);
			$data = array();
			if($user == 'exist'){
				$data = array('status'=> 'exist');
			}
			else if($user){
				    $req_obj =$this->user_m->getRequest($user);
				    $config = Array(        
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://secure.emailsrvr.com',
						'smtp_port' => 465,
						'smtp_user' => 'fahad_ahmed@mobilelinkusa.com',
						'smtp_pass' => 'zarams12',
						'smtp_timeout' => '4',
						'mailtype'  => 'html', 
						'charset'   => 'iso-8859-1'
					);
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					$this->email->set_mailtype("html");
					$this->email->from($_POST["userEmail"],$this->session->userdata('name'));
					$user_email = $_POST["userEmail"];
					$manager_data = $this->user_m->getManagerDetails($req_obj[0]["DEPT_ID"]);
					$hr_email ='ejaz_ahmed@mobilelinkusa.com';

					if($_POST["roleId"] == 1){
						$manager_data = $this->user_m->getManagerDetails($req_obj[0]["DEPT_ID"]);
						$manager_email = $manager_data[0]["EMP_EMAIL"];	
					}


					$email_list = $manager_email;
					$this->email->to($email_list);
					
					$this->email->cc($hr_email.','.$user_email);
					//$this->email->bcc('fahad_ahmed@mobilelinkusa.com');
					$this->email->set_mailtype("html");
					$this->email->subject('Employee Leave System Request Test');
					$data = array(
						'employee_name'=>$req_obj[0]["EMP_NAME"],
						'employee_startDate'=> $req_obj[0]["LREQ_START"],
						'employee_endDate'=> $req_obj[0]["LREQ_END"],
						'employee_leaveType'=> $req_obj[0]["LTYPE_TYPE"]
						);  
						
					$body = $this->load->view('email/done_employee.php',$data,TRUE);
					$this->email->message($body);   
					$this->email->send();
				    $data = array('status'=> 'added');
			}
			else{
				$data = array('status'=> 'error' ,'object'=>$user);
			}
			echo json_encode($data);
	}
	public function getAllMonthLeaves(){
	        $all = $this->user_m->getAllMonthLeaves($_POST);
			echo json_encode($all);
	}


	public function getALApprovedDays(){
	        $al = $this->user_m->getALApprovedDays($_POST);
			echo json_encode($al);
	}

	public function getSLApprovedDays(){
	        $sl = $this->user_m->getSLApprovedDays($_POST);
			echo json_encode($sl);
	}
	public function getULApprovedDays(){
	        $ul = $this->user_m->getULApprovedDays($_POST);
			echo json_encode($ul);
	}
	
	public function getUserRequest(){	
		   $obj =$this->user_m->getUserRequest($_POST);
		   $data = array();
		   if($obj){
              $data = array('status'=> 'get' ,'object'=>$obj);
		   }
		   else{
              $data = array('status'=> 'error' ,'object'=>$obj);
		   }
		   echo json_encode($data);

	}
	
	public function editRequest(){	
		   $obj =$this->user_m->editRequest($_POST);
		   $data = array();
		   if($obj == 'exist'){
              $data = array('status'=> 'exist' ,'object'=>$obj);
		   }
		   else if($obj){
				    $req_obj =$this->user_m->getRequest($obj);
				    $config = Array(        
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://secure.emailsrvr.com',
						'smtp_port' => 465,
						'smtp_user' => 'fahad_ahmed@mobilelinkusa.com',
						'smtp_pass' => 'zarams12',
						'smtp_timeout' => '4',
						'mailtype'  => 'html', 
						'charset'   => 'iso-8859-1'
					);
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					$this->email->set_mailtype("html");
					$this->email->from($this->session->userdata('email'),$this->session->userdata('name'));
					$manager_data = $this->user_m->getManagerDetails($req_obj[0]["DEPT_ID"]);
					$hr_email ='fahad_ahmed@mobilelinkusa.com';
					$manager_email = $manager_data[0]["EMP_EMAIL"];
					$email_list = $manager_email.",".$hr_email;
					$this->email->to($email_list);
					
					//$this->email->cc('arif_khan@mobilelinkusa.com');
					$this->email->bcc('fahad_ahmed@mobilelinkusa.com');
					$this->email->set_mailtype("html");
					$this->email->subject('Employee Leave System Request');
					$data = array(
						'employee_name'=>$req_obj[0]["EMP_NAME"],
						'employee_startDate'=> $req_obj[0]["LREQ_START"],
						'employee_endDate'=> $req_obj[0]["LREQ_END"],
						'employee_leaveType'=> $req_obj[0]["LTYPE_TYPE"]
						);  
						
					$body = $this->load->view('email/done_employee.php',$data,TRUE);
					$this->email->message($body);   
					$this->email->send();
				    $data = array('status'=> 'edited');
			}
		   else{
              $data = array('status'=> 'error' ,'object'=>$obj);
		   }
		   echo json_encode($data);

	}
	// public function email($request_date){
    //     $config = Array(        
    //         'protocol' => 'smtp',
    //         'smtp_host' => 'ssl://secure.emailsrvr.com',
    //         'smtp_port' => 465,
    //         'smtp_user' => 'raja_ahsan@mobilelinkusa.com',
    //         'smtp_pass' => 'mobilelink@2',
    //         'smtp_timeout' => '4',
    //         'mailtype'  => 'html', 
    //         'charset'   => 'iso-8859-1'
    //     );
    //     $this->load->library('email', $config);
	// 	$this->email->set_newline("\r\n");
	// 	$this->email->set_mailtype("html");
    //     $this->email->from($this->session->userdata('v_email'),$this->session->userdata('v_name'));
	// 	$manager_email = $this->User_m->selectMatchUserAllInfo($this->session->userdata('v_email'));
	// 	$sd = $manager_email[0]['sd_email'];
	// 	$tm = $manager_email[0]['tm_email'];
	// 	$cm = $manager_email[0]['cm_email'];
	// 	$email_list = $sd.",".$tm.",".$cm;
	// 	$this->email->to($email_list);
		
	// 	//$this->email->cc('arif_khan@mobilelinkusa.com');
	// 	$this->email->bcc('raja_ahsan@mobilelinkusa.com');
	// 	$this->email->set_mailtype("html");
	// 	$this->email->subject('Time Correction Request');
	// 	$data = array(
	// 		'request_date'=> $request_date,
	// 		'user_name'=> $manager_email[0]['u_name'],
	// 		'user_role'=> $manager_email[0]['r_name'],
	// 		'store_name'=> $manager_email[0]['s_name'],
	// 		);  
			 
	// 	$body = $this->load->view('email/email_request.php',$data,TRUE);
	// 	$this->email->message($body);   
    //     $this->email->send();
    // }

	
	public function logout(){
	 $this->session->sess_destroy();
	 redirect(base_url());
	}
}
?>