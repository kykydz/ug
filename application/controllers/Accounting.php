<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');
class Accounting extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION['login_envoice'])){
  						$url=base_url('login');
  						redirect($url);
  				};
          $this->load->model('M_purchase');
  }
  public function index(){
    $data['accounting']=$this->M_purchase->show_po_accounting();
    $this->load->view('v_menu');
    $this->load->view('v_accounting',$data);
  }

  public function view(){
    $id_po=$this->uri->segment(3);
    $status='Invoicing';
    $data['data_gambar']=$this->M_purchase->gambar($this->uri->segment(3));
    $data['data_barang']=$this->M_purchase->barang_list($id_po);
    $data['data_po']=$this->M_purchase->data_view_by_id($id_po,$status);
    $this->load->view('v_menu');
    $this->load->view('v_view_accounting',$data);
  }

  public function view_dokumen(){
    $data['data_gambar']=$this->M_purchase->gambar($this->uri->segment(3));
    $this->load->view('v_menu');
    $this->load->view('v_doc_accounting',$data);
  }

  public function approve(){
    $id_user = $this->session->userdata('id_user');
    $token=strip_tags($this->input->post('token'));
    $id_po = strip_tags($this->input->post('id_po'));
    $cek = $this->M_purchase->cek_token($token,$id_user)->num_rows();
    if($cek > 0){
      $data=array(
        'status'=>'Paid',
        'position_track'=>7,
        'updated_at'=>'NOW()'
      );
      $update = $this->M_purchase->update_accounting($id_po,$data);
      if($update){
		  $data_status=array(
		  'accounting_app'=>2,
		  'tgl_accounting_app'=>'NOW()'
		  );
		  $data_stts=$this->M_purchase->update_status_pic($id_po,$data_status)
        echo $this->session->set_flashdata('msg',' <div class="alert alert-success">
      <strong>Success!</strong>  Success.
      </div>');
      redirect('Accounting');
    }else{
      echo $this->session->set_flashdata('msg',' <div class="alert alert-danger">
    <strong>Failed!</strong>  Failed.
    </div>');
    redirect('Accounting/view/'.$id_po);
    }
    }
  }
}
