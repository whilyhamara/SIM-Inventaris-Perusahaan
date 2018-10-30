<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model{

  public function modelKetersediaanEmail($email, $id_user)
  {
    $query = $this->db->query("SELECT email FROM user WHERE email = '$email' AND id_user != '$id_user'");
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

  public function cekLupa($lupa)
  {
    $this->db->where('email', $lupa);
    $query = $this->db->get('user');
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

  public function cekUsername($iUsername)
  {
    $this->db->where('username', $iUsername);
    $query = $this->db->get('user');
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

  public function cekEmail($iEmail)
  {
    $this->db->where('email', $iEmail);
    $query = $this->db->get('user');
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

  public function cekHP($iHP)
  {
    $this->db->where('hp', $iHP);
    $query = $this->db->get('user');
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
  }

  public function login($username, $password)
	{
		$this->db->select('id_user, nama_user, username, password, email, hp, foto, status');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$query=$this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function getDataLogin()
	{
		if ($this->session->userdata('logged_in_admin')) {
			$session_data = $this->session->userdata('logged_in_admin');
		} else {
			$session_data = $this->session->userdata('logged_in_user');
		}

		$data['id_user'] = $session_data['id_user'];
		$id_user=$data['id_user'];

		$this->db->select("id_user, nama, no_identitas, email, no_hp, username, password, jenis_kelamin, alamat, foto, status");
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('user');
		return $query->result();
	}

  public function updateProfil()
	{
		if ($this->session->userdata('logged_in_admin')) {
			$session_data = $this->session->userdata('logged_in_admin');
		} else {
			$session_data = $this->session->userdata('logged_in_user');
		}

		$data['id_user'] = $session_data['id_user'];
		$id_user=$data['id_user'];

		$dataa = array(
      'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'hp' => $this->input->post('hp'),
			'foto' => $this->upload->data('file_name')
			);
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $dataa);
	}

	public function updateProfilTanpaFoto()
	{
		if ($this->session->userdata('logged_in_admin')) {
			$session_data = $this->session->userdata('logged_in_admin');
		} else {
			$session_data = $this->session->userdata('logged_in_user');
		}

		$data['id_user'] = $session_data['id_user'];
		$id_user=$data['id_user'];

		$dataa = array(
      'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'hp' => $this->input->post('hp'),
		);
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $dataa);
	}

  public function insertUser()
	{
		$password = $this->input->post('password');
		$password_encrypt=md5($password);

		$insert_user = array(
				'nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('username'),
        'password' => $password_encrypt,
				'email' => $this->input->post('email'),
				'hp' => $this->input->post('hp'),
				'foto' => $this->upload->data('file_name'),
				'status' => $this->input->post('status'),
			);

			$this->db->insert('user', $insert_user);
	}

  public function getDataUser()
	{
		$this->db->select("*");
		$query = $this->db->get('user');
		return $query->result();
	}
}
?>
