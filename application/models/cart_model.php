<?php
class Cart_model extends CI_Model {
	
	
	//check against database if input combination is possible
	//error checking funciton
	public function validateCombination($design, $collar, $color, $material) {
		return true;
	}
	
	
	//retrieve customization options from database and return
	public function fetchOptions() {
		$options = array();
		$this->db->from('collar');
		$options['collar'] = $this->db->get();
		$this->db->from('material');
		$options['material'] = $this->db->get();
		$this->db->from('colour');
		$options['colour'] = $this->db->get();
		
		return $options;
		
	}


}
?>