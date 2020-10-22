<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\models\Mymodel;

class Crud extends controller
{
    public function index()
    {
        $model = new Mymodel();
        $data = [
            'title' => 'Data User',
            'user' => $model->tampil_user()->getResult()
        ];

        echo view('tabel_data', $data);
    }

    public function edit_data()
    {
        $uri = service('uri');
        $id = $uri->getsegment(3);
        $data = [
            'username' => $this->request->getpost('user'),
            'password' => $this->request->getpost('pass'),
            'email' => $this->request->getpost('email'),
            'no_hp' => $this->request->getpost('no'),
            'level' => $this->request->getpost('level'),
            'alamat' => $this->request->getpost('alamat')
        ];

        $model =  new Mymodel();
        $result = $model->edit_user($data, $id);
        if ($result) {
            session()->setflashdata('pesan', '<div class="alert alert-success" role="alert" id="alert"> Berhasil <strong> Merubah Data </strong> </div>');
            return redirect()->to('/crud');
        } else {
            session()->setflashdata('pesan', '<div class="alert alert-danger" role="alert" id="alert"> Gagal <strong> Merubah Data </strong> </div>');
            return redirect()->to('/crud');
        }
    }
    public function tambah_user()
    {
        $data = [
            'username' => $this->request->getpost('user'),
            'password' => $this->request->getpost('pass'),
            'email' => $this->request->getpost('email'),
            'no_hp' => $this->request->getpost('number'),
            'level' => $this->request->getpost('level'),
            'alamat' => $this->request->getpost('alamat')
        ];
        $model = new Mymodel();
        $hasil = $model->tambah_data($data);
        if ($hasil) {
            session()->setflashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil <strong> Menambah Data ! </strong> </div>');
            return redirect()->to('/crud');
        }
    }
    public function hapus()
    {
        $uri = service('uri');
        $id = $uri->getsegment(3);

        $model = new Mymodel();
        $hapus = $model->hapus($id);
        if ($hapus) {
            session()->setflashdata('pesan', '<div class="alert alert-warning" role="alert">Berhasil <strong> Menghapus Data ! </strong> </div>');
            return redirect()->to('/crud');
        }
    }
}
