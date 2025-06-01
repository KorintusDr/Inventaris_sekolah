<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_barang_model extends CI_Model {

    private $table = 'peminjaman_barang'; 

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_peminjaman_barang() {
        $this->db->select('p.*, b.nama_barang, k.nama_kategori, r.nama_ruangan, m.nama_merek, c.nama_kondisi');
        $this->db->from($this->table . ' p');
        $this->db->join('barang b', 'p.id_barang = b.id_barang');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        $this->db->join('ruangan r', 'p.id_ruangan = r.id_ruangan');
        $this->db->join('merek m', 'p.id_merek = m.id_merek');
        $this->db->join('kondisi c', 'p.id_kondisi = c.id_kondisi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_by_id($id) {
        $this->db->where('id_peminjaman', $id); 
        $query = $this->db->get('peminjaman_barang');
        return $query->row_array();
    }

    public function insert_peminjaman_barang($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update_peminjaman_barang($id, $data) {
        $this->db->where('id_peminjaman', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_peminjaman_barang($id) {
        $this->db->where('id_peminjaman', $id);
        return $this->db->delete($this->table);
    }

    public function get_all_barang() {
        $this->db->select('*');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query->result_array();
    }

    
    
}
?>
