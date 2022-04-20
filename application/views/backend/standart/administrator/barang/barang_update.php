
<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Barang        <small>Edit Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/barang'); ?>">Barang</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Barang</h3>
                            <h5 class="widget-user-desc">Edit Barang</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/barang/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_barang', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_barang', 
                            'method'  => 'POST'
                            ]); ?>
                        
                        <div class="form-group ">
                            <label for="kode_barang" class="col-sm-2 control-label">Kode Barang 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?= set_value('kode_barang', $barang->kode_barang); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="nama_barang" class="col-sm-2 control-label">Nama Barang 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?= set_value('nama_barang', $barang->nama_barang); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                        <div class="form-group ">
                            <label for="merek" class="col-sm-2 control-label">Merek 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="merek" id="merek" placeholder="Merek" value="<?= set_value('merek', $barang->merek); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="harga" class="col-sm-2 control-label">Harga Barang 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Barang" value="<?= set_value('harga', $barang->harga); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="usia_barang" class="col-sm-2 control-label">Usia Barang 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="usia_barang" id="usia_barang" placeholder="Usia Barang" value="<?= set_value('usia_barang', $barang->usia_barang); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="nilai_residu" class="col-sm-2 control-label">Nilai Residu 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nilai_residu" id="nilai_residu" placeholder="Merek" value="<?= set_value('nilai_residu', $barang->nilai_residu); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kategori" class="col-sm-2 control-label">Kategori 
                            <i class="required">*</i>
                            </label>	
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="kategori" id="kategori" data-placeholder="Select Kategori" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('kategori') as $row): ?>
                                    <option <?=  $row->kode_kategori ==  $barang->kategori ? 'selected' : ''; ?> value="<?= $row->kode_kategori ?>"><?= $row->kode_kategori; ?>-<?= $row->katerogi; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="kondisi" class="col-sm-2 control-label">Kondisi 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="kondisi" id="kondisi" data-placeholder="Select Kondisi" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('kondisi') as $row): ?>
                                    <option <?=  $row->nama_kondisi ==  $barang->kondisi ? 'selected' : ''; ?> value="<?= $row->nama_kondisi ?>"><?= $row->nama_kondisi; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="satuan" class="col-sm-2 control-label">Satuan 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?= set_value('satuan', $barang->satuan); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="gambar" class="col-sm-2 control-label">Gambar 
                            </label>
                            <div class="col-sm-8">
                                <div id="barang_gambar_galery"></div>
                                <input class="data_file data_file_uuid" name="barang_gambar_uuid" id="barang_gambar_uuid" type="hidden" value="<?= set_value('barang_gambar_uuid'); ?>">
                                <input class="data_file" name="barang_gambar_name" id="barang_gambar_name" type="hidden" value="<?= set_value('barang_gambar_name', $barang->gambar); ?>">
                                <small class="info help-block">
                                <b>Extension file must</b> JPG,PNG,JPG,PNG,JPEG,JPEG.</small>
                            </div>
                        </div>
                                                  
                                                <div class="form-group ">
                            <label for="keterangan" class="col-sm-2 control-label">Keterangan 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="keterangan" name="keterangan" rows="10" cols="80"> <?= set_value('keterangan', $barang->keterangan); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)">
                            <i class="fa fa-save" ></i> Save
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="save and back to the list (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> Save and Go to The List
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)">
                            <i class="fa fa-undo" ></i> Cancel
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i>Loading, Saving data</i>
                            </span>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
    $(document).ready(function(){
      
      CKEDITOR.replace('keterangan'); 
      var keterangan = CKEDITOR.instances.keterangan;
                   
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/barang';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
        $('#keterangan').val(keterangan.getData());
                    
        var form_barang = $('#form_barang');
        var data_post = form_barang.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_barang.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#barang_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
                     var params = {};
       params[csrf] = token;

       $('#barang_gambar_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/barang/upload_gambar_file',
              params : params
          },
          deleteFile: {
              enabled: true, // defaults to false
              endpoint: BASE_URL + '/administrator/barang/delete_gambar_file'
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
           session : {
             endpoint: BASE_URL + 'administrator/barang/get_gambar_file/<?= $barang->id_barang; ?>',
             refreshOnRequest:true
           },
          multiple : false,
          validation: {
              allowedExtensions: ["jpg","png","JPG","PNG","JPEG","jpeg"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#barang_gambar_galery').fineUploader('getUuid', id);
                   $('#barang_gambar_uuid').val(uuid);
                   $('#barang_gambar_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#barang_gambar_uuid').val();
                  $.get(BASE_URL + '/administrator/barang/delete_gambar_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#barang_gambar_uuid').val('');
                  $('#barang_gambar_name').val('');
                }
              }
          }
      }); /*end gambar galey*/
              
       
           
    
    }); /*end doc ready*/
</script>