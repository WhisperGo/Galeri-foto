<?php

namespace App\Controllers;
use App\Models\M_album;
use App\Models\M_galeri;

class Album extends BaseController
{

    // ===================================== ALBUM ============================================

    public function index()
    {
        if (session()->get('level')==1) {

            $model=new M_album();

            $data['title'] = 'GT Gallery - Album';
            $data['gambar']=$model->tampil('gambar');
            $data['album']=$model->tampilAlbumUser('album');

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

            // Verifikasi kepemilikan album
            $user_id = session()->get('id');
            $is_owner = $model->isAlbumOwner($id, $user_id);

            if (!$is_owner) {
            // Redirect atau tindakan lain untuk akses ilegal
            return redirect()->to('/album'); // Redirect ke halaman album
        }

        $data['title'] = 'GT Gallery - Detail Gambar';
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

        $data['title'] = 'GT Gallery - Tambah Album';
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
    if (session()->get('level') == 1) {

        $a = $this->request->getPost('nama_album');
        $b = $this->request->getPost('deskripsi_album');
        date_default_timezone_set('Asia/Jakarta');

        $gambar_album = $this->request->getFile('gambar_album');

        if ($gambar_album->isValid() && !$gambar_album->hasMoved()) {
            // Mendapatkan ekstensi file
            $ext = $gambar_album->getClientExtension();

            // Membuat nama file unik dengan ID pengguna dan timestamp
            $imageName = 'cover_' . session()->get('id') . '_' . time() . '.' . $ext;

            // Pindahkan file ke folder cover
            $gambar_album->move('cover', $imageName);

            // Yang ditambah ke database
            $data1 = [
                'gambar_album' => $imageName,
                'nama_album' => $a,
                'deskripsi_album' => $b,
                'user' => session()->get('id')
            ];

            $model = new M_album();
            $model->simpan('album', $data1);

            return redirect()->to('album');
        } else {
                // Handle jika upload gagal
            return redirect()->back()->with('error', 'Gagal mengupload gambar.');
        }
    } else {
        return redirect()->to('login');
    }
}

public function hapus_album($id)
{ 
    if (session()->get('level') == 1) {
        $model = new M_album();

        // Verifikasi kepemilikan album
        $user_id = session()->get('id');
        if (!$model->isAlbumOwner($id, $user_id)) {
            // Redirect atau tindakan lain untuk akses ilegal
            return redirect()->to('/album'); // Redirect ke halaman album
        }

        $model->deletee($id);
        return redirect()->to('album');
    } else {
        return redirect()->to('login');
    }
}

public function search_user()
{
    if (session()->get('level')==1) {

        $model=new M_album();

        $data['title'] = 'GT Gallery - Search User';
        $data['gambar']=$model->tampil('gambar');
        $data['album']=$model->tampilAlbumUser('album');

        echo view('photofolio/partial/header', $data);
        echo view('photofolio/partial/top_menu');
        echo view('photofolio/album/search_user', $data);
        echo view('photofolio/partial/footer');

    } else {
        return redirect()->to('login');
    }
}


    // ===================================== GAMBAR ============================================

public function tambah_gambar()
{
    if (session()->get('level')==1) {

        $model = new M_album();

        $data['title'] = 'GT Gallery - Tambah Gambar';
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
    if(session()->get('level') == 1) {

        $a = $this->request->getPost('judul_gambar');
        $b = $this->request->getPost('deskripsi_gambar');
        $c = $this->request->getPost('album');
        date_default_timezone_set('Asia/Jakarta');

        $gambar_baru = $this->request->getFile('gambar_baru');

        if ($gambar_baru && $gambar_baru->isValid() && !$gambar_baru->hasMoved()) {
            // Mendapatkan ekstensi file
            $ext = $gambar_baru->getClientExtension();

            // Membuat nama file unik dengan ID pengguna dan timestamp
            $imageName = 'gambar_' . session()->get('id') . '_' . time() . '.' . $ext;

            // Pindahkan file ke folder images
            $gambar_baru->move('images', $imageName);

            // Yang ditambah ke database
            $data1 = [
                'judul_gambar' => $a,
                'nama_gambar' => $imageName,
                'deskripsi_gambar' => $b,
                'album_gambar' => $c,
                'user' => session()->get('id')
            ];

            $model = new M_album();
            $model->simpan('gambar', $data1);

            return redirect()->to('album/detail_album/' . $c);
        } else {
                // Handle jika upload gagal
            return redirect()->back()->with('error', 'Gagal mengupload gambar.');
        }
    } else {
        return redirect()->to('login');
    }
}

public function hapus_gambar($id)
{ 
    if (session()->get('level') == 1) {
        $model = new M_galeri();

        // Dapatkan informasi gambar
        $gambar = $model->getGambarById1($id);

        // Pastikan gambar ditemukan dan user pemilik gambar sesuai dengan yang sedang login
        if ($gambar && $gambar->user == session()->get('id')) {
            // Hapus gambar
            $model->deletee($id);

            // Redirect kembali ke halaman album/detail_album/(album_gambar)
            return redirect()->to("album/detail_album/{$gambar->album_gambar}");
        } else {
            // Jika gambar tidak ditemukan atau user tidak sesuai, redirect ke login
            return redirect()->to('login');
        }
    } else {
        // Jika user bukan admin, redirect ke login
        return redirect()->to('login');
    }
}



}