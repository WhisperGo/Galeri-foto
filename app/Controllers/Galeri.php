<?php

namespace App\Controllers;
use App\Models\M_album;

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

        $model=new M_album();

        $data['title']='Galeri Foto - Tambah Gambar';
        $data['album']=$model->tampil('album');

        echo view('mazer/partial/header', $data);
        echo view('mazer/gambar/create', $data);
        echo view('mazer/partial/footer');

       } else {
        return redirect()->to('login');
    }

    public function aksi_tambah_gambar()
{ 
    if(session()->get('level')== 1) {
        $a= $this->request->getPost('nama_perusahaan');
        date_default_timezone_set('Asia/Jakarta');

        $logo_perusahaan= $this->request->getFile('logo_perusahaan');
        if($logo_perusahaan && $logo_perusahaan->isValid() && ! $logo_perusahaan->hasMoved())
        {
            $imageName1 = $logo_perusahaan->getName();
            $logo_perusahaan->move('logo/logo_perusahaan',$imageName1);
        }else{
            $imageName1='logo_contoh.svg';
        }

        $logo_pdf= $this->request->getFile('logo_pdf');
        if($logo_pdf && $logo_pdf->isValid() && ! $logo_pdf->hasMoved())
        {
            $imageName2 = $logo_pdf->getName();
            $logo_pdf->move('logo/logo_pdf',$imageName2);
        }else{
            $imageName2='logo_pdf_contoh.svg';
        }

        $favicon= $this->request->getFile('favicon');
        if($favicon && $favicon->isValid() && ! $favicon->hasMoved())
        {
            $imageName3 = $favicon->getName();
            $favicon->move('logo/favicon',$imageName3);
        }else{
            $imageName3='favicon_contoh.svg';
        }

        //Yang ditambah ke user
        $data1=array(
            'nama_perusahaan'=>$a,
            'logo_perusahaan'=>$imageName1,
            'logo_pdf_perusahaan'=>$imageName2,
            'favicon_perusahaan'=>$imageName3,
        );
        $model=new M_website();
        $model->simpan('perusahaan', $data1);

        echo view('partial/header_datatable');
        echo view('partial/side_menu');
        echo view('partial/top_menu');
        echo view('partial/footer_datatable');
        return redirect()->to('data_website');
    }else {
        return redirect()->to('/');
    }
}
}
}
