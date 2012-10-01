<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	function index()
	{       
            //configurations files for uploading images
            $config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size']	= '1000';
	    $config['max_width']  = '1024';
	    $config['max_height']  = '768';
            $this->load->library('upload', $config);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'title', 'required|trim');
	    $this->form_validation->set_rules('price', 'price', 'required|trim');
	    $this->form_validation->set_rules('type', 'type', 'required|trim');
            $this->form_validation->set_rules('rating','rating','required|trim');
            $data['error'] = '';
            $data['main_content'] = 'upload_form';
            $result = $this->upload->do_upload();
            if($this->form_validation->run()){
                 print_r($this->input->post());
                 if( !$result){//upload image failures
                     $data['error'] = 'The images is not allowed';
                 }else{    
                     $data['error'] = 'upload_success';
                     $data = array('upload_data' => $this->upload->data());
                 }
            }
            $this->load->view('includes/template', $data);
        }
}

/* End of file account.php */
/* Location: ./controllers/account.php */	
