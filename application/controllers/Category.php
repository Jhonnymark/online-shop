<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

   public function __construct() {
      parent::__construct(); 

      $this->load->library('form_validation');
      $this->load->model('Category_model', 'category');
   }

   public function index() {
      $data['category'] = $this->category->get_all();
      $this->load->view('admin/category', $data);
   }

   public function add_category() {
      $data['category'] = $this->category->get_all();
      $this->load->view('admin/add_category', $data);    
   }

   public function store() {
      $this->form_validation->set_rules('category_name', 'category_name', 'required');

      if (!$this->form_validation->run()) {
         $response = [
            'status' => 'error',
            'errors'=> validation_errors()
         ];
      } else {
         $this->category->store();
         $response = [
            'status' => 'success',
            'message'=> 'Save Successfully!',
            'redirect' => base_url('index.php/admin/category')
         ];
      }
      echo json_encode($response);
   }

   public function edit_category($category_id) {
      $data['category'] = $this->category->get($category_id);
      $data['categories'] = $this->category->get_all(); // Changed the key to avoid conflicts
      $this->load->view('admin/edit_category', $data); 
   }

   public function update($cat_id) {
      $this->form_validation->set_rules('category_name', 'category_name', 'required');

      if (!$this->form_validation->run()) {
         $this->session->set_flashdata('errors', validation_errors());
         redirect(base_url('index.php/admin/edit_category/' . $cat_id));
      } else {
         $this->category->update($cat_id);
         $this->session->set_flashdata('success', "Updated Successfully!");
         redirect(base_url('index.php/admin/category'));
      }
   }

   public function delete($cat_id) {
      $this->category->delete($cat_id);
      $this->session->set_flashdata('success', "Deleted Successfully!");
      redirect(base_url('index.php/admin/category'));
   }

   public function logout() {
      $data = $this->session->all_userdata();
      foreach ($data as $key => $value) {
         $this->session->unset_userdata($key);
      }
      redirect(base_url('index.php/login'));
   }
}

?>