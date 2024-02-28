<script>
              @page {
                margin: 10px;
              }
              </script> 
<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah-data"><i class="fas fa-plus">Tambah</i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
            </div>
            </div>
    
              <div class="card-body">
                <?php
                
                 use Kint\Zval\Value;

                if (session()->getFlashdata('pesan')){
                  echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                  echo session()->getFlashData('pesan');
                  echo '</h5></div>';

                }
                ?>

                <div class="card-body">
                <?php
                

                if (session()->getFlashData('gagal')){
                  echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                  echo session()->getFlashdata('gagal');
                  echo '</h5></div>';

                }
                ?>

                <?php $errors = session()->getFlashdata('errors');
                if(!empty($errors)) { ?>
                  <div class="alert alert-danger alert-dismissible">
                    <h4>Periksa lagi entry Form !!</h4>
                    <ul>
                      <?php foreach ($errors as $key => $error) { ?>
                      <li><?= esc($error)?></li>
                    <?php } ?>
                      </ul>
                    </div>
                    <?php } ?>
               <?php
               $pdf = false;
               if(strpos(current_url(),"printpdf")) {
                $pdf = true;
               }
               if($pdf == false){
              
               }
               ?> 
              <input class="btn btn-primary" type="button" value="Print PDF" onclick="window.open('<?php echo site_url('produk/printpdf')?>','blank')"/>
              <br/>
              <br/>
              <table id="example" class=" table table-bordered table-striped">
                <thead>
                
                    <tr class="text-center">
                        <th class="text-center" width="50px">No</th>
                        <th class="text-center">Kode Produk</th>
                        <th class="text-center">Nama Produk</th>
                        <th class="text-center"width="150px">Harga Beli</th>
                        <th class="text-center" width="150px">Harga Jual</th>
                        <th class="text-center" width="100px">Stok</th>
                        <th class="text-center" width="100px">Aksi</th>
                    </tr>
              </thead>
                    <tbody>
                      
                    <?php 
                    $pdf = false;
                    $no = 1 ;
                     foreach ($produk as $key => $value){?>
                        <tr>
                            <td $value><?= $no++ ?></td>
                            <td class="text-center"><?= $value['kode_produk'] ?> </td>
                            <td class="text-center"><?= $value['nama_produk'] ?></td>
                            <td class="text-right">Rp. <?= number_format($value['harga_beli'])?></td>
                            <td class="text-right">Rp. <?= number_format($value['harga_jual'] )?></td>
                            <td class="text-center"><?= $value['stok'] ?></td>
                            <td class="text-center">
                                 <button type="button" class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?=$value['id_produk']?>"><i class="fas fa-pencil-alt"></i></button>
                                 <button type="button"class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#hapus-data<?=$value['id_produk']?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


 
          
          
          <!-- TAMBAH DATA-->
          <div class="modal fade" id="tambah-data">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Produk/TambahData')?>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Kode Produk</label>
                <input name="kode_produk" id="kode_produk" class="form-control" placeholder="Produk" required>
              </div>

              <div class="form-group">
                <label for="">Nama Produk</label>
                <input name="nama_produk" class="form-control"  placeholder="Nama Produk" required>
              </div>

              <div class="form-group">
                <label for="">Harga Beli</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
                </div>
                <input name="harga_beli" class="form-control" onkeyup="hargaJual.value = parseInt(this.value) + (this.value * 200 / 100)"  placeholder="Harga Beli" required>
                </div>
                </div>

                <div class="form-group">
                <label for="">Harga Jual</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
                </div>
                <input name="harga_jual" class="form-control" id="hargaJual" placeholder="Harga Jual" required>
                </div>
                </div>

                <div class="form-group">
                <label for="">Stok</label>
                <input name="stok" type="number" class="form-control"  placeholder="Stok" required>   
              </div>
              
          

            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            </div>
            <?php echo form_close()?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>

      <!--  EDIT DATA-->
      <?php foreach ($produk as $key => $value) { ?>
        
<div class="modal fade" id="edit-data<?=$value['id_produk']?>">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php echo form_open('Produk/EditData/'. $value['id_produk'])?>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Kode Produk</label>
      <input name="kode_produk"  class="form-control" value="<?=$value ['kode_produk']?>" readonly>
      </div>

      <div class="form-group">
      <label for="">Nama Produk</label>
      <input name="nama_produk"   class="form-control" value="<?=$value ['nama_produk']?>"  required>
      </div>

      <div class="form-group">
      <label for="">Harga Beli</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text">Rp.</span>
      </div>
      <input name="harga_beli"  class="form-control" onkeyup="hargaJualUbah.value = parseInt(this.value) + (this.value * 200 / 100)" value="<?=$value ['harga_beli']?>"  required>
      </div>
      </div>

       <div class="form-group">
      <label for="">Harga Jual</label>
       <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text">Rp.</span>
      </div>  
      <input name="harga_jual"   class="form-control" id="hargaJualUbah" value="<?=$value ['harga_jual']?>" required>
      </div>
      </div>

      <label for="">Stok</label>
      <div class="form-group"></div>
      <input name="stok"   class="form-control" value="<?=$value ['stok']?>" required>
    </div>

  <div class="modal-footer justify-content-between">
    <button type="submit" class="btn btn-warning btn-flat">Simpan</button>
  </div>
  <?php echo form_close()?>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>

<?php } ?>

<!--  HAPUS DATA-->
<?php foreach ($produk as $key => $value) { ?>
        
        <div class="modal fade" id="hapus-data<?=$value['id_produk']?>">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Data <?= $subjudul ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open('Produk/HapusData/'. $value['id_produk'])?>
          <div class="modal-body">
            Apakah Anda Yakin menghapus <b><?= $value['nama_produk']?>..?</b>
          </div>
          <div class="modal-footer justify-content-between">
            <a href = " <?= base_url('Produk/HapusData/' . $value['id_produk']) ?>" class= "btn btn-danger btn-flat">Hapus</a>
          </div>
          <?php echo form_close()?>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php } ?>
<script>

fetch('<?= base_url() ?>' + 'produk/getKode')
    .then(response => {
      // Check if response is successful (status code 200-299)
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      // Parse the JSON from the response
      return response.json();
    })
    .then(data => {
      kode_produk.value = data.kode;
    })
    .catch(error => {
      // Handle errors
      console.error('There was a problem with the fetch operation:', error);
  });

  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
 
</script>