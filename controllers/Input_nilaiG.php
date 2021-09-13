<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_nilaiG extends CI_Controller
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
        $this->load->model('nilai_g');
        $data['nilai'] = $this->nilai_g->list3();
        $this->load->view('guru/header_guru', $data);
        $this->load->view('guru/sidebar_guru');
        $this->load->view('guru/topbar_guru', $data);
        $this->load->view('guru/G_inputnilai', $data);
        $this->load->view('guru/footer_guru');
    }

    public function tambah()
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
        $this->load->model('nilai_g');
        $this->nilai_g->tambah($data);
        $this->session->set_flashdata('pesan_nilai', '<div class="alert alert-success alert-dismissible">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('input_nilaiG');
    }
    public function ubah($id_nilai)
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
        $this->load->model('nilai_g');
        $this->nilai_g->ubah($data);
        $this->session->set_flashdata('pesan_nilai', '<div class="alert alert-success alert-dismissible">
        Data berhasil diubah!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('input_nilaiG');
    }
    public function hapus($id_nilai)
    {
        $data = array(
            'id_nilai' => $id_nilai,
        );
        $this->load->model('nilai_g');
        $this->nilai_g->hapus($data);
        $this->session->set_flashdata('pesan_nilai', '<div class="alert alert-success alert-dismissible">
        Data berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('input_nilaiG');
    }
}
