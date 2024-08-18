<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_Lokasi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_data($table) {
        if (empty($table)) {
            log_message('error', 'Table name is empty.');
            return false;
        }
    
        $this->db->select('proyek.*, lokasi.nama_lokasi, lokasi.negara, lokasi.provinsi, lokasi.kota');
        $this->db->from($table);
        $this->db->join('lokasi', 'proyek.lokasi_id = lokasi.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insert_data($data, $table) {
        return $this->db->insert($table, $data);
        
    }

    public function insert_lokasi($data) {
        $this->db->insert('lokasi', $data);
        return $this->db->insert_id();
    }

    public function update_data($data, $table) {
        $this->db->where('id', $data['id']);
        return $this->db->update($table, $data);
    }
    
    public function update_lokasi($data) {
        $this->db->where('id', $data['id']);
        return $this->db->update('lokasi', $data);
    }
    
    public function get_proyek_by_id($id) {
        $this->db->select('proyek.*, lokasi.nama_lokasi, lokasi.negara, lokasi.provinsi, lokasi.kota');
        $this->db->from('proyek');
        $this->db->join('lokasi', 'proyek.lokasi_id = lokasi.id', 'left');
        $this->db->where('proyek.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete($where, $table) {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    public function isLokasiUsed($lokasi_id) {
        $this->db->where('lokasi_id', $lokasi_id);
        $query = $this->db->get('proyek');
        return $query->num_rows() > 0;
    }

}
