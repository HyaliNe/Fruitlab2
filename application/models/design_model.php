<?php

class Design_model extends CI_model {
	
	/**
	 * Fetch a single design from database
	 *
	 * Fetch selected ID from database if ID exist.
	 *
	 * @access	public
	 * 
	 * @param	int	ID of the design to fetch from database.
	 *
	 * @return array
	 */
	public function fetchSingleDesign($id) {
		
		$design = array();
		$design['exist'] = false;
		
		$this->db->from('design');
		$this->db->where('design_id', $id);
		
		$query = $this->db->get();
		
		if ($query->num_rows == 1) { 
			$design['exist'] = true;
			$row = $query->row();
			
			$design['design_id'] = $row->design_id;
			$design['customer_id'] = $row->customer_id;
			$design['image_path'] = $row->image_path;
			$design['rating'] = $row->rating;
			$design['price'] = $row->price;
			$design['title'] = $row->title;
			$design['type'] = $row->type;
			
		}
		
		return $design;
	}
	/**
	 * Search the database for design base on title
	 *
	 * Retrive and return related products if exist
	 *
	 * @access	public
	 * 
	 * @param	search clause
	 *
	 * @return array
	 */	
	public function searchByTitle($input, $lowerlimit = 0, $upperlimit = 20) {
		
		$this->db->from('design');
		$this->db->like('title', $input);
		$this->db->limit($upperlimit, $lowerlimit);
		
		$query = $this->db->get();
		
		if(!$query->num_rows()>0)
			return false;
		
		return $query;
		
	}
	
	public function comment($user)
	{
		$date = date('Y-m-d H:i:s');
		
		$user_data = array(
						'message' => $user['comment'],
						'customer_id' => $user['customer_id'],
						'design_id' => $user['design_id'],
						'timestamp' => $date
						);
		
		$data = $this->db->insert('comment', $user_data);
		
		//add info to activity
		$type = "comment";
		$activity_data = array(
						'timestamp' => $date,
						'creator_id' => $user['customer_id'],
						'message' => $user['customer_id'] . " gave review to " . $user['design_id'],
						'type' => $type,
						'affected_id' => $user['design_id']
						);
		$activity = $this->db->insert('activity', $activity_data);				
		
		return $data;
	}
	
	public function rate($user)
	{
		$date = date('Y-m-d H:i:s');
		
		$user_data = array(
						'rating' => $user['rating'],
						'customer_id' => $user['customer_id'],
						'design_id' => $user['design_id'],
						'timestamp' => $date
						);
		
		$data = $this->db->insert('rating', $user_data);
		
		//add info to activity
		$type = "rate";
		$activity_data = array(
						'timestamp' => $date,
						'creator_id' => $user['customer_id'],
						'message' => $user['customer_id'] . " rated " . $user['design_id'],
						'type' => $type,
						'affected_id' => $user['design_id']
						);
		$activity = $this->db->insert('activity', $activity_data);				
		
		return $data;		
	}
}

?>
