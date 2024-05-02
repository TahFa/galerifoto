<?php

use PSpell\Config;

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(1);
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            redirect('user/beranda');
        }

        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'login Page';
            $this->load->view('auth/login', $data);
            $this->load->view('templates/user_header');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user/beranda');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!</div>');
                    redirect('auth');
                }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account Not Found!</div>');
            redirect('auth');
        }
    }
    

    public function registration()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "User Registration";
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/user_header');
        } else {
            $data = [
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! your account has been created. please login</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logout</div>');
        redirect('/');
    }
}
