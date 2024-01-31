<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Datasiswa_model extends CI_Model {

    public function get_all_siswa() {
        $q = $this->db->get_where('data_siswa', array('deleted' => 1));
        return $q;
    }

    public function get_siswa_by_id($id) {
        $q = $this->db->get_where('data_siswa', array('id' => $id));
        return $q;
    }

    public function check_if_siswa_exist($data, $id) {
        $q = $this->db->select('* FROM data_siswa
        WHERE id != "'.$id.'"
        AND nama_siswa = "'.$data['nama_siswa'].'"
        AND nama_kelas = "'.$data['nama_kelas'].'"
        AND tingkat = "'.$data['tingkat'].'"',
        false)->get();

        return $q;
    }

    public function edit($data, $id) {
        $q = $this->db->update('data_siswa', $data, array('id' => $id));
        return $q;
    }

    public function tambah($data) {
        $q = $this->db->insert('data_siswa', $data);
        return $q;
    }

    public function hapus($id = 0) {
        $q = $this->db->update('data_siswa', array('deleted' => 2), array('id' => $id));
        return $q;
    }

}

/* End of file Datasiswa_model.php */
