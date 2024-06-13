<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getTotalOrders() {
        return $this->db->count_all('orders');
    }

    public function getTotalProducts() {
        return $this->db->count_all('products'); 
    }

    public function getTotalUsers() {
        return $this->db->count_all('users');
    }

    public function getPendingOrders() {
        $this->db->where('status', 'pending'); 
        $query = $this->db->get('orders');
        return $query->result_array();
    }
}
?>
