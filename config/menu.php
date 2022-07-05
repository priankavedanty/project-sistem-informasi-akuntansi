<aside class="main-sidebar sidebar-dark-primary elevation-4">

<!-- Brand Logo -->
<a href="#" class="brand-link">
  <span class="brand-text font-weight-light">PT. TIRTA REJEKI DEWATA</span>
</a>

  <?php

  include "koneksi.php";

    if (@$_SESSION['admin']) {
        $user = $_SESSION['admin'];
    }else if (@$_SESSION['akunting']) {
        $user = $_SESSION['akunting'];
    }else if (@$_SESSION['direktur']) {
        $user = $_SESSION['direktur'];
    }else if (@$_SESSION['gudang']) {
        $user = $_SESSION['gudang'];
    }

    $sql = $koneksi->query("SELECT * FROM tb_pegawai WHERE user_id='$user'");
    $data = $sql->fetch_assoc();

?>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block"><?php echo @$data['nama_pegawai'];?></a>
      <a href="#" class="d-block">Login sebagai <?php echo @$data['level']; ?></a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="index.php" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <?php if (@$_SESSION['admin']) { ?>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Data master
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="?page=akun" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Akun</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=barang" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=pegawai" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pegawai</p>
            </a>
          </li>
        </ul>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Data transaksi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="?page=penjualan&kode_nota=<?php echo $kode; ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tambah penjualan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=penjualan2" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data penjualan</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="?page=pembelian&kode_faktur=<?php echo $kode_faktur; ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tambah pembelian</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="?page=pembelian2" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data pembelian</p>
            </a>
          </li>
        </ul>
    <?php } if (@$_SESSION['akunting']) { ?> 
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Data transaksi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="?page=jurnal&no_transaksi=<?php echo $no_transaksi; ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Transaksi jurnal umum</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="?page=jurnalentry" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Jurnal Umum</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=jurnalumum" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Jurnal Entry</p>
            </a>
          </li>
        </ul>
        <?php } if (@$_SESSION['direktur'] || @$_SESSION['akunting']) { ?>
        <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Laporan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="?page=lappenjualan" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan penjualan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=lappembelian" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan pembelian</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="?page=lapstokbarang" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan stok barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=lapstokopname" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan stok opname</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=lapjurnalumum" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan jurnal umum</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=lapbukubesar" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan buku besar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=lapneracasaldo" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan neraca saldo</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=laplabarugi" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan laba rugi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=lapneraca" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan neraca</p>
            </a>
          </li>
        </ul>
          <?php } ?>
        </li>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

