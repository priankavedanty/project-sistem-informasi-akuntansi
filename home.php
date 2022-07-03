<?php

include "config/koneksi.php";

   $tgl_transaksi = date("Y-m-d");
    
    $sql = $koneksi->query("SELECT * FROM tb_penjualan WHERE tgl_transaksi='$tgl_transaksi'");
    while ($tampil=$sql->fetch_assoc()) {
        $total = $total + $tampil['total'];
    }

    $sql4 = $koneksi->query("SELECT * FROM tb_barang");
    while ($tampil4=$sql4->fetch_assoc()) {
        $jumlah = $sql4->num_rows;
    }

     $sql2 = $koneksi->query("SELECT * FROM tb_penjualan WHERE tgl_transaksi='$tgl_transaksi'");
    while ($tampil2=$sql2->fetch_assoc()) {
        @$hpp = $hpp + $tampil2['hpp'];
        
    }

    $sql3 = $koneksi->query("SELECT * FROM tb_pembelian WHERE tgl_transaksi='$tgl_transaksi'");
    while ($tampil3=$sql3->fetch_assoc()) {
        $total_beli = $total_beli + $tampil3['total'];
        
    }

?>

<div class="container-fluid">
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">Dashboard</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->

<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $jumlah;?></h3>

            <p>Total barang</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo "Rp". "&nbsp".  number_format($hpp); ?></h3>

            <p>Laba hari ini</p>
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
            <h3><?php echo "Rp". "&nbsp". number_format(@$total); ?></h3>

            <p>Penjualan hari ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
      
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo "Rp". "&nbsp". number_format(@$total_beli); ?></h3>

            <p>Pembelian hari ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>