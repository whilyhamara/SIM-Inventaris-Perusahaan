<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_Model');
    if($this->session->userdata('logged_in_admin') || $this->session->userdata('logged_in_user') || $this->session->userdata('logged_in_pegawai') ){
			if ($this->session->userdata('logged_in_admin')) {
				$session_data = $this->session->userdata('logged_in_admin');
			} else if ($this->session->userdata('logged_in_user')) {
				$session_data = $this->session->userdata('logged_in_user');
			} else {
        $session_data = $this->session->userdata('logged_in_pegawai');
      }

			$data['id_user'] = $session_data['id_user'];
      // redirect('dashboard','refresh');
		}
  }

  function index()
  {
    $title['title'] = 'Login';
    $this->load->view('global/01_header', $title);
    $this->load->view('public/login');
  }

  public function cekLogin()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDB');
    if ($this->form_validation->run()==FALSE) {
      $data['title'] = 'Login';
      $this->load->view('global/01_header', $data);
      $this->load->view('public/login', $data);

    } else {
      // redirect('dashboard','refresh');
      redirect('dashboard','refresh');
    }
  }

  // public function cekCaptcha()
  // {
  //   if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
  //     echo "<p>Captcha Anda salah</p>";
  //   }else{    
  //     echo "<p>Captcha Anda Benar</p>";
  //   }
    
  // }

  public function cekDB($password)
  {
    $username = $this->input->post('username');
    $result = $this->User_Model->login($username,$password);
    if($result){
      $sess_array = array();
      foreach ($result as $row) {
        $sess_array = array(
          'id_user'=>$row->id_user,
          'nama_user'=> $row->nama_user,
          'username'=> $row->username,
          'password'=>$row->password,
          'email'=>$row->email,
          'hp'=>$row->hp,
          'foto'=>$row->foto,
          'status'=> $row->status,
        );
        $status=$sess_array['status'];
        $this->session->set_userdata('logged_in_'.$status.'', $sess_array);

      }

      return true;
    }else{
      $this->form_validation->set_message('cekDB',"Login Gagal Username dan Password tidak valid");
      return false;
    }

  }


  public function logout()
  {
    if ($this->session->userdata('logged_in_admin')) {
        $this->session->unset_userdata('logged_in_admin');
    } else if ($this->session->userdata('logged_in_user')){
        $this->session->unset_userdata('logged_in_user');
    } else {
        $this->session->unset_userdata('logged_in_pegawai');
      }

    $this->session->sess_destroy();
    redirect('login','refresh');
  }
}
?>
