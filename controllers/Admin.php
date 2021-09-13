<?php

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
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
        $data['judul'] = 'Dashboard';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $data['jml_users'] = $this->jmlUser();
        $data['jml_guru'] = $this->jmlGuru();
        $data['jml_siswa'] = $this->jmlSiswa();
        $this->load->view('templates_administrator/header_admin', $data);
        $this->load->view('templates_administrator/sidebar_admin');
        $this->load->view('templates_administrator/topbar_admin', $data);
        $this->load->view('administrator/admin',);
        $this->load->view('templates_administrator/footer_admin');
    }
    public function jmlUser()
    {
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function jmlGuru()
    {
        $query = $this->db->get('guru');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function jmlSiswa()
    {
        $query = $this->db->get('siswa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
