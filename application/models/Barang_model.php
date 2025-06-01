<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function get_all_barang() {
        $this->db->select('barang.*, merek.nama_merek, kategori.nama_kategori, ruangan.nama_ruangan, kondisi.nama_kondisi');
        $this->db->from('barang');
        $this->db->join('merek', 'barang.id_merek = merek.id_merek');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('ruangan', 'barang.id_ruangan = ruangan.id_ruangan');
        $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
        return $this->db->get()->result_array();
    }

    public function get_barang($id_barang) {
        $this->db->select('barang.*, merek.nama_merek, kategori.nama_kategori, ruangan.nama_ruangan, kondisi.nama_kondisi');
        $this->db->from('barang');
        $this->db->join('merek', 'barang.id_merek = merek.id_merek');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('ruangan', 'barang.id_ruangan = ruangan.id_ruangan');
        $this->db->join('kondisi', 'barang.id_kondisi = kondisi.id_kondisi');
        $this->db->where('barang.id_barang', $id_barang);
        return $this->db->get()->row_array();
    }

    public function get_options($table) {
        return $this->db->get($table)->result_array();
    }

    public function insert_barang($data) {
        return $this->db->insert('barang', $data);
    }

    public function update_barang($id_barang, $data) {
        $this->db->where('id_barang', $id_barang);
        return $this->db->update('barang', $data);
    }

    public function delete_barang($id_barang) {
        $this->db->where('id_barang', $id_barang);
        return $this->db->delete('barang');
    }
}
