<?php

  include 'koneksi.php';

    @$kode_faktur = $_GET['kode_faktur'];
    @$supplier = $_GET['supplier'];
    @$alamat = $_GET['alamat'];
    @$admin = $data['nama_pegawai'];

?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><b> DATA PEMBELIAN </b></h3>
          </div>
          <!-- /.card-header -->
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No faktur</th>
                    <th>Supplier</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    <th>Approval</th>
                </tr>                                         
             </thead>
             <tbody>
                <?php
                    $no = 1; 
                    $sql = $koneksi->query("SELECT * FROM tb_pembelian_detail order by no asc");
                    while ($data = mysqli_fetch_array($sql)) :              
                ?>
                    <tr> 
                        <td><?php echo $no++;?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['kode_faktur'];?></td>
                        <td><?php echo $data['supplier'];?></td>
                        <td><?php echo rupiah($data['total_dibayar']);?></td>
                        <td><?php echo $data['status'];?></td>
                        <td>
                            <a href="?page=pembelian2&aksi=lihat&kode_faktur=<?php echo $data['kode_faktur']; ?> & admin=<?php echo $admin; ?>" class="btn btn-success"><i class="fa fa-eye"></i>
                           </a>
                        </td>
                        <td>
                          <form action="" method="POST">
                            <input type="hidden" name="no" value="<?php echo $data['no']; ?>">
                            <input type="submit" name="approve" value="Terima" class="btn btn-primary">
                          </form>
                        </td>
                    </tr>
                    <?php endwhile; // penutup perulangan while ?>
              </tbody>
              <tfoot>
              <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No faktur</th>
                    <th>Supplier</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    <th>Approval</th>
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

<?php 

if (isset($_POST['approve'])) {
  $no = $_POST['no'];
  $approve = $_POST['approve'];

  $sql = "UPDATE tb_pembelian_detail SET status ='Pembelian berhasil' WHERE no='$no' ";
  $result = mysqli_query($koneksi, $sql);

  echo "<script>;
        alert('Data pembelian approve');
        document.location='?page=pembelian2';
        </script>";
}

?>

