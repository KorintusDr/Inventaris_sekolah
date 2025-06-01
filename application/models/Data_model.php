<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

    public function get_kategori_count() {
        return $this->db->count_all('kategori');
    }

    public function get_ruangan_count() {
        return $this->db->count_all('ruangan');
    }

    public function get_kondisi_count() {
        return $this->db->count_all('kondisi');
    }

    public function get_merek_count() {
        return $this->db->count_all('merek');
    }
}

