
<script src="<?php echo base_url('assets/jquery/jquery-3.2.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js') ?>"></script>
<script src="<?php echo base_url('assets/dist/adminlte.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/DataTables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/DataTables/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datepicker/locales/bootstrap-datepicker.id.js')?>"></script>

<!-- <script src="<?php echo base_url('assets/dist/pages/dashboard2.js') ?>"></script> -->

<script type="text/javascript">
//filter data

	var save_method; //for save method string
	var table;
	var base_url = '<?php echo base_url();?>';

	$(document).ready(function() {

		table = $('#tabelmakanan').DataTable( {

			"language": {
				"sProcessing":   "Sedang memproses...",
				"sLengthMenu":   "Tampilkan _MENU_ data",
				"sZeroRecords":  "Tidak ditemukan data yang sesuai",
				"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
				"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 data",
				"sInfoFiltered": "(disaring dari _MAX_ data keseluruhan)",
				"sInfoPostFix":  "",
				"sSearch":       "Cari:",
				"sUrl":          "",
				"oPaginate": {
					"sFirst":    "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext":     "Selanjutnya",
					"sLast":     "Terakhir"
				}
			},
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

         // Load data for the table's content from an Ajax source
			"ajax": {
            	"url": "<?php echo site_url('manajer/makanan/get_data')?>",
            	"type": "POST"
        },

        //Set column definition initialisation properties.
                "columnDefs": [
            {
                "targets": [ 0 ] //first column
                //set not orderable
            },
            {
                "targets": [ -1 ] //last column
                //set not orderable
            },

        ],

} );

		$("#check-all").click(function(){
			$(".data-check").prop("checked",$(this).prop("checked"));
		});



		table = $('#tabelMeja').DataTable( {

			"language": {
				"sProcessing":   "Sedang memproses...",
				"sLengthMenu":   "Tampilkan _MENU_ data",
				"sZeroRecords":  "Tidak ditemukan data yang sesuai",
				"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
				"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 data",
				"sInfoFiltered": "(disaring dari _MAX_ data keseluruhan)",
				"sInfoPostFix":  "",
				"sSearch":       "Cari:",
				"sUrl":          "",
				"oPaginate": {
					"sFirst":    "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext":     "Selanjutnya",
					"sLast":     "Terakhir"
				}
			},
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

         // Load data for the table's content from an Ajax source
			"ajax": {
            	"url": "<?php echo site_url('manajer/meja/get_data')?>",
            	"type": "POST"
        },

        //Set column definition initialisation properties.
                "columnDefs": [
            {
                "targets": [ 0 ] //first column
                //set not orderable
            },
            {
                "targets": [ -1 ]//last column
                //set not orderable
            },

        ],

} );

$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#tabeltransaksi").dataTable({
                    // initComplete: function() {
                    //     var api = this.api();
                    //     $('#mytable_filter input')
                    //             .off('.DT')
                    //             .on('keyup.DT', function(e) {
                    //                 if (e.keyCode == 13) {
                    //                     api.search(this.value).draw();
                    //         }
                    //     });
                    // },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?php echo site_url('manajer/transaksi/json')?>", "type": "POST"},
                    columns: [
                        {"data": "id_pemesanan", "orderable": true},
                        {"data": "nama_pemesan", "orderable": true},
                        {"data": "tanggal", "orderable": true},
												{"data": "nama", "orderable": true},
                        {"data": "view"}
                    ],
                    order: [[1, 'asc']],
                    // rowCallback: function(row, data, iDisplayIndex) {
                    //     var info = this.fnPagingInfo();
                    //     var page = info.iPage;
                    //     var length = info.iLength;
                    //     var index = page * length + (iDisplayIndex + 1);
                    //     $('td:eq(0)', row).html(index);
                    // }
                });
            	});
</script>
</body>
</html>
