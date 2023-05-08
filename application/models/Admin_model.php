<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model { 

	
	public function __construct()
        {
                parent::__construct();
        }
	//---- get all users -------//
	public function get_all_users($limit, $start,$where=NULL,$order){
		$this->db->select('u.username,u.status as user_status,p.*,c.name as city_name,s.name as state_name');
		$this->db->join('profile p','u.id=p.user_id');
		$this->db->join('states s','p.state_id=s.id','left');
		$this->db->join('cities c','c.id=p.city_id','left');
		if($where)
			$this->db->where($where);
			
			$this->db->order_by("u.id", $order);
		
		$this->db->where('u.role','user');
		$this->db->limit($limit, $start);
		$query = $this->db->get('users u');
		return $result = $query->result_array();
	
	}
	
	public function total_count_users($where=NULL) {
		
		$this->db->select('u.*');
		$this->db->join('profile p','u.id=p.user_id');
				
				if($where)
					$this->db->where($where);
					
		$this->db->where('role','user');			
		$query = $this->db->get('users u');
		
		return $query->num_rows();
		
		//$this->db->join('profile p','u.id=p.user_id');
      // return $this->db->count_all("users");
    }
	
	//------- Get Amenities ---------------//
	public function get_all_amenities($limit, $start){
		$this->db->select('*');
		$this->db->limit($limit, $start);
		$query = $this->db->get('amenities');
		return $result = $query->result_array();
	}
	
	//----------- Get All Properties ------------//
	
	public function get_all_properties($limit, $start,$where=NULL,$order,$sort=NULL){
		$this->db->select('p.*,c.name as city_name,s.name as state_name');
		$this->db->join('states s','p.state_id=s.id');
		$this->db->join('cities c','c.id=p.city_id');
		
		if($where)
			$this->db->where($where);
			
			if($sort)	
			$this->db->order_by($sort, $order);
		else
			$this->db->order_by("id", $order);
			
		
		$this->db->limit($limit, $start);
		$query = $this->db->get('property p');
		return $result = $query->result_array();
	}
	
	
//=====================================================//	
}
