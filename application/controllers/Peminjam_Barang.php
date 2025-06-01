<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Peminjam_barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Peminjaman_barang_model');
        $this->load->model('Kategori_model');
        $this->load->model('Ruangan_model');
        $this->load->model('Merek_model');
        $this->load->model('Kondisi_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('pdf');
    }

    public function index() {
        $role = $this->session->userdata('role');
        $data['peminjaman_barang'] = $this->Peminjaman_barang_model->get_all_peminjaman_barang();
        $data['title'] = 'Data Barang Keluar';
        $data['success'] = $this->session->flashdata('success');
        $data['error'] = $this->session->flashdata('error');
        
        $views = [
            'admin' => 'admins/peminjaman_barang/view',
            'kepsek' => 'kepsek/peminjaman_barang/view'
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
        $data['barang'] = $this->Peminjaman_barang_model->get_all_barang();
        $data['title'] = 'Tambah Peminjaman Barang';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admins/peminjaman_barang/tambah', $data);
        $this->load->view('layout/footer');
    }

    public function simpan() {
        $data = array(
            'nama_peminjam' => $this->input->post('nama_peminjam'),
            'id_barang' => $this->input->post('id_barang'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'jumlah' => $this->input->post('jumlah'),
            'id_merek' => $this->input->post('id_merek'),
            'id_kondisi' => $this->input->post('id_kondisi'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali'),
            'keterangan' => $this->input->post('keterangan')
        );

        if ($this->Peminjaman_barang_model->insert_peminjaman_barang($data)) {
            $this->session->set_flashdata('success', 'Data peminjaman barang berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data peminjaman barang.');
        }
        
        redirect('peminjam_barang');
    }

    public function edit($id) {
        $data['peminjaman'] = $this->Peminjaman_barang_model->get_by_id($id);
        $data['kategori'] = $this->Kategori_model->get_all();
        $data['ruangan'] = $this->Ruangan_model->get_all();
        $data['merek'] = $this->Merek_model->get_all_merek();
        $data['kondisi'] = $this->Kondisi_model->get_all();
        $data['barang'] = $this->Peminjaman_barang_model->get_all_barang();
        $data['title'] = 'Edit Peminjaman Barang';
    
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admins/peminjaman_barang/edit', $data);
        $this->load->view('layout/footer');
    }

    public function update() {
        $id = $this->input->post('id_peminjaman'); 
        if (!$id) {
            show_error('ID Peminjaman Barang tidak ditemukan.');
        }

        $data = array(
            'nama_peminjam' => $this->input->post('nama_peminjam'),
            'id_barang' => $this->input->post('id_barang'),
            'id_kategori' => $this->input->post('id_kategori'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'jumlah' => $this->input->post('jumlah'),
            'id_merek' => $this->input->post('id_merek'),
            'id_kondisi' => $this->input->post('id_kondisi'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali'),
            'keterangan' => $this->input->post('keterangan')
        );

        if ($this->Peminjaman_barang_model->update_peminjaman_barang($id, $data)) {
            $this->session->set_flashdata('success', 'Data peminjaman barang berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data peminjaman barang.');
        }
        
        redirect('peminjam_barang');
    }

    public function ubah_status() {
        $id = $this->input->post('peminjaman_id');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
    
        if (!$id) {
            show_error('ID Peminjaman Barang tidak ditemukan.');
        }
    
        $data = array(
            'status' => $status,
            'keterangan' => $keterangan
        );
    
        if ($this->Peminjaman_barang_model->update_peminjaman_barang($id, $data)) {
            $this->session->set_flashdata('success', 'Status peminjaman barang berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status peminjaman barang.');
        }
        
        redirect('peminjam_barang');
    }
    
    public function hapus($id) {
        if ($this->Peminjaman_barang_model->delete_peminjaman_barang($id)) {
            $this->session->set_flashdata('success', 'Data peminjaman barang berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data peminjaman barang.');
        }
        
        redirect('peminjam_barang');
    }

    public function export() {
        $data = $this->Peminjaman_barang_model->get_all_peminjaman_barang();
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Peminjam');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Jumlah Peminjaman');
        $sheet->setCellValue('E1', 'Kategori');
        $sheet->setCellValue('F1', 'Ruangan');
        $sheet->setCellValue('G1', 'Merek');
        $sheet->setCellValue('H1', 'Kondisi');
        $sheet->setCellValue('I1', 'Tanggal Peminjaman');
        $sheet->setCellValue('J1', 'Tanggal Pengembalian');
        $sheet->setCellValue('K1', 'Keterangan');
        
        $row = 2;
        $no = 1;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $item['nama_peminjam']);
            $sheet->setCellValue('C' . $row, $item['nama_barang']);
            $sheet->setCellValue('D' . $row, $item['jumlah']);
            $sheet->setCellValue('E' . $row, $item['nama_kategori']);
            $sheet->setCellValue('F' . $row, $item['nama_ruangan']);
            $sheet->setCellValue('G' . $row, $item['nama_merek']);
            $sheet->setCellValue('H' . $row, $item['nama_kondisi']);
            $sheet->setCellValue('I' . $row, $item['tanggal_pinjam']);
            $sheet->setCellValue('J' . $row, $item['tanggal_kembali']);
            $sheet->setCellValue('K' . $row, $item['keterangan']);
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $filename = 'Peminjaman_Barang.xlsx';
        
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
        $this->load->model('Peminjaman_barang_model');
        $data['peminjaman_barang'] = $this->Peminjaman_barang_model->get_all_peminjaman_barang();

        $html = $this->load->view('pdf_template', $data, TRUE);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream("daftarpeminjaman.pdf", array("Attachment" => 0));
    }
}
?>
