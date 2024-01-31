<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Userakun_model extends CI_Model {

    public function get_all_user() {
        $q = $this->db->select('* FROM user_akun WHERE status_aktif = 1', false)->get();
        return $q;
    }
    public function get_user_by_id($id) {
        $q = $this->db->get_where('user_akun', array('id' => $id));
        return $q;
    }
    public function check_if_user_exist($username, $id = null) {
        $q = $this->db->get_where('user_akun', array('id !=' => $id, 'username' => $username));
        return $q;
    }

    public function edit($data, $id) {
        $q = $this->db->update('user_akun', $data, array('id' => $id));
        return $q;
    }

    public function tambah($data) {
        $q = $this->db->insert('user_akun', $data);
        return $q;
    }

    public function hapus($id = 0) {
        $q = $this->db->update('user_akun', array('status_aktif' => 2), array('id' => $id));
        return $q;
    }
}

/* End of file Userakun_model.php */
