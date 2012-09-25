<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dashboard Page
 *
 * @package		Fruitlab
 * @author		Jason Tan
 *
 */

class Dashboard extends CI_Controller {
	
	public function index() {
		$data['main_content'] = 'dashboard';
		$this->load->view('includes/template', $data);
		
	}
	
}


/* End of file dashboard.php */
/* Location: ./controllers/dashboard.php */	
