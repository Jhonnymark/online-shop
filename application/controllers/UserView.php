<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserView extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserView_model');
    }

    public function index() {
        $data['users'] = $this->UserView_model->get_all_customers();
        $this->load->view('admin/users_view', $data);
    }
    
}
