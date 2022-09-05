<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_suplier extends CI_Controller {

	function __construct(){
		parent::__construct();
    $this->load->library('encryption');
    	$this->load->library('table');
    	$this->load->helper('url');
    	$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->load->library('session');
		$this->load->model('M_suplier');
	}

	function index(){
    $data['judul'] = 'Dashboard';
    $data['content'] = 'v_suplier';
		$this->load->view('Dashboard/dashboard', $data);
	}

  public function ajax_list()
   {
     $list = $this->M_suplier->get_datatables();
     $data = array();
     $no = $_POST['start'];
     foreach ($list as $sup) {
             $no++;
       $row = array();
       $row[] = $no;
             $row[] = $sup->kd_suplier;
             $row[] = $sup->nama_suplier;
             $row[] = $sup->alamat;
             $row[] = $sup->no_telp;

						 $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="fungsiedit_suplier('."'".$sup->id."'".')"><i class="fa fa-pencil"></i></a>
    				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="fungsihapus_suplier('."'".$sup->id."'".')"><i class="fa fa-trash"></i></a>';

       $data[] = $row;
     }
     $output = array(
             "draw" => $_POST['draw'],
             "recordsTotal" => $this->M_suplier->count_all(),
             "recordsFiltered" => $this->M_suplier->count_filtered(),
             "data" => $data,
         );
     //output to json format
     echo json_encode($output);
     }

	public function ajax_edit($id)
	{
		$data = $this->M_suplier->get_by_id($id);
		echo json_encode($data);
	}
	public function ajax_add()
	{
		$data = array(
				'kd_suplier' => $this->input->post('kd_suplier'),
				'nama_suplier' => $this->input->post('nama_suplier'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp')
			);
		$insert = $this->M_suplier->save($data);
		echo json_encode(array("status" => TRUE));

	}

	public function ajax_update()
	{
		$data = array(
			'kd_suplier' => $this->input->post('kd_suplier'),
			'nama_suplier' => $this->input->post('nama_suplier'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp')
			);
		$this->M_suplier->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
		$this->session->flashdata('info','Berhasil Di update');
	}

	public function ajax_delete($id)
	{
		$this->M_suplier->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
}
