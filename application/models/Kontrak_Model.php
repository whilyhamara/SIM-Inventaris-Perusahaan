<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak_Model extends CI_Model{

  public function modelKetersediaanKontrak($kd_kontrak)
  {
    $this->db->where('kd_kontrak', $kd_kontrak);
    $query = $this->db->get('kontark');
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

  function kontrakTersisa($kd_kontrak) {
	    $this->db->select('id_kontrak');
	    $this->db->from('inventaris');
	    $this->db->where('id_kontrak', $kd_kontrak);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return false;
	    } else {
	        return true;
	    }
	}

  public function deleteKontrak($kd_kontrak)
	{
		$this->db->where('kd_kontrak', $kd_kontrak);
		$this->db->delete('kontark');
	}

  public function hitungKontrak()
	{
    $this->db->like('kd_kontrak');
		$this->db->from('kontark');
		$query = $this->db->count_all_results();
		return $query;
		return $query;
	}

  public function getKontrak()
  {
     $this->db->select("*");
     $query = $this->db->get('kontark');
     return $query->result();
  }

  public function getKontrakLimit()
  {
     $this->db->select("*");
     $this->db->limit(10);
     $query = $this->db->get('kontark');
     return $query->result();
  }

  public function getKontrakById($kd_kontrak)
	{
		$this->db->select("*");
		$this->db->where('kd_kontrak', $kd_kontrak);
		$query = $this->db->get('kontark');
		return $query->result();
	}

  public function getBarangByKontrak($kd_kontrak)
	{
		$this->db->select("*");
    $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
    $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
		$this->db->where('id_kontrak', $kd_kontrak);
		$query = $this->db->get('inventaris');
		return $query->result();
	}
}
?>
