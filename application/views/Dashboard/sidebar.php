<style media="screen">
  .putih{
    background-color: #ffffff;
  }
</style>
<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar" style="background-color:#34495e;">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <?php if ($this->session->userdata('pengguna')) {
         if ($this->session->userdata('pengguna')->level == 'User') {
           echo '<li><a href='."'".base_url('Dashboard/dashboard_user')."'".' class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
           <li><a href='."'".base_url('C_transaksi')."'".' class=""><i class="lnr lnr-database"></i> <span>Transaksi</span></a></li>
                 <li><a href='."'".base_url('C_data_obat/data_obat')."'".' class=""><i class="lnr lnr-database"></i> <span>Data Obat</span></a></li>
                 <li><a href='."'".base_url('C_transaksi/laporan')."'".' class=""><i class="fa fa-list"></i> <span>Laporan Transaksi</span></a></li>
           ';
         }
          elseif ($this->session->userdata('pengguna')->level == 'Admin') {
            echo'<li><a href='."'".base_url('Dashboard')."'".' class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
            <li><a href='."'".base_url('C_data_obat')."'".' class=""><i class="lnr lnr-database"></i> <span>Data Obat</span></a></li>
            <li><a href='."'".base_url('C_permintaan')."'".' class=""><i class="lnr lnr-list"></i> <span>Data Permintaan</span></a></li>
            <li><a href='."'".base_url('C_suplier')."'".' class=""><i class="lnr lnr-apartment"></i> <span>Data Suplier</span></a></li>
            <li>
              <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
              <div id="subPages" class="collapse ">
                <ul class="nav">
                  <li><a href="page-profile.html" class="">Laporan Data Obat</a></li>
                  <li><a href='."'".base_url('C_laporan')."'".' class="">Laporan Data Permintaan</a></li>
                  <li><a href='."'".base_url('C_transaksi/laporan')."'".' class=""><span>Laporan Transaksi</span></a></li>
            </ul>
          </div>
        </li>';
       }
     }  ?>
      </ul>
    </nav>
  </div>
</div>
<!-- END LEFT SIDEBAR -->
