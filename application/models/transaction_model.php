<?php

class transaction_model extends CI_Model {
     
    public function getAllCustomer(){
        $result = array();
        $result['result'] = FALSE;
        $this->db->select('customer_id');
        $this->db->where('role_id',2);
        $query = $this->db->get('customer');
        $this->load->model('account_model');
        $i = 0;
        foreach ($query->result() as $row){
            $result['customer'][$i] = 
            $this->account_model->retrieve_profile($row->customer_id);
            $i++;
        }
        return $result;
    }
    public function getCustomerTransactions($user){
        $result = array();
        $result['result'] = FALSE;
        $this->db->select('transaction_id,trans_amt,timestamp,remarks');
        $this->db->where('customer_id',$user);
        $query = $this->db->get('transaction');
        $i = 0;
        foreach ($query->result() as $row){
            $result[$i]['transaction_id'] = $row->transaction_id;
            $result[$i]['trans_amt'] = $row->trans_amt;
            $result[$i]['timestamp'] = $row->timestamp;
            $result[$i]['remarks'] = $row->remarks;
            $i++;
        }
        return $result;
    }
    //you can define additional parameter here
    public function withdraw($user,$amount){
        $result['result'] = TRUE;
        $this->db->where('customer_id',$user['customer_id']);
        $this->db->select('balance');
        $balance = $this->db->get('customer');
        if( ($balance - $amount) > 0 ){//withdrawal success
            $newbalance = $balance - $amount;
            $userdata = array(
            'balance' => $newbalance
             );
            $this->db->where('customer_id',$user['customer_id']);
            $this->db->update('customer',$data);
        }
    }

    public function deposit($user,$amount){
        $result['result'] = TRUE;
        $this->db->where('customer_id',$user['customer_id']);
        $this->db->select('balance');
        $balance = $this->db->get('customer');
        if(($balance + $amount) > 1000){ //limit constraints to 1000
            $newbalance  = $balance + $amount;
            $data = array(
                'balanace' => $newbalance
            );
            $this->db->where('customer_id',$user['customer_id']);
            $this->db->update('customer',$data);
        }
    }
    
    
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
