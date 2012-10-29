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
		
		$comment = $this->design_model->fetchComment($id);

		
		if ($design['exist']) {
			$data['design_id']		= $design['design_id'];
			$data['customer_id']	= $design['customer_id'];
			$data['image_path']		= $design['image_path'];
			$data['rating']			= $design['rating'];
			$data['price']			= $design['price'];
			$data['title']			= $design['title'];
			$data['type']			= $design['type'];
			$data['num_of_rating']	= $design['num_of_rating'];
			$data['comment']		= $comment;
			$data['commented']		= $design['commented'];
			
			$data['main_content'] = 'design/single_design';
		} else {
			$data['message_title'] = "Design not found";
			$data['message'] = "Unable to retrieve the design you are looking for. Please try again.";
				
			$data['main_content'] = "message";
		}
		
		$this->load->view('includes/template', $data);
	}
	
	public function searchDesign(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search_clause', '', 'required');
		$this->form_validation->set_message('required', 'We can\'t search if you don\'t know what to search for.');

		if($this->form_validation->run()) { 
			$this->load->model('design_model');
		
			$result = $this->design_model->searchByTitle($this->input->post('search_clause'));
		
			if($result != false){
				$data['search_result'] = $result;
				$data['search_exist'] = true;

			} else {
				$data['search_exist'] = false;
			}
		}
		//changed to design/design_gallery instead of design/design
		$data['main_content'] = 'design/design_gallery';
		$this->load->view('includes/template', $data);
	}

	/**
	 * Load all design of a user
	 *
	 * Check if userid is provided then retrieve and display, otherwise load error message
	 *
	 * @access	public
	 * 
	 * @param	int	ID of the user to fetch from database.
	 *
	 * @return 
	 */	
	public function browseDesignByUser($id = 0) {
		
		if ( $id == 0 ) {
			$data['message_title'] = "User not found";
			$data['message'] = "Sorry, we are unable to locate the user you are requesting to view.";				
			$data['main_content'] = "message";
		} else {
			echo $id;
			$this->load->model('design_model');
			$result = $this->design_model->retriveDesignsByUser($id);
			
			if($result != false) {
				$data['search_result'] = $result;
				$data['search_exist'] = true;
			} else {
				$data['search_exist'] = false;
			}
			
			$data['main_content'] = "design/design_gallery";
		}
		$this->load->view('includes/template', $data);
	}
	
	// Manage own design
	public function own($data = "") {
		$customer_id = $this->session->userdata('customer_id');
		$this->load->model('design_model');
		$designs = $this->design_model->retriveDesignsByUser($customer_id);
				
		// $this->load->model('tag_model');
		//  $tags_query = $this->tag_model->getDesignTags(3);
		// 
		// echo "<pre>";
		// print_r($designs->result());
		// echo "</pre>";
		
		$data['data']         = (!empty($data)) ? $data['result'] : NULL;
		$data['designs']      = (!empty($designs)) ? $designs : '';
		$data['role'] = 2;
		$data['main_content'] = 'design/own_design';
		$this->load->view('includes/template', $data);
	}
	
	// Remove Own Design
	public function remove($design_id){
		$customer_id = $this->session->userdata('customer_id');
        if ($design_id != null) {
			$this->load->model('design_model');
			$result = $this->design_model->deleteDesign($design_id, $customer_id);

			$data['result'] = $result;
			$this->own($data);
        }
    }
    
	
}
