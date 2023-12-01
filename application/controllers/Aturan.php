<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aturan_model');
        is_logged_in_admin();
    }

    public function index()
    {
        $data['judul'] = "Aturan";
        $data['tabel'] = "Data Aturan";
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        $data['gejala'] = $this->Aturan_model->getAllGejala();
        $data['kerusakan'] = $this->Aturan_model->getAllKerusakan();
        $data['aturan'] = $this->Aturan_model->getAllAturan();

        // $this->form_validation->set_rules('kerusakan_id', 'Kerusakan', 'required');
        // $this->form_validation->set_rules('gejala_id', 'Gejala', 'required');
        $this->form_validation->set_rules('probabilitas', 'Probabilitas', 'required', array(
            'required' => 'Silahkan Lengkapi data input terlebih dahulu!'
        ));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Admin_header', $data);
            $this->load->view('templates/Admin_sidebar', $data);
            $this->load->view('templates/Admin_topbar', $data);
            $this->load->view('admin/aturan/index', $data);
            $this->load->view('templates/Admin_footer');
            $this->load->view('admin/aturan/modal_tambah_aturan', $data);
            $this->load->view('admin/aturan/modal_ubah_aturan', $data);
        } else {

            $this->Aturan_model->tambahAturan();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Aturan Berhasil ditambahkan!</div>');
            redirect('aturan');
        }
    }

    // Ubah Pengetahuan/Aturan
    public function ubah()
    {
        $data = [
            "kerusakan_id" => $this->input->post('kerusakan', true),
            "gejala_id" => $this->input->post('gejala', true),
            "probabilitas" => $this->input->post('probabilitas', true)
        ];
        
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        // die();        
        $this->Aturan_model->ubahAturan();
        //buat pesan Pengetahuan berhasil dibuat
        $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data Aturan Berhasil diubah!</div>');
        redirect('aturan');
    }

    // Hapus Pengetahuan/Aturan
    public function hapus($id)
    {
        $this->Aturan_model->hapus($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Aturan Berhasil dihapus!</div>'); //buat pesan akun berhasil dibuat
        redirect('aturan');
    }
}
