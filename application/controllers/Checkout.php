<?php
class Checkout extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Cart_model');
        $this->load->model('Order_model');
        $this->load->model('Settings_model'); // Ensure Settings_model is loaded
        $this->load->library('session');
    }

    public function index() {
        // Get user ID from session
        $user_id = $this->session->userdata('user_id');

        // Fetch selected items from the cart
        $selected_items = $this->Cart_model->get_selected_items($user_id);

        // Fetch delivery settings
        $min_spend_for_free_delivery = $this->Settings_model->get_setting('min_spend_for_free_delivery');
        $delivery_fee = $this->Settings_model->get_setting('delivery_fee');

        // Calculate total amount
        $total = 0;
        foreach ($selected_items as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        // Determine if delivery fee applies
        $apply_delivery_fee = $total < $min_spend_for_free_delivery;

        // Pass data to view
        $data = [
            'selected_items' => $selected_items,
            'total' => $total,
            'min_spend_for_free_delivery' => $min_spend_for_free_delivery,
            'delivery_fee' => $delivery_fee,
            'apply_delivery_fee' => $apply_delivery_fee
        ];

        $this->load->view('customer/checkout_view', $data);
    }

    public function place_order() {
        // Retrieve form data
        $selected_items = $this->input->post('selected_items');
        $total_amount = $this->input->post('total_amount');
        $user_id = $this->session->userdata('user_id'); // Get user ID from session
    
        // Insert into database
        $order_id = $this->Order_model->create_order($total_amount, $user_id); // Pass both total amount and user ID
        if ($order_id) {
            foreach ($selected_items as $item_id) {
                // Get product details from Cart_model
                $product = $this->Cart_model->get_product_details($item_id);
                // Check if quantity exists in the product details
                if (isset($product['quantity'])) {
                    // Insert each selected item into order_items table
                    $this->Order_model->add_item_to_order($order_id, $product['product_id'], $product['prod_name'], $product['price'], $product['quantity']);
                    // Update stock quantity
                    $this->Cart_model->update_stock_quantity($product['product_id'], $product['quantity']);
                } else {
                    echo "Failed to get product quantity. Please try again.";
                    return;
                }
            }
    
            // Remove placed items from cart
            $this->Cart_model->remove_items_from_cart($user_id, $selected_items);
    
            // Redirect user to a confirmation page
            redirect('customer/order_confirmation/'.$order_id);
        } else {
            // If order creation failed, display an error message
            echo "Order placement failed. Please try again.";
        }
    }
}
?>
