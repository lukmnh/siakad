<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_siswa extends CI_Controller
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
        $data['judul'] = 'Data nilai';
        $data['nilai'] = $this->list1();
        $this->load->view('siswa/header_siswa', $data);
        $this->load->view('siswa/sidebar_siswa');
        $this->load->view('siswa/topbar_siswa', $data);
        $this->load->view('siswa/nilai_siswa', $data);
        $this->load->view('siswa/footer_siswa');
    }
    public function list1()
    {
        $this->db->where('nilai.id_username', $this->session->userdata('username'));
        return $this->db->get('nilai')->result();

        // $this->db->select('nilai.*, users.username AS id_username');
        // $this->db->join('users', 'nilai.id_username = users.username');
        // // $this->db->from('nilai');
        // $query = $this->db->get_where('nilai', array('id_username'));
        // $row = $query->result();
        // return $row;
        // return $query->result();
        // $this->db->select('nilai.*, users.username AS id_username');
        // $this->db->join('users', 'users.username = nilai.id_username');
        // $query = $this->db->get_where('nilai', array('id_username'));
        // return $query->result();
    }
}
