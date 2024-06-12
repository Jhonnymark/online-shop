<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Function to get user's orders with items
    public function get_orders_with_items($user_id, $status = null) {
        $this->db->select('orders.order_id, orders.order_date, order_items.status, order_items.prod_name, order_items.price, order_items.quantity');
        $this->db->from('orders');
        $this->db->join('order_items', 'order_items.order_id = orders.order_id');
        $this->db->where('orders.user_id', $user_id);
        
        // Add status filter if provided
        if ($status !== null) {
            $this->db->where('order_items.status', $status);
        }
    
        $query = $this->db->get();
        $result = $query->result_array();

        $orders = [];
        foreach ($result as $row) {
            $order_id = $row['order_id'];
            if (!isset($orders[$order_id])) {
                $orders[$order_id] = [
                    'order_id' => $order_id,
                    'order_date' => $row['order_date'],
                    'status' => $row['status'],
                    'items' => []
                ];
            }
            $orders[$order_id]['items'][] = [
                'prod_name' => $row['prod_name'],
                'price' => $row['price'],
                'quantity' => $row['quantity']
            ];
        }
        
        return array_values($orders); // Reset keys to be sequential
    }

    public function create_order($total_amount, $user_id) {
        // Get the current date and time
        $current_date_time = date('Y-m-d H:i:s');
    
        // Debug statement
        echo "Current Date Time: $current_date_time";
    
        // Create the order data array
        $order_data = array(
            'total_amount' => $total_amount,
            'user_id' => $user_id,
            'order_date' => $current_date_time // This will insert the current date and time
        );
    
        // Insert the order data into the 'orders' table
        $this->db->insert('orders', $order_data);
    
        // Return the ID of the inserted order or false if failed
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : false;
    }
    

    public function add_item_to_order($order_id, $product_id, $prod_name, $price, $quantity) {
        // Create the order item data array
        $order_item_data = array(
            'order_id' => $order_id,
            'product_id' => $product_id,
            'prod_name' => $prod_name,
            'price' => $price,
            'quantity' => $quantity,
            'status' => 'Pending' // Assuming the status is set to 'Pending' initially
        );

        // Insert the order item data into the 'order_items' table
        $this->db->insert('order_items', $order_item_data);
    }
    public function get_order_details($order_id) {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('order_id', $order_id);
        $query = $this->db->get();

        // Check if the order exists
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
?>
