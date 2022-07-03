<?php

    $id= $_GET['id'];
    $sql = $koneksi->query("SELECT tb_jurnal_detail.id, tb_jurnal.tgl_transaksi, tb_jurnal.no_transaksi, tb_jurnal.nama_akun, tb_jurnal.kode_akun, tb_jurnal.debet, tb_jurnal.kredit, tb_jurnal.keterangan FROM tb_jurnal JOIN tb_jurnal_detail ON tb_jurnal.no_transaksi=tb_jurnal_detail.no_transaksi WHERE tb_jurnal.id='$id' ");
    $tampil = $sql->fetch_assoc();

?>

<!-- general form elements -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">UBAH TRANSAKSI JURNAL ENTRY</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
        <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>No jurnal</label>
                <input type="text" name="no_transaksi" value="<?php echo $tampil ['no_transaksi'];?>" class="form-control" readonly="" >         
            </div>
            <div class="form-group">
                <label>Nama akun</label>
                <input type="text" name="nama" value="<?php echo $tampil ['nama_akun'];?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Kode akun</label>                      
                <input type="text" name="kode_akun" value="<?php echo $tampil ['kode_akun'];?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Debet</label>                      
                <input type="number" name="debet" value="<?php echo $tampil ['debet'];?>" class="form-control" >
            </div>
            <div class="form-group">
                <label>Kredit</label>                      
                <input type="text" name="kredit" value="<?php echo $tampil ['kredit'];?>" class="form-control"  >
            </div>
        </div>
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

<?php

    if (isset($_POST['ubah']))  {

        $no_transaksi = $_POST ['no_transaksi'];
        $nama = $_POST ['nama'];
        $kode_akun = $_POST ['kode_akun'];
        $debet = $_POST ['debet'];
        $kredit= $_POST ['kredit'];

        $sql = $koneksi->query("UPDATE tb_jurnal SET no_transaksi='$no_transaksi', nama_akun='$nama', kode_akun='$kode_akun', debet='$debet', kredit='$kredit' WHERE id='$id' ");

        if ($sql) 
        {
            echo "<script>
                    alert('Ubah data berhasil');
                    document.location='?page=jurnalentry';
                </script>";
        }else 
        {
            echo "<script>
                    alert('Ubah data gagal');
                    document.location='?page=jurnalentry';
                </script>";
        }
    }

?>