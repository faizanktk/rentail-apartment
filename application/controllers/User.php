<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        
    }
	
	
  //--- ------------- Pay pal -----------------------------------
	public function upgrade(){ 
	
	//$remain_prop = $this->common_model->get_table_data('membership','*',array('user_id'=>$this->session->userdata('loginid')),"id desc",$n=1);
	
	//echo $this->db->last_query();
	//exit;
		is_user_in();
		if($this->session->userdata('role')!='admin'){
			$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
			 $header_data['profile_image'] = $data['users']['profile_image']; 
			 
			 $where = " id!=5 and id!=1 ";
			 
			  $data['membership'] = $this->common_model->get_table_data('role','*',$where);
			 
			 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name'];
			 $header_data['activelink'] = 'upgrade'; 
			 
			 $this->load->view('common/admin_header',$header_data);
			$this->load->view('user/upgrade',$data);
			$this->load->view('common/admin_footer');
		}else{
			redirect('home');
		}
	}
	
	public function upgrademembership(){
		is_user_in();
		$this->load->library('paypal_lib');
		
		
		$membership = $this->common_model->get_table_data('role','*',array('id'=>$this->input->post('membership')),'',$r=1);
		
		$userID = $this->input->post('user_id'); //current user id
		$logo = base_url().'assets/images/codexworld-logo.png';
		
		
		$returnURL = $this->input->post('return'); //payment success url
		$cancelURL = $this->input->post('cancel_return'); //payment cancel url
		$notifyURL = $this->input->post('notify'); //ipn url
		
		$this->paypal_lib->add_field('business', 'davidbusiness@gmail.com');
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $membership['name']);
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $membership['id']);
		$this->paypal_lib->add_field('amount',  $membership['amount']);
		
		
		$this->paypal_lib->image($logo);
		
		$this->paypal_lib->paypal_auto_form();
		
		
	
	}
	
	 function success(){
	 $this->load->library('paypal_lib');
	    //get the transaction data
		//echo '<pre>';
		//print_r($_REQUEST);
		//exit;
		$paypalInfo = $_REQUEST;//$this->input->get();
		  
		$data['item_number'] = $paypalInfo['item_number'];
		$data['item_name'] = $paypalInfo['item_name']; 
		$data['txn_id'] = $paypalInfo["txn_id"];
		$data['payment_gross'] = $paypalInfo["payment_gross"];
		$data['currency_code'] = $paypalInfo["mc_currency"];
		$data['receiver_email'] = $paypalInfo["receiver_email"];
		$data['payment_status'] = $paypalInfo["payment_status"];
		
		$date = date('Y-m-d H:i:s');
		//--- Insert into payments----
		$payment_data = array(
							'user_id'=>$this->session->userdata('loginid'),
							'amount'=>$data['payment_gross'],
							'transiction_id'=>$data['txn_id'],
							'created_date'=>$date
								);
		$this->common_model->insert_table('payment',$payment_data);// Insert ito payment table
		$payment_id = $this->db->insert_id();
		
		//-- get data from role----
		$role  = $this->common_model->get_table_data('`role`','id,no_of_month,no_of_property',array('amount'=>$data['payment_gross']),'',$r=1);
				
				$exdate = strtotime(date("Y-m-d", strtotime($date)) . " +".$role['no_of_month']." month");
				$expiray_date = date("Y-m-d",$exdate);
				
				
		// -- Update membership --------
$remain_prop = $this->common_model->get_table_data('membership','*',array('user_id'=>$this->session->userdata('loginid')),"id desc",$n=1);
		
		$total_prop = $remain_prop['remaining_property'] + $role['no_of_property'];
		
		$membership_data = array(
							'user_id'=>$this->session->userdata('loginid'),
							'role_id'=>$role['id'],
							'registration_date'=>date('Y-m-d'),
							'expiray_date'=>$expiray_date,
							'payment_id'=>$payment_id,
							'remaining_property'=>$total_prop,
							'created_date'=>$date
								);
		
		$this->common_model->insert_table('membership',$membership_data);
		
		$this->common_model->update_table('property',array('published'=>'1','publish_date'=>date('Y-m-d')),array('user_id'=>$this->session->userdata('loginid'),'published'=>'0'));
		
		//$this->common_model->update_table('membership',array('expiray_date'=>$expiray_date,'role_id'=>$role['id'],'payment_id'=>$payment_id),array('user_id'=>$this->session->userdata('loginid')));
			
			
		//----- 	
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		  
		 
		 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name'];
		 $header_data['activelink'] = 'upgrade'; 
		 
		 $this->load->view('common/admin_header',$header_data);
		$this->load->view('user/success',$data);
		$this->load->view('common/admin_footer');
        //$this->load->view('paypal/success', $data);
	 }
	 
	 function cancel(){
	 $this->load->library('paypal_lib');
	 
	 	$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name'];
		 $header_data['activelink'] = 'upgrade';
		 
	 	$this->load->view('common/admin_header',$header_data);
        $this->load->view('user/cancel');
		$this->load->view('common/admin_footer');
	 }
	 
	 function ipn(){
	 $this->load->library('paypal_lib');
		//paypal return transaction details array
		$paypalInfo	= $this->input->post();

		$data['user_id'] = $paypalInfo['custom'];
		$data['product_id']	= $paypalInfo["item_number"];
		$data['txn_id']	= $paypalInfo["txn_id"];
		$data['payment_gross'] = $paypalInfo["payment_gross"];
		$data['currency_code'] = $paypalInfo["mc_currency"];
		$data['payer_email'] = $paypalInfo["payer_email"];
		$data['payment_status']	= $paypalInfo["payment_status"];

		$paypalURL = $this->paypal_lib->paypal_url;		
		$result	= $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
		
		//check whether the payment is verified
		if(preg_match("/VERIFIED/i",$result)){
		    //insert the transaction data into the database
			$this->product->insertTransaction($data);
		}
    }
	//----------- End Pay pal --------------------------------
	public function profile(){ 
		is_user_in();
		
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		$data['cities'] = $this->common_model->get_table_data('cities','*');
		$data['states'] = $this->common_model->get_table_data('states','*');
		
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 
		 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name'];
		 $header_data['activelink'] = 'profile'; 
		
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
					//'martial_status' =>$this->input->post('martial_status'),
					//'family_member' =>$this->input->post('family_member'),
					'address' =>$this->input->post('address'),
					'state_id' =>$this->input->post('state_id'),
					'city_id' =>$this->input->post('city_id'),
					'country' =>'United States',
					'zipcode' =>$this->input->post('zipcode'),
					'mobile_no' =>$this->input->post('mobile_no'),
					'landline_no' =>$this->input->post('landline_no'),
					//'social_security_no' =>$this->input->post('social_security_no'),
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
			$this->session->set_flashdata('message_name', 'Your profile update successfully');	
				redirect('user/profile', 'refresh');
	
	}
	//-------- Change Password ------------------//
	
	public function changepassword(){
	is_user_in();
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 
		 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name'];
		 $header_data['activelink'] = 'password'; 
		
		$this->load->view('common/admin_header',$header_data);
		$this->load->view('user/change_password',$data);
		$this->load->view('common/admin_footer');
	
	}
	
	public function updatepassword(){
	is_user_in();
	
	$update_data = array( 'password' =>md5($this->input->post('new_password')));
	
	 $this->common_model->update_table('users',$update_data,array('id'=>$this->session->userdata('loginid')));	
			
				$this->session->set_flashdata('success', 'Your password update successfully');	
				redirect('user/changepassword', 'refresh');
			
	}
	
	//-------- User Message Inbox -------------
	public function message_inbox(){
	is_user_in();
	
	$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		 $user_id = $data['users']['user_id'];
		
		
		
		//echo '<pre>';
		
		//print_r($data['messages']);
		//exit;
		 $header_data['profile_image'] = $data['users']['profile_image']; 
		 
		 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name'];
		 $header_data['activelink'] = 'message_inbox'; 
		 //--- conditons--
		 	$cond = "m.from_id=$user_id or m.to_id=$user_id";;
			$url = '';
			$order ='desc';
		 //-----
		 	if(isset($_GET)){
			
			
			if(isset($_GET['subject']) && !empty($_GET['subject'])){
				$subject = $this->input->get('subject');
				$url .="subject=$subject";
				
				$cond .= " and m.subject like '%$subject%' ";
			}	

			if(isset($_GET['order']) && !empty($_GET['order'])){	
				$order = $this->input->get('order');
				$url .="&order=$order";
				
				$order ="$order";
			}	
			
			
			
			
			
			$url = ltrim($url, '&');
			
			
			
		}
		
		 //----------- Pagination ---------------
		
		 $this->load->library('pagination');
		 $config['base_url'] = base_url('user/message_inbox');
        $config['total_rows'] = $this->common_model->count_rows('message_inbox m',$cond);
        $config['per_page'] = "30";
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
        $data['messages'] = $this->common_model->get_user_inbox($config["per_page"], $data['page'],$cond,$order);    
		//echo '<pre>';
		//print_r( $data['properties']);exit;       

        $data['pagenations'] = $this->pagination->create_links();
	
		//-----------------------------------------
		
		$this->load->view('common/admin_header',$header_data);
		$this->load->view('user/message_inbox',$data);
		$this->load->view('common/admin_footer');
	
	
	}
	
	//------------------------------------------
	//---------- Delete amenity -----------------
	public function delete_message(){
		is_user_in();
			
			$id= $this->input->post('message_id');
			
			$res= $this->db->delete('message_inbox', array('id' => $id));
			
				if ($res){
					echo "1";
				}else{
					echo "0";
				}
	
	}
	//-------- View message -------------
	public function view_message($message_id,$property_id,$from_id,$to_id){
		is_user_in();
		
		
		
		$data['users'] = $this->common_model->get_table_data('profile','*',array('user_id'=>$this->session->userdata('loginid')),'',$row=1);
		
		 $user_id = $data['users']['user_id'];
		 
		 $this->common_model->update_table('message_inbox',array('status_read'=>'1'),array('to_id'=>$user_id,'property_id'=>$property_id));
		
		 $where = "property_id=$property_id and (m.from_id=$user_id or m.to_id=$user_id)";
		 $data['messages'] = $this->common_model->get_single_propert_messages($where);
		 
		// echo '<pre>';
		// print_r($data['messages']);exit;
		//echo $message_id.$property_id.$from_id.$to_id;
		
		$data['property_id'] = $property_id;
		$data['from_id'] = $user_id;
		
		
		if($to_id==$user_id){
			$data['to_id'] = $from_id;
		}else{
			$data['to_id'] = $to_id;
		}
	 
		 
		 
		// echo '<pre>';
		 
		 //print_r($data);exit;
		
		$header_data['profile_image'] = $data['users']['profile_image']; 
		 
		 $header_data['fullname'] = $data['users']['first_name'].' '.$data['users']['last_name'];
		 $header_data['activelink'] = 'message_inbox'; 
		
		$this->load->view('common/admin_header',$header_data);
		$this->load->view('user/view_message',$data);
		$this->load->view('common/admin_footer');
	
	}
	
	
	//--------- Send inbox messages------------------
	
	public function send_mail_inbox() { 
	
	
	$date = date('Y-m-d H:i:s');
	
	$insert_data = array(
						'from_id'=>$this->input->post('from_id'),
						'to_id'=>$this->input->post('to_id'),
						'propertyurl'=>$this->input->post('propertyurl'),
						'property_id'=>$this->input->post('property_id'),
						
						'message'=>$this->input->post('inboxmessage'),
						'created_date'=>$date
						);
	
	//print_r($insert_data);
		$query = $this->common_model->insert_table('message_inbox',$insert_data);
		$id = $this->db->insert_id();
		if($id>0) {
			 $user = $this->common_model->get_table_data('profile','first_name,last_name,profile_image',array('user_id'=>$this->input->post('from_id')),'',$row=1);	 	
			$name = $user['first_name'].' '.$user['last_name'];
			if($user['profile_image']){
				 $image = base_url()."uploads/".$user['profile_image'];
			}else{
				$image= "assets/img/tmp/agent-1.jpg";
			}
			
			$backgroud = 'url("$image")';
			$date = date('h:i A m/d/Y');
			
			echo "<li><div class='comment'><div class='comment-author'>";
			  echo	"<a href='javascript:void(0)' style='background-image: $backgroud'></a>";
							
				echo "</div><div class='comment-content'>	<div class='comment-meta'><div class='comment-meta-author'>";
					echo "Posted by <a href='javascript:void(0)'>$name</a>";
					 echo "</div><div class='comment-meta-date'><span>$date</span></div></div><div class='comment-body'>";
					echo "<h3>".$this->input->post('inboxsubject')."</h3>";			
				  echo $this->input->post('inboxmessage')."</div></div></div></li>";
		}else{
			echo '0';
		}
		
		
	
	}
	
	//--- User Email check -----------------
	 public function user_password_checks() {
		if(isset($_GET['old_password']))
		   {
			$old_password=md5($_GET['old_password']);
			 $password = $this->common_model->get_table_data('users','password',array('id'=>$this->session->userdata('loginid')),'',$r=1);
			 
			if($old_password==$password['password']){
				  
				   echo 'true';
				   }
					else
				   {
				   echo 'false';
				   }
			 }
			 else
			 {
				echo 'false';
			 }   
		  }
	
	
	//---------------------------------------------//
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
		
		echo "<label>City</label><select name='city_id' class='form-control' tabindex='7' required='required'><option value=''>--Select City--</option>"; 
		
		foreach($result as $row){ 
			
				echo "<option value='".$row['id']."'>".$row['name']."</option>"; 
				
		}
		echo "</select>";
	
	}
	
//==================================================///	
}
