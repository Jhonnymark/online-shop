<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->check_login();
    }

    private function check_login() {
        // Check if user session is not set
        if (!$this->session->userdata('user_id')) {
            // If not set, redirect to login page
            redirect('user/login');
        }
    }
}
?>
