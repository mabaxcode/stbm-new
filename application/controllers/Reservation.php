<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
			redirect();
		}
        $this->load->model('MeetingRoom_model');
    }

    public function get_events() {
        $events = $this->MeetingRoom_model->get_events();
        echo json_encode($events);
    }
    
    public function reservation_detail() {
        $post = $this->input->post();
        $reservation = $this->MeetingRoom_model->get_reservation_detail($post);

        if ($reservation) {
            $html = $this->load->view('app/component/reservation-detail-modal', ['reservation' => $reservation], true);
            echo json_encode([
                "success" => true,
                "content" => $html
            ]);
        } else {
            echo json_encode([
                "success" => false
            ]);
        }
    }

    public function delete_reservation() {
        $post = $this->input->post();
        $delete = $this->MeetingRoom_model->delete_reservation($post);

        if ($delete) {
            echo json_encode([
                "success" => true,
                "message" => "Tempahan berjaya dibatalkan."
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Gagal membatalkan tempahan. Sila cuba lagi."
            ]);
        }
    }
}
