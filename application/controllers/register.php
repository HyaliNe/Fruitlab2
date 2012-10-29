<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Register Page
 *
 * @package		Fruitlab
 * @author		Jason Tan
 */

class Register extends CI_Controller {
	
	/**
	 * Index Function;
	 *
	 * @access	public
	 * @return 	register view 	
	 *
	 */

	public function index() {
		
		// Country has a default value. Thus no validation is needed.
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'first name', 'required|trim|alpha');
		$this->form_validation->set_rules('last_name', 'last name', 'required|trim|alpha');
		//this line will call for email_exist()
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_email_exist');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[password2]|trim');			
		$this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[6]|trim');			
				
		if ($this->form_validation->run()) { 
			// Load account model and call function to create account
			$this->load->model('account_model');
			$result = $this->account_model->create_account($this->input->post());
			
			// Account successfully created
			if ($result) { 
				redirect('account/register_success');
			}		
		} else {
			// Account not created successfully. How?
		}
		$data['main_content'] = 'account/register';
		$this->load->view('includes/template', $data);
	}
	
	public function email() {
		
	}
	
		/**
		 * Check email exist
		 *
		 * Check if email exist in database.
		 *
		 * @access	public
		 * 
		 * @param 	string	
		 *
		 * @return 	boolean 	Return true if email DONT exist or false if EXIST
		 */

		public function email_exist($email) {

			$this->load->model('account_model');
			$result = $this->account_model->email_exist($email);
			$this->form_validation->set_message('email_exist', '%s already exist in our database.');

			return $result;
		}

	/**
	 * Logout
	 *
	 **/
		public function logout() {
			$this->session->sess_destroy();
			redirect('home');
		}
						
	
}



/* End of file login.php */
/* Location: ./controllers/login.php */	
