<?php
defined('BASEPATH') or exit('No direct script access allowed');

class data_siswa extends CI_Controller
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
        $data['judul'] = 'Biodata Siswa';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $data['siswa'] = $this->siswa->d_siswa();
        $this->load->view('templates_administrator/header_admin', $data);
        $this->load->view('templates_administrator/sidebar_admin');
        $this->load->view('templates_administrator/topbar_admin', $data);
        $this->load->view('administrator/bio_siswa', $data);
        $this->load->view('templates_administrator/footer_admin');
    }
    public function add()
    {
        $this->form_validation->set_rules('nomor_induk', 'Nomor_induk', 'required');
        $this->form_validation->set_rules('username_users', 'Username_users', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('jk', 'Jk', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required');
        // $this->form_validation->set_rules('img', 'Img', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './img_siswa/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('img_siswa')) {
                $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
                $data['judul'] = 'Tambah Data Siswa';
                $data['tittle'] = 'SDN MEKAR BAKTI 1';
                $data['error'] = $this->upload->display_errors();
                // $this->load->view('templates_administrator/header_admin', $data);
                // $this->load->view('templates_administrator/sidebar_admin');
                // $this->load->view('templates_administrator/topbar_admin', $data);
                // $this->load->view('administrator/add_siswa', $data);
                // $this->load->view('templates_administrator/footer_admin');
            } else {
                $upload_data = array('upload' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './img_siswa/' . $upload_data['upload']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nomor_induk' => $this->input->post('nomor_induk'),
                    'username_users' => $this->input->post('username_users'),
                    'nama' => $this->input->post('nama'),
                    'agama' => $this->input->post('agama'),
                    'jk' => $this->input->post('jk'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp'),
                    'img_siswa' => $upload_data['upload']['file_name']
                );
                $this->siswa->add($data);
                $this->session->set_flashdata('surat_siswa', '<div class="alert alert-success alert-dismissible">
                Data berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>');
                redirect('data_siswa');
            }
        }
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Tambah Data Siswa';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $this->load->view('templates_administrator/header_admin', $data);
        $this->load->view('templates_administrator/sidebar_admin');
        $this->load->view('templates_administrator/topbar_admin', $data);
        $this->load->view('administrator/add_siswa', $data);
        $this->load->view('templates_administrator/footer_admin');
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
            $data['siswa'] = $this->siswa->detail($id_siswa);
            $this->load->view('templates_administrator/header_admin', $data);
            $this->load->view('templates_administrator/sidebar_admin');
            $this->load->view('templates_administrator/topbar_admin', $data);
            $this->load->view('administrator/edit_siswa', $data);
            $this->load->view('templates_administrator/footer_admin');
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
                    redirect('data_siswa/edit/' . $id_siswa);
                }
            }
            $this->siswa->edit($data);
            $this->session->set_flashdata('surat_siswa', '<div class="alert alert-success alert-dismissible">
                    Data berhasil diubah!
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                  </div>');
            redirect('data_siswa');
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
            //         $data['siswa'] = $this->siswa->detail($id_siswa);
            //         $data['error'] = $this->upload->display_errors();
            //         redirect('data_siswa/edit/' . $id_siswa);
            //         // redirect(base_url() . 'data_siswa/edit/');
            //         // $this->load->view('templates_administrator/header_admin', $data);
            //         // $this->load->view('templates_administrator/sidebar_admin');
            //         // $this->load->view('templates_administrator/topbar_admin', $data);
            //         // $this->load->view('administrator/edit_siswa', $data);
            //         // $this->load->view('templates_administrator/footer_admin');
            //     } else {
            //         $upload_data = array('upload' => $this->upload->data());
            //         $config['image_library'] = 'gd2';
            //         $config['source_image'] = './img_siswa/' . $upload_data['upload']['file_name'];
            //         $this->load->library('image_lib', $config);
            //         // hapus foto lama
            //         $siswa = $this->siswa->detail($id_siswa);
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
            //         $this->siswa->edit($data);
            //         $this->session->set_flashdata('surat_siswa', '<div class="alert alert-success alert-dismissible">
            //         Data berhasil diubah!
            //         <button type="button" class="close" data-dismiss="alert">&times;</button>
            //       </div>');
            //         redirect('data_siswa');
            //     }
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
            //     $this->siswa->edit($data);
            //     $this->session->set_flashdata('surat_siswa', '<div class="alert alert-success alert-dismissible">
            //     Data berhasil diubah!
            //     <button type="button" class="close" data-dismiss="alert">&times;</button>
            //   </div>');
            //     redirect('data_siswa');
            // }
            // $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
            // $data['judul'] = 'Edit Data Siswa';
            // $data['tittle'] = 'SDN MEKAR BAKTI 1';
            // $data['siswa'] = $this->siswa->detail($id_siswa);
            // $this->load->view('templates_administrator/header_admin', $data);
            // $this->load->view('templates_administrator/sidebar_admin');
            // $this->load->view('templates_administrator/topbar_admin', $data);
            // $this->load->view('administrator/edit_siswa', $data);
            // $this->load->view('templates_administrator/footer_admin');
        }
    }
    public function delete($id_siswa)
    {
        $siswa = $this->siswa->detail($id_siswa);
        if ($siswa->img_siswa != "") {
            unlink('./img_siswa/' . $siswa->img_siswa);
        }
        $data = array('id_siswa' => $id_siswa);
        $this->siswa->delete($data);
        $this->session->set_flashdata('surat_siswa', '<div class="alert alert-success alert-dismissible">
        Data berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('data_siswa');
    }
}
