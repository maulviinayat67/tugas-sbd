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

		<script type="text/javascript">

				function reload_table()
				{
					table.ajax.reload(null,false);
				}

				function add_meja()
				{
						save_method = 'add';
						$("#form_meja")[0].reset();
						$('#id_meja').prop('disabled', false);
					// $(".form-group").removeClass('has-error');
					// $(".help-block").empty();
					// $('#makanan_modal').addClass('big-modal');
					$("#meja_modal").modal("show");
					$(".modal-title").text("Tambah Meja");
				}

				function simpan()
				{
					$('#btnSave').text('saving...'); //change button text
					$('#btnSave').attr('disabled',true); //set button disable 

					var url;
					if(save_method == 'add')
					{
						url = "<?php echo base_url('manajer/meja/ajax_add') ?>";
					}
					else
					{
						url = "<?php echo base_url('manajer/meja/ajax_update') ?>";
					}

					var formData = new FormData($('#form_meja')[0]);
					$.ajax({
						url: url,
						type: 'POST',
						dataType: 'JSON',
						data: formData,
						contentType: false,
						processData: false,
						success:function(data)
						{
							if(data.status)
							{
								console.log(data.status);
								$('#meja_modal').modal('hide');
								reload_table();

							}

							$('#btnSave').text('save'); //change button text
							$('#btnSave').attr('disabled',false); //set button

						},
						error:function(jqXHR, textStatus, errorThrown) 
						{
							alert('Error adding / update data');
							console.log(data.status);
						}
					});


				}

				function edit_meja(id)
				{
					save_method = 'update';
					$("#form_meja")[0].reset();
				// $(".form-group").removeClass('has-error');
				// $(".help-block").empty();

				$.ajax({
					url: '<?php echo base_url('manajer/meja/ajax_edit') ?>/'+id,
					type: 'POST',
					dataType: 'JSON',
					success:function(data)
					{
						
						$('[name = "id_meja"]').val(data.id_meja);
						$('#id_meja').prop('disabled', true);
						$('[name = "status"]').val(data.isTersedia);
						
						$("#meja_modal").modal("show");
						$(".modal-title").text("Edit Meja");
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error get data dari ajax');
					}
				});


				}

				function hapus_meja(id)
				{

				if(confirm('Apakah Anda yakin ingin menghapus data ini ?'))
				{
					$.ajax({
						url: '<?php echo base_url('manajer/meja/ajax_delete') ?>/'+id,
						type: 'POST',
						dataType: 'JSON',
						success:function(data)
						{
							// $('#makanan_modal').modal('hide');
							$('#myModal #hapus-notif').remove();
							reload_table();
						},
						error:function(jqXHR, textStatus, errorThrown) 
						{
							alert('Error hapus data');
						}
					});
				}

				}

				function bulk_delete()
				{
					var list_id =[];
					$(".data-check:checked").each(function(){
						list_id.push(this.value);
					});
					if(list_id.length > 0)
					{
						if(confirm('Apakah anda serius ingin menghapus '+list_id.length+' data?'))
						{
							$.ajax({
								url: '<?php echo base_url('manajer/meja/ajax_bulk_delete') ?>',
								type: 'POST',
								dataType: 'JSON',
								data: {id_meja: list_id},
								success:function(data)
								{
									if(data.status)
									{
										reload_table();
									}
									else 
									{
										alert('Failed');	
									}
								},
								error:function(jqXHR, textStatus, errorThrown) 
								{
									alert('Error hapus data');
								}


							});
							
						}
					}
					else
					{
						alert('Error hapus data');
					}
				}
		</script>

		<div class="modal fade" id="meja_modal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel" id="modal-title"></h3>
			</div>

			<div class="modal-body">
				<form action="#" id="form_meja" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" value="" name="id_meja" >
					<div class="form-body">

						<div class="form-group">
							<label class="control-label col-md-3">ID Meja</label>
							<div class="col-md-9">
								<input type="text" name="id_meja" id="id_meja" placeholder="ID Meja" class="form-control" ><span class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Status</label>
							<div class="col-md-9">
								<select name="status" id="status" class="form-control">
									<option value="">Silahkan Pilih</option>
									<option value="tersedia" name="tersedia">Tersedia</option>
									<option value="tidak tersedia" name="tidak_tersedia">Tidak Tersedia</option>
								</select>
							</div>
						</div>

					</div>
				</form>
			</div>

			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="simpan()" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>

		</div>
	</div>
</div>
        </div>