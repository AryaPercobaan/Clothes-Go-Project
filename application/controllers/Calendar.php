<?php


class Calendar extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
	}

	public function show($years = null, $month = null)
	{
		$prefs = array(
			'show_next_prev'  => TRUE,
			'next_prev_url'   => base_url() . 'calendar/show/'
		);
		$this->load->library('calendar', $prefs);
		echo $this->calendar->generate($years, $month);
	}
}
