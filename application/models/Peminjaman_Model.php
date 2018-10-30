<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_Model extends CI_Model{

  public function hitungPeminjaman()
	{
    $this->db->like('id_peminjaman');
		$this->db->from('peminjaman');
		$query = $this->db->count_all_results();
		return $query;
		return $query;
	}

  public function getPeminjaman()
  {
     $this->db->select("*");
     $this->db->join('ruangan', 'ruangan.id_ruangan = peminjaman.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
     $query = $this->db->get('peminjaman');
     return $query->result();
  }

  public function getLaporanPeminjaman()
  {
     $this->db->select("*");
     $this->db->join('ruangan', 'ruangan.id_ruangan = peminjaman.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
     $query = $this->db->get('peminjaman');
     return $query;
  }

  public function deletePeminjaman($id_peminjaman)
	{
		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->delete('peminjaman');
	}

  function peminjamanTerdaftar($kd_barang) {
	    $this->db->select('kd_barang');
	    $this->db->from('peminjaman');
	    $this->db->where('kd_barang', $kd_barang);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

}
?>
