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
class Transaction_test extends CI_Controller {

    function index() {
        
        $this->load->library('unit_test');
        
        ####################################################
        #To retrieve all details from customers account    #
        ####################################################
        
        $test_name = 'Get all Customer Account Successfully';
        $this->load->model('transaction_model');
        $customer_id = 1;
        $result = $this->transaction_model->getAllCustomer();
        $result = sizeof($result['customer']);
        $expected_result = 11;
        $this->unit->run($result, $expected_result, $test_name);
        
        ######################################################
        # WITHDRAW MONEY FROM THE CUSTOMER ACCOUNT           #
        ######################################################
        
        $test_name = 'Withdrawal Success if does not less than 0';
        $this->load->model('transaction_model');
        $customer_id = 1;
        $amount = 222;
        $result = $this->transaction_model->withdraw($customer_id,$amount);
        $expected_result = true;
        $this->unit->run($result['result'], $expected_result, $test_name);
        
        ######################################################
        # DEPOSIT MONEY INTO THE CUSTOMER ACCOUNT            #
        ######################################################
        
        $test_name = 'Deposit success if not more than 1000';
        $this->load->model('transaction_model');
        $customer_id = 1;
        $amount = 222;
        $result = $this->transaction_model->deposit($customer_id,$amount);
        $expected_result = true;
        $this->unit->run($result['result'], $expected_result, $test_name);
        
        ######################################################
        # GET THE CUSTOMER CartList History                  #
        ######################################################
        
        $test_name = 'Get Customer Payment History';
        $this->load->model('transaction_model');
        $customer_id = 1;
        $result = $this->transaction_model->getCustomerPaymentByCartList($customer_id);
        $result = sizeof($result);
        $expected_result = 9;
        $this->unit->run($result, $expected_result, $test_name);
        
        ######################################################
        # CHECKOUT not done                                  #
        ######################################################
        
        
        // DONT TOUCH THIS CODE
        echo $this->unit->report();
        
    }
}

?>