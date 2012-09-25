<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Login Page
 *
 * @package		Fruitlab
 * @author		Jason Tan
 */

class Login extends CI_Controller {
	
	/**
	 * Index Function;
	 *
	 * @access	public
	 * @return 	login view 	
	 *
	 */

	public function index($error = '') {
		$data['error'] = $error;
		$data['main_content'] = 'account/login';
		$this->load->view('includes/template', $data);
	}					
	
/**
 * Validate Login
 *
 */
	public function validate() {

		$this->load->model('account_model');

		$email    = $this->input->post('email');
		$password = sha1( $this->input->post('password') );	
		$validate = $this->account_model->validate( $email, $password );

		if ($validate['result']) { // User is valid

			$data = array(
				'email' => $email,
				'role' => $validate['role'] 
			);

			$this->session->set_userdata($data);

		redirect('dashboard');

		} else { // User entered wrong login info, call index function again.
			$this->index(true);
		}	
	}

}



/* End of file login.php */
/* Location: ./controllers/login.php */	
