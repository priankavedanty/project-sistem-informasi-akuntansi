<?php
  $tanggal = $data['tgl_transaksi'];
?>

<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">TAMBAH PENYESUAIAN STOK</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label>No kartu</label>
        <input type="text" name="no_kartu" value="<?php echo $no_kartu; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?php echo $tanggal; ?>" class="form-control" >
    </div>
      <div class="form-group">
        <label>Nama barang</label>
        <select name="nama" id="nama" class="form-control" onchange='changeValue(this.value)' >;
            <option value="">-- Pilih nama barang --</option>
                <?php
                    
                    $sql = $koneksi->query( "SELECT * FROM tb_barang order by no desc");
                    $result = mysqli_query($koneksi, "SELECT * FROM tb_barang"); 
                    $jsArray = "var prdName = new Array(); \n";

                    while ($row = mysqli_fetch_array($result)) {
                     echo '<option name="nama"  value="' . $row['nama_barang'] . '">' . $row['nama_barang'] . '</option>'; 
                    $jsArray .= "prdName['" . $row['nama_barang'] . "'] = {kode_barang: '" . addslashes($row['kode_barang']) . "' };\n";
                     } 
                ?>
        </select>
      </div>
        <div class="form-group">
        <label>Kode barang</label>
        <input type="text" name="kode_barang" id="kode_barang" class="form-control" autocomplete="off">
      </div>
      <div class="form-group">
        <label>Kategori barang</label>
        <select class="custom-select form-control-border" name="kategori">
            <option value="">-- Pilih kategori barang --</option>
            <option value="Barang hilang">Barang hilang</option>
            <option value="Barang rusak">Barang rusak</option>
            <option value="Salah pencatatan">Salah pencatatan</option>
        </select>
      </div>
      <div class="form-group">
        <label>Stok</label>
        <input type="number" name="masuk" class="form-control" placeholder="Enter stok" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" >
      </div>
      <div class="form-group">
        <label>Stok nyata</label>
        <input type="number" name="keluar" class="form-control" placeholder="Enter stok nyata" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" >
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

<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('kode_barang').value = prdName[id].kode_barang;
};
</script>

<?php

    if (isset($_POST['simpan']))  {
        $tanggal = $_POST['tanggal'];;
        $no_kartu = $_POST['no_kartu'];
        $nama = $_POST ['nama'];
        $kategori = $_POST ['kategori'];
        $kode_barang = $_POST ['kode_barang'];
        $masuk = $_POST ['masuk'];
        $keluar = $_POST ['keluar'];

        
        $sql = mysqli_query($koneksi, "INSERT INTO tb_stok (no_kartu, tgl_transaksi, kategori_barang, nama_barang, kode_barang, stok_masuk, stok_keluar) VALUES ('$no_kartu', '$tanggal', '$kategori', '$nama', '$kode_barang', '$masuk', '$keluar')");

            ?> echo "<script>
                alert('Data berhasil disimpan');
                document.location='?page=penyesuaianstok';
                </script>";
            <?php
    }

?>