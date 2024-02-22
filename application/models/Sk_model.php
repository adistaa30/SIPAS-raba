<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sk_model extends CI_Model {
    // ambil data dari database
    public function getAllSk()
    {
        return $query = $this->db->get('tb_suratkeluar')->result_array();
    }

    // insert data
    public function tambahSuratKeluar($data)
    {
        $this->db->insert('tb_suratkeluar', $data);
    }
    // end 

    // hapus data
    public function hapusSuratKeluar($id)
    {
        $this->db->delete('tb_suratkeluar', ['id_suratkeluar' => $id]);
    }
    // end

    // detail 
    public function getSuratKeluarById($id)
    {
        return $this->db->get_where('tb_suratkeluar', ['id_suratkeluar' => $id])->row_array();
    }
    // end

    // ubah
    public function ubahSuratKeluar($data)
    {
        $this->db->where('id_suratkeluar', $data['id_suratkeluar']);
        $this->db->update('tb_suratkeluar', $data);
    }
    // end

    // filter tanggal
    public function getDataByTgl($tgl_awal, $tgl_akhir) {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai di database Anda
        // Gantilah 'nama_kolom_tanggal' dengan nama kolom yang berisi tanggal
        $this->db->where('tgl_suratkeluar >=', $tgl_awal);
        $this->db->where('tgl_suratkeluar <=', $tgl_akhir);
        $query = $this->db->get('tb_suratkeluar');
        return $query->result_array();
    }
    // end

    // hitung surat masuk
    public function count_data() {
        $query = $this->db->get('tb_suratkeluar');
        return $query->num_rows();
    }
    // end

    public function UploadP($data)
    {
        $this->db->where('id_suratkeluar', $data['id_suratkeluar']);
        $this->db->update('tb_suratkeluar', $data);
    }

}
