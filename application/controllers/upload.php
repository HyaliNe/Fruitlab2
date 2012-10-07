<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
        function remove(){
            $getdata = $this->input->get();
            $id = $getdata["id"];
            if($id != null){
                $this->db->where('design_id', $id);
                $result = $this->db->update('design', array('type' => 'remove')); 
                $data['error'] = 'Design ID ='.$id .' has been successfully removed';
                $data['main_content'] = 'upload_form';
                $this->load->view('includes/template', $data);
            }
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
                     $filepath = 'uploads/'. $filedata['file_name'];
                     $postdata = $this->input->post();
                     $price = $postdata['price'];
                     $title = $postdata['title'];
                     $type = $postdata['type'];
                     //customer id waiting for the glchua2
                     $db = "INSERT INTO design (customer_id,image_path,price,title,type)
                     VALUES(1,'". $filepath. "'," . $price . ",'" . $title . "','" . $type . "')";
                     echo $db;
                     $this->db->query($db);
                     $data = array('upload_data' => $this->upload->data());
		     $data['main_content'] = 'upload_success';
                }
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
		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{       
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_success', $data);
		}

    }	
}

/* End of file account.php */
/* Location: ./controllers/account.php */	