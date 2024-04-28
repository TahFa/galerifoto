<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->model('M_menu');
    }

    public function album()
    {
        $data['title'] = 'Album';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['album'] = $this->M_menu->getAlbum();

        $this->form_validation->set_rules('nama_album', 'Nama Album', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggal_buat', 'Created At', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/album/index', $data);
            $this->load->view('templates/user_footer');
        } else {
            $input = $this->input->post();
            $this->db->insert('album', $input);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New Album added!</div>');
            redirect('user/album');
        }
    }

    public function editAlbum($id)
    {
        $input = $this->input->post();
        $this->db->where('id', $id); 
        $this->db->update('album', $input);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        The Album has been Changed!</div>');
        redirect('user/album');
    }

    public function deleteAlbum($id)
    {
        $this->db->delete('album',['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The foto has ben deleted!</div>');
        redirect('user/album');
    }

    public function foto()
    {
        $data['title'] = 'Foto';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['foto'] = $this->M_menu->getFoto();
        $data['album'] = $this->db->get('album')->result_array();

        $this->form_validation->set_rules('judul_foto', 'Judul Foto', 'required|trim');
        $this->form_validation->set_rules('deskripsi_foto', 'Deskripsi Foto', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/foto/index', $data);
            $this->load->view('templates/user_footer');
        } else {
        $config['upload_path'] = './assets/img/photos/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG'; 
        $now = date('Y-m-d-H-i-s'); 
        $config['file_name'] = $now.'.png'; 
        $config['max_size'] = 0; 
        // $config['max_width'] = 1024;
        // $config['max_height'] = 768; 
        $this->load->library('upload', $config); 
        $this->upload->initialize($config); 
        if ( ! $this->upload->do_upload('userfile')) { 
        $error = array('error' => $this->upload->display_errors()); 
        print_r($error); 
        }
        $path = $config['upload_path'].$config['file_name'];
        $data = [
            'judul_foto' => $this->input->post('judul_foto'),
            'deskripsi_foto' => $this->input->post('deskripsi_foto'),
            'album_id' => $this->input->post('album_id'),
            'user_id' => $this->input->post('user_id'),
            'tanggal_unggah' => $this->input->post('tanggal_unggah'),
            'lokasi_file' => $path,
            
        ];
        $this->db->insert('foto', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Photo added!</div>');
        redirect('user/foto');
        }
    }

    public function editFoto($id)
    {
        //kondisi upload file 
        if ($_FILES["userfile"]["name"] !== '') { 
            $config['upload_path'] = './assets/img/photos/'; 
            $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG';
            $now = date('Y-m-d-H-i-s'); 
            $config['file_name'] = 
            $now.'.png'; 
            $config['max_size'] = 0; 
            // $config['max_width'] = 1024; 
            // $config['max_height'] = 768; 
            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 

            if ( ! $this->upload->do_upload('userfile')) { 
            $error = array('error' => $this->upload->display_errors());
            print_r($error); 
            }
            
            $pet = $config['upload_path'].$config['file_name'];
            $data = [
                "judul_foto" => $this->input->post('judul_foto'),
                "deskripsi_foto" => $this->input->post('deskripsi_foto'),
                'lokasi_file' => $pet
            ]; 

            $this->db->where('id', $id);
            $this->db->update('foto', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The Photo has been Changed!</div>'); 
        redirect('user/foto');
        }else {
            $data = [
                "judul_foto" => $this->input->post('judul_foto'),
                "deskripsi_foto" => $this->input->post('deskripsi_foto'),
                'lokasi_file' => $this->input->post('before_path')
            ]; 

            $this->db->where('id', $id);
            $this->db->update('foto', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The Photo has been Changed!</div>'); 
        redirect('user/Foto');
        }
    }

    public function deleteFoto($id)
    {
        $this->db->delete('foto',['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The Photo has ben deleted!</div>');
        redirect('user/foto');
    }
    
    public function beranda()
    {
        $data['title'] = 'My Album';
        $data['user'] = $this->db->get_where('user' , ['username' => $this->session->userdata('username')])->row_array();
        // $data['like'] = $this->M_menu->getLike($id);
        $data['foto'] = $this->M_menu->getFoto();

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/beranda', $data);
        $this->load->view('templates/user_footer');
    }

    public function detailFoto($id)
    {
        $data['title'] = 'Detail Foto';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['komen'] = $this->M_menu->getKomen($id);
        $data['foto'] = $this->M_menu->getDetailFoto($id);
		$data['like'] = $this->M_menu->getLike($id);
		$data['isLiked'] = $this->M_menu->getLike($id, $data['user']['id']);

        $this->form_validation->set_rules('isi_komentar', 'Komentar', 'required');

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/foto/detail', $data);
        $this->load->view('templates/user_footer');
    }

    public function tambahKomen($foto_id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $input = $this->input->post();
        $this->db->insert('komentarfoto', $input);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Comment added!</div>');
        redirect('user/detailFoto/' . $foto_id);
    }

    public function deleteKomen($id, $foto_id)
    {
        $this->db->delete('komentarfoto',['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Comment has ben deleted!</div>');
        redirect('user/detailFoto/' . $foto_id);
    }

    public function tambahLike($foto_id)
    {
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $input = [
            "foto_id" => $foto_id,
            "user_id" => $user['id'],
            "tanggal_like" => date('Y-m-d'),
        ];
        $this->db->insert('likefoto', $input);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Like added!</div>');
        redirect('user/detailFoto/' . $foto_id);
    }

    public function hapusLike($id, $foto_id)
    {
        $this->db->delete('likefoto',['id' => $id, 'foto_id' => $foto_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Like has ben deleted!</div>');
        redirect('user/detailFoto/' . $foto_id);
    }
}
