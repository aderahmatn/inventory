
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>


<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Barang      <small>Print Barang</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/barang'); ?>">Barang</a></li>
      <li class="active">Detail</li>
   </ol>
</section>
<!-- Main content -->
<script type="text/javascript">

  function printDiv(printableArea) {
     var printContents = document.getElementById(printableArea).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
jQuery(document).ready(printDiv);
</script>
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
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Barang</h3>
                     <h5 class="widget-user-desc">Print Barang
</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_barang" id="form_barang" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Barang </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->id_barang); ?>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kode Barang </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->kode_barang); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Barang </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->nama_barang); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Merek </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->merek); ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Harga </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->harga); ?>
                        </div>
                    </div>
                     <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Usia </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->usia_barang); ?>
                        </div>
                    </div>
                     <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nilai Residu </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->nilai_residu); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Kategori </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->kategori); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Jumlah </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->jumlah); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Satuan </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->satuan); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Gambar </label>
                        <div class="col-sm-8">
                             <?php if (is_image($barang->gambar)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/barang/' . $barang->gambar; ?>">
                                <img src="<?= BASE_URL . 'uploads/barang/' . $barang->gambar; ?>" class="image-responsive" alt="image barang" title="gambar barang" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/barang/' . $barang->gambar; ?>">
                                 <img src="<?= get_icon_file($barang->gambar); ?>" class="image-responsive" alt="image barang" title="gambar <?= $barang->gambar; ?>" width="40px"> 
                               <?= $barang->gambar ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                    <div id="printableArea" class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Barcode </label>
                        <div class="col-sm-8">
                          
                              <?php
                                if (!empty($barang->kode_inventaris)){

                              ?>
                                <img src="<?= BASE_ASSET; ?>/barcode/barcode.php?codetype=Code39&size=40&text=<?php echo $barang->kode_inventaris?>&print=true"/>
                              <?php
                                }
                              ?>
                            
                              
                        </div>
                    </div>
                                       
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Keterangan </label>

                        <div class="col-sm-8">
                           <?= _ent($barang->keterangan); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('barang_update', function($b) use ($barang){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit barang (Ctrl+e)"><i class="fa fa-edit" ></i> Edit Barang</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/barang/'); ?>"><i class="fa fa-undo" ></i> Go Barang List</a>
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
<!-- <script src="http://www.openjs.com/scripts/events/keyboard_shortcuts/shortcut.js"></script> -->
    <script language="javascript" type="text/javascript">

      var doc = new jsPDF();
      var specialElementHandlers = {
          '#form_barang': function (element, renderer) {
              return true;
          }
      };

      $('#btn_edit').click(function () {
          doc.fromHTML($('#form_barang').html(), 15, 15, {
              'width': 170,
                  'elementHandlers': specialElementHandlers
          });
          doc.save('sample-file.pdf');
      });

    </script>