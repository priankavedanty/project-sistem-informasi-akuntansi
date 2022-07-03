<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b> DATA BARANG </b></h3>
           </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
      			          <th>No</th>
                      <th>Kode</th>
                      <th>Nama barang</th>
                      <th>Jenis</th>
                      <th>Satuan</th>
                      <th>Stok</th>
                      <th>Harga beli</th>
                      <th>Harga jual</th>
                      <th>Aksi</th>
                </tr>
                </thead>
              <tbody>
                <?php
                $no = 1; 
                $sql = $koneksi->query("SELECT * FROM tb_barang WHERE stok_akhir <='50' order by no asc");
                while ($data = mysqli_fetch_array($sql)) :             
                ?>
                <tr data-widget="expandable-table" aria-expanded="false"> 
                    <td><?php echo $no++;?></td>
                        <td><?php echo $data['kode_barang'];?></td>
                        <td><?php echo $data['nama_barang'];?></td>
                        <td><?php echo $data['jenis'];?></td>
                        <td><?php echo $data['satuan'];?></td>
                        <td><?php echo $data['stok_akhir'];?></td>
                        <td><?php echo rupiah($data['harga_beli']);?></td>
                        <td><?php echo rupiah($data['harga_jual']);?></td>   
                    <td>
                       <a href="?page=barang&aksi=ubah&no=<?php echo $data['no']; ?>" class="btn btn-warning"><i class="fa fa-pen"></i>
                       </a>
                        <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=barang&aksi=hapus&no=<?php echo $data['no']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                    <?php endwhile; // penutup perulangan while ?>
              </tbody>
              <tfoot>
              <tr>
  				          <th>No</th>
                    <th>Kode</th>
                    <th>Nama barang</th>
                    <th>Jenis</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Harga pokok</th>
                    <th>Harga jual</th>
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