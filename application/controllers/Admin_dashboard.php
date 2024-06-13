<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('order_model'); 
        $this->load->model('product_model');
        $this->load->model('user_model');
    }

    public function admin_dash() {
        $data['orders'] = $this->order_model->get_recent_orders();
        $data['products'] = $this->product_model->get_all_products();
        $data['users'] = $this->user_model->get_all_users();
        $data['pending_orders'] = $this->order_model->get_pending_orders();
    
        $this->load->view('admin/dashboard', $data);
    }
}
?>
