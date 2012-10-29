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
class Cart_test extends CI_Controller {

    function index() {
        $this->load->library('unit_test');
        
        #####################################
        # VERFIED SEARCH FOR DESIGN OPTIONS #
        ####################################
        
        $test_name = 'Fetch design collar should return result success';
        $this->load->model('cart_model');
        $result = $this->cart_model->fetchOptions();
        $result = $result['collar']->num_rows;
        $expected_result = 3;
        $this->unit->run($result, $expected_result, $test_name);
        
        $test_name = 'Fetch design collar should return result success';
        $this->load->model('cart_model');
        $result = $this->cart_model->fetchOptions();
        $result = $result['colour']->num_rows;
        $expected_result = 6;
        $this->unit->run($result, $expected_result, $test_name);
        
        $test_name = 'Fetch design material should return result success';
        $this->load->model('cart_model');
        $result = $this->cart_model->fetchOptions();
        $result = $result['material']->num_rows;
        $expected_result = 3;
        $this->unit->run($result, $expected_result, $test_name);
        
        
        // DONT TOUCH THIS CODE
        echo $this->unit->report();
        
    }
}

?>