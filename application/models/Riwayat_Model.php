<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_Model extends CI_Model{

  public function insertRiwayat($kd_barang)
	{
    if ($this->session->userdata('logged_in_admin')) {
			$session_data = $this->session->userdata('logged_in_admin');
		} else {
			$session_data = $this->session->userdata('logged_in_user');
		}

		$data['id_user'] = $session_data['id_user'];
		$id_user=$data['id_user'];

    $tanggal = date('Y-m-d');
    date_default_timezone_set('Asia/Jakarta');
    $waktu = date("H:i:s");

		$insert_riwayat = array(
				'kd_barang' => $kd_barang,
        'id_user' => $id_user,
        'id_ruangan' => $this->input->post('id_ruangan'),
        'tanggal' => $tanggal,
        'waktu' => $waktu,
        'pengguna' => $this->input->post('pengguna'),
        'status_riwayat' => $this->input->post('status'),
			);

		$this->db->insert('riwayat', $insert_riwayat);
	}

  public function getRiwayatById($kd_barang)
	{
		$this->db->select("*");
    $this->db->join('user', 'user.id_user = riwayat.id_user', 'left');
    $this->db->join('ruangan', 'ruangan.id_ruangan = riwayat.id_ruangan', 'left');
		$this->db->where('kd_barang', $kd_barang);
    $this->db->order_by('tanggal', 'desc');
    $this->db->order_by('waktu', 'desc');
		$query = $this->db->get('riwayat');
		return $query->result();
	}

  public function deleteRiwayat($kd_barang)
	{
		$this->db->where('kd_barang', $kd_barang);
		$this->db->delete('riwayat');
	}

} ?>
