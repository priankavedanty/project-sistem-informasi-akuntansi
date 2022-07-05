<?php

    @$kode = $_GET['kode_nota'];
    @$pelanggan = $_GET['pelanggan'];
    @$alamat = $_GET['alamat'];
    @$admin = $data['nama_pegawai'];

?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b> DATA PENJUALAN </b></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
				        <th>No</th>
                <th>Tanggal</th>
                <th>Kode nota</th>
                <th>Nama pelanggan</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_penjualan_detail order by no asc");
                    while ($data = mysqli_fetch_array($sql)) :         
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['kode_nota'];?></td>
                        <td><?php echo $data['pelanggan'];?></td>
                        <td><?php echo rupiah($data['total_dibayar']);?></td>
                        
                        <td>
                          <a href="?page=penjualan2&aksi=lihat&no=<?php echo $data['no']; ?> "class="btn btn-success"><i class="fa fa-eye"></i>
                           </a>
                           <a href="?page=penjualan2&aksi=hapus&kode_nota=<?php echo $data['kode_nota']; ?> & admin=<?php echo $admin; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>
                           </a>
                        </td>
                    </tr>
                    <?php endwhile; // penutup perulangan while ?>
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Kode nota</th>
                <th>Nama pelanggan</th>
                <th>Total</th>
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
