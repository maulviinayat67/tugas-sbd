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
<<<<<<< HEAD
                          <form
                              action="<?php echo base_url().'home/tanggal'?>"
                              method="post"
                              name="postform">
                              <table width="854" border="0">
                                  <tr>
                                      <label>Tanggal Awal</label>

                                      <div class="input-group date">
                                          <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control" id="datepicker1" name="tanggal_awal">
                                      </div>

                                  </tr>
                                  <tr>
                                      <label>Tanggal Akhir</label>

                                      <div class="input-group date">
                                          <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control" id="datepicker2" name="tanggal_akhir" >
                                      </div>

                                      <tr>
                                          <td width="188">
                                              <button type="submit" name="cari" class="btn btn-white btn-info btn-bold">Tampilkan Data</button>
                                          </td>
                                      </tr>

                                  </table>
                              </form>
                              <?php
                              if (empty($tgl_awal) and empty($tgl_akhir)) {
                                  ?>

                              <table id="dynamic-table" class="table no-margin">
                                <thead>
=======

                            <form
                                action="<?php echo base_url().'home/tanggal'?>"
                                method="post"
                                name="postform">
                                <table width="854" border="0">
>>>>>>> dashboard
                                    <tr>
                                        <label>Tanggal Awal</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datepicker1" name="tanggal_awal">
                                        </div>

                                    </tr>
<<<<<<< HEAD
                                </thead>
                                <?php foreach ($data_transaksi as $row) {
                                      ?>
                                <tbody>
                                <?php $tanggal = date("j F Y h:m:s", strtotime($row->tanggal)) ?>
                                    <td><?php echo $row->id_transaksi ?></td>
                                    <td><?php echo $row->nama_pemesan ?></td>
                                    <td><?php echo $tanggal; ?></td>
                                    <td><?php echo $row->nama_pegawai ?></td>

                                </tbody>
                              <?php
                                  }
                              } else {
                                  ?>
                                      <table id="dynamic-table" class="table no-margin">
                                  <thead>
                                      <tr>
                                          <th>ID Transaksi</th>
                                          <th>Nama Pemesan</th>
                                          <th>Tanggal</th>
                                          <th>Nama Pegawai</th>
                                      </tr>
                                  </thead>
                               <?php
                                  foreach ($tanggal_transaksi as $row) {
                                      ?>
                                  <tbody>
                                 <?php $tanggal = date("j F Y h:m:s", strtotime($row->tanggal)) ?>
                                      <td><?php echo $row->id_transaksi ?></td>
                                      <td><?php echo $row->nama_pemesan ?></td>
                                      <td><?php echo $tanggal; ?></td>
                                      <td><?php echo $row->nama_pegawai ?></td>
                                      </tbody>
                                  <?php
                                  }
                              }?>
                            </table>
=======
                                    <tr>
                                        <label>Tanggal Akhir</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datepicker2" name="tanggal_akhir" >
                                        </div>

                                        <tr>
                                            <td width="188">
                                                <button type="submit" name="cari" class="btn btn-white btn-info btn-bold">Tampilkan Data</button>
                                            </td>
                                        </tr>

                                    </table>
                                </form>
                                <?php 
                                if(empty($tgl_awal) AND empty($tgl_akhir))
                                { ?>

                                <table id="dynamic-table" class="table no-margin">
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
                                        <?php $tanggal = date("j F Y h:m:s",strtotime($row->tanggal)) ?>
                                        <td><?php echo $row->id_transaksi ?></td>
                                        <td><?php echo $row->nama_pemesan ?></td>
                                        <td><?php echo $tanggal;?></td>
                                        <td><?php echo $row->nama_pegawai ?></td>

                                    </tbody>
                                    <?php } }else{?>
                                        <table id="dynamic-table" class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>ID Transaksi</th>
                                            <th>Nama Pemesan</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pegawai</th>
                                        </tr>
                                    </thead>
                                 <?php 
                                    foreach($tanggal_transaksi as $row){?>
                                    <tbody>
                                   <?php $tanggal = date("j F Y h:m:s",strtotime($row->tanggal)) ?>
                                        <td><?php echo $row->id_transaksi ?></td>
                                        <td><?php echo $row->nama_pemesan ?></td>
                                        <td><?php echo $tanggal;?></td>
                                        <td><?php echo $row->nama_pegawai ?></td>
                                        </tbody>
                                    <?php }}?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
