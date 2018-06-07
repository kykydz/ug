<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');
//use Libern\QRCodeReader\QRCodeReader;
//require __DIR__ . "../../vendor/autoload.php";
use Zxing\QrReader;

class Invoice extends CI_Controller{
  var $link;
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION['login_envoice'])){
  						$url=base_url('login');
  						redirect($url);
  				};
          $this->load->model('M_purchase');
          $this->load->model('M_vendor');

  }

  public function index(){
    $data_vendor = $this->M_vendor->vendor()->row_array();
    $id_vendor = $data_vendor['id_vendor'];
    $status='PIC Approval';
    $data['invoice']=$this->M_vendor->notif_all($id_vendor);
    $this->load->view('v_menu');
    $this->load->view('v_invoice',$data);
  }

  public function create(){
    $data_vendor = $this->M_vendor->vendor()->row_array();
    $id_vendor = $data_vendor['id_vendor'];
    $status='PIC Approval';
    $id_po = $this->uri->segment(3);
    $data['data_po']=$this->M_vendor->po_inv($id_po,$id_vendor,$status);
    $data['data_barang']=$this->M_vendor->barang_list($id_po,$id_vendor);
    $this->load->view('v_menu');
    $this->load->view('v_create_inv',$data);
  }

  public function scan_qr(){
    $config['upload_path']   = './assets/images/qr_code/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG';
      $this->load->library('upload',$config);
         $this->upload->do_upload('gambar_qrcode');
         $upload = $this->upload->data();
				 $pict_qr =  $upload['file_name'];

    $id_user = $this->session->userdata('id_user');
    $token=strip_tags($this->input->post('token'));
    $cek = $this->M_purchase->cek_token($token,$id_user)->num_rows();
    $id_po = $this->input->post('id_po');
    $id_vendor =$this->input->post('id_vendor');
    if($cek > 0){


    $image = __DIR__ . "../../../assets/images/qr_code/$pict_qr";

    $qrcode = new QrReader($image);
     $this->link = $qrcode->text();
    $path = $this->link;

    $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "$path",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Cache-Control: no-cache",
      "Postman-Token: fd06e316-d859-421a-91b3-1ba9824fb541"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);
  if(!$response){
    echo $this->session->set_flashdata('msg',' <div class="alert alert-danger">
  <strong>Danger!</strong> Your Tax Barcode Invalid.
  </div>');
  redirect('Invoice/create/'.$id_po);
  }
  curl_close($curl);
  $file = new SimpleXMLElement($response);
  $npwp_vendor = $file->npwpPenjual;
  $npwp_perusahaan=$file->npwpLawanTransaksi;
  $jumlah_dpp =$file->jumlahDpp;
  $cek = $this->M_vendor->cek_efp($id_po,$id_vendor,$npwp_vendor,$npwp_perusahaan,$jumlah_dpp);
  if($cek->num_rows()){

    $data_invoice=array(
      'id_po'=>$id_po,
      'no_invoice'=>strip_tags($this->input->post('no_invoice')),
      'nomor_faktur'=>$file->nomorFaktur,
      'tgl_faktur'=>$file->tanggalFaktur,
      'id_vendor'=>$id_vendor,
      'jumlah_dpp'=>$file->jumlahDpp,
      'faktur_ppn'=>$file->jumlahPpn
    );
      $save_inv = $this->M_vendor->save_inv($data_invoice);
      $datastatus=array(
        'status'=>'Print Invoice',
        'updated_at'=>'NOW()'
      );
      $update = $this->M_vendor->update_inv_po($datastatus,$id_po);
      redirect('Invoice');
      }else{
        echo $this->session->set_flashdata('msg',' <div class="alert alert-danger">
      <strong>Danger!</strong> Your Barcode Tax Invalid.
      </div>');
      redirect('Invoice/create/'.$id_po);
      }

      }else{
        echo $this->session->set_flashdata('msg','<div class="alert alert-danger">
          <strong>Danger!</strong> Your Token is Not Match.
          </div>');
        redirect('Invoice/create/'.$id_po);
      }
  }

  public function view_inv(){
    $data_vendor = $this->M_vendor->vendor()->row_array();
    $id_vendor = $data_vendor['id_vendor'];
    $status='Invoicing';
    $id_po = $this->uri->segment(3);
    $data['data_po']=$this->M_vendor->po_view_inv($id_po,$id_vendor,$status);
    $data['data_barang']=$this->M_vendor->barang_list($id_po,$id_vendor);
    $this->load->view('v_menu');
    $this->load->view('v_view_inv',$data);
  }

  function print_inv(){
    $data_vendor = $this->M_vendor->vendor()->row_array();
    $id_vendor = $data_vendor['id_vendor'];
    $status='Invoicing';
    $id_po = $this->uri->segment(3);
    $data['data_po']=$this->M_vendor->po_view_inv($id_po,$id_vendor,$status);
    $data['data_barang']=$this->M_vendor->barang_list($id_po,$id_vendor);
    $data['total_harga']=$this->M_vendor->total_harga_brg($id_po,$id_vendor);

    $this->load->library('Pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "Invoice.pdf";
    $this->pdf->load_view('v_print_invoice',$data);

  }
  public function upload(){
    $this->load->view('v_menu');
    $this->load->view('v_upload_inv');
  }

  public function upload_inv(){
      $id_po=$this->uri->segment(3);
        $config['upload_path']   = './assets/images/invoice/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG';
        $this->load->library('upload',$config);
         $this->upload->do_upload('pict_inv');
         $upload = $this->upload->data();
				 $pict_inv =  $upload['file_name'];
         $upload = $this->M_vendor->inv_upload($id_po,$pict_inv);
         if($upload){
           $datastatus=array(
             'status'=>'Invoicing',
             'position_track'=>7,
             'updated_at'=>'NOW()'
           );
           $update = $this->M_vendor->update_inv_po($datastatus,$id_po);
           echo $this->session->set_flashdata('msg',' <div class="alert alert-success">
         <strong>Success!</strong> Upload Success.
         </div>');
         redirect('Invoice');
       }else{
         echo $this->session->set_flashdata('msg',' <div class="alert alert-danger">
       <strong>Failed!</strong> Upload Failed.
       </div>');
       redirect('Invoice');
       }
  }


}
