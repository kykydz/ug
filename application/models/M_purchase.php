<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_purchase extends CI_Model{

  function show_po(){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor','left');
    $this->db->join('env_status_po','env_status_po.id_po=env_purchase_order.id_po');
    return $this->db->get();
  }
  function show_data_po(){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor','left');
    $this->db->join('env_status_po','env_status_po.id_po=env_purchase_order.id_po');
    $this->db->where('env_purchase_order.status !=','Scan');
    return $this->db->get();
  }
  function show_po_accounting(){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor','left');
    $this->db->join('env_status_po','env_status_po.id_po=env_purchase_order.id_po');
    $this->db->where('env_purchase_order.status','Invoicing');
    $this->db->or_where('env_purchase_order.status','Paid');
    return $this->db->get();
  }

  function data_vendor(){
    return $this->db->get('env_vendor');
  }

  function data_pic(){
    $this->db->select('id_user,full_name');
    $this->db->from('env_users');
    $this->db->where('level','Procurement Staff');
    return $this->db->get();
  }

  function po_save($data_po){
    $this->db->insert('env_purchase_order',$data_po);
    return $this->db->insert_id();
  }

  function app_save($approval){
    return $this->db->insert('env_status_po',$approval);
  }

  function user_masuk($id){
    $this->db->select('*');
    $this->db->from('env_users');
    $this->db->where('id_user',$id);
    return $this->db->get();
  }
  function update_token($id_user,$token){
    $this->db->set('token_app',$token);
    $this->db->where('id_user',$id_user);
    return $this->db->update('env_users');
  }

  function cek_token($token,$id_user){
    $this->db->select('full_name');
    $this->db->from('env_users');
    $this->db->where('token_app',$token);
    $this->db->where('id_user',$id_user);
    return $this->db->get();
  }

  function data_po_pic($status){
    $id = $this->session->userdata('id_user');
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor','left');
    $this->db->join('env_status_po','env_status_po.id_po=env_purchase_order.id_po');

    $this->db->where('env_purchase_order.status',$status);
    $this->db->where('env_purchase_order.id_pic',$id);
    return $this->db->get();
  }

  public function data_view_by_id($id_po,$status){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor','left');
    $this->db->join('env_status_po','env_status_po.id_po=env_purchase_order.id_po');
    $this->db->join('env_invoice','env_purchase_order.id_po=env_invoice.id_po');
    $this->db->where('env_purchase_order.id_po',$id_po);
    $this->db->where('env_purchase_order.status',$status);
    return $this->db->get();
  }

  public function data_barang_dn($id_po){
    $this->db->select('*');
    $this->db->from('env_delivery_notes');
    $this->db->where('id_po',$id_po);
    return $this->db->get();
  }

  public function update_pic($id_po,$data_po){
    $this->db->where('id_po',$id_po);
    return $this->db->update('env_purchase_order',$data_po);
  }
  public function update_status_pic($id_po,$data_status){
    $this->db->where('id_po',$id_po);
    return $this->db->update('env_status_po',$data_status);
  }

  public function data_po_ocr($no_po){
    $this->db->select('*');
    $this->db->from('env_purchase_order');
    $this->db->join('env_vendor','env_purchase_order.id_vendor=env_vendor.id_vendor','left');
    $this->db->join('env_status_po','env_status_po.id_po=env_purchase_order.id_po');
    $this->db->where('env_purchase_order.nomor_po',$no_po);
    return $this->db->get();
  }

  public function barang_list($id_po){
    $this->db->select('*');
    $this->db->from('env_delivery_notes');
    $this->db->where('id_po',$id_po);
    return $this->db->get();
  }

  public function gambar($id){
    $this->db->select('*');
    $this->db->from('env_dok_inv');
    return $this->db->get();
  }

  public function update_accounting($id_po,$data){
    $this->db->where('id_po',$id_po);
    return $this->db->update('env_purchase_order',$data);
  }



}
