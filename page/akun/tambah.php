<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">TAMBAH DATA AKUN</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label>Kode akun</label>
        <input type="text" class="form-control" name="kode_akun" placeholder="Enter kode akun" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Nama akun</label>
        <input type="text" class="form-control" name="nama_akun" placeholder="Enter nama akun" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">
      </div>
	  <div class="form-group">
	      <label>Tipe akun</label>
	      <select class="custom-select form-control-border" name="tipe_akun">
                <option value="Aktiva">Aktiva</option>
                <option value="Kewajiban">Kewajiban</option>
                <option value="Modal">Modal</option>
                <option value="Pendapatan">Pendapatan</option>
                <option value="Beban">Beban</option>
	      </select>
    </div>
    <div class="form-group">
        <label>Kategori akun</label>
        <select class="custom-select form-control-border" name="kategori_akun">
                <option value="Debet">Debet</option>
                <option value="Kredit">Kredit</option>
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

            $kode = $_POST ['kode_akun'];
            $nama_akun = $_POST ['nama_akun'];
            $tipe = $_POST ['tipe_akun'];
            $kategori = $_POST ['kategori_akun'];

        if (mysqli_num_rows($sql) > 0) {

            echo "<script>
                    alert('Kode akun yang anda masukkan sudah ada');
                    document.location='?page=akun';
                    </script>";
        }else {

            $sql = mysqli_query($koneksi, "INSERT INTO tb_akun (kode_akun, nama_akun, tipe_akun, kategori_akun)
                VALUES ('$kode', '$nama_akun', '$kategori','$tipe')");
        }
            echo "<script>
                alert('Data berhasil disimpan');
                document.location='?page=akun';
                </script>";
    }

?>