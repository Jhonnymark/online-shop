<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    public function getProducts($search = '', $category_id = 0, $start = 0, $limit = 12) {
        $this->db->select('product_id, prod_name, price, photo, stock');
        $this->db->from('products');
        if (!empty($search)) {
            $this->db->like('prod_name', $search);
        }
        if ($category_id != 0) {
            $this->db->where('category_id', $category_id);
        }
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countProducts($search = '', $category_id = 0) {
        $this->db->select('COUNT(*) as total');
        $this->db->from('products');
        if (!empty($search)) {
            $this->db->like('prod_name', $search);
        }
        if ($category_id != 0) {
            $this->db->where('category_id', $category_id);
        }
        $query = $this->db->get();
        return $query->row()->total;
    }
    public function getProductDetails($product_id) {
        $this->db->select('product_id, prod_name, price, photo, stock');
        $this->db->from('products');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_selected_cart_items($user_id, $selected_items) {
        $this->db->select('cart.*, products.prod_name, products.retail_price as price, products.photo');
        $this->db->from('cart');
        $this->db->join('products', 'cart.product_id = products.product_id');
        $this->db->where('cart.user_id', $user_id);
        $this->db->where_in('cart.product_id', $selected_items);
        $query = $this->db->get();

        return $query->result_array();
    }
}
