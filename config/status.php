<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_tirta");

if(isset($_POST['approve']))
{
        if(isset($_POST['check']))
        {
        foreach ($_POST['check'] as $value){
            echo $value;
            $sql = "update tb_pembelian_detail set status ='1' where no = '$value'"; 

            mysql_query($sql) or die (mysql_error());

        }
        }
}
?>          