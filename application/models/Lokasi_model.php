<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_data($table) {
        if (empty($table)) {
            log_message('error', 'Table name is empty.');
            return false;
        }
    
        return $this->db->get($table);
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function get_lokasi_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('lokasi')->row();
    }

    public function update_data($data, $table) {
        $this->db->where('id', $data['id']);
        return $this->db->update($table, $data);
    }
    
    public function delete($where, $table) {
        $this->db->where($where);
        return $this->db->delete($table);
    }
}