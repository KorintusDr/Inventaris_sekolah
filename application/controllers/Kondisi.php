<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kondisi_model');
        $this->load->library('session');
    }

    public function index() {
        $data['kondisi'] = $this->Kondisi_model->get_all();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admins/kondisi/view', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        $nama_kondisi = $this->input->post('nama_kondisi');
        $deskripsi = $this->input->post('deskripsi');
        
        $data = array(
            'nama_kondisi' => $nama_kondisi,
            'deskripsi' => $deskripsi
        );

        if ($this->Kondisi_model->insert($data)) {
            $this->session->set_flashdata('success', 'Kondisi berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan kondisi.');
        }

        redirect('kondisi');
    }

    public function edit($id) {
        $kondisi = $this->Kondisi_model->get_by_id($id);
        echo json_encode($kondisi);
    }

    public function update() {
        $id = $this->input->post('id_kondisi');
        $nama_kondisi = $this->input->post('nama_kondisi');
        $deskripsi = $this->input->post('deskripsi');
        
        $data = array(
            'nama_kondisi' => $nama_kondisi,
            'deskripsi' => $deskripsi
        );

        if ($this->Kondisi_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Kondisi berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui kondisi.');
        }

        redirect('kondisi');
    }

    public function hapus($id) {
        if ($this->Kondisi_model->delete($id)) {
            $this->session->set_flashdata('success', 'Kondisi berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus kondisi.');
        }

        redirect('kondisi');
    }
}
