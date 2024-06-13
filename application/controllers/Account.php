<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Cart_model');
    }

    public function index() {
        if (!$this->session->userdata('username')) {
            redirect('login_form');
        }
    
        $data['user'] = $this->getUserData();
    
        $user_id = $this->session->userdata('user_id');
    
        $this->load->model('Cart_model');
        $data['cart_count'] = $this->Cart_model->countCartItems($user_id);
    
        $this->load->view('customer/account_dashboard', $data);
    }
    

    private function getUserData() {
        $username = $this->session->userdata('username');
        $sql = "SELECT users.first_name, users.last_name, users.phone_number, users.username, users.role, users.email, address.street, address.barangay 
            FROM users 
            LEFT JOIN address ON users.address_id = address.id 
            WHERE users.username = ?";
        $query = $this->db->query($sql, array($username));
        return $query->row_array();
    }
}
