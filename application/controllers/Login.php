<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		if($this->session->userdata('login')==TRUE){
			redirect('dashboard','refresh');
		}else{
			$this->load->view('v_login');
		}
	}

	  public function log_out(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}

	function getdata(){
		$data = $this->db->get('t_user');
		return $data;
	}
	public function do_login(){
		$this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_login');
        } else {

		$username = $this->input->post('username');
		$pass 	  = $this->input->post('password');
		$password = MD5($pass);

		$src = $this->db->get_where('t_user', array (
			'username' 	=> $username,
			'password'	=> $password,
		));

		if ($src->num_rows() > 0) {
			$pengguna = $src->row();
			$this->session->set_userdata('admin',$username);
			$this->session->set_userdata('pengguna', $pengguna);

    if($this->session->userdata('pengguna')->level =='Admin'){
		  redirect('/Dashboard');
	   }elseif ($this->session->userdata('pengguna')->level =='User') {
		  redirect('/Dashboard/dashboard_user');
	   }
	 else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
       }
    }
 }
}
