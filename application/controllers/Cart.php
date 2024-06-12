<?php
class Cart extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Cart_model');
        $this->load->library('session');
    }

    public function add() {
        $user_id = $this->input->post('user_id');
        $product_id = $this->input->post('product_id');
        $quantity = $this->input->post('quantity');

        if ($this->Cart_model->add_to_cart($user_id, $product_id, $quantity)) {
            // Redirect to the cart view page
            redirect('cart/view');
        } else {
            // Handle the error
            show_error('Could not add product to cart.');
        }
    }

    public function view() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('login');
        }

        $data['cart_items'] = $this->Cart_model->get_cart_items($user_id);
        $data['message'] = $this->session->flashdata('message');
        $this->load->view('customer/cart_view', $data);  // Make sure this path matches your actual view path
    }
}
?>
