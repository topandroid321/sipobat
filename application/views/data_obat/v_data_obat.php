<div class="container-fluid">
     <div class="row">
       <div class="col-md-9">
         <h3><?php echo $judul ?></h3>
       </div>
       <br><br>
       <div class="col-md-3">
         <button class="btn btn-primary" onclick="fungsitambah_data()"><i class="fa fa-plus"></i>Tambah Data Obat</button>
       </div>

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
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script type="text/javascript">

    var save_method; //for save method string
    var table;

    $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('C_data_obat/ajax_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            {
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],

            deferRender:    true,
            scroller:       true
        });

        $( function() {
          $( "#datepicker" ).datepicker({
            dateFormat:'yy-mm-dd',
            changeMonth: true,
            changeYear: true
          });

        } );

        $( function() {
          $( "#datepicker1" ).datepicker({
            dateFormat:'yy-mm-dd',
            changeMonth: true,
            changeYear: true
          });

        } );

        $( function() {
          $( "#datepicker2" ).datepicker({
            dateFormat:'yy-mm-dd',
            changeMonth: true,
            changeYear: true
          });

        } );

    });

function fungsitambah_data()
 {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Data Obat'); // Set Title to Bootstrap modal title
 }
 function fungsiedit_data(id)
 {
   save_method = 'update';
   $('#form')[0].reset(); // reset form on modals
   $('.form-group').removeClass('has-error'); // clear error class
   $('.help-block').empty(); // clear error string

   //Ajax Load data from ajax
   $.ajax({
     url : "<?php echo site_url('C_data_obat/ajax_edit/')?>/" + id,
     type: "GET",
     dataType: "JSON",
     success: function(data)
     {
       $('[name="kd_obat"]').val(data.kd_obat);
       $('[name="tgl_masuk"]').val(data.tgl_masuk);
       $('[name="nama_supplier"]').val(data.nama_supplier);
       $('[name="nama_obat"]').val(data.nama_obat);
       $('[name="tgl_daftar"]').val(data.tgl_daftar);
       $('[name="tgl_exp"]').val(data.tgl_exp);
       $('[name="harga"]').val(data.harga);
       $('[name="stok"]').val(data.stok);
       $('[name="satuan"]').val(data.satuan);
       $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
       $('.modal-title').text('Edit Data Obat'); // Set title to Bootstrap modal title
     },
     error: function (jqXHR, textStatus, errorThrown)
     {
       alert('Error get data from ajax');
     }
   });
 }

 function reload_table()
 {
    table.ajax.reload(null,false); //reload datatable ajax
 }
 function save()
 {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('C_data_obat/ajax_add')?>";
    } else {
        url = "<?php echo site_url('C_data_obat/ajax_update')?>";
    }
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        }
    });
 }

 function fungsihapus_data(id)
 {
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_data_obat/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
 }
  </script>

  <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form" action="" method="post">
              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Kode Obat</label>
                  <div class="col-md-8">
                  <input name="kd_obat" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Tanggal Daftar</label>
                  <div class="col-md-8">
                  <input name="tgl_daftar" placeholder="" id="datepicker1" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Tanggal Masuk stok</label>
                  <div class="col-md-8">
                  <input name="tgl_masuk" placeholder="" id="datepicker" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Kode Supplier</label>
                  <div class="col-md-8">
                    <select name="nama_supplier" class="form-control">
                                      <option value="">--Nama Supplier--</option>
                                      <?php $row = $this->M_data_obat->get_supplier()->result_array();
                                      foreach ($row as $key => $value): ?>
                                      <option value="<?php echo $value['nama_suplier'] ?>"><?php echo $value['kd_suplier'] ?>|<?php echo $value['nama_suplier'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Nama Obat</label>
                  <div class="col-md-8">
                  <input name="nama_obat" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Tanggal Ekp</label>
                  <div class="col-md-8">
                  <input name="tgl_exp" placeholder="" id="datepicker2" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Harga</label>
                  <div class="col-md-8">
                  <input name="harga" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Jumlah</label>
                  <div class="col-md-8">
                  <input name="stok" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Satuan</label>
                  <div class="col-md-8">
                   <input type="text" name="satuan" value="" class="form-control">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

          </form>
        </div>
        <div class="modal-footer">
               <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
           </div>
      </div>
    </div>
  </div>

      </div>
    </div>
