<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('order_model'); 
    }

    public function my_orders() {
        // Get the logged-in user's ID
        $user_id = $this->session->userdata('user_id');
        
        $status = $this->input->get('status');
    
        // Fetch the user's orders based on status
        $orders = $this->order_model->get_orders_with_items($user_id, $status);
    
$cart_count = 0;


$this->load->view('customer/my_orders', ['orders' => $orders, 'cart_count' => $cart_count]);

    }
    
}
?>
