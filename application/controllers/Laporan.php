<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        is_logged_in_admin();
    }

    public function index()
    {
        $data['judul'] = "Laporan";
        $data['tabel'] = "Data Laporan";
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        $data['laporan'] = $this->Laporan_model->getAllLaporan();

        $this->load->view('templates/Admin_header', $data);
        $this->load->view('templates/Admin_sidebar', $data);
        $this->load->view('templates/Admin_topbar', $data);
        $this->load->view('admin/laporan/index', $data);
        $this->load->view('templates/Admin_footer');
    }

    public function printlaporan()
    {
        $data['laporan'] = $this->Laporan_model->getAllLaporan();
        $this->load->view('admin/laporan/print_laporan', $data);
    }
}