>>>>>>> dashboard
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
<<<<<<< HEAD
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive" style="display:flex;justify-content:space-between">
                          <span class="">
                            <h4>Cadangkan Database</h4>
                            <a id="db-backup" href="<?php echo base_url();?>home/backupalldb" type="button" class="btn btn-primary">Backup Database</a>
                          </span>
                          <span>
                            <h4>Pulihkan Database</h4>
                            <form id="sql-file" enctype="multipart/form-data" action="<?php echo base_url();?>home/restoredb" method="post">
                              <div class="form-group">
                                  <input type="file" accept=".sql" name="datafile" id="datafile"/>
                              </div>
                              <button id="db-restore" type="button" class="btn btn-primary disabled">Upload Database</button>
                            </form>
                          </span>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </section>

      <script src="<?php echo base_url('assets/jquery/jquery-3.2.1.min.js') ?>"></script>
      <script type="text/javascript">


      $(document).ready(function() {

        $('#db-backup').on('click', function(){
          $('#notification').modal('toggle')
          $('#notification #notification-text').text('Berhasil Dicadangkan')
        })

        $('#datafile').on('change', function(){
          hasFile = $(this).prop('file')
          if(hasFile != null){
            $('button#db-restore').addClass('disabled')
          }else{
            $('button#db-restore').removeClass('disabled')
          }
        })

        $('button#db-restore').on('click', function(){
          data = new FormData($('#sql-file')[0])
          $.ajax({
            method : 'post',
            url : 'home/restoredb',
            mimeType: "multipart/form-data",
            cache : false,
            processData : false,
            contentType : false,
            data : data,
            beforeSend : function(response){
              console.log('processing...');
              $('#notification').modal('toggle')
              $('#notification #notification-text').text('Sedang Diproses')
            }
          }).done(function(response){
            console.log(response);
            switch (response.code) {
              case 200:
                $('#notification #notification-text').text('Berhasil')
                break;
              case 500:
                $('#notification #notification-text').text('Terjadi Kesalahan')
                break;
              default:
            }

            window.location.reload()
          }).fail(function(xhr, statusTexgt, errorThrone){
            console.log(xhr);
            $('#notification').modal('toggle')
            $('#notification #notification-text').text('Gagal')
          })

        })
      })

      </script>

      <style media="screen" scoped="true">
        #notification p#notification-text{
          margin:0px;
          text-align: center;
          font-size: 1.25em;
          font-weight: bold;
        }
      </style>
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
=======
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form action="<?php echo base_url();?>home/backupdb" method="post">
                                    <!-- <div class="form-group"> <select required="" name="tabeldb"> <?php foreach
                                    ($tabel as $baris) { ?> <option value="<?php echo
                                    $baris->Tables_in_db_tugas_sbd; ?>"><?php echo $baris->Tables_in_db_tugas_sbd;
                                    ?></option> <?php } ?> </select> </div> -->
                                    <!-- <button type="submit" class="btn btn-primary">Backup Database</button> -->
                                    <a
                                        href="<?php echo base_url();?>home/backupalldb"
                                        type="button"
                                        class="btn btn-primary pull-left">Backup Semua Database</a>
                                </form>
                                <br>
                                <br>
                                <br>
                                <form
                                    enctype="multipart/form-data"
                                    action="<?php echo base_url();?>home/restoredb"
                                    method="post">
                                    <div class="form-group">
                                        <input type="file" name="datafile" id="datafile"/>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload Database</button>
                                </form>

                            </div>
                        </section>
                    </div>
>>>>>>> dashboard
