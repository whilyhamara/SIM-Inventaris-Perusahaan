<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in_admin') || $this->session->userdata('logged_in_user')){
			if ($this->session->userdata('logged_in_admin')) {
				$session_data = $this->session->userdata('logged_in_admin');
			} else {
				$session_data = $this->session->userdata('logged_in_user');
			}

			$this->load->model('Kategori_Model');
			$this->load->model('Ruangan_Model');
			$this->load->model('Inventaris_Model');
			$this->load->model('Kontrak_Model');
			$this->load->model('Riwayat_Model');
			$this->load->model('Peminjaman_Model');
			$this->load->model('Perawatan_Model');
			$this->load->library('dompdf_gen');
			$this->load->library('Excel_generator');
			$this->load->database();
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}
	}

	public function cekKetersediaanKontrak()
	{
		$kd_kontrak = $_POST["kd_kontrak"];
		if($this->Kontrak_Model->modelKetersediaanKontrak($kd_kontrak)){
        echo '<label class="text-danger"><span class="fa fa-exclamation-circle"></span>Kontrak Sudah Terdaftar</label>';
    }else{
				echo '<button id="kontrak_result" type="submit" class="btn btn-primary">Submit</button>';
				echo '<hr>';
				echo '<label class="text-success"><span class="fa fa-check-circle"></span>Kontrak Tersedia</label>';
			}
	}

	public function list_inventaris()
	{
		$title['title'] = "Daftar Inventaris";
		$data['inventaris_list'] = $this->Inventaris_Model->getInventaris();
		$data['kontrak_list'] = $this->Kontrak_Model->getKontrak();
		$this->load->view('global/01_header', $title);
		$this->load->view('inventaris/daftar_inventaris', $data);
	}

	public function tambah_inventaris()
	{
		$title['title'] = "Tambah Inventaris";

		$this->form_validation->set_rules('kd_kontrak', 'No. SPB', 'required');
		$this->form_validation->set_rules('nama_kontrak', 'Nama Kontrak', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run()==FALSE) {
			$data['kategori_list'] = $this->Kategori_Model->getKategori();
			$data['ruangan_list'] = $this->Ruangan_Model->getRuangan();
			$this->load->view('global/01_header', $title);
			$this->load->view('inventaris/tambah_inventaris', $data);
		} else {
			$this->Inventaris_Model->insertKontrak();

	    date_default_timezone_set('Asia/Jakarta');
			$waktu = date("H:i:s");
			$tanggal = $this->input->post("tanggal");

			if ($this->session->userdata('logged_in_admin')) {
				$session_data = $this->session->userdata('logged_in_admin');
			} else {
				$session_data = $this->session->userdata('logged_in_user');
			}
			$data['id_user'] = $session_data['id_user'];
			$id_user=$data['id_user'];

			$this->load->library('ciqrcode');

      $config['cacheable']    = true;
      $config['cachedir']     = './assets/';
      $config['errorlog']     = './assets/';
      $config['imagedir']     = './assets/img/qrcode/';
      $config['quality']      = true;
      $config['size']         = '1024';
      $config['black']        = array(224,255,255);
      $config['white']        = array(70,130,180);
      $this->ciqrcode->initialize($config);

	    for($i=0; $i<count($this->input->post('id_kategori')); $i++){
					$id_kategori = $this->input->post('id_kategori')[$i];
					$id_ruangan  = $this->input->post('id_ruangan')[$i];
					$spesifikasi = $this->input->post('spesifikasi')[$i];
					$jumlah = $this->input->post('jumlah')[$i];

					$no_urut = $this->Inventaris_Model->getnumber($id_kategori);
					$nama_kategori = $this->Inventaris_Model->ambilNamaKategori($id_kategori);
					foreach ($nama_kategori as $key)
					{
							$namafix = $key->nama_kategori;
					}

					$KODE = $namafix."-".$no_urut;

					for ($j=0; $j < $jumlah; $j++) {
						$image_name=$KODE.'.png';
		        $params['data'] = $KODE;
		        $params['level'] = 'H';
		        $params['size'] = 10;
		        $params['savename'] = FCPATH.$config['imagedir'].$image_name;
		        $this->ciqrcode->generate($params);

						$insertarr = array(
								'kd_barang' => $KODE,
								'no_urut' => $no_urut,
								'id_kontrak' => $this->input->post("kd_kontrak"),
		            'id_kategori' => $id_kategori,
		            'id_ruangan' => $id_ruangan,
								'id_user' => $id_user,
								'pengguna' => "Belum diinput",
		            'spesifikasi' => $spesifikasi,
								'tanggal' => $tanggal,
								'waktu' => $waktu,
								'kondisi' => "1",
								'qrcode' => $image_name,
		        );
						$this->db->insert('inventaris', $insertarr);

						$insert_riwayat = array(
								'kd_barang' => $KODE,
				        'id_user' => $id_user,
				        'id_ruangan' => $id_ruangan,
				        'tanggal' => $tanggal,
								'waktu' => $waktu,
				        'pengguna' => "Belum diinput",
				        'status_riwayat' => "1",
							);

						$this->db->insert('riwayat', $insert_riwayat);

						$no_urut = $no_urut+1;
						$KODE = $namafix."-".$no_urut;
					}

	    }
			redirect('inventaris/list_inventaris','refresh');
		}
	}

	public function detail_inventaris($kd_barang)
	{
		$satu = $this->uri->segment(4);
		$dua = $this->uri->segment(5);
		$tiga = $this->uri->segment(6);

		$data['satu'] = $satu;
		$data['dua'] = $dua;
		$data['tiga'] = $tiga;

		$data['kategori_list'] = $this->Kategori_Model->getKategori();
		$data['ruangan_list'] = $this->Ruangan_Model->getRuangan();
		$data['inventaris_detail']=$this->Inventaris_Model->getInventarisById($kd_barang);
		$data['riwayat']=$this->Riwayat_Model->getRiwayatById($kd_barang);
		$title['title'] = "Detail Inventaris";
		$this->load->view('global/01_header', $title);
		$this->load->view('inventaris/detail_inventaris', $data);
	}

	public function edit_inventaris($kd_barang)
	{
		$this->Inventaris_Model->editInventaris($kd_barang);
		$this->Riwayat_Model->insertRiwayat($kd_barang);
		redirect('inventaris/detail_inventaris/'.$kd_barang.'/fade/fade/active','refresh');
	}

	public function hapus_inventaris($kd_barang)
	{
		$kd_kontrak = $this->uri->segment(4);
		$pinjam=$this->Peminjaman_Model->peminjamanTerdaftar($kd_barang);
		$rawat=$this->Perawatan_Model->perawatanTerdaftar($kd_barang);
		if ($pinjam) {
			$this->session->set_flashdata('fail', 'Inventaris dalam masa peminjaman, kembalikan dahulu!');
			redirect('inventaris/list_inventaris','refresh');
		} else if ($rawat) {
			$this->session->set_flashdata('fail', 'Inventaris dalam masa perawatan');
			redirect('inventaris/list_inventaris','refresh');
		} else {
			$this->session->set_flashdata('inventaris_terhapus', 'Inventaris Berhasil Dihapus');
			$this->Riwayat_Model->deleteRiwayat($kd_barang);
			$this->Inventaris_Model->deleteInventaris($kd_barang);

			$kontrak=$this->Kontrak_Model->kontrakTersisa($kd_kontrak);
			if ($kontrak) {
				$this->Kontrak_Model->deleteKontrak($kd_kontrak);
			}

			unlink("assets/img/qrcode/".$kd_barang.".png");
			redirect('inventaris/list_inventaris','refresh');
		}
	}

	public function cetakpdf()
	{

	  $data['title'] = 'Cetak PDF List Inventaris';
	  $data['inventaris_list'] = $this->Inventaris_Model->getInventaris();

	  $this->load->view('inventaris/cetakLaporan', $data);

	  $paper_size  = 'A4';
	  $orientation = 'landscape';
	  $html = $this->output->get_output();

	  $this->dompdf->set_paper($paper_size, $orientation);

	  $this->dompdf->load_html($html);
	  $this->dompdf->render();
	  $this->dompdf->stream("LaporanInventaris.pdf", array('Attachment'=>0));
  }

	public function cetakxls()
	{
		$data['title'] = 'Cetak XLS List Inventaris';
		$history = $this->Inventaris_Model->getLaporanInventaris();
		$this->excel_generator->set_query($history);
		$this->excel_generator->set_header(array('Kode Barang', 'Nomor Kontrak', 'Nama Kontrak','Pengguna', 'Ruangan', 'Gedung', 'Spesifikasi', 'Tanggal', 'Jam', 'Status (1 = Tersedia)(0 = Dipinjam)(2 = Dirawat)'));
		$this->excel_generator->set_column(array('kd_barang', 'kd_kontrak', 'nama_kontrak','pengguna',  'nama_ruangan', 'nama_gedung', 'spesifikasi', 'tanggal', 'waktu', 'kondisi'));
		$this->excel_generator->set_width(array(15, 20, 20, 25, 25, 30, 35, 15, 15, 15));
		$this->excel_generator->exportTo2007('Laporan Inventaris');
	}
}

/* End of file Inventaris.php */
/* Location: ./application/controllers/inventaris/Inventaris.php */
 ?>
