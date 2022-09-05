<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_permintaan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model('M_permintaan');
  }

  function index()
  {
    $data['judul'] = 'Data Permintaan';
    $data['content'] = 'Permintaan/table/list_data';
    $data['row'] = $this->M_permintaan->get_all()->result();
		$this->load->view('Dashboard/dashboard', $data);
  }

  function tambah_data(){
    $data['judul'] = 'Tambah Data Siswa';
    $data['content'] = 'Permintaan/form/tambah_data';
		$this->load->view('Dashboard/dashboard', $data);
  }

  function tambah_aksi(){
    $tgl_permintaan = $this->input->post('tgl_permintaan');
    $nama_obat = $this->input->post('nama_obat');
    $jumlah = $this->input->post('jumlah');
    $satuan = $this->input->post('satuan');
    $data = array(
      'tgl_permintaan' => $tgl_permintaan,
      'nama_obat' => $nama_obat,
      'jumlah' => $jumlah,
      'satuan' => $satuan
    );
    $this->M_permintaan->tambah_data($data,'t_permintaan');
    redirect('C_permintaan/index');
  }

  function edit($id){
    $where = array('id' => $id);
    $data['r'] = $this->M_permintaan->edit_data($where,'t_permintaan')->row();
    $data['judul'] = 'Edit Data Siswa';
    $data['content'] = 'Permintaan/form/edit_data';
    $this->load->view('Dashboard/dashboard',$data);
  }

  function update(){
    $id = $this->input->post('id');
    $tgl_permintaan = $this->input->post('tgl_permintaan');
    $nama_obat = $this->input->post('nama_obat');
    $jumlah = $this->input->post('jumlah');
    $satuan = $this->input->post('satuan');

	$data = array(
    'tgl_permintaan' => $tgl_permintaan,
    'nama_obat' => $nama_obat,
    'jumlah' => $jumlah,
    'satuan' => $satuan
	);

	$where = array(
		'id' => $id
	);

	$this->M_permintaan->update_data($where,$data,'t_permintaan');
	redirect('C_permintaan/index');
}

function hapus($id){
    $where = array('id' => $id);
    $this->M_permintaan->hapus_data($where,'t_permintaan');
    redirect('C_permintaan/index');
  }

}
