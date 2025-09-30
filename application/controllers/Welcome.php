<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{	
		if ($this->session->userdata('user_id')) {
            redirect('app'); // or any page you want
        }
		$this->load->view('login-pages');
	}
}
