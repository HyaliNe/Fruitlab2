<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	function index()
	{       
                $this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'title', 'required|trim');
		$this->form_validation->set_rules('price', 'price', 'required|trim');
		$this->form_validation->set_rules('type', 'type', 'required|trim');
                $this->form_validation->set_rules('rating','rating','required|trim');
                if($this->form_validation->run()){
                    
                }
                $data['error'] = '';
                $data['main_content'] = 'upload_form';
		$this->load->view('includes/template', $data);
        }
	function do_upload()
	{
                
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{
                        $this->library->load("validation");
                        $rules = array(
                            );
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_success', $data);
		}
	}
}

/* End of file account.php */
/* Location: ./controllers/account.php */	
