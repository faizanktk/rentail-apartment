<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
			parent::__construct();
			
	}
		
	public function index(){
	
	
	
		$data['properties'] = $this->common_model->get_home_properties();
		$data['featured'] = $this->common_model->get_featured_properties();
		//echo '<pre>';
		//print_r($data['featured']);exit;
		
		$data['count_house'] = $this->common_model->count_rows('property',array('property_type'=>'house','published'=>'1','status'=>'1'));
		$data['count_condos'] = $this->common_model->count_rows('property',array('property_type'=>'condos','published'=>'1','status'=>'1'));
		$data['count_villa'] = $this->common_model->count_rows('property',array('property_type'=>'villa','published'=>'1','status'=>'1'));
		$data['count_apartment'] = $this->common_model->count_rows('property',array('property_type'=>'apartment','published'=>'1','status'=>'1'));
		
		$data['states'] = $this->common_model->get_table_data('states','*'); 
		$data['cities'] = $this->common_model->get_table_data('cities','*','','name asc'); 
		 
		// echo '<pre>';
		//print_r($this->session->userdata);exit;
		//print_r($data['cities']);exit;
		 
		$this->load->view('common/home_header');
		$this->load->view('home/home',$data);
		$this->load->view('common/footer');
	}
	
	//-------- Subscrib to news -----------------
	
	
	public function subscribe_to_news(){
	$date = date('Y-m-d H:i:s');
	$email = $this->input->post('subscribemail'); 
	
	$email_id  = $this->common_model->get_table_data('subscribe_to_news','id',array('email'=>$email),'',$r=1);
	if($email_id>0){
		echo '0';
	}else{
		$data = array('email'=>$email,
					  'created_date'=>$date);
					  
		$this->common_model->insert_table('subscribe_to_news',$data);
		 $id = $this->db->insert_id();	
		 echo '1';		  
	}				
					
	
	}

	//------ Term And Condition ----------------------
	
	public function termsandconditions(){
		
		$user = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		$header_data['profile_image'] = $user['profile_image']; 
		 
		 $header_data['fullname'] = $user['first_name'].' '.$user['last_name']; 
		 $header_data['activelink'] = 'termandconditions';
		 
		$this->load->view('common/header',$header_data);
		$this->load->view('home/termandconditions');
		$this->load->view('common/footer');
	}	


////---------------- Agax get cities -------------------
	public function search_getcities(){
		$state_id = $this->input->post('state_id');
		$result = $this->common_model->get_table_data('cities','*',array('state_id'=>$state_id));
		
		echo "<select class='form-control' name='city'><option value=''>City</option>"; 
		
		foreach($result as $row){ 
			
				echo "<option value='".$row['id']."'>".$row['name']."</option>"; 
				
		}
		echo "</select>";
	
	}
//====================== Conteroller End =====================================	
}
