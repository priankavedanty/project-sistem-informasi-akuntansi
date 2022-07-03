<?php
    
    @$no_transaksi = $_GET['no_transaksi'];
    @$tanggal = $data['tgl_transaksi'];
    @$admin = $data['nama_pegawai'];

?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title"><b> TAMBAH TRANSAKSI JURNAL </b></h3>
  </div>
  <div class="card-body">
    <form action="" method="POST">
    <div class="row">
      <div class="col-2">
        <label>No jurnal</label>
        <input type="text" name="no_transaksi" value="<?php echo $no_transaksi; ?>" class="form-control" readonly=""  />
      </div>
      <div class="col-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?php echo $tanggal; ?>" class="form-control" >
    </div>
    <div class="col-3">
        <label>Nama akun</label>
        <select name="nama" class="form-control" onchange='changeValue(this.value)'>
        <option selected="">Pilih nama akun</option>
            <?php
                $hasil=mysqli_query($koneksi, "select * from tb_akun");
                $no=0;
                while ($data1=mysqli_fetch_array($hasil)) {
                    $no++;
            ?>
                <option value="<?php echo $data1['nama_akun'];?>"><?php echo $data1['nama_akun'];?></option>
            <?php
            }
            ?>
        </select>
      </div>
  </div>
      <br>
    <div class="row">
        <div class="col-2">
        <label>Debet</label>
        <input type="number" name="debet" class="form-control" >
      </div>
      <div class="col-2">
        <label>Kredit</label>
        <input type="number" name="kredit" class="form-control" >
      </div>
      <div class="col-3">
        <label>Keterangan</label>
        <textarea class="form-control" name="keterangan" rows="2" ></textarea>
      </div>
    </div>
        <div class="col-3">
          <input type="submit" name="simpan" value="Tambah" class="btn btn-primary">
        </div>
    <hr>
    <br>
 
    <?php
    if (isset($_POST['simpan'])) {
        $user_id = $_POST ['user_id'];
        $tanggal = $_POST['tanggal'];
        $no_transaksi = $_POST ['no_transaksi'];
        $nama = $_POST ['nama'];
        $debet = $_POST ['debet'];
        $kredit = $_POST ['kredit'];
        $keterangan = $_POST ['keterangan'];

        $sql2 = $koneksi->query("SELECT * FROM tb_akun WHERE nama_akun = '$nama' ");
                $data2=$sql2->fetch_assoc();
                $kode_akun = $data2['kode_akun'];

        $sql3 = $koneksi->query("SELECT * FROM tb_pegawai WHERE nama_pegawai='$admin'");
            $data3 = $sql3->fetch_assoc();
            $user_id = $data3['user_id'];
        
        $koneksi->query("INSERT INTO tb_jurnal (user_id, tgl_transaksi, no_transaksi, kode_akun, nama_akun, debet, kredit, keterangan) values ('$user_id', '$tanggal','$no_transaksi', '$kode_akun','$nama', '$debet', '$kredit', '$keterangan')");
                    

        }

    ?>

    <form method="POST">
    <script type="text/javascript"> 
    <?php echo $jsArray; ?>
    function changeValue(id){
        document.getElementById('kode_akun').value = prdName[id].kode_akun;
    };
    </script>

        <hr>
        <div class="card-header">
          <h3 class="card-title"><b> DATA TRANSAKSI JURNAL </b></h3>
        </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode akun</th>
                                <th>Nama akun</th>
                                <th>Debet</th>
                                <th>Kredit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $koneksi->query("SELECT * FROM tb_jurnal WHERE no_transaksi='$no_transaksi'");
                            while ($data = mysqli_fetch_array($sql)) :
                                ?>
                                <tr> 
                                    <td><?php echo $data['kode_akun'];?></td>
                                    <td><?php echo $data['nama_akun'];?></td>
                                    <td><?php echo rupiah($data['debet']);?></td>
                                    <td><?php echo rupiah($data['kredit']);?></td>
                                    <td>
                                        <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=jurnal&aksi=hapus&id=<?php echo $data['id']; ?>
                                        &no_transaksi=<?php echo $data['no_transaksi'] ?>
                                        &debet=<?php echo $data['debet'] ?>
                                        &kredit=<?php echo $data['kredit'] ?>
                                        &keterangan=<?php echo $data['keterangan'] ?>" title="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    @$total_debkre = $total_debkre + $data['debet'];
                                    @$total_debet = $total_debet + $data['debet'];
                                    @$total_kredit = $total_kredit + $data['kredit'];
                            endwhile;
                            ?>
                        </tbody>
                        <tr>
                            <th colspan="4" style="text-align: right;"><h4>Total</h4></th>
                            <td> <input type="number" name="total_debkre" id="total_debkre" value="<?php echo @$total_debkre; ?>" readonly=""></td>
                            <tr>
                                <th colspan="4"></th>
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
                $sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE no_transaksi='$no_transaksi'");
                $profil = $sql1->fetch_assoc();
                $tanggal = $profil['tgl_transaksi'];

                $keterangan = $profil['keterangan'];
                $total_debet = $_POST['total_debet'];
                $total_kredit = $_POST['total_kredit'];
                $total_debkre = $total_debkre + $total_debet;

                $sql3 = $koneksi->query("SELECT * FROM tb_pegawai WHERE nama_pegawai='$admin'");
                $data3 = $sql3->fetch_assoc();
                $user_id = $data3['user_id'];
            
                if ($total_debet!=$total_kredit) {
                    echo "<script>
                    alert('Maaf, total debet dan kredit belum balance');
                    </script>";
                }else{
                $koneksi->query("INSERT INTO tb_jurnal_detail (user_id, tgl_transaksi, no_transaksi, total_debet, total_kredit, total, keterangan) VALUES ('$user_id', '$tanggal', '$no_transaksi','$total_debkre', '$total_debkre', '$total_debkre', '$keterangan')");
                
                ?>
                <script type="text/javascript">
                    alert('Data berhasil disimpan');
                    window.location.href='?page=jurnal&no_transaksi=<?php echo $no_transaksi; ?>';
                </script>
                <?php
                }
            }
            ?>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
