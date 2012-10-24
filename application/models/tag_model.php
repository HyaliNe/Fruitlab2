<?php

class Tag_model extends CI_Model {

/**
 * Handles all Tag operation
 *
 *
 * @access	public
 * 
 *
 * @return 	array 	Return ['result'] TRUE if any or FALSE and return ['role'] if any.
 */
	
    
    public function getTags() {
		
		$result = NULL;
		$query  = $this->db->get('tag');		
		return $query->result();
	}
        
}
/* End of file account_model.php */
/* Location: ./models/account_model.php */
