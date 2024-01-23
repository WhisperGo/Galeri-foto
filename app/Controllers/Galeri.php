<?php

namespace App\Controllers;
use App\Models\M_galeri;

class Galeri extends BaseController
{
    public function index()
    {
        $model=new M_galeri();

        $data['title']='Galeri Foto - Galeri';
        $data['gambar']=$model->tampil('gambar');

        echo view('photofolio/partial/header', $data);
        echo view('photofolio/partial/top_menu');
        echo view('photofolio/galeri/view', $data);
        echo view('photofolio/partial/footer');
    }

    public function detail_gambar($id)
    {
        $model=new M_galeri();
        
        $data['title']='Galeri Foto - Detail Gambar';
        $data['gambar']=$model->tampil('gambar');

        echo view('photofolio/partial/header', $data);
        echo view('photofolio/partial/top_menu');
        echo view('photofolio/galeri/detail', $data);
        echo view('photofolio/partial/footer');
    }

}