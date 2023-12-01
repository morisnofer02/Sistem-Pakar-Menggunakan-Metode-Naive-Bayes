<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gejala_model');
        is_logged_in_admin();
    }

    public function index()
    {
        $data['judul'] = "Gejala";
        $data['tabel'] = "Data Gejala";
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Gejala', 'required', array(
            'required' => 'Kolom Nama Gejala Harus diisi!'
        ));

        $data['gejala'] = $this->Gejala_model->getAllGejala();
        $data['kode'] = $this->Gejala_model->KodeGejala();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Admin_header', $data);
            $this->load->view('templates/Admin_sidebar', $data);
            $this->load->view('templates/Admin_topbar');
            $this->load->view('admin/gejala/index', $data);
            $this->load->view('templates/Admin_footer');
            $this->load->view('admin/gejala/modal_ubah');
            $this->load->view('admin/gejala/modal_tambah', $data);
        } else {
            $this->Gejala_model->tambahGejala();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Gejala Berhasil ditambahkan!</div>');
            redirect('gejala');
        }
    }

    // Ubah Gejala
    public function ubah()
    {
        $this->Gejala_model->ubahGejala();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data Gejala Berhasil diubah!</div>');
        redirect('gejala');
    }

    //Hapus Gejala
    public function hapus($id)
    {
        $this->Gejala_model->hapusGejala($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gejala Berhasil dihapus!</div>');
        redirect('gejala');
    }

    // public function print()
    // {
    //     $data['gejala'] = $this->Gejala_model->getAllGejala();
    //     $this->load->view('admin/gejala/print_gejala', $data);
    // }
}
