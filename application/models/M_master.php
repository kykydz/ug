<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_master extends CI_Model{
  function data_user(){
    return $this->db->get('env_users');
  }


}
