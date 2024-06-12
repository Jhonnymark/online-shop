<?php
class Product_model extends CI_Model {

    public function getProducts($search, $category_id) {
        $this->db->like('prod_name', $search);
        if ($category_id != 0) {
            $this->db->where('category_id', $category_id);
        }
        $query = $this->db->get('products');
        return $query->result();
    }
    
    public function countProducts($search, $category_id) {
        $this->db->like('prod_name', $search);
        if ($category_id != 0) {
            $this->db->where('category_id', $category_id);
        }
        return $this->db->count_all_results('products');
    }
    

    public function getCategories() {
        $query = $this->db->get('category');
        return $query->result();
    }

    public function store($file_name) {
        $data = array(
            'prod_name' => $this->input->post('prod_name'),
            'type_code' => $this->input->post('type_code'),
            'prod_desc' => $this->input->post('prod_desc'),
            'price' => $this->input->post('price'),
            'stock' => $this->input->post('stock'),
            'category_id' => $this->input->post('category'),
            'expiration_date' => $this->input->post('expiration_date'),
            'photo' => $file_name
        );
        return $this->db->insert('products', $data);
    }

    public function get_product($product_id) {
        $query = $this->db->get_where('products', array('product_id' => $product_id));
        return $query->row();
    }

    public function update_product($product_id, $file_name) {
        $data = array(
            'prod_name' => $this->input->post('prod_name'),
            'type_code' => $this->input->post('type_code'),
            'prod_desc' => $this->input->post('prod_desc'),
            'price' => $this->input->post('price'),
            'stock' => $this->input->post('stock'),
            'category_id' => $this->input->post('category'),
            'expiration_date' => $this->input->post('expiration_date'),
            'photo' => $file_name
        );
        $this->db->where('product_id', $product_id);
        return $this->db->update('products', $data);
    }
    public function delete($product_id)
    {
        $products = $this->db->get_where('products', ['product_id' => $product_id ])->row();
        $path ='./images/'.$products->photo;
        if (file_exists($path)){
            unlink($path);
        }
        $result = $this->db->delete('products', array('product_id' => $product_id));
        return $result;
    }
}
?>
