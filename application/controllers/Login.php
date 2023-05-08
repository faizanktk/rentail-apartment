<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        
    }

	public function index()
	{
		if(!$this->session->userdata('loginid')){
			$header_data['activelink']='login';
			$this->load->view('common/header',$header_data);
			$this->load->view('login/login');
			$this->load->view('common/footer');
		}else{
			redirect('home');
		}	
	}
	
	//----- User Login -------------
	public function userlogin(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$redirurl = $this->input->post('redirurl');
		
		$login_url = base_url().'login';
		$signup_url = base_url().'login/signup';
		$reset_url = base_url().'login/reset_password';
		
		if($username!='' && $password!='' && !empty($username) && !empty($password)){
			
			$result = $this->common_model->get_table_data('users','*',array('username'=>$username,'password'=>$password),'',$row=1);

			//print_r($result);
			//exit;
			
			
			
			if($result){
				if($result['status']==1){
					 $data = array(
                            'loginid'=> $result['id'],
							'email'=>$result['email'],
							'role'=>$result['role'],
							'username'=>$result['username']
                            );
					 //print_r($data);exit;
					$this->session->set_userdata($data);

					print_r($this->session->userdata['username']);
					//exit;
					
					if(isset($redirurl) && $redirurl!=$login_url && $redirurl!=$signup_url && $redirurl!=$reset_url)
						redirect($redirurl);
					else	
					 	redirect('home');
					
				}elseif($result['status']==0){
				
					$this->session->set_flashdata('message_name', 'Your account is Temporarily Deactive contact with adminstrator');
					 redirect('login');
				}
				
			}else{
				$this->session->set_flashdata('message_name', 'Invalid Username or Password');
				 redirect('login');
			}	
			
		}else{
			$this->session->set_flashdata('message_name', 'Invalid Username or Password');
			redirect('login');
		}
	}
	
	//----- Sign UP view ------------
	public function signup()
	{
		$header_data['activelink']='login';
		
		/*$date = date("Y-m-d");
		$date = strtotime(date("Y-m-d", strtotime($date)) . " +12 month");
		$date = date("Y-m-d",$date);
		echo $date;
		exit;*/
		
		$this->load->view('common/header',$header_data);
		$this->load->view('login/signup');
		$this->load->view('common/footer');
	}
	
	//----------- Registration Form Submittion --------------------
	public function register(){
	
	$username = $this->input->post('username');
	$email = $this->input->post('email');
	$password = $this->input->post('password');
	$confirm = $this->input->post('confirmpassword');
	
	$redirurl = $this->input->post('redirurl');
	
	if($password!=$confirm){
	
		$this->session->set_flashdata('message_name', "<strong>Password!</strong> doesn't match");
		redirect('login/signup');
	}
	
		if($username!='' && $email!='' && $password!=''){
		
			$this->session->set_flashdata('username', $username);
			$this->session->set_flashdata('email', $email);
			
			$count_username = $this->common_model->count_rows('users',array('username'=>$username));
				if($count_username>0){
					$this->session->set_flashdata('message_name', 'Username Already Exist!');
					 redirect('login/signup');
				}
			
			
			$count_email = $this->common_model->count_rows('users',array('email'=>$email));
				if($count_email>0){
					$this->session->set_flashdata('message_name', 'Email Already Exist!');
					 redirect('login/signup');
				}
			
			$date = date('Y-m-d H:i:s');
			$role = 'user';
			$data = array(
				'username' => $username,
				'email' => $email,
				'password' => md5($password),
				'role' => $role,
				'status' => '1',
				'created_date' => $date
				);
				//print_r($data);
				
				$this->common_model->insert_table('users',$data);// Insert ito users table
				$id = $this->db->insert_id();
				
				
				$profile_data = array(
								'email' => $email,
								'user_id' => $id,
								'created_date' =>$date
								);
				$this->common_model->insert_table('profile',$profile_data);	// insert into profile table
				
				
				$news_data = array('email'=>$email,
					  'created_date'=>$date);
					  
				$this->common_model->insert_table('subscribe_to_news',$news_data);// insert into subscribe to news table			
				
				// -- insert Membership ---------------
				$role  = $this->common_model->get_table_data('`role`','no_of_month,no_of_property',array('id'=>1),'',$r=1);
				
				$exdate = strtotime(date("Y-m-d", strtotime($date)) . " +".$role['no_of_month']." month");
				$expiray_date = date("Y-m-d",$exdate);
				
				$membership_data = array(
										'user_id'=>$id,
										'role_id'=>'1',
										'registration_date' =>$date,
										'expiray_date' =>$expiray_date,
										'remaining_property'=>$role['no_of_property'],
										'created_date' =>$date
										);
				$this->common_model->insert_table('membership',$membership_data);							
											
				//-------- Session ----------------//							
				
				if($id>0){
					$session_data = array(
                            'loginid'=> $id,
							'email'=>$email,
							'role'=>$role,
							'username'=>$username
                            );
					$this->session->set_userdata($session_data);
					
					//----- Send email to user ----------
					$config = array (
							//'smtp_host' => 'ssl://smtp.googlemail.com',
							  'mailtype' => 'html',
							  'charset'  => 'utf-8',
							  'priority' => '1'
							   );
						$subject = "Reset Password ";
					   $emailmessage = "Dear ".$username . ",<br>  Successfuly register to propr=erty site ";
								//$message = $this->load->view('home/email',$this->data,TRUE);
							$this->load->library('email', $config);
							  $this->email->set_newline("\r\n");
							  $this->email->from('no-reply@property.com'); // change it to yours
							  $this->email->to($email);// change it to yours
							  
							  $this->email->subject($subject);
							  $this->email->message($emailmessage);
							  $this->email->send();
							 
					//-------------------
					$login_url = base_url().'login';
					$signup_url = base_url().'login/signup';
					$reset_url = base_url().'login/reset_password';
					
					if(isset($redirurl) && $redirurl!=$login_url && $redirurl!=$signup_url && $redirurl!=$reset_url)
						redirect($redirurl);
					else	
					 	redirect('home');
					
				}else{
					$this->session->set_flashdata('message_name', 'Error During Insertion');
					redirect('login/signup');
				}
				
		}else{
			$this->session->set_flashdata('message_name', 'Following Fields Are Required');
			redirect('login/signup');
		}
	
	}
	//------------- Reset Password ------------------------
	
		public function reset_password(){
	
			$header_data['activelink']='login';
			$this->load->view('common/header',$header_data);
			
			$this->load->view('login/reset_password');
			$this->load->view('common/footer');
		}
	
		//--------  -----------------
	
			public function reset_password_email(){
				$date = date('Y-m-d H:i:s');
				
				$email = $this->input->post('email'); 
				
				$email_id  = $this->common_model->get_table_data('users','id',array('email'=>$email),'',$r=1);
				if($email_id['id']>0){
					
					$length = 8;
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$randomString = '';
				
					for ($i = 0; $i < $length; $i++) {
						$randomString .= $characters[rand(0, strlen($characters) - 1)];
					}

					
						/* $config = Array(
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
							//'smtp_host' => 'ssl://smtp.googlemail.com',
							  'mailtype' => 'html',
							  'charset'  => 'utf-8',
							  'priority' => '1'
							   );
						$subject = "Reset Password ";
					   $emailmessage = "Your new password is  $randomString ";
								//$message = $this->load->view('home/email',$this->data,TRUE);
							$this->load->library('email', $config);
							  $this->email->set_newline("\r\n");
							  $this->email->from('no-reply@property.com'); // change it to yours
							  $this->email->to($email);// change it to yours
							  
							  $this->email->subject($subject);
							  $this->email->message($emailmessage);
							  if($this->email->send())
							 {
							 	$this->common_model->update_table('users',array('password'=>md5($randomString)),array('id'=>$email_id['id']));
							 	 echo '1';
							 }
							 else
							{
								echo '2';
							 //show_error($this->email->print_debugger());
							}
					
					
					
				}else{
				
					 echo '0';		  
				}				
								
			
			}

	
	//------------ End rest Password -----------------------
	//--- User Email check -----------------
	 public function user_email_checks() {
		if(isset($_GET['email']))
		   {
			$email=$_GET['email'];
			 $count_email = $this->common_model->count_rows('users',array('email'=>$email));
			 
				if($count_email>0){
				  
				   echo 'false';
				   }
					else
				   {
				   echo 'true';
				   }
			 }
			 else
			 {
				echo 'false';
			 }   
		  }
	
	
	
	
	//--- User name check -----------------
	 public function user_name_checks() {
		if(isset($_GET['username']))
		   {
			$username=$_GET['username'];
			 $count_username = $this->common_model->count_rows('users',array('username'=>$username));
			 
				if($count_username>0){
				  
				   echo 'false';
				   }
					else
				   {
				   echo 'true';
				   }
			 }
			 else
			 {
				echo 'false';
			 }   
		  }
	
//============= End controller ==================================	
}
