<?php
class MeetingRoom_model extends CI_Model {
    public function get_all() {
        return $this->db->get('meeting_rooms')->result_array();
    }
}
?>