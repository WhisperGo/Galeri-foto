<?php

namespace App\Controllers;
use App\Models\M_galeri;

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

    public function tambah_gambar()
    {
       if (session()->get('level')==1) {

        $model=new M_galeri();

        $data['title']='Galeri Foto - Tambah Gambar';
        $data['album']=$model->tampil('album');

        echo view('mazer/partial/header', $data);
        echo view('mazer/gambar/create', $data);
        echo view('mazer/partial/footer');

    } else {
        return redirect()->to('login');
    }
}

public function aksi_tambah_gambar()
{ 
    if(session()->get('level')==1) {
        $a= $this->request->getPost('album');
        date_default_timezone_set('Asia/Jakarta');

        $gambar_baru= $this->request->getFile('gambar_baru');
        if($gambar_baru && $gambar_baru->isValid() && ! $gambar_baru->hasMoved())
        {
            $imageName1 = $gambar_baru->getName();
            $gambar_baru->move('@photofolio/images',$imageName1);
        }

        // $logo_pdf= $this->request->getFile('logo_pdf');
        // if($logo_pdf && $logo_pdf->isValid() && ! $logo_pdf->hasMoved())
        // {
        //     $imageName2 = $logo_pdf->getName();
        //     $logo_pdf->move('logo/logo_pdf',$imageName2);
        // }else{
        //     $imageName2='logo_pdf_contoh.svg';
        // }

        // $favicon= $this->request->getFile('favicon');
        // if($favicon && $favicon->isValid() && ! $favicon->hasMoved())
        // {
        //     $imageName3 = $favicon->getName();
        //     $favicon->move('logo/favicon',$imageName3);
        // }else{
        //     $imageName3='favicon_contoh.svg';
        // }

        //Yang ditambah ke user
        $data1=array(
            'nama_gambar'=>$imageName1,
            'album_gambar'=>$a,
            'user'=>session()->get('id')
        );
        $model=new M_galeri();
        $model->simpan('gambar', $data1);
        return redirect()->to('dashboard');
    }else {
        return redirect()->to('login');
    }
}
}

