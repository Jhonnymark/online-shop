
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        // Load the landing page view
        $this->load->view('landing_page');
    }
}
