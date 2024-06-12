<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add_to_wishlist($user_id, $product_id) {
        // Check if product is already in wishlist
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('wishlist');

        if ($query->num_rows() == 0) {
            // Product is not in wishlist, add it
            $data = [
                'user_id' => $user_id,
                'product_id' => $product_id
            ];
            return $this->db->insert('wishlist', $data);
        }

        return false; // Product is already in wishlist
    }
    public function in_wishlist($user_id, $product_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('wishlist');
        return $query->num_rows() > 0;
    }
    
    public function toggle_wishlist($user_id, $product_id, $in_wishlist) {
        if ($in_wishlist) {
            // Remove from wishlist
            $this->db->where('user_id', $user_id);
            $this->db->where('product_id', $product_id);
            return $this->db->delete('wishlist');
        } else {
            // Add to wishlist
            $data = [
                'user_id' => $user_id,
                'product_id' => $product_id
            ];
            return $this->db->insert('wishlist', $data);
        }
    }
    
}
