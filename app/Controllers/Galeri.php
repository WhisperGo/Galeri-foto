<?php

namespace App\Controllers;

class Galeri extends BaseController
{
    public function index()
    {
        $data['title']='Galeri Foto - Galeri';

        echo view('photofolio/partial/header', $data);
        echo view('photofolio/partial/top_menu');
        echo view('photofolio/galeri/view');
        echo view('photofolio/partial/footer');
    }
}
