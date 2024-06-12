<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserView_model extends CI_Model {

    // Table name
    protected $table = 'users'; // Assuming your table name is 'users'

    // Constructor
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fetch all customers with their addresses
public function get_all_customers() {
    $this->db->select('users.*, address.street, address.barangay');
    $this->db->from('users');
    $this->db->join('address', 'users.address_id = address.id', 'left');
    $this->db->where('users.role', 'customer'); // Filter by role "customer"
    $query = $this->db->get();
    return $query->result_array();
}

}
