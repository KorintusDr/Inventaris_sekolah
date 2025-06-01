<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Merek_model');
    }

    public function index() {
        $data['merek'] = $this->Merek_model->get_all_merek();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admins/merek/view', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        $data = [
            'nama_merek' => $this->input->post('nama_merek'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $this->Merek_model->insert_merek($data);
        $this->session->set_flashdata('success', 'Merek berhasil ditambahkan.');
        redirect('merek');
    }

    public function update() {
        $id_merek = $this->input->post('id_merek');
        $data = [
            'nama_merek' => $this->input->post('nama_merek'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $this->Merek_model->update_merek($id_merek, $data);
        $this->session->set_flashdata('success', 'Merek berhasil diperbarui.');
        redirect('merek');
    }

    public function hapus($id_merek) {
        $this->Merek_model->delete_merek($id_merek);
        $this->session->set_flashdata('success', 'Merek berhasil dihapus.');
        redirect('merek');
    }
}
