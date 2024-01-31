<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Datapelajaran_model extends CI_Model {

    public function get_all_pelajaran() {
        $q = $this->db->get_where('data_pelajaran', array('deleted' => 1));
        return $q;
    }
    public function get_all_guru() {
        $q = $this->db->select('CONCAT(nama_guru, " ", gelar) AS guru FROM data_guru;', false)->get();
        return $q;
    }
    public function get_pelajaran_by_id($id) {
        $q = $this->db->get_where('data_pelajaran', array('id' => $id));
        return $q;
    }

    public function check_if_pelajaran_exist($data, $id) {
        $q = $this->db->select('* FROM data_pelajaran
        WHERE id != "'.$id.'" AND
        deleted != 2 AND
        nama_kelas  = "'.$data['nama_kelas'].'" AND
        tingkat  = "'.$data['tingkat'].'" AND
        hari  = "'.$data['hari'].'" AND
        (TIME(jam_mulai) BETWEEN ADDTIME("'.$data['jam_mulai'].'", "00:01") AND TIMEDIFF("'.$data['jam_selesai'].'", "00:01") OR
        TIME(jam_selesai) BETWEEN ADDTIME("'.$data['jam_mulai'].'", "00:01") AND TIMEDIFF("'.$data['jam_selesai'].'", "00:01"))',
        false)->get();
        return $q;
    }

    public function edit($data, $id) {
        $q = $this->db->update('data_pelajaran', $data, array('id' => $id));
        return $q;
    }

    public function tambah($data) {
        $q = $this->db->insert('data_pelajaran', $data);
        return $q;
    }

    public function hapus($id) {
        $q = $this->db->update('data_pelajaran', array('deleted' => 2), array('id' => $id));
        return $q;
    }

}

/* End of file .php */
