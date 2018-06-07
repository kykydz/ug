<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');
class Master extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION['login_envoice'])){
  						$url=base_url('login');
  						redirect($url);
  				};
          $this->load->model('M_master');
  }
  public function users(){
    $data['users']=$this->M_master->data_user();
    $this->load->view('v_menu');
    $this->load->view('v_users',$data);
  }

  public function user_add(){
    $this->load->view('v_menu');
    $this->load->view('v_add_user');
  }

  public function save_user(){
    $this->load->model('M_login');
    $datauser = array(
      'full_name'=>strip_tags($this->input->post('fullname')),
      'nik_karyawan'=>strip_tags($this->input->post('nik_karyawan')),
      'jabatan'=>strip_tags($this->input->post('jabatan')),
      'email'=>strip_tags($this->input->Post('email')),
      'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
      'level'=>strip_tags($this->input->post('level')),
      'no_hp'=>strip_tags($this->input->post('nohp')),
    );
      $saveuser = $this->M_login->save_user($datauser);
        if($saveuser){
            echo $this->session->set_flashdata('msg','Registration Successful');
            redirect('Master/users');
          }else{
            echo $this->session->set_flashdata('msg','Registration Unsuccessfull');
            redirect('Master/users');
          }
      }

  public function cekemail(){
    $this->load->model('M_login');
    $email = $this->input->post('email_user');
    $cek = $this->M_login->cek_email($email);
    if($cek->num_rows() > 0){
      echo "Email Already Exist";
    }else{
      echo "OK";
    }
  }
}
