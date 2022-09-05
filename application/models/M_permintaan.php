<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permintaan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  function get_all(){
    return $this->db->query('SELECT req.id,gd.kd_obat,req.tgl_permintaan,req.nama_obat,req.jumlah,req.satuan FROM t_gudang_obat as gd,t_permintaan as req WHERE gd.nama_obat = req.nama_obat');
  }

  function dt_req()
  {
    return $this->db->get('t_permintaan');
  }

  function tambah_data($data,$table){

    $this->db->insert($table,$data);
  }

  function hapus_data($where,$table){
  $this->db->where($where);
  $this->db->delete($table);
  }

  function edit_data($where,$table){
	return $this->db->get_where($table,$where);
   }

   function update_data($where,$data,$table){
   $this->db->where($where);
   $this->db->update($table,$data);
 }

}
