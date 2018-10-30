<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_Model extends CI_Model{

  public function getKategori()
	{
		$this->db->select("id_kategori, nama_kategori");
		$query = $this->db->get('kategori');
		return $query->result();
	}

	public function insertKategori()
	{
		$insert_kategori = array(
				'nama_kategori' => $this->input->post('nama_kategori'),
			);

		$this->db->insert('kategori', $insert_kategori);
	}

	public function deleteKategori($id_kategori)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->delete('kategori');
	}

  function kategoriTerdaftar($id_kategori) {
	    $this->db->select('id_kategori');
	    $this->db->from('inventaris');
	    $this->db->where('id_kategori', $id_kategori);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

  function kategoriSudahDiInput() {
		$nama_kategori = $this->input->post('nama_kategori');
	    $this->db->select('nama_kategori');
	    $this->db->from('kategori');
	    $this->db->where('nama_kategori', $nama_kategori);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

}
