<?php

include "koneksi.php";

    if (@$_SESSION['admin']) {
        $user = $_SESSION['admin'];
    

	$sql = $koneksi->query("SELECT * FROM tb_pegawai WHERE user_id ='$user'");
	$data = $sql->fetch_assoc();

	if (@$_SESSION['admin']) {
	
	echo '<script type ="text/JavaScript">';  
    echo 'alert("Maaf user tidak bisa dihapus karena sedang login")';  
    echo '</script>';  

	}else{

	
	$koneksi->query("DELETE from tb_pegawai WHERE user_id ='$user'");

	echo '<script type ="text/JavaScript">';  
    echo 'alert("Data berhasil dihapus")';  
    echo '</script>';  
	}
}

?>
