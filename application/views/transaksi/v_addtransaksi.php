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
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pengirim</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pengirim</label>
                  <input type="text" class="form-control" id="namapengirim" name="namapengirim" placeholder="Nama Pengirim">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK</label>
                  <input type="text" class="form-control" id="nikpengirim" id="nikpengirim" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea class="form-control" name="alamatpengirim" id="alamatpengirim"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tlp. Pengirim</label>
                  <input type="text" class="form-control" id="tlppengirim" name="tlppengirim" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email Pengirim</label>
                  <input type="text" class="form-control" id="emailpengirim" name="emailpengirim" placeholder="Password">
                </div>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Tujuan Pengiriman</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">No Resi</label>
                  <input type="text" class="form-control" id="noresi" name="noresi" placeholder="No Resi">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Asal</label>
                  <select name="asal" id="asal" class="form-control">
                    <?php foreach ($asal as $asal) { ?>
                      <option value="<?php echo $asal->tujuan ?>"><?php echo $asal->tujuan ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tujuan</label>
                  <select name="tujuan" id="tujuan" class="form-control">
                    <option>--Tujuan--</option>
                    <?php foreach ($harga as $harga) { ?>
                      <option value="<?php echo $harga->id_harga ?>"><?php echo $harga->tujuan ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Kiriman</label>
                  <select name="tujuan" id="tujuan" class="form-control">
                    <option value="paket">Paket</option>
                    <option value="dokumen">Dokumen</option>                    
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Layanan</label>
                  <select name="tujuan" id="tujuan" class="form-control">
                    <option value="darat">Darat</option>
                    <option value="laut">Laut</option> 
                    <option value="udara">Udara</option>                      
                  </select>
                </div>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->

          <!-- Input addon -->
          
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penerima</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Penerima</label>
                  <input type="text" class="form-control" id="namapenerima" name="namapenerima" placeholder="Nama Penerima">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK</label>
                  <input type="text" class="form-control" id="nikpenerima" id="nikpenerima" placeholder="NIK">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea class="form-control" name="alamatpenerima" id="alamatpenerima"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tlp. Penerima</label>
                  <input type="text" class="form-control" id="tlppenerima" name="tlppenerima" placeholder="Tlp. Penerima">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email Penerima</label>
                  <input type="text" class="form-control" id="emailpenerima" name="emailpenerima" placeholder="Email Penerima">
                </div>
            <!-- /.box-body -->
          </div>
        </div>
          <!-- /.box -->

          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Rincian Barang</h3>
              <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Barang</label>
                  <input type="text" class="form-control" id="jenisbarang" name="jenisbarang" placeholder="Jenis Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Barang</label>
                  <input type="text" class="form-control" id="jumlahbarang" name="jumlahbarang" placeholder="Jumlah Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Berat</label>
                  <input type="text" class="form-control" id="berat" name="berat" placeholder="berat" onchange="Calculatetotal();">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Berat Volume</label>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-xs-2">
                          <label for="exampleInputPassword1">panjang</label>
                          <input type="text" class="form-control" value="1" id='panjang' onfocus="Calculate();">
                        </div>
                        <div class="col-xs-2">
                          <label for="exampleInputPassword1">lebar</label>
                          <input type="text" class="form-control"value="1" id='lebar' onfocus="Calculate();">
                        </div>
                        <div class="col-xs-2">
                          <label for="exampleInputPassword1">tinggi</label>
                          <input type="text" class="form-control" value="1" id='tinggi' onfocus="Calculate();">
                        </div>
                        <div class="col-xs-5">
                          <label for="exampleInputPassword1">volume</label>
                          <input type="text" class="form-control" readonly id="volume" name="volume">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- general form elements disabled -->
          <!-- /.box -->
        </div>
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
                  <input type="text" class="form-control" id="harga" name="harga" readonly>
                  <input type="text" class="form-control" id="min" name="min" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Biaya Kirim</label>
                  <input type="text" class="form-control" id="biayakirim" name="biayakirim" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Biaya Packing</label>
                  <input type="text" class="form-control" id="biayapacking" name="biayapacking" placeholder="Biaya Packing" onchange="Calculatetot();">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Asuransi</label>
                  <input type="text" class="form-control" id="asuransi" name="asuransi" placeholder="Asuransi" onchange="Calculatetot();">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">PPN 1%</label>
                  
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" name="cekppn" id="cekppn" >
                        </span>
                    <input type="text" class="form-control" name="ppn" id="ppn" disabled="disabled">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Total Biaya</label>
                  <input type="text" class="form-control" id="total" name="total" readonly>
                </div>
            </div>
        <!-- /.box-body -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>