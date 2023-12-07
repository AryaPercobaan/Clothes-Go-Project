<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Shift extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Shift_model');
		
	}
	function index()
	{
		$data['judul'] = "Shift Page";
		$data['shift'] = $this->Shift_model->get();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view("layout/header", $data);
		$this->load->view("shift/vw_shift", $data);
		$this->load->view("layout/footer");
	}
	function edit($id)
	{
		$data['judul'] = "Halaman Edit Shift";
		$data['shift'] = $this->Shift_model->getById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('type', 'Type', 'required', [
			'required' => 'Shift Type Wajib di isi'
		]);
		$this->form_validation->set_rules('salary', 'Salary', 'required', [
			'required' => 'Salary Wajib di isi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			$this->load->view("shift/vw_ubah_shift", $data);
			$this->load->view("layout/footer");
		} else {
			$data = [
				'type' => $this->input->post('type'),
				'salary' => $this->input->post('salary'),

			];
			$id = $this->input->post('id');
			$this->Shift_model->update(['id' => $id], $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Shift Berhasil Diubah!</div>');
			redirect('Shift');
		}
	}
	
	public function hapus($id)
	{
		$this->Shift_model->delete($id);
		$error = $this->db->error();
		if ($error['code'] != 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Baju tidak dapat dihapus (sudah berelasi)!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-check-circle"></i>Data Baju Berhasil Dihapus!</div>');
		}
		redirect('Shift');
	}
}
