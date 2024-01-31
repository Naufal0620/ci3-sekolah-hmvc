<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public $userTable = 'user_akun';

    public function cekLogin($user, $pass) {
        $cekUser = $this->db->get_where('user_akun', array('username' => $user));
        if ($cekUser->num_rows()) {
            $row = $cekUser->row();
            $pwd = $row->password;

            if ($pwd == $pass) {
                $data['username'] = $user;
                $data['isLogin'] = 'yes';

                $this->session->set_userdata($data);

                $ret['status'] = true;
                $ret['msg'] = 'Login Berhasil';
            } else {
                $ret['status'] = false;
                $ret['msg'] = 'Username atau Password salah';
            }
        } else {
            $ret['status'] = false;
            $ret['msg'] = 'Username atau Password salah';
        }
        return $ret;
    }
}

/* End of file Login_model.php */
