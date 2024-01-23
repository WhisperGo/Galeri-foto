<?php

namespace App\Controllers;
use App\Models\M_galeri;

class Galeri extends BaseController
{
    public function index()
    {
        $model=new M_galeri();

        $data['title'] = 'GT Gallery - Galeri';
        $data['gambar']=$model->tampilGaleri('gambar');

        echo view('photofolio/partial/header', $data);
        echo view('photofolio/partial/top_menu');
        echo view('photofolio/galeri/view', $data);
        echo view('photofolio/partial/footer');
    }

    public function detail_gambar($id)
    {
        $model = new M_galeri();

        $data['title'] = 'GT Gallery - Detail Gambar';

        $gambar_baru = $model->getGambarById($id);
        $isLiked = $model->isLiked($id, session()->get('id'));

        $data['gambar_baru'] = $gambar_baru;
        $data['isLiked'] = $isLiked;
        $data['gambar'] = $model->tampil('gambar');

        echo view('photofolio/partial/header', $data);
        echo view('photofolio/partial/top_menu');
        echo view('photofolio/galeri/detail', $data);
        echo view('photofolio/partial/footer');
    }

    public function aksi_like($id)
    { 
        if(session()->get('level')==1) {
            $model = new M_galeri();

            $idUser = session()->get('id');

        // Periksa apakah user sudah memberikan like atau belum
            if (!$model->isLiked($id, $idUser)) {
            // Jika belum, lakukan like
                $data1 = array(
                    'gambar' => $id,
                    'user' => $idUser
                );
                $model->simpan('like', $data1);
            } else {
            // Jika sudah, lakukan unlike
                $model->hapusLike($id, $idUser);
            }

            return redirect()->to('galeri/detail_gambar/'. $id);
        } else {
            return redirect()->to('login');
        }
    }


}