 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Transaksi
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_Transaksi'); ?>">Transaksi</a></li>
        <li class="active">Tambah Data Transaksi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <?php foreach ($transaksi as $key) { ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pengirim</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Pengirim</label>
                <input type="text" class="form-control" id="namapengirim" name="namapengirim" value="<?php echo $key->namapengirim ?>" readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">NIK</label>
                <input type="text" class="form-control" name="nikpengirim" id="nikpengirim" value="<?php echo $key->nikpengirim ?>" readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <textarea class="form-control" name="alamatpengirim" id="alamatpengirim" readonly><?php echo $key->alamatpengirim ?></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tlp. Pengirim</label>
                <input type="text" class="form-control" id="tlppengirim" name="tlppengirim" value="<?php echo $key->tlppengirim ?>" readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email Pengirim</label>
                <input type="email" class="form-control" id="emailpengirim" name="emailpengirim" value="<?php echo $key->emailpengirim ?>" readonly>
              </div>
          <!-- /.box-body -->
            </div>
          </div>
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penerima</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Penerima</label>
                  <input type="text" class="form-control" id="namapenerima" name="namapenerima" value="<?php echo $key->namapenerima ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK</label>
                  <input type="text" class="form-control" name="nikpenerima" id="nikpenerima" value="<?php echo $key->nikpenerima ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea class="form-control" name="alamatpenerima" id="alamatpenerima" readonly><?php echo $key->alamatpenerima ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tlp. Penerima</label>
                  <input type="text" class="form-control" id="tlppenerima" name="tlppenerima" value="<?php echo $key->tlppenerima ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email Penerima</label> 
                  <input type="email" class="form-control" id="emailpenerima" name="emailpenerima" value="<?php echo $key->emailpenerima ?>" readonly>
                </div>
            <!-- /.box-body -->
            </div>
          </div>
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tujuan Pengiriman</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">No Resi</label>
                  <input type="text" class="form-control" id="noresi" name="noresi" value="<?php echo $key->noresi ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Asal</label>                  
                  <input type="text" class="form-control" id="noresi" name="noresi" value="<?php echo $key->asal ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tujuan</label>
                  <input type="text" class="form-control" id="noresi" name="noresi" value="<?php echo $key->tujuan ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Kiriman</label>
                  <input type="text" class="form-control" id="noresi" name="noresi" value="<?php echo $key->jeniskiriman ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Layanan</label>
                  <input type="text" class="form-control" id="noresi" name="noresi" value="<?php echo $key->jenismuatan ?>" readonly>
                </div>
            <!-- /.box-body -->
            </div>
          </div>
          <!-- /.box -->

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Rincian Barang</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Barang</label>
                  <input type="text" class="form-control" id="jenisbarang" name="jenisbarang" value="<?php echo $key->jenisbarang ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Barang</label>
                  <input type="text" class="form-control" id="jumlahbarang" name="jumlahbarang" value="<?php echo $key->jumlahbarang ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Berat</label>
                  <input type="text" class="form-control" id="berat" name="berat" value="<?php echo $key->berat ?>" readonly >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Berat Volume</label>
                    
                          <input type="text" class="form-control" readonly id="volume" name="volume" value="<?php echo $key->beratvolume ?>" readonly>
                  </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Keterangan</label>
                  <textarea class="form-control" name="ket" id="ket"readonly><?php echo $key->ket ?></textarea>
                </div>
                </div>
              </div>
            <!-- /.box-body -->
        <!--/.col (right) -->

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Informasi Rincian Biaya</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga / Kg</label>
                  <input type="text" class="form-control" id="hargakg" name="hargakg" readonly value="<?php echo 'Rp. '.number_format($key->harga) ?>" >
                  <input type="hidden" class="form-control" id="min" name="min" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Biaya Kirim</label>
                  <input type="text" class="form-control" id="biayakirim" name="biayakirim" readonly value="<?php echo 'Rp. '.number_format($key->subharga) ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Biaya Packing</label>
                  <input type="text" class="form-control" id="biayapacking" name="biayapacking"  readonly value="<?php echo 'Rp. '.number_format($key->biayapacking) ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Asuransi</label>
                  <input type="text" class="form-control" id="asuransi" name="asuransi" readonly value="<?php echo 'Rp. '.number_format($key->asuransi) ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">PPN 1%</label>
                    <input type="text" class="form-control" name="ppn" id="ppn" readonly value="<?php echo 'Rp. '.number_format($key->ppn) ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Total Biaya</label>
                  <input type="text" class="form-control" id="total" name="total" readonly value="<?php echo 'Rp. '.number_format($key->total) ?>">
                </div>

                    <a href="<?php echo site_url('C_Transaksi'); ?>" class="btn btn-default">Kembali</a>
            </div>
          <?php } ?>
        <!-- /.box-body -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>