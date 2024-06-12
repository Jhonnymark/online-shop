<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('orders_model');
        // Load other necessary libraries or helpers here
    }

    public function manage_order() {
        // Fetch all orders using the model
        $data['orders'] = $this->orders_model->get_orders();

        // Load the view with orders data
        $this->load->view('admin/manage_order', $data);
    }
    public function accept_item($id) {
        // Update the status of the item to 'preparing'
        $this->orders_model->update_item_status($id, 'Preparing');
        // Redirect back to the orders page
        redirect('admin/manage_order');
    }
    
    public function reject_item($id) {
        // Update the status of the item to 'rejected'
        $this->orders_model->update_item_status($id, 'rejected');
        // Redirect back to the orders page
        redirect('admin/manage_order');
    }
    public function update_status($id) {
        $status = $this->input->post('status');
        if ($status) {
            $this->orders_model->update_item_status($id, $status);
        }
        redirect('admin/manage_order');
    }
    
    
}
?>
