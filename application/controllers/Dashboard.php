<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $id_user = $this->session->userdata('id_user');
        $data['user'] = $this->Auth_model->get_user_by_id($id_user);
        $data['title'] = 'Dashboard';

        $data['kategori_count'] = $this->db->count_all('kategori');
        $data['ruangan_count'] = $this->db->count_all('ruangan');
        $data['kondisi_count'] = $this->db->count_all('kondisi');
        $data['merek_count'] = $this->db->count_all('merek');
        $data['barang_count'] = $this->db->count_all('barang');
        $data['barang_masuk_count'] = $this->db->count_all('barang_masuk');
        $data['barang_keluar_count'] = $this->db->count_all('barang_keluar');
        $data['peminjaman_barang_count'] = $this->db->count_all('peminjaman_barang');

        $role = $this->session->userdata('role');
        if ($role == 'admin') {
            $this->_load_views('admins/dashboard', $data);
        } else if ($role == 'kepsek') {
            $this->_load_views('kepsek/dashboard', $data);
        } else {
            redirect('auth');
        }
    }

    private function _load_views($view, $data) {
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view($view, $data);
        $this->load->view('layout/footer');
    }
}
