<?php
  $no = $_GET['no'];
  $sql = $koneksi->query("SELECT * from tb_pegawai WHERE no='$no' ");
  $tampil = $sql->fetch_assoc();
  $level = $tampil['level'];
?>

<!-- general form elements -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">UBAH DATA PEGAWAI</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label>Nama pegawai</label>
        <input type="text" class="form-control" name="nama_pegawai" value="<?php echo $tampil ['nama_pegawai'];?>">
      </div>
      <div class="form-group">
        <label>Id pegawai</label>
        <input type="text" class="form-control" name="id_pegawai" value="<?php echo $tampil ['user_id'];?>">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" class="form-control" name="alamat" value="<?php echo $tampil ['alamat'];?>">
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $tampil ['username'];?>" >
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $tampil ['password'];?>" >
      </div>
	  <div class="form-group">
	      <label>Level</label>
	      <select class="custom-select form-control-border" name="level">
				<option value="admin" <?php if ($level=='admin') {echo "selected";}  ?>> admin</option>
        <option value="akunting" <?php if ($level=='akunting') {echo "selected";}  ?>> akunting</option>
        <option value="direktur" <?php if ($level=='direktur') {echo "selected";}  ?>> direktur</option>
        <option value="gudang" <?php if ($level=='gudang') {echo "selected";}  ?>> gudang</option>
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
    
        if (isset($_POST['ubah']))  {

        $nama_pegawai = $_POST ['nama_pegawai'];
        $id_pegawai = $_POST ['id_pegawai'];
        $alamat = $_POST ['alamat'];
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        $level = $_POST ['level'];

        $sql = $koneksi->query("UPDATE tb_pegawai SET nama_pegawai='$nama_pegawai', user_id='$id_pegawai', alamat='$alamat', username='$username', password='$password', level='$level'  WHERE no='$no'");

        if ($sql) {
            ?>

                <script type="text/javascript">
                    alert ("Data berhasil diubah");
                    window.location.href="?page=pegawai";
                </script>

            <?php
        }
    }

?>