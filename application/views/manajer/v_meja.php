<section class="content-header">
	<h1>
	Daftar Meja
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url('Home') ?>"><i class="fa fa-dashboard"></i> <?php echo $judul ?></a></li>
		<li class="active"><?php echo $sub_judul ?></li>
	</ol>
</section>

<section class="content">
<div class="col-xs-12">
<div class="row">
  <div class="col-lg-6">
			<div class="box box-solid box-primary">
				<div class="box-header">
					<h3 class="box-title">Tabel Daftar Meja</h3>
					<div class="controls pull-right">
						<button class="btn btn-success btn-sm" onclick="add_meja()"><i class="fa fa-plus"></i> Tambah</button>
						<button class="btn btn-default btn-sm" onclick="reload_table()"><i class="fa fa-refresh"></i> Reload</button>
						<button class="btn btn-danger btn-sm" onclick="bulk_delete()"><i class="fa fa-trash"></i> Bulk Delete</button>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>

					</div>
				</div>
				<div class="box-body">
					<table id="tabelMeja" class="table table-bordered table-hover" class="display" width="100%">
						<thead>
							<tr>
								<th><input type="checkbox" id="check-all"></th>
                    					<th>ID Meja </th>
										<th>Status</th>
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
            </div>
		</section>
        </div>