<div class="container-fluid">
     <div class="row">
       <div class="col-md-9">
         <h3><?php echo $judul ?></h3>
       </div>
       <br>
     </div>
        <br>
        <div class="panel panel-default">
              <div class="panel-heading"><?php echo $judul ?></div>
              <div class="panel-body">
        <table id="table" class="table table-hover" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode Obat</th>
                <th class="text-center">Tanggal Daftar</th>
                <th class="text-center">Tanggal Masuk Stok</th>
                <th class="text-center">Nama Obat</th>
                <th class="text-center">Tanggal exp</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Satuan</th>
                <th class="text-center">Nama Suplier</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($row as $key) { ?>
                <tr>
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td class="text-center"><?php echo $key->kd_obat ?></td>
                  <td class="text-center"><?php echo $key->tgl_daftar ?></td>
                  <td class="text-center"><?php echo $key->tgl_masuk ?></td>
                  <td class="text-center"><?php echo $key->nama_obat ?></td>
                  <td class="text-center"><?php echo $key->tgl_exp ?></td>
                  <td class="text-center"><?php echo $key->harga ?></td>
                  <td class="text-center"><?php echo $key->stok ?></td>
                  <td class="text-center"><?php echo $key->satuan ?></td>
                  <td class="text-center"><?php echo $key->nama_supplier ?></td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
    </div>
  </div>
</div>

    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script type="text/javascript">

    $(document).ready(function(){
    $('#table').DataTable();
    });
    </script>
