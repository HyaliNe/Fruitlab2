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
            //load the config class libraries here
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'title', 'required|trim');
	    $this->form_validation->set_rules('price', 'price', 'required|trim|integer');
	    $this->form_validation->set_rules('type', 'type', 'required|trim');//sales,private,hidden
            //by default is error free method
            //do the file upload method;
            $data['error'] = '';
            $data['main_content'] = 'upload_form';
            //define a false variable to prevent going into outer loop
            $result = false;
            if($this->form_validation->run())
                $result = $this->upload->do_upload();
                if(!$result){
                     //display the image upload failures options
                     $data['error'] = 'Please upload a valid images';
                     $data['main_content'] = 'upload_form';
                }else{
                     $filedata = $this->upload->data();
                     $filepath = $filedata['full_path'];
                     $postdata = $this->input->post();
                     $price = $postdata['price'];
                     $title = $postdata['title'];
                     //customer id waiting for the glchua2
                     $result = $this->db->query("INSERT INTO design (customer_id,image_path,price,title)
                     VALUES(1,'". $filepath. "'," . $price . ",'" . $title . "'");
                     $data = array('upload_data' => $this->upload->data());
		     $data['main_content'] = 'upload_success';
                }
                $this->load->view('includes/template', $data);
            }
        }

/* End of file account.php */
/* Location: ./controllers/account.php */	
