<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller{

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
			$this->load->model('Inventaris_Model');
      $this->load->model('Ruangan_Model');
      $this->load->model('Peminjaman_Model');
      $this->load->library('dompdf_gen');
      $this->load->library('Excel_generator');
      $this->load->database();
    }else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}
  }

  function daftar_peminjaman()
  {
    $title['title'] = "Daftar Peminjaman";
    $this->load->view('global/01_header', $title);
    $data['peminjaman_list'] = $this->Peminjaman_Model->getPeminjaman();
    $this->load->view('peminjaman/daftar_peminjaman', $data);
  }

  function tambah_peminjaman()
  {
    $title['title'] = "Tambah Peminjaman";

		$this->form_validation->set_rules('nip[]', 'NIP', 'required');

		if ($this->form_validation->run()==FALSE) {
			$data['inventaris_list'] = $this->Inventaris_Model->getInventarisPeminjaman();
			$data['ruangan_list'] = $this->Ruangan_Model->getRuangan();
			$this->load->view('global/01_header', $title);
			$this->load->view('peminjaman/tambah_peminjaman', $data);
		} else {
	    date_default_timezone_set('Asia/Jakarta');
			$waktu = date("H:i:s");
			$tanggal = date("Y-m-d");

			if ($this->session->userdata('logged_in_admin')) {
				$session_data = $this->session->userdata('logged_in_admin');
			} else {
				$session_data = $this->session->userdata('logged_in_user');
			}
			$data['id_user'] = $session_data['id_user'];
			$id_user=$data['id_user'];

	    for($i=0; $i<count($this->input->post('kd_barang')); $i++){
					$kd_barang = $this->input->post('kd_barang')[$i];
					$id_ruangan  = $this->input->post('id_ruangan')[$i];
					$nip = $this->input->post('nip')[$i];
					$nama_peminjam = $this->input->post('nama_peminjam')[$i];

					$insertarr = array(
							'kd_barang' => $kd_barang,
		          'id_ruangan' => $id_ruangan,
						  'id_user' => $id_user,
							'nip' => $nip,
		          'nama_peminjam' => $nama_peminjam,
							'tanggal' => $tanggal,
							'waktu' => $waktu,
		        );
					$this->db->insert('peminjaman', $insertarr);

          $insert_riwayat = array(
              'kd_barang' => $kd_barang,
              'id_user' => $id_user,
              'id_ruangan' => $id_ruangan,
              'tanggal' => $tanggal,
              'waktu' => $waktu,
              'pengguna' => $nama_peminjam,
              'status_riwayat' => "0",
            );

          $this->db->insert('riwayat', $insert_riwayat);

          $this->Inventaris_Model->editStatusInventarisDiPinjam($kd_barang, $nama_peminjam);
	    }
			redirect('peminjaman/daftar_peminjaman','refresh');
		}

  }

  function kembali($id_peminjaman)
  {
    $kd_barang = $this->uri->segment(4);
    $id_ruangan = $this->uri->segment(5);
    $this->Inventaris_Model->editStatusInventarisDiKembalikan($kd_barang);
    $this->Peminjaman_Model->deletePeminjaman($id_peminjaman);

    $namaruangan = $this->Inventaris_Model->ambilNamaRuangan($kd_barang);
    foreach ($namaruangan as $key)
    {
        $namafix = $key->id_ruangan;
    }

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

    $insert_riwayat = array(
        'kd_barang' => $kd_barang,
        'id_user' => $id_user,
        'id_ruangan' => $namafix,
        'tanggal' => $tanggal,
        'waktu' => $waktu,
        'pengguna' => "Tidak ada",
        'status_riwayat' => "1",
      );

    $this->db->insert('riwayat', $insert_riwayat);

    redirect('inventaris/detail_inventaris/'.$kd_barang.'/fade/fade/active','refresh');
  }

  public function cetakpdf()
	{

	  $data['title'] = 'Cetak PDF List Peminjaman';
	  $data['peminjaman_list'] = $this->Peminjaman_Model->getPeminjaman();

	  $this->load->view('peminjaman/cetakLaporan', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanPeminjaman.pdf", array('Attachment'=>0));
  }

	public function cetakxls()
	{
		$data['title'] = 'Cetak XLS List Peminjaman';
		$history = $this->Peminjaman_Model->getLaporanPeminjaman();
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Lokasi', 'Tanggal', 'Waktu', 'NIP Pengguna', 'Nama Pengguna'));
		$this->excel_generator->set_column(array('kd_barang', 'nama_ruangan', 'tanggal','waktu',  'nip', 'nama_peminjam'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 30, 35, 15, 15, 15));
		$this->excel_generator->exportTo2007('Laporan Peminjaman');
	}
}
