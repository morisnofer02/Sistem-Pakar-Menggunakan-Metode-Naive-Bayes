<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekLogin();
    }

    public function index()
    {
        $data['judul'] = "Menu Management";
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Admin_header', $data);
            $this->load->view('templates/Admin_sidebar', $data);
            $this->load->view('templates/Admin_topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/Admin_footer');
            $this->load->view('menu/menu_edit', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu Berhasil ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function hapusMenu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('pesan', '<div class = "alert alert-danger" role="alert">Menu berhasil dihapus</div>');
        redirect('menu');
    }

    public function ubahMenu()
    {
        $id = $this->input->post('id');
        $data = [
            "menu" => $this->input->post('menu')
        ];
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);

        $this->session->set_flashdata('pesan', '<div class = "alert alert-info" role="alert">Menu berhasil di Edit</div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['judul'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Admin_header', $data);
            $this->load->view('templates/Admin_sidebar', $data);
            $this->load->view('templates/Admin_topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/Admin_footer');
            $this->load->view('menu/submenu_edit', $data);
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('pesan', '<div class = "alert alert-success" role="alert">Submenu Berhasil ditambahkan</div>');
            redirect('menu/submenu');
        }
    }

    public function hapusSubmenu($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('pesan', '<div class = "alert alert-danger" role="alert">Submenu Berhasil dihapus</div>');
        redirect('menu/submenu');
    }

    public function ubahSubmenu()
    {
        $id = $this->input->post('id');
        $data = [
            "judul" => $this->input->post('judul'),
            "menu_id" => $this->input->post('menu_id'),
            "url" => $this->input->post('url'),
            "icon" => $this->input->post('icon')
        ];
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);

        $this->session->set_flashdata('pesan', '<div class = "alert alert-info" role="alert">Submenu Berhasil diedit</div>');
        redirect('menu/submenu');
    }
}
