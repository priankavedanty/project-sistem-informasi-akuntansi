<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b> DATA PENYESUAIAN STOK </b></h3>
            <br>
            <a href="?page=penyesuaianstok&aksi=tambah" class="btn btn-primary mt-3" style="float: left;">Tambah</a>
            <br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
				        <th>No</th>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>Nama barang</th>
                <th>Stok</th>
                <th>Stok nyata</th>
                <th>Selisih stok</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_stok order by no asc ");
                    while ($data = mysqli_fetch_array($sql))  :   
                    $stok_akhir = $data['stok_masuk']-$data['stok_keluar']; 
                            
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['kode_barang'];?></td>
                        <td><?php echo $data['nama_barang'];?></td>
                        <td><?php echo $data['stok_masuk'];?></td>
                        <td><?php echo $data['stok_keluar'];?></td> 
                        <td><?php echo "-". $stok_akhir;?></td>  
                        <td>
                            <a href="?page=penyesuaianstok&aksi=lihat&no=<?php echo $data['no']; ?>" class="btn btn-success"><i class="fa fa-eye"></i>
                           </a>
                           <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=penyesuaianstok&aksi=hapus&no=<?php echo $data['no']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                        <?php endwhile; ?> 
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>Nama barang</th>
                <th>Stok</th>
                <th>Stok nyata</th>
                <th>Selisih stok</th>
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