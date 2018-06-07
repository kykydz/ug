<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_login extends CI_Model{
  function save_vendor($datavendor){
    return $this->db->insert('env_vendor',$datavendor);
  }

  function save_user($datauser){
    return $this->db->insert('env_users',$datauser);
  }

  function cek_email($email){
    $this->db->select('*');
    $this->db->from('env_users');
    $this->db->where('email',$email);
    return $this->db->get();
  }


}
