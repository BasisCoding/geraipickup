		<script type="text/javascript">
			$(document).ready(function() {
				get_value();
				function get_value() {
					$.ajax({
						url: '<?= base_url("Dashboard/get_dashboard") ?>',
						type: 'GET',
						dataType: 'JSON',
						success:function (data) {
							$('#belum-pickup').html(data.belum_pickup);
							$('#proses-pickup').html(data.proses_pickup);
							$('#validasi-gerai').html(data.validasi_gerai);
							$('#selesai-pickup').html(data.selesai_pickup);
							$('#total-kurir').html(data.total_kurir);
							$('#total-gerai').html(data.total_gerai);
							$('#total-pickup').html(data.total_pickup);
						}
					});
					
					return false;
				}
			});
		</script>

		<script type="text/javascript" src="<?= base_url('assets/js/settings.js') ?>"></script>
        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
        <script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>
        
    <!-- END SCRIPTS -->
</body>
</html>