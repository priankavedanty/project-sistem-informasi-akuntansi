<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" data-toggle="modal" data-target="#smallModal12"> Cetak</a>
            <div>
            <h3><p style="text-align:center;">PT. TIRTA REJEKI DEWATA</p></h3>
            <h4><p style="text-align:center;">Laporan Laba Rugi</p></h4>
            </div>  

        </div>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th colspan="3">PENDAPATAN :</th>
                </tr>
                <tr>
            <?php 
                $sql1 = $koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='411'");
                while ($data1=mysqli_fetch_array($sql1)) {
                    @$total_saldo_penjualan = $total_saldo_penjualan-$data1['debet'] + $data1['kredit'];}
            ?>
                    <td style="text-indent: 30px;">Penjualan</td>
                    <td><?php echo "Rp". "&nbsp". number_format($total_saldo_penjualan);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="1" style="text-indent: 30px; font-weight: bold;">Total pendapatan</td>
                    <td></td>
                    <td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($total_saldo_penjualan);?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">BEBAN :</th>
                </tr>
                <tr><?php 
                $sql2=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='511'");
                $sql3=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='512'");
                $sql4=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='513'");
                $sql5=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='514'");
                $sql6=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='515'");
                $sql7=$koneksi->query("SELECT * FROM tb_jurnal Where kode_akun='516'");
                $sql8=$koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='412'");
                while ($data2=mysqli_fetch_array($sql2)) {
                    @$total_b_gaji = $total_b_gaji+$data2['debet'] - $data2['kredit'];}
                while ($data3=mysqli_fetch_array($sql3)) {
                    @$total_b_telepon = $total_b_telepon+$data3['debet'] - $data3['kredit'];}
                while ($data4=mysqli_fetch_array($sql4)) {
                    @$total_b_air = $total_b_air+$data4['debet'] - $data4['kredit'];}
                while ($data5=mysqli_fetch_array($sql5)) {
                    @$total_b_listrik = $total_b_listrik+$data5['debet'] - $data5['kredit'];}
                while ($data6=mysqli_fetch_array($sql6)) {
                    @$total_b_lain = $total_b_lain+$data6['debet'] - $data6['kredit'];}
                while ($data7=mysqli_fetch_array($sql7)) {
                    @$total_b_sewa = $total_b_sewa+$data7['debet'];}
                while ($data8=mysqli_fetch_array($sql8)) {
                    @$total_hpp = $total_hpp + $data8['debet'] - $data8['kredit'];}
                ?>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban gaji</td>
                    <td><?php echo "Rp". "&nbsp". number_format(@$total_b_gaji);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban telepon</td>
                    <td><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". number_format($total_b_telepon);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban listrik</td>
                    <td><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". number_format($total_b_listrik);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban air</td>
                    <td><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp".  number_format($total_b_air);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">Beban lain-lain</td>
                    <td><?php echo "Rp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". "&nbsp". number_format($total_b_lain);?></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left; text-indent: 30px;">HPP</td>
                    <td><?php echo "Rp". "&nbsp". number_format($total_hpp);?></td>
                    <td></td>
                </tr>
                    <?php
                        @$saldo_beban = $total_b_gaji+$total_b_telepon+$total_b_air+$total_b_listrik+$total_b_lain+$total_hpp;
                        @$saldo_keseluruhan = $total_saldo_penjualan-$saldo_beban;
                    ?>  
                <tr>
                    <td colspan="1" style="text-indent: 30px; font-weight: bold;">Total beban</td>
                    <td></td>
                    <td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($saldo_beban);?>
                    </td>
                </tr>

                <tr>
                    <td colspan="1" style="text-indent: 30px; font-weight: bold;">Laba/Rugi Bersih</td>
                    <td></td>
                    <td style=" font-weight: bold;"><?php echo "Rp". "&nbsp". number_format($saldo_keseluruhan);?>
                    </td>
                </tr>

                </tr>
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