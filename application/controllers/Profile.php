<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index() {
        $id_user = $this->session->userdata('id_user');
        $data['user'] = $this->Auth_model->get_user_by_id($id_user);
        $data['title'] = 'Profile';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('profile', $data);
        $this->load->view('layout/footer');
    }

    public function update() {
        $id_user = $this->session->userdata('id_user');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index(); 
        } else {
            $username = $this->input->post('username');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $password = $this->input->post('password');
            $gambar = $this->_upload_image();

            $data = [
                'username' => $username,
                'nama_lengkap' => $nama_lengkap,
                'gambar' => $gambar
            ];

            if ($password) {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $this->Auth_model->update_user($id_user, $data);

            $this->session->set_flashdata('success', 'Profile updated successfully!');
            redirect('profile');
        }
    }

    private function _upload_image() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        }

        return $this->input->post('old_gambar'); 
    }

    public function generate_username() {
        $name = $this->input->get('name');
        $username = $this->generate_strong_username($name);
        echo $username;
    }

    public function generate_password() {
        $password = $this->generate_random_string(12);
        echo $password;
    }

    private function generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+[]{}|;:,.<>?';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function generate_strong_username($name) {
        $username = strtoupper(substr($name, 0, 3)) . rand(10, 99) . substr(md5(time()), 0, 6);
        return $username;
    }
}
