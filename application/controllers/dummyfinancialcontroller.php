<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * profile Page
 *
 * @package		Fruitlab
 * @author		Guo Liang, Chen Deshun
 *
 */

class Dummyfinancialcontroller extends CI_Controller {
	
	/**
	 * profile
	 *
	 **/
	public function index($userId = 0) {
		
		$data['main_content']	= 'transaction/viewpaymenthistory(layoutonly)';
		$array = array(
					0 => 'processing',
					1 => 'processing',
					2 => 'processing'
						);
						
		$data['payment']		= $array;
		
		$this->load->view('includes/template', $data);	
	}
	
	//view
	public function retrieve()
	{
	
	}

}


/* End of file Dummyfinancialcontroller.php */
/* Location: ./controller/Dummyfinancialcontroller.php */	
