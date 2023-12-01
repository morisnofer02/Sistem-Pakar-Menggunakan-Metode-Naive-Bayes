<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('_login')) {
        //     redirect('auth');
        // }
        $this->load->model('User_model');
        $this->load->model('Aturan_model');
        $this->load->model('Admin_model');
        $this->load->model('Laporan_model');
    }

    public function index()
    {
        $data['judul'] = "My Profile";
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        if ($this->session->userdata('role_id') == 1) {
            $this->load->view('templates/Admin_header', $data);
            $this->load->view('templates/Admin_sidebar', $data);
            $this->load->view('templates/Admin_topbar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/Admin_footer');
        } elseif ($this->session->userdata('role_id') == 2) {
            $this->load->view('templates/Admin_header', $data);
            $this->load->view('templates/profile_sidebar', $data);
            $this->load->view('templates/Admin_topbar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/Admin_footer');
        }
    }

    public function diagnosa()
    {
        $data['judul'] = "Diagnosa";
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();

        $this->form_validation->set_rules('nama_pendiagnosa', 'Pendiagnosa', 'required', array(
            'required' => 'Silahkan lengkapi data diagnosa terlebih dahulu!'
        ));

        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|regex_match[/^[0-9]+$/]', array(
            'required' => 'Silahkan masukkan No hp!',
            'regex_match' => 'No hp harus berisi angka!'
        ));

        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => 'Silahkan masukkan Alamat!'
        ));

        // $this->form_validation->set_rules('id_gejala[]', 'Gejala', 'required', array(
        //     'required' => 'Silahkan pilih minimal 1 gejala terlebih dahulu!'
        // ));


        // $this->form_validation->set_rules('rule', 'Rule', 'required', array(
        //     'required' => 'Silahkan pilih minimal 1 gejala terlebih dahulu!'
        // ));

        $data['gejala'] = $this->User_model->Gejala();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Admin_header', $data);
            $this->load->view('user/diagnosa', $data);
            $this->load->view('templates/Admin_footer');
        } else {

            $data = [
                "nama_pendiagnosa"  => $this->input->post('nama_pendiagnosa'),
                "no_hp"             => $this->input->post('no_hp'),
                "alamat"            => $this->input->post('alamat')
            ];

            $gejala_request = $this->input->post('id_gejala');

            if ($gejala_request != null) {

                $jumlahGejala = $this->Admin_model->CountGejala();
                $dataArr = [];

                //Menghitung nilai P (ai|vj) dan menghitung nilai P (vj)
                foreach ($gejala_request as $key => $gejala_id) {
                    $aturan_gejala = $this->Aturan_model->getAllAturanByGejalan($gejala_id);

                    $dataGejala = [];

                    foreach ($aturan_gejala as $value) {
                        $hitungProbabilitas = ($value['probabilitas_aturan'] + ($jumlahGejala * $value['probabilitas_kerusakan'])) / (1 + $jumlahGejala);

                        $getHitungProbabilitas = number_format($hitungProbabilitas, 3);

                        $value['hasil_probabilitas'] = $getHitungProbabilitas;
                        $dataGejala[] = $value;
                    }

                    // $dataArr = array_merge($dataArr, $dataGejala); 

                    $dataArr[] = [
                        'aturan_gejala' => $dataGejala,
                    ];
                }


                // Menghitung P(ai|vj) x P(vj) untuk tiap v
                if ($dataArr != null) {
                    $hasilProbabilitas = [];

                    foreach ($dataArr as $item) {
                        $aturanGejala = $item['aturan_gejala'];

                        foreach ($aturanGejala as $aturan) {
                            $kodeKerusakan = $aturan['kode_kerusakan'];
                            $hasilProbabilitasGejala = $aturan['hasil_probabilitas'];

                            if (!isset($hasilProbabilitas[$kodeKerusakan])) {
                                $hasilProbabilitas[$kodeKerusakan] = $hasilProbabilitasGejala;
                            } else {
                                $hasilProbabilitas[$kodeKerusakan] *= $hasilProbabilitasGejala;
                            }
                        }
                    }

                    if ($hasilProbabilitas != null) {

                        $probabilitasAkhir = [];

                        foreach ($hasilProbabilitas as $kodeKerusakan => $hasil) {
                            $kerusakan = $this->Aturan_model->getAllKerusakanByKode($kodeKerusakan);

                            $total     = $hasil * $kerusakan['probabilitas'];
                            $formattedTotal = number_format($total, 6);

                            $probabilitasAkhir[] = [
                                'nama_kerusakan'     => $kerusakan['nama_kerusakan'],
                                'kode_kerusakan'     => $kerusakan['kode_kerusakan'],
                                'nilai_probabilitas' => $formattedTotal
                            ];
                        }

                        $maxProbabilitas  = max($hasilProbabilitas);
                        $kodeKerusakanMax = array_search($maxProbabilitas, $hasilProbabilitas);

                        $getDataKerusakan = $this->Aturan_model->getAllKerusakanByKode($kodeKerusakanMax);

                        if (!empty($getDataKerusakan)) {

                            $nilaiProbabilitas = $maxProbabilitas * $getDataKerusakan['probabilitas'];

                            $insertData = [
                                'nama'               => $data['nama_pendiagnosa'],
                                'nomor_hp'           => $data['no_hp'],
                                'alamat'             => $data['alamat'],
                                'hasil_probabilitas' => number_format($nilaiProbabilitas, 6),
                                'nama_kerusakan'     => $getDataKerusakan['nama_kerusakan'],
                                'solusi'             => $getDataKerusakan['solusi'],
                                'waktu'              => (new DateTime())->getTimestamp(),
                            ];

                            $insert = $this->Aturan_model->insertHasilDiagnosa($insertData);

                            $data['getHasilKerusakan'] = $getDataKerusakan;
                        } else {
                            $data['getHasilKerusakan'] = null;
                        }

                        $data['getAllKerusakan']   = $probabilitasAkhir;
                    }
                }

                // echo '<pre>';
                // var_dump($probabilitasAkhir);
                // echo '<pre>';
                // die();

            } else {
                $data['getHasilKerusakan'] = null;
                $data['getAllKerusakan'] = null;
            }


            $this->load->library('session');
            $this->session->set_userdata('data', $data);
            redirect('diagnosa/hasil');
        }
    }

    public function hasil_diagnosa()
    {
        $data['judul'] = "Hasil Diagnosa";
        $data['user'] = $this->db->get_where('tbl_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        $data['laporan'] = $this->Laporan_model->getAllLaporan();

        $this->load->view('templates/Admin_header', $data);
        $this->load->view('user/hasil_diagnosa', $data);
        $this->load->view('templates/Admin_footer');
    }

    public function edit()
    {
        $data['judul'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('tbl_user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama_user', 'Nama user', 'required|trim');

        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('role_id') == 1) {
                $this->load->view('templates/Admin_header', $data);
                $this->load->view('templates/Admin_sidebar', $data);
                $this->load->view('templates/Admin_topbar', $data);
                $this->load->view('user/edit', $data);
                $this->load->view('templates/Admin_footer');
            } else if ($this->session->userdata('role_id') == 2) {
                $this->load->view('templates/Admin_header', $data);
                $this->load->view('templates/profile_sidebar', $data);
                $this->load->view('templates/Admin_topbar', $data);
                $this->load->view('user/edit', $data);
                $this->load->view('templates/Admin_footer');
            }
        } else {
            $nama_user = $this->input->post('nama_user');
            $username = $this->input->post('username');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets3/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets3/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('pesan', '<div class = "alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user');
                }
            }

            $this->db->set('nama_user', $nama_user);
            $this->db->where('username', $username);
            $this->db->update('tbl_user');

            $this->session->set_flashdata('pesan', '<div class = "alert alert-info" role="alert">Profile berhasil diedit!</div>');
            redirect('user');
        }
    }

    public function gantipassword()
    {
        $data['judul'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('tbl_user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('role_id') == 1) {
                $this->load->view('templates/Admin_header', $data);
                $this->load->view('templates/Admin_sidebar', $data);
                $this->load->view('templates/Admin_topbar', $data);
                $this->load->view('user/gantipassword', $data);
                $this->load->view('templates/Admin_footer');
            } else if ($this->session->userdata('role_id') == 2) {
                $this->load->view('templates/Admin_header', $data);
                $this->load->view('templates/profile_sidebar', $data);
                $this->load->view('templates/Admin_topbar', $data);
                $this->load->view('user/gantipassword', $data);
                $this->load->view('templates/Admin_footer');
            }
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {

                $this->session->set_flashdata('pesan', '<div class = "alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/gantipassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesan', '<div class = "alert alert-danger" role="alert">New password cannot be the same as  current password!</div>');
                    redirect('user/gantipassword');
                } else {
                    // password sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('tbl_user');

                    $this->session->set_flashdata('pesan', '<div class = "alert alert-success" role="alert">Password Changed!</div>');
                    redirect('user/gantipassword');
                }
            }
        }
    }
}
