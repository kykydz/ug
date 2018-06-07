<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_vendor extends CI_Model{

  function vendor(){
    $email = $this->session->userdata('email');
    $this->db->select('*');
    $this->db->from('env_vendor');
    $this->db->where('email_vendor',$email);
    return $this->db->get();
  }

  function notif($id_vendor,$status){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->where('id_vendor',$id_vendor);
    $this->db->where('status',$status);
    return $this->db->get();
  }
  function notif_all($id_vendor){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->where('id_vendor',$id_vendor);

    return $this->db->get();
  }

  function view_by_id($id,$id_vendor,$status){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor','left');
    $this->db->join('env_status_po','env_status_po.id_po=env_purchase_order.id_po');
    $this->db->where('env_purchase_order.id_po',$id);
    $this->db->where('env_purchase_order.id_vendor',$id_vendor);
    $this->db->where('status',$status);
    $this->db->or_Where('status','PIC Approval');
    $this->db->or_where('status','Invoicing');
    return $this->db->get();
  }

  function view_all($id,$id_vendor){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor','left');
    $this->db->join('env_status_po','env_status_po.id_po=env_purchase_order.id_po');
    $this->db->where('env_purchase_order.id_po',$id);
    $this->db->where('env_purchase_order.id_vendor',$id_vendor);

    return $this->db->get();
  }

  function update_po($data,$id_po){
    $this->db->where('id_po',$id_po);
    return $this->db->update('env_purchase_order',$data);
  }

  function update_status($datastatus,$id_po){
    $this->db->where('id_po',$id_po);
    return $this->db->update('env_status_po',$datastatus);
  }

  function update_inv_po($datastatus,$id_po){
    $this->db->where('id_po',$id_po);
    return $this->db->update('env_purchase_order',$datastatus);
  }

  function save_barang($data){
    return $this->db->insert('env_delivery_notes',$data);
  }

  public function barang_list($id_po,$id_vendor){
    $this->db->select('*');
    $this->db->from('env_delivery_notes');
    $this->db->where('id_vendor',$id_vendor);
    $this->db->where('id_po',$id_po);
    return $this->db->get()->result();
  }

  public function barang_delete($id){
    $this->db->where('id_dn',$id);
    return $this->db->delete('env_delivery_notes');
  }

  function po_inv($id_po,$id_vendor,$status){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor','left');
    $this->db->join('env_status_po','env_status_po.id_po=env_purchase_order.id_po');
    $this->db->where('env_purchase_order.id_po',$id_po);
    $this->db->where('env_purchase_order.id_vendor',$id_vendor);
    $this->db->where('status',$status);
    return $this->db->get();
  }

  function po_view_inv($id_po,$id_vendor,$status){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor','left');
    $this->db->join('env_status_po','env_status_po.id_po=env_purchase_order.id_po');
    $this->db->join('env_invoice','env_invoice.id_po=env_purchase_order.id_po');
    $this->db->where('env_purchase_order.id_po',$id_po);
    $this->db->where('env_purchase_order.id_vendor',$id_vendor);
    $this->db->where('status',$status);
    return $this->db->get();
  }

  function cek_efp($id_po,$id_vendor,$npwp_vendor,$npwp_perusahaan,$jumlah_dpp){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor');
    $this->db->where('env_purchase_order.id_po',$id_po);
    $this->db->where('env_purchase_order.id_vendor',$id_vendor);
    $this->db->where('env_vendor.npwp_vendor',$npwp_vendor);
    $this->db->where('env_purchase_order.npwp_corporate',$npwp_perusahaan);
    $this->db->where('env_purchase_order.total_harga',$jumlah_dpp);
    return $this->db->get();
  }

  function save_inv($data_invoice){
    return $this->db->insert('env_invoice',$data_invoice);
  }

  function inv_upload($id_po,$pict_inv){
    $data=array(
      'nama_dokumen'=>$pict_inv,
      'id_po'=>$id_po
    );
    return $this->db->insert('env_dok_inv',$data);
  }

  public function total_harga_brg($id_po,$id_vendor){
    $sql=$this->db->query("SELECT SUM(total) as total_semua FROM env_delivery_notes WHERE id_po=$id_po AND id_vendor=$id_vendor")->row_array();
    return $sql['total_semua'];

  }


}
