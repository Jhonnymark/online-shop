<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_setting($key) {
        $this->db->where('key', $key);
        $query = $this->db->get('settings');
        if ($query->num_rows() > 0) {
            return $query->row()->value;
        }
        return false;
    }

    public function update_setting($key, $value) {
        $this->db->where('key', $key);
        $this->db->update('settings', array('value' => $value));
    }
}
?>
