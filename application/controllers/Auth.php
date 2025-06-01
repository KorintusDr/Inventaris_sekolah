<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login() {
        $username = $this->input->post('username');

        $user = $this->Auth_model->get_user($username);

        if ($user) {
            $data = [
                'id_user' => $user->id_user,
                'username' => $user->username,
                'role' => $user->role
            ];
            $this->session->set_userdata($data);

            if ($user->role == 'admin') {
                redirect('admins/dashboard');
            } else if ($user->role == 'kepsek') {
                redirect('kepsek/dashboard');
            }
        } else {
            $this->session->set_flashdata('error', 'Username tidak ditemukan!');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->unset_userdata(['id_user', 'username', 'role']);
        $this->session->set_flashdata('success', 'Anda telah logout!');
        redirect('auth');
    }
}
