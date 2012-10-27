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
        $query = $this->db->get('tag');
        return $query->result();
    }

    public function getDesignTags($design_id) {
        $result = NULL;
        $this->db->where('design_id', $design_id)->join('tag', 'tag.tag_id = taglist.tag_id');
        $query = $this->db->get('taglist');
        return $query;
    }

}

/* End of file account_model.php */
/* Location: ./models/account_model.php */
