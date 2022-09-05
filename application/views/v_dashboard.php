<div class="panel-group">
  <div class="panel panel-default">
        <div class="panel-body">
         <h3>Dashboard</h3>
          <div class="row">
              <div class="col-md-3">
                <div class="metric">
                  <span class="icon"><i class="fa fa-download"></i></span>
                  <p>
                    <?php $query = $this->db->query('SELECT * FROM t_gudang_obat'); ?>
                    <span class="number"><?php echo $query->num_rows(); ?></span>
                    <span class="title">Data Obat</span>
                  </p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="metric">
                  <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                  <p>
                    <?php $query = $this->db->query('SELECT * FROM t_transaksi'); ?>
                    <span class="number"><?php echo $query->num_rows(); ?></span>
                    <span class="title">Transaksi</span>
                  </p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="metric">
                  <span class="icon"><i class="fa fa-eye"></i></span>
                  <p>
                    <?php $query = $this->db->query('SELECT * FROM t_permintaan'); ?>
                    <span class="number"><?php echo $query->num_rows(); ?></span>
                    <span class="title">Data Permintaan</span>
                  </p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="metric">
                  <span class="icon"><i class="fa fa-user-o"></i></span>
                  <p>
                    <?php $query = $this->db->query('SELECT * FROM t_user'); ?>
                    <span class="number"><?php echo $query->num_rows(); ?></span>
                    <span class="title">Karyawan</span>
                  </p>
                </div>
              </div>
            </div>

        </div>
      </div>
</div>
