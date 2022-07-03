<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b> DETAIL TRANSAKSI PENJUALAN </b></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th>No</th> 
                    <th>Tanggal</th>                          
                    <th>Kode nota</th>
                    <th>Pelanggan</th>
                    <th>Alamat</th>
                    <th>Nama barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>                                           
             </thead>
             <tbody >
                <?php
                    $id=$_GET['no'];
                    $sql=mysqli_query($koneksi, "SELECT tb_penjualan_detail.no, tb_penjualan.no, tb_penjualan.tgl_transaksi, tb_penjualan.kode_nota, tb_penjualan.pelanggan, tb_penjualan.alamat, tb_penjualan.nama_barang, tb_penjualan.jumlah, tb_penjualan.harga, tb_penjualan.total  FROM tb_penjualan JOIN tb_penjualan_detail ON tb_penjualan.kode_nota=tb_penjualan_detail.kode_nota WHERE tb_penjualan_detail.no='$id'");
                    while ($data1 = mysqli_fetch_array($sql)) {
                     ?>
                    <tr> 
                        <td><?php echo $data1['no']; ?></td>
                        <td><?php echo date('d F Y', strtotime($data1['tgl_transaksi']));?></td>
                        <td><?php echo $data1['kode_nota'];?></td>
                        <td><?php echo $data1['pelanggan'];?></td>
                        <td><?php echo $data1['alamat'];?></td>
                        <td><?php echo $data1['nama_barang'];?></td>
                        <td><?php echo $data1['jumlah'];?></td>
                        <td><?php echo rupiah($data1['harga']);?></td>
                        <td><?php echo rupiah($data1['total']);?></td>  
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
         </div>
         <div class="card-footer">
            <a href="?page=penjualan2&aksi=kembali" class="btn btn-danger ">Kembali</a>
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