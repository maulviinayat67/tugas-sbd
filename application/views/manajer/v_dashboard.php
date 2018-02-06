<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo base_url('Home') ?>">
                <i class="fa fa-dashboard"></i>
                <?php echo $judul ?></a>
        </li>
        <li class="active"><?php echo $sub_judul ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
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
                    <a href="<?php echo base_url().'manajer/transaksi'?>" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $jml_meja ?></h3>

                        <p>Meja</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-soup-can-outline"></i>
                    </div>
                    <a href="<?php echo base_url().'manajer/meja'?>" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
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
                    <a href="#" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $jml_makanan ?></h3>

                        <p>Makanan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-spoon"></i>
                    </div>
                    <a href="<?php echo base_url().'manajer/makanan'?>" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="row">
            <div class="col-lg-6">
                <!-- JUMLAH MEJA -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Laporan Transaksi</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Nama Pemesan</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pegawai</th>
                                    </tr>
                                </thead>
                                <?php foreach($data_transaksi as $row)
                                    { ?>
                                <tbody>
                                    <td><?php echo $row->id_transaksi ?></td>
                                    <td><?php echo $row->nama_pemesan ?></td>
                                    <td><?php echo $row->tanggal ?></td>
                                    <td><?php echo $row->nama_pegawai ?></td>

                                </tbody>
                                <?php }?>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a
                            href="<?php echo base_url().'home/export'?>"
                            class="btn btn-sm btn-info btn-flat pull-left">Download</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
            <div class="col-lg-6">
                <!-- JUMLAH MEJA -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Manajemen Database</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive" style="display:flex;justify-content:space-between">
                          <span class="">
                            <h4>Cadangkan Database</h4>
                            <a href="<?php echo base_url();?>home/backupalldb" type="button" class="btn btn-primary">Backup Database</a>
                          </span>
                          <span>
                            <h4>Pulihkan Database</h4>
                            <form enctype="multipart/form-data" action="<?php echo base_url();?>home/restoredb" method="post">
                              <div class="form-group">
                                  <input type="file" accept=".sql" name="datafile" id="datafile"/>
                              </div>
                              <button type="submit" class="btn btn-primary">Upload Database</button>
                            </form>
                          </span>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </section>

      <!-- Modal -->
      <div id="notification" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Pemberitahuan</h4>
            </div>
            <div class="modal-body">
              <p id="notification-text"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
