<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('wishlist_model');
    }

    public function add_to_wishlist() {
        $product_id = $this->input->post('product_id');
        $user_id = $this->session->userdata('user_id'); // Assuming user is logged in and user_id is stored in session

        if ($product_id && $user_id) {
            $result = $this->wishlist_model->add_to_wishlist($user_id, $product_id);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Product added to wishlist']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to add product to wishlist']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
        }
    }
    public function toggle_wishlist() {
        $product_id = $this->input->post('product_id');
        $in_wishlist = $this->input->post('in_wishlist') === 'true';
        $user_id = $this->session->userdata('user_id');
    
        if ($product_id && $user_id) {
            $result = $this->wishlist_model->toggle_wishlist($user_id, $product_id, $in_wishlist);
            if ($result) {
                $message = $in_wishlist ? 'Product removed from wishlist' : 'Product added to wishlist';
                echo json_encode(['status' => 'success', 'message' => $message]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update wishlist']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
        }
    }
    
    function in_wishlist($product_id) {
        $CI =& get_instance();
        $CI->load->model('wishlist_model');
        $user_id = $CI->session->userdata('user_id');
        return $CI->wishlist_model->in_wishlist($user_id, $product_id);
    }
    
        
}
