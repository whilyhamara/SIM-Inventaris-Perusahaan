<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
			$this->load->model('Inventaris_Model');
			$this->load->library('dompdf_gen');
      $this->load->library('Excel_generator');
      $this->load->database();
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}
	}

	public function daftar_kategori()
	{
		$title['title'] = "Daftar Kategori";
		$data['kategori_list'] = $this->Kategori_Model->getKategori();
		$this->load->view('global/01_header', $title);
		$this->load->view('kategori/daftar_kategori', $data);

	}

	public function tambah_kategori()
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

		if ($this->form_validation->run()==FALSE) {
			$title['title'] = "Daftar Kategori";
			$data['kategori_list'] = $this->Kategori_Model->getKategori();
			$this->load->view('global/01_header', $title);
			$this->load->view('kategori/daftar_kategori', $data);
		} else {
			$kategori = $this->Kategori_Model->kategoriSudahDiInput();
			if ($kategori) {
				$this->session->set_flashdata('kategori_gagal', 'Kategori yang diinput sudah ada!');
			} else {
				$this->Kategori_Model->insertKategori();
				$this->session->set_flashdata('kategori_add', 'Kategori Berhasil Ditambahkan!');
			}
			redirect('Kategori/daftar_kategori','refresh');

		}
	}

	public function edit_kategori($id_kategori)
	{
		$title['title'] = "Edit Kategori";

		$this->form_validation->set_rules('nama_kategori', 'KODE', 'required');

		if($this->form_validation->run()==FALSE){
			$data['get_kategori'] = $this->Kategori_Model->getKategoriById($id_kategori);
			$this->load->view('global/01_header', $title);
			$this->load->view('kategori/edit_kategori', $data);
		}else{
			$this->Kategori_Model->editKategori($id_kategori);
			$this->session->set_flashdata('kategori_add', 'Kategori Berhasil Diedit!');
			redirect('kategori/daftar_kategori','refresh');
		}
	}

	public function hapus_kategori($id_kategori)
	{
		$terdaftar=$this->Kategori_Model->kategoriTerdaftar($id_kategori);
		if ($terdaftar) {
			$this->session->set_flashdata('fail', 'Tidak dapat menghapus, Kategori tersebut telah terdaftar dalam inventaris!');
			redirect('Kategori/daftar_kategori','refresh');
		} else {
			$this->session->set_flashdata('kategori_terhapus', 'Kategori Berhasil Dihapus');
			$this->Kategori_Model->deleteKategori($id_kategori);
			redirect('Kategori/daftar_kategori','refresh');
		}
	}

	public function detail_kategori($nama_kategori)
	{
		$title['title'] = "Detail Kategori";

		$data['detail_kategori']=$this->Inventaris_Model->getInventarisByKategori($nama_kategori);
		$data['namafix']= $nama_kategori;

		$this->load->view('global/01_header', $title);
		$this->load->view('kategori/detail_kategori', $data);
	}

	public function cetakpdf($nama_kategori)
	{
	  $data['title'] = 'Cetak PDF List Kategori';
	  $data['kategori_list'] = $this->Inventaris_Model->getInventarisByKategori($nama_kategori);
		$data['namafix'] = $nama_kategori;

	  $this->load->view('kategori/cetakLaporan', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanBarang.pdf", array('Attachment'=>0));
  }

	public function cetakxls($nama_kategori)
	{
		$data['title'] = 'Cetak XLS List Peminjaman';
		$history = $this->Inventaris_Model->getLaporanInventarisByKategori($nama_kategori);
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Nomor Kontrak', 'Nama Kontrak', 'Ruangan', 'Gedung', 'Tanggal', 'Waktu', 'Spesifikasi', 'Pengguna', 'Kondisi'));
		$this->excel_generator->set_column(array('kd_barang', 'kd_kontrak', 'nama_kontrak','nama_ruangan',  'nama_gedung', 'tanggal', 'waktu', 'spesifikasi', 'pengguna', 'kondisi'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 15, 15, 35, 25, 15));
		$this->excel_generator->exportTo2007('Laporan Kategori');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/kategori/Kategori.php */ ?>
