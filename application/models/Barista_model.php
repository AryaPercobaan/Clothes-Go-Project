<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barista_model extends CI_Model
{
	public $table = 'barista';
	public $id = 'barista.id';
	public function __construct()
	{
		parent::__construct();
	}
	public function get()
	{
		$this->db->select('b.*,s.type as shift');
		$this->db->from('barista b');
		$this->db->join('shift s', 'b.shift = s.id');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getById($id)
	{
		$this->db->select('b.*,s.type as sh');
		$this->db->from('barista b');
		$this->db->join('shift s', 'b.shift = s.id');
		$this->db->where('b.id', $id);
		$query = $this->db->get();
		return $query->row_array();
		
	}
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
}
