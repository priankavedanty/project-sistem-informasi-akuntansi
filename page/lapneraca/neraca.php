<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" data-toggle="modal" data-target="#smallModal13"> Cetak</a>
            <div>
            <h3><p style="text-align:center;">PT. TIRTA REJEKI DEWATA</p></h3>
            <h4><p style="text-align:center;">Laporan Neraca</p></h4>
            </div>  
        </div>
    <div class="card-body">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th colspan="2">AKTIVA</th>
                    <th colspan="2">PASIVA</th>
                </tr>

            <tr>
                <?php 
                $sql1=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='111'");
                $sql2=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='211'");
                $sql3=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='511'");
                $sql4=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='512'");
                $sql5=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='513'");
                $sql6=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='514'");
                $sql7=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='515'");

                $sql9=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='411'");
                $sql10=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='412'");
                while ($data1=mysqli_fetch_array($sql1)) {
                    @$total_saldo_kas = $total_saldo_kas+$data1['debet'] - $data1['kredit'];}
                while ($data2=mysqli_fetch_array($sql2)) {
                    @$total_saldo_utang =$total_saldo_utang + $data2['debet']+$data2['kredit'];}
                while ($data3=mysqli_fetch_array($sql3)) {
                    @$total_b_gaji = $total_b_gaji+$data3['debet'] - $data3['kredit'];}
                while ($data4=mysqli_fetch_array($sql4)) {
                    @$total_b_telepon = $total_b_telepon+$data4['debet'] - $data4['kredit'];}
                while ($data5=mysqli_fetch_array($sql5)) {
                    @$total_b_air = $total_b_air+$data5['debet'] - $data5['kredit'];}
                while ($data6=mysqli_fetch_array($sql6)) {
                    @$total_b_listrik = $total_b_listrik+$data6['debet'] - $data6['kredit'];}
                while ($data7=mysqli_fetch_array($sql7)) {
                    @$total_b_lain = $total_b_lain+$data7['debet'] - $data7['kredit'];}
                
                while ($data9=mysqli_fetch_array($sql9)) {
                    @$total_penjualan = $total_penjualan-$data9['debet'] + $data9['kredit'];}
                while ($data10=mysqli_fetch_array($sql10)) {
                    @$total_b_hpp = $total_b_hpp + ($data10['debet']);}
                
                ?>
                    <td>Kas</td>
                    <td><?php echo "Rp". "&nbsp". number_format($total_saldo_kas);?></td>
                    <td>Utang usaha</td>
                    <td><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". number_format($total_saldo_utang);?></td>
            </tr>

            <tr>
                <?php 
                $sql3=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='131'");
                $sql4=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='311'");
                while ($data3=mysqli_fetch_array($sql3)) {
                    @$total_saldo_barang += $data3['debet']-$data3['kredit'];}
                while ($data4=mysqli_fetch_array($sql4)) {
                    @$total_saldo_modal += $data4['kredit']+($total_penjualan)-($total_b_gaji+$total_b_telepon+$total_b_air+$total_b_listrik+$total_b_lain+$total_b_hpp+$total_b_sewa);}
                ?>
                <tr>
                    <td>Persediaan barang dagang</td>
                    <td><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". number_format($total_saldo_barang);?></td>
                    <td style="font-weight: bold;">MODAL</td>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Modal akhir</td>
                        <td><?php echo "Rp". "&nbsp". number_format($total_saldo_modal);?></td>
                    </tr>
                </tr>
            </tr>
            <tr>
                <?php
                    @$saldo_kasdanbarang = $total_saldo_kas+$total_saldo_barang;
                    @$saldo_utangdanmodal = $total_saldo_utang+$total_saldo_modal;
                ?>
                    <th>Total</th>
                    <th><?php echo "Rp". "&nbsp". number_format($saldo_kasdanbarang);?></th>
                    <th>Total</th>
                    <th><?php echo "Rp". "&nbsp". number_format($saldo_utangdanmodal);?></th>
            </tr>                           	
             </thead>
        </table>
        </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

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
                        <select class="custom-select form-control-border" name="bln">
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
                        <select class="custom-select form-control-border" name="thn">
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