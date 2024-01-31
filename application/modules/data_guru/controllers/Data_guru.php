<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Data_guru extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dataguru_model', 'Dmodel');
    }
    

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        if ($isLogin == 'yes') {
            $data['konten'] = 'v_DataGuru';
            $data['libjs'] = 'dataGuru.js';
            $this->theme->dashboard_theme($data);
        } else {
            redirect('auth/login','refresh');
        }
    }

    public function table_data_guru() {
        $q = $this->Dmodel->get_all_guru();
        $data = array();
        $no = 0;
        if ($q->num_rows()) {
            foreach ($q->result() as $dataset) {
                $no++;
                $row = array();
                $row[] = $no;

                $row[] = $dataset->nama_guru;
                $row[] = $dataset->bidang_keahlian;
                $row[] = $dataset->gelar;

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

    public function tambah_data_guru() {
        $ret['status'] = true;

        echo json_encode($ret);
    }

    public function edit_data_guru($id = 0) {
        $q = $this->Dmodel->get_guru_by_id($id);
        if ($q->num_rows()) {
            $ret['status'] = true;
            $ret['data'] = $q->row();
        } else {
            $ret['status'] = false;
            $ret['data'] = 0;
        }
        echo json_encode($ret);
    }

    public function simpan_data_guru() {
        $id = $this->input->post('id');
        $data['nama_guru'] = $this->input->post('nama_guru');
        $data['bidang_keahlian'] = $this->input->post('bidang_keahlian');
        $data['gelar'] = $this->input->post('gelar');

        $guru_validation = $this->Dmodel->check_if_guru_exist($data, $id);

        if ($guru_validation->num_rows()) {
            $ret['status'] = false;
            $ret['msg'] = 'Data guru sudah ada!';
        } else {
            if ($id) {
                $q = $this->Dmodel->edit($data, $id);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Data guru berhasil diubah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Data guru gagal diubah!';
                }
            } else {
                $q = $this->Dmodel->tambah($data);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Data guru berhasil ditambah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Data guru gagal ditambah!';
                }
            }
        }
        echo json_encode($ret);
    }

    public function hapus_data_guru($id) {
        $q = $this->Dmodel->hapus($id);
        if ($q) {
            $ret['status'] = true;
            $ret['msg'] = 'Data guru berhasil dihapus';
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Data guru gagal dihapus';
        }
        echo json_encode($ret);
    }



}

/* End of file Data_guru.php */
