<?php

class Aturan_model extends CI_model
{
    // Menampilkan seluruh isi tabel Pengetahuan
    public function getAllAturan()
    {
        // menampilkan seluruh data gejala yang ada di tabel gejala.
        $queryRule = "SELECT `tbl_aturan`.`id`,`tbl_kerusakan`.`kode_kerusakan`,`tbl_kerusakan`.`nama_kerusakan`,`tbl_gejala`.`kode_gejala`,`tbl_gejala`.`nama_gejala`,`tbl_aturan`.`probabilitas`
        FROM `tbl_kerusakan` JOIN `tbl_aturan` 
        ON `tbl_kerusakan`.`id_kerusakan` = `tbl_aturan`.`kerusakan_id`
        JOIN `tbl_gejala` 
        ON `tbl_aturan`.`gejala_id` = `tbl_gejala`.`id_gejala`
                        ";
        return $this->db->query($queryRule)->result_array();

        // return $this->db->get('tbl_aturan')->result_array();
    }

    public function getAllAturanByGejalan($gejala_id)
    {
        $queryRule = "SELECT `tbl_aturan`.`id`, 
                            `tbl_kerusakan`.`kode_kerusakan`, 
                            `tbl_kerusakan`.`nama_kerusakan`,
                            `tbl_kerusakan`.`probabilitas` AS `probabilitas_kerusakan`,
                            `tbl_gejala`.`kode_gejala`, 
                            `tbl_gejala`.`nama_gejala`, 
                            `tbl_aturan`.`probabilitas` AS `probabilitas_aturan`
            FROM `tbl_kerusakan`
            JOIN `tbl_aturan` ON `tbl_kerusakan`.`id_kerusakan` = `tbl_aturan`.`kerusakan_id`
            JOIN `tbl_gejala` ON `tbl_aturan`.`gejala_id` = `tbl_gejala`.`id_gejala`
            WHERE `tbl_aturan`.`gejala_id` = $gejala_id";

        return $this->db->query($queryRule)->result_array();
    }


    // Menampilkan seluruh isi tabel Gejala
    public function getAllGejala()
    {
        // menampilkan seluruh data gejala yang ada di tabel gejala.
        return $this->db->get('tbl_gejala')->result_array();
    }

    // Menampilkan seluruh isi tabel Kerusakan
    public function getAllKerusakan()
    {
        // menampilkan seluruh data kerusakan yang ada di tabel kerusakan.
        return $this->db->get('tbl_kerusakan')->result_array();
    }

    public function getAllKerusakanByKode($kode_kerusakan)
    {
        $this->db->where('kode_kerusakan', $kode_kerusakan);
        return $this->db->get('tbl_kerusakan')->row_array();
    }

    public function insertHasilDiagnosa($insertData) {
        $this->db->insert('tbl_hasil_diagnosa', $insertData);
        return $this->db->insert_id();
    }

    // CRUD PENGETAHUAN
    // Tambah Data Pengetahuan
    public function tambahAturan()
    {
        $data = [
            "kerusakan_id" => $this->input->post(
                'kerusakan',
                true,
            ),
            "gejala_id" => $this->input->post('gejala', true),
            "probabilitas" => $this->input->post('probabilitas', true)
        ];
        $this->db->insert('tbl_aturan', $data);
    }

    // Ubah Data Pengetahuan
    public function ubahAturan()
    {
        $id = $this->input->post('id');
        $data = [
            "kerusakan_id" => $this->input->post('kerusakan', true),
            "gejala_id" => $this->input->post('gejala', true),
            "probabilitas" => $this->input->post('probabilitas', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_aturan', $data);
    }
    // Hapus Data Pengetahuan
    public function hapus($id)
    {
        $this->db->delete('tbl_aturan', ['id' => $id]);
    }
}
