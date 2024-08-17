<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Proyek_model');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['proyek'] = $this->Proyek_model->get_data('proyek');
        log_message('debug', 'Data Proyek: ' . print_r($data['proyek'], true));


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}
