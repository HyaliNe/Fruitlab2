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

        // DONT TOUCH THIS CODE
        echo $this->unit->report();
        
    }
}

?>