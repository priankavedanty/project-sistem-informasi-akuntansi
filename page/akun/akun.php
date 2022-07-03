<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b> DATA AKUN </b></h3>
            <br>
            <a href="?page=akun&aksi=tambah" class="btn btn-primary mt-3" style="float: left;">Tambah</a>
            <br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
				        <th>No</th>
                <th>Nama akun</th>
                <th>Kode akun</th>
                <th>Tipe akun</th>
                <th>Kategori akun</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $no = 1; 
                $sql = $koneksi->query("SELECT * FROM tb_akun order by id asc");
                while ($data = mysqli_fetch_array($sql)) :             
                ?>
                <tr> 
                    <td><?php echo $no++;?></td>
						            <td><?php echo $data['nama_akun'];?></td>
                        <td><?php echo $data['kode_akun'];?></td>
                        <td><?php echo $data['tipe_akun'];?></td>
                        <td><?php echo $data['kategori_akun'];?></td>
                    <td>
                       <a href="?page=akun&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-warning"><i class="fa fa-pen"></i>
                       </a>
                        <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=akun&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                    <?php endwhile; // penutup perulangan while ?>
              </tbody>
              <tfoot>
              <tr>
				        <th>No</th>
                <th>Nama akun</th>
                <th>Kode akun</th>
                <th>Tipe akun</th>
                <th>Kategori akun</th>
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