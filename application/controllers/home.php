<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * FruitLab Landing Page
 *
 * The first page that user will see.
 *
 * @package		Fruitlab
 * @subpackage	
 * @author		Jason Tan
 * @link
 */

class Home extends CI_Controller {
	
	public function index() {
		$data['main_content'] = 'home';
		$this->load->view('includes/template', $data);
	}
		
}



/* End of file home.php */
/* Location: ./controllers/home.php */	

