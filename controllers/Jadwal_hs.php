<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_hs extends CI_Controller
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
        $data['judul'] = 'Jadwal Pelajaran Siswa';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $data['jadwal_s'] = $this->getJadwal();
        // $data['setting'] = $this->peng_user->list();
        $this->load->view('siswa/header_siswa', $data);
        $this->load->view('siswa/sidebar_siswa');
        $this->load->view('siswa/topbar_siswa', $data);
        $this->load->view('siswa/Hjadwal_s', $data);
        $this->load->view('siswa/footer_siswa');
    }
    public function getJadwal()
    {

        $this->db->select('jadwal_s.*, siswa.username_users as username_jadwal');

        $this->db->join('siswa', 'siswa.username_users = jadwal_s.username_jadwal');

        $this->db->where('jadwal_s.username_jadwal', $this->session->userdata('username'));
        return $this->db->get('jadwal_s')->result();
    }
    public function getGuru()
    {
        $this->db->select('jadwal_g.*, guru.username_guru as username_u, siswa.nama');
        $this->db->join('siswa', 'siswa.username_users = jadwal_s.username_jadwal');
        $this->db->where('jadwal_s.username_jadwal', $this->session->userdata('username'));
        return $this->db->get('jadwal_s')->result();
    }
}
