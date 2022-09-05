<table border="1">
    <tr><th>No</th><th>Tanggal Transaksi</th><th>No Resep</th><th>Nama Karyawan</th><th>Total Transaksi</th></tr>
    <?php
    $no=1;
    $total=0;
    foreach ($record->result() as $r)
    {
        echo "<tr>
            <td width='10'>$no</td>
            <td width='160'>$r->tgl_beli</td>
            <td width='160'>$r->no_resep</td>
            <td>$r->nama_karyawan</td>
            <td>$r->total</td>
            </tr>";
        $no++;
        $total=$total+$r->total;
    }
    ?>
    <tr><td colspan="4">Total</td><td><?php echo $total;?></td></tr>
</table>
