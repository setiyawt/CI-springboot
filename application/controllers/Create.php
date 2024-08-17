<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {
    public function index() {
        
        $data['title'] = 'Tambah';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('create', $data);
        $this->load->view('templates/footer');
    }
}