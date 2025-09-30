<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		$this->load->model('Auth_model', 'dbAuth');
	}

	public function login()
	{
		$post = $this->input->post();
		$loginProcess = $this->dbAuth->loginProcess($post);

		if($loginProcess['result'] == true){
			# Redirect to dashboard or home page after successful login
			echo json_encode([
				'result'   => true,
				'redirect' => base_url('app')
			]);
		} else {
			# Return error message for failed login
			echo json_encode([
				'result'  => false,
				'message' => $loginProcess['message']
			]);
		}
	}

	public function register()
	{
		$post = $this->input->post();

		# Simulate registration logic here (e.g., save to database)
		$registerProcess = $this->dbAuth->registerProcess($post);

		echo json_encode([
			'result'  => $registerProcess['result'],
			'message' => $registerProcess['message']
		]);
	}

	public function logout()
	{
		// Destroy session data
		$this->session->sess_destroy();
		redirect(); // Redirect to login page or home page
	}
}
