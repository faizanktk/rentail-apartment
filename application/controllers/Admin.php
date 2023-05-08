<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
       
	   $this->load->model('admin_model'); 
	   $this->load->library("pagination");
    }
	
	public function index(){
	
	}
	
	public function view_users(){
		is_admin_in();
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 
		 $header_data['fullname'] = '';
		 if($data['users']){
		  $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name']; 
		}
		
		//-------pagination ----------
		//-- Start cond
		$cond = '';
		$url = '';
		$order ='asc';
		
		
		if(isset($_GET)){
			
			
			
			if(isset($_GET['key']) && !empty($_GET['key'])){	
				$key = $this->input->get('key');
				$url .="&key=$key";
				
				$cond .="u.username like '%$key%' or p.first_name like '%$key%' or p.last_name like '%$key%'";
			}
			
			if(isset($_GET['status']) && !empty($_GET['status'])){	
				$status = $this->input->get('status');
				$url .="&status=$status";
				
				if($status=='active'){
					$st=1;
				}elseif($status=='inactive'){
					$st=0;
				}
				$cond .=" and u.status='$st'";
			}	
			
			if(isset($_GET['order']) && !empty($_GET['order'])){	
				$order = $this->input->get('order');
				$url .="&order=$order";
				
				$order ="$order";
			}	
			
			
			$url = ltrim($url, '&');
			
			//echo '<br>'.$url;
			//echo '<br>'.$cond;//exit;
			 $cond = ltrim($cond, ' and');
		
		//exit;
		}
		
		
		//--end cond
		 $this->load->library('pagination');
		 $config['base_url'] = base_url('admin/view_users');
        $config['total_rows'] = $this->admin_model->total_count_users($cond);//$this->common_model->count_rows('users',array('role'=>'user'));
        $config['per_page'] = "30";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 3;//floor($choice);
		
		$config['suffix'] = '/filter?'.$url;
		//$config['first_url'] = '/filter?'.$url; 
		$config['first_url'] = $config['base_url'] . $config['suffix'];
		
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
        $data['all_users'] = $this->admin_model->get_all_users($config["per_page"], $data['page'],$cond,$order);    
		
		//print_r( $data['all_users']);exit;       

        $data['pagenations'] = $this->pagination->create_links();
		
		 //--------------------
		
		$header_data['activelink'] = 'users';
		
		$this->load->view('common/admin_header',$header_data);
		$this->load->view('admin/view_users',$data);
		$this->load->view('common/admin_footer');
	}
	
	//---------- View All Amenities ----------------
	public function view_amenities(){
	
		is_admin_in();
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 
		 $header_data['fullname'] = '';
		 if($data['users']){
		  $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name']; 
		}
		$header_data['activelink'] = 'amenities';
		
		//-------------------------------
		
		
		
		
		$this->load->library('pagination');
		 $config['base_url'] = base_url('admin/view_amenities');
        $config['total_rows'] = $this->common_model->count_rows('amenities');
        $config['per_page'] = "30";
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
        $data['amenities'] = $this->admin_model->get_all_amenities($config["per_page"], $data['page']);    
		
		//print_r( $data['all_users']);exit;       

        $data['pagenations'] = $this->pagination->create_links();
		//-----
		
		$this->load->view('common/admin_header',$header_data);
		$this->load->view('admin/view_amenities',$data);
		$this->load->view('common/admin_footer');
	}
	
	//------- Add amenities --------------
	
	public function add_amenities(){
	
		is_admin_in();
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 
		 $header_data['fullname'] = '';
		 if($data['users']){
		  $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name']; 
		}
		$header_data['activelink'] = 'amenities';
	
		$this->load->view('common/admin_header',$header_data);
		$this->load->view('admin/add_amenities',$data);
		$this->load->view('common/admin_footer');

	}
	
	//----------- Insert amenity --------------
	public function insert_amenities(){
		is_admin_in();
		
		$data = array('name' => $this->input->post('name'),'created_date'=>date('Y-m-d H:i:s'));
		$query=$this->db->insert('amenities', $data);
		
		if($query){
			echo '1';
		}else{
			echo '0';
		}
	
	
	}
	
	//---------- Delete amenity -----------------
	public function delete_amenity(){
		is_admin_in();
			
			$id= $this->input->post('id');
			
			$res= $this->db->delete('amenities', array('id' => $id));
			
				if ($res){
					echo "1";
				}else{
					echo "0";
				}
	
	}
	
	//==-0------- View all Properties - -------------------/
	public function view_properties(){
		is_admin_in();
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 
		 $header_data['fullname'] = '';
		 if($data['users']){
		  $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name']; 
		}
		
		$header_data['activelink'] = 'properties';
		//-------------------------------------
		
		$cond = '';
		$url = '';
		$order ='desc';
		$sort = '';
		
		if(isset($_GET)){
			
			if(isset($_GET['state']) && !empty($_GET['state']) && $_GET['state']!=''){
				$state_id = $this->input->get('state');
				$url .="state=$state_id";
				
				$cond .= " p.state_id='$state_id'";
			}
			
			if(isset($_GET['city']) && !empty($_GET['city'])){
				$city_id = $this->input->get('city');
				$url .="city=$city_id";
				
				$cond .= " and p.city_id='$city_id' ";
			}	
			if(isset($_GET['type']) && !empty($_GET['type'])){	
				$property_type = $this->input->get('type');
				$url .="&type=$property_type";
				
				$cond .=" and p.property_type='$property_type'";
			}
			if(isset($_GET['key']) && !empty($_GET['key'])){	
				$key = $this->input->get('key');
				$url .="&key=$key";
				
				//$cond .=" and p.title like '%$key%'";
				$cond .=" and (p.title like '%$key%' or p.address like '%$key%' or p.zipcode like '%$key%' or p.property_type like '%$key%' or p.description like '%$key%' or s.name like '%$key%' or c.name like '%$key%')";
			}
			if(isset($_GET['from']) && !empty($_GET['from'])){	
				$from = $this->input->get('from');
				$url .="&from=$from";
				
				$cond .=" and p.price >='$from'";
			}
			if(isset($_GET['to']) && !empty($_GET['to'])){	
				$to = $this->input->get('to');
				$url .="&to=$to";
				
				$cond .=" and p.price <='$to'";
			}
			if(isset($_GET['order']) && !empty($_GET['order'])){	
				$order = $this->input->get('order');
				$url .="&order=$order";
				
				$order ="$order";
			}
				
			if(isset($_GET['price']) && !empty($_GET['price'])){	
				$price = $this->input->get('price');
				$url .="&price=$price";
				
				$sort .="$price";
			}	
			
			if(isset($_GET['publish']) && !empty($_GET['publish'])){	
				$publish = $this->input->get('publish');
				$url .="&publish=$publish";
				
				$sort .=",publish_date";
			}	
			
			
			//----------------------------
			
			$url = ltrim($url, '&');
			
			//echo '<br>'.$url;
			//echo '<br>'.$cond;//exit;
			
		}
		
		$cond = ltrim($cond, ' and');
		$sort = ltrim($sort, ',');
		
		//-------pagination ----------
			
		 $this->load->library('pagination');
		 $config['base_url'] = base_url('admin/view_properties');
        $config['total_rows'] = $this->common_model->total_count_properties($cond);//count_rows('property p',$cond);
        $config['per_page'] = "12";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 3;//floor($choice);
		
		$config['suffix'] = '/filter?'.$url;
		//$config['first_url'] = '/filter?'.$url; 
		$config['first_url'] = $config['base_url'] . $config['suffix'];
		
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
        $data['all_properties'] = $this->admin_model->get_all_properties($config["per_page"], $data['page'],$cond,$order,$sort);    
		
		//print_r( $data['all_users']);exit;       

        $data['pagenations'] = $this->pagination->create_links();
		
		 //--------------------
		$data['states'] = $this->common_model->get_table_data('states','*');
		$data['cities'] = $this->common_model->get_table_data('cities','*','','name asc'); 
		
		$this->load->view('common/admin_header',$header_data);
		$this->load->view('admin/view_properties',$data);
		$this->load->view('common/admin_footer');
	}
	
	//------- Delete Property ----------
	public function delete_property(){
		is_admin_in();
	
	$id= $this->input->post('id');
	
	$res= $this->db->delete('property', array('id' => $id));
	
	
	$images = $this->common_model->get_table_data('property_images','image',array('property_id'=>$id));
	if(!empty($images)){
		foreach($images as $row){
			$path = $_SERVER['DOCUMENT_ROOT']."/rental_apartment/uploads/".$row['image'];
			unlink($path);
		}
		
	}
	
	$this->db->delete('property_images', array('property_id' => $id));
	$this->db->delete('property_aminities', array('property_id' => $id));
	
		if ($res){
			echo "1";
		}else{
			echo "0";
		}
	
	}
	
