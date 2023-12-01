<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekLogin();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['judul'] = "Dashboard";
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        // Hitung jumlah data pada tabel Gejala/Kerusakan/Pengetahuan
        $data['totalGejala'] = $this->Admin_model->CountGejala();
        $data['totalKerusakan'] = $this->Admin_model->CountKerusakan();
        $data['totalAturan'] = $this->Admin_model->CountAturan();
        $data['totalLaporan'] = $this->Admin_model->CountLaporan();

        $this->load->view('templates/Admin_header', $data);
        $this->load->view('templates/Admin_sidebar', $data);
        $this->load->view('templates/Admin_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/Admin_footer');
    }

    public function role()
    {
        $data['judul'] = 'Role';
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        $data['role'] = $this->db->get('tbl_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Admin_header', $data);
            $this->load->view('templates/Admin_sidebar', $data);
            $this->load->view('templates/Admin_topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('admin/ubah-role', $data);
            $this->load->view('templates/Admin_footer');
        } else {
            $this->db->insert('tbl_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('pesan', '<div class = "alert alert-success" role="alert">Role berhasil ditambahkan</div>');
            redirect('admin/role');
        }
    }

    public function hapusRole($id)
    {
        $this->db->delete('tbl_role', ['id' => $id]);
        $this->session->set_flashdata('pesan', '<div class = "alert alert-danger" role="alert">Role berhasil dihapus</div>');
        redirect('admin/role');
    }

    public function ubahRole()
    {
        $id = $this->input->post('id');
        $data = [
            "role" => $this->input->post('role')
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_role', $data);

        $this->session->set_flashdata('pesan', '<div class = "alert alert-info" role="alert">Role berhasil diedit</div>');
        redirect('admin/role');
    }

    public function roleAccess($role_id = null)
    {
        if (is_null($role_id)) {
            redirect('auth/blocked');
        }

        $data['judul'] = 'Role Access';
        $data['user'] = $this->db->get_where('tbl_user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get_where('tbl_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/Admin_header', $data);
        $this->load->view('templates/Admin_sidebar', $data);
        $this->load->view('templates/Admin_topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/Admin_footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('pesan', '<div class = "alert alert-warning" role="alert">Access Berhasil diubah!
            </div>');
    }
}
