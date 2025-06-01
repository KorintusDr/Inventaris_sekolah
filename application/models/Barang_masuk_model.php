<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_barang_masuk() {
        $this->db->select('bm.*, k.nama_kategori, r.nama_ruangan, m.nama_merek, kd.nama_kondisi');
        $this->db->from('barang_masuk bm');
        $this->db->join('kategori k', 'bm.id_kategori = k.id_kategori', 'left');
        $this->db->join('ruangan r', 'bm.id_ruangan = r.id_ruangan', 'left');
        $this->db->join('merek m', 'bm.id_merek = m.id_merek', 'left');
        $this->db->join('kondisi kd', 'bm.id_kondisi = kd.id_kondisi', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_barang_masuk_by_id($id) {
        $this->db->select('bm.*, k.nama_kategori, r.nama_ruangan, m.nama_merek, kd.nama_kondisi');
        $this->db->from('barang_masuk bm');
        $this->db->join('kategori k', 'bm.id_kategori = k.id_kategori', 'left');
        $this->db->join('ruangan r', 'bm.id_ruangan = r.id_ruangan', 'left');
        $this->db->join('merek m', 'bm.id_merek = m.id_merek', 'left');
        $this->db->join('kondisi kd', 'bm.id_kondisi = kd.id_kondisi', 'left');
        $this->db->where('bm.id_barang_masuk', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert_barang_masuk($data) {
        return $this->db->insert('barang_masuk', $data);
    }

    public function update_barang_masuk($id, $data) {
        $this->db->where('id_barang_masuk', $id);
        return $this->db->update('barang_masuk', $data);
    }
    
    public function delete_barang_masuk($id) {
        $this->db->where('id_barang_masuk', $id);
        return $this->db->delete('barang_masuk');
    }
}
