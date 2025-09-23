<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
        parent::__construct();

		$this->load->model('MeetingRoom_model');
        $this->load->library('form_validation');
	}

	public function index()
	{	
		$data['content'] = 'app/dashboard';
		$this->load->view('app/pages', $data);
	}

	public function tempahan($data=false)
	{
		$data['content']    = 'app/buat-tempahan';
		$data['add_script'] = 'global-js/calendar-script';
		$data['bilik_mesyuarat'] = $this->MeetingRoom_model->get_all();
		
		$this->load->view('app/pages', $data);
	}

	public function tempah($data=false)
	{
		$this->form_validation->set_rules([
            ['field' => 'tajuk', 'label' => 'Tajuk', 'rules' => 'required|min_length[3]'],
            ['field' => 'agenda', 'label' => 'Agenda', 'rules' => 'required'],
            ['field' => 'bilik', 'label' => 'Bilik Mesyuarat', 'rules' => 'required'],
            ['field' => 'tarikh_mula', 'label' => 'Tarikh Mula', 'rules' => 'required'],
            ['field' => 'tarikh_tamat', 'label' => 'Tarikh Tamat', 'rules' => 'required']
        ]);

		if ($this->form_validation->run() == FALSE) {
			echo json_encode([
				'status' => 'error',
				'errors' => $this->form_validation->error_array()
			]);
			return;
		} else {
			// $this->session->set_flashdata('success', 'Tempahan berjaya disimpan!');
			echo json_encode(['status' => 'success']);
		}
	}
}
