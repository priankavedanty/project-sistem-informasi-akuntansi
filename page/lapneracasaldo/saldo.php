<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" data-toggle="modal" data-target="#smallModal9">Cetak</a>
            <div>
            <h3><p style="text-align:center;">PT. TIRTA REJEKI DEWATA</p></h3>
            <h4><p style="text-align:center;">Laporan Neraca Saldo</p></h4>
            </div>     
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Kode akun</th>
                    <th>Nama akun</th>

                    <th>Debet</th>
                    <th>Kredit</th>
                </tr>                                           
             </thead>
             <tbody>
                <?php
            $sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='111'");
                while($data1=mysqli_fetch_array($sql1)){ 
                    @$total_saldo1 = $total_saldo1+$data1['debet'] - $data1['kredit'];}
            $sql2 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='211'");
                while($data2=mysqli_fetch_array($sql2)){ 
                    @$total_saldo2 = $total_saldo2+$data2['debet'] - $data2['kredit'];}
            $sql3 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='311'");
                while($data3=mysqli_fetch_array($sql3)){ 
                    @$total_saldo3 = $total_saldo3+$data3['debet'] - $data3['kredit'];}
            $sql4 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='511'");
                while($data4=mysqli_fetch_array($sql4)){ 
                    @$total_saldo4 = $total_saldo4+$data4['debet'] - $data4['kredit'];}
            $sql5 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='512'");
                while($data5=mysqli_fetch_array($sql5)){ 
                    @$total_saldo5 = $total_saldo5+$data5['debet'] - $data5['kredit'];}
            $sql6 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='513'");
                while($data6=mysqli_fetch_array($sql6)){ 
                    @$total_saldo6 = $total_saldo6+$data6['debet'] - $data6['kredit'];}
            $sql7 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='514'");
                while($data7=mysqli_fetch_array($sql7)){ 
                    @$total_saldo7 = $total_saldo7+$data7['debet'] - $data7['kredit'];}
            $sql8 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='515'");
                while($data8=mysqli_fetch_array($sql8)){ 
                    @$total_saldo8 = $total_saldo8+$data8['debet'] - $data8['kredit'];}
            $sql9 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='516'");
                while($data9=mysqli_fetch_array($sql9)){ 
                    @$total_saldo9 = $total_saldo9+$data9['debet'] - $data9['kredit'];}
            $sql10 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='411'");
                while($data10=mysqli_fetch_array($sql10)){ 
                    @$total_saldo10 = $total_saldo10+$data10['debet'] - $data10['kredit'];}
            $sql12 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='412'");
                while($data12=mysqli_fetch_array($sql12)){ 
                    @$total_saldo12 = $total_saldo12+$data12['debet'] - $data12['kredit'];}
            $sql11 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun='131'");
                while($data11=mysqli_fetch_array($sql11)){ 
                    @$total_saldo11 = $total_saldo11+$data11['debet'] - $data11['kredit'];}

            $sql14 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='111'");
            $data14 = $sql14->fetch_assoc();
            $sql15 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='211'");
            $data15 = $sql15->fetch_assoc();
            $sql16 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='311'");
            $data16 = $sql16->fetch_assoc();
            $sql17 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='511'");
            $data17 = $sql17->fetch_assoc();
            $sql18 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='512'");
            $data18 = $sql18->fetch_assoc();
            $sql19 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='513'");
            $data19 = $sql19->fetch_assoc();
            $sql20 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='514'");
            $data20 = $sql20->fetch_assoc();
            $sql21 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='515'");
            $data21 = $sql21->fetch_assoc();
            $sql22 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='516'");
            $data22 = $sql22->fetch_assoc();
            $sql23 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='411'");
            $data23 = $sql23->fetch_assoc();
            $sql24 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='412'");
            $data24 = $sql24->fetch_assoc();
            $sql25 = $koneksi->query("SELECT * FROM tb_akun WHERE kode_akun='131'");
            $data25 = $sql25->fetch_assoc();
        ?>
            <tr>
                <td>111</td>
                <td>Kas</td>
                
                <?php if(@$total_saldo1 >='0'){
                    $debet1=$total_saldo1;
                    $kredit1='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet1);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit1);?></td>
                <?php } else{
                    $debet1='0';
                    $kredit1=@$total_saldo1;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet1);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit1);?></td>
                <?php } ?>    
            </tr>
            <tr>
                <td>211</td>
                <td>Utang usaha</td>
                
                <?php if(@$total_saldo2 >='0'){
                    $debet2=$total_saldo2;
                    $kredit2='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet2);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit2);?></td>
                <?php } else{
                    $debet2='0';
                    $kredit2=abs(@$total_saldo2);?>
                <td><?php echo "Rp". "&nbsp". number_format($debet2);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit2);?></td>
                <?php } ?>         
            </tr>
            <tr>
                <td>311</td>
                <td>Modal</td>
                
                <?php if(@$total_saldo3 >='0'){
                    $debet3=$total_saldo3;
                    $kredit3='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet3);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit3);?></td>
                <?php } else{
                    $debet3='0';
                    $kredit3=abs(@$total_saldo3);?>
                <td><?php echo "Rp". "&nbsp". number_format($debet3);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit3);?></td>
                <?php } ?>         
            </tr>
            <tr>
                <td>511</td>
                <td>Beban gaji</td>
                
                <?php if(@$total_saldo4 >='0'){
                    $debet4=$total_saldo4;
                    $kredit4='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet4);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit4);?></td>
                <?php } else{
                    $debet4='0';
                    $kredit4=@$total_saldo4;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet4);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit4);?></td>
                <?php } ?>         
            </tr>
            <tr>
                <td>512</td>
                <td>Beban telepon</td>
                
                <?php if(@$total_saldo5 >='0'){
                    $debet5=$total_saldo5;
                    $kredit5='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet5);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit5);?></td>
                <?php } else{
                    $debet5='0';
                    $kredit5=@$total_saldo5;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet5);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit5);?></td>
                <?php } ?>         
            </tr>
            <tr>
                <td>513</td>
                <td>Beban air</td>

                <?php if(@$total_saldo6 >='0'){
                    $debet6=$total_saldo6;
                    $kredit6='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet6);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit6);?></td>
                <?php } else{
                    $debet6='0';
                    $kredit6=@$total_saldo6;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet6);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit6);?></td>
                <?php } ?>         
            </tr>
            <tr>
                <td>514</td>
                <td>Beban listrik</td>
                
                <?php if(@$total_saldo7 >='0'){
                    $debet7=$total_saldo7;
                    $kredit7='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet7);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit7);?></td>
                <?php } else{
                    $debet7='0';
                    $kredit7=@$total_saldo7;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet7);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit7);?></td>
                <?php } ?>        
            </tr>
            <tr>
                <td>515</td>
                <td>Beban lain-lain</td>
                
                <?php if(@$total_saldo8 >='0'){
                    $debet8=$total_saldo8;
                    $kredit8='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet8);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit8);?></td>
                <?php } else{
                    $debet8='0';
                    $kredit8=@$total_saldo8;?>
                <td><?php echo "Rp". "&nbsp". number_format($debet8);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit8);?></td>
                <?php } ?>        
            </tr>
            <tr>
                <td>411</td>
                <td>Penjualan</td>
                
                <?php if(@$total_saldo10 >='0'){
                    $debet10=$total_saldo10;
                    $kredit10='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet10);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit10);?></td>
                <?php } else{
                    $debet10='0';
                    $kredit10=abs(@$total_saldo10);?>
                <td><?php echo "Rp". "&nbsp". number_format($debet10);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit10);?></td>
                <?php } ?>        
            </tr>
            <tr>
                <td>412</td>
                <td>HPP</td>
                
                <?php if(@$total_saldo12 >='0'){
                    $debet12=$total_saldo12;
                    $kredit12='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet12);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit12);?></td>
                <?php } else{
                    $debet12='0';
                    $kredit12=abs(@$total_saldo12);?>
                <td><?php echo "Rp". "&nbsp". number_format($debet12);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit12);?></td>
                <?php } ?>        
            </tr>
            <tr>
                <td>131</td>
                <td>Persediaan barang dagang</td>
                
                <?php if(@$total_saldo11 >='0'){
                    $debet11=$total_saldo11;
                    $kredit11='0';?>
                <td><?php echo "Rp". "&nbsp". number_format($debet11);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit11);?></td>
                <?php } else{
                    $debet11='0';
                    $kredit11=abs(@$total_saldo11);?>
                <td><?php echo "Rp". "&nbsp". number_format($debet11);?></td>
                <td><?php echo "Rp". "&nbsp". number_format($kredit11);?></td>
                       
                    <?php } ?>
            </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>Kode akun</th>
                    <th>Nama akun</th>

                    <th>Debet</th>
                    <th>Kredit</th>
                </tr>   
                </tfoot>
                </table>
            </div>
        </div>
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