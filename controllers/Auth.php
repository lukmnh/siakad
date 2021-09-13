<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'SDN MEKAR BAKTI 1 - Login Page';
            $this->load->view('templates_administrator/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates_administrator/auth_footer');
        } else {
            $username = $this->input->post('username');
            $password = MD5($this->input->post('password'));

            $cek = $this->login_model->cek_login($username, $password);
            if ($cek->num_rows() > 0) {
                foreach ($cek->result() as $ck) {
                    $sess_data['id_users'] = $ck->id;
                    $sess_data['username'] = $ck->username;
                    $sess_data['password'] = $ck->password;
                    $sess_data['role_id'] = $ck->role_id;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['role_id'] == '1') {
                    redirect('Admin');
                } else if ($sess_data['role_id'] == '2') {
                    redirect('H_siswa');
                } else {
                    redirect('H_guru');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
                Maaf username atau password salah!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
                Anda Telah Logout!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>');
        redirect('auth');
    }
}
