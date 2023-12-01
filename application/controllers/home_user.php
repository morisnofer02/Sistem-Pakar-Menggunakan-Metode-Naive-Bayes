<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_user extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     cekLogin();
    // }

    public function index()
    {
        $data['judul'] = "Halaman Member";
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        $this->load->view('templates/Member_Header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/Member_Footer');
    }
}
