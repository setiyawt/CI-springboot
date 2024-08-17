<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
    public function index() {
        
        $data['title'] = 'Edit';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit', $data);
        $this->load->view('templates/footer');
    }
    
}