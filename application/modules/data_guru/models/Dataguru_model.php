<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dataguru_model extends CI_Model {

    public function get_all_guru() {
        $q = $this->db->get_where('data_guru', array('deleted' => 1));
        return $q;
    }

    public function get_guru_by_id($id) {
        $q = $this->db->get_where('data_guru', array('id' => $id));
        return $q;
    }

    public function check_if_guru_exist($data, $id) {
        $q = $this->db->select('* FROM data_guru
        WHERE id != "'.$id.'"
        AND nama_guru = "'.$data['nama_guru'].'"
        AND bidang_keahlian = "'.$data['bidang_keahlian'].'"
        AND gelar = "'.$data['gelar'].'"',
        false)->get();

        return $q;
    }

    public function edit($data, $id) {
        $q = $this->db->update('data_guru', $data, array('id' => $id));
        return $q;
    }

    public function tambah($data) {
        $q = $this->db->insert('data_guru', $data);
        return $q;
    }

    public function hapus($id = 0) {
        $q = $this->db->update('data_guru', array('deleted' => 2), array('id' => $id));
        return $q;
    }

}

/* End of file Dataguru_model.php */
