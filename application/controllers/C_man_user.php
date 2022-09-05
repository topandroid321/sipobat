<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_man_user extends CI_Controller {

	function __construct(){
		parent::__construct();
    $this->load->library('encryption');
    	$this->load->library('table');
    	$this->load->helper('url');
    	$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->load->library('session');
		$this->load->model('M_man_user');
	}

	function index(){
    $data['judul'] = 'Management User';
    $data['content'] = 'data_karyawan/v_man_user';
		$this->load->view('Dashboard/dashboard', $data);
	}

  public function ajax_list()
   {
     $list = $this->M_man_user->get_datatables();
     $data = array();
     $no = $_POST['start'];
     foreach ($list as $man) {
             $no++;
       $row = array();
             $row[] = $no;
             $row[] = $man->nik_karyawan;
             $row[] = $man->nama_karyawan;
             $row[] = $man->jk;
             $row[] = $man->tmp_lahir;
             $row[] = $man->tgl_lahir;
             $row[] = $man->alamat;
             $row[] = $man->telp;
             $row[] = $man->username;
             $row[] = $man->level;

						 $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="fungsiedit_user('."'".$man->id_karyawan."'".')"><i class="fa fa-pencil"></i></a>
    				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="fungsihapus_user('."'".$man->id_karyawan."'".')"><i class="fa fa-trash"></i></a>';

       $data[] = $row;
     }
     $output = array(
             "draw" => $_POST['draw'],
             "recordsTotal" => $this->M_man_user->count_all(),
             "recordsFiltered" => $this->M_man_user->count_filtered(),
             "data" => $data,
         );
     //output to json format
     echo json_encode($output);
     }

	public function ajax_edit($id)
	{
		$data = $this->M_man_user->get_by_id($id);
		echo json_encode($data);
	}
	public function ajax_add()
	{
		$data = array(
				'nik_karyawan' => $this->input->post('nik_karyawan'),
				'nama_karyawan' => $this->input->post('nama_karyawan'),
				'jk' => $this->input->post('jk'),
        'tmp_lahir' => $this->input->post('tmp_lahir'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'alamat' => $this->input->post('alamat'),
        'telp' => $this->input->post('telp'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post.md5('password'),
				'level' => $this->input->post('level')
			);
		$insert = $this->M_man_user->save($data);
		echo json_encode(array("status" => TRUE));

	}

	public function ajax_update()
	{
		$data = array(
      'nik_karyawan' => $this->input->post('nik_karyawan'),
      'nama_karyawan' => $this->input->post('nama_karyawan'),
      'jk' => $this->input->post('jk'),
      'tmp_lahir' => $this->input->post('tmp_lahir'),
      'tgl_lahir' => $this->input->post('tgl_lahir'),
      'alamat' => $this->input->post('alamat'),
      'telp' => $this->input->post('telp'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post.md5('password'),
      'level' => $this->input->post('level')
			);
		$this->M_man_user->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
		$this->session->flashdata('info','Berhasil Di update');
	}

	public function ajax_delete($id)
	{
		$this->M_man_user->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
}
