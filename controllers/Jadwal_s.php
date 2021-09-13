<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_s extends CI_Controller
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
        $data['judul'] = 'Jadwal Siswa';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $data['jadwal_s'] = $this->s_jadwal->show();
        // $data['setting'] = $this->peng_user->list();
        $this->load->view('templates_administrator/header_admin', $data);
        $this->load->view('templates_administrator/sidebar_admin');
        $this->load->view('templates_administrator/topbar_admin', $data);
        $this->load->view('administrator/jadwal_s', $data);
        $this->load->view('templates_administrator/footer_admin');
    }
    public function add()
    {
        $username = $this->input->post('username_jadwal');
        $hari = $this->input->post('hari');
        $jam = $this->input->post('jam');
        $kelas = $this->input->post('kelas');
        $mapel = $this->input->post('mapel');

        $data = array(
            'username_jadwal' => $username,
            'hari' => $hari,
            'jam' => $jam,
            'kelas' => $kelas,
            'mapel' => $mapel,

        );
        $this->s_jadwal->add($data);
        $this->session->set_flashdata('pesan_jad', '<div class="alert alert-success alert-dismissible">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('jadwal_s');
    }
    public function edit($id_jds)
    {
        $username = $this->input->post('username_jadwal');
        $hari = $this->input->post('hari');
        $jam = $this->input->post('jam');
        $kelas = $this->input->post('kelas');
        $mapel = $this->input->post('mapel');

        $data = array(
            'id_jds' => $id_jds,
            'username_jadwal' => $username,
            'hari' => $hari,
            'jam' => $jam,
            'kelas' => $kelas,
            'mapel' => $mapel,

        );
        $this->s_jadwal->edit($data);
        $this->session->set_flashdata('pesan_jad', '<div class="alert alert-success alert-dismissible">
        Data berhasil diubah!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('jadwal_s');
    }
    public function delete($id_jds)
    {
        $data = array(
            'id_jds' => $id_jds,
        );
        $this->s_jadwal->delete($data);
        $this->session->set_flashdata('pesan_jad', '<div class="alert alert-success alert-dismissible">
        Data berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('jadwal_s');
    }
}
