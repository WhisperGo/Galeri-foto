<?php

namespace App\Controllers;
use App\Models\M_album;

class Album extends BaseController
{

    public function index()
    {
        if (session()->get('level')==1) {

            $model=new M_album();

            $data['title']='Galeri Foto - Album';
            $data['gambar']=$model->tampil('gambar');
            $data['album']=$model->tampil('album');

            echo view('photofolio/partial/header', $data);
            echo view('photofolio/partial/top_menu');
            echo view('photofolio/album/view', $data);
            echo view('photofolio/partial/footer');

        } else {
            return redirect()->to('login');
        }
    }

    public function detail_album($id)
    {
        if (session()->get('level') == 1) {

            $model = new M_album();

        // Ambil nama_album dan deskripsi_album berdasarkan ID album
            $nama_album = $model->getNamaAlbumById($id);
            $deskripsi_album = $model->getDeskripsiAlbumById($id);

        // Ambil data gambar berdasarkan ID album
            $gambar_album = $model->getGambarByAlbumId($id);

            $data['title'] = 'Galeri Foto - Detail Gambar';
            $data['album'] = $model->tampil('album');
            $data['nama_album'] = $nama_album;
            $data['deskripsi_album'] = $deskripsi_album;
            $data['gambar_album'] = $gambar_album;

            echo view('photofolio/partial/header', $data);
            echo view('photofolio/partial/top_menu');
            echo view('photofolio/album/detail', $data);
            echo view('photofolio/partial/footer');
        } else {
            return redirect()->to('login');
        }
    }


    public function tambah_album()
    {
        if (session()->get('level')==1) {

            $model=new M_album();

            $data['title']='Galeri Foto - Tambah Album';
            $data['album']=$model->tampil('album');

            echo view('mazer/partial/header', $data);
            echo view('mazer/album/create', $data);
            echo view('mazer/partial/footer');

        } else {
            return redirect()->to('login');
        }
    } 

    public function aksi_tambah_album()
    { 
        if(session()->get('level')==1) {

            $a= $this->request->getPost('nama_album');
            $b= $this->request->getPost('deskripsi_album');
            date_default_timezone_set('Asia/Jakarta');

            $gambar_album= $this->request->getFile('gambar_album');
            if($gambar_album && $gambar_album->isValid() && ! $gambar_album->hasMoved())
            {
                $imageName1 = $gambar_album->getName();
                $gambar_album->move('cover',$imageName1);
            }else{
                $imageName1='cover.jpg';
            }

            //Yang ditambah ke user
            $data1=array(
                'gambar_album'=>$imageName1,
                'nama_album'=>$a,
                'deskripsi_album'=>$b,
                'user'=>session()->get('id')
            );
            $model=new M_album();
            $model->simpan('album', $data1);
            return redirect()->to('album');
        }else {
            return redirect()->to('login');
        }
    }

    public function hapus_album($id)
    { 
        if(session()->get('level')== 1) {

            $model=new M_album();
            $model->deletee($id);
            return redirect()->to('album');

        }else {
            return redirect()->to('login');
        }
    }

    public function tambah_gambar()
    {
        if (session()->get('level')==1) {

            $model = new M_album();

            $data['title'] = 'Galeri Foto - Tambah Gambar';
            $data['album'] = $model->tampilAlbumUser();

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
                $gambar_baru->move('images',$imageName1);
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
            $model=new M_album();
            $model->simpan('gambar', $data1);
            return redirect()->to('album');
        }else {
            return redirect()->to('login');
        }
    }

    

}