<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#dff9fb">
  <div class="brand" style="background-color:#dff9fb">
    <a href="index.html"><img src="<?php echo base_url();?>assets/img/logo-mitra.png" alt="Klorofil Logo" class="img-responsive logo"></a>
  </div>
  <div class="container-fluid">
    <div class="navbar-btn">
      <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
    </div>
    <div id="navbar-menu">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $this->session->userdata("pengguna")->level;?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
          <ul class="dropdown-menu">
            <?php if ($this->session->userdata('pengguna')) {
             if ($this->session->userdata('pengguna')->level == 'User') {
            echo '<li><a href='."'".base_url('login/log_out')."'".'><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>';
          }
          elseif ($this->session->userdata('pengguna')->level == 'Admin') {
            echo '<li><a href='."'".base_url('C_man_user')."'".'><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
            <li><a href='."'".base_url('login/log_out')."'".'><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>';
          }
        }
        ?>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- endnavbar -->
