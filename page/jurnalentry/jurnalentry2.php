<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b> DATA JURNAL ENTRY </b></h3>
            <br><br>
            <a href="?page=saldoawal" class="btn btn-primary mr-1" style="float: left;">Saldo akun</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                    <th>Id</th>
                    <th>Tanggal</th>
                    <th>No Jurnal</th>
                    <th>User Id</th>
                    <th>Total</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_jurnal_detail order by id asc");
                    $sql1 = $koneksi->query("SELECT * FROM tb_jurnal_detail WHERE total_debet != total_kredit");
                    while ($data = mysqli_fetch_array($sql)) :

                    if ($data['total_debet']!==$data['total_kredit']) {
                         ?> <script>
                             alert('Total Debet dan Kredit belum balance \r \r <?php while ($tampil2 = $sql1->fetch_assoc()) {
                                ?> No transaksi = <?php echo $tampil2["no_transaksi"];?>\r <?php }; ?>');
                            </script>"<?php
                        } 
                    if ($data['keterangan']=='Penjualan Barang'|| $data['keterangan']=='Pembelian Barang') {  ?>    
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['no_transaksi'];?></td>
                        <td><?php echo $data['user_id'];?></td>
                        <td><?php echo rupiah($data['total_debet']);?></td>
                        <td><?php echo $data['keterangan'];?></td>
                        <td>
                            <a href="?page=jurnalentry&aksi=lihat&id=<?php echo $data['id']; ?>" class="btn btn-success">Detail
                            </a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=jurnalentry&aksi=hapus&no_transaksi=<?php echo $data['no_transaksi']; ?>" class="btn btn-danger">Hapus
                            </a>
                        </td>
                    </tr>      
                    <?php } else { ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['no_transaksi'];?></td>
                        <td><?php echo $data['user_id'];?></td>
                        <td><?php echo rupiah($data['total_debet']);?></td>
                        <td><?php echo $data['keterangan'];?></td>
                        <td>
                            <a href="?page=jurnalentry&aksi=lihat&id=<?php echo $data['id']; ?>" class="btn btn-success">Detail
                           </a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=jurnalentry&aksi=hapus&no_transaksi=<?php echo $data['no_transaksi']; ?>" class="btn btn-danger">Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } endwhile; // penutup perulangan while ?>
              </tbody>
              <tfoot>
              <tr>
                    <th>Id</th>
                    <th>Tanggal</th>
                    <th>No Jurnal</th>
                    <th>User Id</th>
                    <th>Total</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>