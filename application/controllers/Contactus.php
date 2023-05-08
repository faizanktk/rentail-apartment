<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

	function __construct() {
			parent::__construct();
			
	}
		
	public function index(){
	
		 $header_data['activelink'] = 'contactus';
		$this->load->view('common/header',$header_data);
		$this->load->view('home/contactus');
		$this->load->view('common/footer');
	}
	
	
	public function send_mail() { 
	
	
	$name=$this->input->post('name');
	$subject=$this->input->post('subject');
	$emailmessage=$this->input->post('emailmessage');
	$email=$this->input->post('email');
	
	
	 
	
		 /*$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'adamsmith.ju@gmail.com', // change it to yours
		  'smtp_pass' => '0900adam1', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);*/
		
		$config = array (
			  'mailtype' => 'html',
			  'charset'  => 'utf-8',
			  'priority' => '1'
			   );
		
       
        //$message = $this->load->view('home/email',$this->data,TRUE);
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from($email); // change it to yours
      $this->email->to('chrissullivan794@gmail.com');// change it to yours
	  
      $this->email->subject($subject);
      $this->email->message($emailmessage);
      if($this->email->send())
     {
      echo '1';
     }
     else
    {
		echo '0';
     //show_error($this->email->print_debugger());
    }


      } 
	
	

}