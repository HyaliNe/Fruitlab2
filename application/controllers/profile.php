<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * profile Page
 *
 * @package		Fruitlab
 * @author		Guo Liang, Chen Deshun
 *
 */

class Profile extends CI_Controller {
	
	/**
	 * profile
	 *
	 **/
	public function index($userId = 0) {

	

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('hp_no', 'Handphone no', 'numeric|max_length[20]|min_length[8]');
		$this->form_validation->set_rules('about_you', 'About you', 'max_length[150]');	

		if ($this->form_validation->run()) { 
			// Load account model and call function to update settings
			$this->load->model('account_model');
			//this will post all the data to the method update_settings
			$result = $this->account_model->update_profile($this->input->post());
		//	$result = $this->account_model->create_account($this->input->post());
			
			// settings update successfully
			if ($result) { 
				redirect('dashboard');
			}		
		} else {
			// not successful, go back to profile
		$data['main_content'] = 'account/profile';
		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['country'] = $this->input->post('country');
		$data['email'] = $this->input->post('email');
		$data['gender'] = $this->input->post('gender');
		$data['hp_no'] = $this->input->post('hp_no');
		$data['about_you'] = $this->input->post('about_you');
		$data['date_of_birth'] = $this->input->post('date_of_birth');
		$this->load->view('includes/template', $data);
		}	

	}
	
	//view
	public function retrieve($userId = 0)
	{
		
	//	echo "User Id: $userId";	
		
		$this->load->model('account_model');
		//retrieve email, then use it to query
		$customer_id = $this->session->userdata('customer_id');
		
		$data = $this->account_model->retrieve_profile($customer_id);
		
		//if query has result
		if($data['result'])
		{	
			//setting it such that template know which page to redirect to
			$data['main_content'] = 'account/profile';
			//by adding variable behind, data is being pass to the file specified.
			$this->load->view('includes/template', $data);
		}
	}
	
	/**
	 * Load user profile page
	 *
	 * Check if userid is provided then retrive and display, otherwise load error message
	 *
	 * @access	public
	 * 
	 * @param	int	ID of the user to fetch from database.
	 *
	 * @return 
	 */	
	public function profile($id = 0) {
		
		if ( $id = 0 ) {
			$data['message_title'] = "Profile not found";
			$data['message'] = "Sorry, we are unable to locate the profile you are requesting to view.";
				
			$data['main_content'] = "message";
		} else {
			$this->load->model('account_model');
			
			$data = $this->account_model->retrieve_profile($id);
			
			if ( $data['result'] ) {
				
				//start retriving stuff that the profile page needs after confirming that the user exsist.
				$data['activity'] = $this->account_model->fetchActivityRecord($id);
				
				//to uo liang
				//decide the template to load. Leave it for you since I haven't done it.
				$data['main_content'] = ;
				
			} else {
				// How can I make it such that I dont have to retype this bullshit error message twice in the method.
				$data['message_title'] = "Profile not found";
				$data['message'] = "Sorry, we are unable to locate the profile you are requesting to view.";
				
				$data['main_content'] = "message";
			}
		}
		
		$this->load->view('includes/template', $data);
	}
}


/* End of file profile.php */
/* Location: ./controller/profile.php */	
