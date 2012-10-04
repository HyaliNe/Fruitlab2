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
		$this->db->limit($lowerlimit, $upperlimit);
		
		$query = $this->db->get();
		
		if(!$query->num_rows()>0)
			return false;
		
		return $query;
		
	}
}

?>
