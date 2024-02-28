<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" >
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/dist/css/adminlte.min.css">


  <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('AdminLTE')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('AdminLTE')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('AdminLTE')?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('AdminLTE')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('AdminLTE')?>/dist/js/adminlte.min.js"></script>

<script src="<?= base_url('terbilang') ?>/terbilang.js"></script>
</head>
<body class="hold-transition layout-top-nav" onload="startTime()">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <span class="brand-text font-weight-light"> <i class="fas fa-shopping-cart text-primary"></i><b> Transaksi Penjualan</b></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

      <li class="nav-item">
          <?php if (session()->get('level') == '1') { ?>
            <a class="nav-link" href="<?= base_url('Admin')?>">
            <i class="fas fa-tachometer-alt text-primary"></i> Dashboard
          </a>
          <?php } else { ?>
          <a class="nav-link" href="<?= base_url('Home/Logout')?>">
          <i class="fas fa-sign-out-alt text-primary"></i> Logout
          </a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-7">
            <div class="card card-primary card-outline">
              <div class="card-body">
              <?php echo form_open('Penjualan/InsertCart') ?>
                <div class="row">
                  <div class="col-3">
                   <div class="form-group">
                    <label>Kode User</label>
                    <label class="form-control text-danger"><?= session('kode_user') ?></label>
                 </div>
                </div>

                <div class="col-3">
                   <div class="form-group">
                    <label>Tanggal</label>
                    <label class="form-control text-primary"><?= date('d M Y')?></label>
                 </div>
                </div>

                <div class="col-3">
                   <div class="form-group">
                    <label>Jam</label>
                    <label class="form-control text-primary" id="jam"></label>
                 </div>
                </div>

                <div class="col-3">
                   <div class="form-group">
                    <label>Kasir</label>
                    <label class="form-control text-primary"><?= session('nama_user') ?></label>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-5">
            <div class="card card-primary card-outline">
              <div class="card-body text-right">
                <label class="display-4">Rp. <?= number_format($subtotal, 0) ?>.-</label>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                    <div class="col-2">
                    <input name="nama_pelanggan" class="form-control" id="namaPelanggan" placeholder="Nama Pelanggan">
                  </div>
                    <div class="col-2 input-group">
                      <input name="kode_produk" id="kode_produk" class="form-control" placeholder="Kode Produk" autocomplete="off" required>
                      <span class="input-group-append">
                      <button  class="btn btn-primary btn-flat" data-toggle="modal" data-target="#cari-produk">
                        <i class="fas fa-search"></i>
                      </button>
                      <button type="reset" class="btn btn-danger btn-flat" onclick="key.value = ''">
                        <i class="fas fa-times"></i>
                      </button>
                    </span>
                  </div>
                  <div class="col-2">
                    <input name="nama_produk" class="form-control" id="nama_produk" placeholder="Nama Produk" readonly >
                  </div>
                  <div class="col-1">
                    <input name="jumlah_produk"  value="1" min="1" id="jumlah_produk" type="number" class="form-control" placeholder="Jumlah">
                  </div>
                  <div class="col-2">
                    <input name="harga_jual"  class="form-control" id="harga_jual" placeholder="Harga" readonly>
                  </div>

                  <div class="col-3">
                    <button type="submit" class="btn btn-flat btn-primary"><i class="fas fa-shopping-cart"></i> Add</button>
                    <?php echo form_close() ?>
                    <a href="<?= base_url('Penjualan/ResetCart') ?>" class="btn btn-flat btn-warning"><i class="fas fa-sync"></i> Reset</a>
                    <a class="btn btn-flat btn-success" data-toggle="modal" data-target="#pembayaran" onclick="Pembayaran()"><i class="fas fa-cash-register"></i> Pembayaran</a>
                  </div>
                </div>
                <?php echo form_close() ?>
              </div>
            </div>
              <hr>
              <div class="row">
              <div class="col-12">
                <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Jual</th>
                    <th width="100px">Jumlah</th>
                    <th>Total Harga</th>
                    <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($cart as $key => $value) { ?>
                      
                    <tr>
                      <td class="text-center"><?= $value['id']?></td>
                      <td class="text-center"><?= $value['name']?></td>
                      <td class="text-right">@Rp.<?= number_format($value['price'], 0) ?>.-</td>
                      <td class="text-center"><?= $value['qty']?> PCS</td>
                      <td class="text-right">Rp.<?= number_format($value['subtotal'], 0)?>.-</td>
                      <td class="text-center">
                        <a class="btn btn-falt btn-danger btn-sm"><i class="fas fa-times"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body text-center">
                <h2 id="terbilang"></h2>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal Pencarian Produk -->
  <div class="modal fade" id="cari-produk">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pencarian Data Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <table id="example" class="table table-bordered table-striped text-sm">
                <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                   foreach ($produk as $key => $value){ 
                     ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td><?= $value['kode_produk']?></td>
                      <td><?= $value['nama_produk']?></td>
                      <td><?= $value['harga_jual']?></td>
                      <td class="text-center">
                        <button Onclick="PilihProduk('<?= $value['kode_produk']; ?>')" class="btn btn-success btn-xs">Pilih</button>
                      </td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>

<!-- Modal Pencarian Produk -->
<div class="modal fade" id="pembayaran">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Transaksi Pembayaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open() ?>
              <div class="form-group">
              <label for="">Subtotal</label>
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
              </div>
              <input name="subtotal" value="<?= number_format($subtotal, 0) ?>" class="form-control form-control-lg text-right text-danger" readonly>
              </div>
              </div>

              <div class="form-group">
              <label for="">Dibayar</label>
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
              </div>
              <input name="dibayar" id="dibayar" class="form-control form-control-lg text-right text-success" autocomplete="off">
              </div>
              </div>
              
              <div class="form-group">
              <label for="">Kembalian</label>
              <div class="input-group mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
              </div>
              <input name="kembaian" class="form-control form-control-lg text-right text-primary" readonly>
              </div>
              </div>

              <?php echo form_close() ?>

              <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning btn-flat"><i class="fas fa-save"></i> Save Transaksi</button>
              </div>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
 



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<script>
        $(document).ready(function() {
          document.getElementById('terbilang').innerHTML = terbilang(<?= $subtotal ?>) + ' Rupiah';
            $('#kode_produk').keydown(function(e) {
                let kode_produk = $('#kode_produk').val();
                if (e.keyCode == 13) {
                    e.preventDefault();
                    if (kode_produk.length == '') {
                        Swal.fire('Kode Produk belum diinput!!');
                    } else {
                        CekProduk();
                    }
                }
            });

        });

        function CekProduk() {
            $.ajax({
                type: "post",
                url: "<?= base_url('Penjualan/CekProduk') ?>",
                data: {
                    kode_produk: $('#kode_produk').val(),
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.nama_produk == '') {
                        Swal.fire('Kode Produk tidak terdaftar!!');
                    } else {
                        $('[name="nama_produk"]').val(response.nama_produk);
                        $('[name="harga_jual"]').val(response.harga_jual);
                    }
                }
            });
        }
    </script>

<script>
  $(document).ready(function(){
    $('#jumlah_produk').focus();
    $('#kode_produk').keydown(function(e) {
    let kode_produk = $('kode_produk').val();
      if (e.keycode == 13) {
          e.preventDefault();
          if (kode_produk.length == '') {
            Swal.fire('Kode Produk Tidak Terdaftar!!'); 
          } else {
            CekProduk();

          }
      }
    });
  });

  function CekProduk(){
    $.ajax({
      type :"POST",
      url : "<?= base_url('Penjualan/CekProduk') ?>",
      data : {
      kode_produk : $('#kode_produk').val(),
      },
      dataType : "JSON",
      success : function(response){
        if (response.nama_produk == ''){
          Swal.fire('Kode Produk Tidak Terdaftar!!');
        } else {
          $('[name="nama_produk"]').val(response.nama_produk);
          $('[name="harga_jual"]').val(response.harga_jual);
          $('#jumlah_produk').fokus();
        }
      }
    });

  }

  function PilihProduk(kode_produk){
    $('#kode_produk').val(kode_produk);
    $('#cari-produk').modal('hide');
    $('#kode_produk').fokus();
  }

  function Pembayaran(){
    $('#pembayaran').modal('show');
  }
</script>

<script>
  window.onload = function(){
    startTime();
  }
  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(function(){
      startTime();
    }, 1000);
  }

  function checkTime(i){
    if (i < 10){
      i = "0" + i
    }
    return i;
  }
  </script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false,
      "paging": true,
      "info": true,
      "ordering": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
  
</body>
</html>