<?php
class Category_model extends CI_Model {

    public function __construct() {
       $this->load->database();
       $this->load->helper('url');
    }
 
    public function get_all() {
       $query = $this->db->get('category');
       return $query->result(); 
    }
 
    public function store() {    
       $data = [
          'category_name' => $this->input->post('category_name')
       ];
       return $this->db->insert('category', $data);
    }
 
    public function get($category_id) {
       return $this->db->get_where('category', ['category_id' => $category_id])->row();
    }
 
    public function update($category_id) {
       $data = [
          'category_name' => $this->input->post('category_name')
       ];
       return $this->db->where('category_id', $category_id)->update('category', $data); 
    }
 
    public function delete($category_id) {
       return $this->db->delete('category', ['category_id' => $category_id]);
    }
 }
?>