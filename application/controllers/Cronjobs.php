<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjobs extends CI_Controller {

	function __construct() {
        parent::__construct();
        
    }
	
	public function index(){
	
		$users  = $this->common_model->get_table_data('users','id',array('status'=>'1','`role`'=>'user'));
		
		foreach($users as $row){
			
			$membership  = $this->common_model->get_table_data('`membership`','role_id',array('user_id'=>$row['id']),'id desc',$r=1);
			
			$role  = $this->common_model->get_table_data('`role`','*',array('id'=>$membership['role_id']),'',$v=1);
			
			 $cond_date =  date('Y-m-d', strtotime('-'.$role['no_of_days'].' day'));
			
			
			
			$where = " user_id='".$row['id']."' and created_date < '".$cond_date."'";
			
			$this->common_model->update_table('property',array('status'=>'0'),$where);
			
			
			
		}
		
		
		
	}
  
	
	
}
