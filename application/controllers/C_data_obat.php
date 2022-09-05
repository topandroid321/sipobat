<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_data_obat extends CI_Controller {

	function __construct(){
		parent::__construct();
    $this->load->library('encryption');
    	$this->load->library('table');
    	$this->load->helper('url');
    	$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->load->library('session');
		  $this->load->model('M_data_obat');
			if($this->session->userdata('pengguna') != TRUE){
            $url=base_url();
            redirect($url);
        }
	}

	function index(){
    $data['judul'] = 'Data Obat';
		$data['pilih'] = $this->M_data_obat->get_supplier()->result();
    if($this->session->userdata('pengguna')->level =='Admin'){
		$data['content'] = 'data_obat/v_data_obat';
		$this->load->view('Dashboard/dashboard', $data);
	}else {
		echo '<script>window.alert("heyy kamu dilarang buka page ini");</script>';
		redirect('dashboard','refresh');
	}


	}

	function data_obat(){
    $data['judul'] = 'Data Obat';
		$data['row'] = $this->M_data_obat->get_data_obat()->result();
		$data['content'] = 'data_obat/v_data_obatuser';
		$this->load->view('Dashboard/dashboard', $data);
	}

  public function ajax_list()
   {
     $list = $this->M_data_obat->get_datatables();
     $data = array();
     $no = $_POST['start'];
     foreach ($list as $obat) {
             $no++;
       $row = array();
             $row[] = $no;
             $row[] = $obat->kd_obat;
						 $row[] = $obat->tgl_daftar;
             $row[] = $obat->tgl_masuk;
             $row[] = $obat->nama_obat;
             $row[] = $obat->tgl_exp;
             $row[] = $obat->harga;
             $row[] = $obat->stok;
             $row[] = $obat->satuan;
						 $row[] = $obat->nama_supplier;

						 $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="fungsiedit_data('."'".$obat->kd_obat."'".')"><i class="fa fa-pencil"></i></a>
    				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="fungsihapus_data('."'".$obat->kd_obat."'".')"><i class="fa fa-trash"></i></a>';

       $data[] = $row;
     }
     $output = array(
             "draw" => $_POST['draw'],
             "recordsTotal" => $this->M_data_obat->count_all(),
             "recordsFiltered" => $this->M_data_obat->count_filtered(),
             "data" => $data,
         );
     //output to json format
     echo json_encode($output);
     }

	public function ajax_edit($id)
	{
		$data = $this->M_data_obat->get_by_id($id);
		echo json_encode($data);
	}
	public function ajax_add()
	{
		$data = array(
			  'kd_obat' => $this->input->post('kd_obat'),
				'tgl_masuk' => $this->input->post('tgl_masuk'),
				'nama_supplier' => $this->input->post('nama_supplier'),
        'nama_obat' => $this->input->post('nama_obat'),
        'tgl_daftar' => $this->input->post('tgl_daftar'),
        'tgl_exp' => $this->input->post('tgl_exp'),
        'harga' => $this->input->post('harga'),
        'stok' => $this->input->post('stok'),
        'satuan' => $this->input->post('satuan')
			);
		$insert = $this->M_data_obat->save($data);
		echo json_encode(array("status" => TRUE));

	}

	public function ajax_update()
	{
		$data = array(
			'kd_obat' => $this->input->post('kd_obat'),
			'tgl_masuk' => $this->input->post('tgl_masuk'),
			'nama_supplier' => $this->input->post('nama_supplier'),
			'nama_obat' => $this->input->post('nama_obat'),
			'tgl_daftar' => $this->input->post('tgl_daftar'),
			'tgl_exp' => $this->input->post('tgl_exp'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan')
			);
		$this->M_data_obat->update(array('kd_obat' => $this->input->post('kd_obat')), $data);
		echo json_encode(array("status" => TRUE));
		$this->session->flashdata('info','Berhasil Di update');
	}

	public function ajax_delete($id)
	{
		$this->M_data_obat->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
}
