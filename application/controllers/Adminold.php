<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminold extends CI_Controller {

	function __construct() {
        parent::__construct();
        
    }
	public function index(){
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		$data['cities'] = $this->common_model->get_table_data('cities','*');
		$data['states'] = $this->common_model->get_table_data('states','*');
		
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 
		 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name']; 
		 
		 //------------------------
		 $this->load->library('pagination');
		 $config['base_url'] = site_url('admin/index');
        $config['total_rows'] = $this->db->count_all('states');
        $config['per_page'] = "5";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 3;//floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<div class="pagination-wrapper"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['st'] = $this->common_model->get_stats($config["per_page"], $data['page']);           

        $data['links'] = $this->pagination->create_links();
		
		
		  
		 
		 
		 //--------------------
		
		$this->load->view('common/admin_header',$header_data);
		$this->load->view('admin/states',$data);
		$this->load->view('common/admin_footer');
		
	}
	
	public function profile(){ 
		is_user_in();
		
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		$data['cities'] = $this->common_model->get_table_data('cities','*');
		$data['states'] = $this->common_model->get_table_data('states','*');
		
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 
		 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name']; 
		
		$this->load->view('common/admin_header',$header_data);
		$this->load->view('user/profile',$data);
		$this->load->view('common/admin_footer');
	}
	
	
	public function update(){
		is_user_in();
		$user_id = $this->input->post('user_id');
		
		$update_data = array(
					'first_name' =>$this->input->post('first_name'),
					'last_name' =>$this->input->post('last_name'),
					'martial_status' =>$this->input->post('martial_status'),
					'family_member' =>$this->input->post('family_member'),
					'address' =>$this->input->post('address'),
					'state_id' =>$this->input->post('state_id'),
					'city_id' =>$this->input->post('city_id'),
					'country' =>'United States',
					'zipcode' =>$this->input->post('zipcode'),
					'mobile_no' =>$this->input->post('mobile_no'),
					'landline_no' =>$this->input->post('landline_no'),
					'social_security_no' =>$this->input->post('social_security_no'),
					'status' =>'1'
		
					);
					
				if($_FILES['profile_image']['name']){
				
					$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
					$uploaddir = $_SERVER['DOCUMENT_ROOT']."/rental_apartment/uploads/"; //a directory inside
					
					$filename = stripslashes($_FILES['profile_image']['name']);
					$size=filesize($_FILES['profile_image']['tmp_name']);
					//get the extension of the file in a lower case format
					  $ext = $this->getExtension($filename);
					  $ext = strtolower($ext);
					  
					  if(in_array($ext,$valid_formats)) {
				   
					   $image_name=time().$filename;
					  
					   $newname=$uploaddir.$image_name;
				   
					   if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $newname)) 
					   {
					   $time=time();
					   $update_data['profile_image'] = $image_name;
					   }
				   
			   
				 	 }
					
					
				}
				
				
				
			$this->common_model->update_table('profile',$update_data,array('user_id'=>$user_id));	
			$this->session->set_flashdata('message_name', 'Your profile udate successfully');	
				redirect('user/profile', 'refresh');
	
	}
	
	public function getExtension($str){
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
	}	
	
	//---------------- Agax get cities -------------------
	public function get_cities(){
		$state_id = $this->input->post('state_id');
		$result = $this->common_model->get_table_data('cities','*',array('state_id'=>$state_id));
		
		echo "<select name='city_id' class='form-control' required='required'><option value=''>--Select City--</option>"; 
		foreach($result as $row){ 
			
				echo "<option value='".$row['id']."'>".$row['name']."</option>"; 
				
		}
		echo "</select>";
	
	}
	
	
}
