<?php

namespace App\Models;

use CodeIgniter\model;

class Mymodel extends model
{
    function __construct()
    {
        $this->db = db_connect();
    }
    public function tampil_user()
    {
        $get =  $this->db->table('user')->get();
        return $get;
    }

    public function edit_user($data, $id)
    {
        $update = $this->db->table('user')->update($data, ['id_user' => $id]);
        return $update;
    }
    public function tambah_data($data)
    {
        return $this->db->table('user')->insert($data);
    }
    public function hapus($id)
    {
        return $this->db->table('user')->delete(['id_user' => $id]);
    }
}
