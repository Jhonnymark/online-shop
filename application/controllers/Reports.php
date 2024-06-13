<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Report_model'); 
    }

    public function index() {
        // dashboard view
        $data['orders'] = $this->Report_model->getTotalOrders();
        $data['products'] = $this->Report_model->getTotalProducts();
        $data['users'] = $this->Report_model->getTotalUsers();
        $data['pending_orders'] = $this->Report_model->getPendingOrders();

        $this->load->view('admin/dashboard_view', $data);
    }

    public function generate_sales_report() {
        $data['month'] = $this->input->post('month');
        $data['year'] = $this->input->post('year');

        // Example: Load view with data for displaying report
        $this->load->view('admin/generate_sales_report_view', $data);
    }

}
?>
