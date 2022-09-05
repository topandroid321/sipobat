<div class="container-fluid">
     <div class="row">
       <div class="col-md-9">
         <h3>Data Permintaan Obat</h3>
       </div>
       <div class="col-md-3">
         <a href="<?php echo base_url('C_permintaan/tambah_data') ?>" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Permintaan</a>
       </div>

     </div>

        <br>
        <div class="panel panel-default">
              <div class="panel-heading">Data Permintaan</div>
              <div class="panel-body">
        <table id="table" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tgl Permintaan</th>
                    <th class="text-center">Nama Obat</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $no=1;
                foreach ($row as $r): ?>
              <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $r->tgl_permintaan ?></td>
                    <td class="text-center"><?php echo $r->nama_obat ?></td>
                    <td class="text-center"><?php echo $r->jumlah ?></td>
                    <td class="text-center"><?php echo $r->satuan ?></td>
                    <td class="text-center">
                      <a class="btn btn-warning" href="<?php echo base_url('C_permintaan/edit/').$r->id ;?>"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a class="btn btn-danger" href="<?php echo base_url('C_permintaan/hapus/').$r->id ;?>"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script type="text/javascript">

    $(document).ready(function(){
    $('#table').DataTable();
    });
    </script>
