<?php



//$this->db->select('*');
//$this->db->from('blogs');
//$this->db->join('comments', 'comments.id = blogs.id');
//$query = $this->db->get();
// Produces: 
// SELECT * FROM blogs
// JOIN comments ON comments.id = blogs.id


class transaction_model extends CI_Model {
     public function getCartByID($id){
         $result = array();
         $result['result'] = FALSE;
         $this->db->select("cart_id,date,status,reference");
         $this->db->where("cart_id",1);
         $query = $this->db->get('cart',1);
         if($query->num_rows == 1)
		{
			//storing the row return from the query
			$row = $query->row();
			$result['cart_id'] = $row->cart_id;
			$result['date'] = $row->first_name;
			$result['status'] = $row->last_name;
			$result['reference'] = $row->reference;		//need not query since already available
                        $result['result'] = TRUE;
                }
          return $result;
     }      
     public function getSingleLineItemByID($id){
         $result = array();
         $result['result'] = FALSE;
         $this->db->select("singlelineitem,design_id,quantity,collar_id,material_id,colour_id");
         $this->db->where("singlecartitem",1);
         $query = $this->db->get("cartlist");
         if($query->num_rows == 1)
		{
                        //storing the row return from the query
			$row = $query->row();
			$result['singlelineitem'] = TRUE;
			$result['design_id'] = $row->first_name;
			$result['quantity'] = $row->last_name;
			$result['collar_id'] = $row->reference;		//need not query since already available
                        $result['material_id'] = $row->reference;
                        $result['colour_id'] = $row->reference;//need not query since already availabl
                        $result['result'] = TRUE;
                }
          return $result;
     }
     
     public function getCartlistByID($id){
         $result = array();
         $result['result'] = FALSE;
         $this->db->select('cart_list_id,singlelineitem,cart_id');
         $this->db->where('cart_list_id',1);
         $query = $this->db->get("cartlist");
            if($query->num_rows == 1)
		{
                        //storing the row return from the query
			$row = $query->row();
			$result['cart_list_id'] = $row->cart_list_id;
			$result['singlelineitem'] = $row->singlelineitem;
			$result['cart_id'] = $row->reference;		//need not query since already
                        $result['result'] = TRUE;
                }
          return $result;
     }   
     }
?>
