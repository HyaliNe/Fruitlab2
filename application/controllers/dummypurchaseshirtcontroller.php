<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dummypurchaseshirtcontroller extends CI_Controller {
	
	public function index($id = 0 ) {

			$data['main_content'] = 'transaction/purchaseshirt';
			$this->load->view('includes/template', $data);

	}
}
