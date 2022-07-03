<?php

    $kode_faktur = $_GET['kode_faktur'];
    @$supplier = $_GET['supplier'];
    @$alamat = $_GET['alamat'];
    @$tanggal = $data['tgl_transaksi'];
    @$admin = $data['nama_pegawai'];

?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title"><b> TAMBAH TRANSAKSI PEMBELIAN </b></h3>
  </div>
  <div class="card-body">
    <form action="" method="POST">
    <div class="row">
      <div class="col-2">
        <label>Kode faktur</label>
        <input type="text" name="kode_faktur" value="<?php echo $kode_faktur; ?>" class="form-control" readonly=""  />
      </div>
      <div class="col-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?php echo $tanggal; ?>" class="form-control" >
    </div>
      <div class="col-3">
        <label>Nama barang</label>
        <input type="text" name="nama_barang" id="search" class="form-control" placeholder="Search" autocomplete="off">
        <div class="col-md-15">
            <div class="list-group" id="show-list"></div>
        </div>
    </div>
      <div class="col-3">
        <label>Harga barang</label>
        <input type="number" name="harga_beli" class="form-control" >
      </div>
    </div>
    <br>
    <div class="row">
    <div class="col-2">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" >
      </div>
      <div class="col-3">
        <label>Nama supplier</label>
        <input type="text" name="supplier" value="<?php echo $supplier; ?>" class="form-control" autocomplete="off">
      </div>
      <div class="col-3">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" value="<?php echo $alamat; ?>" rows="2" ></textarea>
      </div>
      <br>
    </div>

        <div class="col-3">
          <input type="submit" name="simpan" value="Tambah" class="btn btn-primary">
        </div>

    <hr>
    <br>

    <?php
    if (isset($_POST['simpan'])) {
        @$tanggal = $_POST['tanggal'];
        @$supplier = $_POST['supplier'];
        @$alamat = $_POST['alamat'];
        if (empty($supplier) || empty($alamat)) {
            $sql1= $koneksi->query("SELECT * FROM tb_pembelian WHERE kode_faktur = '$kode_faktur'");
            $profil=$sql1->fetch_assoc();
            if (empty($profil)) {
                ?>
                <script type="text/javascript">
                    alert("Mohon untuk mengisi nama dan alamat");
                    window.location.href="?page=pembelian&kode_faktur=<?php echo $kode_faktur; ?>"
                </script>
                <?php
            }else{
                $supplier = $profil['supplier'];
                $alamat = $profil['alamat'];
                $tanggal = $profil['tgl_transaksi'];
                
                $kode_faktur = $_POST['kode_faktur'];
                $nama_barang = $_POST['nama_barang'];

                $barang = $koneksi->query("SELECT * FROM tb_barang WHERE nama_barang='$nama_barang'");
                $data_barang=$barang->fetch_assoc();
                $kode_barang = $data_barang ['kode_barang'];

                $jumlah = $_POST['jumlah'];
                $harga_beli = $_POST['harga_beli'];
                $total = $jumlah * $harga_beli;

                $koneksi->query("INSERT INTO tb_pembelian (supplier, alamat, nama_barang, kode_faktur, kode_barang, tgl_transaksi, jumlah, harga, total, status) values ('$supplier', '$alamat', '$nama_barang', '$kode_faktur', '$kode_barang', '$tanggal', '$jumlah', '$harga_beli', '$total', 'Dalam proses')");
            }
        }else{
            $kode_faktur = $_POST['kode_faktur'];
            $nama_barang = $_POST['nama_barang'];

            $barang = $koneksi->query("SELECT * FROM tb_barang WHERE nama_barang='$nama_barang'");
            $data_barang=$barang->fetch_assoc();
            $satuan = $data_barang['satuan'];
            $kode_barang = $data_barang ['kode_barang'];

            $jumlah = $_POST['jumlah'];
            $harga_beli = $_POST['harga_beli'];
            $total = $jumlah * $harga_beli;
                $koneksi->query("INSERT INTO tb_pembelian (supplier, alamat, nama_barang, satuan, kode_faktur, kode_barang, tgl_transaksi, jumlah, harga, total, status) values ('$supplier', '$alamat', '$nama_barang', '$satuan', '$kode_faktur', '$kode_barang', '$tanggal', '$jumlah', '$harga_beli', '$total', 'Dalam proses')");
            }
        }
    ?>
    
    <form method="POST">
        <script type="text/javascript"> 
            <?php echo $jsArray; ?>
            function changeValue(id){
                document.getElementById('harga_beli').value = prdName[id].harga_beli;
            };
        </script>

        <hr>
            <div class="card-header">
          <h3 class="card-title"><b> DATA TRANSAKSI PEMBELIAN </b></h3>
        </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; 
                            $sql = $koneksi->query("SELECT * FROM tb_pembelian, tb_barang WHERE tb_pembelian.kode_barang=tb_barang.kode_barang AND kode_faktur='$kode_faktur'");
                            while ($data = mysqli_fetch_array($sql)) :
                                ?>
                                <tr> 
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $data['nama_barang'];?></td>
                                    <td><?php echo $data['satuan'];?></td>
                                    <td><?php echo $data['jumlah'];?></td>
                                    <td><?php echo rupiah($data['harga_beli']);?></td>
                                    <td><?php echo rupiah($data['total']);?></td>
                                    <td>
                                        <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=pembelian&aksi=hapus&id=<?php echo $data['id']; ?>
                                        &kode_faktur=<?php echo $data['kode_faktur'] ?>
                                        &harga_beli=<?php echo $data['harga_beli'] ?>
                                        &kode_barang=<?php echo $data['kode_barang'] ?>
                                        &jumlah=<?php echo $data['jumlah'] ?>" title="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php 

                                @$total_dibayar = @$total_dibayar + $data['total'];
                        
                            endwhile;
                            ?>
                        </tbody>
                        <tr>
                            <th colspan="6" style="text-align: right;"><h4>Total</h4></th>
                            <td> <input type="number" name="total_dibayar" id="total_bayar" value="<?php echo @$total_dibayar; ?>" readonly=""></td>
                            <tr>
                                <th colspan="6"></th>
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
                function kode_random5($lenght) {
                    $data1 = '12345';
                    $string = 'JB';
                    for ($i=0; $i < $lenght; $i++) {
                        $pos = rand(0, strlen($data1)-1);
                        $string .= $data1{$pos};
                    }
                    return $string;
                }
                $no_transaksi = kode_random5(3);
                $tanggal = date("Y-m-d");
                $total_dibayar = $_POST['total_dibayar'];

                $sql2= $koneksi->query("SELECT * FROM tb_pembelian WHERE kode_faktur = '$kode_faktur'");
                $data_jual=$sql2->fetch_assoc();
                $tanggal = $data_jual['tgl_transaksi'];
                $supplier = $data_jual['supplier'];
                $alamat = $data_jual['alamat'];
                $kode_barang = $data_jual['kode_barang'];
                $total_debkre = $total_dibayar;

                $sql3 = $koneksi->query("SELECT * FROM tb_pegawai WHERE nama_pegawai='$admin'");
                $data2 = $sql3->fetch_assoc();
                $user_id = $data2['user_id'];
                
                $koneksi->query("INSERT INTO tb_pembelian_detail
                    (tgl_transaksi, kode_faktur, total_dibayar, supplier, alamat, status) VALUES 
                    ('$tanggal', '$kode_faktur', '$total_dibayar', '$supplier', '$alamat', 'Dalam proses')");

                $koneksi->query("INSERT INTO tb_jurnal (user_id, tgl_transaksi, no_transaksi, kode_akun, nama_akun, jenis_akun, debet, kredit, keterangan) values ('$user_id', '$tanggal', '$no_transaksi', '131', 'Persediaan barang dagang', 'Debet', '$total_dibayar', '0', 'Pembelian Barang'), ('$user_id', '$tanggal', '$no_transaksi', '111', 'Kas', 'Kredit', '0', '$total_dibayar', 'Pembelian Barang')");

                $koneksi->query("INSERT INTO tb_jurnal_detail (user_id, tgl_transaksi, no_transaksi, total_debet, total_kredit, total, keterangan) values ('$user_id', '$tanggal', '$no_transaksi', '$total_dibayar', '$total_dibayar', '$total_debkre', 'Pembelian Barang')");
                ?>
                <script type="text/javascript">
                    alert('Data berhasil disimpan');
                    window.location.href='?page=pembelian&kode_faktur=<?php echo $kode_faktur; ?>';
                </script>
                <?php
            }
            ?>

                </div>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

