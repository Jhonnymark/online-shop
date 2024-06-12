<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH.'third_party/phpmailer/src/Exception.php';
require APPPATH.'third_party/phpmailer/src/PHPMailer.php';
require APPPATH.'third_party/phpmailer/src/SMTP.php';

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function register() {
        $this->load->view('register_form');
    }

    public function process_register() {
        $this->load->model('User_model');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register_form');
        } else {
            $address_data = [
                'street' => $this->input->post('street'),
                'barangay' => $this->input->post('barangay'),
                'municipality' => 'Naujan'
            ];
            $address_id = $this->User_model->insert_address($address_data);

            $user_data = [
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone_number' => $this->input->post('phone_number'),
                'username' => $this->input->post('username'),
                'role' => 'Customer',
                'address_id' => $address_id,
                'verification_code' => $this->generate_verification_code(),
                'status' => 'not_verified'
            ];

            $this->User_model->insert_user($user_data);

            if ($this->send_verification_email($user_data['email'], $user_data['verification_code'])) {
                redirect('user/verify');
            } else {
                $this->load->view('register_form', ['error' => 'Failed to send verification email.']);
            }
        }
    }

    private function generate_verification_code() {
        return rand(100000, 999999);
    }

    private function send_verification_email($email, $verification_code) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '4m.minimart.2024@gmail.com';
            $mail->Password = 'cpqgvpidtzocvpsi';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('4m.minimart.2024@gmail.com', 'Mjs Grocery');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Verification Code';
            $mail->Body    = 'Your verification code is: ' . $verification_code;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function verify() {
        $this->load->view('verify_code');
    }

    public function process_verification() {
        $this->load->model('User_model');

        $verification_code = $this->input->post('verification_code');
        $user = $this->User_model->get_user_by_verification_code($verification_code);

        if ($user) {
            $this->User_model->update_user_status($verification_code);
            redirect('user/login');
        } else {
            $this->load->view('verify_code', ['error_message' => 'Incorrect verification code. Please try again.']);
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($this->input->post('email') && $this->input->post('password')) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                // Load user model
                $this->load->model('User_model');

                // Retrieve user by email
                $user = $this->User_model->get_user_by_email($email);

                if ($user) {
                    if ($user['status'] === 'verified') {
                        // Verify password
                        if (password_verify($password, $user['password'])) {
                            // Start session
                            $this->session->set_userdata('role', $user['role']);
                            $this->session->set_userdata('user_id', $user['user_id']);
                            $this->session->set_userdata('username', $user['username']);

                            // Redirect based on role
                            switch ($user['role']) {
                                case 'Admin':
                                    redirect('admin/products');
                                    break;
                                case 'Customer':
                                    redirect('customer/customer_dash');
                                    break;
                                case 'Staff':
                                    redirect('staff/staff_dash');
                                    break;
                                case 'Delivery_personnel':
                                    redirect('delivery-staff/delivery_dash');
                                    break;
                                default:
                                    // Handle default case
                                    break;
                            }
                        } else {
                            $data['error'] = 'Incorrect Email or Password. Please try again.';
                            $this->load->view('login_form', $data);
                        }
                    } else {
                        $data['error'] = 'User not verified. Please check your email to verify your account.';
                        $this->load->view('login_form', $data);
                    }
                } else {
                    $data['error'] = 'User not found. Please check your email.';
                    $this->load->view('login_form', $data);
                }
            } else {
                $data['error'] = 'Please provide a valid email and password.';
                $this->load->view('login_form', $data);
            }
        } else {
            $this->load->view('login_form');
        }
    }
    public function logout() {
        $data = $this->session->all_userdata();
        foreach ($data as $key => $value) {
           $this->session->unset_userdata($key);
        }
        redirect(base_url('index.php/user/login'));
     }
}
?>
