<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Cart_model'); 
        $this->load->model('Order_model');
        $this->load->model('Address_model');
    }
    public function address() {
        $data['addresses'] = $this->Address_model->get_all_addresses();


        $this->load->view('customer/address', $data);
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['cart_count'] = $this->Cart_model->countCartItems($user_id);
        $limit = 12;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $start = ($page - 1) * $limit;
        $search = $this->input->get('search') ? $this->input->get('search') : '';
        $category_id = $this->input->get('category') ? $this->input->get('category') : 0;

        $data['products'] = $this->Customer_model->getProducts($search, $category_id, $start, $limit);
        $data['totalResults'] = $this->Customer_model->countProducts($search, $category_id);
        $data['limit'] = $limit;
        $data['page'] = $page;
        $data['search'] = $search;
        $data['category_id'] = $category_id;
        
        $data['categories'] = $this->getCategories();

        $this->load->view('customer/customer_dash', $data);
    }

    private function getCategories() {
        $this->load->database();
        $this->db->select('category_id, category_name');
        $this->db->from('category');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function view_product($product_id) {
        $data['product'] = $this->Customer_model->getProductDetails($product_id);
        
        $this->load->model('Cart_model');
        $user_id = $this->session->userdata('user_id');
        $data['cart_count'] = $this->Cart_model->countCartItems($user_id);
    
        $this->load->view('customer/product_details', $data);
    }

    public function order_confirmation($order_id) {
        // Get order details
        $data['order'] = $this->Order_model->get_order_details($order_id);

        // Check if the order exists
        if (!$data['order']) {
            show_404();
        }

        $this->load->view('customer/order_confirmation_view', $data);
    }
    public function add_address() {
        // Check if the form is submitted
        if ($this->input->post()) {
            // Retrieve form data
            $addresses = $this->input->post('address');
            $cities = $this->input->post('city');
            $postcodes = $this->input->post('postcode');
            $countries = $this->input->post('country');
            $user_id = $this->session->userdata('user_id');
    
            foreach ($addresses as $key => $address) {
                $address_data = array(
                    'user_id' => $user_id,
                    'address' => $address,
                    'city' => $cities[$key],
                    'postcode' => $postcodes[$key],
                    'country' => $countries[$key]
                );
                $this->Address_model->add_address($address_data);
            }
    
            redirect('customer/address');
        } else {
            $this->load->view('customer/add_address_view');
        }
    }
    
}

?>
