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

        	@$tgl_awal1 = $_POST['tgl_awal1'];
        	@$tgl_akhir1 = $_POST['tgl_akhir1'];
        	
    ?>

	<caption>
		<h3>PT.TIRTA REJEKI DEWATA<br>
		Jl. Rajawali 14 Selemadeg Tabanan <br>
		Telp. 0362819533</h3>
		<hr>
		<h3>LAPORAN PEMBELIAN</h3>
	</caption>
	<thead>
		<br>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Kode faktur</th>
			<th>Supplier</th>
			<th>Alamat</th>
			<th>Qty</th>
			<th>Harga</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
        <?php

        	@$tgl_awal1 = $_POST['tgl_awal1'];
        	@$tgl_akhir1 = $_POST['tgl_akhir1'];

            $no = 1; 
            $sql = $koneksi->query("SELECT * FROM tb_pembelian WHERE tgl_transaksi between '$tgl_awal1' and '$tgl_akhir1' order by no asc");
            while ($data = mysqli_fetch_array($sql)) {  
            
        ?>
            <tr> 
                <td style="text-align: center;"><?php echo $no++;?></td>
                <td><?php echo date('d F Y', strtotime ($data['tgl_transaksi'] ))?></td>
                <td style="text-align: center;"><?php echo $data['kode_faktur'];?></td>
                <td><?php echo $data['supplier'];?></td>
                <td><?php echo $data['alamat'];?></td>
                <td style="text-align: center;"><?php echo $data['jumlah'];?></td>
                <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($data['harga']);?></td>
                <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($data['total']);?></td>   
            </tr>
                <?php 

                @$total_pembelian = $total_pembelian + $data['total'];

                }
                

                ?>
	</tbody>
	<tr>
		<th colspan="7" style="text-align: center;">Total Pembelian</th>
		<td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format(@$total_pembelian); ?>
		</td>
	</tr>
</table>

<br>

<h4 style="text-align: right; margin-right: 50px;">Denpasar, <?php echo date("d M Y"); ?> <br>
Mengetahui <br>
Direktur PT.TIRTA REJEKI <br><br><br><br>
Hanadi </h4>

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">
