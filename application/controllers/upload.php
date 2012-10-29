<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
	    $config['allowed_types']  = 'gif|jpg|png';
	    $config['max_size']       = '1000';
		$config['file_name'] = time();
		// $config['max_width']   = '1024';
	    // $config['max_height']  = '768';
	    
            $this->load->library('upload', $config);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'title', 'required|trim');
	    $this->form_validation->set_rules('price', 'price', 'required|trim|callback_check_format');
	    $this->form_validation->set_rules('type', 'type', 'required|trim');//sales,private,hidden
            //by default is error free method
            //do the file upload method;
            $data['error'] = '';
            $data['main_content'] = 'design/upload_form';
            //define a false variable to prevent going into outer loop
            $result = false;
            if($this->form_validation->run()) {
                $result = $this->upload->do_upload();

                if (!$result) {
                     //display the image upload failures options
                     $data['error'] =  $this->upload->display_errors();
                     $data['main_content'] = 'design/upload_form';
                } else {
                     $filedata = $this->upload->data();
                     $filepath = $filedata['file_name'];
                     $postdata = $this->input->post();
                     $price    = $postdata['price'];
                     $title    = $postdata['title'];
                     $type     = $postdata['type'];
					 $customer_id             = $this->input->post('customer_id');
                    
 					//customer id waiting for the glchua2
					$user_data       = array(
									"customer_id" => $customer_id,
									"image_path"  => $filepath,
									"price"       => $price,
									"title"       => $title,
									"type"        => $type
									);
									
					$this->db->insert('design', $user_data);
					
                    $insertid = $this->db->insert_id(); //helper method to get the insert id when inserting into the database
					
										
					if (!empty($postdata['tag'])) {
						$tags = $postdata['tag'];
	                     foreach ($tags as $tag) {
	                         $db = "INSERT INTO taglist VALUES($tag,$insertid)";
	                         $this->db->query($db);
	                	}
					}
					 $data['user_data'] = $user_data;
                     $data['upload_data']  = $this->upload->data();
                     $data['main_content'] = 'design/upload_success';
                }
		}
		
			$this->load->model('tag_model');
			$data['tag_list'] = $this->tag_model->getTags();
         
   			$this->load->view('includes/template', $data);
    }

	// Ensure price format return TRUE if more than 0.
	public function check_format($price) {
		$result = ($price > 0) ? TRUE : FALSE;
		
		if (!$result) {
			$this->form_validation->set_message('check_format', '%s must be more then 0.');			
		}
		return $result;
	}
	
}



/* End of file account.php */
/* Location: ./controllers/account.php */
