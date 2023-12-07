<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Baju extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Baju_model');
		$this->load->model('Admin_model');
	}
	function index()
	{
		$data['judul'] = "Baju Page";
		$data['baju'] = $this->Baju_model->get();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view("layout/header", $data);
		$this->load->view("baju/vw_baju", $data);
		$this->load->view("layout/footer");
	}
	function edit($id)
	{
		$data['judul'] = "Halaman Edit Baju";
		$data['baju'] = $this->Baju_model->getById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['admin'] = $this->Admin_model->get();
		$this->form_validation->set_rules('nama', 'Nama Baju', 'required', [
			'required' => 'Nama Baju Wajib di isi'
		]);
		$this->form_validation->set_rules('admin', 'Admin', 'required', [
			'required' => 'Admin Wajib di isi'
		]);
		$this->form_validation->set_rules('stok', 'Stok', 'required', [
			'required' => 'Stok Wajib di isi'
		]);
		$this->form_validation->set_rules('harga', 'Prodi', 'required', [
			'required' => 'Prodi Wajib di isi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("baju/vw_ubah_baju", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'admin' => $this->input->post('admin'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),

			];
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/baju/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {

					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
					$query = $this->db->set('gambar', $new_image);
					if ($query) {
						$old_image = $this->db->get_where('baju', ['id' => $id])->row();
						unlink(FCPATH . 'assets/img/baju/' . $old_image->gambar);
					}
				} else {
					echo $this->upload->display_errors();
				}
			}
			$id = $this->input->post('id');
			$this->Baju_model->update(['id' => $id], $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baju Berhasil Diubah!</div>');
			redirect('Baju');
		}
	}
	function tambah()
	{
		$data['judul'] = "Halaman Tambah Baju";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['admin'] = $this->Admin_model->get();
		$this->form_validation->set_rules('nama', 'Nama Baju', 'required', [
			'required' => 'Nama Baju Wajib di isi'
		]);
		$this->form_validation->set_rules('admin', 'Admin', 'required', [
			'required' => 'Admin Wajib di isi'
		]);
		$this->form_validation->set_rules('stok', 'Stok', 'required', [
			'required' => 'Stok Wajib di isi'
		]);
		$this->form_validation->set_rules('harga', 'Prodi', 'required', [
			'required' => 'Prodi Wajib di isi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("baju/vw_tambah_baju", $data);
			$this->load->view("layout/footer");
		} else {

			$data = [
				'nama' => $this->input->post('nama'),
				'admin' => $this->input->post('admin'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),

			];
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/baju/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->Baju_model->insert($data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baju Berhasil Ditambah!</div>');
			redirect('Baju');
		}
	}


	public function hapus($id)
	{
		$this->Baju_model->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Baju tidak dapat dihapus (sudah berelasi)!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Baju Berhasil Dihapus!</div>');
		}
		redirect('Baju');
	}
}
