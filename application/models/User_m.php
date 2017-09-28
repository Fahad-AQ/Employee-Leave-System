<?php
class User_m extends CI_Model {

   	public function getUserDetails($param){
	
	$this->db->select('*');
	$this->db->from('employee emp'); 
	$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	$this->db->where('emp.EMP_ID',$param["employeeId"]);         
	$results = $this->db->get();
	if($results->num_rows() > 0){
	return $results->result_array();
	}else{
	return false;
	}
   }


	public function userDetails($id){
	
	$this->db->select('*');
	$this->db->from('employee emp'); 
	$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
	$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
	$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
	$this->db->where('emp.EMP_ID',$id);         
	$results = $this->db->get();
	if($results->num_rows() > 0){
	return $results->result_array();
	}else{
	return false;
	}
	}

	public function login($param){

	$result = $this->db->get_where('employee', array('EMP_EMAIL'=> $param['email']));
	if($result->num_rows() > 0){
		 $data = array('EMP_PHOTO'=>$param['photo']);
         $this->db->where('EMP_EMAIL', $param['email']);	
         $result = $this->db->update('employee', $data);
		if($result){
		        $this->db->select('*');
				$this->db->from('employee emp'); 
				$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
				$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
				$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
				$this->db->where('emp.EMP_EMAIL',$param["email"]);         
				$results = $this->db->get();
				if($results->num_rows() > 0){
					return $results->result_array();
				}
		}else{
			return false;
		}
	}
	else{
		return "Credential Not Created";
		}
	}

	public function allRequests(){

		$this->db->select('*');
		$this->db->from('leave_request lr'); 
		$this->db->join('employee emp', 'emp.EMP_ID = lr.LREQ_EMP_ID', 'INNER');
		$this->db->join('leave_type lt', 'lt.LTYPE_ID = lr.LREQ_LTYPE_ID', 'INNER');
		$this->db->join('leave_status ls', 'ls.LS_ID = lr.LREQ_STATUS_ID', 'INNER');
		$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
		$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
		$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
		$this->db->order_by('lr.LREQ_ID','asc');      
		$results = $this->db->get(); 
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
	}
	
     public function getUserRequest($param){

		$this->db->select('*');
		$this->db->from('leave_request lr'); 
		$this->db->join('employee emp', 'emp.EMP_ID = lr.LREQ_EMP_ID', 'INNER');
		$this->db->join('leave_type lt', 'lt.LTYPE_ID = lr.LREQ_LTYPE_ID', 'INNER');
		$this->db->join('leave_status ls', 'ls.LS_ID = lr.LREQ_STATUS_ID', 'INNER');
		$this->db->where('lr.LREQ_ID',$param["r_id"]);         
		$this->db->order_by('lr.LREQ_ID','asc');      
		$results = $this->db->get(); 
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
	}
	public function addRequest($param){

    $emp_id = $param['employeeId'];
	$emp_leaveStatus = 1;
	$emp_startDate = $param['startDate'];
	$emp_endDate = $param['endDate'];
	$result = $this->db->query("SELECT * FROM leave_request WHERE LREQ_EMP_ID = '$emp_id' AND LREQ_STATUS_ID = '1' OR LREQ_EMP_ID = '$emp_id' AND LREQ_STATUS_ID = '2' OR LREQ_EMP_ID = '$emp_id' AND LREQ_START >='$emp_startDate'  OR LREQ_EMP_ID = '$emp_id' AND LREQ_END >='$emp_endDate' OR LREQ_EMP_ID = '$emp_id' AND LREQ_START >='$emp_endDate' OR LREQ_EMP_ID = '$emp_id' AND LREQ_END >='$emp_startDate' ");
	if($result->num_rows() > 0){
		$arr = $result->result_array();
		return 'exist';
	}
	else{
		$results = $this->db->insert('leave_request', array('LREQ_EMP_ID'=> $param['employeeId'], 'LREQ_LTYPE_ID'=> $param['employeeLType'], 'LREQ_START'=> $param['startDate'],'LREQ_END'=> $param['endDate'],'LREQ_REQ_COMMENTS'=> $param['r_Comment'],'LREQ_STATUS_ID'=> $param['leaveStatus']));
		if($results){
			   return $this->db->insert_id();
		}else{
			return false;
		}
	  }
	}
	public function editRequest($param){
    $emp_id = $param['employeeId'];
	$emp_leaveStatus = 1;
	$emp_startDate = $param['startDate'];
	$emp_endDate = $param['endDate'];
	$r_id = $param['r_id'];
	$emp_LREQ_LTYPE_ID = $param['employeeLType'];
    $requesterComment = $param['r_Comment'];

	$result1 = $this->db->query("SELECT * FROM leave_request WHERE LREQ_ID ='$r_id' AND  LREQ_START='$emp_startDate' AND LREQ_END = '$emp_endDate' AND  LREQ_REQ_COMMENTS='$requesterComment' AND LREQ_LTYPE_ID = '$emp_LREQ_LTYPE_ID' AND LREQ_STATUS_ID ='$emp_leaveStatus' ");
	if($result1->num_rows() > 0){
		return 'exist'; 
	}

	else{
		$result2 = $this->db->query("SELECT * FROM leave_request WHERE LREQ_ID ='$r_id' AND  LREQ_START='$emp_startDate' AND LREQ_END = '$emp_endDate' AND  LREQ_REQ_COMMENTS='$requesterComment' AND ( LREQ_START != '$emp_startDate' OR LREQ_END != '$emp_endDate' OR LREQ_LTYPE_ID !='$emp_LREQ_LTYPE_ID') ");
		if($result2->num_rows() > 0){
			$updateArray = array('LREQ_LTYPE_ID'=> $param['employeeLType'], 'LREQ_START'=> $param['startDate'],'LREQ_END'=> $param['endDate'],'LREQ_REQ_COMMENTS'=> $param['r_Comment']);
			$result3 = $this->db->update('leave_request',  $updateArray , array('LREQ_ID'=> $param['r_id'] ));
			if($result3){
				return $param['r_id'] ;
			}else{
				return false;
			}
		}
		else{
			    $result4 = $this->db->query("SELECT * FROM leave_request WHERE LREQ_EMP_ID = '$emp_id' AND LREQ_START >= '$emp_startDate' AND LREQ_STATUS_ID != '1' OR LREQ_EMP_ID = '$emp_id' AND LREQ_END >= '$emp_endDate'  AND LREQ_STATUS_ID !='1' OR LREQ_EMP_ID = '$emp_id' AND LREQ_START >= '$emp_endDate' AND LREQ_STATUS_ID != '1' OR LREQ_EMP_ID = '$emp_id' AND LREQ_END >= '$emp_startDate' AND LREQ_STATUS_ID != '1' ");
				if($result4->num_rows() > 0){
					return 'exist';
				}

				else{
					$updateArray = array('LREQ_LTYPE_ID'=> $param['employeeLType'], 'LREQ_START'=> $param['startDate'],'LREQ_END'=> $param['endDate'],'LREQ_REQ_COMMENTS'=> $param['r_Comment']);
					$result5 = $this->db->update('leave_request',  $updateArray , array('LREQ_ID'=> $param['r_id'] ));
					if($result5){
						return  $param['r_id'] ;
					}else{
						return false;
					}
				}
		}
	 

	 }
	
	}



