<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller {

	 function __construct() {
        parent::__construct();
        
    } 
	
	public function index(){ 
		$cond = '';
		$url = '';
		$order ='desc';
		$sort = '';
		
		if(isset($_GET) && !empty($_GET)){ 
			
			//print_r($_GET);//exit;
			
			if(isset($_GET['state']) && !empty($_GET['state']) && $_GET['state']!=''){
				$state_id = $this->input->get('state');
				$url .="state=$state_id";
				
				$cond .= " p.state_id='$state_id'";
			}	
			
			if(isset($_GET['city']) && !empty($_GET['city']) && $_GET['city']!=''){
				$city_id = $this->input->get('city');
				$url .="city=$city_id";
				
				$cond .= " and p.city_id='$city_id'";
			}	
			if(isset($_GET['type']) && !empty($_GET['type'])){	
				$property_type = $this->input->get('type');
				$url .="&type=$property_type";
				
				$cond .=" and p.property_type='$property_type'";
			}
			if(isset($_GET['key']) && !empty($_GET['key'])){	
				$key = $this->input->get('key');
				$url .="&key=$key";
				
				$cond .=" and (p.title like '%$key%'  or p.address like '%$key%' or p.zipcode like '%$key%' or p.property_type like '%$key%' or p.description like '%$key%' or s.name like '%$key%' or c.name like '%$key%')";
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
		
		$cond .=" and status='1' and published = '1'";
		$cond = ltrim($cond, ' and');
		
		$sort = ltrim($sort, ',');
		
		$user = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		$header_data['profile_image'] = $user['profile_image']; 
		 
		 $header_data['fullname'] = $user['first_name'].' '.$user['last_name']; 
		 $header_data['activelink'] = 'properties';
		
		
		
		$data['user_id'] = $user['id'];
		//----------- Pagination ---------------
		
		 $this->load->library('pagination');
		 $config['base_url'] = base_url('property/index');
        $config['total_rows'] = $this->common_model->total_count_properties($cond);//count_rows('property p',$cond);
        $config['per_page'] = "12";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 3;//floor($choice);
		
		$config['suffix'] = '/filter?'.$url;
		//$config['first_url'] = '/filter?'.$url; 
		$config['first_url'] = $config['base_url'] . $config['suffix'];
		//$config['reuse_query_string'] = TRUE;
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
        $data['properties'] = $this->common_model->getproperties($config["per_page"], $data['page'],$cond,$order,$sort);    
		//echo '<pre>';
		//print_r( $data['properties']);exit;       

        $data['pagenations'] = $this->pagination->create_links();
	
		//-----------------------------------------
		$data['states'] = $this->common_model->get_table_data('states','*');
		$data['cities'] = $this->common_model->get_table_data('cities','*','','name asc'); 
		//$data['properties'] = $this->common_model->getproperties();
		
		$this->load->view('common/header',$header_data);
		$this->load->view('property/properties',$data);
		$this->load->view('common/footer');
		
		
	}
	
	//====================== New Property on Rent ======================//
	
	public function newproperties(){
		 
		$cond = '';
		$url = '';
		$order ='desc';
		$sort = '';
		
		if(isset($_GET) && !empty($_GET)){ 
			
			//print_r($_GET);//exit;
			
			if(isset($_GET['state']) && !empty($_GET['state']) && $_GET['state']!=''){
				$state_id = $this->input->get('state');
				$url .="state=$state_id";
				
				$cond .= " p.state_id='$state_id'";
			}	
			
			if(isset($_GET['city']) && !empty($_GET['city']) && $_GET['city']!=''){
				$city_id = $this->input->get('city');
				$url .="city=$city_id";
				
				$cond .= " and p.city_id='$city_id'";
			}	
			if(isset($_GET['type']) && !empty($_GET['type'])){	
				$property_type = $this->input->get('type');
				$url .="&type=$property_type";
				
				$cond .=" and p.property_type='$property_type'";
			}
			if(isset($_GET['key']) && !empty($_GET['key'])){	
				$key = $this->input->get('key');
				$url .="&key=$key";
				
				$cond .=" and (p.title like '%$key%'  or p.address like '%$key%' or p.zipcode like '%$key%' or p.property_type like '%$key%' or p.description like '%$key%' or s.name like '%$key%' or c.name like '%$key%')";
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
		
		$cond .=" and status='1' and published = '1'";
		$cond = ltrim($cond, ' and');
		
		$sort = ltrim($sort, ',');
		
		$user = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		$header_data['profile_image'] = $user['profile_image']; 
		 
		 $header_data['fullname'] = $user['first_name'].' '.$user['last_name']; 
		 $header_data['activelink'] = 'properties';
		
		
		
		$data['user_id'] = $user['id'];
		//----------- Pagination ---------------
		
		 $this->load->library('pagination');
		 $config['base_url'] = base_url('property/newproperties');
        $config['total_rows'] = $this->common_model->total_count_new_properties($cond);//count_rows('property p',$cond);
        $config['per_page'] = "12";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 3;//floor($choice);
		
		$config['suffix'] = '/filter?'.$url;
		//$config['first_url'] = '/filter?'.$url; 
		$config['first_url'] = $config['base_url'] . $config['suffix'];
		//$config['reuse_query_string'] = TRUE;
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
        $data['properties'] = $this->common_model->getproperties($config["per_page"], $data['page'],$cond,$order,$sort);    
		//echo '<pre>';
		//print_r( $data['properties']);exit;       

        $data['pagenations'] = $this->pagination->create_links();
	
		//-----------------------------------------
		$data['states'] = $this->common_model->get_table_data('states','*');
		$data['cities'] = $this->common_model->get_table_data('cities','*','','name asc'); 
		//$data['properties'] = $this->common_model->getproperties();
		
		$this->load->view('common/header',$header_data);
		$this->load->view('property/newproperties',$data);
		$this->load->view('common/footer');
		
		
	
	
	} 
	//=============== Add Property ==================================== //
	
	//----- add -------------
	public function add_property(){
		is_user_in();
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		if($data['users']['status']==0){
			redirect('user/profile');
		}else{
			$remaining_property = $this->common_model->get_table_data('membership','remaining_property,expiray_date',array('user_id'=>$this->session->userdata('loginid')),'id desc',$m=1);
			$cur_date = date('Y-m-d');
			
			
			if($remaining_property['remaining_property']>0 && $remaining_property['expiray_date']>$cur_date){
			
			
		
				$data['cities'] = $this->common_model->get_table_data('cities','*');
				$data['states'] = $this->common_model->get_table_data('states','*');
				$data['amenities'] = $this->common_model->get_table_data('amenities','*');
				
				 $header_data['profile_image'] = $data['users']['profile_image']; 
				 
				 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name']; 
				 $header_data['activelink'] = 'myproperties';
				
				$this->load->view('common/admin_header',$header_data);
				$this->load->view('property/add_property',$data);
				$this->load->view('common/admin_footer');
				
			}else{
				$this->session->set_flashdata('error', "Your's limit exceed upgrade your account");	
				redirect('user/upgrade');
			}
		
		
		
		}
	}
	
	//------- Insertion --------------
	public function insert_property(){
	
		$date = date('Y-m-d H:i:s');
		
		$memberships = $this->common_model->get_table_data('membership','payment_id,expiray_date',array('user_id'=>$this->input->post('user_id')),"id desc",$j=1);
		
		$publish_date = NULL ;
		if(($memberships['payment_id']) && ($memberships['expiray_date']>date('Y-m-d')) ){
			$published = '1';
			$publish_date = date('Y-m-d');
		}else{
			$published = '0';
		}
		
		$insert_data = array(
						
						'bedrooms'=>$this->input->post('bedrooms'),
						'washrooms'=>$this->input->post('washrooms'),
						'kitchen'=>$this->input->post('kitchen'),
						'garage'=>$this->input->post('garage'),
						'coverd_area'=>$this->input->post('coverd_area'),
						'price'=>$this->input->post('price'),
						'address'=>$this->input->post('address'),
						'state_id'=>$this->input->post('state_id'),
						'city_id'=>$this->input->post('city_id'),
						'country' =>'United States',
						'zipcode'=>$this->input->post('zipcode'),
						'title'=>$this->input->post('title'),
						'property_type'=>$this->input->post('property_type'),
						'description'=>$this->input->post('description'),
						'status' => '1',
						'user_id'=>$this->input->post('user_id'),
						'published' => '1',
						'publish_date' =>$publish_date,
						'created_date'=>$date
						
						);
						
						
						$this->common_model->insert_table('property',$insert_data);
						  $id = $this->db->insert_id();
						if($this->input->post('amenities')){
							foreach($this->input->post('amenities') as $amen_id ){
								$amen_data = array('property_id'=>$id,
													'aminity_id'=>$amen_id,
													'created_date'=>$date
													);
								$this->common_model->insert_table('property_aminities',$amen_data);
							}
						}
						
	$this->common_model->update_table('property_images',array('property_id'=>$id,'status'=>'1'),array('user_id'=>$this->input->post('user_id'),'status'=>'0'));			
						
		$c_img = $this->common_model->get_table_data('property_images','image',array('property_id'=>$id),"",$c=1);
		
		//---
		$this->common_model->update_table('property',array('cover_image'=>$c_img['image']),array('id'=>$id));
		//----			
	$membership = $this->common_model->get_table_data('membership','id,remaining_property',array('user_id'=>$this->input->post('user_id')),"id desc",$b=1);
	
	$prop = $membership['remaining_property'] -1;
					
				$this->common_model->update_table('membership',array('remaining_property'=>$prop),array('id'=>$membership['id']));
					
					echo $id;
	
	}
	
	//==----------------- Update Property ---------------------==//
	
	public function update_property(){
		
		$date = date('Y-m-d H:i:s');
		$property_id = $this->input->post('property_id');
		$update_data = array(
						'bedrooms'=>$this->input->post('bedrooms'),
						'washrooms'=>$this->input->post('washrooms'),
						'kitchen'=>$this->input->post('kitchen'),
						'garage'=>$this->input->post('garage'),
						'coverd_area'=>$this->input->post('coverd_area'),
						'price'=>$this->input->post('price'),
						'address'=>$this->input->post('address'),
						'state_id'=>$this->input->post('state_id'),
						'city_id'=>$this->input->post('city_id'),
						'country' =>'United States',
						'zipcode'=>$this->input->post('zipcode'),
						'title'=>$this->input->post('title'),
						'property_type'=>$this->input->post('property_type'),
						'available_status'=>$this->input->post('available_status'),
						'description'=>$this->input->post('description')
						);
						
		$this->common_model->update_table('property',$update_data,array('id'=>$property_id));
		
		if($_POST['amenities']){
		 $this->db->delete('property_aminities', array('property_id' => $property_id));
		
				foreach($this->input->post('amenities') as $amen_id ){
							$amen_data = array('property_id'=>$property_id,
												'aminity_id'=>$amen_id,
												'created_date'=>$date
												);
						$this->common_model->insert_table('property_aminities',$amen_data);
				}
		}		
		echo $property_id;	
						
	}
	//--- end ------------
	//----------- Edit Property --------------------//
	
	public function edit_property($property_id){
		is_user_in();
		$result = $this->common_model->get_table_data('property','*',array('id'=>$property_id),'',$row=1);
	
		if($result['user_id']==$this->session->userdata('loginid')){
		
			$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
			$data['cities'] = $this->common_model->get_table_data('cities','*');
			$data['states'] = $this->common_model->get_table_data('states','*');
			$data['amenities'] = $this->common_model->get_table_data('amenities','*');
			$data['property'] = $result;
			$array = $this->common_model->get_table_data('property_aminities','aminity_id',array('property_id'=>$property_id));
			
			$data['property_images'] = $this->common_model->get_table_data('property_images','*',array('property_id'=>$property_id));
			
			$myarray = array();
			
			foreach($array as $row){
				$myarray[] = $row['aminity_id'];
			}
			
			$data['property_amenities'] = $myarray;
			
			
			
			 $header_data['profile_image'] = $data['users']['profile_image']; 
			 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name']; 
			 $header_data['activelink'] = 'myproperties';
			 
			$this->load->view('common/admin_header',$header_data);
			$this->load->view('property/edit_property',$data);
			$this->load->view('common/admin_footer');
			
			
		}else{
			redirect('property/myproperties');
		}
	}
	
	//------- Delete Image ------------//
	
	public function delete_image(){
		is_user_in();
	
	$id= $this->input->post('image_id');
	$cover_image = $this->input->post('cover_image');
	$image_name = $this->input->post('image_name');
	$property_id = $this->input->post('property_id');
	

	
	
	$res= $this->db->delete('property_images', array('id' => $id));
	
	$path = $_SERVER['DOCUMENT_ROOT']."/rental_apartment/uploads/".$image_name;
			unlink($path);
	
	if($cover_image == $image_name){
		$image = $this->common_model->get_table_data('property_images','image',array('property_id'=>$property_id),'',$row=1);
		$this->common_model->update_table('property',array('cover_image'=>$image['image']),array('id'=>$property_id));
	}
	
		
	
		if ($res){
			echo "1";
		}else{
			echo "0";
		}
	
	}
	
	//------------ View My Properties ---------------------
	public function myproperties(){
	
		is_user_in();
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		if($data['users']['status']==0){
			redirect('user/profile');
		}else{
		
			$data['cities'] = $this->common_model->get_table_data('cities','*','','name asc');
			$data['states'] = $this->common_model->get_table_data('states','*');
			$data['amenities'] = $this->common_model->get_table_data('amenities','*');
			
			 $header_data['profile_image'] = $data['users']['profile_image']; 
			 
			 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name']; 
			 $header_data['activelink'] = 'myproperties';
			 
		
			 $memberships = $this->common_model->get_table_data('membership','payment_id,expiray_date',array('user_id'=>$this->session->userdata('loginid')),"id desc",$j=1);
			 
			// print_r($memberships);
		
		if(($memberships['payment_id']) && $memberships['expiray_date']> date('Y-m-d')){
			 $pub_status = '1';
		}else{
			 $pub_status = '0';
		}
			 $data['pub_status'] = $pub_status;
			 
			// exit;
			 //--------------------------
			 $cond = '';
			$url = '';
			$order ='desc';
			$sort = '';
		
		
		if(isset($_GET)&& !empty($_GET)){
			
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
		$cond1 = $cond;
		$cond1 .=" and user_id=".$this->session->userdata('loginid');
		
		$cond1 = ltrim($cond1, ' and');
		
		$cond = ltrim($cond, ' and');
		
		$sort = ltrim($sort, ',');
		 
		 //------ pagination ------------
		 $this->load->library('pagination');
		 $config['base_url'] = base_url('property/myproperties');
        $config['total_rows'] = $this->common_model->total_count_properties($cond1);//count_rows('property p',$cond1);
        $config['per_page'] = "12";
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
        $data['properties'] = $this->common_model->get_all_properties($config["per_page"], $data['page'],$cond,$order,$sort);    
		
		//print_r( $data['all_users']);exit;       

        $data['pagenations'] = $this->pagination->create_links();
		 
		 //----------------------
		//echo '<pre>';
		//print_r($data['properties']);exit;
		
		$this->load->view('common/admin_header',$header_data);
		$this->load->view('property/my_properties',$data);
		$this->load->view('common/admin_footer');
		
		}
	}
	
	
	//------- Delete Property ----------
	public function delete_myproperty(){
		is_user_in();
	
	$id= $this->input->post('id');
	
	$res = $this->db->delete('property', array('id' => $id));
	
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
	
	//----------------- image upload edit property ----------------------
	public function ajaxImageUploadEdit(){
	
	
	 	$property_id = $this->input->post('property_id');
		
		 $count = count($_FILES);
		
		$uploaddir = $_SERVER['DOCUMENT_ROOT']."/rental_apartment/uploads/"; //a directory inside
		
		for($i=0;$i<$count;$i++){ 
			$time = time();
			$filename = stripslashes($_FILES["photos$i"]["name"]);
			$size=filesize($_FILES["photos$i"]['tmp_name']);
			
			$image_name = $time.$filename;
			
			$newname = $uploaddir.$image_name;
			
			if($size<(9000*1024)){
			if(move_uploaded_file($_FILES["photos$i"]["tmp_name"],$newname)){
				
				$insert_image = array(
				   					'image' => $image_name,
									'property_id' => $property_id,
									'created_date' => date('Y-m-d H:i:s')
				   					);
									
				   
				   $this->common_model->insert_table('property_images',$insert_image);
				   
				   $image_id = $this->db->insert_id();
					 $image_url = base_url().'uploads/'.$image_name;
					 $image_name_image_id = "image_name_".$image_id;
					 
					 echo  "<div class='col-sm-3' id='row_$image_id'>";
                    echo    "<div class=''>";
                      echo      "<img width='116' height='100' src='$image_url' />";
                        echo    "<a href='javascript:delete_image($image_id,$property_id)'> Delete</a>";
                            
                           echo "<input type='hidden'  name='image_name' id='".$image_name_image_id."'  value='".$image_name."'>";
                       echo "</div>";
                   echo  "</div>";
				   
				   
				   
				 if($i==0){
				 	$image = $this->common_model->get_table_data('property','cover_image',array('id'=>$property_id),'',$row=1);
					
					if($image['cover_image']=='' || $image['cover_image']=='NULL' || $image['cover_image']==NULL ){
						$this->common_model->update_table('property',array('cover_image'=>$image_name),array('id'=>$property_id));
					}
				 }  
				   
				
				
			}
			
			}
		
		
		}// end loop ss
		
		//$arr_images = $this->common_model->get_table_data('property_images','*',array('property_id'=>$property_id));
		 
		/* foreach($arr_images as $images){
		 		$image_id = $images['id'];
				$image_url = base_url().'uploads/'.$images['image'];
				$image_name = $images['image'];
		 
                   echo  "<div class='col-sm-3' id='row_$image_id'>";
                    echo    "<div class=''>";
                      echo      "<img width='116' height='100' src='$image_url' />";
                        echo    "<a href='javascript:delete_image($image_id,$property_id)'> Delete</a>";
                            
                           echo "<input type='hidden'  name='image_name' id='image_name_$image_id'  value='$image_name'>";
                       echo "</div>";
                   echo  "</div>";
            	 }*/
				 
				
					
	
	}
	//-----------------------------------------
	
	
	//---------------------------------------
	public function ajaxImageUpload(){
	
	
	 	$property_id = $this->input->post('property_id');
		
		 $count = count($_FILES);
		
		$uploaddir = $_SERVER['DOCUMENT_ROOT']."/rental_apartment/uploads/"; //a directory inside
		
		for($i=0;$i<$count;$i++){  
			$time = time();
			$filename = stripslashes($_FILES["photos$i"]["name"]);
			$size=filesize($_FILES["photos$i"]['tmp_name']);
			
			$image_name = $time.$filename;
			
			$newname = $uploaddir.$image_name;
			
			if($size<(9000*1024)){
			if(move_uploaded_file($_FILES["photos$i"]["tmp_name"],$newname)){
				
				$insert_image = array(
				   					'image' => $image_name,
									'property_id' => $property_id,
									'created_date' => date('Y-m-d H:i:s')
				   					);
									
				   
				   $this->common_model->insert_table('property_images',$insert_image);
					 $id = $this->db->insert_id();
				   
				 if($id>0){
				 	
					$image = $this->common_model->get_table_data('property','cover_image',array('id'=>$property_id),'',$row=1);
					
					if($image['cover_image']=='' || $image['cover_image']=='NULL' || $image['cover_image']==NULL ){
						$this->common_model->update_table('property',array('cover_image'=>$image_name),array('id'=>$property_id));
					}
				 }  
				   
				echo '1';
				
			}else{
				echo '0';
			}
			
			}
		
		
		}
	
	}
	//-----------------------------------------
	//==================== New Ajax =============================
	
		public function ajaxImageUploads(){
	
	
	 	 $user_id = $this->input->post('user_id');
		
		$count = count($_FILES);
		
		
		
		$uploaddir = $_SERVER['DOCUMENT_ROOT']."/rental_apartment/uploads/"; //a directory inside
		
		for($i=0;$i<$count;$i++){  
			$time = time();
			$filename = stripslashes($_FILES["photos$i"]["name"]);
			$size=filesize($_FILES["photos$i"]['tmp_name']);
			
			$image_name = $time.$filename;
			
			$newname = $uploaddir.$image_name;
			
			if($size<(9000*1024)){
			if(move_uploaded_file($_FILES["photos$i"]["tmp_name"],$newname)){
				
				$insert_image = array(
				   					'image' => $image_name,
									'user_id' => $user_id,
									'created_date' => date('Y-m-d H:i:s')
				   					);
				   $this->common_model->insert_table('property_images',$insert_image);
					 $image_id = $this->db->insert_id();
					 $image_url = base_url().'uploads/'.$image_name;
					 $image_name_image_id = "image_name_".$image_id;
					 
					 echo  "<div class='col-sm-3' id='row_$image_id'>";
                    echo    "<div class=''>";
                      echo      "<img width='116' height='100' src='$image_url' />";
                        echo    "<a href='javascript:delete_upload_image($image_id)'> Delete</a>";
                            
                           echo "<input type='hidden'  name='image_name' id='".$image_name_image_id."'  value='".$image_name."'>";
                       echo "</div>";
                   echo  "</div>";
					 
				 }
			
			}
		
		
		}
	
	}
	
	//----------------------- Upload image delete -------------------
	//-------  ----------
	public function delete_upload_image(){
		is_user_in();
	
	$id= $this->input->post('image_id');
	 $image_name= $this->input->post('image_name');
	//exit;
	$res = $this->db->delete('property_images', array('id' => $id));

			$path = $_SERVER['DOCUMENT_ROOT']."/rental_apartment/uploads/".$image_name;
			unlink($path);

		if ($res){
			echo "1";
		}else{
			echo "0";
		}
	
	}
	//====================================================
	
public function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}	
//----------- Property Detail ------------------------------


	public function property_detail($id){
		
		$header_data['activelink'] = 'properties';
		
		$data['property_detail'] = $this->common_model->getpropertydetail($id);
		$data['amenities'] = $this->common_model->get_table_data('amenities','*');
		$data['property_images'] = $this->common_model->get_table_data('property_images','image',array('property_id'=>$id));
		
		//print_r($data['property_images']);exit;
		$data['total_comments'] = $this->common_model->count_rows('comments',array('property_id'=>$id));
		$data['comments'] = $this->common_model->get_comments($id);
		
		$favourit = $this->common_model->get_table_data('favourit_property','id',array('property_id'=>$id,'user_id'=>$this->session->userdata('loginid')),'',$row=1);
		if($favourit['id']>0){
			$data['favourit'] = '1';
			$data['style'] = "style='color:red'";
		}else{
			$data['favourit'] = '0';
			$data['style'] = "style='color:white'";
		}
		
		//print_r($data['comments']);exit;
		$array = $this->common_model->get_table_data('property_aminities','aminity_id',array('property_id'=>$id));
			
			$myarray = array();
			
			foreach($array as $row){
				$myarray[] = $row['aminity_id'];
			}
			
		$data['property_amenities'] = $myarray;
		
		$user = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		$data['fullname'] = '';
		$data['email'] = '';
		$data['user_id'] = '';
		 if($user){
		 	
			if($user['first_name']){
				$data['fullname'] = $user['first_name'].' '.$user['last_name']; 
			}else{
				$data['fullname'] = $this->session->userdata('username');
			}
		  
		  $data['email'] = $user['email'];
		  $data['user_id'] = $user['user_id'];
		}
		
		
		$this->load->view('common/header',$header_data);
		$this->load->view('property/property_detail',$data);
		$this->load->view('common/footer');
	}
	
	//----------   Review / Comment----------------------------------
	
	public function comments(){
	
		$insert = array('comment_detail' => $this->input->post('comment'),
						'property_id' => $this->input->post('property_id'),
						'user_id' => $this->input->post('user_id'),
						'created_date' => date('Y-m-d H:i:s')
				   		);
									
				   
				   $this->common_model->insert_table('comments',$insert);
				 $id = $this->db->insert_id();
		
		if($id>0){
		
				
				//------------------------
			 	$comment_from_name = $this->input->post('comment_from_name');
				$comment_from_email = $this->input->post('comment_from_email');
				$subject='Review on your property';
				$comment_message=$this->input->post('comment');
				
				$comment_propertyemail = $this->input->post('comment_propertyemail');
				
				$propertyurl= base_url().'property/property_detail/'.$this->input->post('property_id');
	
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
			  'mailtype' => 'html',
			  'charset'  => 'utf-8',
			  'priority' => '1'
			   );
		
       $message = "From ".$comment_from_name ."<br><br>  <a target='_blank' href='".$propertyurl."'>Property Link</a> <br><br>".$comment_message;
        //$message = $this->load->view('home/email',$this->data,TRUE);
        $this->load->library('email', $config);
			  $this->email->set_newline("\r\n");
			  $this->email->from($comment_from_email); // change it to yours
			  $this->email->to($comment_propertyemail);// change it to yours//chrissullivan794@gmail.com
			  
			  $this->email->subject($subject);
			  $this->email->message($comment_message);
			 $this->email->send();
			
			 
			 
			 //-----------------------------
				
		
			$user = $this->common_model->get_table_data('profile','first_name,last_name,profile_image',array('user_id'=>$this->input->post('user_id')),'',$row=1);	 	
			$name = $user['first_name'].' '.$user['last_name'];
			if($user['profile_image']){
				 $image = base_url()."uploads/".$user['profile_image'];
			}else{
				$image= "assets/img/tmp/agent-1.jpg";
			}
			
			$backgroud = "url(\"$image\")";
			$date = date('h:i A m/d/Y');
			
			echo "<li><div class='comment'><div class='comment-author'>";
			  echo	"<a href='javascript:void(0)' style='background-image: $backgroud'></a>";
							
				echo "</div><div class='comment-content'>	<div class='comment-meta'><div class='comment-meta-author'>";
					echo "Posted by <a href='javascript:void(0)'>$name</a>";
					 echo "</div><div class='comment-meta-date'><span>$date</span></div></div><div class='comment-body'>";
								
				  echo $this->input->post('comment')."</div></div></div></li>";
				 
				 
				 }
				 
				 
				 
	}
	
	//---------- Favourit ------------------
	public function user_favourit(){
		$favourit = $this->input->post('favourit');
		if($favourit==0){
			$insert = array(
							'property_id' => $this->input->post('id'),
							'user_id' => $this->input->post('user_id'),
							'created_date' => date('Y-m-d H:i:s')
							);
									
				   
				   $this->common_model->insert_table('favourit_property',$insert);
				echo '1';
		}else{
			$where = array('property_id' => $this->input->post('id'),
							'user_id' => $this->input->post('user_id')
							);
			$this->common_model->delete_table('favourit_property',$where);
			echo '0';
		}
	
	}
	
	//--------- publish / unpublish property ---------------
	
	public function publish_myproperty(){
		is_user_in();
		$property_id = $this->input->post('property_id');
		$publish= $this->input->post('publish');
		
		
		$prop = $this->common_model->get_table_data('property','publish_date',array('id'=>$property_id),'',$p=1);
			
			if($prop['publish_date']){
				
				$date = $prop['publish_date'];
			}else{
				
				$date = date('Y-m-d');
			}
			
			if($publish==1){
				$value = '0';
			}else{
				$value = '1';
			}
		$data = array('`published`' => $value,'publish_date'=>$date);
			//print_r($data);exit;
			$this->db->where('id', $property_id);	 
			$query=$this->db->update('property', $data);
			//echo $this->db->last_query();exit;
			if ($query){
				
				if($publish==0){
					
					echo "<dt>Published</dt>";
					echo "<dd><a style='padding: 0px;width: 51px;font-size: 12px;'  href='javascript:publish_myproperty(".$property_id.");'>";
					
				echo "<span id='publish_id_".$property_id."' data-id='1' ><i style='background:#0AA998; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; ' class='fa fa-check' aria-hidden='true' ></i></span>";
				
				echo "</a></dd>";
				
				echo "<dt>Published on </dt><dd>$date</dd>";
					
				}else{
				
					echo "<dt>Published</dt>";
					echo "<dd><a style='padding: 0px;width: 51px;font-size: 12px;'  href='javascript:publish_myproperty(".$property_id.");'>";
					
				echo "<span id='publish_id_".$property_id."' data-id='0' ><i style='background:#D9534F; color:#ffffff; width: 20px; height: 20px; text-align: center; line-height: 19px; border-radius: 100%; font-size: 15px; ' class='fa fa-times' aria-hidden='true' ></i></span>";
				
				echo "</a></dd>";
				
				echo "<dt>Published on </dt><dd>$date</dd>";
				}
				
			}else{
				echo '0';
			}
	
	}
	//------------ Report Property ------------------------
	
	public function report($id){
		is_user_in();
		
		$header_data['activelink'] = 'properties';
		$data['property_id'] = $id;
		$data['user_id'] = $this->session->userdata('loginid');
		$this->load->view('common/header',$header_data);
		$this->load->view('property/report',$data);
		$this->load->view('common/footer');
	}
	
	//----- report submit -------------
	public function report_submit(){
		is_user_in();
		
		//print_r($_POST);
		
		$reason = $this->input->post('reason');
		$property_id = $this->input->post('property_id');
		if($reason=='Something else'){
			$value = $this->input->post('message');
		}else{
			$value = $reason;
		}
		
		$insert_data = array(
						'property_id'=> $this->input->post('property_id'),
						'user_id'=> $this->input->post('user_id'),
						'message'=> $value,
						'created_date' => date('Y-m-d H:i:s')
						);
		
		$query = $this->common_model->insert_table('property_report',$insert_data);
		$id = $this->db->insert_id();
		if($id>0){
			$this->session->set_flashdata('success', 'Success');	
				redirect('property/report/'.$property_id, 'refresh');
		}else{
		
		$this->session->set_flashdata('error', 'Error');	
				redirect('property/report/'.$property_id, 'refresh');
		}
		
		
	}
	
	//------- Send Email to Property Owner ------------------
	public function send_mail() { 
	
	
	$name=$this->input->post('username');
	$useremail=$this->input->post('useremail');
	$subject=$this->input->post('subject');
	$emailmessage=$this->input->post('emailmessage');
	$propertyemail=$this->input->post('propertyemail');
	
	$propertyurl=$this->input->post('propertyurl');

	
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
			  'mailtype' => 'html',
			  'charset'  => 'utf-8',
			  'priority' => '1'
			   );
		
       $message = "From ".$name ."<br><br>  <a target='_blank' href='".$propertyurl."'>Property Link</a> <br><br>".$emailmessage;
        //$message = $this->load->view('home/email',$this->data,TRUE);
        $this->load->library('email', $config);
			  $this->email->set_newline("\r\n");
			  $this->email->from($useremail); // change it to yours
			  $this->email->to($propertyemail);// change it to yours//chrissullivan794@gmail.com
			  
			  $this->email->subject($subject);
			  $this->email->message($message);
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
	
	//-------- Message Inbox -------------------
	public function send_mail_inbox() { 
	
	
	$date = date('Y-m-d H:i:s');
	
	$insert_data = array(
						'from_id'=>$this->input->post('from_id'),
						'to_id'=>$this->input->post('to_id'),
						'propertyurl'=>$this->input->post('propertyurl'),
						'property_id'=>$this->input->post('property_id'),
						'subject'=>$this->input->post('inboxsubject'),
						'message'=>$this->input->post('inboxmessage'),
						'created_date'=>$date
						);
	
	//print_r($insert_data);
		$query = $this->common_model->insert_table('message_inbox',$insert_data);
		$id = $this->db->insert_id();
		if($id>0) {
			 //echo '1';
			 //------------------------
			 	$from_name=$this->input->post('from_name');
				$from_email=$this->input->post('from_email');
				$subject=$this->input->post('inboxsubject');
				$emailmessage=$this->input->post('inboxmessage');
				
				$propertyemail=$this->input->post('propertyemail');
				
				$propertyurl=$this->input->post('propertyurl');
	
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
		
       $message = "From ".$from_name ."<br><br>  <a target='_blank' href='".$propertyurl."'>Property Link</a> <br><br>".$emailmessage;
        //$message = $this->load->view('home/email',$this->data,TRUE);
        $this->load->library('email', $config);
			  $this->email->set_newline("\r\n");
			  $this->email->from($from_email); // change it to yours
			  $this->email->to($propertyemail);// change it to yours//chrissullivan794@gmail.com
			  
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
			 
			 
			 //-----------------------------
		}else{
			echo '0';
		}
		
		
	
	}
//==----------- Make featured Property ------------------//
	//--- ------------- Pay pal -----------------------------------
	public function featured($property_id){ 
	
	
		is_user_in();
		if($this->session->userdata('role')!='admin'){
			$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
			 $header_data['profile_image'] = $data['users']['profile_image']; 
			//print_r($data);exit;
			 
			  $data['featured'] = $this->common_model->get_table_data('property_featured','id,amount','','id desc',$f=1);
			 $data['property_id'] = $property_id;
			 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name'];
			 $header_data['activelink'] = 'upgrade'; 
			 
			 $this->load->view('common/admin_header',$header_data);
			$this->load->view('property/property_upgrade',$data);
			$this->load->view('common/admin_footer');
		}else{
			redirect('home');
		}
	}
	
	//---
	public function upgrade(){
		is_user_in();
		$this->load->library('paypal_lib');
		
		
		$featured = $this->common_model->get_table_data('property_featured','*','','id desc',$f=1);
		
		$userID = $this->input->post('user_id'); //current user id
		$logo = base_url().'assets/images/codexworld-logo.png';
		
		
		$returnURL = $this->input->post('return'); //payment success url
		$cancelURL = $this->input->post('cancel_return'); //payment cancel url
		$notifyURL = $this->input->post('notify'); //ipn url
		
		$this->paypal_lib->add_field('business', 'davidbusiness@gmail.com');
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', 'featured');
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $this->input->post('item_number'));
		$this->paypal_lib->add_field('amount',  $featured['amount']);
		
		//echo '<pre>';
		//print_r($this->paypal_lib);
		$this->paypal_lib->image($logo);
		
		$this->paypal_lib->paypal_auto_form();
		

	
	}
	//----
	function success(){
	 $this->load->library('paypal_lib');
	    //get the transaction data
		//echo '<pre>';
	//print_r($_REQUEST);
		
		$paypalInfo = $_REQUEST;
		$data['property_id'] = $paypalInfo['item_number'];
		$data['user_id'] = $paypalInfo['custom'];
		$data['txn_id'] = $paypalInfo["txn_id"];
		$data['payment_gross'] = $paypalInfo["payment_gross"];
		$data['currency_code'] = $paypalInfo["mc_currency"];
		$data['receiver_email'] = $paypalInfo["receiver_email"];
		$data['payment_status'] = $paypalInfo["payment_status"];
		
		$date = date('Y-m-d H:i:s');
		//print_r($data);
		
		$payment_data = array(
						'user_id'=>$data['user_id'],
						'property_id'=>$data['property_id'],
						'transiction_id'=>$data['txn_id'],
						'amount'=>$data['payment_gross'],
						'payment_status'=>$data['payment_status'],
						'created_date'=>$date
						);
		$this->common_model->insert_table('featured_payment',$payment_data);// Insert ito payment table
		$payment_id = $this->db->insert_id();
		
		if($payment_id>0)
			$this->common_model->update_table('property',array('featured'=>'yes'),array('id'=>$data['property_id']));
		
		//----- 	
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		  
		 
		 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name'];
		 $header_data['activelink'] = 'upgrade'; 
		 
		 $this->load->view('common/admin_header',$header_data);
		$this->load->view('property/success',$data);
		$this->load->view('common/admin_footer');
		
		//exit;
	}
	
	//-------- 
	function cancel(){
	 $this->load->library('paypal_lib');
	 
	 	$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name'];
		 $header_data['activelink'] = 'upgrade';
		 
	 	$this->load->view('common/admin_header',$header_data);
        $this->load->view('property/cancel');
		$this->load->view('common/admin_footer');
	 }
//-------------------------------------------------------//	
//=========== Controller End ==============================	
}
