<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dummydesigncontroller extends CI_Controller {
	
	public function index($id = 0 ) {

			$data['main_content'] = 'design/design_gallery';
			$this->load->view('includes/template', $data);

	}
}
