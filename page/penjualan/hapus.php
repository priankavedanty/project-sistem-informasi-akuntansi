<?php

	$no = $_GET['no'];
	$tanggal = $_GET ['tanggal'];
	$kode = $_GET['kode_nota'];
	$nama_barang = $_GET['nama_barang'];
	$harga_jual = $_GET['harga_jual'];
	$kode_barang = $_GET['kode_barang'];
	$jumlah = $_GET['jumlah'];
	$total = $_GET['total'];

	$sql = $koneksi->query("DELETE FROM tb_penjualan WHERE no ='$no'");

	$sql2 = $koneksi->query("UPDATE tb_barang SET stok_akhir = (stok_akhir + $jumlah), stok_berkurang = (stok_berkurang + $jumlah) WHERE kode_barang = '$kode_barang' ");

	if ($sql || $sql2) {
		?>

			<script>
				window.location.href="?page=penjualan&kode_nota=<?php echo $kode ?>";
			</script>

		<?php
	}

?>