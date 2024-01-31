<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pelajaran extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datapelajaran_model', 'Dmodel');
        
    }

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        if ($isLogin == 'yes') {
            $data['konten'] = 'v_DataPelajaran';
            $data['libjs'] = 'dataPelajaran.js';

            $this->theme->dashboard_theme($data);
        } else {
            
            redirect('auth/login','refresh');
            
        }
    }

    public function table_data_pelajaran() {
        $q = $this->Dmodel->get_all_pelajaran();
        $data = array();
        $no = 0;
        if ($q->num_rows()) {
            foreach ($q->result() as $dataset) {
                $no++;
                $row = array();
                $row[] = $no;

                $row[] = $dataset->nama_pelajaran;
                $row[] = $dataset->guru_pengajar;
                $row[] = $dataset->nama_kelas;
                $row[] = $dataset->tingkat;
                $row[] = $dataset->hari;
                $row[] = $dataset->jam_mulai;
                $row[] = $dataset->jam_selesai;

                $row[] = actbtn($dataset->id);

                $data[] = $row;
            }
            $ret['status'] = true;
            $ret['data'] = $data;
            
            $ret['addbtn'] = addbtn();
            $ret['msg'] = 'Table berhasil di muat';
        } else {
            $ret['status'] = false;
            $ret['data'] = '';
            $ret['addbtn'] = addbtn();
            $ret['msg'] = 'Table gagal di muat';
        }
        echo json_encode($ret);
    }

    public function tambah_data_pelajaran() {
        $guru_pengajar = $this->Dmodel->get_all_guru();

        $ret['status'] = true;
        $ret['guru_pengajar'] = $guru_pengajar->result();

        echo json_encode($ret);
    }

    public function edit_data_pelajaran($id) {
        $q = $this->Dmodel->get_pelajaran_by_id($id);
        $guru_pengajar = $this->Dmodel->get_all_guru();
        if ($q->num_rows()) {
            $ret['status'] = true;
            $ret['data'] = $q->row();
            $ret['guru_pengajar'] = $guru_pengajar->result();
        } else {
            $ret['status'] = false;
            $ret['data'] = 0;
        }
        echo json_encode($ret);
    }

    public function simpan_data_pelajaran() {
        $id = $this->input->post('id');
        $data['nama_pelajaran'] = $this->input->post('nama_pelajaran');
        $data['guru_pengajar'] = $this->input->post('guru_pengajar');
        $data['nama_kelas'] = $this->input->post('nama_kelas');
        $data['tingkat'] = $this->input->post('tingkat');
        $data['hari'] = $this->input->post('hari');
        $data['jam_mulai'] = $this->input->post('jam_mulai');
        $data['jam_selesai'] = $this->input->post('jam_selesai');

        $pelajaran_validation = $this->Dmodel->check_if_pelajaran_exist($data, $id);

        if ($pelajaran_validation->num_rows()) {
            $ret['status'] = false;
            $ret['msg'] = 'Data pelajaran sudah ada!';
        } else {
            if ($id) {
                $q = $this->Dmodel->edit($data, $id);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Data pelajaran berhasil diubah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Data pelajaran gagal diubah!';
                }
            } else {
                $q = $this->Dmodel->tambah($data);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Data pelajaran berhasil ditambah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Data pelajaran gagal ditambah!';
                }
            }
        }
        echo json_encode($ret);
    }

    public function hapus_data_pelajaran($id) {
        $q = $this->Dmodel->hapus($id);
        if ($q) {
            $ret['status'] = true;
            $ret['msg'] = 'Data pelajaran berhasil dihapus';
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Data pelajaran gagal dihapus';
        }
        echo json_encode($ret);
    }

}

/* End of file Data_pelajaran.php */
