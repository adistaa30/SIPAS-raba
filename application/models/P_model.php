<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_model extends CI_Model
{
    // ambil data dari database
    public function getAllPengguna()
    {
        return $query = $this->db->get('tb_user')->result_array();
    }

    // insert data
    public function tambahPengguna($data)
    {
        $this->db->insert('tb_user', $data);
    }
    // end

    public function hapusP($id)
    {
        $this->db->delete('tb_user', ['id_user' => $id]);
    }

    public function getPenggunaById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
    }

    public function ubahPengguna($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tb_user', $data);
    }

    // login
    public function getUser($username, $password)
    {
        $kondisi = array (
            'username' => $username,
            'password' => $password
        );
        
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where($kondisi);
        $this->db->limit(1);
        return $this->db->get()->row();
    }
}
