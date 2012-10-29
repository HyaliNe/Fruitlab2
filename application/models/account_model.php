<?php

class Account_model extends CI_Model {

    /**
     * Validate user input for authentication
     *
     * Match email and password with database and check if any results returned.
     * If it return, user's input validates. Else it doesn't validate.
     *
     * @access	public
     * 
     * @param 	string	Email input by user.
     * @param 	string	Password input by user.
     *
     * @return 	array 	Return ['result'] TRUE if any or FALSE and return ['role'] if any.
     */
    public function validate($email, $password) {

        $result = array();
        $result['result'] = FALSE;

        $this->db->select('role_id, status, customer_id');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('customer', 1); //LIMIT 1

        if ($query->num_rows == 1) {
            $row = $query->row();

            $result['result'] = TRUE;
            $result['role'] = $row->role_id;
            $result['status'] = $row->status; //additional att to prevent ban user from logging in
            $result['customer_id'] = $row->customer_id;
        }

        return $result;
    }

    /**
     * Create account
     *
     * Create a new account for user by insert data in db
     *
     * @access	public
     * 
     * @param 	array	POST content
     *
     * @return 	boolean 	true when successfully insert data
     */
    public function create_account($user) {

        $user_data = array(
            'email' => $user['email'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'password' => sha1($user['password']),
            'role_id' => '2', //1 is admin, 2 is customer
            //	'date_created' => time(),						
            'country' => $user['country']
        );

        $data = $this->db->insert('customer', $user_data);

        return $data;
    }

    public function update_settings($user, $file = "") {
        if ($user['formtype'] == "generalform") {
            $user_data = array(
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'country' => $user['country'],
                'date_of_birth' => (($user['date_of_birth'] != null) ? $user['date_of_birth'] : null),
                'about_you' => (($user['about_you'] != null) ? $user['about_you'] : null),
                'hp_no' => (($user['hp_no'] != null) ? $user['hp_no'] : null),
                'gender' => (($user['gender'] != null) ? $user['gender'] : null)
            );
        } elseif ($user['formtype'] == "passwordform") {
            $user_data = array(
                'password' => sha1($user['password'])
            );
        } else {
            //creating the array to update customer table
            $user_data = array(
                'img_path' => $file['file_name']
            );
        }
        //creating a new array

        $this->db->where('email', $user['email']);
        $data = $this->db->update('customer', $user_data);
        return $data;
    }

    /**
     * Check Email
     *
     * Check if email exist in database.
     *
     * @access	public
     * 
     * @param 	string Email	
     *
     * @return 	boolean TRUE if  	
     */
    public function email_exist($email) {

        $this->db->select('customer_id');
        $this->db->where('email', $email);
        $query = $this->db->get('customer', 1); //LIMIT 1
        
        return ($query->num_rows == 1) ? FALSE : TRUE;
    }

    public function retrieve_settings($email) {
        $result = array();
        $result['result'] = FALSE;

        $this->db->select('first_name,last_name,country,password,date_of_birth,about_you,hp_no,gender,img_path');
        $this->db->where('email', $email);
        $query = $this->db->get('customer', 1); //LIMIT 1

        if ($query->num_rows == 1) {
            //storing the row return from the query
            $row = $query->row();

            //array of result
            $result['result'] = TRUE;
            $result['first_name'] = $row->first_name;
            $result['last_name'] = $row->last_name;
            $result['email'] = $email;  //need not query since already available
            $result['country'] = $row->country;
            $result['password'] = $row->password;
            $result['date_of_birth'] = $row->date_of_birth;
            $result['about_you'] = $row->about_you;
            $result['hp_no'] = $row->hp_no;
            $result['gender'] = $row->gender;
            $result['img_path'] = $row->img_path;
            $result['error'] = ''; //error message for upload
        }
        //return to the calling class, then the calling class need to 
        //check result['result'] to see whether there are result from the query
        return $result;
    }

    public function retrieve_profile($customer_id) {
        $result = array();
        $result['result'] = FALSE;
        $this->db->select('first_name,last_name,country,gender, about_you, email, date_of_birth, hp_no,balance,status,customer_id,img_path');
        //$this->db->select('first_name,last_name,country,gender, about_you, email, date_of_birth, hp_no','balance','status','balance');
        $this->db->where('customer_id', $customer_id);
        $query = $this->db->get('customer', 1); //LIMIT 1
        if ($query->num_rows == 1) {
            //storing the row return from the query
            $row = $query->row();
            //array of result
            $result['result'] = TRUE;
            $result['first_name'] = $row->first_name;
            $result['last_name'] = $row->last_name;
            $result['email'] = $row->email;  //need not query since already available
            $result['country'] = $row->country;
            $result['gender'] = $row->gender;
            $result['about_you'] = $row->about_you;
            $result['hp_no'] = $row->hp_no;
            $result['img_path'] = $row->img_path;
            $result['date_of_birth'] = $row->date_of_birth;
            //alvin has added this to reuse method
            $result['status'] = $row->status;
            $result['customer_id'] = $row->customer_id;
            $result['balance'] = $row->balance;
        }
        //return to the calling class, then the calling class need to 
        //check result['result'] to see whether there are result from the query
        return $result;
    }

    public function update_profile($user) {
        //creating a new array
        $user_data = array(
            'img_path' => (($user['img_path'] != null) ? $user['img_path'] : null),
            'gender' => (($user['gender'] != null) ? $user['gender'] : null),
            'country' => (($user['country'] != null) ? $user['country'] : null),
            'hp_no' => (($user['hp_no'] != null) ? $user['hp_no'] : null),
            'about_you' => (($user['about_you'] != null) ? $user['about_you'] : null),
            'date_of_birth' => (($user['date_of_birth'] != null) ? $user['date_of_birth'] : null),
            'email' => $user['email']
        );
        $this->db->where('customer_id', $user['customer_id']);
        $data = $this->db->update('customer', $user_data);
        return $data;
    }

    public function fetchActivityRecord($customer_id) {
        //this will select out activity done by the customer with id customer_id
        $this->db->select('activity_id, customer_id, timestamp, affected_id');
        $this->db->where('customer_id', $customer_id);
        $this->db->or_where('affected_id', $customer_id);
        $ownactivity = $this->db->get('activity');

        //array will be returned. handle with caution
        return $ownactivity->result();
    }

    //get friendlist functionality
    public function getFriendList($customer_id) {
        $result['result'] = true;

        $this->db->select('customer_id2, img_path, first_name, last_name');
        $this->db->from('is_friends_with');
        $this->db->where('is_friends_with.customer_id', $customer_id);
        $this->db->join('customer', 'customer.customer_id = is_friends_with.customer_id2');
        $result = $this->db->get();

        // $i = 0;
        // foreach($query->result() as $row){
        //every single row retrieve a profile
        // $data = $this->retrieve_profile($row->customer_id2);
        // $result[$i]['first_name'] = $data['first_name'];
        // $result[$i]['last_name'] = $data['last_name'];
        // $result[$i]['img_path'] = $data['img_path'];
        // $result[$i]['customer_id2'] = $row->customer_id2;
        // $i++;
        // }
        return $result;
    }

    //@todo search friends function currently not working as expected
    
    public function searchFriend($user) {
        $this->db->select('customer_id2, img_path, first_name, last_name');
        $this->db->from('is_friends_with');
        $this->db->where('is_friends_with.customer_id', $user['customer_id']);
        $this->db->join('customer', 'customer.customer_id = is_friends_with.customer_id2');

        if (isset($user['fname']) && $user['fname'] != '') {
            $this->db->like('first_name', $user['fname']);
        }
        $query = $this->db->get();
        return $query;
    }
	
	public function removeFriend($user) {
	
		//check if "me" is friend with $user
		//remove connections both ways
		
		$isfriends = $this->isFriends($user);
			
		if ($isfriends) {
			$this->db->where('customer_id', $this->session->userdata('customer_id'));
			$this->db->where('customer_id2', $user);
			$this->db->delete('is_friends_with'); 

			$this->db->where('customer_id2', $this->session->userdata('customer_id'));
			$this->db->where('customer_id', $user);
			$this->db->delete('is_friends_with'); 
			
			return true;
		}
		
		return false;
	}
	
	public function isFriends($user) {
		
		$this->db->from('is_friends_with');
		$this->db->where('customer_id', $this->session->userdata('customer_id'));
		$this->db->where('customer_id2', $user);
		$query = $this->db->get();
		
		$isfriends = false;
		if( $query->num_rows() == 1) $isfriends = true;
		
		$this->db->from('is_friends_with');
		$this->db->where('customer_id2', $this->session->userdata('customer_id'));
		$this->db->where('customer_id', $user);
		$query2 = $this->db->get();
		
			
		if ( $query2->num_rows() != 1) $isfriends = false;
		
		return $isfriends;
	}

}

/* End of file account_model.php */
/* Location: ./models/account_model.php */
