<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Account extends CI_Model{

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('user', array('id_user' => $id), 1);
        if($this->db->affected_rows() > 0){
              $row = $q->row();
              return $row;
        }else{
              error_log('no user found getUserInfo('.$id.')');
              return false;
        }
    }

    public function getUserInfoByEmail($email){
        $q = $this->db->get_where('user', array('email' => $email), 1);
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }
    }

    public function insertToken($user_id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date("H:i:s");
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
           'token'=> $token,
           'id_user'=>$user_id,
           'created'=>$date,
           'waktu'=>$time
        );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;
    }

    public function isTokenValid($token)
    {
        $tkn = substr($token,0,30);
        $uid = substr($token,30);

        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.id_user' => $uid), 1);

        if($this->db->affected_rows() > 0){
            $row = $q->row();
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

             if($createdTS != $todayTS){
               return false;
             }

            $user_info = $this->getUserInfo($row->id_user);
            return $user_info;
        }else{
            return false;
        }
    }

    public function updatePassword($post)
    {
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', array('password' => $post['password']));
        return true;
    }

    public function cekEmail($email)
    {
      $query = $this->db->query("SELECT email FROM user WHERE email = '$email'");
      if ($query->num_rows() > 0) {
          return true;
      } else {
          return false;
      }
    }
 }
