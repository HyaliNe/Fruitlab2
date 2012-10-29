<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Account Page
 *
 * Handles all page that involves account
 *
 * @package		Fruitlab
 * @author		Jason Tan
 */
class Account_test extends CI_Controller {

    function index() {
        $this->load->library('unit_test');

        ##################
        # VALIDATE LOGIN #
        ##################
        
        $test_name = 'Validate Login check FAIL';
        $this->load->model('account_model');
        $email = 'alvin@alvin.com';
        $password = 'abc123';
        $password = sha1($password);
        $f_result = $this->account_model->validate($email, $password);
        $result = $f_result['result'];
        $expected_result = FALSE;
        $this->unit->run($result, $expected_result, $test_name);

        $test_name = 'Validate Login check SUCCESS';
        $this->load->model('account_model');
        $email = 'defalcator@gmail.com';
        $password = '1qazws';
        $password = sha1($password);
        $f_result = $this->account_model->validate($email, $password);
        $result = $f_result['result'];
        $expected_result = TRUE;
        $this->unit->run($result, $expected_result, $test_name);
        $test_name = 'Validate Login check SUCCESS ROLE';
        $result = $f_result['role'];
        $expected_result = 2;
        $this->unit->run($result, $expected_result, $test_name);
        
        ##################
        # VALIDATE LOGIN #
        ##################

        $test_name = 'email exist check FAILED';
        $this->load->model('account_model');
        $email = 'hello@gmail.com';
        $result = $this->account_model->email_exist($email);
        $expected_result = TRUE;
        $this->unit->run($result, $expected_result, $test_name);
        
        
        $test_name = 'email exist check SUCCESS';
        $this->load->model('account_model');
        $email = 'defalcator@gmail.com';
        $result = $this->account_model->email_exist($email);
        $expected_result = FALSE;
        $this->unit->run($result, $expected_result, $test_name);
        
        #############################
        # RETRIEVE CUSTOMER PROFILE #
        #############################
        
        $test_name = 'Check if the customer profile based on ID SUCCESS';
        $this->load->model('account_model');
        $customer_id = 1;
        $result = $this->account_model->retrieve_profile($customer_id);
        $result = $result['result'];
        $expected_result = TRUE;
        $this->unit->run($result,$expected_result,$test_name);
        
        $test_name = 'Check if the customer profile based on ID FAILED';
        $this->load->model('account_model');
        $customer_id = 'XYZ';
        $result = $this->account_model->retrieve_profile($customer_id);
        $result = $result['result'];
        $expected_result = FALSE;
        $this->unit->run($result,$expected_result,$test_name); 
        
        ####################################################
        # GET ALL ACTIVITY RECORD BASED ON CUSTOMER ID     #
        ####################################################
        
        $test_name = 'Check if the customer profile based on ID SUCCESS';
        $this->load->model('account_model');
        $customer_id = 1;
        $result = $this->account_model->fetchActivityRecord($customer_id);
        $expected_result = FALSE;
        $result = sizeof($result);
        $expected_result = 7;
        $this->unit->run($result,$expected_result,$test_name); 
        
        ###########################################
        # GET ALL FRIEND BASED ON THE USER ID     #
        ########################################### 
        
        $test_name = 'Get all Friends Based On Your Input ID SUCCESS';
        $this->load->model('account_model');
        $customer_id = 8;
        $result = $this->account_model->getFriendList($customer_id);
        $expected_result = 'is_object'; 
        $this->unit->run($result,$expected_result,$test_name);
        
        ###########################################
        # SEARCH FOR FRIENDS(FIND PEOPLE)         #
        ###########################################
        
        $test_name = 'Get the number of friend based on current design ID SUCCESS';
        $this->load->model('account_model');
        $customer_id = 8;
        $result = $this->account_model->getFriendList($customer_id);
        $result = $result->num_rows; 
        $expected_result = 1;
        $this->unit->run($result,$expected_result,$test_name);
        
        
        $test_name = 'Filter the friends based on the FName SUCCESS';
        $this->load->model('account_model');
        $user['customer_id'] = '8';
        $user['fname'] = 'Chua';
        $result = $this->account_model->searchFriend($user);
        $result = $result->num_rows; 
        $expected_result = 1; 
        $this->unit->run($result,$expected_result,$test_name);
        
        ###########################################
        # SEARCH FOR FRIENDS(FIND PEOPLE)         #
        ###########################################
        
        $test_name = 'Filter the friends based on the FName SUCCESS';
        $this->load->model('account_model');
        $user['customer_id'] = '8';
        $user['fname'] = 'Chua';
        $result = $this->account_model->searchFriend($user);
        $result = $result->num_rows; 
        $expected_result = 1; 
        $this->unit->run($result,$expected_result,$test_name); 
        
        
        // DONT TOUCH THIS CODE
        echo $this->unit->report();
        
    }
}

?>