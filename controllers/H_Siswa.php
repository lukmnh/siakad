<?php
defined('BASEPATH') or exit('No direct script access allowed');

class H_Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            Maaf, anda belum login!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Siswa';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $this->load->view('siswa/header_siswa', $data);
        $this->load->view('siswa/sidebar_siswa');
        $this->load->view('siswa/topbar_siswa', $data);
        $this->load->view('siswa/h_siswa', $data);
        $this->load->view('siswa/footer_siswa');
    }
}
