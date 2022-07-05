<?php

include "koneksi.php";

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$aksi = $_GET['aksi'];


    function rupiah($angka) { 
        $hasil = "Rp ". number_format($angka,2,',','.');
        return $hasil;
    }

if ($_GET["page"] == "") {
	include "home.php";
}else if ($_GET["page"] == "pegawai") {
	if ($aksi == "") {
		include "page/pegawai/pegawai.php";
	}elseif ($aksi == "tambah") {
        include "page/pegawai/tambah.php";
    }elseif ($aksi == "ubah") {
        include "page/pegawai/ubah.php";
    }elseif ($aksi == "hapus") {
        include "page/pegawai/hapus.php";
    }elseif ($aksi == "kembali") {
        include "page/pegawai/pegawai.php";
    }	
}else if ($_GET["page"] == "akun") {
    if ($aksi == "") 
    {
        include "page/akun/akun.php";
    }elseif ($aksi == "tambah") {
        include "page/akun/tambah.php";
    }elseif ($aksi == "ubah") {
        include "page/akun/ubah.php";
    }elseif ($aksi == "hapus") {
        include "page/akun/hapus.php";
    }elseif ($aksi == "kembali") {
        include "page/akun/akun.php";
    }
}else if ($_GET["page"] == "barang") {
    if ($aksi == "") 
    {
        include "page/barang/barang.php";
    }elseif ($aksi == "lihat") {
        include "page/barang/segerahabis.php";
    }elseif ($aksi == "lihat2") {
        include "page/barang/keseluruhan.php";
    }elseif ($aksi == "lihat3") {
        include "page/barang/tersedia.php";
    }elseif ($aksi == "lihat4") {
        include "page/barang/habis.php";
    }elseif ($aksi == "tambah") {
        include "page/barang/tambah.php";
    }elseif ($aksi == "ubah") {
        include "page/barang/ubah.php";
    }elseif ($aksi == "hapus") {
        include "page/barang/hapus.php";   
    }elseif ($aksi == "kembali") {
        include "page/barang/barang.php";
    }
}else if ($_GET["page"] == "stokminimum") {
    if ($aksi == "") 
    {
        include "page/stokminimum/segerahabis.php";
    }elseif ($aksi == "ubah") {
        include "page/barang/ubah.php";
    }elseif ($aksi == "hapus") {
        include "page/barang/hapus.php";   
    }
}else if ($_GET["page"] == "jenisstok") {
    if ($aksi == "") 
    {
        include "page/jenisstok/jenis.php";
    }elseif ($aksi == "tambah") {
        include "page/jenisstok/jenis.php";
    }elseif ($aksi == "kembali") {
        include "page/jenisstok/jenis.php";
    }
}else if ($_GET["page"] == "penyesuaianstok") {
    if ($aksi == "") 
    {
        include "page/penyesuaianstok/stok.php";
    }elseif ($aksi == "tambah") {
        include "page/penyesuaianstok/tambah.php";
    }elseif ($aksi == "lihat") {
        include "page/penyesuaianstok/lihat.php";
    }elseif ($aksi == "kembali") {
        include "page/penyesuaianstok/stok.php";
    }elseif ($aksi == "hapus") {
        include "page/penyesuaianstok/hapus.php";   
    }
}else if ($_GET["page"] == "penjualan") {
    if ($aksi == "") 
    {
        include "page/penjualan/penjualan.php";
    }elseif ($aksi == "hapus") {
        include "page/penjualan/hapus.php";   
    }
}else if ($_GET["page"] == "penjualan2") {
    if ($aksi == "") 
    {
        include "page/penjualan2/penjualan2.php";
    }elseif ($aksi == "lihat") {
        include "page/penjualan2/lihat2.php";   
    }elseif ($aksi == "hapus") {
        include "page/penjualan2/hapus.php";   
    }elseif ($aksi == "kembali") {
        include "page/penjualan2/penjualan2.php";
    }
}else if ($_GET["page"] == "pembelian") {
    if ($aksi == "") 
    {
        include "page/pembelian/pembelian.php";
    }elseif ($aksi == "hapus") {
        include "page/pembelian/hapus.php";   
    }
}else if ($_GET["page"] == "pembelian2") {
    if ($aksi == "") 
    {
        include "page/pembelian2/pembelian2.php";
    }elseif ($aksi == "lihat") {
        include "page/pembelian2/lihat2.php";   
    }elseif ($aksi == "hapus") {
        include "page/pembelian2/hapus.php";   
    }elseif ($aksi == "kembali") {
        include "page/pembelian2/pembelian2.php";
    }elseif ($aksi == "tolak") {
        include "page/pembelian2/pembelian2.php";
    }
}else if ($_GET["page"] == "jurnal") {
    if ($aksi == "") 
    {
        include "page/jurnal/jurnal2.php";
    }elseif ($aksi == "hapus") {
        include "page/jurnal/hapus.php";   
    }
}else if ($_GET["page"] == "jurnalentry") {
    if ($aksi == "") 
    {
        include "page/jurnalentry/jurnalentry.php";
    }elseif ($aksi == "hapus") {
        include "page/jurnalentry/hapus.php";
    }elseif ($aksi == "ubah") {
        include "page/jurnalentry/ubah.php";
    }elseif ($aksi == "lihat") {
        include "page/jurnalentry/lihat.php";
    }elseif ($aksi == "kembali") {
        include "page/jurnalentry/jurnalentry.php";
    }
}else if ($_GET["page"] == "jurnalumum") {
    if ($aksi == "") 
    {
        include "page/jurnalumum/jurnalumum.php";
    }elseif ($aksi == "hapus") {
        include "page/jurnalumum/hapus.php";
    }elseif ($aksi == "lihat") {
        include "page/jurnalumum/lihat.php";
    }elseif ($aksi == "kembali") {
        include "page/jurnalumum/jurnalumum.php";
    }
}else if ($_GET["page"] == "saldoawal") {
    if ($aksi == "") 
    {
        include "page/saldoawal/saldo.php";
    }elseif ($aksi == "hapus") {
        include "page/saldoawal/hapus.php";
    }elseif ($aksi == "tambah") {
        include "page/saldoawal/tambah.php";
    }elseif ($aksi == "ubah") {
        include "page/saldoawal/ubah.php";
    }elseif ($aksi == "kembali") {
        include "page/saldoawal/saldo.php";
    }
}else if ($_GET["page"] == "lappenjualan") {
    if ($aksi == "") 
    {
        include "page/lappenjualan/penjualan.php";
    }elseif ($aksi == "cetak") {
        include "page/lappenjualan/laporan.php";
    }
}else if ($_GET["page"] == "lappembelian") {
    if ($aksi == "") 
    {
        include "page/lappembelian/pembelian.php";
    }elseif ($aksi == "cetak") {
        include "page/lappembelian/laporan.php";
    }
}else if ($_GET["page"] == "lapstokbarang") {
    if ($aksi == "") 
    {
        include "page/lapstokbarang/stok.php";
    }elseif ($aksi == "cetak") {
        include "page/lapstokbarang/laporan.php";
    }
}else if ($_GET["page"] == "lapstokopname") {
    if ($aksi == "") 
    {
        include "page/lapstokopname/opname.php";
    }elseif ($aksi == "cetak") {
        include "page/lapstokopname/laporan.php";
    }
}else if ($_GET["page"] == "lapjurnalumum") {
    if ($aksi == "") 
    {
        include "page/lapjurnalumum/jurnal.php";
    }elseif ($aksi == "cetak") {
        include "page/lapjurnalumum/laporan.php";
    }
}else if ($_GET["page"] == "lapbukubesar") {
    if ($aksi == "") 
    {
        include "page/lapbukubesar/bukubesar.php";
    }elseif ($aksi == "cetak") {
        include "page/lapbukubesar/laporan.php";
    }
}else if ($_GET["page"] == "lapneracasaldo") {
    if ($aksi == "") 
    {
        include "page/lapneracasaldo/saldo.php";
    }elseif ($aksi == "cetak") {
        include "page/lapneracasaldo/laporan.php";
    }
}else if ($_GET["page"] == "lapneraca") {
    if ($aksi == "") 
    {
        include "page/lapneraca/neraca.php";
    }elseif ($aksi == "cetak") {
        include "page/lapneraca/laporan.php";
    }
}else if ($_GET["page"] == "laplabarugi") {
    if ($aksi == "") 
    {
        include "page/laplabarugi/labarugi.php";
    }elseif ($aksi == "cetak") {
        include "page/laplabarugi/laporan.php";
    }
}

