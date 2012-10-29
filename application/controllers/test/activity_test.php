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
class Activity_test extends CI_Controller {

    function index() {
        $this->load->library('unit_test');

        #########################################################
        # ACTIVTITY LIST                                        #
        #########################################################

        $test_name = 'Fetched Activity Based Current ID SUCCESS';
        $this->load->model('activity_model');
        $customer_id = 8;
        $result = sizeof($this->activity_model->activityList($customer_id,FALSE));
        $expected_result = 8;//customer has 8 activity
        $this->unit->run($result, $expected_result, $test_name);
       
        $test_name = 'Fetched Activity Based Friends ID SUCCESS';
        $this->load->model('activity_model');
        $customer_id = 8;
        $result = sizeof($this->activity_model->activityList($customer_id,TRUE));
        $expected_result = 1;//customer has 8 activity
        $this->unit->run($result, $expected_result, $test_name);
        
        
        ########################################################
        # ADDING OF ACTIVITY  DOES NOT PROVIDE RETURN VALUE    #
        ########################################################
      
        
        #########################
        # FETCH ACTIVITY        #
        #########################
        
        $test_name = 'Fetched Activity Based On User ID SUCCESS';
        $this->load->model('activity_model');
        $customer_id = 8;
        $result = sizeof($this->activity_model->fetchActivity($customer_id));

        $expected_result = 1;//customer has 8 activity
        $this->unit->run($result, $expected_result, $test_name);
        
        #########################
        # FETCH DESIGN TITLE     #
        #########################
    
        $test_name = 'Fetch the design title based on the ID PASSES';
        $this->load->model('activity_model');
        $design_id = 1;
        $result = $this->activity_model->fetchDesignTitle($design_id);
        $expected_result = 'ddfdfssd';
        $this->unit->run($result, $expected_result, $test_name);
        
        #########################
        # FETCH FRIENDS ACTIVITY#
        #########################
       
        $test_name = 'Fetch the friends activity and messages SUCCESS';
        $this->load->model('activity_model');
        $customer_id = 18;
        $result = $this->activity_model->fetchFriendsActivity($customer_id);
        print_r($result);
        $this->unit->run($result, $expected_result, $test_name);
        
        
        // DONT TOUCH THIS CODE
        echo $this->unit->report();
        
    }
}

?>