//=====-------------------------------------=============================	
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
		
		echo "<label>City</label><select name='city_id' class='form-control' required='required'><option value=''>--Select City--</option>"; 
		foreach($result as $row){ 
			
				echo "<option value='".$row['id']."'>".$row['name']."</option>"; 
				
		}
		echo "</select>";
	
	}
	//-------- User Status Change ---------------------
	
	public function user_status(){
		is_admin_in();
	
	$user_id= $this->input->post('user_id');
	$status= $this->input->post('status');
		if($status==1){
			$value = '0';
		}else{
			$value = '1';
		}
	$data = array('`status`' => $value);
		
		$this->db->where('id', $user_id);	 
		$query=$this->db->update('users', $data);
		//echo $this->db->last_query();exit;
		if ($query){
			echo '1';
		}else{
			echo '0';
		}
	}
	
	
	//-------- User Property Change ---------------------
	
	public function property_status(){
		is_admin_in();
	
	$property_id= $this->input->post('property_id');
	$status= $this->input->post('status');
		if($status==1){
			$value = '0';
		}else{
			$value = '1';
		}
	$data = array('`status`' => $value);
		
		$this->db->where('id', $property_id);	 
		$query=$this->db->update('property', $data);
		//echo $this->db->last_query();exit;
		if ($query){
			echo '1';
		}else{
			echo '0';
		}
	}
	//------------- Featured -----------------------//
	public function featured_status(){
		is_admin_in();
	
	$property_id= $this->input->post('property_id');
	$featured= $this->input->post('featured');
		if($featured=='yes'){
			$value = 'no';
		}else{
			$value = 'yes';
		}
	$data = array('`featured`' => $value);
		
		$this->db->where('id', $property_id);	 
		$query=$this->db->update('property', $data);
		//echo $this->db->last_query();exit;
		if ($query){
			echo '1';
		}else{
			echo '0';
		}
	}
	//------------- Delete User --------------------------
	
	public function delete_user(){
		is_admin_in();
	
	$id= $this->input->post('user_id');
	
	$res= $this->db->delete('users', array('id' => $id));
	
		if ($res){
			echo "1";
		}else{
			echo "0";
		}
	}	
	
	//================ End controller =====================================
	
}
