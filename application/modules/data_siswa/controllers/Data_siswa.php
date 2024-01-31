<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datasiswa_model', 'Dmodel');
    }
    

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        if ($isLogin == 'yes') {
            $data['konten'] = 'v_DataSiswa';
            $data['libjs'] = 'dataSiswa.js';
            $this->theme->dashboard_theme($data);
        } else {
            redirect('auth/login','refresh');
        }
    }

    public function table_data_siswa() {
        $q = $this->Dmodel->get_all_siswa();
        $data = array();
        $no = 0;
        if ($q->num_rows()) {
            foreach ($q->result() as $dataset) {
                $no++;
                $row = array();
                $row[] = $no;

                $row[] = $dataset->nama_siswa;
                $row[] = $dataset->nama_kelas;
                $row[] = $dataset->tingkat;

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

    public function tambah_data_siswa() {
        $ret['status'] = true;

        echo json_encode($ret);
    }

    public function edit_data_siswa($id = 0) {
        $q = $this->Dmodel->get_siswa_by_id($id);
        if ($q->num_rows()) {
            $ret['status'] = true;
            $ret['data'] = $q->row();
        } else {
            $ret['status'] = false;
            $ret['data'] = 0;
        }
        echo json_encode($ret);
    }

    public function simpan_data_siswa() {
        $id = $this->input->post('id');
        $data['nama_siswa'] = $this->input->post('nama_siswa');
        $data['nama_kelas'] = $this->input->post('nama_kelas');
        $data['tingkat'] = $this->input->post('tingkat');

        $siswa_validation = $this->Dmodel->check_if_siswa_exist($data, $id);

        if ($siswa_validation->num_rows()) {
            $ret['status'] = false;
            $ret['msg'] = 'Data siswa sudah ada!';
        } else {
            if ($id) {
                $q = $this->Dmodel->edit($data, $id);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Data siswa berhasil diubah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Data siswa gagal diubah!';
                }
            } else {
                $q = $this->Dmodel->tambah($data);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Data siswa berhasil ditambah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Data siswa gagal ditambah!';
                }
            }
        }
        echo json_encode($ret);
    }

    public function hapus_data_siswa($id) {
        $q = $this->Dmodel->hapus($id);
        if ($q) {
            $ret['status'] = true;
            $ret['msg'] = 'Data siswa berhasil dihapus';
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Data siswa gagal dihapus';
        }
        echo json_encode($ret);
    }



}

/* End of file Data_siswa.php */
