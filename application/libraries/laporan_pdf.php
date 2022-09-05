<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once dirname(__file__).'/tcpdf/tcpdf.php';
class Laporan_pdf extends TCPDF{

  public function method()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

}
