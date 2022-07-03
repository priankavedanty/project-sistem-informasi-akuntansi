<?php
    $mysqli = new mysqli ("localhost", "root", "", "db_tirta");
    $result = $mysqli->query("SELECT * FROM tb_jenis_barang");
    $result2 = $mysqli->query("SELECT * FROM tb_satuan");
    $row = $result->fetch_assoc();
?>

<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">TAMBAH DATA BARANG</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label>Kode barang</label>
        <input type="text" name="kode" class="form-control" placeholder="Enter kode barang" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Nama barang</label>
        <input type="text" name="nama" class="form-control" placeholder="Enter nama barang" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Jenis barang</label>
        <select class="custom-select form-control-border" name="jenis">
            <option value="">-- Pilih jenis barang --</option>
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
            <option value="">-- Pilih satuan --</option>
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
        <label>Stok minimum</label>
        <select class="custom-select form-control-border" name="stok minimum">
            <option value="">Stok minimum</option>
              <?php
                  $sql = $koneksi->query("SELECT * FROM tb_barang WHERE stok_awal <= stok_minimum order by no asc");
                  if (mysqli_num_rows($sql) !=0) {
                      while ($row = mysqli_fetch_assoc($sql)) {
                          echo '<option>'.$row['nama_barang'].'</option>';
                      }
                  }
              ?>
        </select>
      </div>
      <div class="form-group">
        <label>Stok baru</label>
        <input type="number" name="stok_baru" class="form-control" placeholder="Enter stok barang baru" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" >
      </div>
      <div class="form-group">
        <label>Stok minimum</label>
        <input type="number" name="stok_minimum" class="form-control" placeholder="Enter stok minimum" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" >
      </div>
      <div class="form-group">
        <label>Harga beli</label>
        <input type="text" name="beli" class="form-control" placeholder="Enter harga beli" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">
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

        $kode = $_POST ['kode'];
        $nama = $_POST ['nama'];
        $jenis = $_POST ['jenis'];
        $satuan = $_POST ['satuan'];
        $stok_baru = $_POST ['stok_baru'];
        $stok_minimum = $_POST['stok_minimum'];
        $beli = $_POST ['beli'];
        $jual = $beli + (15/100 * $beli);

        $sql = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barang='$kode' or nama_barang='$nama'");

        if (mysqli_num_rows($sql) > 0) {

            echo "<script>
                    alert('Kode dan nama barang yang anda masukkan sudah ada');
                    document.location='?page=barang';
                    </script>";
        }else {
            $sql = mysqli_query($koneksi, "INSERT INTO tb_barang ( kode_barang, nama_barang,  jenis, satuan, stok_awal, stok_minimum, stok_akhir, harga_beli, harga_jual) VALUES ( '$kode', '$nama',  '$jenis', '$satuan', '$stok_baru', '$stok_minimum', '$stok_baru', '$beli', '$jual')");

            echo "<script>
                alert('Data berhasil disimpan');
                document.location='?page=barang';
                </script>";
        }

  }

?>