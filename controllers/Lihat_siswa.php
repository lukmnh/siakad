<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lihat_siswa extends CI_Controller
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
        $data['judul'] = 'Siswa';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $data['siswa'] = $this->list2();
        $this->load->view('siswa/header_siswa', $data);
        $this->load->view('siswa/sidebar_siswa');
        $this->load->view('siswa/topbar_siswa', $data);
        $this->load->view('siswa/lihat_siswa', $data);
        $this->load->view('siswa/footer_siswa');
    }
    public function list2()
    {
        $this->db->where('siswa.username_users', $this->session->userdata('username'));
        return $this->db->get('siswa')->result();
    }
    public function edit($id_siswa)
    {
        $this->form_validation->set_rules('nomor_induk', 'Nomor_induk', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('jk', 'Jk', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required');
        // $this->form_validation->set_rules('img', 'Img', 'required');

        if ($this->form_validation->run() == false) {
            $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
            $data['judul'] = 'Edit Data siswa';
            $data['tittle'] = 'SDN MEKAR BAKTI 1';
            $this->load->model('lihat_data');
            $data['siswa'] = $this->lihat_data->lihat($id_siswa);

            $this->load->view('siswa/header_siswa', $data);
            $this->load->view('siswa/sidebar_siswa');
            $this->load->view('siswa/topbar_siswa', $data);
            $this->load->view('siswa/edit_Lsiswa', $data);
            $this->load->view('siswa/footer_siswa');
        } else {
            $data = array(
                'id_siswa' => $id_siswa,
                'nomor_induk' => $this->input->post('nomor_induk'),
                'nama' => $this->input->post('nama'),
                'agama' => $this->input->post('agama'),
                'jk' => $this->input->post('jk'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
            );
            $upload_image = $_FILES['img_siswa']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '10000';
                $config['upload_path'] = './img_siswa/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('img_siswa')) {
                    $old_image = $data['siswa']['img_siswa'];
                    if ($old_image != '') {
                        unlink(FCPATH . '/img_siswa/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img_siswa', $new_image);
                    $this->session->set_flashdata('surat_siswa', '<div class="alert alert-success alert-dismissible">
                    Data berhasil diubah!
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                  </div>');
                } else {
                    // echo $this->upload->display_errors();
                    $this->session->set_flashdata('surat_error', '<div class="alert alert-danger alert-dismissible">
                    Data file salah!
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                  </div>');
                    redirect('lihat_siswa/edit/' . $id_siswa);
                }
            }
            $this->lihat_data->update($data);
            $this->session->set_flashdata('surat_siswa', '<div class="alert alert-success alert-dismissible">
                    Data berhasil diubah!
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                  </div>');
            redirect('lihat_siswa');
        }
        // if ($this->form_validation->run() == TRUE) {
        //     $config['upload_path'] = './img_siswa/';
        //     $config['allowed_types']        = 'gif|jpg|png';
        //     $config['max_size']             = 10000;
        //     $this->load->library('upload', $config);
        //     $this->upload->initialize($config);

        //     if (!$this->upload->do_upload('img_siswa')) {
        //         $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        //         $data['judul'] = 'Edit Data siswa';
        //         $data['tittle'] = 'SDN MEKAR BAKTI 1';
        //         $this->load->model('lihat_data');
        //         $data['siswa'] = $this->lihat_data->lihat($id_siswa);

        //         $this->load->view('siswa/header_siswa', $data);
        //         $this->load->view('siswa/sidebar_siswa');
        //         $this->load->view('siswa/topbar_siswa', $data);
        //         $this->load->view('siswa/edit_Lsiswa', $data);
        //         $this->load->view('siswa/footer_siswa');
        //     } else {
        //         $upload_data = array('upload' => $this->upload->data());
        //         $config['image_library'] = 'gd2';
        //         $config['source_image'] = './img_siswa/' . $upload_data['upload']['file_name'];
        //         $this->load->library('image_lib', $config);
        //         // hapus foto lama
        //         $siswa = $this->lihat_data->lihat($id_siswa);
        //         if ($siswa->img_siswa != "") {
        //             unlink('./img_siswa/' . $siswa->img_siswa);
        //         }
        //         $data = array(
        //             'id_siswa' => $id_siswa,
        //             'nomor_induk' => $this->input->post('nomor_induk'),
        //             'nama' => $this->input->post('nama'),
        //             'agama' => $this->input->post('agama'),
        //             'jk' => $this->input->post('jk'),
        //             'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        //             'tempat_lahir' => $this->input->post('tempat_lahir'),
        //             'alamat' => $this->input->post('alamat'),
        //             'no_telp' => $this->input->post('no_telp'),
        //             'img_siswa' => $upload_data['upload']['file_name']
        //         );
        //         $this->lihat_data->update($data);
        //         $this->session->set_flashdata('surat_siswa', '<div class="alert alert-success alert-dismissible">
        //         Data berhasil diubah!
        //         <button type="button" class="close" data-dismiss="alert">&times;</button>
        //       </div>');
        //         redirect('lihat_siswa');
        //     }
        //     $upload_data = array('upload' => $this->upload->data());
        //     $config['image_library'] = 'gd2';
        //     $config['source_image'] = './img_siswa/' . $upload_data['upload']['file_name'];
        //     $this->load->library('image_lib', $config);

        //     $data = array(
        //         'id_siswa' => $id_siswa,
        //         'nomor_induk' => $this->input->post('nomor_induk'),
        //         'nama' => $this->input->post('nama'),
        //         'agama' => $this->input->post('agama'),
        //         'jk' => $this->input->post('jk'),
        //         'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        //         'tempat_lahir' => $this->input->post('tempat_lahir'),
        //         'alamat' => $this->input->post('alamat'),
        //         'no_telp' => $this->input->post('no_telp'),
        //     );
        //     $this->lihat_data->update($data);
        //     $this->session->set_flashdata('surat_siswa', '<div class="alert alert-success alert-dismissible">
        //     Data berhasil diubah!
        //     <button type="button" class="close" data-dismiss="alert">&times;</button>
        //   </div>');
        //     redirect('lihat_siswa');
        // }
        // $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        // $data['judul'] = 'Edit Data Siswa';
        // $data['tittle'] = 'SDN MEKAR BAKTI 1';
        // $this->load->model('lihat_data');
        // $data['siswa'] = $this->lihat_data->lihat($id_siswa);
        // $this->load->view('siswa/header_siswa', $data);
        // $this->load->view('siswa/sidebar_siswa');
        // $this->load->view('siswa/topbar_siswa', $data);
        // $this->load->view('siswa/edit_Lsiswa', $data);
        // $this->load->view('siswa/footer_siswa');
    }
}
