<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Theme {
    public $CI;

    public function dashboard_theme($data) {
        $CI =& get_instance();

        $data['menu'] = 'view_menu';

        $CI->load->view('PanelDashboard', $data);
    }
}