<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek_model extends CI_Model {

    public function get_all_merek() {
        return $this->db->get('merek')->result_array();
    }

    public function insert_merek($data) {
        $this->db->insert('merek', $data);
    }

    public function update_merek($id_merek, $data) {
        $this->db->where('id_merek', $id_merek);
        $this->db->update('merek', $data);
    }

    public function delete_merek($id_merek) {
        $this->db->where('id_merek', $id_merek);
        $this->db->delete('merek');
    }
    
}