	public function getALApprovedDays($param){

	$this->db->select('*');    
	$this->db->from('leave_request');
	$this->db->where('leave_request.LREQ_EMP_ID',  $param['employeeId']);
	$this->db->where('leave_request.LREQ_LTYPE_ID', 1);
	$this->db->where('leave_request.LREQ_STATUS_ID', 4);
	$result = $this->db->get();
	if($result->num_rows() > 0){
	   return $result->result_array();
	}
	else{
		return false;	 
		}
	}

	public function getSLApprovedDays($param){

	$this->db->select('*');    
	$this->db->from('leave_request');
	$this->db->where('leave_request.LREQ_EMP_ID',  $param['employeeId']);
	$this->db->where('leave_request.LREQ_LTYPE_ID', 2);
	$this->db->where('leave_request.LREQ_STATUS_ID', 4);
	$result = $this->db->get();
	if($result->num_rows() > 0){
	   return $result->result_array();
	}
	else{
		return false;	 
		}
	}

	public function getULApprovedDays($param){

	$this->db->select('*');    
	$this->db->from('leave_request');
	$this->db->where('leave_request.LREQ_EMP_ID',  $param['employeeId']);
	$this->db->where('leave_request.LREQ_LTYPE_ID', 3);
	$this->db->where('leave_request.LREQ_STATUS_ID', 4);
	$result = $this->db->get();
	if($result->num_rows() > 0){
	   return $result->result_array();
	}
	else{
		return false;	 
		}
	}

    public function getMonthlyWithStandAndEnDLeave($id,$month){

	$result = $this->db->query("SELECT SUM(datediff(LREQ_END, LREQ_START)+1)  AS  Days , MONTH(LREQ_START) AS selectMONTH FROM leave_request WHERE MONTH(LREQ_START) = '$month' AND MONTH(LREQ_END) = '$month' AND LREQ_EMP_ID = '$id' AND LREQ_STATUS_ID = '4' ");
	if($result->num_rows() > 0){
	   return $result->result_array();
	}
	else{
		return 0;
		}
	}

