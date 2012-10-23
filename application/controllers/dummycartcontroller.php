<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * profile Page
 *
 * @package		Fruitlab
 * @author		Guo Liang, Chen Deshun
 *
 */

class Dummycartcontroller extends CI_Controller {
	
	/**
	 * profile
	 *
	 **/
	public function index($userId = 0) {
		
		$data['main_content']	= 'transaction/view_cart';
		
		$this->load->view('includes/template', $data);	
	}
	
	//view
	public function retrieve()
	{
	
	}

}


/* End of file Dummycartcontroller.php */
/* Location: ./controller/Dummycartcontroller.php */	
