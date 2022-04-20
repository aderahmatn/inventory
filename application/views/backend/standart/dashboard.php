<style type="text/css">
   .widget-user-header {
      padding-left: 20px !important;
   }
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
    <h1>
        Dashboard
        <small>
            Control panel
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard">
                </i>
                Home
            </a>
        </li>
        <li class="active">
            Dashboard
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
        
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <img alt="User Avatar" class="img-circle" src="<?=BASE_ASSET;?>/img/cloud.png">
                        </img>
                    </div>
                    <h3 class="widget-user-username">
                        Gold Lion Store
                    </h3>
                    <h5 class="widget-user-desc">
                        Aplikasi Inventaris Barang
                    </h5>
                </div>
                <table class="table">
                    <tr>
                        <td>
                            Database
                        </td>
                        <td>
                            <b style="color:#f39c12 ">
                                <?=get_database_config('database');?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Hostname
                        </td>
                        <td>
                            <b style="color:#f39c12 ">
                                <?=get_database_config('hostname');?>
                            </b>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row col-md-8">
            <div class="row-fluid">

                 <?php
                
                $query = $this->db->query('SELECT * FROM pengajuan');
                
                ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box button" onclick="goUrl('administrator/pengajuan')">
                        <span class="info-box-icon bg-aqua">
                            <i class="ion ion-ios-gear">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <b>DATA PEMINJAMAN</b>
                                <br><br>(<?php echo $query->num_rows();?>)
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                
                $query = $this->db->query('SELECT * FROM barang');
                
                ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box button" onclick="goUrl('administrator/barang')">
                        <span class="info-box-icon bg-yellow">
                            <i class="ion ion-social-chrome">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <b>STOK BARANG</b>
                                <br><br>(<?php echo $query->num_rows();?>)
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box button" onclick="goUrl('administrator/pengajuan')">
                        <span class="info-box-icon bg-aqua">
                            <i class="ion ion-ios-paper">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <b>RETURN BARANG</b>
                                <br><br>Klik untuk mengelola data <br>return barang
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box button" onclick="goUrl('administrator/pengembalian')">
                        <span class="info-box-icon bg-yellow">
                            <i class="ion ion-android-list">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <b>DATA PENGEMBALIAN BARANG</b>
                                <br><br>Klik untuk mengelola data <br>pengembalian barang
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <?php
                
                $query = $this->db->query('SELECT * FROM departemen');
                
                ?>
        <div class="row-fluid">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box button" onclick="goUrl('administrator/departemen')">
                        <span class="info-box-icon bg-aqua">
                            <i class="ion ion-ios-paper">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <b>Departmen</b>
                                <br><br>(<?php echo $query->num_rows();?>)
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                
                $query = $this->db->query('SELECT * FROM lokasi');
            
                ?>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box button" onclick="goUrl('administrator/lokasi')">
                        <span class="info-box-icon bg-yellow">
                            <i class="ion ion-android-list">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <b>LOKASI</b>
                                <br><br>(<?php echo $query->num_rows();?>)
                            </span>
                        </div>
                    </div>
                </div>
                 <?php
                
                $query = $this->db->query('SELECT * FROM aauth_users');
               
                ?>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="info-box button" onclick="goUrl('administrator/user')">
                        <span class="info-box-icon bg-red">
                            <i class="ion ion-android-list">
                            </i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <b>USER</b>
                                <br><br>(<?php echo $query->num_rows();?>)
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--
     <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sold Item</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="revenue-chart" style="height: 300px;"></div>
            </div>
          </div>
          
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Sales Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            </div>
          </div>
   

        </div>
      -->
        <!-- /.col (LEFT) 
        <div class="col-md-6">
        
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Visitor</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
            
          </div>
           /.box -->

          <!-- BAR CHART 
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Usage Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 230px;"></div>
            </div>

            /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
</section>
<!-- /.content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.min.js"></script>
<script>
  $(function () {
    "use strict";

    // AREA CHART
    //var area = new Morris.Area({
   //   element: 'revenue-chart',
   //   resize: true,
    //  data: [
   //     {y: '2015 Q1', item1: 2666, item2: 2666},
   //     {y: '2015 Q2', item1: 2778, item2: 2294},
   //     {y: '2015 Q3', item1: 4912, item2: 1969},
   //     {y: '2015 Q4', item1: 3767, item2: 3597},
    //    {y: '2016 Q1', item1: 6810, item2: 1914},
   //     {y: '2016 Q2', item1: 5670, item2: 4293},
    //    {y: '2016 Q3', item1: 4820, item2: 3795},
    //    {y: '2016 Q4', item1: 15073, item2: 5967},
    //    {y: '2017 Q1', item1: 10687, item2: 4460},
    //    {y: '2017 Q2', item1: 8432, item2: 5713}
    //  ],
    //  xkey: 'y',
    //  ykeys: ['item1', 'item2'],
    //  labels: ['Item 1', 'Item 2'],
    //  lineColors: ['#a0d0e0', '#3c8dbc'],
    //  hideHover: 'auto'
   // });

    // LINE CHART
  //  var line = new Morris.Line({
   //   element: 'line-chart',
   //   resize: true,
   //   data: [
    //    {y: '2015 Q1', item1: 2666},
   //     {y: '2015 Q2', item1: 2778},
     //   {y: '2015 Q3', item1: 4912},
    //    {y: '2015 Q4', item1: 3767},
    //    {y: '2016 Q1', item1: 6810},
   //     {y: '2016 Q2', item1: 5670},
   //     {y: '2016 Q3', item1: 4820},
   //     {y: '2016 Q4', item1: 15073},
   //     {y: '2017 Q1', item1: 10687},
   //     {y: '2017 Q2', item1: 8432}
   //   ],
   //   xkey: 'y',
   //   ykeys: ['item1'],
   //   labels: ['Item 1'],
   //   lineColors: ['#3c8dbc'],
   //   hideHover: 'auto'
  //  });

    //DONUT CHART
  //  var donut = new Morris.Donut({
   //   element: 'sales-chart',
  //    resize: true,
 //     colors: ["#3c8dbc", "#f56954", "#00a65a"],
 //     data: [
 //       {label: "Download Sales", value: 12},
  //      {label: "In-Store Sales", value: 30},
  //      {label: "Mail-Order Sales", value: 20}
  //    ],
 //     hideHover: 'auto'
 //   });

    //BAR CHART
 //   var bar = new Morris.Bar({
 //     element: 'bar-chart',
  //    resize: true,
 //     data: [
 //       {y: '2013', a: 100, b: 90},
 //       {y: '2014', a: 75, b: 65},
 //       {y: '2015', a: 50, b: 40},
 ////       {y: '2017', a: 75, b: 65},
  //      {y: '2018', a: 50, b: 40},
  //      {y: '2019', a: 75, b: 65},
  //      {y: '2020', a: 100, b: 90}
 //     ],
  //    barColors: ['#00a65a', '#f56954'],
  //    xkey: 'y',
  ///    ykeys: ['a', 'b'],
  //    labels: ['CPU', 'DISK'],
   //   hideHover: 'auto'
  //  });
  //});
</script>