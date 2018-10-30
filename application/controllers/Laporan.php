<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
		if($this->session->userdata('logged_in_admin') || $this->session->userdata('logged_in_user')){
			if ($this->session->userdata('logged_in_admin')) {
				$session_data = $this->session->userdata('logged_in_admin');
			} else {
				$session_data = $this->session->userdata('logged_in_user');
			}

			$data['id_user'] = $session_data['id_user'];
      $this->load->model('Kategori_Model');
			$this->load->model('Ruangan_Model');
			$this->load->model('Inventaris_Model');
			$this->load->model('Peminjaman_Model');
			$this->load->model('Perawatan_Model');
      $this->load->model('Laporan_Model');
			$this->load->library('dompdf_gen');
      $this->load->library('Excel_generator');
      $this->load->database();
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}
  }

  function index()
  {
    $title['title'] = "Pencetakan Laporan";
    $data['kategori_list'] = $this->Kategori_Model->getKategori();
    $data['ruangan_list'] = $this->Ruangan_Model->getRuangan();
    $this->load->view('global/01_header', $title);
    $this->load->view('laporan/cetakForm', $data);
  }

  public function cetak()
  {
    $kategori = $this->input->post('id_kategori');
    $ruangan = $this->input->post('id_ruangan');
    $status = $this->input->post('status');

    if ($status == "Semua Barang") {
       $status = null;
    } if ($kategori == "Semua Kategori") {
       $kategori = null;
    } if ($ruangan == "Semua Ruangan") {
       $ruangan = null;
    }

    if ($_POST['action'] == 'Cetak PDF') {
      if ($kategori == null && $ruangan == null && $status == null) {
        $this->pdffull();
      } else if($kategori != null && $ruangan != null && $status == null) {
        $this->pdfknr($kategori, $ruangan);
      } else if($kategori != null && $ruangan == null && $status == null) {
        $this->pdfk($kategori);
      } else if($kategori == null && $ruangan != null && $status == null) {
        $this->pdfr($ruangan);
      } else if($kategori == null && $ruangan == null && $status != null) {
        if($status=="Peminjaman"){
          $this->pdfpem();
        } else if($status=="Perawatan"){
          $this->pdfper();
        }
      } else if($kategori != null && $ruangan != null && $status != null) {
        if($status=="Peminjaman"){
          $this->pdfpemknr($kategori, $ruangan);
        } else if($status=="Perawatan"){
          $this->pdfperknr($kategori, $ruangan);
        }
      } else if($kategori != null && $ruangan == null && $status != null) {
        if($status=="Peminjaman"){
          $this->pdfpemk($kategori);
        } else if($status=="Perawatan"){
          $this->pdfperk($kategori);
        }
      } else if($kategori == null && $ruangan != null && $status != null) {
        if($status=="Peminjaman"){
          $this->pdfpemr($ruangan);
        } else if($status=="Perawatan"){
          $this->pdfperr($ruangan);
        }
      }

    } else if ($_POST['action'] == 'Cetak XLS') {
      if ($kategori == null && $ruangan == null && $status == null) {
        $this->xlsfull();
      } else if($kategori != null && $ruangan != null && $status == null) {
        $this->xlsknr($kategori, $ruangan);
      } else if($kategori != null && $ruangan == null && $status == null) {
        $this->xlsk($kategori);
      } else if($kategori == null && $ruangan != null && $status == null) {
        $this->xlsr($ruangan);
      } else if($kategori == null && $ruangan == null && $status != null) {
        if($status=="Peminjaman"){
          $this->xlspem();
        } else if($status=="Perawatan"){
          $this->xlsper();
        }
      } else if($kategori != null && $ruangan != null && $status != null) {
        if($status=="Peminjaman"){
          $this->xlspemknr($kategori, $ruangan);
        } else if($status=="Perawatan"){
          $this->xlsperknr($kategori, $ruangan);
        }
      } else if($kategori != null && $ruangan == null && $status != null) {
        if($status=="Peminjaman"){
          $this->xlspemk($kategori);
        } else if($status=="Perawatan"){
          $this->xlsperk($kategori);
        }
      } else if($kategori == null && $ruangan != null && $status != null) {
        if($status=="Peminjaman"){
          $this->xlspemr($ruangan);
        } else if($status=="Perawatan"){
          $this->xlsperr($ruangan);
        }
      }
    }
  }

  public function pdffull()
	{
    $data['title'] = 'Cetak PDF List Inventaris';
    $data['inventaris_list'] = $this->Inventaris_Model->getInventaris();

    $this->load->view('laporan/fullinventaris', $data);

    $paper_size  = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("LaporanInventaris.pdf", array('Attachment'=>0));
  }

  public function pdfknr($id_kategori, $id_ruangan)
	{
    $data['title'] = 'Cetak PDF List Inventaris';
    $data['inventaris_list'] = $this->Laporan_Model->pdfknr($id_kategori, $id_ruangan);

    $this->load->view('laporan/fullinventaris', $data);

    $paper_size  = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("LaporanInventaris.pdf", array('Attachment'=>0));
  }

  public function pdfk($id_kategori)
	{
    $data['title'] = 'Cetak PDF List Inventaris';
    $data['inventaris_list'] = $this->Laporan_Model->pdfk($id_kategori);

    $this->load->view('laporan/fullinventaris', $data);

    $paper_size  = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("LaporanInventaris.pdf", array('Attachment'=>0));
  }

  public function pdfr($id_ruangan)
	{
    $data['title'] = 'Cetak PDF List Inventaris';
    $data['inventaris_list'] = $this->Laporan_Model->pdfr($id_ruangan);

    $this->load->view('laporan/fullinventaris', $data);

    $paper_size  = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("LaporanInventaris.pdf", array('Attachment'=>0));
  }

  public function pdfpem()
	{

	  $data['title'] = 'Cetak PDF List Peminjaman';
	  $data['peminjaman_list'] = $this->Peminjaman_Model->getPeminjaman();

	  $this->load->view('laporan/fullpeminjaman', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanPeminjaman.pdf", array('Attachment'=>0));
  }

  public function pdfpemk($id_kategori)
	{

	  $data['title'] = 'Cetak PDF List Peminjaman';
    $nama_kategori = $this->Inventaris_Model->ambilNamaKategori($id_kategori);
    foreach ($nama_kategori as $key)
    {
        $namafix = $key->nama_kategori;
    }
	  $data['peminjaman_list'] = $this->Laporan_Model->pdfpemk($namafix);

	  $this->load->view('laporan/fullpeminjaman', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanPeminjaman.pdf", array('Attachment'=>0));
  }

  public function pdfpemr($id_ruangan)
	{

	  $data['title'] = 'Cetak PDF List Peminjaman';
	  $data['peminjaman_list'] = $this->Laporan_Model->pdfpemr($id_ruangan);

	  $this->load->view('laporan/fullpeminjaman', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanPeminjaman.pdf", array('Attachment'=>0));
  }

  public function pdfpemknr($id_kategori, $id_ruangan)
	{

	  $data['title'] = 'Cetak PDF List Peminjaman';
    $nama_kategori = $this->Inventaris_Model->ambilNamaKategori($id_kategori);
    foreach ($nama_kategori as $key)
    {
        $namafix = $key->nama_kategori;
    }
	  $data['peminjaman_list'] = $this->Laporan_Model->pdfpemknr($namafix, $id_ruangan);

	  $this->load->view('laporan/fullpeminjaman', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanPeminjaman.pdf", array('Attachment'=>0));
  }

  public function pdfper()
	{
    $data['title'] = 'Cetak PDF List Perawatan';
	  $data['perawatan_list'] = $this->Perawatan_Model->getPerawatan();

	  $this->load->view('laporan/fullperawatan', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanPerawatan.pdf", array('Attachment'=>0));
  }

  public function pdfperknr($id_kategori, $id_ruangan)
	{

	  $data['title'] = 'Cetak PDF List Perawatan';
	  $data['perawatan_list'] = $this->Laporan_Model->pdfperknr($id_kategori, $id_ruangan);

	  $this->load->view('laporan/fullperawatan', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanPerawatan.pdf", array('Attachment'=>0));
  }

  public function pdfperk($id_kategori)
	{

	  $data['title'] = 'Cetak PDF List Perawatan';
    $nama_kategori = $this->Inventaris_Model->ambilNamaKategori($id_kategori);
    foreach ($nama_kategori as $key)
    {
        $namafix = $key->nama_kategori;
    }
    $data['perawatan_list'] = $this->Laporan_Model->pdfperk($namafix);

	  $this->load->view('laporan/fullperawatan', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanPerawatan.pdf", array('Attachment'=>0));
  }

  public function pdfperr($id_ruangan)
	{
	  $data['title'] = 'Cetak PDF List Perawatan';
	  $data['perawatan_list'] = $this->Laporan_Model->pdfperr($id_ruangan);

	  $this->load->view('laporan/fullperawatan', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanPerawatan.pdf", array('Attachment'=>0));
  }

	public function xlsfull()
	{
		$data['title'] = 'Cetak XLS List Inventaris';
		$history = $this->Inventaris_Model->getLaporanInventaris();
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Nomor Kontrak', 'Nama Kontrak','Pengguna', 'Ruangan', 'Gedung', 'Spesifikasi', 'Tanggal', 'Jam', 'Status (1 = Tersedia)(0 = Dipinjam)(2 = Dirawat)'));
		$this->excel_generator->set_column(array('kd_barang', 'kd_kontrak', 'nama_kontrak','pengguna',  'nama_ruangan', 'nama_gedung', 'spesifikasi', 'tanggal', 'waktu', 'kondisi'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 30, 35, 15, 15, 15));
		$this->excel_generator->exportTo2007('Laporan Inventaris');
	}

  public function xlsknr($id_kategori, $id_ruangan)
	{
    $data['title'] = 'Cetak XLS List Inventaris';
		$history = $this->Laporan_Model->xlsknr($id_kategori, $id_ruangan);
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Nomor Kontrak', 'Nama Kontrak','Pengguna', 'Ruangan', 'Gedung', 'Spesifikasi', 'Tanggal', 'Jam', 'Status (1 = Tersedia)(0 = Dipinjam)(2 = Dirawat)'));
		$this->excel_generator->set_column(array('kd_barang', 'kd_kontrak', 'nama_kontrak','pengguna',  'nama_ruangan', 'nama_gedung', 'spesifikasi', 'tanggal', 'waktu', 'kondisi'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 30, 35, 15, 15, 15));
		$this->excel_generator->exportTo2007('Laporan Inventaris');
  }

  public function xlsk($id_kategori)
	{
    $data['title'] = 'Cetak XLS List Inventaris';
		$history = $this->Laporan_Model->xlsk($id_kategori);
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Nomor Kontrak', 'Nama Kontrak','Pengguna', 'Ruangan', 'Gedung', 'Spesifikasi', 'Tanggal', 'Jam', 'Status (1 = Tersedia)(0 = Dipinjam)(2 = Dirawat)'));
		$this->excel_generator->set_column(array('kd_barang', 'kd_kontrak', 'nama_kontrak','pengguna',  'nama_ruangan', 'nama_gedung', 'spesifikasi', 'tanggal', 'waktu', 'kondisi'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 30, 35, 15, 15, 15));
		$this->excel_generator->exportTo2007('Laporan Inventaris');
  }

  public function xlsr($id_ruangan)
	{
    $data['title'] = 'Cetak XLS List Inventaris';
		$history = $this->Laporan_Model->xlsr($id_ruangan);
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Nomor Kontrak', 'Nama Kontrak','Pengguna', 'Ruangan', 'Gedung', 'Spesifikasi', 'Tanggal', 'Jam', 'Status (1 = Tersedia)(0 = Dipinjam)(2 = Dirawat)'));
		$this->excel_generator->set_column(array('kd_barang', 'kd_kontrak', 'nama_kontrak','pengguna',  'nama_ruangan', 'nama_gedung', 'spesifikasi', 'tanggal', 'waktu', 'kondisi'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 30, 35, 15, 15, 15));
		$this->excel_generator->exportTo2007('Laporan Inventaris');
  }

  public function xlspem()
	{
    $data['title'] = 'Cetak XLS List Peminjaman';
		$history = $this->Peminjaman_Model->getLaporanPeminjaman();
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Lokasi', 'Tanggal', 'Waktu', 'NIP Pengguna', 'Nama Pengguna'));
		$this->excel_generator->set_column(array('kd_barang', 'nama_ruangan', 'tanggal','waktu',  'nip', 'nama_peminjam'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 30, 35, 15, 15, 15));
		$this->excel_generator->exportTo2007('Laporan Peminjaman');
  }

  public function xlsper()
	{
    $data['title'] = 'Cetak XLS List Perawatan';
		$history = $this->Perawatan_Model->getLaporanPerawatan();
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Tipe Perawatan', 'Rekanan', 'Biaya', 'Tanggal', 'Waktu', 'Keterangan'));
		$this->excel_generator->set_column(array('kd_barang', 'tipe', 'rekanan','biaya',  'tanggal', 'waktu', 'keterangan'));
		$this->excel_generator->set_width(array(15, 20, 20, 15, 15, 15, 40));
		$this->excel_generator->exportTo2007('Laporan Peminjaman');
  }


  public function xlspemk($id_kategori)
	{
    $data['title'] = 'Cetak XLS List Peminjaman';
    $nama_kategori = $this->Inventaris_Model->ambilNamaKategori($id_kategori);
    foreach ($nama_kategori as $key)
    {
        $namafix = $key->nama_kategori;
    }
		$history = $this->Laporan_Model->xlspemk($namafix);
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Lokasi', 'Tanggal', 'Waktu', 'NIP Pengguna', 'Nama Pengguna'));
		$this->excel_generator->set_column(array('kd_barang', 'nama_ruangan', 'tanggal','waktu',  'nip', 'nama_peminjam'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 30, 35, 15, 15, 15));
		$this->excel_generator->exportTo2007('Laporan Peminjaman');
  }

  public function xlspemr($id_ruangan)
	{
    $data['title'] = 'Cetak XLS List Peminjaman';
		$history = $this->Laporan_Model->xlspemr($id_ruangan);
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Lokasi', 'Tanggal', 'Waktu', 'NIP Pengguna', 'Nama Pengguna'));
		$this->excel_generator->set_column(array('kd_barang', 'nama_ruangan', 'tanggal','waktu',  'nip', 'nama_peminjam'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 30, 35, 15, 15, 15));
		$this->excel_generator->exportTo2007('Laporan Peminjaman');
  }

  public function xlspemknr($id_kategori, $id_ruangan)
	{
    $data['title'] = 'Cetak XLS List Peminjaman';
    $nama_kategori = $this->Inventaris_Model->ambilNamaKategori($id_kategori);
    foreach ($nama_kategori as $key)
    {
        $namafix = $key->nama_kategori;
    }
		$history = $this->Laporan_Model->xlspemknr($namafix, $id_ruangan);
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Lokasi', 'Tanggal', 'Waktu', 'NIP Pengguna', 'Nama Pengguna'));
		$this->excel_generator->set_column(array('kd_barang', 'nama_ruangan', 'tanggal','waktu',  'nip', 'nama_peminjam'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 30, 35, 15, 15, 15));
		$this->excel_generator->exportTo2007('Laporan Peminjaman');
  }

  public function xlsperknr($id_kategori, $id_ruangan)
	{
    $data['title'] = 'Cetak XLS List Perawatan';

		$history = $this->Laporan_Model->xlsperknr($id_kategori, $id_ruangan);
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Tipe Perawatan', 'Rekanan', 'Biaya', 'Tanggal', 'Waktu', 'Keterangan'));
		$this->excel_generator->set_column(array('kd_barang', 'tipe', 'rekanan','biaya',  'tanggal', 'waktu', 'keterangan'));
		$this->excel_generator->set_width(array(15, 20, 20, 15, 15, 15, 40));
		$this->excel_generator->exportTo2007('Laporan Peminjaman');
  }

  public function xlsperk($id_kategori)
	{
    $data['title'] = 'Cetak XLS List Perawatan';
    $nama_kategori = $this->Inventaris_Model->ambilNamaKategori($id_kategori);
    foreach ($nama_kategori as $key)
    {
        $namafix = $key->nama_kategori;
    }
		$history = $this->Laporan_Model->xlsperk($namafix);
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Tipe Perawatan', 'Rekanan', 'Biaya', 'Tanggal', 'Waktu', 'Keterangan'));
		$this->excel_generator->set_column(array('kd_barang', 'tipe', 'rekanan','biaya',  'tanggal', 'waktu', 'keterangan'));
		$this->excel_generator->set_width(array(15, 20, 20, 15, 15, 15, 40));
		$this->excel_generator->exportTo2007('Laporan Peminjaman');
  }

  public function xlsperr($id_ruangan)
	{
    $data['title'] = 'Cetak XLS List Perawatan';
		$history = $this->Laporan_Model->xlsperr($id_ruangan);
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Tipe Perawatan', 'Rekanan', 'Biaya', 'Tanggal', 'Waktu', 'Keterangan'));
		$this->excel_generator->set_column(array('kd_barang', 'tipe', 'rekanan','biaya',  'tanggal', 'waktu', 'keterangan'));
		$this->excel_generator->set_width(array(15, 20, 20, 15, 15, 15, 40));
		$this->excel_generator->exportTo2007('Laporan Peminjaman');
  }

}
?>
