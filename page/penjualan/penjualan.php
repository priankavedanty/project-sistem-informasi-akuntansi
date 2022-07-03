<?php

    @$kode = $_GET['kode_nota'];
    @$pelanggan = $_GET['pelanggan'];
    @$alamat = $_GET['alamat'];
    @$tanggal = $data['tgl_transaksi'];
    @$admin = $data['nama_pegawai'];

?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title"><b> TAMBAH TRANSAKSI PENJUALAN </b></h3>
  </div>
  <div class="card-body">
    <form method="POST">
    <div class="row">
      <div class="col-2">
        <label>Kode nota</label>
        <input type="text" name="kode" value="<?php echo $kode; ?>" class="form-control" readonly=""  />
      </div>
      <div class="col-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?php echo $tanggal; ?>" class="form-control" >
    </div>
    <div class="col-3">
        <label>Nama pelanggan</label>
        <input type="text" name="pelanggan" value="<?php echo $pelanggan; ?>" class="form-control" autocomplete="off">
    </div>
    <div class="col-3">
        <label>Nama barang</label>
        <input type="text" name="nama_barang" id="search" class="form-control" placeholder="Search" autocomplete="off">
        <div class="col-md-15">
            <div class="list-group" id="show-list"></div>
        </div>
    </div>

  </div>
      <br>
      <div class="row">
        <div class="col-2">
        <label>Jumlah barang</label>
        <input type="number" name="jumlah" class="form-control" >
      </div>
      <div class="col-3">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" value="<?php echo $alamat; ?>" rows="2" ></textarea>
      </div>
    </div>
        <div class="col-3">
          <input type="submit" name="simpan" value="Tambah" class="btn btn-primary">
        </div>
    <hr>
    <br>
 
    <?php
    if (isset($_POST['simpan'])) {
        @$tanggal = $_POST['tanggal'];
        @$pelanggan = $_POST['pelanggan'];
        @$alamat = $_POST['alamat'];
        if (empty($pelanggan) || empty($alamat)) {
            $sql1= $koneksi->query("SELECT * FROM tb_penjualan WHERE kode_nota = '$kode'");
            $profil=$sql1->fetch_assoc();
            $tanggal = $profil['tgl_transaksi'];

            if (empty($profil)) {
                ?>
                <script type="text/javascript">
                    alert("Mohon untuk mengisi nama dan alamat");
                    window.location.href="?page=penjualan&kode_nota=<?php echo $kode; ?>"
                </script>
                <?php
            }else{
            $pelanggan = $profil['pelanggan'];
            $alamat = $profil['alamat'];
            $kode_nota = $_POST['kode'];
            $nama_barang = $_POST['nama_barang'];

            $barang = $koneksi->query("SELECT * FROM tb_barang WHERE nama_barang='$nama_barang'");
            $data_barang=$barang->fetch_assoc();
            $harga_jual = $data_barang['harga_jual'];
            $harga_beli = $data_barang['harga_beli'];
            $kode_barang = $data_barang ['kode_barang'];
            $jumlah = $_POST['jumlah'];
            $total = $jumlah * $harga_jual;
            $hpp = $total - ($jumlah*$harga_beli);
            $laba = $total - $hpp;

            $barang2 = $koneksi->query("SELECT * FROM tb_barang WHERE nama_barang='$nama_barang'");
            while ($data_barang2 = $barang2->fetch_assoc()) {
            $sisa = $data_barang2['stok_akhir']-$jumlah;
            if ($sisa < 1) {
                ?>
                <script type="text/javascript">
                    alert("Stok barang habis, tidak bisa melakukan penjualan");
                    window.location.href="?page=penjualan&kode_nota=<?php echo $kode; ?>"
                </script>
                <?php
            }else{
                $koneksi->query("INSERT INTO tb_penjualan (pelanggan, alamat, nama_barang, kode_nota, kode_barang, tgl_transaksi, jumlah, harga, total, laba, hpp) values ('$pelanggan', '$alamat', '$nama_barang', '$kode_nota', '$kode_barang', '$tanggal', '$jumlah', '$harga_jual', '$total', '$laba', '$hpp')");
            }
        }
    }
    }
        else{
            $kode_nota = $_POST['kode'];
            $nama_barang = $_POST['nama_barang'];

            $barang = $koneksi->query("SELECT * FROM tb_barang WHERE nama_barang='$nama_barang'");
            $data_barang=$barang->fetch_assoc();
            $harga_beli = $data_barang['harga_beli'];
            $harga_jual = $data_barang['harga_jual'];
            $kode_barang = $data_barang ['kode_barang'];
            $jumlah = $_POST['jumlah'];
            $total = $jumlah * $harga_jual;
            $hpp = $total - ($jumlah*$harga_beli);
            $laba = $total - $hpp;
            
            $barang2 = $koneksi->query("SELECT * FROM tb_barang WHERE nama_barang='$nama_barang'");
            while ($data_barang2 = $barang2->fetch_assoc()) {
            $sisa = $data_barang2['stok_akhir']-$jumlah;
            
            if ($sisa < 0) {
                ?>
                <script type="text/javascript">
                    alert("Stok barang habis, tidak bisa melakukan penjualan");
                    window.location.href="?page=penjualan&kode_nota=<?php echo $kode; ?>"
                </script>
                <?php
            }else{
                $koneksi->query("INSERT INTO tb_penjualan (pelanggan, alamat, nama_barang, kode_nota, kode_barang, tgl_transaksi, jumlah, harga, total, laba, hpp) values ('$pelanggan', '$alamat', '$nama_barang', '$kode_nota', '$kode_barang', '$tanggal', '$jumlah', '$harga_jual', '$total', '$laba', '$hpp')");

            }
        }
    }
}
    ?>
        
        <div class="card-header">
          <h3 class="card-title"><b> DATA TRANSAKSI PENJUALAN </b></h3>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Sub Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; 
                        $sql = $koneksi->query("SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kode_barang=tb_barang.kode_barang AND kode_nota='$kode'");
                        while ($data = mysqli_fetch_array($sql)) :
                        ?>
                            <tr> 
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['nama_barang'];?></td>
                                <td><?php echo rupiah($data['harga_jual']);?></td>
                                <td><?php echo $data['jumlah'];?></td>
                                <td><?php echo rupiah($data['total']);?></td>
                                <td>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=penjualan&aksi=hapus&no=<?php echo $data['no']; ?>
                                    &kode_nota=<?php echo $data['kode_nota'] ?>
                                    &harga_jual=<?php echo $data['harga_jual'] ?>
                                    &kode_barang=<?php echo $data['kode_barang'] ?>
                                    &jumlah=<?php echo $data['jumlah'] ?>" title="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php 

                            @$total_dibayar = $total_dibayar + $data['total'];
                            @$hpp = $hpp + $data['hpp'];
                            @$laba = $laba + $data['laba'];
                            
                            endwhile;
                        ?>
                    </tbody>
                    <tr>
                        <th colspan="5" style="text-align: right;"><h5>Total</h5></th>
                        <td> <input type="number" name="total_dibayar" id="total_dibayar" value="<?php echo @$total_dibayar; ?>" readonly=""></td>
                        <tr>
                            <th colspan="5"></th>
                            <td>
                                <input type="submit" name="simpan_pj" class="btn btn-primary" value="Simpan">
                            </td>
                        </tr>
                    </tr>
                </table>
            </div>
        </div>
    </form>
        <?php

        if (isset($_POST['simpan_pj'])) {
            function kode_random4($lenght) {
                $data1 = '12345';
                $string = 'JU';
                for ($i=0; $i < $lenght; $i++) {
                    $pos = rand(0, strlen($data1)-1);
                    $string .= $data1{$pos};
                }
                return $string;
            }
            $no_transaksi = kode_random4(5);
            $total_dibayar = $_POST['total_dibayar'];   
                     
            $sql2= $koneksi->query("SELECT * FROM tb_penjualan WHERE kode_nota = '$kode'");
            $data_jual=$sql2->fetch_assoc();
            $tanggal = $data_jual['tgl_transaksi'];
            $pelanggan = $data_jual['pelanggan'];
            $alamat = $data_jual['alamat'];
            $kode_barang = $data_jual['kode_barang'];

            $total_debkre = $total_dibayar;
            $total_semua = $total_dibayar - $hpp;

            $sql3 = $koneksi->query("SELECT * FROM tb_pegawai WHERE nama_pegawai='$admin'");
            $data2 = $sql3->fetch_assoc();
            $user_id = $data2['user_id'];
            
            $koneksi->query("INSERT INTO tb_penjualan_detail
                (tgl_transaksi, kode_nota, total_dibayar, hpp, laba, pelanggan, alamat) VALUES ('$tanggal', '$kode', '$total_dibayar', '$hpp', '$laba', '$pelanggan', '$alamat')");

            $koneksi->query("INSERT INTO tb_jurnal (user_id, tgl_transaksi, no_transaksi, kode_akun, nama_akun, jenis_akun, debet, kredit, keterangan) values ('$user_id', '$tanggal', '$no_transaksi', '111', 'Kas', 'Debet', '$total_semua', '0', 'Penjualan Barang'), ('$user_id', '$tanggal', '$no_transaksi', '411', 'Penjualan', 'Kredit', '0', '$total_semua', 'Penjualan Barang'), ('$user_id', '$tanggal', '$no_transaksi', '412', 'HPP', 'Debet', '$hpp', '0', 'Penjualan Barang'), ('$user_id', '$tanggal', '$no_transaksi', '131', 'Persediaan barang dagang', 'Kredit', '0', '$hpp', 'Penjualan Barang')");

            $koneksi->query("INSERT INTO tb_jurnal_detail (user_id, tgl_transaksi, no_transaksi, total_debet, total_kredit, total, keterangan) values ('$user_id', '$tanggal', '$no_transaksi', '$total_dibayar', '$total_dibayar', '$total_debkre', 'Penjualan Barang')");
            ?>
                <script type="text/javascript">
                    alert('Data berhasil disimpan');
                    window.location.href='?page=penjualan&kode_nota=<?php echo $kode; ?>';
                </script>
            <?php
        } 
        ?>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
