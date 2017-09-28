<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_admin_login'))
{
    function check_admin_login()
    {
    	$ci=& get_instance();
		$ci->load->helper('url');
        $ci->load->library('session');
    	if($ci->session->userdata('role') == 'Approver' && $ci->session->userdata('status') == '1'){
    		return true;
    	}
		else{
    		redirect(base_url("admin"));
    	}
    }   
}
if ( ! function_exists('check_manager_login'))
{
    function check_manager_login()
    {
    	$ci=& get_instance();
		$ci->load->helper('url');
        $ci->load->library('session');
    	if($ci->session->userdata('role') == 'Manager' && $ci->session->userdata('status') == '1' || $ci->session->userdata('role') == 'Departmental' && $ci->session->userdata('status') == '1' ){
    		return true;
    	}
		else{
    		redirect(base_url("manager"));
    	}
    }   
}
if ( ! function_exists('check_user_login'))
{
    function check_user_login()
    {
    	$ci=& get_instance();
		$ci->load->helper('url');
        $ci->load->library('session');
    	if($ci->session->userdata('role') == 'Requester' && $ci->session->userdata('status') == '1' ){
    		return true;
    	}
		else{
    		redirect(base_url("user"));
    	}
    }   
}


