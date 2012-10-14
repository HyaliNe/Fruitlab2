<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {
        public function index() {
            $this->load->model('transaction_model');
            $this->load->library('table');
            $data['customers'] = $this->transaction_model->getAllCustomer();
            $data['main_content'] = 'transaction/display_customers';
            $this->load->view('includes/template', $data);
        }    
        public function financialsummary() {
		$data['main_content'] = 'transaction/financialsummary';
		$this->load->view('includes/template', $data);
	}
        public function paymenthistory() {
		$data['main_content'] = 'transaction/paymenthistory';
		$this->load->view('includes/template', $data);
	}
        public function viewearnings() {
		$data['main_content'] = 'transaction/viewearnings';
		$this->load->view('includes/template', $data);
	}
    public function withdrawbalance() {
            $this->load->model("transaction_model");
            //$customer_id = $this->session->userdata('customer_id');
            $customer_id = 1;
            $data['transactions'] = $this->transaction_model->getCustomerTransactions($customer_id);
            $data['main_content'] = 'transaction/withdrawbalance';
            $this->load->view('includes/template', $data);
    }
}



/* End of file login.php */
/* Location: ./controllers/login.php */	
