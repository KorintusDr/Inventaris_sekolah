<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Merek_Model');
        $this->load->model('Kategori_Model');
        $this->load->model('Ruangan_Model');
        $this->load->model('Kondisi_Model');
        $this->load->library('session');
        
    }

    public function index() {
        $role = $this->session->userdata('role'); 
        
        if ($role == 'admin') {
            $data['barang'] = $this->Barang_model->get_all_barang();
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admins/barang/view', $data);
            $this->load->view('layout/footer');
        } elseif ($role == 'kepsek') {
            $data['barang'] = $this->Barang_model->get_all_barang();
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('kepsek/barang/view', $data);
            $this->load->view('layout/footer');
        } else {
            show_404();
        }
    }

    public function tambah() {
        $data['merek'] = $this->Barang_model->get_options('merek');
        $data['kategori'] = $this->Barang_model->get_options('kategori');
        $data['ruangan'] = $this->Barang_model->get_options('ruangan');
        $data['kondisi'] = $this->Barang_model->get_options('kondisi');

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admins/barang/tambah', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id_barang) {
        $data['barang'] = $this->Barang_model->get_barang($id_barang);
        $data['merek'] = $this->Barang_model->get_options('merek');
        $data['kategori'] = $this->Barang_model->get_options('kategori');
        $data['ruangan'] = $this->Barang_model->get_options('ruangan');
        $data['kondisi'] = $this->Barang_model->get_options('kondisi');

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admins/barang/edit', $data);
        $this->load->view('layout/footer');
    }

    public function simpan() {
        $data = array(
            'id_merek' => $this->input->post('id_merek'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'id_kondisi' => $this->input->post('id_kondisi'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        if ($this->Barang_model->insert_barang($data)) {
            $this->session->set_flashdata('success', 'Barang berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan barang.');
        }

        redirect('barang');
    }

    public function update() {
        $id_barang = $this->input->post('id_barang');
        $data = array(
            'id_merek' => $this->input->post('id_merek'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'id_kondisi' => $this->input->post('id_kondisi'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        if ($this->Barang_model->update_barang($id_barang, $data)) {
            $this->session->set_flashdata('success', 'Barang berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui barang.');
        }

        redirect('barang');
    }

    public function hapus($id_barang) {
        if ($this->Barang_model->delete_barang($id_barang)) {
            $this->session->set_flashdata('success', 'Barang berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus barang.');
        }

        redirect('barang');
    }

    public function export() {
        $data = $this->Barang_model->get_all_barang();
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Barang');
        $sheet->setCellValue('C1', 'Kategori');
        $sheet->setCellValue('D1', 'Ruangan');
        $sheet->setCellValue('E1', 'Jumlah');
        $sheet->setCellValue('F1', 'Merek');
        $sheet->setCellValue('G1', 'Kondisi');
        $sheet->setCellValue('H1', 'Deskripsi');
        
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['id_barang']);
            $sheet->setCellValue('B' . $row, $item['nama_barang']);
            $sheet->setCellValue('C' . $row, $item['nama_kategori']);
            $sheet->setCellValue('D' . $row, $item['nama_ruangan']);
            $sheet->setCellValue('E' . $row, $item['jumlah']);
            $sheet->setCellValue('F' . $row, $item['nama_merek']);
            $sheet->setCellValue('G' . $row, $item['nama_kondisi']);
            $sheet->setCellValue('H' . $row, $item['deskripsi']);
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $filename = 'Stok_Barang.xlsx';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        ob_end_clean(); 
        
        try {
            $writer->save('php://output');
        } catch (Exception $e) {
            echo 'Error: ',  $e->getMessage();
        }
    }
    
    public function pdf() {
        $data['barang'] = $this->Barang_model->get_all_barang();

        $html = $this->load->view('pdf_stok_barang', $data, TRUE);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream("daftar_stok_barang.pdf", array("Attachment" => 0));
    }

}
