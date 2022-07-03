<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_tirta");

?>

<style>

	@media print{
		input.noPrint{
			display: none;
		}
	}
	
</style>

<table border="1" width="100%" style="border-collapse: collapse;">
	<?php

        	$tgl_awal1 = $_POST['tgl_awal1'];
        	$tgl_akhir1 = $_POST['tgl_akhir1'];
        	
    ?>
	<caption>
		<h3>PT.TIRTA REJEKI DEWATA<br>
		Jl. Rajawali 14 Selemadeg Tabanan <br>
		Telp. 0362819533</h3>
		<hr>
		<h3>LAPORAN STOK BARANG</h3>
	</caption>
	<thead>
		<br>
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Nama barang</th>
			<th rowspan="2">Kode barang</th>
			<th rowspan="2">Stok riil</th>
			<th colspan="2">Jumlah barang</th>
			<th rowspan="2">Stok akhir</th>
		</tr>
		<tr>
			<th>Stok masuk</th>
			<th>Stok keluar</th>
		</tr>
	</thead>
	<tbody>
        <?php

        	@$tgl_awal1 = $_POST['tgl_awal1'];
        	@$tgl_akhir1 = $_POST['tgl_akhir1'];

            $no = 1; 
            $sql = $koneksi->query("SELECT * FROM tb_barang  order by no");
            while ($data = mysqli_fetch_array($sql)) { 

        ?>
            <tr> 
                <td style="text-align: center;"><?php echo $no++;?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['kode_barang'];?></td>
                <td style="text-align: center;"><?php echo $data['stok_awal'];?></td>
                <td style="text-align: center;"><?php echo $data['stok_bertambah'];?></td>
                <td style="text-align: center;"><?php echo $data['stok_berkurang'];?></td> 
                <td style="text-align: center;"><?php echo $data['stok_akhir'];?></td>
            </tr>
                <?php 

                @$total_awal = $total_awal + $data['stok_awal'];
                @$total_masuk = $total_masuk + $data['stok_bertambah'];
                @$total_keluar = $total_keluar + $data['stok_berkurang'];
                @$total_akhir = $total_akhir + $data['stok_akhir'];
                }
                

                ?>
	</tbody>
	<tr>
		<th colspan="3" style="text-align: center;">Total Stok Barang</th>
		<td style="text-align: center; font-weight: bold;"><?php echo ($total_awal); ?>
		</td>
		<td style="text-align: center; font-weight: bold;"><?php echo ($total_masuk); ?>
		</td>
		<td style="text-align: center; font-weight: bold;"><?php echo ($total_keluar); ?>
		</td>
		<td style="text-align: center; font-weight: bold;"><?php echo ($total_akhir); ?>
		</td>
	</tr>
</table>

<br>

<h4 style="text-align: right; margin-right: 50px;">Tabanan, <?php echo date("d M Y"); ?> <br>
Mengetahui <br>
Direktur PT.TIRTA REJEKI <br><br><br><br>
Hanadi </h4>

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">
