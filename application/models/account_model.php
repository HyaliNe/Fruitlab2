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
		
		$this->db->select('role');
		$this->db->where('email', $email);
		$this->db->where('password', $password );
		$query = $this->db->get('account', 1); //LIMIT 1

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
						'country' => $user['country'],
						'password' => sha1($user['password']),				
						'role' => 'user',
						'date_created' => time()
					);
		
		$data = $this->db->insert('account', $user_data);
		
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

		$this->db->select('accountId');
		$this->db->where('email', $email);
		$query = $this->db->get('account', 1); //LIMIT 1
								
		return ($query->num_rows == 1) ? FALSE : TRUE; 
	}	
}

/* End of file account_model.php */
/* Location: ./models/account_model.php */