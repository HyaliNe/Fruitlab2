<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Account Page
 *
 * Handles all page that involves account
 *
 * @package		Fruitlab
 * @author		Jason Tan
 */

class Account extends CI_Controller {
	
	public function index() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim');
	}
	public function register_success() {
		$data['main_content'] = 'account/register_success';
		$this->load->view('includes/template', $data);
	}
	
}


/* End of file account.php */
/* Location: ./controllers/account.php */	
