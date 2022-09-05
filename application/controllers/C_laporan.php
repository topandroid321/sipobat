<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laporan extends CI_Controller {
     public function __construct()
      {
        parent::__construct();
        $this->load->library('laporan_pdf');
        $this->load->model('M_permintaan');
        $this->load->model('M_transaksi');
      }
      function index(){
        $data = $this->M_permintaan->dt_req();
        $this->load->view('laporan/laporan_permintaan',['data'=>$data]);
      }

      function cetak_detail(){
        $id=$this->uri->segment(3);
        $data = $this->M_transaksi->c_detail_belanja();
        $this->load->view('transaksi/table/cetak_detail',['data'=>$data]);
      }
}
