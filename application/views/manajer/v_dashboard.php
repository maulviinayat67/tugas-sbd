<section class="content-header">
 <h1>
  Dashboard
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('Home') ?>"><i class="fa fa-dashboard"></i> <?php echo $judul ?></a></li>
  <li class="active"><?php echo $sub_judul ?></li>
</ol>
</section>

<section class="content">
  <div class="row">
   <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_pemesanan ?></h3>

        <p>Pemesanan</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>44</h3>

        <p>Pengunjung</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-people"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $jml_pegawai ?></h3>

        <p>Pegawai</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-blue">
      <div class="inner">
        <h3>44</h3>

        <p>Transaksi</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <!-- JUMLAH MEJA -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Meja Tersedia</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table class="table no-margin">
            <thead>
              <tr>
                <th>ID Meja</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($data_meja as $row) {
               ?>
               <tr>
                <td><?php echo $row->id_meja ?></td>
                <?php if($row->isTersedia == 'tersedia') 
                {?> 
                  <td><span class="label label-success"><?php echo $row->isTersedia ?></span></td>
                  <?php }
                  else { ?>
                  <td><span class="label label-danger"><?php echo $row->isTersedia ?></span></td>
                  <?php } ?>
                </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>
  </div>
</section>
</div>