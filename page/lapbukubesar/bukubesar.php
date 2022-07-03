<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" data-toggle="modal" data-target="#smallModal10">Cetak</a>
            <div>
            <h3><p style="text-align:center;">PT. TIRTA REJEKI DEWATA</p></h3>
            <h4><p style="text-align:center;">Laporan Buku Besar</p></h4>
            </div>     
        </div>
        <div class="card-body">
            <?php
                $sql = $koneksi->query("SELECT * FROM tb_akun");
                while ($data = mysqli_fetch_array($sql)) {		
            ?>
            <table id="example" class="table table-bordered table-hover">
	            <thead>
		            <br>
			        <tr>
                        <th colspan="7" style="text-align: left;">Perkiraan akun : <?php echo $data['nama_akun'] ?> <br style="text-align: left;">  No rek : <?php echo $data['kode_akun'] ?> </th>
			        </tr>
                    <tr>
                        <th width="5%">Id</th>
			            <th width="20%">Tanggal</th>
			            <th width="20%">Keterangan</th>
                        <th width="20%">Ref</th>
			            <th width="13%">Debet</th>
			            <th width="13%">Kredit</th>
			            <th width="20%">Saldo</th>
		            </tr>
	            </thead>
	            <tbody>
		            <?php 
                    $kode_akun = $data['kode_akun'];
                    $no=1;
			        $sql1 = $koneksi->query("SELECT * FROM tb_jurnal WHERE kode_akun LIKE '$kode_akun'");
			        while($data1=mysqli_fetch_array($sql1)){ 
                    $debet = $data1['debet'];
                    $kredit = $data1['kredit'];
                    $saldo = $debet+$kredit;?>
			        <tr>
                        <td><?php echo $no++; ?></td>
				        <td><?php echo date('d F Y', strtotime($data1['tgl_transaksi'])); ?></td>
				        <td><?php echo $data1['keterangan']; ?></td>
                        <td><?php echo $data['kode_akun']; ?></td>
				        <td><?php echo rupiah($debet); ?></td>
				        <td><?php echo rupiah($kredit); ?></td>
				        <td><?php echo rupiah($saldo); ?></td>
                    </tr>
                    <?php } 
                    ?>
                </tbody>
            </table>
            <?php }?>
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
                <button type="submit" class="btn btn-success ">Cetak</button>
                <button type="button" class="btn btn-danger " data-dismiss="modal">Kembali</button>
            </div>
        </form>
        </div>
    </div>
</div>