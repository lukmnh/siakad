<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Username_siswa extends CI_Controller
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
        $data['judul'] = 'Data nilai Siswa';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $data['u_siswa'] = $this->lihat2();
        // $data['n_siswa'] = $this->lihat3();
        $this->load->view('guru/header_guru', $data);
        $this->load->view('guru/sidebar_guru');
        $this->load->view('guru/topbar_guru', $data);
        $this->load->view('guru/u_siswa', $data);
        $this->load->view('guru/footer_guru');
    }
    public function lihat2()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_role', 'users.role_id = user_role.id');
        $this->db->where('role_id', '2');
        // $this->db->join('jadwal_s', 'jadwal_s.username_users = users.username, jadwal_s.kelas');
        $query = $this->db->get();
        return $query->result();
    }
    // public function lihat3()
    // {
    //     $this->db->select('users.*, jadwal_s.username_jadwal as username');
    //     // $this->db->from('users');
    //     $this->db->join('jadwal_s', 'jadwal_s.username_jadwal = users.username');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
}
