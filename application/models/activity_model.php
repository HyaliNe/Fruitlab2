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
		if($friendlist->num_rows() > 0 ){
			//setup query to select activity of all friends friends
			$this->db->from('activity');
			$firstcount = true;
			foreach ($friendlist->result() as $row)
			{
				if($firstcount) {
					$this->db->where('customer_id', $row->customer_id2);
					$firstcount = false;
				} else {
					$this->db->or_where('customer_id', $row->customer_id2);
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
	
	public function activityList($id, $friendsActivity = false) 
	{
		if($friendsActivity)
			$activityList = $this->fetchFriendsActivity($id);
		else
			$activityList = $this->fetchActivity($id);
		
		if($activityList) {
			$processedList = array();
			foreach ($activityList->result() as $row ) {
				
				/*
				ADD_FRIEND
				REMOVE_FRIEND
				
				ADD_DESIGN
				COMMENT_DESIGN
				PURCHASE_DESIGN
				RATE_DESIGN
				*/
				
				//switch between cases. 
				//fetch related design name/username.
				//prepare message to display includes html link tags
				$currentRow = $row->type;
				if($friendsActivity) 
					$friendsName = $this->fetchName($row->customer_id);
				if($currentRow == 'ADD_FRIEND' || $currentRow == 'REMOVE_FRIEND' ) {
					$name = $this->fetchName($row->affected_id);
					$message;
					
					if($name != false) {
						if ($currentRow == 'ADD_FRIEND')
							$message = "<strong>Added</strong>";
						else 
							$message = "<strong>Removed</strong>";
						if($friendsActivity) 
							$message = $friendsName ." ". strtolower($message);
						$message = $message." <a href='".site_url('user/'.$row->affected_id)."'>$name</a> as friend.";
						array_push($processedList, $message);
					}
					
				} else {
					$title = $this->fetchDesignTitle($row->affected_id);
					$message;
					
					if($title != false) {
						if($currentRow == 'ADD_DESIGN')
							$message = '<strong>Uploaded</strong>';
						else if ($currentRow == 'COMMENT_DESIGN')
							$message = '<strong>Commented</strong> on';
						else if ($currentRow == 'PURCHASE_DESIGN')
							$message = '<strong>Purchased</strong>';
						else
							$message = '<strong>Rated</strong>';

						if($friendsActivity) 
							$message = $friendsName ." ". strtolower($message);
						$message = $message." the design <a href='".site_url('design/'.$row->affected_id)."'>$title</a>.";
						array_push($processedList, $message);
					}
				}
			}
			return $processedList;

		}
		return false;
	}
}

?>