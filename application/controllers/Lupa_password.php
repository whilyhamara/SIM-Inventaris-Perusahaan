<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lupa_password extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Account');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
          $title['title'] = 'Lupa Password';
          $this->load->view('global/01_header', $title);
          $this->load->view('public/form_email');
        }else{
          $email = $this->input->post('email');
          $clean = $this->security->xss_clean($email);
          $userInfo = $this->M_Account->getUserInfoByEmail($clean);

          if(!$userInfo){
              $this->session->set_flashdata('sukses', 'Email salah, silakan periksa lagi.');
              redirect(site_url('Lupa_password'),'refresh');
          }

          $token = $this->M_Account->insertToken($userInfo->id_user);
          $qstring = $this->base64url_encode($token);

          $url = site_url() . '/lupa_password/reset_password/token/' . $qstring;
          $data['url'] = $url;

          $htmlContent = "<strong>Hai, Anda menerima Email ini karena ada permintaan untuk memperbaharui password Anda.</strong><br>
              <strong>Silakan: </strong> <a href='".$url."'>Klik Disni</a><strong> untuk mereset password Anda!</strong> ";


          // Head over to Account Security Settings
          // (https://www.google.com/settings/security/lesssecureapps) and enable "Access for less secure apps",
          // this allows you to use the google smtp for clients other than the official ones.

          $config['protocol']     = 'smtp';
          $config['smtp_host']    = 'ssl://smtp.gmail.com';
          $config['smtp_port']    = '465';
          $config['smtp_timeout'] = '7';
          $config['smtp_user']    = 'mail.pikirlagi@gmail.com';
          $config['smtp_pass']    = 'masadepanyangcerah';
          $config['charset']      = 'utf-8';
          $config['newline']      = "\r\n";
          $config['crlf']         = "\r\n";
          $config['mailtype']     = 'html';
          $config['validation']   = FALSE;

          // $this->load->library('email', $config);
          $this->email->initialize($config);
          $this->email->from('mail.pikirlagi@gmail.com','PT. Pelabuhan Indonesia III');
          $this->email->to($email);
          $this->email->subject('Lupa Password');
          $this->email->message($htmlContent);
          $this->email->send();
          echo $this->email->print_debugger();
          $this->session->set_flashdata("email_sent","Silahkan cek email anda!");
          redirect('login','refresh');
        }

    }

    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->M_Account->isTokenValid($cleanToken);

        if(!$user_info){
            $this->session->set_flashdata('fail', 'Token tidak valid atau kadaluarsa');
            redirect(site_url('login'),'refresh');
        }

        $data = array(
            'title'=> 'Halaman Reset Password',
            'nama_user'=> $user_info->nama_user,
            'email'=>$user_info->email,
            'token'=>$this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $title['title'] = 'Reset Password';
            $data['nama'] = $user_info->nama_user;
            $this->load->view('global/01_header', $title);
            $this->load->view('public/reset_password', $data);
        }else{
            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = md5($cleanPost['password']);
            $cleanPost['password'] = $hashed;
            $cleanPost['id_user'] = $user_info->id_user;
            unset($cleanPost['passconf']);

            if(!$this->M_Account->updatePassword($cleanPost)){
                $this->session->set_flashdata('sukses', 'Update password gagal.');
            }else{
                $this->session->set_flashdata('sukses', 'Password anda sudah diperbaharui. Silakan login.');
            }
            redirect(site_url('login'),'refresh');
        }
    }

    public function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data) {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

    public function cekEmail()
  	{
  		$imel = $_POST["imel"];
      if(!filter_var($_POST["imel"], FILTER_VALIDATE_EMAIL)){
            echo '<label class="text-danger"><span class="fa fa-exclamation-circle"></span>Format Email Salah</span></label>';
      } else {
    		if($this->M_Account->cekEmail($imel)){
            echo '<button type="submit" class="btn btn-success">Lupa Password</button>';
        } else{
            echo '<label class="text-danger"><span class="fa fa-exclamation-circle"></span>Email Tidak Terdaftar</label>';
    		}
      }
  	}
 }
