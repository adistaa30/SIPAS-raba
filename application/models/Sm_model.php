<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sm_model extends CI_Model {
    public function getAllSm()
    {
        return $query = $this->db->get('tb_suratmasuk')->result_array();
    }
    public function tambahSuratMasuk($data)
    {
        $this->db->insert('tb_suratmasuk', $data);   
    }
    
    public function hapusSuratMasuk($id)
    {
        // $this->db->where('id_suratmasuk', $id);
        $this->db->delete('tb_suratmasuk', ['id_suratmasuk' => $id]);
    }

    public function getSuratMasukById($id)
    {
        return $this->db->get_where('tb_suratmasuk', ['id_suratmasuk' => $id])->row_array();
    }

    public function ubahSuratMasuk($data)
    {
        $this->db->where('id_suratmasuk', $data['id_suratmasuk']);
        $this->db->update('tb_suratmasuk', $data);
    }

    // filter tanggal
    public function getDataByTgl($tgl_awal, $tgl_akhir) {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai di database Anda
        // Gantilah 'nama_kolom_tanggal' dengan nama kolom yang berisi tanggal
        $this->db->where('tgl_diterima >=', $tgl_awal);
        $this->db->where('tgl_diterima <=', $tgl_akhir);
        $query = $this->db->get('tb_suratmasuk');
        return $query->result_array();
    }
    // end

    // hitung surat masuk
    public function count_data() {
        $query = $this->db->get('tb_suratmasuk');
        return $query->num_rows();
    }
    // end

    // hitung surat masuk
    public function countSk() {
        $query = $this->db->get('tb_suratkeluar');
        return $query->num_rows();
    }
    // end

    // hitung surat masuk
    public function countP() {
        $query = $this->db->get('tb_user');
        return $query->num_rows();
    }
    // end

    // senua data
    public function count_total_data() {
        $table1 = 'tb_suratmasuk'; // Ganti dengan nama tabel pertama
        $table2 = 'tb_suratkeluar'; // Ganti dengan nama tabel kedua

        $total_rows_table1 = $this->db->count_all($table1);
        $total_rows_table2 = $this->db->count_all($table2);

        $total_data = $total_rows_table1 + $total_rows_table2;

        return $total_data;
    }
    // end

    public function getChartData() {
        $query = $this->db->select('DATE_FORMAT(tgl_diarsipkan, "%m") as bulan, DATE_FORMAT(tgl_diarsipkan, "%Y") as tahun, COUNT(id_suratmasuk) as jumlah_surat')
            ->from('tb_suratmasuk')
            ->group_by('DATE_FORMAT(tgl_diarsipkan, "%Y-%m")')
            ->get();
        return $query->result_array();
    }

    public function UploadP($data)
    {
        $this->db->where('id_suratmasuk', $data['id_suratmasuk']);
        $this->db->update('tb_suratmasuk', $data);
    }
    

}
