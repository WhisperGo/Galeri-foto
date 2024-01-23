<?php

namespace App\Models;
use CodeIgniter\Model;

class M_album extends Model
{		
	protected $table      = 'album';
	protected $primaryKey = 'id_album';
	protected $allowedFields = ['nama_album', 'user'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->where('deleted_at', null)->get()->getResult();
	}
	public function tampilAlbumUser()
	{
		$idUser = session()->get('id');
        // Ambil data album berdasarkan user ID
		return $this->db->table($this->table)
		->where('user', $idUser)
		->where('deleted_at', null)
		->orderBy('created_at', 'DESC')
		->get()
		->getResult();
	}
	 public function getGambarByAlbumId($id)
    {
        // Ambil data gambar berdasarkan id_album
        return $this->db->table('gambar')
            ->where('album_gambar', $id)
            ->get()
            ->getResult();
    }
	public function hapus($table, $where)
	{
		return $this->db->table($table)->delete($where);
	}
	public function simpan($table, $data)
	{
		return $this->db->table($table)->insert($data);
	}
	public function qedit($table, $data, $where)
	{
		return $this->db->table($table)->update($data, $where);
	}
	public function getWhere($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRow();
	}
	public function getWhere2($table, $where)
	{
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}
	public function join2($table1, $table2, $on)
	{
		return $this->db->table($table1)
		->join($table2, $on, 'left')
		->where('website.deleted_at', null)
		->get()
		->getResult();
	}

	public function getNamaAlbumById($id)
	{
        // Ambil nama_album berdasarkan ID album
		$album = $this->find($id);

        // Periksa apakah album ditemukan
		if ($album) {
			return $album['nama_album'];
		}

        // Jika album tidak ditemukan, kembalikan teks default atau sesuaikan sesuai kebutuhan
		return 'Album Tidak Ditemukan';
	}

	public function getDeskripsiAlbumById($id)
	{
        // Ambil nama_album berdasarkan ID album
		$album = $this->find($id);

        // Periksa apakah album ditemukan
		if ($album) {
			return $album['deskripsi_album'];
		}

        // Jika album tidak ditemukan, kembalikan teks default atau sesuaikan sesuai kebutuhan
		return 'Album Tidak Ditemukan';
	}


	//CI4 Model
	public function deletee($id)
	{
		return $this->delete($id);
	}
}