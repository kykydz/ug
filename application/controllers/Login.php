<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_login');
	}

	public function signinup(){
		$this->load->view('v_login');
	}

	public function index()
	{
		$this->load->view('v_landing');
	}

	public function vendor(){
		$email = strip_tags($this->input->post('email'));
		$cek = $this->M_login->cek_email($email)->num_rows();
		if($cek < 1){
			$datavendor = array(
				'nama_vendor'=>strip_tags($this->input->post('company')),
				'alamat_vendor'=>strip_tags($this->input->post('address')),
				'no_telpon_vendor'=>strip_tags($this->input->post('contact')),
				'email_vendor'=>strip_tags($this->input->post('email')),
				'npwp_vendor'=>strip_tags($this->input->post('npwp')),
				'no_siup'=>strip_tags($this->input->post('siup')),
				'bidang_usaha'=>strip_tags($this->input->post('bidang_usaha')),
				'no_rekening'=>strip_tags($this->input->post('no_rekening')),
				'nama_bank'=>strip_tags($this->input->post('nama_bank'))
			);
			$datauser = array(
				'full_name'=>strip_tags($this->input->post('company')),
				'nik_karyawan'=>'VENDOR-001',
				'jabatan'=>'Vendor',
				'email'=>strip_tags($this->input->Post('email')),
				'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'level'=>'Vendor',
				'no_hp'=>strip_tags($this->input->post('contact')),
			);

			$savevendor = $this->M_login->save_vendor($datavendor);
			if($savevendor){
				$saveuser = $this->M_login->save_user($datauser);
				if($saveuser){
					echo $this->session->set_flashdata('msg','Registration Successful');
					redirect('Login');
				}
			}else{
				echo $this->session->set_flashdata('msg','Registration Failed');
				redirect('Login');
			}
		}else{
				echo $this->session->set_flashdata('msg','Email Has Been Registered');
				redirect('Login');
		}

	}

	public function auth(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->M_login->cek_email($email);
		$datauser = $user->row_array();
		if($datauser !=null){

			if(password_verify($password,$datauser['password'])){
				$datasession=array(
					'login_envoice'=>true,
					'id_user'=>$datauser['id_user'],
					'fullname'=>$datauser['full_name'],
					'nik_karyawan'=>$datauser['nik_karyawan'],
					'jabatan'=>$datauser['jabatan'],
					'email'=>$datauser['email'],
					'level'=>$datauser['level'],
					'no_hp'=>$datauser['no_hp']
				);
				$this->session->set_userdata($datasession);
				redirect('Home');
			}else{
				echo $this->session->set_flashdata('msg','Incorrect Password');
				redirect('Login');
			}
		}else{
			echo $this->session->set_flashdata('msg','Email is Not Registered ');
			redirect('Login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Login');
	}
}
