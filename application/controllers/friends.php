<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Friends extends CI_Controller {
        function __construct()
	{
            	parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	function index()
	{  
            $data['searchvar'] = array();
            $data["error"] = '';
            $data["main_content"]  = 'friend_display';
            $this->load->view('includes/template', $data);
        }
        function search(){
            //$this->db->query
            $data["error"] = '';
            $data["main_content"]  = 'friend_display';
            $postdata = $this->input->post();
            if(isset($postdata['fname']) && $_POST['fname'] != ''){
                $name = $_POST['fname'];
                $this->db->where(array('first_name' => $name));
            }
            if(isset($postdata['username']) && $_POST['username'] != ''){
                $username = $_POST['username'];
                $this->db->where(array('username' => $username));
            }
            if((isset($postdata['gender']) && $_POST['gender']) != ''){
                 $gender = $postdata['gender'];
                 $this->db->where(array('gender' => $gender));
            }
            if((isset($postdata['fromage']) && $postdata['fromage'] != '' && $postdata['toage'] && $postdata['toage'] !='')){
                    $fromage = $postdata['fromage'];
                    $toage = $postdata['toage'];
                    $this->db->where("YEAR(CURDATE()) - dob_year - IF( STR_TO_DATE( CONCAT( YEAR( CURDATE( ) ) ,  '-', dob_month,  '-', dob_day ),'%Y-%c-%e' )> CURDATE( ) , 1, 0 ) BETWEEN '$fromage' AND '$toage'");
            }
            $searchvar = $this->db->get("customer");
            $data['searchvar'] = $searchvar;
            $data['main_content'] = 'friend_display';
            $this->load->view('includes/template', $data);
        }
}
/* End of file account.php */
/* Location: ./controllers/account.php */	
