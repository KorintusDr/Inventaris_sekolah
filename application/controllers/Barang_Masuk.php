<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Barang_masuk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Barang_masuk_model');
        $this->load->model('Kategori_model');
        $this->load->model('Ruangan_model');
        $this->load->model('Merek_model');
        $this->load->model('Kondisi_model');
        $this->load->helper('url');
        $this->load->library('session'); 
    }

    public function index() {
        $role = $this->session->userdata('role');
        $data['barang_masuk'] = $this->Barang_masuk_model->get_all_barang_masuk();
        $data['title'] = 'Data Barang Masuk';
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        
        $views = [
            'admin' => 'admins/barang_masuk/view',
            'kepsek' => 'kepsek/barang_masuk/view'
        ];
        
        if (array_key_exists($role, $views)) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view($views[$role], $data);
            $this->load->view('layout/footer');
        } else {
            show_404();
        }
    }

    public function tambah() {
        $data['kategori'] = $this->Kategori_model->get_all();
        $data['ruangan'] = $this->Ruangan_model->get_all();
        $data['merek'] = $this->Merek_model->get_all_merek();
        $data['kondisi'] = $this->Kondisi_model->get_all();
        $data['title'] = 'Tambah Barang Masuk';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admins/barang_masuk/tambah', $data);
        $this->load->view('layout/footer');
    }

    public function simpan() {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'jumlah' => $this->input->post('jumlah'),
            'id_merek' => $this->input->post('id_merek'),
            'id_kondisi' => $this->input->post('id_kondisi'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk') 
        );

        if ($this->Barang_masuk_model->insert_barang_masuk($data)) {
            $this->session->set_flashdata('success', 'Data barang masuk berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data barang masuk.');
        }
        
        redirect('barang-masuk');
    }

    public function edit($id) {
        $data['barang_masuk'] = $this->Barang_masuk_model->get_barang_masuk_by_id($id);
        $data['kategori'] = $this->Kategori_model->get_all();
        $data['ruangan'] = $this->Ruangan_model->get_all();
        $data['merek'] = $this->Merek_model->get_all_merek();
        $data['kondisi'] = $this->Kondisi_model->get_all();
        $data['title'] = 'Edit Barang Masuk';
    
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admins/barang_masuk/edit', $data);
        $this->load->view('layout/footer');
    }
    
    public function update($id) {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'jumlah' => $this->input->post('jumlah'),
            'id_merek' => $this->input->post('id_merek'),
            'id_kondisi' => $this->input->post('id_kondisi'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk')
        );
    
        if ($this->Barang_masuk_model->update_barang_masuk($id, $data)) {
            $this->session->set_flashdata('success', 'Data barang masuk berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data barang masuk.');
        }
        
        redirect('barang-masuk');
    }
    
    public function hapus($id) {
        if ($this->Barang_masuk_model->delete_barang_masuk($id)) {
            $this->session->set_flashdata('success', 'Data barang masuk berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data barang masuk.');
        }
        
        redirect('barang-masuk');
    }

    public function export() {
        $data = $this->Barang_masuk_model->get_all_barang_masuk();
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Barang');
        $sheet->setCellValue('C1', 'Kategori');
        $sheet->setCellValue('D1', 'Ruangan');
        $sheet->setCellValue('E1', 'Jumlah');
        $sheet->setCellValue('F1', 'Merek');
        $sheet->setCellValue('G1', 'Kondisi');
        $sheet->setCellValue('H1', 'Tanggal Masuk');
        $sheet->setCellValue('I1', 'Deskripsi');
        
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['id_barang_masuk']);
            $sheet->setCellValue('B' . $row, $item['nama_barang']);
            $sheet->setCellValue('C' . $row, $item['nama_kategori']);
            $sheet->setCellValue('D' . $row, $item['nama_ruangan']);
            $sheet->setCellValue('E' . $row, $item['jumlah']);
            $sheet->setCellValue('F' . $row, $item['nama_merek']);
            $sheet->setCellValue('G' . $row, $item['nama_kondisi']);
            $sheet->setCellValue('H' . $row, $item['tanggal_masuk']);
            $sheet->setCellValue('I' . $row, $item['deskripsi']);
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $filename = 'Barang_Masuk.xlsx';
        
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
        $data['barang_masuk'] = $this->Barang_masuk_model->get_all_barang_masuk();

        $html = $this->load->view('pdf_barang_masuk', $data, TRUE);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream("daftar_barang_masuk.pdf", array("Attachment" => 0));
    }
}
