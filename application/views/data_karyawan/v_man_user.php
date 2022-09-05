<div class="container-fluid">
     <div class="row">
       <div class="col-md-9">
         <h3>Management User</h3>
       </div>
       <div class="col-md-3">
         <button class="btn btn-primary" onclick="fungsitambah_user()"><i class="fa fa-plus"></i>Tambah User</button>
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
                    <th class="text-center">Nik Karyawan</th>
                    <th class="text-center">Nama Karyawan</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Tempat lahir</th>
                    <th class="text-center">Tanggal lahir</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Telp</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Level</th>
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
                "url": "<?php echo site_url('C_man_user/ajax_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            {
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],

            scrollY:        200,
            scrollX:        200,
            deferRender:    true,
            scroller:       true
        });

    });

function fungsitambah_user()
 {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Data User'); // Set Title to Bootstrap modal title
 }
 function fungsiedit_user(id)
 {
   save_method = 'update';
   $('#form')[0].reset(); // reset form on modals
   $('.form-group').removeClass('has-error'); // clear error class
   $('.help-block').empty(); // clear error string

   //Ajax Load data from ajax
   $.ajax({
     url : "<?php echo site_url('C_man_user/ajax_edit/')?>/" + id,
     type: "GET",
     dataType: "JSON",
     success: function(data)
     {
       $('[name="id"]').val(data.id);
       $('[name="nik_karyawan"]').val(data.nik_karyawan);
       $('[name="nama_karyawan"]').val(data.nama_karyawan);
       $('[name="jk"]').val(data.jk);
       $('[name="tmp_lahir"]').val(data.tmp_lahir);
       $('[name="tgl_lahir"]').val(data.tgl_lahir);
       $('[name="alamat"]').val(data.alamat);
       $('[name="telp"]').val(data.telp);
       $('[name="username"]').val(data.username);
       $('[name="password"]').val(data.password);
       $('[name="level"]').val(data.level);
       $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
       $('.modal-title').text('Edit Data User'); // Set title to Bootstrap modal title
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
        url = "<?php echo site_url('C_man_user/ajax_add')?>";
    } else {
        url = "<?php echo site_url('C_man_user/ajax_update')?>";
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

 function fungsihapus_user(id)
 {
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_man_user/ajax_delete')?>/"+id,
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
            <input type="hidden" value="" name="id"/>
              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Nik Karyawan</label>
                  <div class="col-md-8">
                  <input name="nik_karyawan" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Nama Karyawan</label>
                  <div class="col-md-8">
                  <input name="nama_karyawan" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Jenis Kelamin</label>
                  <div class="col-md-8">
                  <select class="form-control" name="jk">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Tempat Lahir</label>
                  <div class="col-md-8">
                  <input name="tmp_lahir" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Tanggal Lahir</label>
                  <div class="col-md-8">
                  <input name="tgl_lahir" placeholder="" class="form-control" type="date">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Alamat</label>
                  <div class="col-md-8">
                  <input name="alamat" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Telp</label>
                  <div class="col-md-8">
                  <input name="telp" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Username</label>
                  <div class="col-md-8">
                  <input name="username" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Password</label>
                  <div class="col-md-8">
                  <input name="password" placeholder="" class="form-control" type="password">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Level</label>
                  <div class="col-md-8">
                  <select class="form-control" name="level">
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                  </select>
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
