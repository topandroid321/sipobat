<div class="col-md-12">
				<div class="card mb-3">
					<div class="card-header">Form Tambah Data Siswa</div>
					<div class="card-body">
            <form action="<?php echo base_url(). '/C_transaksi/update'; ?>" method="post">
              <div class="container">
                 <div class="row">
                   <div class="col-sm-5">
                     <input type="hidden" name="id" value="<?php echo $r->id ?>">
                     <label for="kd_transaksi">Kode Transaksi</label>
                     <input type="text" class="form-control" name="kd_transaksi" value="<?php echo $r->kd_transaksi ?>">

                     <label for="no_resep">No Resep</label>
                     <input type="text" class="form-control" name="no_resep" value="<?php echo $r->no_resep ?>">

										 <label for="nama_obat">Nama Obat</label>
                        <input type="text" class="form-control" name="nama_obat" value="<?php echo $r->nama_obat ?>">
                  </div>
                  <div class="col-sm-5">
                      <br>
										<label for="tgl_beli">Tanggal Beli</label>
											<input type="text" class="form-control" name="tgl_beli" value="<?php echo $r->tgl_beli ?>">

										<label for="jumlah">Jumlah</label>
												<input type="text" class="form-control" name="jumlah" value="<?php echo $r->jumlah ?>">

										<label for="harga">Harga</label>
										<input class="form-control" type="text" name="harga" value="<?php echo $r->harga ?>">

                    <label for="deskripsi">Harga</label>
										<input class="form-control" type="text" name="deskripsi" value="<?php echo $r->deskripsi ?>">

										<br>
                    <input class="btn btn-primary" type="submit" name="kirim" value="Update">
										<a class="btn btn-danger" href="<?php echo base_url('C_transaksi') ?>">Cancel</a>
                  </div>
                 </div>
              </div>
            </body>

            <?php form_close(); ?>
					</div>
				</div>
			</div>
