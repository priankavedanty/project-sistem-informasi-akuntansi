<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b> DATA SALDO AWAL AKUN </b></h3>
            <br><br>
            <a href="?page=saldoawal&aksi=tambah" class="btn btn-primary mr-1" style="float: left;">Tambah</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama akun</th>
                    <th>Saldo awal</th>
                    <th>Mutasi debet</th>
                    <th>Mutasi kredit</th>
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
                        <td><?php echo $data['kode_akun'];?></td>
                        <td><?php echo $data['nama_akun'];?></td>
                        <td><?php echo rupiah($data['saldo']);?></td> 
                        <td><?php echo rupiah($data['mutasi_debet']);?></td> 
                        <td><?php echo rupiah($data['mutasi_kredit']);?></td>  
                        <td>
                           <a href="?page=saldoawal&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-warning"><i class="fa fa-pen"></i>
                           </a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="?page=saldoawal&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                        <?php endwhile; // penutup perulangan while ?>
                </tbody>
                </table>
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