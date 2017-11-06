
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
<!-- <script src="<?php echo base_url('assets/dist/pages/dashboard2.js') ?>"></script> -->

<script type="text/javascript">
	var save_method; //for save method string
	var table;
	var base_url = '<?php echo base_url();?>';

	$(document).ready(function() {

		table = $('#tabel').DataTable( {

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
                "targets": [ 0 ], //first column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },

        ],

} );

		$("#check-all").click(function(){
			$(".data-check").prop("checked",$(this).prop("checked"));
		});

	});
</script>
</body>
</html>