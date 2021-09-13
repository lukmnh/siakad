<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_hg extends CI_Controller
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
        $data['judul'] = 'Jadwal Mengajar Guru';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $data['jadwal_g'] = $this->getJadwal();
        // $data['setting'] = $this->peng_user->list();
        $this->load->view('guru/header_guru', $data);
        $this->load->view('guru/sidebar_guru');
        $this->load->view('guru/topbar_guru', $data);
        $this->load->view('guru/Hjadwal_g', $data);
        $this->load->view('guru/footer_guru');
    }
    public function getJadwal()
    {
        $this->db->select('jadwal_g.*, guru.username_guru as username_guru, guru.nama');
        $this->db->join('guru', 'guru.username_guru = jadwal_g.username_guru');
        $this->db->where('jadwal_g.username_guru', $this->session->userdata('username'));
        return $this->db->get('jadwal_g')->result();
    }
    // public function add()
    // {
    //     $username = $this->input->post('username_guru');
    //     $hari = $this->input->post('hari_g');
    //     $jam = $this->input->post('jam_g');
    //     $kelas = $this->input->post('kelas_g');
    //     $mapel = $this->input->post('mapel_g');

    //     $data = array(
    //         'username_guru' => $username,
    //         'hari_g' => $hari,
    //         'jam_g' => $jam,
    //         'kelas_g' => $kelas,
    //         'mapel_g' => $mapel,

    //     );
    //     $this->g_jadwal->add($data);
    //     $this->session->set_flashdata('pesan_jdg', '<div class="alert alert-success alert-dismissible">
    //     Data berhasil ditambahkan!
    //     <button type="button" class="close" data-dismiss="alert">&times;</button>
    //   </div>');
    //     redirect('jadwal_g');
    // }
    // public function edit($id_jdg)
    // {
    //     $username = $this->input->post('username_guru');
    //     $hari = $this->input->post('hari_g');
    //     $jam = $this->input->post('jam_g');
    //     $kelas = $this->input->post('kelas_g');
    //     $mapel = $this->input->post('mapel_g');

    //     $data = array(
    //         'id_jdg' => $id_jdg,
    //         'username_guru' => $username,
    //         'hari_g' => $hari,
    //         'jam_g' => $jam,
    //         'kelas_g' => $kelas,
    //         'mapel_g' => $mapel,

    //     );
    //     $this->g_jadwal->edit($data);
    //     $this->session->set_flashdata('pesan_jdg', '<div class="alert alert-success alert-dismissible">
    //     Data berhasil diubah!
    //     <button type="button" class="close" data-dismiss="alert">&times;</button>
    //   </div>');
    //     redirect('jadwal_g');
    // }
    // public function delete($id_jdg)
    // {
    //     $data = array(
    //         'id_jdg' => $id_jdg,
    //     );
    //     $this->g_jadwal->delete($data);
    //     $this->session->set_flashdata('pesan_jgd', '<div class="alert alert-success alert-dismissible">
    //     Data berhasil dihapus!
    //     <button type="button" class="close" data-dismiss="alert">&times;</button>
    //   </div>');
    //     redirect('jadwal_g');
    // }
}
