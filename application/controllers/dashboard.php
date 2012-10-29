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
		$this->load->model('activity_model');
		
		$activityList = $this->activity_model->activityList($this->session->userdata('customer_id'), true);
		
		if($activityList != false) {
			$data['listExist'] = true;
			$data['activity'] = $activityList;
		} else {
			$data['listExist'] = false;
		}
		
		//load the latest designs of friends as well as globally
		//limit them to the latest 20
		//display message saying no design of respective segment found.
		
		$this->load->model('design_model');
		
		$data['globalDesignList'] = $this->design_model->fetchDesign();
		$data['friendDesignList'] = $this->design_model->fetchFriendsDesign($this->session->userdata('customer_id'));
		
		$data['role'] = 2;
		$data['main_content'] = 'dashboard';
		$this->load->view('includes/template', $data);
		
	}
	
}


/* End of file dashboard.php */
/* Location: ./controllers/dashboard.php */	
