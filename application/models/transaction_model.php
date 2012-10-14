<?php
class transaction_model extends CI_Model {
    public function getAllCustomer(){
        $result = array();
        $result['result'] = FALSE;
        $this->db->select('customer_id');
        $this->db->where('role_id',2);
        $query = $this->db->get('customer');
        $i = 0;
        foreach ($query->result() as $row){
            $result['customer'][$i] = 
            $this->retrieve_profile($row->customer_id);
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
     
     public function retrieve_profile($customer_id)
	{
		$result = array();
		$result['result'] = FALSE;
		$this->db->select('first_name,last_name,country,gender, about_you, email, date_of_birth, hp_no,balance,status,customer_id');
		//$this->db->select('first_name,last_name,country,gender, about_you, email, date_of_birth, hp_no','balance','status','balance');
		$this->db->where('customer_id', $customer_id);
		$query = $this->db->get('customer',1);	//LIMIT 1
		if($query->num_rows == 1)
		{	
			//storing the row return from the query
			$row = $query->row();

			//array of result
			$result['result'] = TRUE;
			$result['first_name'] = $row->first_name;
			$result['last_name'] = $row->last_name;
			$result['email'] = $row->email;		//need not query since already available
			$result['country'] = $row->country;
			$result['gender'] = $row->gender;
			$result['about_you'] = $row->about_you;
			$result['hp_no'] = $row->hp_no;
			$result['date_of_birth'] = $row->date_of_birth;
                        //alvin has added this to reuse method
                        $result['status'] = $row->status;
                        $result['customer_id'] = $row->customer_id;
                        $result['balance'] = $row->customer_id;
			
		}
		//return to the calling class, then the calling class need to 
		//check result['result'] to see whether there are result from the query
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
