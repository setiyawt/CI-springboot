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

    public function tambah() {
        
        $data['title'] = 'Tambah';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('create');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data_proyek = array(
                'client' => $this->input->post('client'),
                'keterangan' => $this->input->post('keterangan'),
                'nama_proyek' => $this->input->post('nama_proyek'),
                'pimpinan_proyek' => $this->input->post('pimpinan_proyek'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_selesai' => $this->input->post('tgl_selesai'),
                'kota' => $this->input->post('kota'),
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'negara' => $this->input->post('negara')
            );

            // Cek apakah lokasi harus dimasukkan ke tabel lokasi
            if (!empty($this->input->post('nama_lokasi')) && !empty($this->input->post('kota'))) {
                // Data untuk tabel lokasi
                $data_lokasi = array(
                    'nama_lokasi' => $this->input->post('nama_lokasi'),
                    'kota' => $this->input->post('kota'),
                    'negara' => $this->input->post('negara'),
                    'provinsi' => $this->input->post('provinsi')
                );

                // Masukkan data ke tabel lokasi
                $this->Proyek_model->insert_data($data_lokasi, 'lokasi');
                }

                // Masukkan data ke tabel proyek
                $this->Proyek_model->insert_data($data_proyek, 'proyek');
    
            
        }


        
    }

    public function _rules() {
        
        $this->form_validation->set_rules('client', 'client', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('nama_proyek', 'nama proyek', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('pimpinan_proyek', 'pimpinan proyek', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('tgl_mulai', 'tanggal mulai', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('tgl_selesai', 'tanggal selesai', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('kota', 'kota', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('nama_lokasi', 'nama lokasi', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('negara', 'negara', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required', array('required' => ' %s Harus di isi'));        
    }
}
