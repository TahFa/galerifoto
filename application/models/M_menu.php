<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class M_menu extends CI_Model
{
    public function getAlbum()
    {
        $query = "SELECT `album`.*, `user`.`nama_lengkap`
                  FROM `album` JOIN `user`
                  ON `album`.`user_id` = `user`.`id`
                  ORDER BY `tanggal_buat` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getFoto($id = false)
    {
        if ($id) {
            $query = "SELECT `foto`.*, `foto`.`id` as foto_id, `user`.`username`, `album`.`id`, `album`.`nama_album`
                  FROM `foto` JOIN `user`
                  ON `foto`.`user_id` = `user`.`id`
                  JOIN `album`
                  ON `foto`.`album_id` = `album`.`id`
                  WHERE `foto_id` = $id
                  ORDER BY `tanggal_unggah` DESC
                ";
        } else {
            $query = "SELECT `foto`.*, `foto`.`id` as foto_id, `user`.`username`, `album`.`id`, `album`.`nama_album`
                  FROM `foto` JOIN `user`
                  ON `foto`.`user_id` = `user`.`id`
                  JOIN `album`
                  ON `foto`.`album_id` = `album`.`id`
                  ORDER BY `tanggal_unggah` DESC
                ";
        }
        return $this->db->query($query)->result_array();
    }

    public function getDetailFoto($id)
    {
        $query = "SELECT `foto`.*, `foto`.`id`, `user`.`username`
                  FROM `foto`
                  JOIN `user`
                  ON `foto`.`user_id` = `user`.`id`
                  WHERE `foto`.`id` = $id
                  ORDER BY `judul_foto` DESC
                ";
        return $this->db->query($query)->row_array();
    }

    public function getKomen($id)
    {
        $query = "SELECT `komentarfoto`.*, `foto`.`id` as foto_id, `user`.`username`
                  FROM `komentarfoto`
                  JOIN `foto`
                  ON `komentarfoto`.`foto_id` = `foto`.`id`
                  JOIN `user`
                  ON `komentarfoto`.`user_id` = `user`.`id`
                  WHERE `foto`.`id` = $id
                  ORDER BY `tanggal_komentar` DESC
                ";
        return $this->db->query($query)->result_array();
    }
	public function getLike($id,$userid = 0)
	{
		($userid == 0 ) ?
		$query = "SELECT `likefoto`.*
		FROM `likefoto`
		WHERE `foto_id`=$id"
		:
		$query = "SELECT `likefoto`.*
                FROM `likefoto`
                  WHERE `foto_id` = $id and `user_id` = $userid
                  
                ";
		return $this->db->query($query)->result_array();
    }
}
