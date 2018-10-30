<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

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
			$this->load->model('User_Model');
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}
  }

  public function cekKetersediaanEmail()
	{
    $id_user = $this->session->userdata('logged_in_admin')['id_user'];
		$email = $_POST["email"];
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
          echo '<label class="text-danger"><span class="fa fa-exclamation-circle"></span>Format Email Salah</span></label>';
    } else {
  		if($this->User_Model->modelKetersediaanEmail($email, $id_user)){
          echo '<label class="text-danger"><span class="fa fa-exclamation-circle"></span>Email Sudah Terdaftar</label>';
      } else{
  				echo '<button type="submit" class="btn btn-success">Edit</button>';
  		}
    }
	}

  public function cekEmail()
	{
		$iEmail = $_POST["iEmail"];
    if(!filter_var($_POST["iEmail"], FILTER_VALIDATE_EMAIL)){
          echo '<label class="text-danger"><span class="fa fa-exclamation-circle"></span>Format Email Salah</span></label>';
    } else {
  		if($this->User_Model->cekEmail($iEmail)){
          echo '<label class="text-danger"><span class="fa fa-exclamation-circle"></span>Email Sudah Terdaftar</label>';
      } else{
  				echo '<label class="text-success"><span class="fa fa-check-circle"></span></label>';
  		}
    }
	}

  public function cekUsername()
	{
		$iUsername = $_POST["iUsername"];
  	if($this->User_Model->cekUsername($iUsername)){
        echo '<label class="text-danger"><span class="fa fa-exclamation-circle"></span>Username Sudah Terdaftar</label>';
    } else{
  			echo '<label class="text-success"><span class="fa fa-check-circle"></span></label>';
  	}
	}

  public function cekHP()
	{
		$iHP = $_POST["iHP"];
  	if($this->User_Model->cekHP($iHP)){
        echo '<label class="text-danger"><span class="fa fa-exclamation-circle"></span>HP Sudah Terdaftar</label>';
    } else{
  			echo '<label class="text-success"><span class="fa fa-check-circle"></span></label>';
  	}
	}

  public function daftar_pegawai()
	{
    $title['title'] = "Daftar Admin/Pegawai";
    $data["user_list"] = $this->User_Model->getDataUser();
    $this->load->view('global/01_header', $title);
    $this->load->view('user/daftar_pegawai', $data);
  }

  public function tambah_pegawai()
 	{
 		$title['title'] = "Tambah Admin/Pegawai";
 		$this->form_validation->set_rules('nama_user', 'Nama', 'required');

		if ($this->form_validation->run()==FALSE) {
      $this->load->view('global/01_header', $title);
      $this->load->view('user/tambah_pegawai');
		} else {
			$config['upload_path']			='./assets/img/profil';
			$config['allowed_types']		='gif|jpg|png';
			$config['max_size']				=1000000000;
			$config['max_width']			=10240;
			$config['max_height']			=7680;
			$this->load->library('upload', $config);
			if( ! $this->upload->do_upload('userfile')){
				$this->session->set_flashdata('error', 'Masukkan Foto Profil Anda!');
        $this->load->view('global/01_header', $title);
        $this->load->view('user/tambah_pegawai');
			} else {
				$this->User_Model->insertUser();
		   	redirect('user/daftar_pegawai','refresh');
			}
		}
  }

  public function edit_profil($id_user)
	{
    $title['title'] = "Edit Profil";
    $this->load->view('global/01_header', $title);
    $this->load->view('user/edit_profil');

		$this->form_validation->set_rules('email', 'Email', 'required');


		if($this->form_validation->run()==FALSE){

		}else{
			$config['upload_path'] = './assets/img/profil';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']  = 1000000;
			$config['max_width']  = 10240;
			$config['max_height']  = 7680;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('userfile')){
				$this->User_Model->updateProfilTanpaFoto($id_user);
			} else{
				$this->User_Model->updateProfil($id_user);
			}
			redirect('login/logout','refresh');
		}
	}

	public function edit_password()
	{
		$this->load->view('user/edit_password');
	}

}
?>
