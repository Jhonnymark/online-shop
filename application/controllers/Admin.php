<?php
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model'); // Load the Admin_model instead of Order_model
    }
    
    public function manage_order($order_id = null) {
        // If an order ID is provided, fetch only that specific order
        if ($order_id !== null) {
            $data['orders'] = $this->Admin_model->get_orders($order_id);
        } else {
            // Otherwise, get all orders
            $data['orders'] = $this->Admin_model->get_orders();
        }
    
        // Get order items for each order and add them to the orders array
        foreach ($data['orders'] as &$order) {
            $order['order_items'] = $this->Admin_model->get_order_items($order['order_id']);
        }
    
        $this->load->view('admin/manage_order', $data);
    }
    
    

    public function update_order_status($order_id, $new_status) {
        // Update the order status in the database
        $this->Admin_model->update_order_status($order_id, $new_status);
        
        // Redirect back to the orders page or wherever appropriate
        redirect('admin/manage_order');
    }

    public function accept_order($order_id) {
        // Retrieve the order items associated with the specified order ID
        $order_items = $this->Admin_model->get_order_items($order_id);
    
        // Update the status of each order item to "Preparing"
        foreach ($order_items as $item) {
            $this->Admin_model->update_item_status($item['id'], 'Preparing');
        }
        
        // Redirect back to the orders page or wherever appropriate
        redirect('admin/manage_order');
    }
    
}
?>
