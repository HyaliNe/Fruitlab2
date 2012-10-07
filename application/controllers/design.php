<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Design extends CI_Controller {
	
	public function index($id = 0 ) {
		
		if($id == 0) {
			
			$data['main_content'] = 'design/design';
			$this->load->view('includes/template', $data);
			
		} else {
			$this->singleDesign($id);
		}

	}
	
	public function singleDesign($id) {
		$this->load->model('design_model');
		
		$design = $this->design_model->fetchSingleDesign($id);
		
		if ($design['exist']) {
			$data['design_id']		= $design['design_id'];
			$data['customer_id']	= $design['customer_id'];
			$data['image_path']		= $design['image_path'];
			$data['rating']			= $design['rating'];
			$data['price']			= $design['price'];
			$data['title']			= $design['title'];
			$data['type']			= $design['type'];
			
			$data['main_content'] = 'design/single_design';
		} else {
			$data['message_title'] = "Design not found";
			$data['message'] = "Some lengthy nice reply";
				
			$data['main_content'] = "message";
		}
		
		$this->load->view('includes/template', $data);
	}
	
	public function searchDesign(){
		$this->load->model('design_model');
		
		$result = $this->design_model->searchByTitle($this->input->post('search_clause'));
		
		if($result != false){
			$data['search_result'] = $result;
			$data['search_exist'] = true;

		} else {
			$data['search_exist'] = false;
		}
		
		$data['main_content'] = 'design/design';
		$this->load->view('includes/template', $data);
	}
}