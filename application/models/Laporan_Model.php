<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Model extends CI_Model{

  public function pdfknr($id_kategori, $id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
     $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
     $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
     $this->db->where('inventaris.id_kategori', $id_kategori);
     $this->db->where('inventaris.id_ruangan', $id_ruangan);
     $query = $this->db->get('inventaris');
     return $query->result();
  }

  public function pdfk($id_kategori)
  {
     $this->db->select("*");
     $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
     $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
     $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
     $this->db->where('inventaris.id_kategori', $id_kategori);
     $query = $this->db->get('inventaris');
     return $query->result();
  }

  public function pdfr($id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
     $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
     $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
     $this->db->where('inventaris.id_ruangan', $id_ruangan);
     $query = $this->db->get('inventaris');
     return $query->result();
  }

  public function pdfpemk($namafix)
  {
     $this->db->select("*");
     $this->db->join('ruangan', 'ruangan.id_ruangan = peminjaman.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
     $this->db->like('peminjaman.kd_barang', $namafix);
     $query = $this->db->get('peminjaman');
     return $query->result();
  }

  public function pdfpemr($id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('ruangan', 'ruangan.id_ruangan = peminjaman.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
     $this->db->where('peminjaman.id_ruangan', $id_ruangan);
     $query = $this->db->get('peminjaman');
     return $query->result();
  }

  public function pdfpemknr($namafix, $id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('ruangan', 'ruangan.id_ruangan = peminjaman.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
     $this->db->like('peminjaman.kd_barang', $namafix);
     $this->db->where('peminjaman.id_ruangan', $id_ruangan);
     $query = $this->db->get('peminjaman');
     return $query->result();
  }

  public function pdfperknr($id_kategori, $id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('user', 'user.id_user = perawatan.id_user', 'left');
     $this->db->where('perawatan.id_kategori', $id_kategori);
     $this->db->where('perawatan.id_ruangan', $id_ruangan);
     $query = $this->db->get('perawatan');
     return $query->result();
  }

  public function pdfperk($namafix)
  {
     $this->db->select("*");
     $this->db->join('user', 'user.id_user = perawatan.id_user', 'left');
     $this->db->like('perawatan.kd_barang', $namafix);
     $query = $this->db->get('perawatan');
     return $query->result();
  }

  public function pdfperr($id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('user', 'user.id_user = perawatan.id_user', 'left');
     $this->db->where('perawatan.id_ruangan', $id_ruangan);
     $query = $this->db->get('perawatan');
     return $query->result();
  }

  //xls
  public function xlsknr($id_kategori, $id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
     $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
     $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
     $this->db->where('inventaris.id_kategori', $id_kategori);
     $this->db->where('inventaris.id_ruangan', $id_ruangan);
     $query = $this->db->get('inventaris');
     return $query;
  }

  public function xlsk($id_kategori)
  {
     $this->db->select("*");
     $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
     $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
     $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
     $this->db->where('inventaris.id_kategori', $id_kategori);
     $query = $this->db->get('inventaris');
     return $query;
  }

  public function xlsr($id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('kontark', 'kontark.kd_kontrak = inventaris.id_kontrak', 'left');
     $this->db->join('kategori', 'kategori.id_kategori = inventaris.id_kategori', 'left');
     $this->db->join('ruangan', 'ruangan.id_ruangan = inventaris.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = inventaris.id_user', 'left');
     $this->db->where('inventaris.id_ruangan', $id_ruangan);
     $query = $this->db->get('inventaris');
     return $query;
  }

  public function xlspemk($namafix)
  {
     $this->db->select("*");
     $this->db->join('ruangan', 'ruangan.id_ruangan = peminjaman.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
     $this->db->like('peminjaman.kd_barang', $namafix);
     $query = $this->db->get('peminjaman');
     return $query;
  }

  public function xlspemr($id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('ruangan', 'ruangan.id_ruangan = peminjaman.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
     $this->db->where('peminjaman.id_ruangan', $id_ruangan);
     $query = $this->db->get('peminjaman');
     return $query;
  }

  public function xlspemknr($namafix, $id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('ruangan', 'ruangan.id_ruangan = peminjaman.id_ruangan', 'left');
     $this->db->join('user', 'user.id_user = peminjaman.id_user', 'left');
     $this->db->like('peminjaman.kd_barang', $namafix);
     $this->db->where('peminjaman.id_ruangan', $id_ruangan);
     $query = $this->db->get('peminjaman');
     return $query;
  }

  public function xlsperknr($id_kategori, $id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('user', 'user.id_user = perawatan.id_user', 'left');
     $this->db->where('perawatan.id_kategori', $id_kategori);
     $this->db->where('perawatan.id_ruangan', $id_ruangan);
     $query = $this->db->get('perawatan');
     return $query;
  }

  public function xlsperk($namafix)
  {
     $this->db->select("*");
     $this->db->join('user', 'user.id_user = perawatan.id_user', 'left');
     $this->db->like('perawatan.kd_barang', $namafix);
     $query = $this->db->get('perawatan');
     return $query;
  }

  public function xlsperr($id_ruangan)
  {
     $this->db->select("*");
     $this->db->join('user', 'user.id_user = perawatan.id_user', 'left');
     $this->db->where('perawatan.id_ruangan', $id_ruangan);
     $query = $this->db->get('perawatan');
     return $query;
  }

}
?>
