<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase_order extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION['login_envoice'])){
  						$url=base_url('login');
  						redirect($url);
  				};

          $this->load->model('M_purchase');

  }
  public function index(){
    $data['po']=$this->M_purchase->show_data_po();
    $this->load->view('v_menu');
    $this->load->view('v_purchase',$data);
  }

  public function add(){
    $this->load->view('v_menu');
    $this->load->view('v_scan_po');
  }

  public function save(){
    $id_user = $this->session->userdata('id_user');
     $token=strip_tags($this->input->post('token'));
 	$id_po=$this->input->post('id_po');
     $cek = $this->M_purchase->cek_token($token,$id_user)->num_rows();
     if($cek > 0){
       $data_po=array(
 		'status'=>'Procurement',
 		'updated_at'=>'NOW()',
 		'position_track'=>3
 	  );
       $save_po = $this->M_purchase->update_pic($id_po,$data_po);
       redirect('Purchase_order');
     }else{
       echo $this->session->set_flashdata('msg','Token Invalid');
       redirect('Purchase_order/add');
     }

  }

  public function token(){

    $id_user = $this->session->userdata('id_user');
    $datauser = $this->M_purchase->user_masuk($id_user)->row_array();
    $email=$datauser['email'];
		$token = rand(100000,999999);

		$up_token = $this->M_purchase->update_token($id_user,$token);
		if($up_token){
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.zoho.com',
				'smtp_port' => 465,
				'smtp_user' => 'noreply@wallezz.com',
				'smtp_pass' => 'wallezz#17',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1'
				);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('noreply@wallezz.com', 'Admin Envoice');
			$this->email->to($email);
			$this->email->subject('Token Approval');
			$this->email->message('Your Token '.$token);
			$this->email->send();
		}
  }

  public function delivery(){
    $status='On Delivery';
    $data['po']=$this->M_purchase->data_po_pic($status);
    $this->load->view('v_menu');
    $this->load->view('v_pic_delivery',$data);
  }

  public function view_delivery(){
    $id_po=$this->uri->segment(3);
    $status='On Delivery';
    $data['data_barang']=$this->M_purchase->data_barang_dn($id_po);
    $data['data_view']=$this->M_purchase->data_view_by_id($id_po,$status);
    $this->load->view('v_menu');
    $this->load->view('v_pic_notes',$data);
  }

  public function pic_app(){
    $id_user = $this->session->userdata('id_user');
    $token=strip_tags($this->input->post('token'));
    $cek = $this->M_purchase->cek_token($token,$id_user)->num_rows();
    if($cek > 0){
    $id_po=strip_tags($this->input->post('id_po'));
    $data_po = array(
      'status'=>'PIC Approval',
      'position_track'=>'6',
      'updated_at'=>'NOW()'
    );
    $data_status=array(
      'pic_app'=>2,
      'tgl_pic_app'=>'NOW()'
    );
    $po = $this->M_purchase->update_pic($id_po,$data_po);
    $status = $this->M_purchase->update_status_pic($id_po,$data_status);
    if($po AND $status){
      redirect('Purchase_order/delivery');
    }else{
      redirect('Purchase_order/view_delivery/'.$id_po);
      }
    }else{
        echo $this->session->set_flashdata('msg','Token Invalid');
        redirect('Purchase_order/view_delivery/'.$id_po);
    }
  }

  public function ocr(){

    $config['upload_path']   = './assets/images/logo/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG';
      $this->load->library('upload',$config);
         $this->upload->do_upload('pict_po');
         $upload = $this->upload->data();
				 $pict_po =  $upload['file_name'];

    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://vision.googleapis.com/v1/images:annotate?key=AIzaSyCW0iGq88sc0tkXmHSfl_zyxCauJ_yD9rQ",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n  \"requests\":[\r\n    {\r\n      \"image\":{\r\n        \"source\":{\r\n          \"imageUri\":\r\n            \"https://envoice.wallezzdev.com/assets/images/logo/$pict_po\"\r\n        }\r\n      },\r\n      \"features\":[\r\n        {\r\n          \"type\":\"DOCUMENT_TEXT_DETECTION\",\r\n          \"maxResults\":1\r\n        }\r\n      ]\r\n    }\r\n  ]\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: 292f57b8-9f9d-2893-248e-fcb0213344f5"
  ),
));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $decode=json_decode($response);

    $text = $decode->responses[0]->textAnnotations[0]->description;


    $key ="Copy of Purchase Order";

  $cari = stristr($text,$key);
  $no_po = substr($cari,23,10);
  $data['data_po_ocr']=$this->M_purchase->data_po_ocr($no_po);
  $this->load->view('v_menu');
  $this->load->view('v_add_po',$data);


  }
  }
}
