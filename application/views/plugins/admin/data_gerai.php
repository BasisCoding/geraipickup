	<script type="text/javascript">
		$(document).ready(function() {
			show_gerai();

			function show_gerai() {
				$.ajax({
					url: '<?= site_url('admin/Data_Gerai/get_gerai') ?>',
					type: 'POST',
					async:false,
					success:function (data) {
	                    $('#table-daftar-gerai').html(data);
					}
				});
			}
		});
	</script>

	<!-- START TEMPLATE -->
        <script type="text/javascript" src="<?= base_url('assets/js/settings.js') ?>"></script>
        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
        <script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>
        
    <!-- END SCRIPTS -->    

</body>
</html>