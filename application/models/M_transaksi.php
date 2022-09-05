<?php
class M_transaksi extends CI_Model
{
    function simpan_barang()
    {
        $nama_obat    =  $this->input->post('nama_obat');
        $no_resep    =  $this->input->post('no_resep');
        $qty            =  $this->input->post('qty');
        $kd_obat       = $this->db->get_where('t_gudang_obat',array('nama_obat'=>$nama_obat))->row_array();
        $data           = array('kd_obat'=>$kd_obat['kd_obat'],
                                'no_resep'=>$no_resep,
                                'qty'=>$qty,
                                'harga'=>$kd_obat['harga'],
                                'status'=>'0');
        $this->db->insert('t_detail_transaksi',$data);
        $jumlah_beli = $this->input->post('qty');
        $this->db->query("update t_gudang_obat set stok = stok-$jumlah_beli");
    }

    function tampilkan_detail_transaksi()
    {
        $query  ="SELECT td.id_detail,td.qty,td.harga,td.no_resep,b.nama_obat
                FROM t_detail_transaksi as td,t_gudang_obat as b
                WHERE b.kd_obat=td.kd_obat and td.status='0'";
        return $this->db->query($query);
    }

    function hapusitem($id)
    {
        $this->db->where('id_detail',$id);
        $this->db->delete('t_detail_transaksi');
    }


    function selesai_belanja($data)
    {
        $this->db->insert('t_transaksi',$data);
        $last_id=  $this->db->query("select id_transaksi from t_transaksi order by id_transaksi desc")->row_array();
        $this->db->query("update t_detail_transaksi set id_transaksi='".$last_id['id_transaksi']."' where status='0'");
        $this->db->query("update t_detail_transaksi set status='1' where status='0'");
    }

    function detail_belanja(){
      $kondisi = $this->uri->segment(3);
      $query ="SELECT t.id_transaksi,td.qty,td.no_resep,gd.harga,gd.nama_obat,td.harga*td.qty as total FROM t_gudang_obat as gd,t_transaksi AS t,t_detail_transaksi AS td WHERE td.id_transaksi=t.id_transaksi and td.id_transaksi = $kondisi and td.kd_obat = gd.kd_obat";
      return $this->db->query($query);
    }

    function c_detail_belanja(){
      $kondisi = $this->uri->segment(3);
      $query ="SELECT t.id_transaksi,td.qty,td.no_resep,gd.harga,gd.nama_obat,td.harga*td.qty as total FROM t_gudang_obat as gd,t_transaksi AS t,t_detail_transaksi AS td WHERE td.id_transaksi=t.id_transaksi and td.id_transaksi = $kondisi and td.kd_obat = gd.kd_obat";
      return $this->db->query($query);
    }

    function laporan_default()
    {
        $query="SELECT t.tgl_beli,td.no_resep,u.nama_karyawan,td.id_transaksi,sum(td.harga*td.qty) as total
                FROM t_transaksi as t,t_detail_transaksi as td,t_user as u
                WHERE td.id_transaksi=t.id_transaksi and u.id_karyawan=t.id_karyawan
                group by t.id_transaksi";
        return $this->db->query($query);
    }

    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT t.tgl_beli,td.no_resep,u.nama_karyawan,td.id_transaksi,sum(td.harga*td.qty) as total
                FROM t_transaksi as t,t_detail_transaksi as td,t_user as u
                WHERE td.id_transaksi=t.id_transaksi and u.id_karyawan=t.id_karyawan
                and t.tgl_beli between '$tanggal1' and '$tanggal2'
                group by t.id_transaksi";
        return $this->db->query($query);
    }

    function get_no_resep(){
      $query=$this->db->query('SELECT no_resep FROM t_detail_transaksi');
      return $query;
    }

    function jumlah_data(){
		return $this->db->get('t_transaksi')->num_rows();
	}

    function get_one($id)
    {
        $param  =   array('id_transaksi'=>$id);
        return $this->db->get_where('t_detail_transaksi',$param);
    }
}
