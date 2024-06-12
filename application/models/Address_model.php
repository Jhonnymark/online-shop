<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load necessary libraries
        $this->load->database();
    }

    public function add_address($address_data) {
        // Insert the address data into the database
        $this->db->insert('addresses', $address_data);
        // Return the inserted address ID
        return $this->db->insert_id();
    }

    public function set_default_address($address_id) {
        // Set the selected address as default (you may implement your logic here)
        // For example, update a user's default address field in the user's table
    }

    public function get_address_details($address_id) {
        // Retrieve address details based on the address_id
        $query = $this->db->get_where('addresses', array('id' => $address_id));
        return $query->row_array();
    }

    public function update_address($address_id, $address_data) {
        // Update the address in the database
        $this->db->where('id', $address_id);
        $this->db->update('addresses', $address_data);
    }

    public function delete_address($address_id) {
        // Delete the selected address from the database
        $this->db->delete('addresses', array('id' => $address_id));
    }
}
?>
