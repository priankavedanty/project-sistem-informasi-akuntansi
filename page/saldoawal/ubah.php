<?php

    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * from tb_akun WHERE id='$id' ");
    $tampil = $sql->fetch_assoc();
    $kategori = $tampil['kategori_akun'];
?>

<!-- general form elements -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">UBAH DATA SALDO AWAL AKUN</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label>Kode akun</label>
        <input type="text" class="form-control" name="kode_akun" value="<?php echo $tampil ['kode_akun'];?>">
      </div>
      <div class="form-group">
      <label>Nama akun</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $tampil ['nama_akun'];?>">
      </div>
      <div class="form-group">
      <label>Saldo akun</label>
        <input type="text" class="form-control" name="saldo" value="<?php echo $tampil ['saldo'];?>">
      </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="ubah" class="btn btn-warning">Simpan</button>
    </div>
  </form>
</div>
<!-- /.card -->

<?php

    if (isset($_POST['ubah']))  {

        $nama = $_POST ['nama'];
        $kode_akun = $_POST ['kode_akun'];
        $saldo = $_POST ['saldo'];

        $sql1 = $koneksi->query("UPDATE tb_akun SET nama_akun='$nama', kode_akun='$kode_akun', saldo='$saldo' WHERE id='$id'");

        if ($sql1) 
        {
            echo "<script>
                    alert('Ubah data berhasil');
                    document.location='?page=saldoawal';
                </script>";
        }else 
        {
            echo "<script>
                    alert('Ubah data gagal');
                    document.location='?page=saldoawal';
                </script>";
        }
    }

?>