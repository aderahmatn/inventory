
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Mutasi/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function assets() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function assets() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Mutasi<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mutasi</li>
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
                     <div class="row pull-right">
                        <?php is_allowed('mutasi_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Mutasi (Ctrl+a)" href="<?=  site_url('administrator/mutasi/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Mutasi</a>
                        <?php }) ?>
                        <?php is_allowed('mutasi_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Mutasi" href="<?= site_url('administrator/mutasi/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('mutasi_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Mutasi" href="<?= site_url('administrator/mutasi/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Mutasi</h3>
                     <h5 class="widget-user-desc">List All Mutasi <i class="label bg-yellow"><?= $mutasi_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_mutasi" id="form_mutasi" action="<?= base_url('administrator/mutasi/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                           <th>Penempatan Awal</th>
                           <th>Tanggal Mutasi</th>
                           <th>Keterangan</th>
                           <th>Departemen Terkini</th>
                           <th>Lokasi Terkini</th>
                           <th>Nama Barang</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_mutasi">
                     <?php foreach($mutasis as $mutasi): ?>
                        <tr>
                           <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $mutasi->id_mutasi; ?>">
                           </td>
                           
                           <td><?= _ent($mutasi->id_penempatan); ?></td> 
                           <td><?= _ent($mutasi->tanggal_mutasi); ?></td> 
                           <td><?= _ent($mutasi->keterangan); ?></td> 
                           <td><?= _ent($mutasi->departemen); ?></td> 
                           <td><?= _ent($mutasi->lokasi); ?></td> 
                           <td><?= _ent($mutasi->nama_barang); ?></td> 
                           <td width="200">
                              <?php is_allowed('mutasi_view', function($m) use ($mutasi){?>
                              <a href="<?= site_url('administrator/mutasi/view/' . $mutasi->id_mutasi); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('mutasi_update', function($m) use ($mutasi){?>
                              <a href="<?= site_url('administrator/mutasi/edit/' . $mutasi->id_mutasi); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('mutasi_delete', function($m) use ($mutasi){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/mutasi/delete/' . $mutasi->id_mutasi); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($mutasi_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Mutasi data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="apply bulk actions">Apply</button>
                     </div>
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                            <option <?= $this->input->get('f') == 'id_penempatan' ? 'selected' :''; ?> value="id_penempatan">Id Penempatan</option>
                           <option <?= $this->input->get('f') == 'tanggal_mutasi' ? 'selected' :''; ?> value="tanggal_mutasi">Tanggal Mutasi</option>
                           <option <?= $this->input->get('f') == 'keterangan' ? 'selected' :''; ?> value="keterangan">Keterangan</option>
                           <option <?= $this->input->get('f') == 'departemen' ? 'selected' :''; ?> value="departemen">Departemen</option>
                           <option <?= $this->input->get('f') == 'lokasi' ? 'selected' :''; ?> value="lokasi">Lokasi</option>
                           <option <?= $this->input->get('f') == 'nama_barang' ? 'selected' :''; ?> value="nama_barang">Nama Barang</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/mutasi');?>" title="reset filters">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  </form>                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        <?= $pagination; ?>
                     </div>
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->

<!-- Page script -->
<script>
  $(document).ready(function(){
   
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

      swal({
          title: "Are you sure?",
          text: "data to be deleted can not be restored!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_mutasi').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "Are you sure?",
            text: "data to be deleted can not be restored!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/mutasi/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "Please choose bulk action first!",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });

  }); /*end doc ready*/
</script>