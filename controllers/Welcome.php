<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
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
			$data['guru'] = $this->guru->detail($id_guru);
			$this->load->view('templates_administrator/header_admin', $data);
			$this->load->view('templates_administrator/sidebar_admin');
			$this->load->view('templates_administrator/topbar_admin', $data);
			$this->load->view('administrator/edit_guru', $data);
			$this->load->view('templates_administrator/footer_admin');
		} else {

			$config['upload_path'] = './img/';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = 10000;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('img')) {
				$data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
				$data['judul'] = 'Edit Data Guru';
				$data['tittle'] = 'SDN MEKAR BAKTI 1';
				$data['guru'] = $this->guru->detail($id_guru);
				$data['error'] = $this->upload->display_errors();
				// $this->load->view('templates_administrator/header_admin', $data);
				// $this->load->view('templates_administrator/sidebar_admin');
				// $this->load->view('templates_administrator/topbar_admin', $data);
				// $this->load->view('administrator/edit_guru', $data);
				// $this->load->view('templates_administrator/footer_admin');
			} else {
				$upload_data = array('upload' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './img/' . $upload_data['upload']['file_name'];
				$this->load->library('image_lib', $config);
				// hapus foto lama
				$guru = $this->guru->detail($id_guru);
				if ($guru->img != "") {
					unlink('./img/' . $guru->img);
				}
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
					'img' => $upload_data['upload']['file_name']
				);
				$this->guru->edit($data);
				$this->session->set_flashdata('surat', '<div class="alert alert-success alert-dismissible">
                Data berhasil diubah!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>');
				redirect('data_guru');
			}
			// $upload_data = array('upload' => $this->upload->data());
			// $config['image_library'] = 'gd2';
			// $config['source_image'] = './img/' . $upload_data['upload']['file_name'];
			// $this->load->library('image_lib', $config);

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
			$this->guru->edit($data);
			$this->session->set_flashdata('surat', '<div class="alert alert-success alert-dismissible">
                Data berhasil diubah!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>');
			redirect('data_guru');
		}
	}
}
