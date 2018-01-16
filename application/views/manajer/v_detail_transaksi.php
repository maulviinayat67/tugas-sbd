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
				<h2 class="box-title">Kode Transaksi	: 	<?php echo $kode_transaksi ?></h2>
				<br>
				<h6 class="box-title">Nama Pemesan : <?php foreach ($nama_pemesan as $row) {
            echo $row->nama_pemesan;
          } ?>
        </h6>
				<br>
				<h6 class="box-title">Tanggal Transaksi : <?php foreach ($tgl_transaksi as $row) {
            echo $row->tanggal;
          } ?>
        </h6>
  			<br>
  			<h6 class="box-title">Nama Pegawai : <?php foreach ($nama_pegawai as $row) {
            if($row->nama !== '-'){
              echo $row->nama;
            }
            else{
              echo "Belum dibayar";
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
                <th>Jumlah</th>
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
							<a href="<?php echo base_url().'manajer/transaksi/struk_pdf/'.$kode_transaksi ?>"><button type="button" class="btn btn-primary pull-right">Cetak Struk</button></a>
							</div>
							</div>
							</div>
							</div>
							</div>
