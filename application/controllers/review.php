<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Login Page
 *
 * @package		Fruitlab
 * @author		Guo Liang
 */

class Review extends CI_Controller {
	
	/**
	 * Index Function;
	 *
	 * @access	public
	 * @return 	login view 	
	 *
	 */

	public function index() {
	
		$data['main_content'] = 'design/review';
		$this->load->view('includes/template', $data);		
	}					
	
/**
 * Validate Login
 *
 */
	public function comment() 
	{
		$this->load->model('design_model');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('comment', 'comment', 'max_length[150]');		
		$design_id = 'design/' . $this->input->post('design_id');
		if($this->form_validation->run())
		{	
			$comment = $this->design_model->comment($this->input->post());
		
			if($comment)
			{
				redirect($design_id);
			}
			else
			{
				$data['design_id'] = $this->input->post('design_id');
				//go back to the correct design page
				$data['main_content'] = 'design/' . $data['design_id'] ;
				$this->load->view('includes/template', $data);
			}
		}
	}
	
	public function rate()
	{
		$this->load->model('design_model');
		$design_id = $this->input->post('design_id');
		
		$rate = $this->design_model->rate($this->input->post());
		
		$redirect_string = 'design/' . $design_id;
		$data['design_id'] 	= $design_id;
		
		if($rate)
		{
			redirect($redirect_string);			
		}
		else
		{	//this method will not work
			$redirect_string = 'design/' . $design_id;
			$data['design_id'] = $design_id;
			//go back to the correct design page
			$data['main_content'] = $redirect_string;
			$this->load->view('includes/template', $data);
		}		
	}

}



/* End of file review.php */
/* Location: ./controllers/review.php */	