?>

<div class="modal fade" id="smallModal2"  role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Penjualan</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/lappenjualan/laporan.php" target="blank">

               <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Cetak</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal3"  role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Pembelian</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/lappembelian/laporan.php" target="blank">

               <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal1" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir1" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Cetak</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal4" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Stok Barang</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/lapstokbarang/laporan.php" target="blank">

            <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal1" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir1" class="form-control"/>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Cetak</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal5" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Stok Opname</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/lapstokopname/laporan.php" target="blank">

            <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal1" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir1" class="form-control"/>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Cetak</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal7" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Jurnal Umum</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/lapjurnalumum/laporan.php" target="blank">

            <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal1" class="form-control"/>
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir1" class="form-control"/>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Cetak</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal9" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Neraca Saldo</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/lapneracasaldo/laporan.php" target="blank">

            <label for="">Pilih bulan</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="bln">
                            <?php
                                $bln = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
                                for($a=1; $a <= 12; $a++){
                                 
                                echo "<option value=$a>$bln[$a]</option>"; } 
                                echo "</select>";
                            ?>
                        </select>
                    </div>
                </div>

               <label for="">Pilih tahun</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="thn">
                            <?php
                            $thn = date("Y");
                            for ($x = 2022; $x <= $thn; $x++) {

                                echo "<option value=$x>$thn </option>"; } 
                                echo "</select>";

                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Cetak</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal10" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Buku Besar</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/lapbukubesar/laporan.php" target="blank">

               <label for="">Pilih bulan</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="bln">
                            <?php
                                $bln = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
                                for($a=1; $a <= 12; $a++){
                                 
                                echo "<option value=$a>$bln[$a]</option>"; } 
                                echo "</select>";
                            ?>
                        </select>
                    </div>
                </div>

               <label for="">Pilih tahun</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="thn">
                            <?php
                            $thn = date("Y");
                            for ($x = 2022; $x <= $thn; $x++) {

                                echo "<option value=$x>$thn </option>"; } 
                                echo "</select>";

                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary-link waves-effect">Cetak</button>
                <button type="button" class="btn btn-primary-link waves-effect" data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal12" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Laba Rugi</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/laplabarugi/laporan.php" target="blank">

            <label for="">Pilih bulan</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="bln">
                            <?php
                                $bln = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
                                for($a=1; $a <= 12; $a++){
                                 
                                echo "<option value=$a>$bln[$a]</option>"; } 
                                echo "</select>";
                            ?>
                        </select>
                    </div>
                </div>

               <label for="">Pilih tahun</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="thn">
                            <?php
                            $thn = date("Y");
                            for ($x = 2022; $x <= $thn; $x++) {

                                echo "<option value=$x>$thn </option>"; } 
                                echo "</select>";

                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Cetak</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="smallModal13" tabindex="-2" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align: center;" class="modal-title" id="smallModalLabel">Laporan Neraca</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="page/lapneraca/laporan.php" target="blank">

            <label for="">Pilih bulan</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="bln">
                            <?php
                                $bln = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
                                for($a=1; $a <= 12; $a++){
                                 
                                echo "<option value=$a>$bln[$a]</option>"; } 
                                echo "</select>";
                            ?>
                        </select>
                    </div>
                </div>

               <label for="">Pilih tahun</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="thn">
                            <?php
                            $thn = date("Y");
                            for ($x = 2022; $x <= $thn; $x++) {

                                echo "<option value=$x>$thn </option>"; } 
                                echo "</select>";

                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Cetak</button>
                <button type="button" class="btn btn-danger"data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>
