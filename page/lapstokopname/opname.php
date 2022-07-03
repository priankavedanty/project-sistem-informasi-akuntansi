<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" data-toggle="modal" data-target="#smallModal5">Cetak</a>
            <div>
            <h3><p style="text-align:center;">PT. TIRTA REJEKI DEWATA</p></h3>
            <h4><p style="text-align:center;">Laporan Stok Opname</p></h4>
            </div> 
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr >
                    <th rowspan = "2" style="vertical-align:middle; text-align:center;">Tanggal</th>
                    <th rowspan = "2" style="vertical-align:middle; text-align:center;">No bukti</th>
                    <th rowspan = "2" style="vertical-align:middle; text-align:center;">Keterangan</th>
                    <th rowspan = "2" style="vertical-align:middle; text-align:center;">Stok</th>
                    <th colspan = "2" style="text-align: center;">Selisih</th>
                    <th rowspan = "2" style="vertical-align:middle; text-align:center;">Stok akhir</th>
                </tr>
                <tr>
                    <th style="text-align: center;">Masuk</th>
                    <th style="text-align: center;">Keluar</th>
                </tr>                                        
              </thead>
              <tbody>
                <?php

                    $no = 1;
                    $sql1 = $koneksi->query("SELECT * FROM tb_barang, tb_stok WHERE tb_barang.kode_barang=tb_stok.kode_barang");
                    $sql = $koneksi->query("SELECT * FROM tb_stok order by no");
                    while ($data = mysqli_fetch_array($sql)) {

                        $data2 = mysqli_fetch_array($sql1); 
                        $stok_akhir = $data2['stok_awal'] + $data['stok_masuk'] - $data['stok_keluar'];
                ?>
                    <tr> 
                        <td><?php echo date('d F Y', strtotime($data['tgl_transaksi']));?></td>
                        <td><?php echo $data['no_kartu'];?></td>
                        <td><?php echo $data['kategori_barang'];?></td>
                        <td><?php echo $data2['stok_awal'];?></td>
                        <td><?php echo $data['stok_masuk'];?></td>
                        <td><?php echo $data['stok_keluar'];?></td>
                        <td><?php echo $stok_akhir;?></td>
                    </tr>
                    <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Tanggal</th>
                <th>No bukti</th>
                <th>Keterangan</th>
                <th>Stok</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Stok akhir</th>
              </tr>
              </tfoot>
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


