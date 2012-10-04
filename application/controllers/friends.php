<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Friends extends CI_Controller {
        function __construct()
	{
            	parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	function index()
	{  
            //$get current friends based on user id
            $data["error"] = '';
            $data["main_content"]  = 'friend_display';
            $this->load->view('includes/template', $data);
        }
        function search(){
            $data["error"] = '';
            $data["main_content"]  = 'friend_display';
            $postdata = $this->input->post();
            $name = $postdata['fname'];
            $username = $postdata['username'];
            $age = $postdata['age'];
            $this->load->view('includes/template', $data);
        }
}
/* End of file account.php */
/* Location: ./controllers/account.php */	
