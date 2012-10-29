<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Design Page
 *
 * Handles all page that involves design
 *
 * @package		Fruitlab
 * @author		Jason Tan
 */
class Design_test extends CI_Controller {

    function index() {
        $this->load->library('unit_test');

        #######################
        # GET A SINGLE DESIGN #
        #######################
        
        $test_name = 'Fetched Design Based on the ID Success';
        $this->load->model('design_model');
        $design_id = 1;
        $result =  $this->design_model->fetchSingleDesign($design_id);
        $result = $result['exist'];
        $expected_result = true;
        $this->unit->run($result, $expected_result, $test_name);
        
        $test_name = 'Fetched Design Based on the ID Fail';
        $this->load->model('design_model');
        $design_id = 'XYZ';
        $result =  $this->design_model->fetchSingleDesign($design_id);
        $result = $result['exist'];
        $expected_result = false;
        $this->unit->run($result, $expected_result, $test_name);
        
        ###########################
        # SEARCH FOR DESIGN BY ID #
        ###########################
        
        $test_name = 'Search for Design Like SUCCESS';
        $this->load->model('design_model');
        $result =  $this->design_model->searchByTitle('sad');
        $result = $result->num_rows;
        $expected_result = 7;
        $this->unit->run($result, $expected_result, $test_name);
        
        #######################################
        # COMMENT ON A DESIGN                 #
        #######################################
        
        $test_name = 'Comment On Design Return One Row SUCCESS';
        $this->load->model('design_model');
        $user = array();
        $user['customer_id'] = 1;
        $user['comment'] = 'Nice Design';
        $user['design_id'] = 1;
        $result = $this->design_model->comment($user);
        $expected_result = 1;
        $this->unit->run($result, $expected_result, $test_name);
        
        #######################################
        # FETCH A COMMENT                     #
        #######################################
        
        $test_name = 'FETCH on comment returns a resultset SUCCESS';
        $this->load->model('design_model');
        $design_id = 1;
        $result = $this->design_model->fetchComment($design_id);
        print_r($result);
        $expected_result = 'is_object';
        $this->unit->run($result, $expected_result, $test_name);
        
        #####################################################
        # FETCH A SINGLE DESIGN                             #
        #####################################################
        
        $test_name = 'FETCH on comment returns a resultset SUCCESS';
        $this->load->model('design_model');
        $design_id = 1;
        $result = $this->design_model->fetchComment($design_id);
        print_r($result);
        $expected_result = 'is_object';
        $this->unit->run($result, $expected_result, $test_name);
        
        #####################################################
        # CHECK IF A DESIGN BELONGS TO SUCCESS              #
        #####################################################
       
        $test_name = 'Check if a Design belongs to FAILED';
        $this->load->model('design_model');
        $design_id = 12;
        $customer_id = 9;
        $result = $this->design_model->designBelong($design_id,$customer_id);
        $expected_result = FALSE;
        $this->unit->run($result, $expected_result, $test_name);
        
        $test_name = 'Check if a Design belongs to SUCCESS';
        $this->load->model('design_model');
        $design_id = 17;
        $customer_id = 8;
        $result = $this->design_model->designBelong($design_id,$customer_id);
        $expected_result = TRUE;
        $this->unit->run($result, $expected_result, $test_name);
        
        #####################################################
        # DELETE A DESIGN                                   #
        #####################################################
        
        $test_name = 'Delete a Design FAILED';
        $this->load->model('design_model');
        $result = $this->design_model->deleteDesign(110,9);
        $expected_result = 'Design does not exist';
        $this->unit->run($result['message'], $expected_result, $test_name); 
        
        //should I do a delete design after inserting the design
        $test_name = 'Delete a Design when an ID existed SUCCESS';
        $this->load->model('design_model');
        $result = $this->design_model->deleteDesign(17,8);
        $expected_result = 'Design has been successfully deleted!';
        $this->unit->run($result['message'], $expected_result, $test_name); 
        
        // DONT TOUCH THIS CODE
        echo $this->unit->report();
    }
}

?>