<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">TAMBAH DATA PEGAWAI</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label>Nama pegawai</label>
        <input type="text" class="form-control" name="nama_pegawai" placeholder="Enter nama pegawai" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off"> 
      </div>
      <div class="form-group">
        <label>Id pegawai</label>
        <input type="text" class="form-control" name="id_pegawai" placeholder="Enter id pegawai" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" class="form-control" name="alamat" placeholder="Enter alamat" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Enter username" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" >
      </div>
	  <div class="form-group">
	      <label>Level</label>
	      <select class="custom-select form-control-border" name="level">
				    <option value="admin">admin</option>
            <option value="akunting">akunting</option>
            <option value="direktur">direktur</option>
            <option value="direktur">gudang</option>
	      </select>
    </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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

        if (isset($_POST['simpan'])) {

            $nama_pegawai = $_POST ['nama_pegawai'];
            $id_pegawai = $_POST ['id_pegawai'];
            $alamat = $_POST ['alamat'];
            $username = $_POST ['username'];
            $password = $_POST ['password'];
            $level = $_POST ['level'];

            $simpan = mysqli_query($koneksi, "INSERT INTO tb_pegawai (nama_pegawai, user_id, alamat, username, password, level)
                VALUES ('$nama_pegawai', '$id_pegawai', '$alamat', '$username', '$password', '$level')");

        if ($simpan) 
        {
            echo "<script>
                    alert('Data berhasil disimpan');
                    document.location='?page=pegawai';
                    </script>";
        }else 
        {
            echo "<script>
                    alert('Data gagal disimpan');
                    document.location='?page=pegawai';
                </script>";
        }
    }

?>