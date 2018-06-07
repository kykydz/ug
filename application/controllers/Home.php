<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');
class Home extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION['login_envoice'])){
  						$url=base_url('login');
  						redirect($url);
  				};

  }
  public function index(){
    $this->load->view('v_menu');
    $this->load->view('v_home');
  }
}
