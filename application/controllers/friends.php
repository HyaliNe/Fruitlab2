<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Friends extends CI_Controller {
        function __construct()
	{
            	parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	function index()
	{  
            $customer_id = $this->session->userdata('customer_id');
            $this->load->model('account_model');            
			$friendlist = $this->account_model->getFriendlist($customer_id);
			
			if ($friendlist)
			{
				$data['friendlist'] = $friendlist;
            }
            $data['resultset'] = ''; 
            $data['error'] = '';
            $data['main_content']  = 'account/friend_display';
			$data['role'] = 2;
            $this->load->view('includes/template', $data);
        }
        
        function add(){
            $customer = $this->session->userdata('customer_id');
            $data['resultset'] = '';
            $data['error'] = '';
			$potential_friend_id = $this->input->post('potential_friend_id');
			$customer_id = $this->input->post('customer_id');
			
            if($potential_friend_id){
			
                $result = $this->db->insert('is_friends_with',
                array('customer_id'=> $customer_id
                ,'customer_id2' => $potential_friend_id
                ));

                $result2 = $this->db->insert('is_friends_with',
                array('customer_id2'=> $customer_id
                ,'customer_id' => $potential_friend_id
                ));				
                if($result && $result2){
                    $data['error'] == 'Successfully added the friend';
					$data['role'] = 2;
					redirect('user/'.$potential_friend_id);
                }else{
                    $data['error'] == 'Does not exist in the database';
                }
            }
			
            // $data['main_content'] = 'account/friend_display';
			// $data['js'] = 'jquery.ui.core';
			// $data['js'] = 'jquery.ui.datepicker';
			// $data['js'] = 'jquery-ui-1.8.18.custom';			
            // $this->load->view('includes/template', $data);
        }
        /*code that doesn't work
		function remove() {
            $customer = $this->session->userdata('customer_id');

            $data['error'] = '';
            $data['resultset'] = '';
            $getdata = $this->input->get();
            $customer_id2 = $getdata["id"];
            if ($customer_id2) {
                $result = $this->db->delete('is_friends_with',array('customer_id'=>$customer_id,'customer_id2'=>$customer_id2));
                if($result){
                    $data['error'] == 'Successfully deleted friends from the database';
                }else{
                    $data['error'] == 'Does not exist in the database';
                }
            }
			$data['js'] = 'jquery.ui.core';
			$data['js'] = 'jquery.ui.datepicker';
			$data['js'] = 'jquery-ui-1.8.18.custom';			
            $data['main_content'] = 'account/friend_display';
			$this->load->view('includes/template', $data);
        }*/
		
		function removeFriends($user) {
			$this->load->model('account_model');
			
			$this->account_model->removeFriend($user);
			
			$data['message_title'] = 'Friend Removed';
			
			$this->load->model('activity_model');
			$name = $this->activity_model->fetchName($user);
			
			$data['message'] = "You have successfulled removed $name as a friend";
			
			$data['main_content'] = 'message';
			$data['role'] = 2;
			$this->load->view('includes/template', $data);
		}

        function search() {
            $customer_id = $this->input->post('customer_id');
            $this->load->model('account_model');
            $data["noFriend"] = false;
            $data['friendlist'] = $this->account_model->searchFriend($this->input->post());
			if($data['friendlist']->num_rows == 0) {
				$data['noFriend'] = true;
			}
			$data['role'] = 2;
			$data['main_content'] = 'account/friend_display';
            $this->load->view('includes/template', $data);
        }
        
}
/* End of file account.php */
/* Location: ./controllers/account.php */	
