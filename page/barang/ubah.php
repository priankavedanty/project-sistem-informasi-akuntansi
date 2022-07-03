<?php

    $no = $_GET['no'];
    $sql = $koneksi->query("SELECT * FROM tb_barang WHERE no='$no' ");
    $tampil = $sql->fetch_assoc();
    $jenis = $tampil['jenis'];
    $satuan = $tampil['satuan'];
?>

<!-- general form elements -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">UBAH DATA BARANG</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
         <label>Kode barang</label>
          <input class="form-control" name="kode" value="<?php echo $tampil ['kode_barang'];?>"/>
      </div>
      <div class="form-group">
        <label>Nama barang</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $tampil ['nama_barang'];?>"/>
      </div>
      <div class="form-group">
        <label>Jenis barang</label>
        <select class="custom-select form-control-border" name="jenis">
          <?php
              $sql = $koneksi->query("SELECT * FROM tb_jenis_barang order by no");
              if (mysqli_num_rows($sql) !=0) {
                  while ($row = mysqli_fetch_assoc($sql)) {
                      echo '<option>'.$row['jenis'].'</option>';
                  }
              }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Satuan barang</label>
        <select class="custom-select form-control-border" name="satuan">
          <?php
              $sql = $koneksi->query("SELECT * FROM tb_satuan order by no");
              if (mysqli_num_rows($sql) !=0) {
                  while ($row = mysqli_fetch_assoc($sql)) {
                      echo '<option>'.$row['satuan'].'</option>';
                  }
              }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Stok</label>
        <input type="text" name="stok" class="form-control" value="<?php echo $tampil ['stok_akhir'];?>"/>
      </div>
      <div class="form-group">
        <label>Harga beli</label>
        <input type="text" name="beli" class="form-control" value="<?php echo $tampil ['harga_beli'];?>"/>
      </div>
      <div class="form-group">
        <label>Harga jual</label>
        <input type="text" name="jual" class="form-control" value="<?php echo $tampil ['harga_jual'];?>"/>
      </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="ubah" class="btn btn-warning">Simpan</button>
      <button onclick="goBack()" class="btn btn-danger">Kembali</button>
        <script>
            function goBack() {
            window.history.back();
            }
        </script>
    </div>
  </form>
</div>
<!-- /.card -->

<?php

    if (isset($_POST['ubah']))  {

        $kode = $_POST ['kode'];
        $nama = $_POST ['nama'];
        $jenis = $_POST ['jenis'];
        $satuan = $_POST ['satuan'];
        $stok = $_POST ['stok'];
        $stok_akhir = $stok + $tampil['stok_bertambah'] - $tampil['stok_berkurang'];
        $beli = $_POST ['beli'];
        $jual = $_POST ['jual'];

        $sql = $koneksi->query("UPDATE tb_barang SET kode_barang='$kode', nama_barang='$nama', jenis='$jenis', satuan='$satuan', stok_akhir='$stok', stok_akhir='$stok_akhir', harga_beli='$beli', harga_jual='$jual' WHERE no='$no'");

        if ($sql) 
        {
            echo "<script>
                    alert('Ubah data berhasil');
                    document.location='?page=barang';
                </script>";
        }else 
        {
            echo "<script>
                    alert('Ubah data gagal');
                    document.location='?page=barang';
                </script>";
        }
    }

?>