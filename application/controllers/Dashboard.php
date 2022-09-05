<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

  }

  function index()
  {
    $data['judul'] = 'Data Obat';
    $data['content'] = 'v_dashboard';
    $this->load->view('Dashboard/dashboard', $data);
  }

  function dashboard_user(){
    $data['judul'] = 'Data Obat';
    $data['content'] = 'v_dashboard_user';
    $this->load->view('Dashboard/dashboard', $data);
  }

}
