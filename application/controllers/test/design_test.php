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
        
        
        // DONT TOUCH THIS CODE
        echo $this->unit->report();
        
    }
}

?>