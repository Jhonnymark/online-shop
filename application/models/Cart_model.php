<?php
class Cart_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_to_cart($user_id, $product_id, $quantity) {
        // Check if the product is already in the cart
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('cart');

        if ($query->num_rows() > 0) {
            // Product is already in the cart, update the quantity
            $existing_product = $query->row();
            $new_quantity = $existing_product->quantity + $quantity;
            $this->db->where('user_id', $user_id);
            $this->db->where('product_id', $product_id);
            return $this->db->update('cart', array('quantity' => $new_quantity));
        } else {
            // Product is not in the cart, insert a new row
            $data = array(
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            );
            return $this->db->insert('cart', $data);
        }
    }

    public function get_cart_items($user_id) {
        $this->db->select('cart.*, products.prod_name, products.price, products.photo');
        $this->db->from('cart');
        $this->db->join('products', 'cart.product_id = products.product_id');
        $this->db->where('cart.user_id', $user_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_selected_items($user_id) {
        $this->db->select('c.product_id, p.prod_name, p.price, c.quantity, p.photo');
        $this->db->from('cart c');
        $this->db->join('products p', 'c.product_id = p.product_id');
        $this->db->where('c.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_product_details($item_id) {

        $this->db->select('products.product_id, products.prod_name, products.price, cart.quantity');
        $this->db->from('products');
        $this->db->join('cart', 'cart.product_id = products.product_id');
        $this->db->where('products.product_id', $item_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function countCartItems($user_id) {
        $this->db->select('COUNT(*) as total');
        $this->db->from('cart');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row()->total;
    }
    public function remove_items_from_cart($user_id, $item_ids) {
        $this->db->where('user_id', $user_id);
        $this->db->where_in('product_id', $item_ids);
        $this->db->delete('cart');
    }
    public function update_stock_quantity($product_id, $quantity) {
        $this->db->set('stock', 'stock - ' . (int) $quantity, FALSE);
        $this->db->where('product_id', $product_id);
        $this->db->update('products');
    }
}
?>
