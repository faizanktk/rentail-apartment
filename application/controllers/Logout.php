<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct() {
                parent::__construct();
               
        } 
		
	public function index(){
		
			$this->session->unset_userdata('loginid');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role');
			
			 $array_items = array('username' => '', 'email' => '','loginid'=>'', 'role'=>'');
 			$this->session->unset_userdata($array_items);
			
			
			redirect(base_url(), 'refresh');
	
	}
	
	

}
