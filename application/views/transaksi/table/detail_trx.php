<h1>Detail Transaksi</h1>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
          <a href="<?php echo base_url('C_laporan/cetak_detail/').$this->uri->segment(3); ?>" class="btn btn-success fa fa-print"> Cetak</a>
     <table id="table" class="table table-striped">
         <thead>
           <tr>
             <th>No Resep</th>
             <th>Nama Obat</th>
             <th>Qty</th>
             <th>Harga</th>
             <th>Sub Total</th>
           </tr>
         </thead>
         <tbody>
          <?php $total=0;
            foreach ($detail as $key) { ?>
           <tr>
             <td><?php echo $key->no_resep; ?></td>
             <td><?php echo $key->nama_obat; ?></td>
             <td><?php echo $key->qty; ?></td>
             <td>Rp.<?php echo $key->harga; ?></td>
             <td>Rp.<?php echo $key->total; ?></td>
           </tr>
           <?php  $total = $total + $key->total; } ?>
         </tbody>
          <tr>
              <td colspan="4">Total</td>
              <td>Rp.<?php echo $total;?></td>
          </tr>
       </table>
     </div>
   </div>
 </div>
