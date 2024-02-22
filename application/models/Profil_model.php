<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {
    // ambil data dari database
    public function getAllProfil()
    {
        return $query = $this->db->get('tb_user')->result_array();
    }

    public function get_user_by_username($username) {
        $this->db->where('username', $username);
        return $this->db->get('tb_user')->row_array();
    }

    public function update_user_profile($username, $data) {
        $this->db->where('username', $username);
        $this->db->update('tb_user', $data);
    }

    public function getPenggunaById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
    }

    public function UploadP($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tb_user', $data);
    }

    public function getPhotos() {
        // Sesuaikan dengan nama tabel dan kolom pada database Anda
        $query = $this->db->get('tb_user');
        return $query->result();
    }
    
}