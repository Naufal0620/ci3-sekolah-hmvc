<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User_akun extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Userakun_model', 'Umodel');
    }

    public function index()
    {
        $isLogin = $this->session->userdata('isLogin');
        if ($isLogin == 'yes') {
            $data['konten'] = 'v_UserAkun';
            $data['libjs'] = 'userAkun.js';
            $this->theme->dashboard_theme($data);
        } else {
            redirect('auth/login','refresh');
        }
    }

    public function tambah_user_akun() {
        $ret['status'] = true;
        $ret['data'] = '';
        $ret['module'] = 'user_akun';

        echo json_encode($ret);
    }

    public function table_user_akun() {
        $q = $this->Umodel->get_all_user();
        $data = array();
        $no = 0;
        if ($q->num_rows()) {
            foreach ($q->result() as $dataset) {
                $no++;
                $row = array();
                $row[] = $no;

                $row[] = $dataset->username;
                $row[] = $dataset->password;
                $row[] = $dataset->tipe_akun;

                $row[] = actbtn($dataset->id);

                $data[] = $row;
            }

            $ret['status'] = true;
            $ret['data'] = $data;
            $ret['addbtn'] = addbtn();
            $ret['msg'] = 'Tabel berhasil di muat';
        } else {
            $ret['status'] = false;
            $ret['data'] = '';
            $ret['msg'] = 'Tabel gagal di muat';
        }
        echo json_encode($ret);
    }

    public function edit_user_akun($id) {
        $q = $this->Umodel->get_user_by_id($id);

        if ($q->num_rows()) {
            $row = $q->row();

            $data['id'] = $row->id;
            $data['username'] = $row->username;
            $data['password'] = $row->password;
            $data['tipe_akun'] = $row->tipe_akun;

            $ret['status'] = true;
            $ret['module'] = 'user_akun';
            $ret['data'] = $data;
        } else {
            $ret['status'] = false;
            $ret['module'] = '';
            $ret['data'] = '';
        }
        echo json_encode($ret);
    }

    public function simpan_user_akun() {
        $id = $this->input->post('id');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $data['tipe_akun'] = $this->input->post('tipe_akun');

        $user_validation = $this->Umodel->check_if_user_exist($data['username'], $id);

        if ($id) {
            if ($user_validation->num_rows()) {
                $ret['status'] = false;
                $ret['msg'] = 'Username sudah ada!';
            } else {
                $q = $this->Umodel->edit($data, $id);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Akun pengguna berhasil diubah!';
                } else {
                    $ret['status'] = true;
                    $ret['msg'] = 'Akun pengguna berhasil diubah!';
                }
            }
        } else {
            if ($user_validation->num_rows()) {
                $ret['status'] = false;
                $ret['msg'] = 'Username sudah ada!';
            } else {
                $q = $this->Umodel->tambah($data);
                if ($q) {
                    $ret['status'] = true;
                    $ret['msg'] = 'Akun pengguna berhasil ditambah!';
                } else {
                    $ret['status'] = false;
                    $ret['msg'] = 'Akun pengguna gagal ditambah!';
                }
            }
        }
        echo json_encode($ret);
    }

    public function hapus_user_akun($id) {
        $q = $this->Umodel->hapus($id);
        if ($q) {
            $ret['status'] = true;
            $ret['msg'] = 'Akun pengguna telah dihapus!';
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Akun pengguna gagal dihapus!';
        }
        echo json_encode($ret);
    }

}

/* End of file User_akun.php */
