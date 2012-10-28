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
class Tag_test extends CI_Controller {

    function index() {
        $this->load->library('unit_test');

        ######################################
        # FETCH TAGS SUCCESSFULLY           #
        #####################################
        
        $test_name = 'Fetched Design Based on the ID Success';
        $this->load->model('tag_model');
        $result =  sizeof($this->tag_model->getTags());
        $expected_result = 5;
        $this->unit->run($result, $expected_result, $test_name);
        
        ###################################################
        # FETCH TAGS ASSOCIATED WITH THE DESIGN           #
        ###################################################
        
        $test_name = 'Fetched Design Based on the ID Success';
        $this->load->model('tag_model');
        $design_id = 1;
        $result = $this->tag_model->getDesignTags(18);
        $result = $result->num_rows;
        $expected_result = 2;
        $this->unit->run($result, $expected_result, $test_name);
        
        
        // DONT TOUCH THIS CODE
        echo $this->unit->report();
    }
}

?>