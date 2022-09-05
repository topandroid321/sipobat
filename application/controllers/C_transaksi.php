<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->library('pagination');
      $this->load->model(array('M_data_obat','M_transaksi'));
  }

  function index()
  {
    if(isset($_POST['submit']))
      {
          $this->M_transaksi->simpan_barang();
          redirect('C_transaksi');
      }
      else{
    $data['judul'] = 'Data Transaksi';
    $data['barang']=  $this->M_data_obat->tampil_data();
    $data['no_resep']=  $this->M_transaksi->get_no_resep();
    $data['detail']= $this->M_transaksi->tampilkan_detail_transaksi()->result();
    $data['content'] = 'transaksi/form/form_tambah';
		$this->load->view('Dashboard/dashboard', $data);
       }
  }

  function hapusitem()
     {
         $id=  $this->uri->segment(3);
         $this->M_transaksi->hapusitem($id);
         redirect('C_transaksi');
     }


     function selesai_belanja()
     {
         $tanggal=date('Y-m-d');
         $user=  $this->session->userdata('pengguna')->username;
         $id_kar=  $this->db->get_where('t_user',array('username'=>$user))->row_array();
         $data = array('tgl_beli'=>$tanggal,'id_karyawan'=>$id_kar['id_karyawan']);
         $this->M_transaksi->selesai_belanja($data);
         redirect('C_transaksi');
     }

     function laporan()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data['record']=  $this->M_transaksi->laporan_periode($tanggal1,$tanggal2);
            $data['content'] = 'laporan/laporan';
        		$this->load->view('Dashboard/dashboard', $data);
        }
        else
        {
          $jumlah_data = $this->M_transaksi->jumlah_data();
		        $this->load->library('pagination');
		          $config['base_url'] = base_url().'C_transaksi/laporan/index';
		            $config['total_rows'] = $jumlah_data;
		              $config['per_page'] = 100;
		                $from = $this->uri->segment(4);
		                  $this->pagination->initialize($config);
            $data['record']=  $this->M_transaksi->laporan_default($config['per_page'],$from);
            $data['content'] = 'laporan/laporan';
        		$this->load->view('Dashboard/dashboard', $data);
        }
    }

    function detail_trx(){
            $id=$this->uri->segment(3);
            $data['detail'] = $this->M_transaksi->detail_belanja()->result();
            $data['record']=  $this->M_transaksi->get_one($id)->row_array();
            $data['content'] = 'transaksi/table/detail_trx';
        		$this->load->view('Dashboard/dashboard', $data);
    }

     function excel()
     {
       header("Content-type=appalication/vnd.ms-excel");
       header("content-disposition:attachment;filename=laporantransaksi.xls");
       $data['record']=  $this->M_transaksi->laporan_default();
       $this->load->view('laporan/laporan_excel',$data);
     }

     function excel_priode()
     {
       header("Content-type=appalication/vnd.ms-excel");
       header("content-disposition:attachment;filename=laporantransaksiperiode.xls");
       $data['record']=  $this->M_transaksi->laporan_periode();
       $this->load->view('laporan/laporan_excel',$data);
     }

}
