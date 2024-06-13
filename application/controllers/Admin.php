<?php
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    
    public function manage_order($order_id = null) {
        if ($order_id !== null) {
            $data['orders'] = $this->Admin_model->get_orders($order_id);
        } else {
            $data['orders'] = $this->Admin_model->get_orders();
        }
    
        foreach ($data['orders'] as &$order) {
            $order['order_items'] = $this->Admin_model->get_order_items($order['order_id']);
        }
    
        $this->load->view('admin/manage_order', $data);
    }
    
    

    public function update_order_status($order_id, $new_status) {
        $this->Admin_model->update_order_status($order_id, $new_status);
        
        redirect('admin/manage_order');
    }

    public function accept_order($order_id) {
        $order_items = $this->Admin_model->get_order_items($order_id);
        foreach ($order_items as $item) {
            $this->Admin_model->update_item_status($item['id'], 'Preparing');
        }
        
        redirect('admin/manage_order');
    }
    
}
?>
