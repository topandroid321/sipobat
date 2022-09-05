<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <style media="screen">
    .body{
     font-style: #f26a15;
    }
  </style>

</head>

<body style="background-image: url(<?php echo base_url('assets/gambar/obat.jpg') ?>); ">
  <div class="container">
    <br>
    <br>
    <div class="row">
      <div class="col-md-7">

      </div>
      <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading">Login</div>
          <div class="panel-body">

            <form action="<?php echo base_url()?>index.php/login/do_login/" method="post" />
              <?php
                if (validation_errors() || $this->session->flashdata('result_login')) {
                            ?>
                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Warning!</strong>
                                <?php echo validation_errors(); ?>
                                <?php echo $this->session->flashdata('result_login'); ?>
                            </div>
                        <?php } ?>
              <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" name="username" id="username" type="text" placeholder="Masukan Username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" name="password" id="password" type="password" placeholder="Masukan Password">
              </div>
              <p>*silahkan Login terlebih dahulu</p>
              <input type="submit" class="btn btn-primary btn-block" name="" value="Login">

            </form>
          </div>
        </div>
      </div>

      </div>
    </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/popper/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
