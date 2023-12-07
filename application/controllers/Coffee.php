<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Coffee extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Coffee_model');
		$this->load->model('Barista_model');
	}
	function index()
	{
		$data['judul'] = "Clothes Page";
		$data['coffee'] = $this->Coffee_model->get();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view("layout/header", $data);
		$this->load->view("coffee/vw_coffee", $data);
		$this->load->view("layout/footer");
	}
	function edit($id)
	{
		$data['judul'] = "Halaman Edit Baju";
		$data['coffee'] = $this->Coffee_model->getById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['barista'] = $this->Barista_model->get();
		$this->form_validation->set_rules('nama', 'Nama Baju', 'required', [
			'required' => 'Nama Baju Wajib di isi'
		]);
		$this->form_validation->set_rules('barista', 'Admin', 'required', [
			'required' => 'Admin Wajib di isi'
		]);
		$this->form_validation->set_rules('stok', 'Stok', 'required', [
			'required' => 'Stok Wajib di isi'
		]);
		$this->form_validation->set_rules('harga', 'Prodi', 'required', [
			'required' => 'Harga Wajib di isi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("coffee/vw_ubah_coffee", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'barista' => $this->input->post('barista'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),

			];
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/coffee/';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {

					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
					$query = $this->db->set('gambar', $new_image);
					if ($query) {
						$old_image = $this->db->get_where('coffee', ['id' => $id])->row();
						unlink(FCPATH . 'assets/img/coffee/' . $old_image->gambar);
					}
				} else {
					echo $this->upload->display_errors();
				}
			}
			$id = $this->input->post('id');
			$this->Coffee_model->update(['id' => $id], $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baju Berhasil Diubah!</div>');
			redirect('Coffee');
		}
	}
	function tambah()
	{
		$data['judul'] = "Halaman Tambah Baju";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['barista'] = $this->Barista_model->get();
		$this->form_validation->set_rules('nama', 'Nama Baju', 'required', [
			'required' => 'Nama Baju Wajib di isi'
		]);
		$this->form_validation->set_rules('barista', 'Admin', 'required', [
			'required' => 'Admin Wajib di isi'
		]);
		$this->form_validation->set_rules('stok', 'Stok', 'required', [
			'required' => 'Stok Wajib di isi'
		]);
		$this->form_validation->set_rules('harga', 'Prodi', 'required', [
			'required' => 'Harga Wajib di isi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("coffee/vw_tambah_coffee", $data);
			$this->load->view("layout/footer");
		} else {

			$data = [
				'nama' => $this->input->post('nama'),
				'barista' => $this->input->post('barista'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),

			];
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/coffee/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->Coffee_model->insert($data, $upload_image);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baju Berhasil Ditambah!</div>');
			redirect('Coffee');
		}
	}


	public function hapus($id)
	{
		$this->Coffee_model->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Baju tidak dapat dihapus (sudah berelasi)!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Baju Berhasil Dihapus!</div>');
		}
		redirect('Coffee');
	}
}
