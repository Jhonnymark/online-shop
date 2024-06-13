<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Function to get all orders per item
    public function get_orders() {
        $this->db->select('orders.order_id, orders.order_date, order_items.id, order_items.status, order_items.prod_name, order_items.price, order_items.quantity');
        $this->db->from('orders');
        $this->db->join('order_items', 'order_items.order_id = orders.order_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Update the status of an item and optionally set the received date if completed
    public function update_item_status($item_id, $status, $received_date = null) {
        $data = array(
            'status' => $status,
            'received_date' => $received_date
        );

        $this->db->where('id', $item_id);
        $this->db->update('order_items', $data);
    }
}

?>
