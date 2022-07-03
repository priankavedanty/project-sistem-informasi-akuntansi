<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" data-toggle="modal" data-target="#smallModal6">Cetak</a>
            <div>
            <h3><p style="text-align:center;">PT. TIRTA REJEKI DEWATA</p></h3>
            <h4><p style="text-align:center;">Laporan Jurnal Umum</p></h4>
            </div>          
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Ref</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                </tr>                                        	
             </thead>
             <tbody>
                <?php
                    $no=1;
                    $sql = $koneksi->query("SELECT * FROM tb_jurnal WHERE tgl_transaksi order by id");
                    while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['nama_akun'];?></td>
                        <td><?php echo $data['ref'];?></td>
                        <td><?php echo rupiah($data['debet']);?></td>
                        <td><?php echo rupiah($data['kredit']);?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                     <th>Ref</th>
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

<div class="modal fade" id="smallModal6" tabindex="-2" role="dialog">
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
