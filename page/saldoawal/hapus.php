<?php

	$id = $_GET['id'];
	$koneksi->query("DELETE from tb_akun WHERE id = '$id'");

?>

<script type="text/javascript">
	alert ("Data berhasil dihapus");
	window.location.href="?page=saldoawal";
</script>