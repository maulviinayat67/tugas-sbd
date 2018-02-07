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
                            <div style="margin-bottom:8px;" class="row">
                              <div class="col-md-6">
                                <label>Tanggal Awal</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control date-range" id="datepicker1" name="tanggal_awal">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label>Tanggal Akhir</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control date-range" id="datepicker2" name="tanggal_akhir" >
                                </div>
                              </div>
                            </div>
                              <table id="dynamic-table" class="table no-margin">
                                <thead>
                                  <tr>
                                    <th>ID Transaksi</th>
                                    <th>Nama Pemesan</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pegawai</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <button id="download-laporan" class="btn btn-sm btn-info btn-flat pull-left">Download</button>
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

      <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
      <script src="<?php echo base_url('assets/plugins/datepicker/locales/bootstrap-datepicker.id.js')?>"></script>

      <script type="text/javascript">
      $(document).ready(function() {


        reportTable = $('#dynamic-table').DataTable({
          ajax : {
            url : 'home/export_',
            dataSrc : 'transaksi'
          },
          columns : [
            {data:'id_transaksi'},
            {data:'nama_pemesan'},
            {data:'tanggal'},
            {data:'nama_pegawai'}
          ]
        })

        $('#datepicker1').datepicker({
          language: 'id'
        })
        $('#datepicker1').datepicker('setDate','01/01/2018')
        // $('#datepicker1').val('01/01/2018')

        $('#datepicker2').datepicker({
          language: 'id'
        })
        $('#datepicker2').datepicker('setDate',new Date())

        $.fn.dataTable.ext.search.push(
          function( settings, data, dataIndex ) {
            var min  = new Date($('#datepicker1').val());
            var max  = new Date($('#datepicker2').val());
            var createdAt = data[2] || 0; // Our date column in the table

            if  (( min == "" || max == "" )||( Date.parse(createdAt) >= min&& Date.parse(createdAt) <= max))
            {
                return true;
            }
            return false;
          }
        );

        $('.date-range').on('change',function(){
          reportTable.draw()
          console.log(reportTable.data().toArray());
        })

        $('button#download-laporan').on('click', function(){
          $.ajax({
            url:'home/export',
            method:'post',
            xhrFields: {
              responseType: 'blob'
            },
            data:reportTable.data().toArray()
          }).done(function(response){
            console.log(response);
            var a = document.createElement('a');
            // file = []
            // file.push(response)
            var url = (window.URL ? URL : webkitURL).createObjectURL(response);
            a.href = url;
            a.download = 'Data Transaksi.xlsx';
            a.click();
            URL.revokeObjectURL(url);
          }).fail(function(xhr, text, thrown){
            console.log(xhr);
          })
        })

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
