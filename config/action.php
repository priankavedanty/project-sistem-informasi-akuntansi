<?php
  include 'koneksi.php';

  if (isset($_POST['simpan'])) {
    $inpText = $_POST['simpan'];
    $sql = "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$inpText%' ";
    $result= $koneksi->query($sql);

    if ($result->num_rows>0) {
      while($row=$result->fetch_assoc()) {
        echo '<a href="#" class="list-group-item list-group-item-action border-2">' . $row['nama_barang'] . '</a>';
      }
    } 
  }
?>