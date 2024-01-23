<?php

namespace App\Models;
use CodeIgniter\Model;

class M_galeri extends Model
{		
	protected $table      = 'gambar';
	protected $primaryKey = 'id_gambar';
	protected $allowedFields = ['nama_gambar', 'album_gambar', 'like_gambar', 'komen_gambar', 'user'];
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;

	public function tampil($table1)	
	{
		return $this->db->table($table1)->where('deleted_at', null)->get()->getResult();
	}
	public function tampilGaleri($table1)	
	{
		return $this->db->table($table1)->where('deleted_at', null)->orderBy('created_at', 'DESC')->get()->getResult();
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
		->get()
		->getResult();
	}
	public function getGambarById($id)
	{
        // Ambil data gambar berdasarkan id_album
		return $this->db->table('gambar')
		->where('id_gambar', $id)
		->get()
		->getResult();
	}

	public function isLiked($idGambar, $idUser)
	{
		return $this->db->table('like')
		->where(['gambar' => $idGambar, 'user' => $idUser])
		->countAllResults() > 0;
	}

	public function hapusLike($idGambar, $idUser)
	{
		return $this->db->table('like')
		->where(['gambar' => $idGambar, 'user' => $idUser])
		->delete();
	}

	public function getLikeCount($gambarId)
	{
		return $this->db->table('like')
		->where('gambar', $gambarId)
		->countAllResults();
	}

	public function getKomentarByGambarId($gambar_id)
    {
        return $this->db->table('komentar')
            ->select('komentar.*, user.username')
            ->join('user', 'user.id_user = komentar.user')
            ->where('komentar.gambar', $gambar_id)
            ->get()
            ->getResult();
    }


	//CI4 Model
	public function deletee($id)
	{
		return $this->delete($id);
	}
}