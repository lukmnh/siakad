<?php
defined('BASEPATH') or exit('No direct script access allowed');

class H_guru extends CI_Controller
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
        $data['judul'] = 'Guru';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $this->load->view('guru/header_guru', $data);
        $this->load->view('guru/sidebar_guru');
        $this->load->view('guru/topbar_guru', $data);
        $this->load->view('guru/H_guru', $data);
        $this->load->view('guru/footer_guru');
    }
}
