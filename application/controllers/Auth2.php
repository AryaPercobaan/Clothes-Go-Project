<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth2 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$this->load->view("layout/auth_header");
		$this->load->view("auth/login2");
		$this->load->view("layout/auth_footer");
	}
}
