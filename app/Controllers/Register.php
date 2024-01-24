<?php

namespace App\Controllers;
use App\Models\M_login;

class Register extends BaseController
{

    public function index()
    {
        $data['title']='Register';
        echo view('mazer/partial_login/header_login', $data);
        echo view('mazer/register/view');
        echo view('mazer/partial_login/footer_login');
    }

    public function aksi_register()
    {
        $u = $this->request->getPost('username');
        $p = $this->request->getPost('password');

        $foto_profil = $this->request->getFile('foto_profil');

        if ($foto_profil->isValid() && !$foto_profil->hasMoved()) {
            // Mendapatkan ekstensi file
            $ext = $foto_profil->getClientExtension();

            // Membuat nama file unik dengan username dan timestamp
            $imageName = 'profile_' . $u . '_' . time() . '.' . $ext;

            // Pindahkan file ke folder cover
            $foto_profil->move('profile', $imageName);

            $model = new M_login();
            $data = [
                'username' => $u,
                'password' => md5($p),
                'level' => '1',
                'foto' => $imageName
            ];

            $model->simpan('user', $data);

            return redirect()->to('login');
        }
    }
}