n <div class="content-wrapper">
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
            <form method="POST" action="<?php echo site_url('C_Transaksi/tambah')?>">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pengirim</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Pengirim</label>
                <input type="text" class="form-control" id="namapengirim" name="namapengirim" placeholder="Nama Pengirim">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">NIK</label>
                <input type="text" class="form-control" name="nikpengirim" id="nikpengirim" placeholder="NIK" onkeypress="return Angkasaja(event)">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <textarea class="form-control" name="alamatpengirim" id="alamatpengirim"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tlp. Pengirim</label>
                <input type="text" class="form-control" id="tlppengirim" name="tlppengirim" placeholder="Tlp. Pengirim" onkeypress="return Angkasaja(event)">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email Pengirim</label>
                <input type="email" class="form-control" id="emailpengirim" name="emailpengirim" placeholder="Email Pengirim">
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
                  <input type="text" class="form-control" id="namapenerima" name="namapenerima" placeholder="Nama Penerima">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK</label>
                  <input type="text" class="form-control" name="nikpenerima" id="nikpenerima" placeholder="NIK" onkeypress="return Angkasaja(event)">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea class="form-control" name="alamatpenerima" id="alamatpenerima"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tlp. Penerima</label>
                  <input type="text" class="form-control" id="tlppenerima" name="tlppenerima" placeholder="Tlp. Penerima" onkeypress="return Angkasaja(event)">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email Penerima</label>
                  <input type="email" class="form-control" id="emailpenerima" name="emailpenerima" placeholder="Email Penerima">
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
                  <input type="text" class="form-control" id="noresi" name="noresi" onkeyup="cek_resi()"placeholder="No Resi">
                 <span id='pesan_resi'></span>
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
                  <select name="jeniskiriman" id="jeniskiriman" class="form-control">
                    <option value="paket">Paket</option>
                    <option value="dokumen">Dokumen</option>                    
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Layanan</label>
                  <select name="jenismuatan" id="jenismuatan" class="form-control">
                    <?php foreach ($jenismuatan as $jenismuatan) { ?>
                      <option value="<?php echo $jenismuatan->id_jenismuatan ?>"><?php echo $jenismuatan->jenismuatan ?></option>
                    <?php } ?>                   
                  </select>
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
                  <input type="text" class="form-control" id="jenisbarang" name="jenisbarang" placeholder="Jenis Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Barang</label>
                  <input type="text" class="form-control" id="jumlahbarang" name="jumlahbarang" placeholder="Jumlah Barang" onkeypress="return Angkasaja(event)">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Berat</label>
                  <input type="text" class="form-control" id="berat" name="berat" placeholder="berat" onchange="startCalculatetotal();" onblur="stopCalctotal();" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Berat Volume</label>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-xs-2">
                          <label for="exampleInputPassword1">panjang</label>
                          <input type="text" class="form-control" value="1" id='panjang' onchange="Calculate();" onkeypress="return Angkasaja(event)">
                        </div>
                        <div class="col-xs-2">
                          <label for="exampleInputPassword1">lebar</label>
                          <input type="text" class="form-control"value="1" id='lebar' onchange="Calculate();" onkeypress="return Angkasaja(event)">
                        </div>
                        <div class="col-xs-2">
                          <label for="exampleInputPassword1">tinggi</label>
                          <input type="text" class="form-control" value="1" id='tinggi' onchange ="Calculate();" onkeypress="return Angkasaja(event)">
                        </div>
                        <div class="col-xs-5">
                          <label for="exampleInputPassword1">volume</label>
                          <input type="text" class="form-control" readonly id="volume" name="volume" value="1">
                        </div>
                      </div>
                    </div>
                  </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Keterangan</label>
                  <textarea class="form-control" name="ket" id="ket"></textarea>
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
                  <input type="text" class="form-control" id="hargakg" name="hargakg" readonly>
                  <input type="text" class="form-control" id="min" name="min" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Biaya Kirim</label>
                  <input type="text" class="form-control" id="biayakirim" name="biayakirim" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Biaya Packing</label>
                  <input type="text" class="form-control" id="biayapacking" name="biayapacking" placeholder="Biaya Packing" onchange="starttotal();" onblur="stoptotal();" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Asuransi</label>
                  <input type="text" class="form-control" id="asuransi" name="asuransi" placeholder="Asuransi" onchange="starttotal();" onblur="stoptotal();" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">PPN 1%</label>
                  
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" name="cekppn" id="cekppn" onchange="Calculatetot();">
                        </span>
                    <input type="text" class="form-control" name="ppn" id="ppn" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Total Biaya</label>
                  <input type="text" class="form-control" id="total" name="total" readonly>
                </div>

                    <input type="submit" class="btn btn-primary" id="submit">
            </div>
</form>
        <!-- /.box-body -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>