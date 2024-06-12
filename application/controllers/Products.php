<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Settings_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('session', 'form_validation', 'upload'));
    }

    public function index() {
        $search = $this->input->get('search') ? $this->input->get('search') : '';
        $category_id = $this->input->get('category_id') ? $this->input->get('category_id') : 0;
    
        $products = $this->Product_model->getProducts($search, $category_id);
        $totalResults = $this->Product_model->countProducts($search, $category_id);
        $categories = $this->Product_model->getCategories();
    
        $data = array(
            'products' => $products,
            'totalResults' => $totalResults,
            'search' => $search,
            'categories' => $categories,
            'category_id' => $category_id
        );
        $this->load->view('admin/products', $data);
    }
    public function add_product() {
        // Fetch categories from the model
        $data['categories'] = $this->Product_model->getCategories();
        
        // Load the view and pass the data
        $this->load->view('admin/add_product', $data);  
    }

    public function store() {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;
    
        $this->upload->initialize($config);
    
        $this->form_validation->set_rules('prod_name', 'Product Name', 'required');
        $this->form_validation->set_rules('prod_desc', 'Product Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
        } else {
            $file_name = $this->upload->data('file_name');
            $this->Product_model->store($file_name);
            $this->session->set_flashdata('success', 'Saved Successfully!');
        }
        redirect('admin/products');
    }
    
    public function edit($product_id) {
        $data['product'] = $this->Product_model->get_product($product_id);
        if ($data['product']) {
            $data['categories'] = $this->Product_model->getCategories();
            $this->load->view('admin/edit_product', $data);
        }
    }
    public function update($product_id) {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->upload->initialize($config);

        $this->form_validation->set_rules('prod_name', 'Product Name', 'required');
        $this->form_validation->set_rules('prod_desc', 'Product Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');

        if ($this->form_validation->run() === FALSE) {
            $response = [
                'status' => 'error',
                'errors'=> validation_errors()
            ];
        } else {
            $file_name = $this->upload->do_upload('photo') ? $this->upload->data('file_name') : $this->input->post('current_photo');
            $this->Product_model->update_product($product_id, $file_name);
            redirect('admin/products');
        }
    }
    public function delete($product_id) {
        // Load the Product_model if not already loaded
        $this->load->model('Product_model');
        
        // Call the delete method of the Product_model
        $this->Product_model->delete($product_id);
        
        $this->session->set_flashdata('success', "Deleted Successfully!");
        redirect(base_url('index.php/admin/products'));
    }
    public function delivery_settings() {
        if ($this->input->post('update')) {
            $this->form_validation->set_rules('min_spend', 'Minimum Spend for Free Delivery', 'required|numeric');
            $this->form_validation->set_rules('delivery_fee', 'Delivery Fee', 'required|numeric');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors());
            } else {
                $min_spend = $this->input->post('min_spend');
                $delivery_fee = $this->input->post('delivery_fee');
                $this->Settings_model->update_setting('min_spend_for_free_delivery', $min_spend);
                $this->Settings_model->update_setting('delivery_fee', $delivery_fee);
                $this->session->set_flashdata('success', 'Settings Updated Successfully!');
            }
            redirect('admin/products/delivery_settings');
        } else {
            $data['min_spend'] = $this->Settings_model->get_setting('min_spend_for_free_delivery');
            $data['delivery_fee'] = $this->Settings_model->get_setting('delivery_fee');
            $this->load->view('admin/delivery_settings', $data);
        }
    }
}
?>
