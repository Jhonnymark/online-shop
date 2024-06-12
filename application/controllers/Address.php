<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {
    

public function add_address() {
    
    // Retrieve form dataa
    $address_data = array(
        'user_id' => $this->session->userdata('user_id'),
        'address' => $this->input->post('address'),
        'city' => $this->input->post('city'),
        'postcode' => $this->input->post('postcode'),
        'country' => $this->input->post('country')
    );

    // Add address to database
    $this->Address_model->add_address($address_data);

    // Redirect to the address page
    redirect('customer/address');
}

public function set_default_address($address_id) {
    // Set the selected address as default
    $this->Address_model->set_default_address($address_id);

    // Redirect back to the address page
    redirect('address');
}

public function edit_address($address_id) {
    // Load the address details based on the address_id
    $data['address'] = $this->Address_model->get_address_details($address_id);

    // Load the edit address view with the data
    $this->load->view('edit_address_view', $data);
}

public function update_address() {
    // Retrieve form data
    $address_id = $this->input->post('address_id');
    $address_data = array(
        'address' => $this->input->post('address'),
        'city' => $this->input->post('city'),
        'postcode' => $this->input->post('postcode'),
        'country' => $this->input->post('country')
    );

    // Update the address in the database
    $this->Address_model->update_address($address_id, $address_data);

    // Redirect back to the address page
    redirect('address');
}

public function delete_address($address_id) {
    // Delete the selected address
    $this->Address_model->delete_address($address_id);

    // Redirect back to the address page
    redirect('customer/address');
}
}