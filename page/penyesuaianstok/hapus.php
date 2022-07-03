<?php

	$no = $_GET['no'];
	$koneksi->query("DELETE from tb_stok WHERE no='$no'");

?>

<script type="text/javascript">
	 alert ("Data berhasil dihapus");
	window.location.href="?page=penyesuaianstok";
</script>