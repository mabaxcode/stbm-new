<?php
class MeetingRoom_model extends CI_Model {
    public function get_all() {
            return $this->db
                ->where('status', '1')
                ->get('meeting_rooms')
                ->result_array();
        }


    public function check_overlap($room_id, $start_time, $end_time) {
        $this->db->where('meeting_room_id', $room_id);
        $this->db->where('start_time <', $end_time);
        $this->db->where('end_time >', $start_time);
        $query = $this->db->get('reservations');
        return $query->num_rows() > 0;
    }

    public function insert($data) {
        // echo "<pre>"; print_r($data); echo "</pre>"; exit;
        $data = [
            'user_id'           => $this->session->userdata('user_id'),
            'title'             => $data['tajuk'],
            'purpose'           => $data['agenda'],
            'meeting_room_id'   => $data['bilik'],
            'start_time'        => $data['tarikh_mula'],
            'end_time'          => $data['tarikh_tamat'],
            'remark'            => $data['catatan'],
            'created_at'        => date('Y-m-d H:i:s'),
            'status'            => 'Dalam Proses',
        ];
        $this->db->insert('reservations', $data);
        // echo $this->db->last_query(); exit;
        return $this->db->insert_id();
    }

    public function get_events() {
        $query = $this->db->get('reservations');
        $events = [];

        foreach ($query->result() as $row) {
            $room_name = $this->db->get_where('meeting_rooms', ['id' => $row->meeting_room_id])->row()->name;
            $events[] = [
                'id'        => $row->id,
                'title'     => $room_name . "-" . strtoupper($row->title), 
                'start'     => date('Y-m-d', strtotime($row->start_time)),
                'end'       => date('Y-m-d', strtotime($row->end_time)),  
                'room_name' => $room_name,
                'agenda'    => $row->purpose,
                'start_time'=> $row->start_time,
                'end_time'  => $row->end_time,
                'status'    => $row->status,
            ];
        }

        return $events;
    }

    public function get_my_reservations($user_id) {
        // $this->db->where('user_id', $user_id);
        // $this->db->order_by('start_time', 'DESC');
        // return $this->db->get('reservations')->result_array();
        // $this->db->select('r.*, m.name AS room_name, s.name AS status_name');
        $this->db->select('r.*, m.name AS room_name');
        $this->db->from('reservations r');
        $this->db->join('meeting_rooms m', 'm.id = r.meeting_room_id', 'left');
        // $this->db->join('status_ref s', 's.code = r.status', 'left');
        $this->db->where('r.user_id', $user_id);
        $this->db->order_by('r.start_time', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_reservation_detail($post) {
        $this->db->select('r.*, m.name AS room_name, u.name AS user_name, u.email AS user_email');
        $this->db->from('reservations r');
        $this->db->join('meeting_rooms m', 'm.id = r.meeting_room_id', 'left');
        $this->db->join('users u', 'u.id = r.user_id', 'left');
        $this->db->where('r.id', $post['id']);
        return $this->db->get()->row_array();
    }
    
    public function delete_reservation($post) {
        $this->db->where('id', $post['id']);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('status', 'Dalam Proses'); // only allow deletion if status is 'Dalam Proses'
        $this->db->delete('reservations');
        return $this->db->affected_rows() > 0;
    }

    public function get_reservation_list($status) {
        $this->db->select('r.*, m.name AS room_name');
        $this->db->from('reservations r');
        $this->db->join('meeting_rooms m', 'm.id = r.meeting_room_id', 'left');
        $this->db->where('r.status', $status);
        $this->db->order_by('r.start_time', 'DESC');
        return $this->db->get()->result_array();
    }
    
    public function get_by_id($id) {
        $this->db->select('r.*, m.name AS room_name, u.name AS user_name, u.email AS user_email');
        $this->db->from('reservations r');
        $this->db->join('meeting_rooms m', 'm.id = r.meeting_room_id', 'left');
        $this->db->join('users u', 'u.id = r.user_id', 'left');
        $this->db->where('r.id', $id);
        return $this->db->get()->row_array();
    }

    public function update_booking_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('reservations', [
            'status'     => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function get_user_booking($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    public function get_user_info($user_id) {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row_array();
    }

    public function update_profile($data)
    {

        // echo "<pre>"; print_r($data); echo "</pre>";exit;
        $this->db->where('id', $data['user_id']);
        $this->db->update('users', [
            'name'     => $data['name'],
            'email' => $data['email'],
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $this->db->where('user_id', $data['user_id']);
        $this->db->update('user_info', [
            'department_name'     => $data['department_name'],
            'designation' => $data['designation'],
            'phone_no' => $data['phone_no'],
        ]);
    }

    public function update_password($post)
    {
        # check current password
        $hashedPassword = password_hash($post['new_password'], PASSWORD_BCRYPT);

        $query = $this->db->get_where('users', ['id' => $post['user_id']]);
        $user = $query->row();

        if (!$user) {
            return ['status' => false, 'message' => 'User not found.'];
        }

        if (!password_verify($post['current_password'], $user->password)) {
            return ['status' => false, 'message' => 'Kata laluan sekarang tidak tepat.'];
        }

        $this->db->where('id', $post['user_id']);
        $this->db->update('users', ['password' => $hashedPassword]);

        return ['status' => true, 'message' => 'Kata laluan anda berjaya dikemaskini.'];
        
    }

}
?>