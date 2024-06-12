<?php
class User_model extends CI_Model {

public function __construct() {
    parent::__construct();
    $this->load->database(); // Load database library
}

public function insert_address($data) {
    $this->db->insert('address', $data);
    return $this->db->insert_id();
}

public function insert_user($data) {
    return $this->db->insert('users', $data);
}

public function get_user_by_verification_code($verification_code) {
    $this->db->where('verification_code', $verification_code);
    $query = $this->db->get('users');
    return $query->row();
}

public function update_user_status($verification_code) {
    $this->db->where('verification_code', $verification_code);
    return $this->db->update('users', ['status' => 'verified']);
}
public function get_user_by_email($email) {
    $query = $this->db->get_where('users', array('email' => $email));
    return $query->row_array();
}
}
?>