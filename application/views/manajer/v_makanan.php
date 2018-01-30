<section class="content-header">
	<h1>
		Makanan & Minuman
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
					<h3 class="box-title">Tabel Makanan & Minuman</h3>
					<div class="controls pull-right">
						<button class="btn btn-success btn-sm" onclick="add_makanan()"><i class="fa fa-plus"></i> Tambah</button>
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
					<table id="tabelmakanan" class="table table-bordered table-hover" class="display" width="100%">
						<thead>
							<tr>
								<th><input type="checkbox" id="check-all"></th>
		<!-- 						<th>ID Makanan</th>
		-->
										<th>Nama Makanan/Minuman</th>
										<th>Jenis</th>
										<th>Harga (IDR)</th>
										<th>Gambar</th>
										<th style="width:150px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
					<!-- 		<?php foreach ($data_makanan as $row) {

								?>
								<tr>
									<td><input type="checkbox" class="data-check" value="<?php echo $row->id_makanan ?>"></td>
									<td><?php echo $row->id_makanan ?></td>
													<td><?php echo $row->nama ?></td>
													<td><?php echo $row->tipe ?></td>
													<td><?php echo $row->harga ?></td>
													<td><a href="javascript:void(0) " class="btn btn-primary btn-xs" onclick="edit_person(<?php echo $row->id_makanan ?>)"><span class="fa fa-pencil"></span> Edit</a>&nbsp;
										<a href="javascript:void(0)" class="btn btn-primary btn-xs" onclick="edit_person(<?php echo $row->id_makanan ?>)"><span class="fa fa-trash"></span> Hapus</a></td>
									</tr>
									<?php } ?>	 -->
								</tbody>
							</table>
						</div>
					<!-- 	<div class="overlay">
							<i class="fa fa-refresh fa-spin"></i>
						</div> -->
					</div>
				</div>
			</div>
		</section>

		<script type="text/javascript">

			function showallmakanan()
			{
				$.ajax({
					url: '<?php echo base_url('manajer/makanan/showalldata') ?>',
					type: 'POST',
					dataType: 'JSON',
					success :function(data)
					{
						var html;
						var i;
						for ( i = 0 ; i < data.length; i++)
						{
							html +='<tr>'+
							'<td><input type="checkbox" class="data-check" value="'+data.id_makanan+'"></td>'+
							'<td>'+data[i].id_makanan+'</td>'+
							'<td>'+data[i].nama+'</td>'+
							'<td>'+data[i].tipe+'</td>'+
							'<td>'+data[i].harga+'</td>'+
							'<td><img src='+base_url()+'assets/gambar/'+$data[i].gambar+ '</td>'+
							'<td>'+
							'<a href="javascript:void(0) " class="btn btn-primary btn-xs" "><span class="fa fa-pencil"> </span> Edit</a>'+
							'<a href="javascript:void(0) " class="btn btn-primary btn-xs" "><span class="fa fa-trash"> </span> Hapus</a>'+
							'</td>'+
							'</tr>';
						}
						$('#showdata').html(html);
					},
					error:function()
					{
						alert('error data tidak ada');
					}
				});

			}

function add_makanan()
{
	save_method = 'add';
	$("#form_makanan")[0].reset();
	$('#id_makanan').prop('disabled', false);
  // $(".form-group").removeClass('has-error');
  // $(".help-block").empty();
  // $('#makanan_modal').addClass('big-modal');
  $("#makanan_modal").modal("show");
  $(".modal-title").text("Tambah Makanan");
}

function edit_makanan(id)
{
	save_method = 'update';
	$("#form_makanan")[0].reset();
  // $(".form-group").removeClass('has-error');
  // $(".help-block").empty();

  $.ajax({
  	url: '<?php echo base_url('manajer/makanan/ajax_edit') ?>/'+id,
  	type: 'POST',
  	dataType: 'JSON',
  	success:function(data)
  	{
  		dataGambar = "<?php echo base_url() ; ?>/assets/gambar/"+data.gambar;
  		$('[name = "id_makanan"]').val(data.id_makanan);
  		$('#id_makanan').prop('disabled', true);
  		$('[name = "nama_makanan"]').val(data.nama);
  		$('[name = "jenis_makanan"]').val(data.tipe);
  		$('[name = "harga_makanan"]').val(data.harga);
  	 	// $('[name = "gambar_makanan"]').change(function(e){
     //        var fileName = e.target.files[0].name;
     //       $('#gambar_makanan').text(fileName);
     //         });

  		document.getElementById('gambarMakanan').src = "<?php echo base_url(); ?>/assets/gambar/" + data.gambar;


  		$("#makanan_modal").modal("show");
  		$(".modal-title").text("Edit Makanan");
  	},
  	error: function (jqXHR, textStatus, errorThrown)
  	{
  		alert('Error get data dari ajax');
  	}
  });


}

