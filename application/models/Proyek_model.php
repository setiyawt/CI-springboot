<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_model extends CI_Model {

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
}
