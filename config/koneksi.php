<?php

global $koneksi;

$koneksi = mysqli_connect("localhost", "root", "", "db_tirta");
if ($koneksi->connect_error) {
	die("koneksi gagal".$koneksi->connect_error);
}

?>