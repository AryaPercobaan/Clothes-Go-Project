<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Admin_model');
		$this->load->model('Shift_model');
	}
	function index()
	{
		$data['judul'] = "Admin List Page";
		$data['admin'] = $this->Admin_model->get();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view("layout/header", $data);
		$this->load->view("admin/vw_admin", $data);
		$this->load->view("layout/footer");
	}
	function edit($id)
	{
		$data['judul'] = "Halaman Edit Admin";
		$data['admin'] = $this->Admin_model->getById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['shift'] = $this->Shift_model->get();
		$this->form_validation->set_rules('nama', 'Nama Admin', 'required', [
			'required' => 'Nama Admin Wajib di isi'
		]);
		
		$this->form_validation->set_rules('posisi', 'Posisi', 'required', [
			'required' => 'Posisi Wajib di isi'
		]);
		$this->form_validation->set_rules('shift', 'Shift', 'required', [
			'required' => 'Shift Wajib di isi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required', [
			'required' => 'Email Wajib di isi'
		]);
		
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("admin/vw_ubah_admin", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'posisi' => $this->input->post('posisi'),
				'shift' => $this->input->post('shift'),
				'email' => $this->input->post('email'),
			];
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/admin/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {

					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
					$query = $this->db->set('gambar', $new_image);
					if ($query) {
						$old_image = $this->db->get_where('admin', ['id' => $id])->row();
						unlink(FCPATH . 'assets/img/admin/' . $old_image->gambar);
					}
				} else {
					echo $this->upload->display_errors();
				}
			}
			$id = $this->input->post('id');
			$this->Admin_model->update(['id' => $id], $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Admin Berhasil Diubah!</div>');
			redirect('Admin');
		}
	}
	function tambah()
	{
		$data['judul'] = "Halaman Tambah Admin";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['shift'] = $this->Shift_model->get();
		$this->form_validation->set_rules('nama', 'Nama Admin', 'required', [
			'required' => 'Nama Admin Wajib di isi'
		]);
		$this->form_validation->set_rules('posisi', 'Posisi', 'required', [
			'required' => 'Posisi Wajib di isi'
		]);
		$this->form_validation->set_rules('shift', 'Shift', 'required', [
			'required' => 'Shift Wajib di isi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required', [
			'required' => 'Email Wajib di isi'
		]);
		
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("admin/vw_tambah_admin", $data);
			$this->load->view("layout/footer");
		} else {

			$data = [
				'nama' => $this->input->post('nama'),
				'posisi' => $this->input->post('posisi'),
				'shift' => $this->input->post('shift'),
				'email' => $this->input->post('email'),
			
			];
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/admin/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->Admin_model->insert($data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Admin Berhasil Ditambah!</div>');
			redirect('Admin');
		}
	}


	public function hapus($id)
	{
		$this->Admin_model->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Admin tidak dapat dihapus (sudah berelasi)!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Admin Berhasil Dihapus!</div>');
		}
		redirect('Admin');
	}
}
