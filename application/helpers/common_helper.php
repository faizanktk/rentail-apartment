<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    if(!function_exists('is_admin_in')){
    function is_admin_in()
    {
    $CI =& get_instance();
    $is_admin_in = $CI->session->userdata('loginid');
	$is_type = $CI->session->userdata('role');
       if(!isset($is_admin_in) || $is_admin_in != true || $is_type!='admin')
       {
          redirect('login');
       }
    
    }
	
	 if(!function_exists('is_user_in')){
    function is_user_in()
    {
    $CI =& get_instance();
    $is_user_in = $CI->session->userdata('loginid');
	$is_type = $CI->session->userdata('role');
       if(!isset($is_user_in) || $is_user_in != true )
       {
          redirect('login');
       }
    
    }
	
	}
}