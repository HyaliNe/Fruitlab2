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
		
		$activityList = $this->activity_model->activityList($this->session->userdata('customer_id'));
		
		if($activityList != false) {
			$data['listExist'] = true;
			$data['activity'] = $activityList;
		} else {
			$data['listExist'] = false;
		}
		
		
		$data['main_content'] = 'dashboard';
		$this->load->view('includes/template', $data);
		
	}
	
}


/* End of file dashboard.php */
/* Location: ./controllers/dashboard.php */	
