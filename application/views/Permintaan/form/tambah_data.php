<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-heading">Form Tambah Data Siswa</div>
					<div class="panel-body">
            <form action="<?php echo base_url(). 'C_permintaan/tambah_aksi'; ?>" method="post">
              <div class="container">
                 <div class="row">

                   <div class="col-sm-4">
                     <label for="tgl_permintaan">Tanggal Permintaan</label>
                     <input type="date" class="form-control" name="tgl_permintaan" value="">

                     <label for="nama_obat">Nama Obat</label>
                      <input type="text" class="form-control" name="nama_obat" value="">
                    </div>

                    <div class="col-sm-4">
										 <label for="jumlah">jumlah</label>
                        <input type="text" class="form-control" name="jumlah" value="">
										<label for="satuan">satuan</label>
										 <input class="form-control" type="text" name="satuan" value="">
                   </div>
										<br>
                    <input class="btn btn-primary" type="submit" name="kirim" value="Tambah"><br><br>
										<a class="btn btn-danger" href="<?php echo base_url('C_permintaan') ?>">Batal</a>
                 </div>
              </div>
            </body>

            <?php form_close(); ?>
					</div>
				</div>
			</div>
