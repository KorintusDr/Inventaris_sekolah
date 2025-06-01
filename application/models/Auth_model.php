<?php
class Auth_model extends CI_Model {

    public function get_user($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        return $query->row(); 
    }

    public function get_user_by_id($id_user) {
        $query = $this->db->get_where('user', ['id_user' => $id_user]);
        return $query->row();
    }

    public function update_user($id_user, $data) {
        $this->db->where('id_user', $id_user);
        return $this->db->update('user', $data);
    }
}
