<?php
class Cart_model extends CI_Model {
	
	
	//check against database if input combination is possible
	//error checking funciton
	public function validateCombination($design, $collar, $color, $material) {
		return true;
	}
	
	public function getCombinationPrice($designID, $collarID, $colorID, $materialID) {
		
			$this->db->select('cost_price');
			$this->db->from('colour');
			$this->db->where('colour_id', $colorID);

			$query = $this->db->get();
			$colorPrice = $query->row()->cost_price;
			

			$this->db->select('cost_price');
			$this->db->from('collar');
			$this->db->where('collar_id', $collarID);

			$query = $this->db->get();
			$collarPrice = $query->row()->cost_price;
			
			$this->db->select('cost_price');
			$this->db->from('material');
			$this->db->where('material_id', $materialID);

			$query = $this->db->get();
			$materialPrice = $query->row()->cost_price; 
			
			$this->db->select('price');
			$this->db->from('design');
			$this->db->where('design_id', $designID);

			$query = $this->db->get();
			$designPrice = $query->row()->price; 
			
			return $colorPrice + $collarPrice + $materialPrice + $designPrice;

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
	
	public function fetchColorName($id) {
		$this->db->select('name');
		$this->db->from('colour');
		$this->db->where('colour_id', $id);
		
		$query = $this->db->get();
		$row = $query->row(); 
		
		return $row->name;
	}
	
	public function fetchCollarName($id) {
		$this->db->select('name');
		$this->db->from('collar');
		$this->db->where('collar_id', $id);
		
		$query = $this->db->get();
		$row = $query->row(); 
		
		return $row->name;
	}
	
	public function fetchMaterialName($id) {
		$this->db->select('name');
		$this->db->from('material');
		$this->db->where('material_id', $id);
		
		$query = $this->db->get();
		$row = $query->row(); 
		
		return $row->name;
	}
	
	public function fetchDesignName($id) {
		$this->db->select('title');
		$this->db->from('design');
		$this->db->where('design_id', $id);
		
		$query = $this->db->get();
		$row = $query->row(); 
		
		return $row->title;
	}


}
?>