	public function getMonthlyStartLeave($id,$month){

	$result = $this->db->query("SELECT Day(last_day(LREQ_START)) - Day(LREQ_START)+1  AS  Days , MONTH(LREQ_START) AS selectMONTH FROM leave_request WHERE MONTH(LREQ_START) = '$month' AND MONTH(LREQ_END) != '$month'  AND LREQ_EMP_ID = '$id' AND LREQ_STATUS_ID = '4'");
	if($result->num_rows() > 0){
	   return $result->result_array();
	}
	else{
		return 0;	 
		}
	}
	public function getMonthlyEnDLeave($id,$month){

	$result = $this->db->query("SELECT Day(LREQ_END)  AS  Days , MONTH(LREQ_END) AS selectMONTH FROM leave_request WHERE MONTH(LREQ_START) != '$month' AND MONTH(LREQ_END) = '$month' AND LREQ_EMP_ID = '$id' AND LREQ_STATUS_ID = '4' ");
	if($result->num_rows() > 0){
	   return $result->result_array();
	}
	else{
		return 0;
		}
	}
		public function getRequest($id){

		$this->db->select('*');
		$this->db->from('leave_request lr'); 
		$this->db->join('employee emp', 'emp.EMP_ID = lr.LREQ_EMP_ID', 'INNER');
		$this->db->join('leave_type lt', 'lt.LTYPE_ID = lr.LREQ_LTYPE_ID', 'INNER');
		$this->db->join('leave_status ls', 'ls.LS_ID = lr.LREQ_STATUS_ID', 'INNER');
		$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
		$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
		$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
		$this->db->where('lr.LREQ_ID',$id);  
		$this->db->order_by('lr.LREQ_ID','asc');      
		$results = $this->db->get(); 
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
		}

		public function getManagerDetails($id){

		$this->db->select('*');
		$this->db->from('employee emp'); 
		$this->db->join('department dep', 'dep.DEPT_ID = emp.EMP_DEPT_ID', 'INNER');
		$this->db->join('designation des', 'des.DESG_ID = emp.EMP_DESG_ID', 'INNER');
		$this->db->join('role rol', 'rol.ROLE_ID = emp.EMP_ROLE_ID', 'INNER');
		$this->db->where('dep.DEPT_ID',$id);  
		$this->db->where('rol.ROLE_ID','2');   
		$results = $this->db->get(); 
		if($results->num_rows() > 0){
			return $results->result_array();
		}
		else{
			return false;
		}
		}

		
 
