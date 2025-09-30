<?php
class Auth_model extends CI_Model {

    public function registerProcess($post) {

        // Check if email already exists in the database
        $this->db->where('email', $post['email']);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return ['result' => false, 'message' => 'Email sudah digunakan.'];
        }else{
            // Insert new user into the database
            $data = [
                'name' => $post['name'],
                'email' => $post['email'],
                'password' => password_hash($post['password'], PASSWORD_BCRYPT)
            ];
            $this->db->insert('users', $data);
            return ['result' => true, 'message' => 'Pendaftaran berjaya. Sila log masuk.'];
        }
    }

    public function loginProcess($post) {

        // Fetch user by email
        $this->db->where('email', $post['email']);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {

            $user = $query->row();

            // Verify password
            if (password_verify($post['password'], $user->password)) {

                // Set session data
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_name', $user->name);
                $this->session->set_userdata('user_email', $user->email);
                $this->session->set_userdata('user_role', $user->role);

                return ['result' => true, 'message' => 'success'];

            } else {
                return ['result' => false, 'message' => 'Kata laluan salah.'];
            }

        } else {
            return ['result' => false, 'message' => 'Email tidak dijumpai.'];
        }

    }
}
?>