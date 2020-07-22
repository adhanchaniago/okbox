<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Harga
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_Harga'); ?>">Data Harga</a></li>
        <li class="active">Data Harga</li>
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
              <a href="<?php echo site_url('C_Harga/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
              <a href="<?php echo site_url('C_Harga/import'); ?>"><button type="button" class="btn btn-primary" >Import Data</button></a>
              <a href="<?php echo site_url('C_Harga/download'); ?>"><button type="button" class="btn btn-danger" >Download Format</button></a>
            <!--   <div class="container" style="margin-top: 100px">
                  <div class="row">
                      <div class="col-md-8 offset-2">
                        <form method="POST" id="import_form" action="<?php echo site_url('C_Harga/upload')?>" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputEmail1">UNGGAH FILE EXCEL</label>
                              <input type="file" name="file" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">UPLOAD</button>
                          </form>
                      </div>
                  </div>
              </div> -->
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Aktif</th>
                  <th>Tujuan</th>
                  <th>Code</th>
                  <th>Harga</th>
                  <th>Min. Kg</th>
                  <th>TL</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($harga as $harga) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($harga->tglaktif)); ?></td>
                  <td><?php echo $harga->tujuan; ?></td>
                  <td><?php echo $harga->code; ?></td>
                  <td><?php echo 'Rp. '.number_format($harga->harga); ?></td>
                  <td><?php echo $harga->kg; ?></td>
                  <td><?php echo $harga->tl; ?></td>
                  <td><?php echo $harga->status; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_Harga/view/'.$harga->id_harga); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_Harga/edit/'.$harga->id_harga); ?>"><button type="button" class="btn btn-info">Edit</button></a>
                      <a href="<?php echo site_url('C_Harga/hapus/'.$harga->id_harga); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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