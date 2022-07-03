<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b> DATA JURNAL UMUM </b></h3>
            <br><br>
            <a href="?page=saldoawal" class="btn btn-primary mr-1" style="float: left;">Saldo akun</a>
            <br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Nama akun</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                    <th>Aksi</th>
                </tr>                                         
             </thead>
             <tbody>
                <?php
                    $no=1;
                    $sql = $koneksi->query("SELECT * FROM tb_jurnal order by id asc");
                    while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['keterangan'];?></td>
                        <td><?php echo $data['nama_akun'];?></td>
                        <td><?php echo rupiah($data['debet']);?></td>
                        <td><?php echo rupiah($data['kredit']);?></td>
                        <td>
                            <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=jurnalentry&aksi=hapus&no_transaksi=<?php echo $data['no_transaksi']; ?>" class="btn btn-danger">Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Nama akun</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                    <th>Aksi</th>
                </tr>   
                </tfoot>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>