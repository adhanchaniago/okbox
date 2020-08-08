<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Transaksi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_Transaksi'); ?>">Data Transaksi</a></li>
        <li class="active">Data Transaksi</li>
      </ol>
    </section>
    <div class="box-body">
       <?php echo $this->session->flashdata('notif') ?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?php echo site_url('C_Transaksi/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>No Resi</th>
                  <th>Nama Pengirim</th>
                  <th>Asal</th>
                  <th>Tujuan</th>
                  <th>jenis barang</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($transaksi as $transaksi) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($transaksi->tgl_transaksi)); ?></td>
                  <td><?php echo $transaksi->noresi; ?></td>
                  <td><?php echo $transaksi->namapengirim; ?></td>
                  <td><?php echo $transaksi->asal; ?></td>
                  <td><?php echo $transaksi->tujuan; ?></td>
                  <td><?php echo $transaksi->jenisbarang; ?></td>
                  <td><?php echo 'Rp. '.number_format($transaksi->total); ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_Transaksi/view/'.$transaksi->id_transaksi); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_Transaksi/view/'.$transaksi->id_transaksi); ?>"><button type="button" class="btn btn-info">Cetak</button></a>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>