	/*public function market($mkt){
		//$this->db->insert('market', array('mname'=>$mkt));
	}

	public function getMarkets() {
		$result = $this->db->get('states');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function geteachMarket($m_id) {
		$result = $this->db->get_where('states', array('m_id'=>$m_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function editMarket($param) {
		$m_id = $param['m_id'];
		$this->db->where('m_id',$m_id);
		$result = $this->db->update('states', $param);
		if($result){return true;}else{return false;}
	}

	public function getStores() {
		$result = $this->db->get('stores');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function geteachStore($s_id) {
		$result = $this->db->get_where('stores', array('s_id'=>$s_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function editStore($param) {
		$s_id = $param['s_id'];
		$this->db->where('s_id',$s_id);
		$result = $this->db->update('stores', $param);
		if($result){return true;}else{return false;}
	}

	public function geteachQuestion($q_id) {
		$result = $this->db->get_where('questions', array('q_id'=>$q_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function editQuestion($param) {
		$q_id = $param['q_id'];
		$this->db->where('q_id',$q_id);
		$result = $this->db->update('questions', $param);
		if($result){return true;}else{return false;}
	}

	public function getstMarkets() {
		$result = $this->db->get_where('states', array('status'=>'active'));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getstrMarket($m_id) {
		$result = $this->db->get_where('stores', array('m_id'=>$m_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getCategory() {
		$result = $this->db->get_where('checklistcategory', array('status'=>'active'));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getQSteps() {
		$result = $this->db->get_where('questionssteps', array('status'=>'active'));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getQuestions() {
		$result = $this->db->get('questions');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getRole() {
		$result = $this->db->get('role');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getSd() {
		$result = $this->db->get('sddetails');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getUsers() {
		$result = $this->db->get('users');
		if($result->num_rows() > 0){return $result->result();}else{return false;}
	}

	public function addMarket($param){
		$result = $this->db->insert('states', $param);
		if($result){return true;}else{return false;}
	}

	public function addStore($param){
		$result = $this->db->insert('stores', $param);
		if($result){return true;}else{return false;}
	}

	public function addQuestion($param){
		$result = $this->db->insert('questions', $param);
		if($result){return true;}else{return false;}
	}

	public function addUsersss($data){
		$result = $this->db->insert('users', $data);
		if($result){return true;}else{return false;}
	}

	public function fatchUserId() {
		$this->db->select_max('auid');
		$result = $this->db->get('users');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function addUser($data){
		$result = $this->db->insert('userstates', $data);
		if($result){return true;}else{return false;}
	}

	public function geteachUser($us_id) {
		$result = $this->db->get_where('users', array('u_id'=>$us_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getuserMarket($us_id) {
		/*$result = $this->db->get_where('userstates', array('auid'=>$us_id));
		$this->db->from('users, userstates, states');
		$this->db->where('users.u_id = userstates.u_id');
		$this->db->where('userstates.stateid = states.m_id');
		$this->db->where('users.u_id =',$us_id);
		$result = $this->db->get();
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function editUser($param) {
		$auid = $param['auid'];
		$this->db->where('u_id',$auid);
		$result = $this->db->update('users', $param);
		if($result){return true;}else{return false;}
	}

	public function edituserState($param) {
		$us_id = $param['us_id'];
		$auid = $param['auid'];
		$this->db->where('us_id',$us_id);
		$this->db->where('auid',$auid);
		$result = $this->db->update('userstates', $param);
		if($result){return true;}else{return false;}
	}

	public function inserteachMarket($param) {
		$result = $this->db->insert('userstates',$param);
		if($result){return true;}else{return false;}
	}

	public function deluserState($param) {
		$this->db->where('auid', $param);
		$result = $this->db->delete('userstates');
		//$result = $this->db->delete('userstates', array('auid' => $param));
		if($result){return true;}else{return false;}
	}

	public function getAllChecklists() {
		$result = $this->db->get_where('storereview');
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function totalCount() {
		$result = $this->db->get_where('storereview', array('rvstatus'=>'pending'));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	/*public function sdStores(){
		if($this->session->userdata('r_id') == 6){
			$query = $this->db->get('store');
		}else{
			$this->db->select('*');
			$this->db->from('users u');
			$this->db->join('store s', 'u.auid = s.sd', 'left');
			$this->db->where('u.uname',$this->session->userdata('uname'));
			$query = $this->db->get();
		}

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function sdIDStores($id){
		$this->db->select('*');
		$this->db->from('users u');
		$this->db->join('store s', 'u.auid = s.sd', 'left');
		$this->db->where('s.sd',$id);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function getMStores($m_id){
		$result = $this->db->get_where('store', array('m_id'=>$m_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getSDStores($m_id,$auid){
		if($auid != '')$this->db->where('sd',$auid);
		$result = $this->db->get_where('store', array('m_id'=>$m_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getStore($id){
		$query = $this->db->get_where('store',array('s_id'=>$id));
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function editStore($id,$param) {
		$this->db->where('s_id',$id);
		$result = $this->db->update('store',$param);
		if($result){return true;}else{return false;}
	}

	public function user($user){
		$this->db->insert('users',array('r_id'=>trim($user[0]),'uname'=>trim($user[1]), 'uphone'=>trim($user[2])));
	}

	public function login($param){
		$username = strtolower($param['username']);
		//if($username=='admin'){
			$result = $this->db->get_where('users', array('uname'=>trim($username)));
			if($result->num_rows() > 0){
				return $result->result_array();
			}else{
				return false;
			}
		//}
	}

	public function update($tablename,$updatearray,$id) {
		$this->db->where($id);
		$this->db->update($tablename,$updatearray);
	}

	public function addMarket($param){
		$result = $this->db->insert('market', $param);
		if($result){return true;}else{return false;}
	}

	public function addStore($param){
		$result = $this->db->insert('store', $param);
		if($result){return true;}else{return false;}
	}

	public function getUsers(){
		$result = $this->db->get('users');
		if($result->num_rows() > 0){return $result->result();}else{return false;}
	}

	public function storeStatus($status,$s_id) {
		$this->db->where('s_id',$s_id);
		$result = $this->db->update('store',array('status'=>$status));
		if($result){return true;}else{return false;}
	}

	public function getUser($auid){
		$result = $this->db->get_where('users',array('auid'=>$auid));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}

	public function getUserID($uname){
		$result = $this->db->get_where('users',array('uname'=>$uname));
		if($result->num_rows() > 0){return $result->first_row()->auid;}else{return false;}
	}

	public function addUser($param){
		$result = $this->db->insert('users', $param);
		if($result){return true;}else{return false;}
	}

	public function editUser($id, $param){
		$this->db->where('auid',$id);
		$result = $this->db->update('users',$param);
		if($result){return 'true';}else{return 'false';}
	}

	public function getRoles(){
		$result = $this->db->get('role');
		if($result->num_rows() > 0){return $result->result();}else{return false;}
	}

	public function getMarket($m_id){
		$result = $this->db->get_where('market',array('m_id'=>$m_id));
		if($result->num_rows() > 0){return $result->result_array();}else{return false;}
	}*/

}
