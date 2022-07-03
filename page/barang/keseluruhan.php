<?php 
    
    $sql = $koneksi->query("SELECT * FROM tb_barang ");
    while ($tampil=$sql->fetch_assoc()) {
        $jumlah = $sql->num_rows;
    
    $sql4 = $koneksi->query("SELECT * FROM tb_barang WHERE stok_akhir <='0'");
        $stok3 = $sql4->num_rows;
        $jumlah4 = $jumlah-$stok3;

    }

    $sql2 = $koneksi->query("SELECT * FROM tb_barang WHERE stok_awal <= stok_minimum ");
        $stok = $sql2->num_rows;
    

    $sql3 = $koneksi->query("SELECT * FROM tb_barang WHERE stok_akhir <='0' ");
        $stok1 = $sql3->num_rows;
    
?>

<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $jumlah;?></h3>

            <p>Stok keseluruhan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $jumlah4;?></h3>
            <p>Stok tersedia</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
      
        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner"> 
            <h3><?php echo $stok;?></h3>
            <p>
              <a href="?page=barang&aksi=lihat">Stok segera habis</a>
            </p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo $stok1;?></h3>

            <p>Stok habis</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
      
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

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
                 
                </tr>
                </thead>
              <tbody>
                <?php
                $no = 1; 
                $sql = $koneksi->query("SELECT * FROM tb_barang order by no asc");
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
                    <th>Harga beli</th>
                    <th>Harga jual</th>
   
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