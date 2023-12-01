<?php
class Admin_model extends CI_model
{
    // Menghitung jumlah data dalam tabel gejala
    public function CountGejala()
    {
        $query = $this->db->get('tbl_gejala');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // Menghitung jumlah data dalam tabel kerusakan
    public function CountKerusakan()
    {
        $query = $this->db->get('tbl_kerusakan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // Menghitung jumlah data dalam tabel aturan
    public function CountAturan()
    {
        $query = $this->db->get('tbl_aturan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // Menghitung jumlah data dalam tabel Laporan
    public function CountLaporan()
    {
        $query = $this->db->get('tbl_hasil_diagnosa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
