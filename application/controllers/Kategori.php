<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('session');
    }

    public function index() {
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admins/kategori/view', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        $nama_kategori = $this->input->post('nama_kategori');
        $deskripsi = $this->input->post('deskripsi');
        
        $data = array(
            'nama_kategori' => $nama_kategori,
            'deskripsi' => $deskripsi
        );

        if ($this->Kategori_model->insert($data)) {
            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan kategori.');
        }

        redirect('kategori');
    }

    public function edit($id) {
        $kategori = $this->Kategori_model->get_by_id($id);
        echo json_encode($kategori);
    }

    public function update() {
        $id = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
        $deskripsi = $this->input->post('deskripsi');
        
        $data = array(
            'nama_kategori' => $nama_kategori,
            'deskripsi' => $deskripsi
        );

        if ($this->Kategori_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui kategori.');
        }

        redirect('kategori');
    }

    public function hapus($id) {
        if ($this->Kategori_model->delete($id)) {
            $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus kategori.');
        }

        redirect('kategori');
    }
}
