 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Harga
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i>Data Master</a></li>
        <li><a href="<?php echo site_url('C_Harga'); ?>">Data Harga</a></li>
        <li class="active">Edit Data Harga</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Harga</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_Harga')?>">
              <div class="box-body">
                <?php foreach ($harga as $harga) {?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tujuan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?php echo $harga->tujuan; ?>" readonly>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $harga->id_harga; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Code</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="code" name="code" value="<?php echo $harga->code; ?>"readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="harga" name="harga" value="<?php echo number_format($harga->harga); ?>"readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Min. Kg</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="kg" name="kg" value="<?php echo number_format($harga->kg); ?>" onkeypress="return Angkasaja(event)"readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">T-L</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tl" name="tl" value="<?php echo $harga->tl; ?>"readonly>
                  </div>
                </div>
               <?php } ?>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-default">Cancel</button>
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>