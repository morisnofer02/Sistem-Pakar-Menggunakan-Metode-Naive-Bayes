<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     cek_login();
    // }

    public function hasil()
    {
        $this->load->library('session');
        $data = $this->session->userdata('data');
        $data['judul'] = "Hasil";

        $this->load->view('templates/Admin_header', $data);
        $this->load->view('user/hasil', $data);
        $this->load->view('templates/Admin_footer');
    }
}
