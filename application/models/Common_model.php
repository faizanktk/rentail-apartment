<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model { 

	
	public function __construct()
        {
                parent::__construct();
        }
	
	//--- Get table data -----//
	public function  get_table_data($table,$select,$where=NULL,$order=NULL,$row=0){
		
				$this->db->select($select);
				
				if($where)
					$this->db->where($where);
					
				if($order)
					$this->db->order_by($order);
				
				
						
			$query = $this->db->get($table);
			
			if($row)
				return	$query = $query->row_array();	
				
			return $result = $query->result_array();
	}
	
	
	
	//------- Count Row -----------------
	
	public function count_rows($table,$where=NULL){
		$this->db->select('*');
				
				if($where)
					$this->db->where($where);
					
		$query = $this->db->get($table);
		
		return $query->num_rows();			
	}
	
	//--- Insert data into table ---//
	public function insert_table($table,$value){
	
		$this->db->insert($table, $value);
	
	}
	
	//--- Update table ---//
	public function update_table($table,$set,$where){
	
		$this->db->where($where);
		$this->db->update($table, $set);
	
	}
	
	//-- Delete data from table ----//
	public function delete_table($table,$where){
		
		$this->db->where($where);
		$this->db->delete($table);
		
	}
	
	public function get_stats($limit, $start){
		$this->db->select('*');
		$this->db->limit($limit, $start);
		$query = $this->db->get('states');
		return $result = $query->result_array();
	
	}
	
	//--0---------- get alproperties by user -------------------
	
	public function get_all_properties($limit, $start,$where=NULL,$order,$sort=NULL){
		$this->db->select('p.*,s.name as state_name,c.name as city_name');
		$this->db->join('states s','p.state_id=s.id');
		$this->db->join('cities c','p.city_id=c.id');
		if($where)
			$this->db->where($where);
			
		if($sort)	
			$this->db->order_by($sort, $order);
		else
			$this->db->order_by("id", $order);
		
		$this->db->where('p.user_id',$this->session->userdata('loginid'));
		$this->db->limit($limit, $start);
		$query = $this->db->get('property p ');
		return $result = $query->result_array();
	}
	
	//----------- Home page home properties -----------------------------
	public function get_home_properties(){
		$this->db->select('p.*,s.name as state_name,c.name as city_name');
		$this->db->join('states s','p.state_id=s.id');
		$this->db->join('cities c','p.city_id=c.id');
		$this->db->where('p.published','1');
		$this->db->where('p.status','1');
		$this->db->order_by('p.id','desc');
		$this->db->limit(7, 0);
		$query = $this->db->get('property p ');
		return $result = $query->result_array();
	}
	
	//-------------  Featured Property ----------------------//
	public function get_featured_properties(){
		$this->db->select('p.*,s.name as state_name,c.name as city_name');
		$this->db->join('states s','p.state_id=s.id');
		$this->db->join('cities c','p.city_id=c.id');
		$this->db->where('p.published','1');
		$this->db->where('p.status','1');
		$this->db->where('p.featured','yes');
		//$this->db->order_by('p.id','desc');
		$this->db->order_by('p.id', 'RANDOM');
		$this->db->limit(21, 0);
		$query = $this->db->get('property p ');
		return $result = $query->result_array();
	}
	
	//-------- Get Property Detail ---------------
	public function getpropertydetail($id){
		$this->db->select('p.*,s.name as state_name,c.name as city_name,u.email as useremail');
		$this->db->join('states s','p.state_id=s.id');
		$this->db->join('cities c','p.city_id=c.id');
		$this->db->join('users u','p.user_id=u.id');
		$this->db->where('p.id',$id);
		$query = $this->db->get('property p ');
		return $result = $query->row_array();
	
	}
	
	//-------- Get  Properties page All  Property  ---------------
	public function getproperties($limit, $start,$where=NULL,$order,$sort=NULL){
		$this->db->select('p.*,s.name as state_name,c.name as city_name');
		$this->db->join('states s','p.state_id=s.id');
		$this->db->join('cities c','p.city_id=c.id');
		if($where)
			$this->db->where($where);
		if($sort)	
			$this->db->order_by($sort, $order);
		else
			$this->db->order_by("publish_date", $order);
					
		$this->db->limit($limit, $start);
		$query = $this->db->get('property p ');
		
		//echo $this->db->last_query();exit;
		return $result = $query->result_array();
	
	}
	
	
	public function total_count_properties($where=NULL) {
		
		$this->db->select('p.*');
		$this->db->join('states s','p.state_id=s.id');
		$this->db->join('cities c','p.city_id=c.id');
				
				if($where)
					$this->db->where($where);
					
					
		$query = $this->db->get('property p');
		
		return $query->num_rows();
		
		//$this->db->join('profile p','u.id=p.user_id');
      // return $this->db->count_all("users");
    }
	
	//---------------
	public function total_count_new_properties($where=NULL){
		
		$this->db->select('p.*');
		$this->db->join('states s','p.state_id=s.id');
		$this->db->join('cities c','p.city_id=c.id');
				
				if($where)
					$this->db->where($where);
					
		$this->db->limit(36, 0);			
		$query = $this->db->get('property p');
		
		return $query->num_rows();
	
	}
	
	//------- Get Property comments -------------------------
	
	public function get_comments($property_id){
		$this->db->select('c.*,p.first_name,p.last_name,p.profile_image');
		$this->db->join('profile p','p.user_id=c.user_id');
		$this->db->where('property_id',$property_id);
		$query = $this->db->get('comments c ');
		return $result = $query->result_array();
	
	}
	//------- Get use Inbox Messages ---------------------
	public function get_user_inbox($limit, $start,$where=NULL,$order){
	
		$this->db->select('m.*');
		
		if($where)
			$this->db->where($where);
			
		$this->db->order_by("id", $order);	
		$this->db->limit($limit, $start);
		
		$query = $this->db->get('message_inbox m ');
		return $result = $query->result_array();
	
	}
	
	//------ get single property messages -------------
	public function get_single_propert_messages($where){
		
		$this->db->select('m.*');
		
		$this->db->where($where);
		
		$this->db->order_by("m.id", 'asc');
		$query = $this->db->get('message_inbox m ');
		return $result = $query->result_array();
	}
	//=========================================================
}
