<section class="content-header">
 <h1>
  Detail Transaksi
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url('manajer/transaksi') ?>"><i class="fa fa-money"></i> <?php echo $judul ?></a></li>
  <li class="active"><?php echo $sub_judul ?></li>
</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-solid box-primary">
				<div class="box-header">
				<h2 class="box-title">Kode Transaksi	: <span id="pemesan-kode-data"><?php echo $kode_transaksi ?></span></h2>
				<br>
				<h6 class="box-title">Nama Pemesan : <?php foreach ($nama_pemesan as $row) {
            echo $row->nama_pemesan;
          } ?>
        </h6>
				<br>
				<h6 class="box-title">Tanggal Transaksi : <?php foreach ($tgl_transaksi as $row) {
          $tanggal = date("j F Y h:m:s",strtotime($row->tanggal)); 
            echo $tanggal;
          } ?>
        </h6>
  			<br>
  			<h6 class="box-title">Status : <?php foreach ($nama_pegawai as $row) {
            if($row->nama !== '-'){
              echo 'Sudah dibayar';
            }
            else{
              echo "Belum dibayar";
            }
          } ?>
        </h6>
        <br>
  			<h6 class="box-title">Nama Pegawai : <?php foreach ($nama_pegawai as $row) {
            if($row->nama !== '-'){
              echo $row->nama;
            }
            else{
              echo "-";
            }
          } ?>
        </h6>
					<div class="controls pull-right">
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>

					</div>
                </div>
                <div class="box-body">
					<table class="table table-bordered table-hover" class="display" width="100%">

						<thead>
							<tr>
                <th>Nama Makanan</th>
                <th>Harga Makanan (IDR)</th>
                <th>Kuantitas</th>
                <th>Jumlah (IDR)</th>
							</tr>
						</thead>
								<tbody>
									<?php
                    foreach ($detail_transaksi->result() as $row) {
                  ?>
                  <tr>
										<td><?php echo $row->nama_makanan ?></td>
										<td><?php echo $row->harga ?></td>
										<td><?php echo $row->jumlah ?></td>
										<td><?php echo $row->jumlah*$row->harga ?></td>
                  </tr>
									<?php
                    }
                  ?>
								</tbody>
							</table>
							<div>
							<?php foreach ($total_harga->result() as $row) {
                                        ?>
							<h2>Total Harga : Rp.<?php echo $row->total_harga;
                                    }?>

							</h2></div>
							<a href="<?php echo base_url().'manajer/transaksi' ?>"><button type="button" class="btn btn-primary ">Kembali</button></a>
							<button type="button" onclick="konfirmOpenModal()" class="btn btn-primary pull-right">Konfirmasi</button>
							<a target="_blank" href="<?php echo base_url().'manajer/transaksi/struk_pdf/'.$kode_transaksi ?>"><button type="button" class="btn btn-primary pull-right">Cetak Struk</button></a>
							</div>
							</div>
							</div>
							</div>
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
                      // window.location.href = '<?php echo base_url()?>manajer/transaksi'

                    },
                    error : function(response){
                      console.log(response);
                    }
                  })
                }

                function konfirmOpenModal(){
                  // console.log(id);
                  id = $('#pemesan-kode-data').text()
                  console.log(id);
                  $('#pemesanan-kode').text(id)
                  $('#modal-konfirmasi').modal('toggle')
                }
              </script>
