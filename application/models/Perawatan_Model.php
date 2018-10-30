<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawatan_Model extends CI_Model{

  public function getPerawatan()
  {
     $this->db->select("*");
     $this->db->join('user', 'user.id_user = perawatan.id_user', 'left');
     $query = $this->db->get('perawatan');
     return $query->result();
  }

  public function getLaporanPerawatan()
  {
     $this->db->select("*");
     $this->db->join('user', 'user.id_user = perawatan.id_user', 'left');
     $query = $this->db->get('perawatan');
     return $query;
  }


  public function insertPerawatan()
	{
    if ($this->session->userdata('logged_in_admin')) {
      $session_data = $this->session->userdata('logged_in_admin');
    } else {
      $session_data = $this->session->userdata('logged_in_user');
    }
    $data['id_user'] = $session_data['id_user'];
    $id_user=$data['id_user'];

    date_default_timezone_set('Asia/Jakarta');
    $waktu = date("H:i:s");
    $tanggal = date("Y-m-d");

		$insert_perawatan = array(
        'kd_barang' => $this->input->post('kd_barang'),
				'id_user' => $id_user,
        'tanggal' => $tanggal,
        'waktu' => $waktu,
        'tipe' => $this->input->post('tipe'),
        'keterangan' => $this->input->post('keterangan'),
        'rekanan' => $this->input->post('rekanan'),
        'biaya' => $this->input->post('biaya'),
			);

		$this->db->insert('perawatan', $insert_perawatan);
	}

  public function deletePerawatan($id_perawatan)
	{
		$this->db->where('id_perawatan', $id_perawatan);
		$this->db->delete('perawatan');
	}

  function perawatanTerdaftar($kd_barang) {
	    $this->db->select('kd_barang');
	    $this->db->from('perawatan');
	    $this->db->where('kd_barang', $kd_barang);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

}
