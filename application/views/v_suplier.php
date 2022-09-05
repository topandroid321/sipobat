<div class="container-fluid">
     <div class="row">
       <div class="col-md-9">
         <h3>Data Suplier</h3>
       </div>
       <div class="col-md-3">
         <button class="btn btn-primary" onclick="fungsitambah_suplier()"><i class="fa fa-plus"></i>Tambah Suplier</button>
       </div>

     </div>

        <br>
        <div class="panel panel-default">
              <div class="panel-heading">Data Suplier</div>
              <div class="panel-body">
        <table id="table" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kd_Suplier</th>
                    <th>nama_suplier</th>
                    <th>Alamat</th>
                    <th>No_telp</th>
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
                "url": "<?php echo site_url('C_suplier/ajax_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            {
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],
        });

    });

function fungsitambah_suplier()
 {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Data Suplier'); // Set Title to Bootstrap modal title
 }
 function fungsiedit_suplier(id)
 {
   save_method = 'update';
   $('#form')[0].reset(); // reset form on modals
   $('.form-group').removeClass('has-error'); // clear error class
   $('.help-block').empty(); // clear error string

   //Ajax Load data from ajax
   $.ajax({
     url : "<?php echo site_url('C_suplier/ajax_edit/')?>/" + id,
     type: "GET",
     dataType: "JSON",
     success: function(data)
     {

       $('[name="id"]').val(data.id);
       $('[name="kd_suplier"]').val(data.kd_suplier);
       $('[name="nama_suplier"]').val(data.nama_suplier);
       $('[name="alamat"]').val(data.alamat);
       $('[name="no_telp"]').val(data.no_telp);
       $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
       $('.modal-title').text('Edit Data Suplier'); // Set title to Bootstrap modal title
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
        url = "<?php echo site_url('C_suplier/ajax_add')?>";
    } else {
        url = "<?php echo site_url('C_suplier/ajax_update')?>";
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

 function fungsihapus_suplier(id)
 {
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('C_suplier/ajax_delete')?>/"+id,
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
                  <label class="control-label col-md-4">Kode Suplier</label>
                  <div class="col-md-8">
                  <input name="kd_suplier" placeholder="" class="form-control" type="text">
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-4">Nama Suplier</label>
                  <div class="col-md-8">
                  <input name="nama_suplier" placeholder="" class="form-control" type="text">
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
                  <label class="control-label col-md-4">No Telp</label>
                  <div class="col-md-8">
                  <input name="no_telp" placeholder="" class="form-control" type="text">
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
