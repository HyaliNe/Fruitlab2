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
		
		$this->db->select('role_id');
		$this->db->where('email', $email);
		$this->db->where('password', $password );
		$query = $this->db->get('customer', 1); //LIMIT 1

		if ($query->num_rows == 1) { 
			$row = $query->row();
			
			$result['result'] = TRUE;
			$result['role'] = $row->role;
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
	public function create_account($user)
	{		
		
		$user_data = array(
						'email' => $user['email'],
						'first_name' => $user['first_name'],
						'last_name' => $user['last_name'],
						'password' => sha1($user['password']),
						'role_id' => '2',			//1 is admin, 2 is customer
					//	'date_created' => time(),						
						'country' => $user['country']

					);
		
		$data = $this->db->insert('customer', $user_data);
		
		return $data;
	}
	
	public function update_settings($user)
	{
		//creating a new array
		$user_data = array(
						'first_name' => $user['first_name'],
						'last_name' => $user['last_name'],
						'password' => sha1($user['password']),
						'country' => $user['country']
						
						);
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
	
	public function retrieve_settings($email)
	{
		$result = array();
		$result['result'] = FALSE;
		
		$this->db->select('first_name,last_name,country,password');
		$this->db->where('email', $email);
		$query = $this->db->get('customer',1);	//LIMIT 1
		
		if($query->num_rows == 1)
		{	
			//storing the row return from the query
			$row = $query->row();

			//array of result
			$result['result'] = TRUE;
			$result['first_name'] = $row->first_name;
			$result['last_name'] = $row->last_name;
			$result['email'] = $email;		//need not query since already available
			$result['country'] = $row->country;
			$result['password'] = $row->password;
		}
		//return to the calling class, then the calling class need to 
		//check result['result'] to see whether there are result from the query
		return $result;
	}
}

/* End of file account_model.php */
/* Location: ./models/account_model.php */