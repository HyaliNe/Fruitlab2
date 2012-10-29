<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

		$test_name = 'Validate Login check Datatype';
		$this->load->model('account_model');
		$email = 'alvin@alvin.com';
		$password = 'abc123';
		$password = sha1($password);
		$result = $this->account_model->validate( $email, $password );
		$expected_result = 'is_array';
		$this->unit->run($result, $expected_result, $test_name);

		$test_name = 'Validate Login check FAIL';
		$this->load->model('account_model');
		$email = 'alvin@alvin.com';
		$password = 'abc123';
		$password = sha1($password);
		$result = $this->account_model->validate( $email, $password );
		$result = $result['result'];
		$expected_result = FALSE;
		$this->unit->run($result, $expected_result, $test_name);
		
		$test_name = 'Validate Login check SUCCESS';
		$this->load->model('account_model');
		$email = 'alvin@alvin.com';
		$password = 'hahahaha';
		$password = sha1($password);
		$result = $this->account_model->validate( $email, $password );
		$result = $result['result'];
		$expected_result = TRUE;
		$this->unit->run($result, $expected_result, $test_name);





		
		// DONT TOUCH THIS CODE
		echo $this->unit->report();
	}
}
?>