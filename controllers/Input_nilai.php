<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_nilai extends CI_Controller
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
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $data['nilai'] = $this->nilai->list();
        $this->load->view('templates_administrator/header_admin', $data);
        $this->load->view('templates_administrator/sidebar_admin');
        $this->load->view('templates_administrator/topbar_admin', $data);
        $this->load->view('administrator/input_nilai', $data);
        $this->load->view('templates_administrator/footer_admin');
    }


    public function add()
    {
        $nama_siswa = $this->input->post('nama_siswa');
        $id_username = $this->input->post('id_username');
        $mapel = $this->input->post('mapel');
        $tugas1 = $this->input->post('tugas1');
        $tugas2 = $this->input->post('tugas2');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $hasil = (($tugas1) + ($tugas2) + ($uts) + ($uas)) / 4;
        $data = array(
            'nama_siswa' => $nama_siswa,
            'id_username' => $id_username,
            'mapel' => $mapel,
            'tugas1' => $tugas1,
            'tugas2' => $tugas2,
            'uts' => $uts,
            'uas' => $uas,
            'nilai' => $hasil,
        );
        $this->nilai->add($data);
        $this->session->set_flashdata('pesan_nilai', '<div class="alert alert-success alert-dismissible">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('input_nilai');
    }
    public function edit($id_nilai)
    {
        $nama_siswa = $this->input->post('nama_siswa');
        $id_username = $this->input->post('id_username');
        $mapel = $this->input->post('mapel');
        $tugas1 = $this->input->post('tugas1');
        $tugas2 = $this->input->post('tugas2');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $hasil = (($tugas1) + ($tugas2) + ($uts) + ($uas)) / 4;
        $data = array(
            'id_nilai' => $id_nilai,
            'nama_siswa' => $nama_siswa,
            'id_username' => $id_username,
            'mapel' => $mapel,
            'tugas1' => $tugas1,
            'tugas2' => $tugas2,
            'uts' => $uts,
            'uas' => $uas,
            'nilai' => $hasil,
        );
        $this->nilai->edit($data);
        $this->session->set_flashdata('pesan_nilai', '<div class="alert alert-success alert-dismissible">
        Data berhasil diubah!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('input_nilai');
    }
    public function delete($id_nilai)
    {
        $data = array(
            'id_nilai' => $id_nilai,
        );
        $this->nilai->delete($data);
        $this->session->set_flashdata('pesan_nilai', '<div class="alert alert-success alert-dismissible">
        Data berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('input_nilai');
    }
}
