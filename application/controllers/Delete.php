<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {
    public function index() {
        
        $data['title'] = 'Delete';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
    
}