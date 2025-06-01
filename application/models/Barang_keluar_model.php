<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_keluar_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_barang_keluar() {
        $this->db->select('bk.*, k.nama_kategori, r.nama_ruangan, m.nama_merek, kd.nama_kondisi');
        $this->db->from('barang_keluar bk');
        $this->db->join('kategori k', 'bk.id_kategori = k.id_kategori', 'left');
        $this->db->join('ruangan r', 'bk.id_ruangan = r.id_ruangan', 'left');
        $this->db->join('merek m', 'bk.id_merek = m.id_merek', 'left');
        $this->db->join('kondisi kd', 'bk.id_kondisi = kd.id_kondisi', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_barang_keluar_by_id($id) {
        $this->db->select('bk.*, k.nama_kategori, r.nama_ruangan, m.nama_merek, kd.nama_kondisi');
        $this->db->from('barang_keluar bk');
        $this->db->join('kategori k', 'bk.id_kategori = k.id_kategori', 'left');
        $this->db->join('ruangan r', 'bk.id_ruangan = r.id_ruangan', 'left');
        $this->db->join('merek m', 'bk.id_merek = m.id_merek', 'left');
        $this->db->join('kondisi kd', 'bk.id_kondisi = kd.id_kondisi', 'left');
        $this->db->where('bk.id_barang_keluar', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert_barang_keluar($data) {
        return $this->db->insert('barang_keluar', $data);
    }

    public function update_barang_keluar($id, $data) {
        $this->db->where('id_barang_keluar', $id);
        return $this->db->update('barang_keluar', $data);
    }

    public function delete_barang_keluar($id) {
        $this->db->where('id_barang_keluar', $id);
        return $this->db->delete('barang_keluar');
    }
}
?>