function hapus_makanan(id)
{

	// $('#makanan_modal form').hide();
 //    $('#makanan_modal .modal-header #myModalLabel').text('Hapus Artikel');
 //    $('#makanan_modal .modal-footer #btnSave').text('Hapus!!!');
 //    $('#myModal #form-artikel').attr('action','hapus');
 //    $('#makanan_modal .modal-body').prepend('<p id="hapus-notif">Apakah Anda yakin akan menghapus data ini?</p>');
 //     $('#makanan_modal').modal('show');
 if(confirm('Apakah Anda yakin ingin menghapus data ini ?'))
 {
 	$.ajax({
 		url: '<?php echo base_url('manajer/makanan/ajax_delete') ?>/'+id,
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
				url: '<?php echo base_url('manajer/makanan/ajax_bulk_delete') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {id_makanan: list_id},
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

function reload_table()
{
	table.ajax.reload(null,false);
}

function simpan()
{
		$('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable

    var url;
    if(save_method == 'add')
    {
    	url = "<?php echo base_url('manajer/makanan/ajax_add') ?>";
    }
    else
    {
    	url = "<?php echo base_url('manajer/makanan/ajax_update') ?>";
    }

		var formData

		console.log($('#gambar_makanan'));
		console.log($('#gambar_makanan')[0].files);

		gambar = $('#gambar_makanan')[0].files;
		if (gambar) {
			formData= new FormData($('#form_makanan')[0]);
		}
		else{
			formData = new FormData()
			formData.append('id_makanan',$('input#id_makanan').val())
			formData.append('id_makanan',$('input#nama_makanan').val())
			formData.append('id_makanan',$('input#jenis_makanan').val())
			formData.append('id_makanan',$('input#harga_makanan').val())
		}

    $.ajax({
    	url: url,
    	type: 'POST',
    	dataType: 'JSON',
    	data: formData,
    	contentType: false,
    	processData: false,
    	success:function(response)
    	{

  			console.log(response);
  			$('#makanan_modal').modal('hide');
  			reload_table();

    		$('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled',false); //set button

        window.location.reload()

      }
    }).fail(function(xhr, text, errorThrown){
      	alert('Error adding / update data')
				$('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled',false); //set button
      	console.log(text);
		});


}
</script>

<!-- Modal -->
<div class="modal fade" id="makanan_modal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel" id="modal-title"></h3>
			</div>

			<div class="modal-body">
				<form action="#" id="form_makanan" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" value="" name="id_makanan" >
					<div class="form-body">

						<div class="form-group">
							<label class="control-label col-md-3">ID Makanan</label>
							<div class="col-md-9">
								<input type="text" name="id_makanan" id="id_makanan" placeholder="ID Makanan" class="form-control" ><span class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Nama Makanan/Minuman</label>
							<div class="col-md-9">
								<input type="text" name="nama_makanan" id="nama_makanan" placeholder="Nama Makanan/Minuman" class="form-control"><span class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Jenis</label>
							<div class="col-md-9">
								<select name="jenis_makanan" id="jenis_makanan" class="form-control">
									<option value="">Silahkan Pilih</option>
									<option value="makanan" name="makanan">Makanan</option>
									<option value="minuman" name="minuman">Minuman</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Harga</label>
							<div class="col-md-9">
								<input type="text" name="harga_makanan" id="harga_makanan" placeholder="Harga Makanan" class="form-control"><span class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label id="imgGambarMakanan" class="control-label col-md-3" >Gambar</label>
							<div class="col-md-9">
								<img src="" alt="" id="gambarMakanan" width="100">
								<input type="file" title="Pilih Gambar" name="gambar_makanan" id="gambar_makanan"  class="form-control" value=""  accept="image/*">
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
