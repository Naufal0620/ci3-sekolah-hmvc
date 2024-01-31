<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        
    }
    

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        if ($isLogin == 'yes') {
            $data['konten'] = 'v_Dashboard';
            $data['libjs'] = 'dashboard.js';

            $this->theme->dashboard_theme($data);
        } else {
            redirect('auth/login','refresh');
        }
    }


    public function table_jumlah_siswa() {
        $q = $this->db->select('nama_kelas, tingkat, COUNT(nama_siswa) AS jumlah_siswa FROM data_siswa GROUP BY nama_kelas, tingkat ORDER BY jumlah_siswa DESC', false)->get();
        $data = array();
        if ($q->num_rows()) {
            foreach($q->result() as $dataset) {
                $row = array();
                $row[] = $dataset->nama_kelas;
                $row[] = $dataset->tingkat;
                $row[] = $dataset->jumlah_siswa;

                $data[] = $row;
            }
            $ret['status'] = true;
            $ret['data'] = $data;
        } else {
            $ret['status'] = false;
            $ret['data'] = '';
        }
        echo json_encode($ret);
    }

    public function chart_jumlah_siswa() {
        $q = $this->db->select('nama_kelas, tingkat, COUNT(nama_siswa) AS jumlah_siswa FROM `data_siswa` GROUP BY nama_kelas, tingkat', false)->get();
        if ($q->num_rows()) {
            foreach($q->result() as $dataset) {
                $d['labels'][] = $dataset->nama_kelas . ' ' . $dataset->tingkat;
                $d['data']['jumlah'][] = $dataset->jumlah_siswa;
            }
            $d['status'] = true;
        } else {
            $d['status'] = false;
        }
        echo json_encode($d);
    }

    public function jumlah_semua_siswa() {
        $q = $this->db->select('COUNT(nama_siswa) AS jumlah_siswa FROM data_siswa', false)->get();

        $ret['status'] = true;
        $ret['data'] = $q->result();

        echo json_encode($ret);
    }
    public function jumlah_semua_guru() {
        $q = $this->db->select('COUNT(nama_guru) AS jumlah_guru FROM data_guru', false)->get();

        $ret['status'] = true;
        $ret['data'] = $q->result();

        echo json_encode($ret);
    }

    public function jumlah_semua_akun() {
        $q = $this->db->select('COUNT(id) AS jumlah_akun FROM user_akun', false)->get();

        $ret['status'] = true;
        $ret['data'] = $q->result();

        echo json_encode($ret);
    }

}

/* End of file Dashboard.php */
