<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawatan extends CI_Controller{

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
      $this->load->model('Perawatan_Model');
      $this->load->library('dompdf_gen');
      $this->load->library('Excel_generator');
      $this->load->database();
    }else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}
  }

  function daftar_perawatan()
  {
    $title['title'] = "Daftar Perawatan";
    $this->load->view('global/01_header', $title);
    $data['perawatan_list'] = $this->Perawatan_Model->getPerawatan();
    $this->load->view('perawatan/daftar_perawatan', $data);
  }

  function tambah_perawatan()
  {
    $title['title'] = "Tambah Perawatan";

		$this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
    $this->form_validation->set_rules('tipe', 'Tipe', 'required');

		if ($this->form_validation->run()==FALSE) {
			$data['inventaris_list'] = $this->Inventaris_Model->getInventarisPeminjaman();
			$this->load->view('global/01_header', $title);
			$this->load->view('perawatan/tambah_perawatan', $data);
		} else {
      if ($this->session->userdata('logged_in_admin')) {
        $session_data = $this->session->userdata('logged_in_admin');
      } else {
        $session_data = $this->session->userdata('logged_in_user');
      }
      $data['id_user'] = $session_data['id_user'];
      $id_user=$data['id_user'];
      $kd_barang = $this->input->post('kd_barang');

      date_default_timezone_set('Asia/Jakarta');
      $waktu = date("H:i:s");
      $tanggal = date("Y-m-d");

      $namaruangan = $this->Inventaris_Model->ambilNamaRuangan($kd_barang);
      foreach ($namaruangan as $key)
      {
          $namafix = $key->id_ruangan;
      }

      $insert_riwayat = array(
          'kd_barang' => $kd_barang,
          'id_user' => $id_user,
          'id_ruangan' => $namafix,
          'tanggal' => $tanggal,
          'waktu' => $waktu,
          'pengguna' => "-",
          'status_riwayat' => "2",
      );

      $this->db->insert('riwayat', $insert_riwayat);

      $this->Perawatan_Model->insertPerawatan();
      $this->Inventaris_Model->editStatusInventarisDiRawat($kd_barang);

			redirect('perawatan/daftar_perawatan','refresh');
		}

  }

  function kembali($id_perawatan)
  {
    $kd_barang = $this->uri->segment(4);
    $id_ruangan = $this->uri->segment(5);
    $this->Inventaris_Model->editStatusInventarisDiRawatBalik($kd_barang);
    $this->Perawatan_Model->deletePerawatan($id_perawatan);

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

	  $data['title'] = 'Cetak PDF List Perawatan';
	  $data['perawatan_list'] = $this->Perawatan_Model->getPerawatan();

	  $this->load->view('perawatan/cetakLaporan', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanPerawatan.pdf", array('Attachment'=>0));
  }

	public function cetakxls()
	{
		$data['title'] = 'Cetak XLS List Perawatan';
		$history = $this->Perawatan_Model->getLaporanPerawatan();
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Tipe Perawatan', 'Rekanan', 'Biaya', 'Tanggal', 'Waktu', 'Keterangan'));
		$this->excel_generator->set_column(array('kd_barang', 'tipe', 'rekanan','biaya',  'tanggal', 'waktu', 'keterangan'));
		$this->excel_generator->set_width(array(15, 20, 20, 15, 15, 15, 40));
		$this->excel_generator->exportTo2007('Laporan Perawatan');
	}
}
?>
