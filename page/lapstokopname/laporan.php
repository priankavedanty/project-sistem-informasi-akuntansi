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
        <h3>LAPORAN STOK OPNAME</h3>
    </caption>
    <thead>
        <br>
        <tr>
            <th rowspan = "2">No</th>
            <th rowspan = "2">Kode barang</th>
            <th rowspan = "2">Nama barang</th>
            <th rowspan = "2">Harga pokok</th>
            <th rowspan = "2">Harga jual</th>
            <th rowspan = "2">Stok awal</th>
            <th colspan = "2">Selisih</th>
            <th rowspan = "2">Stok akhir</th>
            <th rowspan = "2">Nilai selisih</th>
            <th rowspan = "2">Keterangan</th>
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
            @$keterangan = $_POST['keterangan'];

            $no = 1; 
            $sql1 = $koneksi->query("SELECT * FROM tb_barang,tb_stok WHERE tb_barang.nama_barang=tb_stok.nama_barang between '$tgl_awal1' and '$tgl_akhir1' ");
            $sql = $koneksi->query("SELECT * FROM tb_stok WHERE tgl_transaksi between '$tgl_awal1' and '$tgl_akhir1' order by no");
            while ($data = mysqli_fetch_array($sql)) {
                $data2 = mysqli_fetch_array($sql1);
                @$nilai_selisih = $data2['harga_beli'] * abs($data['stok_masuk'] - $data['stok_keluar']);
                @$stok_akhir = $data2['stok_awal'] + $data['stok_masuk'] - $data['stok_keluar'];
    
        ?>
                <tr>
                    <td style="text-align: center;"><?php echo $no++;?></td>
                    <td><?php echo $data['kode_barang'];?></td>
                    <td><?php echo $data['nama_barang'];?></td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($data2['harga_beli']);?></td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($data2['harga_jual']);?></td> 
                    <td style="text-align: center;"><?php echo $data2['stok_awal'];?></td>
                    <td style="text-align: center;"><?php echo $data['stok_masuk'];?></td>
                    <td style="text-align: center;"><?php echo $data['stok_keluar'];?></td>
                    <td style="text-align: center;"><?php echo $stok_akhir;?></td>
                    <td style="text-align: center;"><?php echo "Rp". "&nbsp". number_format($nilai_selisih);?></td>    
                    <td style="text-align: center;"><?php echo $data['kategori_barang'];?></td>  
                </tr>
            <?php

                @$total_awal = $total_awal + $data2['stok_awal'];
                @$total_masuk = $total_masuk + $data['stok_masuk'];
                @$total_keluar = $total_keluar + $data['stok_keluar'];
                @$total_akhir = $total_akhir + $stok_akhir;
                @$total_nilai_selisih = $total_nilai_selisih + $nilai_selisih;

                }
            ?>

    </tbody>
    <tr>
        <th colspan="5" style="text-align: center;">Total</th>
        <td style="text-align: center; font-weight: bold;"><?php echo $total_awal;?></td> 
        <td style="text-align: center; font-weight: bold;"><?php echo $total_masuk;?></td> 
        <td style="text-align: center; font-weight: bold;"><?php echo $total_keluar;?></td> 
        <td style="text-align: center; font-weight: bold;"><?php echo $total_akhir;?></td> 
        <td style="text-align: center; font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_nilai_selisih);?></td>
        <td></td>
    </tr>
</table>

<br>

<h4 style="text-align: right; margin-right: 50px;">Tabanan, <?php echo date("d M Y"); ?> <br>
Mengetahui <br>
Direktur PT.TIRTA REJEKI <br><br><br><br>
Hanadi </h4>

<input type="button" class="noPrint" value="Cetak PDF" onclick="window.print()">