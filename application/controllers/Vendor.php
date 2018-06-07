<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');
class Vendor extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION['login_envoice'])){
  						$url=base_url('login');
  						redirect($url);
  				};
          $this->load->model('M_vendor');

  }
  public function notifications(){
    $data_vendor = $this->M_vendor->vendor()->row_array();
    $id_vendor = $data_vendor['id_vendor'];
    $data['notif_vendor']=$this->M_vendor->notif_all($id_vendor);
    $this->load->view('v_menu');
    $this->load->view('v_notifications',$data);
  }

  public function views(){
    $id=$this->uri->segment(3);
    $data_vendor = $this->M_vendor->vendor()->row_array();
    $id_vendor = $data_vendor['id_vendor'];

    $data['data_view']=$this->M_vendor->view_all($id,$id_vendor);
    $this->load->view('v_menu');
    $this->load->view('v_view',$data);
  }

  public function approv(){
    $this->load->model('M_purchase');
    $id_user = $this->session->userdata('id_user');
    $id_po = $this->input->post('id_po');
    $token=strip_tags($this->input->post('token'));
    $cek = $this->M_purchase->cek_token($token,$id_user)->num_rows();
    if($cek > 0){
      $data = array(
        'status'=>'Delivery Notes',
        'position_track'=>'5'
      );
        $datastatus = array(
          'vendor_app'=>2,
          'tgl_vendor_app'=>'NOW()'
        );
        $update_po = $this->M_vendor->update_po($data,$id_po);
        $update_stts = $this->M_vendor->update_status($datastatus,$id_po);

        redirect('Vendor/notifications');
    }else{
    echo $this->session->set_flashdata('msg','Token Invalid');
    redirect('Vendor/views/'.$id_po);
    }
  }

  public function delivery(){
    $data_vendor = $this->M_vendor->vendor()->row_array();
    $id_vendor = $data_vendor['id_vendor'];
    $status = 'Delivery Notes';
    $data['notif_vendor']=$this->M_vendor->notif_all($id_vendor);
    $this->load->view('v_menu');
    $this->load->view('v_delivery',$data);
  }

  public function notes(){
      $id=$this->uri->segment(3);
      $data_vendor = $this->M_vendor->vendor()->row_array();
      $id_vendor = $data_vendor['id_vendor'];
      $status = 'Delivery Notes';
      $data['data_view']=$this->M_vendor->view_by_id($id,$id_vendor,$status);
      $this->load->view('v_menu');
      $this->load->view('v_notes',$data);
  }

  public function simpan_barang(){
    $nama = $this->input->post('nama');
    $harga = $this->input->post('harga');
    $qty =$this->input->post('qty');
    $total = $this->input->post('total');
    $id_po= $this->input->post('id_po');
    $id_vendor = $this->input->post('id_vendor');
    $data = array(
      'id_po'=>$id_po,
      'id_vendor'=>$id_vendor,
      'jumlah_barang'=>$qty,
      'deskripsi'=>'',
      'harga_satuan'=>$harga,
      'nama_barang'=>$nama,
      'total'=>$total
    );
    $save=$this->M_vendor->save_barang($data);
    echo json_encode($data);
  }

  public function data_barang(){
    $data_vendor = $this->M_vendor->vendor()->row_array();
    $id_vendor = $data_vendor['id_vendor'];
    $id_po=$this->uri->segment(3);
    $data=$this->M_vendor->barang_list($id_po,$id_vendor);
    echo json_encode($data);
  }

  public function hapus_barang(){
    $id = $this->input->post('kode');
    $delete = $this->M_vendor->barang_delete($id);
    echo json_encode($delete);
  }

  function print_dn(){
    $data_vendor = $this->M_vendor->vendor()->row_array();
    $id_vendor = $data_vendor['id_vendor'];
    $id_po=$this->uri->segment(3);
    $status = 'On Delivery';
    $data['data_po']=$this->M_vendor->view_by_id($id_po,$id_vendor,$status);
    $data['data_barang']=$this->M_vendor->barang_list($id_po,$id_vendor);
    $data['total_harga']=$this->M_vendor->total_harga_brg($id_po,$id_vendor);
    $this->load->library('Pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "Delivery Notes.pdf";
    $this->pdf->load_view('v_pdf', $data);

  }

function done_po(){
  $id_po=$this->uri->segment(3);
  $dpo=array(
    'status'=>'On Delivery',
    'updated_at'=>'NOW()'
  );
  $this->db->where('id_po',$id_po);
  $this->db->update('env_purchase_order',$dpo);
  redirect('Vendor/delivery');
}

}
