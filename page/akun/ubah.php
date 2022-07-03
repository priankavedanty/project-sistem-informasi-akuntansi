<?php
    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * from tb_akun WHERE id='$id' ");
    $tampil = $sql->fetch_assoc();
    $kategori = $tampil['kategori_akun'];
    $tipe = $tampil['tipe_akun'];

?>

<!-- general form elements -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">UBAH DATA AKUN</h3>
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
        <input type="text" class="form-control" name="nama_akun" value="<?php echo $tampil ['nama_akun'];?>">
      </div>
	   <div class="form-group">
      <label>Tipe akun</label>
        <select class="custom-select form-control-border" name="tipe_akun">
               <option value="Aktiva" <?php if ($tipe=='Aktiva') {echo "selected";}  ?>>Aktiva</option>
                <option value="Kewajiban" <?php if ($tipe=='Kewajiban') {echo "selected";}  ?>>Kewajiban</option>
                <option value="Modal" <?php if ($tipe=='Modal') {echo "selected";}  ?>>Modal</option>
                <option value="Pendapatan" <?php if ($tipe=='Pendapatan') {echo "selected";}  ?>>Pendapatan</option>
                <option value="Beban" <?php if ($tipe=='Beban') {echo "selected";}  ?>>Beban</option>
        </select>
    </div>
    <div class="form-group">
      <label>Kategori akun</label>
        <select class="custom-select form-control-border" name="kategori_akun">
            <option value="Debet" <?php if ($kategori=='Debet') {echo "selected";}?>>Debet</option>
            <option value="Kredit" <?php if ($kategori=='Kredit') {echo "selected";}?>>Kredit</option>
        </select>
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
    
  if (isset($_POST['ubah'])) {

      $kode = $_POST ['kode_akun'];
      $nama_akun = $_POST ['nama_akun'];
      $tipe = $_POST ['tipe_akun'];
      $kategori = $_POST ['kategori_akun'];

        $sql = $koneksi->query("UPDATE tb_akun SET kode_akun='$kode', nama_akun='$nama_akun', tipe_akun='$tipe', kategori_akun='$kategori' WHERE id='$id'");

        if ($sql) {
            ?>

                <script type="text/javascript">
                    alert ("Data berhasil diubah");
                    window.location.href="?page=akun";
                </script>

            <?php
        }  
  }

?>