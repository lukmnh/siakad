<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hdata_guru extends CI_Controller
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
        $data['judul'] = 'Biodata Guru';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $data['guru'] = $this->list2();
        $this->load->view('guru/header_guru', $data);
        $this->load->view('guru/sidebar_guru');
        $this->load->view('guru/topbar_guru', $data);
        $this->load->view('guru/lihat_guru', $data);
        $this->load->view('guru/footer_guru');
    }
    public function list2()
    {
        $this->db->where('guru.username_guru', $this->session->userdata('username'));
        return $this->db->get('guru')->result();
    }
    public function edit($id_guru)
    {
        $this->form_validation->set_rules('nomor_induk', 'Nomor_induk', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('jk', 'Jk', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        // $this->form_validation->set_rules('img', 'Img', 'required');
        if ($this->form_validation->run() == false) {
            $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
            $data['judul'] = 'Edit Data Guru';
            $data['tittle'] = 'SDN MEKAR BAKTI 1';
            $this->load->model('guru');
            $data['guru'] = $this->guru->detail($id_guru);
            $this->load->view('guru/header_guru', $data);
            $this->load->view('guru/sidebar_guru');
            $this->load->view('guru/topbar_guru', $data);
            $this->load->view('guru/editdata_guru', $data);
            $this->load->view('guru/footer_guru');
        } else {
            $data = array(
                'id_guru' => $id_guru,
                'nomor_induk' => $this->input->post('nomor_induk'),
                'nama' => $this->input->post('nama'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'agama' => $this->input->post('agama'),
                'jk' => $this->input->post('jk'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'pendidikan' => $this->input->post('pendidikan'),
            );
            $upload_image = $_FILES['img']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '10000';
                $config['upload_path'] = './img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('img')) {
                    $old_image = $data['guru']['img'];
                    if ($old_image != '') {
                        unlink(FCPATH . '/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img', $new_image);
                    $this->session->set_flashdata('surat_guru', '<div class="alert alert-success alert-dismissible">
                    Data berhasil diubah!
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                  </div>');
                } else {
                    // echo $this->upload->display_errors();
                    $this->session->set_flashdata('surat_error', '<div class="alert alert-danger alert-dismissible">
                    Data file salah!
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                  </div>');
                    redirect('hdata_guru/edit/' . $id_guru);
                }
            }
            $this->guru->edit($data);
            $this->session->set_flashdata('surat_guru', '<div class="alert alert-success alert-dismissible">
                    Data berhasil diubah!
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                  </div>');
            redirect('hdata_guru');
        }
        // if ($this->form_validation->run() == TRUE) {
        //     $config['upload_path'] = './img/';
        //     $config['allowed_types']        = 'gif|jpg|png';
        //     $config['max_size']             = 10000;
        //     $this->load->library('upload', $config);
        //     $this->upload->initialize($config);

        //     if (!$this->upload->do_upload('img')) {
        //         $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        //         $data['judul'] = 'Edit Data Guru';
        //         $data['tittle'] = 'SDN MEKAR BAKTI 1';
        //         $this->load->model('guru');
        //         $data['guru'] = $this->guru->detail($id_guru);

        //         $this->load->view('guru/header_guru', $data);
        //         $this->load->view('guru/sidebar_guru');
        //         $this->load->view('guru/topbar_guru', $data);
        //         $this->load->view('guru/editdata_guru', $data);
        //         $this->load->view('guru/footer_guru');
        //     } else {
        //         $upload_data = array('upload' => $this->upload->data());
        //         $config['image_library'] = 'gd2';
        //         $config['source_image'] = './img/' . $upload_data['upload']['file_name'];
        //         $this->load->library('image_lib', $config);
        //         // hapus foto lama
        //         $guru = $this->guru->detail($id_guru);
        //         if ($guru->img != "") {
        //             unlink('./img/' . $guru->img);
        //         }
        //         $data = array(
        //             'id_guru' => $id_guru,
        //             'nomor_induk' => $this->input->post('nomor_induk'),
        //             'nama' => $this->input->post('nama'),
        //             'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        //             'tempat_lahir' => $this->input->post('tempat_lahir'),
        //             'agama' => $this->input->post('agama'),
        //             'jk' => $this->input->post('jk'),
        //             'alamat' => $this->input->post('alamat'),
        //             'no_telp' => $this->input->post('no_telp'),
        //             'pendidikan' => $this->input->post('pendidikan'),
        //             'img' => $upload_data['upload']['file_name']
        //         );
        //         $this->load->model('guru');
        //         $this->guru->edit($data);
        //         $this->session->set_flashdata('surat', '<div class="alert alert-success alert-dismissible">
        //         Data berhasil diubah!
        //         <button type="button" class="close" data-dismiss="alert">&times;</button>
        //       </div>');
        //         redirect('hdata_guru');
        //     }
        //     $upload_data = array('upload' => $this->upload->data());
        //     $config['image_library'] = 'gd2';
        //     $config['source_image'] = './img/' . $upload_data['upload']['file_name'];
        //     $this->load->library('image_lib', $config);

        //     $data = array(
        //         'id_guru' => $id_guru,
        //         'nomor_induk' => $this->input->post('nomor_induk'),
        //         'nama' => $this->input->post('nama'),
        //         'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        //         'tempat_lahir' => $this->input->post('tempat_lahir'),
        //         'agama' => $this->input->post('agama'),
        //         'jk' => $this->input->post('jk'),
        //         'alamat' => $this->input->post('alamat'),
        //         'no_telp' => $this->input->post('no_telp'),
        //         'pendidikan' => $this->input->post('pendidikan'),
        //     );
        //     $this->guru->edit($data);
        //     $this->session->set_flashdata('surat', '<div class="alert alert-success alert-dismissible">
        //     Data berhasil diubah!
        //     <button type="button" class="close" data-dismiss="alert">&times;</button>
        //   </div>');
        //     redirect('hdata_guru');
        // }
        // $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        // $data['judul'] = 'Edit Data Guru';
        // $data['tittle'] = 'SDN MEKAR BAKTI 1';
        // $this->load->model('guru');
        // $data['guru'] = $this->guru->detail($id_guru);
        // $this->load->view('guru/header_guru', $data);
        // $this->load->view('guru/sidebar_guru');
        // $this->load->view('guru/topbar_guru', $data);
        // $this->load->view('guru/editdata_guru', $data);
        // $this->load->view('guru/footer_guru');
    }
}
