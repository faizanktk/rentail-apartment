<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller
{
	function  __construct() {
		parent::__construct();
		$this->load->library('paypal_lib');
		//$this->load->model('product');
	}
	
	function index(){
		$data = array();
		//get products data from database
        $data['pricing'] = $this->common_model->get_table_data('pricing','*');
		//pass the products data to view
		$this->load->view('products/index', $data);
	}
	
	function buy(){
		//Set variables for paypal form
		$returnURL = base_url().'paypal/success'; //payment success url
		$cancelURL = base_url().'paypal/cancel'; //payment cancel url
		$notifyURL = base_url().'paypal/ipn'; //ipn url
		//get particular product data
		//echo $this->input->post('pricing');
		
		//print_r($_POST);
		
		$product = $this->common_model->get_table_data('pricing','*',array('id'=>$this->input->post('pricing')),'',$r=1);
		
		//print_r($product);exit;
		
		$userID = 1; //current user id
		$logo = base_url().'assets/images/codexworld-logo.png';
		
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $product['name']);
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $product['id']);
		$this->paypal_lib->add_field('amount',  $product['amount']);
		
	
				
		$this->paypal_lib->image($logo);
		
		$this->paypal_lib->paypal_auto_form();
	}
}