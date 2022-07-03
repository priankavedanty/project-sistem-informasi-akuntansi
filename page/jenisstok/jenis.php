<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">TAMBAH JENIS DAN SATUAN BARANG</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label>Jenis barang</label>
        <input type="text" name="jenis" class="form-control" placeholder="Enter jenis barang" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Satuan</label>
        <input type="text" name="satuan" class="form-control" placeholder="Enter satuan barang" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">
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

  if (isset($_POST['simpan']))  {

        $jenis = $_POST ['jenis'];
        $satuan = $_POST ['satuan'];

        $simpan = mysqli_query($koneksi, "INSERT INTO tb_jenis_barang (jenis) VALUES ('$jenis')");

        if ($simpan) {

            $simpan1 = mysqli_query($koneksi, "INSERT INTO tb_satuan (satuan) VALUES ('$satuan')");

            echo "<script>
                    alert('Data berhasil disimpan');
                    document.location='?page=jenisstok';
                    </script>";
        }else {
            echo "<script>
                    alert('Data gagal disimpan');
                    document.location='?page=jenisstok';
                </script>";
        }

  }

?>