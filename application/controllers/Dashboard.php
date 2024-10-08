<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Proyek_Lokasi_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['proyek'] = $this->Proyek_Lokasi_model->get_data('proyek');
        log_message('debug', 'Data Proyek: ' . print_r($data['proyek'], true));


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('home/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        
        $data['title'] = 'Tambah';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('home/create');
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
    
            // Data untuk tabel lokasi
            $data_lokasi = array(
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'kota' => $this->input->post('kota'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi')
            );
    
            // Insert data ke tabel lokasi dan dapatkan ID-nya
            $lokasi_id = $this->Proyek_Lokasi_model->insert_lokasi($data_lokasi);
    
            // Tambahkan lokasi_id ke data proyek
            $data_proyek['lokasi_id'] = $lokasi_id;
    
            // Masukkan data ke tabel proyek
            $this->Proyek_Lokasi_model->insert_data($data_proyek, 'proyek');
    
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('dashboard');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Data';
        $data['pyk'] = $this->Proyek_Lokasi_model->get_proyek_by_id($id);
        
        if (!$data['pyk']) {
            $this->session->set_flashdata('error', 'Data proyek tidak ditemukan.');
            redirect('dashboard');
        }
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('home/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_aksi($id) {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            log_message('debug', 'Validation Errors: ' . print_r($this->form_validation->error_array(), true));
            $this->edit($id);
        } else {
            if ($this->input->post('id') !== $id) {
                show_error('ID mismatch error. The ID cannot be changed.');
                return;
            }
            
            $data_proyek = array(
                'id' => $id,  
                'client' => $this->input->post('client'),
                'keterangan' => $this->input->post('keterangan'),
                'nama_proyek' => $this->input->post('nama_proyek'),
                'pimpinan_proyek' => $this->input->post('pimpinan_proyek'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_selesai' => $this->input->post('tgl_selesai')
            );
    
            $data_lokasi = array(
                'id' => $this->input->post('lokasi_id'),  // Tambahkan ini
                'nama_lokasi' => $this->input->post('nama_lokasi'),
                'kota' => $this->input->post('kota'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi')
            );
    
            $update_lokasi = $this->Proyek_Lokasi_model->update_lokasi($data_lokasi);
            $update_proyek = $this->Proyek_Lokasi_model->update_data($data_proyek, 'proyek');
    
            if ($update_lokasi && $update_proyek) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Gagal mengupdate data. Silakan coba lagi.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            }
            redirect('dashboard');
        }
    }
    

    public function _rules() {
        
        $this->form_validation->set_rules('client', 'Client', 'required', array('required' => ' %s harus di isi'));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => ' %s harus di isi'));
        $this->form_validation->set_rules('nama_proyek', 'Nama proyek', 'required', array('required' => ' %s harus di isi'));
        $this->form_validation->set_rules('pimpinan_proyek', 'Pimpinan proyek', 'required', array('required' => ' %s harus di isi'));
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal mulai', 'required', array('required' => ' %s harus di isi'));
        $this->form_validation->set_rules('tgl_selesai', 'Tanggal selesai', 'required', array('required' => ' %s harus di isi'));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => ' %s harus di isi'));
        $this->form_validation->set_rules('nama_lokasi', 'Nama lokasi', 'required', array('required' => ' %s harus di isi'));
        $this->form_validation->set_rules('negara', 'Negara', 'required', array('required' => ' %s harus di isi'));
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array('required' => ' %s harus di isi'));        
    }

    
    public function delete($id) {
        $where = array('id' => $id);

        $this->Proyek_Lokasi_model->delete($where, 'proyek');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('dashboard');
    }
    
}
