<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris_Model extends CI_Model{

  public function hitungInventaris()
	{
    $this->db->like('kd_barang');
		$this->db->from('inventaris');
		$query = $this->db->count_all_results();
		return $query;
		return $query;
	}

  public function getnumber($id_kategori)
		{
			$sql = $this->db->query("select max(mid(no_urut,1,6)) as id from inventaris where id_kategori='".$id_kategori."'");
			$kodenya = "";
			foreach ($sql->result() as $row) {
				$kodenya = $row->id+1;
			}
			return $kodenya;
		}

  public function getInventaris()
  {
     $this->db->select("*");
     $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
     $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
     $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
     $query = $this->db->get('inventaris');
     return $query->result();
  }

  public function getLaporanInventaris()
  {
     $this->db->select("*");
     $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
     $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
     $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
     $query = $this->db->get('inventaris');
     return $query;
  }


  public function getInventarisLimit()
  {
     $this->db->select("*");
     $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
     $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
     $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
     $this->db->limit(7);
     $this->db->order_by('tanggal', 'desc');
     $this->db->order_by('waktu', 'desc');
     $query = $this->db->get('inventaris');
     return $query->result();
  }
  public function getInventarisPeminjaman()
  {
     $this->db->select("*");
     $this->db->where('kondisi', "1");
     $query = $this->db->get('inventaris');
     return $query->result();
  }

  public function editStatusInventarisDiPinjam($kd_barang, $nama_peminjam)
	{
		$editInventaris = array(
      'pengguna' => $nama_peminjam,
			'kondisi' => "0",
		);
		$this->db->where('kd_barang', $kd_barang);
		$this->db->update('inventaris', $editInventaris);
	}

  public function editStatusInventarisDiKembalikan($kd_barang)
	{
		$editInventaris = array(
      'pengguna' => "Tidak ada",
			'kondisi' => "1",
		);
		$this->db->where('kd_barang', $kd_barang);
		$this->db->update('inventaris', $editInventaris);
	}

  public function editStatusInventarisDiRawat($kd_barang)
	{
		$editInventaris = array(
      'pengguna' => "-",
      'kondisi' => "2",
		);
		$this->db->where('kd_barang', $kd_barang);
		$this->db->update('inventaris', $editInventaris);
	}

  public function editStatusInventarisDiRawatBalik($kd_barang)
	{
		$editInventaris = array(
      'pengguna' => "Tidak ada",
			'kondisi' => "1",
		);
		$this->db->where('kd_barang', $kd_barang);
		$this->db->update('inventaris', $editInventaris);
	}

  public function getInventarisById($kd_barang)
	{
		$this->db->select("*");
    $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
    $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
    $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
    $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
		$this->db->where('kd_barang', $kd_barang);
		$query = $this->db->get('inventaris');
		return $query->result();
	}

  public function getInventarisByKategori($nama_kategori)
	{
		$this->db->select("*");
    $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
    $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
    $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
    $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
		$this->db->where('kategori.nama_kategori', $nama_kategori);
		$query = $this->db->get('inventaris');
		return $query->result();
	}

  public function getLaporanInventarisByKategori($nama_kategori)
	{
		$this->db->select("*");
    $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
    $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
    $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
    $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
		$this->db->where('kategori.nama_kategori', $nama_kategori);
		$query = $this->db->get('inventaris');
		return $query;
	}

  public function ambilNamaKategori($id_kategori)
  {
     $this->db->select("nama_kategori");
     $this->db->where('id_kategori', $id_kategori);
     $query = $this->db->get('kategori');
     return $query->result();
  }

  public function ambilNamaRuangan($kd_barang)
  {
     $this->db->select("*");
     $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
     $this->db->where('kd_barang', $kd_barang);
     $query = $this->db->get('inventaris');
     return $query->result();
  }

  public function insertKontrak()
	{
		$insert_kontrak = array(
				'kd_kontrak' => $this->input->post('kd_kontrak'),
        'nama_kontrak' => $this->input->post('nama_kontrak'),
			);

		$this->db->insert('kontark', $insert_kontrak);
	}

  public function editInventaris($kd_barang)
	{
		$editInventaris = array(
			'spesifikasi' => $this->input->post('spesifikasi'),
			'id_ruangan' => $this->input->post('id_ruangan'),
		);
		$this->db->where('kd_barang', $kd_barang);
		$this->db->update('inventaris', $editInventaris);
	}


  public function insertInventaris($kd_barang, $no_urut)
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

		$insert_inventaris = array(
				'id_kontrak' => $this->input->post('kd_kontrak'),
        'kd_barang' => $kd_barang,
        'no_urut' => $no_urut,
        'id_kategori' => $this->input->post('id_kategori'),
        'id_ruangan' => $this->input->post('id_ruangan'),
        'id_user' => $id_user,
        'spesifikasi' => $this->input->post('spesifikasi'),
        'tanggal' => $this->input->post('tanggal'),
        'waktu' => $waktu,
			);

		$this->db->insert('inventaris', $insert_inventaris);
	}

  public function deleteInventaris($kd_barang)
	{
		$this->db->where('kd_barang', $kd_barang);
		$this->db->delete('inventaris');
	}

}
?>
