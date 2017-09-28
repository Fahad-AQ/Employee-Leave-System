<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manager extends CI_Controller {

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
	 * @see https://codeigniter.com/manager_guide/general/urls.html
	 */
	public function index(){
		if($this->session->userdata('role') == 'Manager' && $this->session->userdata('status') == '1' || $this->session->userdata('role') == 'Departmental' && $this->session->userdata('status') == '1'   ){
         redirect(base_url("manager/dashboard"));
		}else{
          $this->load->view('manager/login');
		}
        
	}

	public function login(){
	   if($_POST){
			$user = $this->manager_m->login($_POST);
			if($user == "Credential Not Created"){
				$data = array('status'=> "Credential Not Created");
			}
			else if($user){
                    $userdata = array('id'=> $user[0]['EMP_ID'] ,'batchId'=> $user[0]['EMP_BADGE_ID'], 'name' => $user[0]['EMP_NAME'], 'email' => $user[0]['EMP_EMAIL'] , 'photo' => $user[0]['EMP_PHOTO'] , 'role' => $user[0]['ROLE_NAME'] ,'roleId' => $user[0]['ROLE_ID'] , 'designation' => $user[0]['DESG_NAME'] ,'designationId' => $user[0]['DESG_ID'], 'department' => $user[0]['DEPT_NAME'], 'departmentId' => $user[0]['DEPT_ID'], 'cnic' => $user[0]['EMP_CNIC'], 'contact' => $user[0]['EMP_CONTACT'], 'address' => $user[0]['EMP_ADD'],'dob' => $user[0]['EMP_DOB'],'doj' => $user[0]['EMP_DOJ'],'status' => $user[0]['EMP_STATUS'],'remaining_annuals' => $user[0]['EMP_REMAINING_ANNUAL'],'remaining_sicks' => $user[0]['EMP_REMAINING_SICK']);
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
		check_manager_login();
		if($this->session->userdata('DESG_ID') == '42'){
				$cd = array();
				$allDepartmentNames=array();
				$allDepartment=$this->manager_m->allDepartment();
				$allEmployees=$this->manager_m->alluser();
				$allDepartmentEmployees=array();
				foreach($allDepartment as $department){
					$allDepartmentEmployees[$department['DEPT_NAME']]=$this->manager_m->getEmployeeDepart($department['DEPT_ID']);
				}
				$data['allDepartmentEmployees']=$allDepartmentEmployees;
				foreach ($allDepartmentEmployees as $department => $employee){
					    $totalDays = 0;
						$allEmployeesNames = array();
						$allEmployeesLeaveDays = array();
						if($employee){
								foreach ($employee as $emp){
										$employeLeaveDays = $this->manager_m->getMonthlyWithStandAndEnDLeave($emp["EMP_ID"]);
										foreach($employeLeaveDays as $leaveDays){
											if($emp["EMP_ID"] == $leaveDays["UserId"]){
											array_push($allEmployeesLeaveDays,(int)$leaveDays["Days"]);
											$totalDays+=(int)$leaveDays["Days"];
											array_push($allEmployeesNames,$emp["EMP_NAME"]);
											}
										}	
								}
							if($totalDays > 0){
										$cd[]=array('y'=>$totalDays,'department'=>$department,'employees'=>$allEmployeesNames,'days'=>$allEmployeesLeaveDays);
										$allDepartmentNames[] = $department;
								}	
						}
				}
				$data['department']=$allDepartmentNames;
				$data['chartdata']=$cd;
				$this->load->view('manager/header');
				$this->load->view('manager/home',$data);
				$this->load->view('manager/footer');
		}
		else{
				$cd = array();
				$allDepartmentNames=array();
				$allDepartment=$this->manager_m->allDepartment();
				$allEmployees=$this->manager_m->alluser();
				$allDepartmentEmployees=array();
				foreach($allDepartment as $department){
					$allDepartmentEmployees[$department['DEPT_NAME']]=$this->manager_m->getEmployeeDepart($department['DEPT_ID']);
				}
				$data['allDepartmentEmployees']=$allDepartmentEmployees;
				foreach ($allDepartmentEmployees as $department => $employee){
				if($department == $this->session->userdata('department')){
					$totalDays = 0;
						$allEmployeesNames = array();
						$allEmployeesLeaveDays = array();
						if($employee){
								foreach ($employee as $emp){
										$employeLeaveDays = $this->manager_m->getMonthlyWithStandAndEnDLeave($emp["EMP_ID"]);
										foreach($employeLeaveDays as $leaveDays){
											if($emp["EMP_ID"] == $leaveDays["UserId"]){
											array_push($allEmployeesLeaveDays,(int)$leaveDays["Days"]);
											$totalDays+=(int)$leaveDays["Days"];
											array_push($allEmployeesNames,$emp["EMP_NAME"]);
											}
										}	
								}
							if($totalDays > 0){
										$cd[]=array('y'=>$totalDays,'department'=>$department,'employees'=>$allEmployeesNames,'days'=>$allEmployeesLeaveDays);
										$allDepartmentNames[] = $department;
								}	
						}
				}

					
				}
				$data['department']=$allDepartmentNames;
				$data['chartdata']=$cd;
				$this->load->view('manager/header');
				$this->load->view('manager/home',$data);
				$this->load->view('manager/footer');
		}
		
	}

   public function users(){
	   check_manager_login();
	       $data["allUsers"]=$this->admin_m->alluser();
	       $data["allDepartments"]=$this->admin_m->allDepartment();
		   $data["allDesignations"]=$this->admin_m->allDesignation();
		   $data["allRoles"]=$this->admin_m->allRole(); 
		   $this->load->view('manager/header');
		   $this->load->view('manager/users',$data);
		   $this->load->view('manager/footer');
	}
	


	public function getUserDetails(){
		$user = $this->manager_m->getUserDetails($_POST);
		$data = array();
		if($user){
			$data = array('status'=> 'get' ,'object'=> $user);
		}
		else{
			$data = array('status'=> 'error' ,'object'=>$user);
		}
		 echo json_encode($data);
	}


   public function requests(){
	   check_manager_login();
	       $data["allDepartments"]=$this->manager_m->allDepartment();
		   $data["allDesignations"]=$this->manager_m->allDesignation();
		   $data["allRoles"]=$this->manager_m->allRole(); 
	       $data["allRequests"] = $this->manager_m->allRequests();
		   $data["allLeaveStatus"] = $this->manager_m->allLeaveStatus();
		   $this->load->view('manager/header');
		   $this->load->view('manager/requests',$data);
		   $this->load->view('manager/footer');
	}
	public function remainingLeaves(){
	   check_manager_login();
	       $data["allDepartments"]=$this->manager_m->allDepartment();
		   $data["allDesignations"]=$this->manager_m->allDesignation();
		   $data["allRoles"]=$this->manager_m->allRole(); 
	       $data["allRequests"] = $this->manager_m->allRequests();
		   $data["allLeaveStatus"] = $this->manager_m->allLeaveStatus();
		   $this->load->view('manager/header');
		   $this->load->view('manager/remainingLeaves',$data);
		   $this->load->view('manager/footer');
	}

	public function selfRequests(){
	   check_manager_login();
	       $data["allDepartments"]=$this->manager_m->allDepartment();
		   $data["allDesignations"]=$this->manager_m->allDesignation();
		   $data["allRoles"]=$this->manager_m->allRole(); 
	       $data["allRequests"] = $this->manager_m->allRequests();
		   $data["allLeaveStatus"] = $this->manager_m->allLeaveStatus();
		   $this->load->view('manager/header');
		   $this->load->view('manager/selfRequests',$data);
		   $this->load->view('manager/footer');
	}

   public function addDepart(){
	    $add = $this->manager_m->addDepartment($_POST);
		   $data = array();
		   if($add == "exist"){
              $data = array('status'=> 'exist' ,'object'=>$add);
		   }
		   else if($add){
              $data = array('status'=> 'added' ,'object'=>$add);
		   }
		   else{
              $data = array('status'=> 'error' ,'object'=>$add);
		   }
		   echo json_encode($data);
	}

   public function addDesg(){
		   $add =$this->manager_m->addDesignation($_POST);
		   $data = array();
		   if($add == "exist"){
              $data = array('status'=> 'exist' ,'object'=>$add);
		   }
		   else if($add){
              $data = array('status'=> 'added' ,'object'=>$add);
		   }
		   else{
              $data = array('status'=> 'error' ,'object'=>$add);
		   }
		   echo json_encode($data);
	}

   public function addUser(){	
		   $add =$this->manager_m->addUser($_POST);
		   $data = array();
		   if($add == "exist"){
              $data = array('status'=> 'exist' ,'object'=>$add);
		   }
		   else if($add){
              $data = array('status'=> 'added' ,'object'=>$add);
		   }
		   else{
              $data = array('status'=> 'error' ,'object'=>$add);
		   }
		   echo json_encode($data);
	}
	public function editUser(){	
		   $obj =$this->manager_m->editUser($_POST);
		   $data = array();
		   if($obj == "exist"){
              $data = array('status'=> 'exist' ,'object'=>$obj);
		   }
		   else if($obj){
              $data = array('status'=> 'edited' ,'object'=>$obj);
		   }
		   else{
              $data = array('status'=> 'error' ,'object'=>$obj);
		   }
		   echo json_encode($data);

	}
	public function getUserRequest(){	
		   $obj =$this->manager_m->getUserRequest($_POST);
		   $data = array();
		   if($obj){
              $data = array('status'=> 'get' ,'object'=>$obj);
		   }
		   else{
              $data = array('status'=> 'error' ,'object'=>$obj);
		   }
		   echo json_encode($data);

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

					if($_POST["roleId"] == 2 && $_POST["designationId"] == 42 ){
						$manager_email = 'ejaz_ahmed@mobilelinkusa'; // HR Manager
					}
					if($_POST["roleId"] == 2 && $_POST["designationId"]  != 42 ){
						 $manager_email = 'nasim_farhan@mobilelinkusa.com';  // general Manager
					}
					if($_POST["roleId"] == 3 && $_POST["designationId"] == 42 ){
						$manager_email = 'ejaz_ahmed@mobilelinkusa'; // HR Manager
					}

					if($_POST["roleId"] == 3 && $_POST["designationId"]  != 42 ){
						 $manager_email = 'nasim_farhan@mobilelinkusa.com';  // general Manager
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

	public function editRequest(){
		    $data = array();  
		    $obj =$this->manager_m->editRequest($_POST);
			if($obj == 'exist'){
				$data = array('status'=> 'exist' ,'object'=>$obj);
			}
		    else if($obj){
			  $req_obj =$this->manager_m->getRequest($obj);
			  if($req_obj[0]["LREQ_STATUS_ID"] == 2){
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
					$requester_email = $req_obj[0]["EMP_EMAIL"];
					$hr_email ='ejaz_ahmed@mobilelinkusa.com';
					$email_list = $requester_email;
					$managerEmail = $this->session->userdata('email');
					$ccEmails = $managerEmail.",".$hr_email;
					$this->email->to($email_list);
					
					$this->email->cc($ccEmails);
					//$this->email->bcc('fahad_ahmed@mobilelinkusa.com');
					$this->email->set_mailtype("html");
					$this->email->subject('Employee Leave System Request');
					$data = array(
						'employee_name'=>$req_obj[0]["EMP_NAME"],
						'employee_department'=>$req_obj[0]["DEPT_NAME"],
						'manager_department'=> $this->session->userdata('department'),
						'manager_name'=> $this->session->userdata('name')
						);  
						
					$body = $this->load->view('email/done_manager.php',$data,TRUE);
					$this->email->message($body);   
					$this->email->send();
                 $data = array('status'=> 'edited' ,'object'=>$req_obj[0]);
			  }
			  else if($req_obj[0]["LREQ_STATUS_ID"] == 3){
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
					$requester_email = $req_obj[0]["EMP_EMAIL"];
					$hr_email ='ejaz_ahmed@mobilelinkusa.com';
					$email_list = $requester_email.",".$hr_email;
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
						
					$body = $this->load->view('email/decline_email.php',$data,TRUE);
					$this->email->message($body);   
					$this->email->send();
                 $data = array('status'=> 'edited' ,'object'=>$req_obj[0]);
			  }

		   else if($req_obj[0]["LREQ_STATUS_ID"] == 4){
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
					$manager_data = $this->manager_m->userDetails($req_obj[0]["LREQ_APP_ID"]); ;
					$requester_email = $req_obj[0]["EMP_EMAIL"];
					$manager_email = $manager_data[0]["EMP_EMAIL"];
					$hr_email ='ejaz_ahmed@mobilelinkusa.com';
					$email_list = $requester_email;
					$this->email->to($email_list);
					$ccEmail = $manager_email.",".$hr_email;

					$this->email->cc($ccEmail);
					//$this->email->bcc('fahad_ahmed@mobilelinkusa.com');
					$this->email->set_mailtype("html");
					$this->email->subject('Employee Leave System Request');
					$data = array(
						'employee_name'=>$req_obj[0]["EMP_NAME"],
						'employee_department'=>$req_obj[0]["DEPT_NAME"],
						'manager_name'=> $manager_data[0]["EMP_NAME"],
						'manager_department'=> $manager_data[0]["DEPT_NAME"],
						'hr_manager_name'=> $this->session->userdata('name'),
						'hr_manager_department'=> $this->session->userdata('department')
						);  
						
					$body = $this->load->view('email/done_hr.php',$data,TRUE);
					$this->email->message($body);   
					$this->email->send();
                    $data = array('status'=> 'edited' ,'object'=>$req_obj[0]);
			   }
			}
		   else if($obj == 'edited') {
              $data = array('status'=> 'edited' ,'object'=>$obj);
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


	public function userFileProcess(){
	   if(isset($_FILES['file']['name'])){
		  $array = explode('.', $_FILES['file']['name']);
           $extension = end($array);
			if($extension == 'csv'){
				if($_FILES["file"]["size"] < 8388608){
					$filename=$_FILES["file"]["tmp_name"];		
					if($_FILES["file"]["size"] > 0)
					{
						$file = fopen($filename, "r");
						while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
						{
						$obj =$this->manager_m->importUserSheet($getData);
							if($obj == 'exist')
							{
								echo "<script type=\"text/javascript\">
								alert('Data Already Exist')
								window.location= 'users';
								</script>";	
							}
							if($obj == 'true')
							{
								echo "<script type=\"text/javascript\">
								alert('Data has been Inserted')
								window.location= 'users';
								</script>";	
							}
							else {
								echo "<script type=\"text/javascript\">
								alert('Kindly Select Correct CSV FILE')
								window.location= 'users';
								</script>";	
								
							}
						}
						fclose($file);
						
					}
				}
				else{
					echo "<script type=\"text/javascript\">
								alert('Kindly Select Small Size File')
								window.location= 'users';
								</script>";
				}
			}
			else{
				echo "<script type=\"text/javascript\">
							alert('Kindly Select CSV FILE')
							window.location= 'users';
							</script>";
			}
		}

  }	
	public function exportUsers(){
       if(isset($_POST["Export"])){
			header('Content-Type: text/csv; charset=utf-8');  
			header('Content-Disposition: attachment; filename=employees.csv');  
			$output = fopen("php://output", "w");  
			fputcsv($output, array('Batch ID', 'Name', 'Father Name', 'CNIC', 'Contact', 'EMAIL', 'Date of Birth', 'Joining Date', 'Address', 'Department',  'Designation','Role')); 
			$obj =$this->manager_m->exportUsers($_POST);
			if($obj){
				foreach ($obj as $value) {
				fputcsv($output, $value); 
				}
				fclose($output);
			
			}
			else{
				fputcsv($output, array('0', '0', '0', '0','0', '0', '0', '0','0', '0', '0', '0'));  
				fclose($output);  
				
			} 
	   }
	
  }	


  public function requestFileProcess(){
	 if(isset($_FILES['requestFile']['name'])){
		  $array = explode('.', $_FILES['requestFile']['name']);
           $extension = end($array);
			if($extension == 'csv'){
				if($_FILES["requestFile"]["size"] < 8388608){
					$filename=$_FILES["requestFile"]["tmp_name"];		
					if($_FILES["requestFile"]["size"] > 0)
					{
						$file = fopen($filename, "r");
						while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
						{
						$obj =$this->manager_m->importRequestsSheet($getData);
							if($obj == 'exist')
							{
								echo "<script type=\"text/javascript\">
								alert('Data Already Exist')
								window.location= 'requests';
								</script>";	
							}
							if($obj == 'true')
							{
								echo "<script type=\"text/javascript\">
								alert('Data has been Inserted')
								window.location= 'requests';
								</script>";	
							}
							else {
								echo "<script type=\"text/javascript\">
								alert('Kindly Select Correct CSV FILE')
								window.location= 'requests';
								</script>";	
								
							}
						}
						fclose($file);
						
					}
				}
				else{
					echo "<script type=\"text/javascript\">
								alert('Kindly Select Small Size File')
								window.location= 'requests';
								</script>";
				}
			}
			else{
				echo "<script type=\"text/javascript\">
							alert('Kindly Select CSV FILE')
							window.location= 'requests';
							</script>";
			}
		}

  }	
	public function exportRequests(){
       if(isset($_POST["Export"])){
			header('Content-Type: text/csv; charset=utf-8');  
			header('Content-Disposition: attachment; filename=requests.csv');  
			$output = fopen("php://output", "w");  
			fputcsv($output, array('Batch ID', 'Name', 'Start Date', 'End Date','Leave Type', 'Requestor Comment', 'Leave Status')); 
			$obj =$this->manager_m->exportRequests($_POST);
			if($obj){
				foreach ($obj as $value) {
				fputcsv($output, $value); 
				}
				fclose($output);
			
			}
			else{
				fputcsv($output, array('0', '0', '0', '0','0', '0', '0', '0','0'));  
				fclose($output);  
				
			} 
	   }
	
  }	
  	public function managerChart(){
	   $data = array('status'=> 'success' ,'departmentArray'=>$allDepartmentNames,'employeeArray'=>$allEmployeesNames,'leaveDays'=>$allEmployeesLeaveDays);
       echo json_encode($data);
	
  }	
	
	public function logout(){
	 $this->session->sess_destroy();
	 redirect(base_url());
	}
}
?>