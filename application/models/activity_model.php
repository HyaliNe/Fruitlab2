<?php

class Activity_model extends CI_Model {
	
	//constants related to friends								
	const ADD_FRIEND	= 'ADD_FRIEND';
	const REMOVE_FRIEND = 'REMOVE_FRIEND';
	
	//constants related to designs
	const ADD_DESIGN		= 'ADD_DESIGN';
	const COMMENT_DESIGN	= 'COMMENT_DESIGN';
	const PURCHASE_DESIGN	= 'PURCHASE_DESIGN';
	const RATE_DESIGN		= 'RATE_DESIGN';
				
	public function addActivity($userid, $type, $id) {
		
		//Provide error checking?
		//using correct constant
		//userid exist?
		//affected id exist?
		
		$data = array(
		   'customer_id' => $userid,
		   'type' => $type ,
		   'affected_id' => $id
		);

		$this->db->insert('activity', $data); 
	}
	
	public function fetchActivity($userid) {
		
		$this->db->from('activity');
		$this->db->where('customer_id', $userid);
		$this->db->limit(20);
		
		$query = $this->db->get();
		
		$activityList = array();
		
		if(!$query->num_rows()>0)
			return false;
		
		return $query;

	}
	
	public function fetchFriendsActivity($userid) {
		
		//get the user's friend
		$this->db->from('is_friends_with');
		$this->db->where('customer_id', $userid);
		
		$friendlist = $this->db->get();
		
		if(!$friendlist->num_rows() > 0 ){
			//setup query to select activity of all friends friends
			$this->db->from('activity');
			$firstcount = true;
			foreach ($friendlist->result() as $row)
			{
				if($firstcount) {
					$this->db->where('userid', $row->customer_id2);
					$firstcount = false;
				} else {
					$this->db->or_where('userid', $row->customer_id2);
				}
			    
			}
			$this->db->limit(20);
			
			$activityList = $this->db->get();
			
			if(!$activityList->num_rows()>0)
				return false;
			
			return $activityList;
			
		} else {
			//what to do when the user doesn't have any friends?
		}
		
		return false;
	}
	
	function fetchName($id) {
		$this->db->select('first_name, last_name ');
		$this->db->from('customer');
		$this->db->where('customer_id', $id);
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
		   $row = $query->row();

		   return $row->first_name ." ". $row->last_name;
		} 
		else 
			return false;
	}
	
	function fetchDesignTitle($id) {
		$this->db->select('title');
		$this->db->from('design');
		$this->db->where('design_id', $id);
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
		   $row = $query->row();

		   return $row->title;
		} 
		else 
			return false;		
	}
}

?>