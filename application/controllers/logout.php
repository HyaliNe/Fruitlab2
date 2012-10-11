<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Logout Page
 *
 * @package		Fruitlab
 * @author		Jason Tan
 *
 */

class Logout extends CI_Controller {
	
	/**
	 * Logout
	 *
	 **/
	public function index() {
		$this->session->sess_destroy();
		redirect('home');
	}
	
}


/* End of file logout.php */
/* Location: ./controller/logout.php */	
