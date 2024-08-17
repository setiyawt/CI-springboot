<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Proyek_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Proyek';
        
        // Mengambil data dari model
        $data['proyek'] = $this->Proyek_model->get_data('proyek')->result(); // Panggil method result() untuk mendapatkan array objek
        
        // Memuat view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('proyek/dashboard', $data);
        
        $this->load->view('templates/footer');
    }

    public function create() {
        
        $data['title'] = 'Tambah';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('proyek/create');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi() {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            log_message('debug', 'Validation Errors: ' . print_r($this->form_validation->error_array(), true));
            $this->create();
        } else {
            $data_proyek = array(
                'client' => $this->input->post('client'),
                'keterangan' => $this->input->post('keterangan'),
                'nama_proyek' => $this->input->post('nama_proyek'),
                'pimpinan_proyek' => $this->input->post('pimpinan_proyek'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_selesai' => $this->input->post('tgl_selesai')
            );
            $this->Proyek_model->insert_data($data_proyek, 'proyek');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('dashboard');
        }
    }



    public function _rules() {
        
        $this->form_validation->set_rules('client', 'client', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('nama_proyek', 'nama proyek', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('pimpinan_proyek', 'pimpinan proyek', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('tgl_mulai', 'tanggal mulai', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('tgl_selesai', 'tanggal selesai', 'required', array('required' => ' %s Harus di isi'));
      
    }
    

}