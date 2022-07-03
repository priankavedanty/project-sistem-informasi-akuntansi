    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b> DATA PEGAWAI </b></h3>
            <br>
            <a href="?page=pegawai&aksi=tambah" class="btn btn-primary mt-3" style="float: left;">Tambah</a>
            <br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th style="width: 300px">Nama pegawai</th>
                    <th>Alamat</th>
                    <th>Level</th>
                    <th style="width: 200px">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_pegawai order by no asc");
                    while ($data = mysqli_fetch_array($sql)) :             
                    ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['nama_pegawai'];?></td>
                        <td><?php echo $data['alamat'];?></td>
                        <td><?php echo $data['level'];?></td>
                        <td>
                           <a href="?page=pegawai&aksi=ubah&no=<?php echo $data['no']; ?>" class="btn btn-warning"><i class="fa fa-pen"></i>
                           </a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=pegawai&aksi=hapus&no=<?php echo $data['no']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                        <?php endwhile; // penutup perulangan while ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama pegawai</th>
                    <th>Alamat</th>
                    <th>Level</th>
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