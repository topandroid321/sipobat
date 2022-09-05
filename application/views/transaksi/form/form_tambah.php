<div class="row">
		<div class="col-md-12">
				<h2 class="page-header">
						Transaksi
				</h2>
		</div>
</div>

<div class="panel-group">
	<div class="panel panel-default">
		<div class="panel-heading">Transaksi</div>
		<div class="panel-body">
			<?php echo form_open('C_transaksi', array('class'=>'form-horizontal')); ?>
			<div class="form-group">
        <label class="col-sm-2 control-label">Nama Obat</label>
          <div class="col-sm-10">
          <input list="obat" name="nama_obat" placeholder="masukan nama obat" class="form-control">
          </div>
      </div>
			<datalist id="obat">
															 <?php foreach ($barang->result() as $b) {
																	 echo "<option value='$b->nama_obat'>";
															 } ?>

													 </datalist>
		  <datalist id="no_resep">
			<?php foreach ($no_resep->result() as $n) {
				 echo "<option value='$b->no_resep'>";
										 															 } ?>
			</datalist>
      <br>
			<div class="form-group">
				<label class="col-sm-2 control-label">No Resep</label>
					<div class="col-sm-10">
					<input type="text" name="no_resep" placeholder="masukan no resep" class="form-control">
					</div>
			</div>
			<br>
			<div class="form-group">
        <label class="col-sm-2 control-label">Quantity</label>
         <div class="col-sm-10">
         <input type="text" name="qty" placeholder="QTY" class="form-control">
         </div>
      </div>
			<br>
       <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | <?php echo anchor('C_transaksi/selesai_belanja','Selesai',array('class'=>'btn btn-success btn-sm'))?>
        </div>
      </div>
				 <br>
		       <table class="table table-striped table-bordered">
				                <thead>
				                     <tr>
				                         <th>No.</th>
				                         <th>Nama Obat</th>
																 <th>No resep</th>
				                         <th>Qty</th>
				                         <th>Harga</th>
				                         <th>Sub Total</th>
				                     </tr>
				                 </thead>
		                        <tbody>
															<?php $no=1; $total=0; foreach ($detail as $r){ ?>
																					 <tr class="gradeU">
																							 <td><?php echo $no ?></td>
																							 <td><?php echo $r->nama_obat.' - '.anchor('C_transaksi/hapusitem/'.$r->id_detail,'Hapus',array('style'=>'color:red;')) ?></td>
																							 <td><?php echo $r->no_resep ?></td>
																							 <td><?php echo $r->qty ?></td>
																							 <td>Rp. <?php echo number_format($r->harga,2) ?></td>
																							 <td>Rp. <?php echo number_format($r->qty*$r->harga,2) ?></td>
																					 </tr>
																			 <?php $total=$total+($r->qty*$r->harga);
																			 $no++; } ?>
		                        </tbody>
														<tr class="gradeA">
                                                <td colspan="5">T O T A L</td>
                                                <td>Rp. <?php echo number_format($total,2);?></td>
                                            </tr>
		                 </table>
		     </div>

		</div>
	</div>
</div>
