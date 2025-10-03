<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
        parent::__construct();

		$this->load->model('MeetingRoom_model');
        $this->load->library('form_validation');
		// Check if user is logged in
		if (!$this->session->userdata('user_id')) {
			redirect();
		}
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

	public function profile() {
		$data['content']    = 'app/profile';
		$data['user'] = $this->MeetingRoom_model->get_user_booking($this->session->userdata('user_id'));
		$data['user_info'] = $this->MeetingRoom_model->get_user_info($this->session->userdata('user_id'));

		$this->load->view('app/pages', $data);
	}

	public function kemaskini_profile()
	{
		$data['content']    = 'app/kemaskini-profile';
		$data['user'] = $this->MeetingRoom_model->get_user_booking($this->session->userdata('user_id'));
		$data['user_info'] = $this->MeetingRoom_model->get_user_info($this->session->userdata('user_id'));

		$this->load->view('app/pages', $data);
	}

	public function kemaskini_profile_proses()
	{
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>";

		$update = $this->MeetingRoom_model->update_profile($post);
		echo json_encode([
			'status' => true,
			'message' => 'Maklumat profile berjaya dikemaskini.'
		]);
		return;
	}

	public function update_password()
	{
		$post = $this->input->post();
		// echo "<pre>"; print_r($post); echo "</pre>";exit;

		$update = $this->MeetingRoom_model->update_password($post);
		echo json_encode([
			'status' => $update['status'],
			'message' => $update['message']
		]);
		return;
	}

	public function mybooking($data=false)
	{
		$data['content']      = 'app/tempahan-saya';
		$data['reservations'] = $this->MeetingRoom_model->get_my_reservations($this->session->userdata('user_id'));
		$this->load->view('app/pages', $data);
	}

	public function tempah($data=false)
	{	
		$post = $this->input->post();
		

		// Set validation rules
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
			$post = $this->input->post();
			// check for overlapping bookings
			$overlap = $this->MeetingRoom_model->check_overlap($post['bilik'], $post['tarikh_mula'], $post['tarikh_tamat']);
			if ($overlap) {
				echo json_encode([
					'status' => 'overlap',
					'message' => 'Tempahan bertindih dengan tempahan sedia ada.'
				]);
				return;
			}
			$this->MeetingRoom_model->insert($post);
			echo json_encode(['status' => 'success']);
			// $this->session->set_flashdata('success', 'Tempahan berjaya disimpan!');
			// echo json_encode(['status' => 'success']);
		}
	}

	public function proses($safe_id)
	{
		$encrypted_id = base64_decode(urldecode($safe_id));
		$id = $this->encryption->decrypt($encrypted_id);

		if ($id === false) {
			show_error("Invalid ID");
		}

		// Now $id is your original reservation id
		$reservation = $this->MeetingRoom_model->get_by_id($id);
		if (!$reservation) {
			show_404();
		}

		// continue...
		$data['content']      = 'app/proses-permohonan';
		$data['reservation']  = $reservation;

		switch ($reservation['status']) {
			case 'Dalam Proses':
				$data['back_url'] = 'app/permohonan'; 
				$data['proses']   = true;
				break;
			case 'Lulus':
				$data['back_url'] = 'app/permohonan_lulus'; 
				$data['proses']   = false;
				break;
			case 'Batal':
				$data['back_url'] = 'app/permohonan_batal'; 
				$data['proses']   = false;
				break;
			
			default:
				break;
		}

		$data['user'] = $this->MeetingRoom_model->get_user_booking($reservation['user_id']);
		$data['department'] = $this->MeetingRoom_model->get_user_info($reservation['user_id']);

		$this->load->view('app/pages', $data);
	}

	public function process_booking()
	{
		$post = $this->input->post();

		$id = $post['process_id'] ?? null;
		$keputusan = $post['keputusan_permohonan'] ?? null;

		if (empty($id) || empty($keputusan)) {
			echo json_encode([
				"success" => false,
				"message" => "Data tidak lengkap."
			]);
			return;
		}

		// Call model update
		$update = $this->MeetingRoom_model->update_booking_status($id, $keputusan);

		if ($update) {
			echo json_encode([
				"success" => true,
				"message" => "Permohonan berjaya diproses!"
			]);
		} else {
			echo json_encode([
				"success" => false,
				"message" => "Gagal memproses permohonan."
			]);
		}
	}

	public function permohonan()
	{
		$data['content']      = 'app/permohonan';
		$data['reservations'] = $this->MeetingRoom_model->get_reservation_list('Dalam Proses');
		$data['breadcrumb'] = "Proses Permohonan";
		$data['btn_name'] = "Proses Permohonan";
		$data['proses'] = true;
		$data['back_url'] = "permohonan";

		// echo "<pre>"; print_r($data['reservations']); echo "</pre>"; exit;
		$this->load->view('app/pages', $data);
	}

	public function permohonan_lulus()
	{
		$data['content']      = 'app/permohonan';
		$data['reservations'] = $this->MeetingRoom_model->get_reservation_list('Lulus');
		$data['breadcrumb'] = "Permohonan Lulus";
		$data['btn_name'] = "Lihat Butiran";
		$data['proses'] = false;
		$data['back_url'] = "permohonan_lulus";

		// echo "<pre>"; print_r($data['reservations']); echo "</pre>"; exit;
		$this->load->view('app/pages', $data);
	}

	public function permohonan_batal()
	{
		$data['content']      = 'app/permohonan';
		$data['reservations'] = $this->MeetingRoom_model->get_reservation_list('Batal');
		$data['breadcrumb'] = "Permohonan Batal";
		$data['btn_name'] = "Lihat Butiran";
		$data['proses'] = false;
		$data['back_url'] = "permohonan_batal";

		// echo "<pre>"; print_r($data['reservations']); echo "</pre>"; exit;
		$this->load->view('app/pages', $data);
	}

	public function bilik_mesyuarat()
	{
		$data['content']    = 'app/bilik-mesyuarat';
		// $data['add_script'] = 'global-js/calendar-script';
		$data['bilik_mesyuarat'] = $this->MeetingRoom_model->get_all();
		
		$this->load->view('app/pages', $data);
	}

}
