<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Sipobat</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
	<!-- ICONS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/demo.css">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url();?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo site_url();?>assets/img/favicon.png">

	<link rel="stylesheet" href="<?php echo base_url('assets/jquery/jquery-ui.css') ?>">

  <!-- dataTables -->
  <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
    <!-- memanggil navbar -->
       <?php $this->load->view('Dashboard/header'); ?>
    <!-- endnavbar -->

    <!-- memanggil sidebar -->
      <?php $this->load->view('Dashboard/sidebar'); ?>
     <!-- endsidebar -->

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
               <?php $this->load->view($content); ?>
					<div class="row">
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/jquery/jquery-ui.js')?>"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?php echo base_url();?>assets/scripts/klorofil-common.js"></script>
</body>

</html>
