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
		
		//query comment table to check if the user have already commented
		$design['commented'] = false;
		$customer_id = $this->session->userdata('customer_id');
		$this->db->from('comment');
		$this->db->where('customer_id', $customer_id);
		$this->db->where('design_id', $id);
		$comment = $this->db->get();
		if($comment->num_rows == 1)
		{
			$design['commented'] = true;
		}	
		
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
			$design['num_of_rating'] = $row->num_of_rating;
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
		$this->db->select('*');
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
	/*	$type = "comment";
		$activity_data = array(
						'timestamp' => $date,
						'creator_id' => $user['customer_id'],
						'message' => $user['customer_id'] . " gave review to " . $user['design_id'] . "on " . $date,
						'type' => $type,
						'affected_id' => $user['design_id']
						);
		$activity = $this->db->insert('activity', $activity_data);	*/			
		
		return $data;
	}
	
	public function rate($user)
	{
		$date = date('Y-m-d H:i:s');
		//assume that num_of_rating is being passed in using hidden to here
		$num_of_rating = $this->input->post('num_of_rating');
		//assume old average rating is being passed in using hidden to here
		$old_average = $this->input->post('old_average');
		
		//calculate the new average rating
		$input_rating = $this->input->post('new_rating');
		$new_num_of_rating = $num_of_rating + 1.00;
		//formula to calculate the new average rating
		$new_rating = (($old_average * $num_of_rating) + $input_rating) / $new_num_of_rating;
		$user_data = array(
						'rating' => $new_rating,
						'design_id' => $user['design_id'],
						'num_of_rating' => $new_num_of_rating
						);
		
		$this->db->where('design_id', $user['design_id']);
		$data = $this->db->update('design', $user_data);
		//add info to activity
	/* 	$type = "rate";
		$activity_data = array(
						'timestamp' => $date,
						'creator_id' => $user['customer_id'],
						'message' => $user['customer_id'] . " rated " . $user['design_id'],
						'type' => $type,
						'affected_id' => $user['design_id']
						);
		$activity = $this->db->insert('activity', $activity_data);	 */			
		
		return $data;		
	}
	
	public function fetchComment($id)
	{			
		$this->db->select('message, comment.customer_id, timestamp, img_path');
		$this->db->from('comment');
		$this->db->where('design_id', $id);	
		$this->db->join('customer', 'customer.customer_id = comment.customer_id');
		
		$comment = $this->db->get();

		if($comment)
		{
			return $comment;
		}
	}


	/**
	 * Search the database for all design by a userid
	 *
	 * Retrieve and return related products if exist
	 *
	 * @access	public
	 * 
	 * @param	search clause
	 *
	 * @return array
	 */	
	 public function retriveDesignsByUser($id, $lowerlimit = 0, $upperlimit = 20) {
 		$this->db->from('design');
 		$this->db->where('customer_id', $id);
 		$this->db->limit($upperlimit, $lowerlimit);
		
 		$query = $this->db->get();
 		if(!$query->num_rows()>0)
 			return false;

 		return $query;
	 }


	/**
	 *
	 * Check if Design belongs to customer id
	 *
	 * @access	public
	 * 
	 * @param 	int design id	
	 * @param 	int customer id	
	 *
	 * @return 	TRUE if design belong to customer id 	
	 */

	public function designBelong($design_id, $customer_id) {
		$this->db->where('design_id', $design_id)->where('customer_id', $customer_id);
		$query = $this->db->get('design');

		return ($query->num_rows() > 0) ? TRUE : FALSE;
	}
	
	/**
	 *
	 * Delete design by setting type = 'remove in db 
	 *
	 * @access	public
	 * 
	 * @param 	int design id	
	 * @param 	int customer id		
	 *
	 * @return 	TRUE if succeed and FALSE if fail. 	
	 */

	public function deleteDesign($design_id, $customer_id = "") {
		$proceed = TRUE;
		
		// Check if design need to be belong to user
		if (!empty($customer_id)) {
			// Check if design belong to customer id.
			$designBelong = $this->designBelong($design_id, $customer_id);
			$proceed = ($designBelong) ? TRUE : FALSE;
		}
		
		if ($proceed) {
			// Design existed.
			$this->db->where('design_id', $design_id);
			$query = $this->db->update('design', array('type' => 'remove'));

			$result['result']  = TRUE;
			$result['message'] = "Design has been successfully deleted!";			 
			
		} else {
			$result['result'] = FALSE;
			$result['message'] = "Design does not exist";
		}

		return $result;
	}
 }
?>
