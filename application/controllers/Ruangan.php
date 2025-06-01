<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ruangan_model');
        $this->load->library('session');
    }

    public function index() {
        $data['ruangan'] = $this->Ruangan_model->get_all();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admins/ruangan/view', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        $nama_ruangan = $this->input->post('nama_ruangan');
        $deskripsi = $this->input->post('deskripsi');
        
        $data = array(
            'nama_ruangan' => $nama_ruangan,
            'deskripsi' => $deskripsi
        );

        if ($this->Ruangan_model->insert($data)) {
            $this->session->set_flashdata('success', 'Ruangan berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan ruangan.');
        }

        redirect('ruangan');
    }

    public function edit($id) {
        $ruangan = $this->Ruangan_model->get_by_id($id);
        echo json_encode($ruangan);
    }

    public function update() {
        $id = $this->input->post('id_ruangan');
        $nama_ruangan = $this->input->post('nama_ruangan');
        $deskripsi = $this->input->post('deskripsi');
        
        $data = array(
            'nama_ruangan' => $nama_ruangan,
            'deskripsi' => $deskripsi
        );

        if ($this->Ruangan_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Ruangan berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui ruangan.');
        }

        redirect('ruangan');
    }

    public function hapus($id) {
        if ($this->Ruangan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Ruangan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus ruangan.');
        }

        redirect('ruangan');
    }
}
