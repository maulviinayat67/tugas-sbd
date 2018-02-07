<section class="content-header">
 <h1>
  Transaksi
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('Home') ?>"><i class="fa fa-dashboard"></i> <?php echo $judul ?></a></li>
  <li class="active"><?php echo $sub_judul ?></li>
</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid box-primary">
				<div class="box-header">
					<h3 class="box-title" id="konfirmasi-modal-on">Tabel Transaksi</h3>
					<div class="controls pull-right">
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>

					</div>
				</div>
				<div class="box-body">
					<table id="tabeltransaksi" class="table table-bordered table-hover" class="display" width="100%">
						<thead>
							<tr>
								<!-- <th><input type="checkbox" id="check-all"></th> -->
		<!-- 						<th>ID Makanan</th>
		-->								<th>ID Transaksi</th>
										<th>Nama Pemesan</th>
										<th>Tanggal</th>
										<th>Nama Pegawai</th>

										<th style="width:150px;">Aksi</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>


					</div>
				</div>
			</div>
		</section>

</div>

<!-- Modal -->
<div class="modal fade" id="modal-konfirmasi" role="dialog">
	<div class="modal-dialog" >
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Konfirmasi Pembayaran</h3>
			</div>

			<div class="modal-body">
				Konfirmasi pemesanan no. <span id="pemesanan-kode"></span>
			</div>

			<div class="modal-footer">
				<button type="button" onclick="konfirm(<?php echo "'".$id_pegawai."'" ?>)" class="btn btn-primary">Konfirmasi</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">

  function konfirm(id_pegawai){
    table = $('tabeltransaksi')

    id = $('#pemesanan-kode').text()
    $.ajax({
      method:'post',
      url:'<?php echo base_url()?>api/v1/konfirmasi',
      dataType:'JSON',
      data : {
        id_pegawai : id_pegawai,
        id_pemesan : id
      },
      success : function(response){
        console.log(response);
        $('#modal-konfirmasi').modal('toggle')
        window.location.reload()

        // table.ajax.reload(null,false);

      },
      error : function(response){
        console.log(response);
      }
    })
  }

  function konfirmOpenModal(id){
    console.log(id);
    $('#pemesanan-kode').text(id)
    $('#modal-konfirmasi').modal('toggle')
  }
</script>
