<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Lokasi_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Lokasi';
        
        // Mengambil data dari model
        $data['lokasi'] = $this->Lokasi_model->get_data('lokasi')->result(); 
        
        // Memuat view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('lokasi/dashboard');
        $this->load->view('templates/footer');
    }

    public function create() {
        
        $data['title'] = 'Tambah';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('lokasi/create');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi() {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            log_message('debug', 'Validation Errors: ' . print_r($this->form_validation->error_array(), true));
            $this->create();
        } else {
            $data_lokasi = array(
                'kota' => $this->input->post('kota'),
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi')
            );
            $this->Lokasi_model->insert_data($data_lokasi, 'lokasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('lokasi');
        }

    }

    public function edit($id) {
        $data['title'] = 'Edit Lokasi';
        $data['lks'] = $this->Lokasi_model->get_lokasi_by_id($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('lokasi/edit');
        $this->load->view('templates/footer');
    }

    public function edit_aksi($id) {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            log_message('debug', 'Validation Errors: ' . print_r($this->form_validation->error_array(), true));
            $this->create();
        } else {
            if ($this->input->post('id') !== $id) {
                show_error('ID mismatch error. The ID cannot be changed.');
                return;
            }
    
            $data = array(
                'id' => $id,  // Menggunakan ID dari parameter, bukan dari input form
                'kota' => $this->input->post('kota'),
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi')
            );
    
            $this->Lokasi_model->update_data($data, 'lokasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('lokasi');
        
        }
    }


    public function _rules() {
        
        $this->form_validation->set_rules('kota', 'kota', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('nama_lokasi', 'namalokasi', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('negara', 'negara', 'required', array('required' => ' %s Harus di isi'));
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required', array('required' => ' %s Harus di isi'));
       
      
    }
    
    public function delete($id) {
        // Load model proyek untuk melakukan pengecekan
        $this->load->model('Proyek_Lokasi_model');
    
        // Cek apakah ID ini masih digunakan di tabel proyek
        $is_used = $this->Proyek_Lokasi_model->isLokasiUsed($id);
    
        if ($is_used) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data tidak bisa dihapus karena masih digunakan dalam proyek!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        } else {
            // Jika tidak digunakan, hapus data
            $where = array('id' => $id);
            $this->Lokasi_model->delete($where, 'lokasi');
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        }
    
        // Redirect kembali ke halaman lokasi
        redirect('lokasi');
    }
    
}