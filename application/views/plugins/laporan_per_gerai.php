	<script type="text/javascript">    
        var start_date;
        var end_date;
		$(document).ready(function() {
			show_data(start_date, end_date);

			function show_data(start_date, end_date) {
				$.ajax({
					url: '<?= site_url('Laporan/get_laporan_gerai') ?>',
					type: 'GET',
					data:{start_date:start_date, end_date:end_date},
					async:false,
					success:function (data) {
	                    $('#table-data-laporan').html(data);
					}
				});
			}

			$('#btn-filter').click(function() {
				start_date = $('[name="start_date"]').val();
				end_date = $('[name="end_date"]').val();

				show_data(start_date, end_date);

				return false;
			});

		});
	</script>

	<!-- START TEMPLATE -->
        <script type="text/javascript" src="<?= base_url('assets/js/settings.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js//plugins/tableexport/tableExport.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js//plugins/tableexport/jquery.base64.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js//plugins/tableexport/html2canvas.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js//plugins/tableexport/jspdf/libs/sprintf.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js//plugins/tableexport/jspdf/jspdf.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js//plugins/tableexport/jspdf/libs/base64.js') ?>"></script>        
        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
        <script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>
        
    <!-- END SCRIPTS -->
</body>
</html>