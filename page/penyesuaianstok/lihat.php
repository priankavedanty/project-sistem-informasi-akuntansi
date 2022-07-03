<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b> DETAIL PENYESUAIAN STOK </b></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th>No</th> 
                    <th>Tanggal</th>                          
                    <th>No kartu</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Stok</th>
                    <th>Stok nyata</th>
                    <th>Selisih stok</th>
                    <th>Keterangan</th>
                </tr>                                           
             </thead>
             <tbody >
                <?php
                    $no = $_GET['no'];
                   $sql = mysqli_query($koneksi, "SELECT * FROM tb_stok WHERE no='$no' ");
                    $data = mysqli_fetch_array($sql); 
                    $stok_akhir = $data['stok_masuk']-$data['stok_keluar'];   
                          
                ?>
                    <tr> 
                        <td><?php echo $data['no'];?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['no_kartu'];?></td>
                        <td><?php echo $data['nama_barang'];?></td>
                        <td><?php echo $data['kode_barang'];?></td>
                        <td><?php echo $data['stok_masuk'];?></td>   
                        <td><?php echo $data['stok_keluar'];?></td> 
                        <td><?php echo "-".  $stok_akhir;?></td>
                        <td><?php echo $data['kategori_barang'];?></td> 
                    </tr>
                </tbody>
                </table>
         </div>
         <div class="card-footer">
            <a href="?page=penyesuaianstok&aksi=kembali" class="btn btn-danger ">Kembali</a>
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