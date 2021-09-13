<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
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
        $data['judul'] = 'Data Users';
        $data['tittle'] = 'SDN MEKAR BAKTI 1';
        $data['setting'] = $this->peng_user->list();
        $this->load->view('templates_administrator/header_admin', $data);
        $this->load->view('templates_administrator/sidebar_admin');
        $this->load->view('templates_administrator/topbar_admin', $data);
        $this->load->view('administrator/setting', $data);
        $this->load->view('templates_administrator/footer_admin');
    }


    public function add()
    {
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[users.username]', [
            'is_unique' => 'Username Telah Terdaftar!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
            $data['judul'] = 'Data Users';
            $data['tittle'] = 'SDN MEKAR BAKTI 1';
            $data['setting'] = $this->peng_user->list();
            $this->load->view('templates_administrator/header_admin', $data);
            $this->load->view('templates_administrator/sidebar_admin');
            $this->load->view('templates_administrator/topbar_admin', $data);
            $this->load->view('administrator/setting', $data);
            $this->load->view('templates_administrator/footer_admin');
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $role_id = $this->input->post('role_id');

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'role_id' => $role_id

            );
            $this->peng_user->add($data);
            $this->session->set_flashdata('pesan_set', '<div class="alert alert-success alert-dismissible">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
            redirect('setting');
        }
    }
    public function edit($id)
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $role_id = $this->input->post('role_id');

        $data = array(
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'role_id' => $role_id

        );
        $this->peng_user->edit($data);
        $this->session->set_flashdata('pesan_set', '<div class="alert alert-success alert-dismissible">
        Data berhasil diubah!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('setting');
    }
    public function delete($id)
    {
        $data = array(
            'id' => $id,
        );
        $this->peng_user->delete($data);
        $this->session->set_flashdata('pesan_set', '<div class="alert alert-success alert-dismissible">
        Data berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>');
        redirect('setting');
    }
}
