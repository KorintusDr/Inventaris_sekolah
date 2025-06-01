<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    private $table = 'kategori';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }    
    
    public function get_all() {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_by_id($id) {
        $query = $this->db->get_where($this->table, array('id_kategori' => $id));
        return $query->row_array();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where('id_kategori', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, array('id_kategori' => $id));
    }
    
}
