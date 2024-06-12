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

    public function update_item_status($id, $status) {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update('order_items');
    }
}

?>
