<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Laporan Transaksi
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('C_transaksi/laporan', array('class'=>'form-inline')); ?>
                    <div class="form-group">
                        <label for="exampleInputName2">Tanggal</label>
                        <input type="date" name="tanggal1" class="form-control" placeholder="Tanggal Mulai">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2"> - </label>
                        <input type="date" name="tanggal2" class="form-control" placeholder="Tanggal Selesai">
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Tampilkan</button>
                    <a class="fa fa-print btn btn-success" href="<?php echo base_url('C_transaksi/excel'); ?>"> Cetak all</a>
                    <a class="fa fa-print btn btn-success" href="<?php echo base_url('C_transaksi/excel_priode'); ?>"> Cetak Priode</a>
                </form>

            </div>
        </div>
        <!-- /. PANEL  -->
    </div>


    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Transaksi</th>
                                <th>No Resep</th>
                                <th>Karyawan</th>
                                <th>Total Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = $this->uri->segment('4') + 1; $total=0; foreach ($record->result() as $r){ ?>
                            <tr class="gradeU">
                                <td><?php echo $no ?></td>
                                <td><?php echo $r->tgl_beli ?></td>
                                <td><?php echo $r->no_resep ?></td>
                                <td><?php echo $r->nama_karyawan ?><a href="<?php echo base_url('C_transaksi/detail_trx/'.$r->id_transaksi) ?>"><i class="fa fa-eye text-center"></td>
                                <td>Rp.<?php echo $r->total ?></td>
                            </tr>
                        <?php $no++; $total=$total+$r->total; } ?>
                            <tr>
                                <td colspan="4">Total</td>
                                <td>Rp.<?php echo $total;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /. TABLE  -->
            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
