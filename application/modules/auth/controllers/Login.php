<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model', 'Lmodel');
		
	}
	
	public function index()
	{
		$isLogin = $this->session->userdata('isLogin');
		if ($isLogin == 'yes') {
			header('location:'.site_url('dashboard/index'));
		} else {
			$data['libjs'] = 'login.js';
			$this->load->view('v_login', $data);
		}
	}

	public function do_login() {
		$user	 	= $this->input->post('username');
		$pass 		= $this->input->post('password');

		if ($user == '')
		{
			$ret['status'] = false;
			$ret['msg'] = 'Username tidak boleh kosong';
		}
		elseif ($pass == '')
		{
			$ret['status'] = false;
			$ret['msg'] = 'Password tidak boleh kosong';
		} else {
			$ret = $this->Lmodel->cekLogin($user, $pass);
		}
		echo json_encode($ret);
	}

	public function logout() {
		$this->session->sess_destroy();
		header('location:'.site_url('auth/Login/index'));
	}
}
