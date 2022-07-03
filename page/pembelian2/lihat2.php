<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b> DETAIL TRANSAKSI PEMBELIAN </b></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th>No</th> 
                    <th>Tanggal</th>                          
                    <th>Kode faktur</th>
                    <th>Supplier</th>
                    <th>Alamat</th>
                    <th>Nama barang</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>                                           
             </thead>
             <tbody >
                <?php
                    $no=$_GET['no'];
                    $sql=mysqli_query($koneksi, "SELECT tb_pembelian_detail.no, tb_pembelian.no, tb_pembelian.tgl_transaksi, tb_pembelian.kode_faktur, tb_pembelian.supplier, tb_pembelian.alamat, tb_pembelian.nama_barang,tb_pembelian.satuan, tb_pembelian.jumlah, tb_pembelian.harga, tb_pembelian.total  FROM tb_pembelian JOIN tb_pembelian_detail ON tb_pembelian.kode_faktur=tb_pembelian_detail.kode_faktur WHERE tb_pembelian_detail.no='$no'");
                    while ($data1 = mysqli_fetch_array($sql)) {
                     ?>
                    <tr> 
                        <td><?php echo $data1['no']; ?></td>
                        <td><?php echo date('d F Y', strtotime($data1['tgl_transaksi']));?></td>
                        <td><?php echo $data1['kode_faktur'];?></td>
                        <td><?php echo $data1['supplier'];?></td>
                        <td><?php echo $data1['alamat'];?></td>
                        <td><?php echo $data1['nama_barang'];?></td>
                        <td><?php echo $data1['satuan'];?></td>
                        <td><?php echo $data1['jumlah'];?></td>
                        <td><?php echo rupiah($data1['harga']);?></td>
                        <td><?php echo rupiah($data1['total']);?></td>  
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
         <div class="card-footer">
            <a href="?page=pembelian2&aksi=kembali" class="btn btn-danger ">Kembali</a>
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