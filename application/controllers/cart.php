<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Cart Controller
 *
 * Handles all page that involves the shopping cart
 *
 * @package		Fruitlab
 * @author		Chen Deshun
 */


 class Cart extends CI_Controller {
	 
	 public function customise($id) {
		 $this->load->model('cart_model');
		 
		 $options = $this->cart_model->fetchOptions();
		 $data['collar'] = $options['collar'];
		 $data['material'] = $options['material'];
		 $data['colour'] = $options['colour'];
		 
 		 $this->load->model('design_model');
		
 		 $design = $this->design_model->fetchSingleDesign($id);
		
 	 	 if ($design['exist']) {
			 $data['design_id']		= $design['design_id'];
			 $data['image_path']		= $design['image_path'];
		 }
		 
		 
		 $data['main_content'] = 'cart/purchaseshirt';
 		 $this->load->view('includes/template', $data);
		 
	 }
	 
	 
	 public function addToCart() {
		 $colorID		= $this->input->post('colourID');
		 $collarID	= $this->input->post('collarID');
		 $designID	= $this->input->post('designID');
		 $materialID	= $this->input->post('materialID');
		 $qty		= $this->input->post('quantity');
		 //$size		= $this->input->post('size');
		 $price		= 1; //fetch price of design, collar and color from database and compute
		 
		$this->load->model('cart_model');
		 if($this->cart_model->validateCombination($designID, $collarID, $colorID, $materialID)){		 
			 $data = array(
		                'id'      => $designID,
		                'qty'     => $qty,
		                'price'   => $price,
		                'name'    => 'Custom T-Shirt with design by ',
		                'options' => array(
							//'Size' => $size, 
							//'Color' => $color,
							'colorID' => $colorID,
							//'Collar' => $collar,
							'collarID' => $collarID,
							//'Design' => $design,
							'designID' => $designID,
							//'material' => $material
							'materialID' => $materialID
							)
		             );

//			print_r($data);
		 	$this->cart->insert($data);
		 	
			//successfully added to cart
			//return message to user

	 		$data['main_content'] = 'cart/cart';

				
		 } else {
			 //display error message

 			$data['message_title'] = "FAILED to add to cart";
 			$data['message'] = "fail to add to cart";
			
			$data['main_content'] = "message";
		}
				
 			
			$this->load->view('includes/template', $data);
			 //redirect('cart/viewCart');
		 
		 
	 }
	 
	 public function update() {
		 
		 $this->cart->update($this->input->post());
		 
		 $data['updated'] = true;

  		 $data['main_content'] = 'cart/cart';
  		 $this->load->view('includes/template', $data);
	
	 }
	 
	 public function viewCart() {
 		$data['main_content'] = 'cart/cart';
 		$this->load->view('includes/template', $data);
	 }
	 
	 public function checkout() {
		 //take current cart display out details of the cart
		 //ask the user to confirm
		
		 
		 $data['main_content'] = "cart/cartpreview";
		 $this->load->view('includes/template', $data);
	 }
	 
	 public function payment() {
		 //redirect to paypal wait for paypal to sent response back then get
		 
		 //no paypal simulate fake paypal process
		 
		 //print_r($this->cart->contents());
		 $this->load->model('transaction_model');
		 $this->transaction_model->checkout($this->cart->contents());
		 $this->cart->destroy();
		 
		 $data['message_title'] = "Purchase Successful";
		 $data['message'] = "We are currently processing your purchase.";
		 $data['main_content'] = 'message';
		 $this->load->view('includes/template', $data);
		 
	 }

 }

 ?>