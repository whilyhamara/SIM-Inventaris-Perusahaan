<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_Model extends CI_Model{

  public function cekRuangan($nama_ruangan)
  {
    $this->db->where('nama_ruangan', $nama_ruangan);
    $query = $this->db->get('ruangan');
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

  public function getRuangan()
	{
		$this->db->select("id_ruangan, kd_ruangan, nama_ruangan, nama_gedung");
		$query = $this->db->get('ruangan');
		return $query->result();
	}

  public function getRuanganById($id_ruangan)
	{
		$this->db->select("*");
		$this->db->where('id_ruangan', $id_ruangan);
		$query = $this->db->get('ruangan');
		return $query->result();
	}

  public function editRuangan($id_ruangan)
	{
		$edit_ruangan = array(
			'kd_ruangan' => $this->input->post('kd_ruangan'),
			'nama_ruangan' => $this->input->post('nama_ruangan'),
			'nama_gedung' => $this->input->post('nama_gedung'),
		);
		$this->db->where('id_ruangan', $id_ruangan);
		$this->db->update('ruangan', $edit_ruangan);
	}

	public function insertRuangan()
	{
		$insert_ruangan = array(
        'kd_ruangan' => $this->input->post('kd_ruangan'),
				'nama_ruangan' => $this->input->post('nama_ruangan'),
        'nama_gedung' => $this->input->post('nama_gedung'),
			);

		$this->db->insert('ruangan', $insert_ruangan);
	}

	public function deleteRuangan($id_ruangan)
	{
		$this->db->where('id_ruangan', $id_ruangan);
		$this->db->delete('ruangan');
	}

  function ruanganTerdaftar($id_ruangan) {
	    $this->db->select('id_ruangan');
	    $this->db->from('inventaris');
	    $this->db->where('id_ruangan', $id_ruangan);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

  function kodeRuanganSudahDiInput() {
		  $kd_ruangan = $this->input->post('kd_ruangan');
	    $this->db->select('kd_ruangan');
	    $this->db->from('ruangan');
	    $this->db->where('kd_ruangan', $kd_ruangan);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

  function namaRuanganSudahDiInput() {
		  $nama_ruangan = $this->input->post('nama_ruangan');
	    $this->db->select('nama_ruangan');
	    $this->db->from('ruangan');
	    $this->db->where('nama_ruangan', $nama_ruangan);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

}
?>
