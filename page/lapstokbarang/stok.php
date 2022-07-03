<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" data-toggle="modal" data-target="#smallModal4">Cetak</a>
            <div>
            <h3><p style="text-align:center;">PT. TIRTA REJEKI DEWATA</p></h3>
            <h4><p style="text-align:center;">Laporan Stok Barang</p></h4>
            </div>   
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                    <th rowspan="2" style="vertical-align:middle; text-align:center;">Nama barang</th>
                    <th rowspan="2" style="vertical-align:middle; text-align:center;">Kode barang</th>
                    <th rowspan="2" style="vertical-align:middle; text-align:center;">Stok awal</th>
                    <th colspan="2" style="text-align: center;">Jumlah barang</th>
                    <th rowspan="2" style="vertical-align:middle; text-align:center;">Stok akhir</th>
                </tr> 
                <tr>
                    <th>Stok masuk</th>
                    <th>Stok keluar</th>
                </tr>             
              </thead>
              <tbody>
                <?php

                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM tb_barang order by no");
                    while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr> 
                        <td><?php echo $data['nama_barang'];?></td>
                        <td><?php echo $data['kode_barang'];?></td>
                        <td><?php echo $data['stok_awal'];?></td>
                        <td><?php echo $data['stok_bertambah'];?></td>
                        <td><?php echo $data['stok_berkurang'];?></td>
                        <td><?php echo $data['stok_akhir'];?></td>
                    </tr>
                    <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Nama barang</th>
                <th>Kode barang</th>
                <th>Stok awal</th>
                <th>Stok akhir</th>
                <th>Masuk</th>
                <th>Keluar</th>
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


