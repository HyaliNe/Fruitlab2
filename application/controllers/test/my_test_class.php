<?php

class transaction_test 
{
	function customer_id()
	{
                $this->load->model('transaction_model');
                $result = $this->transaction_model->getCustomerPaymentByCartList($id);
		print_r($result);
                $test = 1 + 1;
                $expected_result = 2;
                $test_name = 'Adds one plus one';
                echo $this->unit->run($test, $expected_result, $test_name);
	}
}
?>