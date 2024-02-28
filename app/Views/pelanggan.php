<script>
              @page {
                margin: 10px;
              }
              </script> 
<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah-data"><i class="fas fa-plus"></i> Tambah Data
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                
                 use Kint\Zval\Value;

                if (session()->getFlashdata('gagal')){
                  echo '<div class="alert alert-success alert-dismissible">
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



                    <table id="example" class=" table table-bordered table-striped">
               <thead>

               <tr class="text-center">
               <th class="text-center" width="50px">No</th>
                        <th class="text-center">Kode Pelanggan</th>
                        <th class="text-center">Nama Pelanggan</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center" width="150px">Nomor Telpon</th>
                        <th class="text-center" width="100px">Aksi</th>
                    </tr>
              </thead>
                    <tbody>
                      
                    <?php $no = 1 ;
                     foreach ($pelanggan as $key => $value){?>
                        <tr>
                        <td $value><?= $no++ ?></td>
                            <td class="text-center"><?= $value['kode_pelanggan'] ?> </td>
                            <td class="text-center"><?= $value['nama_pelanggan'] ?></td>
                            <td class="text-center"><?= $value['alamat'] ?></td>
                            <td class="text-center"><?= $value['nomor_telpon'] ?></td>
                            <td>
                                 <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?=$value['id_pelanggan']?>"><i class="fas fa-pencil-alt"></i></button>
                                 <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#hapus-data<?=$value['id_pelanggan']?>"><i class="fas fa-trash"></i></button>
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
              <h4 class="modal-title">Tambah Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Pelanggan/TambahData')?>
            <div class="modal-body">
              <div class="form-group">
              <label for="">Kode Pelanggan</label>
                <input name="kode_pelanggan" id="kode_pelanggan" class="form-control" placeholder="Masukan Kode Pelanggan" required>
                <label for="">Nama Pelanggan</label>
                <input name="nama_pelanggan"  class="form-control" placeholder="Masukan Nama Pelanggan" required>
                <label for="">Alamat</label>
                <input name="alamat" class="form-control"  placeholder="Masukan Alamat Anda" required>
                <label for="">Nomor Telpon</label>
                <input type="text" name="nomor_telpon" class="form-control"  maxlength="13" onkeypress="return hanyaAngka(event)" placeholder="Masukan Nomor Kontak Yang Aktif" required/>
              </div>
          
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


      <!--  EDIT DATA-->
      <?php foreach ($pelanggan as $key => $value) { ?>

         
          <div class="modal fade" id="edit-data<?=$value['id_pelanggan']?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('Pelanggan/EditData/' . $value['id_pelanggan'])?>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Kode Pelanggan</label>
                <input name="kode_pelanggan"  class="form-control" value="<?=$value ['kode_pelanggan']?>" readonly>
                <label for="">Nama Pelanggan</label>
                <input name="nama_pelanggan"  class="form-control" value="<?=$value ['nama_pelanggan']?>" required>
                <label for="">Alamat</label>
                <input name="alamat"   class="form-control" value="<?=$value ['alamat']?>"  required>
                <label for="">Nomor Kontak</label>
                <input name="nomor_telpon"  class="form-control" value="<?=$value ['nomor_telpon']?>"  required>
              </div>
          
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
      <?php } ?>

      <!--  HAPUS DATA-->
      <?php foreach ($pelanggan as $key => $value) { ?>

         
<div class="modal fade" id="hapus-data<?=$value['id_pelanggan']?>">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h4 class="modal-title">Hapus Data <?= $subjudul ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php echo form_open('Pelanggan/HapuseData/' . $value['id_pelanggan'])?>
  <div class="modal-body">
    <div class="form-group">
   
      Apakah Anda Yakin ingin menghapus <b><?= $value['nama_pelanggan']?></b>
    </div>

  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
    <a href = " <?= base_url('Pelanggan/HapusData/' . $value['id_pelanggan']) ?>" class= "btn btn-danger btn-flat">Hapus</a>
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
  fetch('<?= base_url() ?>' + 'pelanggan/getKode')
    .then(response => {
      // Check if response is successful (status code 200-299)
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      // Parse the JSON from the response
      return response.json();
    })
    .then(data => {
      kode_pelanggan.value = data.kode;
    })
    .catch(error => {
      // Handle errors
      console.error('There was a problem with the fetch operation:', error);
  });
</script>