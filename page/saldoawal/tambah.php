<!-- general form elements -->
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">TAMBAH SALDO AWAL AKUN</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label>Nama akun</label>
        <select name="nama" id="nama" class="form-control" onchange='changeValue(this.value)'>
            <option selected="">Pilih nama akun</option>
            <?php
                
                $sql = $koneksi->query( "SELECT * FROM tb_akun order by id_akun desc");
                $result = mysqli_query($koneksi, "SELECT * FROM tb_akun"); 
                $jsArray = "var prdName = new Array(); \n";

                while ($row = mysqli_fetch_array($result)) {
                 echo '<option name="nama"  value="' . $row['nama_akun'] . '">' . $row['nama_akun'] . '</option>'; 
                $jsArray .= "prdName['" . $row['nama_akun'] . "'] = {kode_akun: '" . addslashes($row['kode_akun']) . "' };\n";
                 } 
            ?>
        </select>
      </div>
      <div class="form-group">
        <label>Kode akun</label>
        <input class="form-control" name="kode_akun" id=kode_akun placeholder="Enter kode akun">
      </div>
    <div class="form-group">
        <label>Saldo akun</label>
        <input type="number" class="form-control" name="saldo" placeholder="Enter saldo">
    </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
<!-- /.card -->

<script type="text/javascript"> 
    <?php echo $jsArray; ?>
    function changeValue(id){
        document.getElementById('kode_akun').value = prdName[id].kode_akun;
    };
</script>

<?php

    if (isset($_POST['simpan']))  {
        $nama = $_POST ['nama'];
        $kode_akun = $_POST ['kode_akun'];
        $saldo = $_POST ['saldo'];
        $sql = mysqli_query($koneksi, "INSERT INTO tb_akun (nama_akun, kode_akun, saldo) VALUES ('$nama', '$kode_akun', '$saldo')");

            ?> echo "<script>
                alert('Data berhasil disimpan');
                document.location='?page=saldoawal';
                </script>";
<?php
    }

?>