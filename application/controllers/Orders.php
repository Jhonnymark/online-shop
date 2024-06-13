<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('orders_model');
    }

    public function manage_order() {
        // Fetch all orders using the model
        $data['orders'] = $this->orders_model->get_orders();

        $this->load->view('admin/manage_order', $data);
    }

    public function accept_item($id) {
        // Update the status of the item to 'Preparing'
        $this->orders_model->update_item_status($id, 'Preparing');
        redirect('admin/manage_order');
    }

    public function reject_item($id) {
        // Update the status of the item to 'Rejected'
        $this->orders_model->update_item_status($id, 'Rejected');
        redirect('admin/manage_order');
    }

    public function update_status($item_id) {
        $status = $this->input->post('status');
        $received_date = ($status === 'Completed') ? date('Y-m-d') : null;

        // Update the order item status and received date if completed
        $this->orders_model->update_item_status($item_id, $status, $received_date);

        // Redirect back to the orders page with a success message
        $this->session->set_flashdata('message', 'Order status updated successfully.');
        redirect('admin/manage_order');
    }
}
?>
