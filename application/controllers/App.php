<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
        parent::__construct();
	}

	public function index()
	{	
		$data['content'] = 'app/dashboard';

		$this->load->view('app/pages', $data);
	}

	public function buat_tempahan($data=false)
	{
		$data['content']    = 'app/buat-tempahan';
		$data['add_script'] = 'global-js/calendar-script';

		$data['bilik_mesyuarat'] = get_any_table_array(false, 'meeting_rooms');

		// echo "<pre>"; print_r($data['bilik_mesyuarat']); echo "</pre>";

		$this->load->view('app/pages', $data);
	}
}
