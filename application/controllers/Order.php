<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('order_model'); // Model name should be consistent
        // Load other necessary libraries or helpers here
    }

    public function my_orders() {
        // Get the logged-in user's ID
        $user_id = $this->session->userdata('user_id');
        
        // Get the status parameter from the URL
        $status = $this->input->get('status');
    
        // Fetch the user's orders based on status using the model
        $orders = $this->order_model->get_orders_with_items($user_id, $status);
    
     // Assuming $cart_count is retrieved from your session or database
$cart_count = 0; // Placeholder value, replace it with your actual logic to get the cart count

// Load the view with orders data and $cart_count
$this->load->view('customer/my_orders', ['orders' => $orders, 'cart_count' => $cart_count]);

    }
    
}
?>
