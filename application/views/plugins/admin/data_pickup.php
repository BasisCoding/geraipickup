<script type="text/javascript">
	$(document).ready(function() {
		view_pickup();
		function view_pickup(filter) {
			$.ajax({
				url: '<?= base_url('admin/Pickup/get_pickup') ?>',
				type: 'POST',
				data:{filter:filter},
				async:false,
				success:function (html) {
					$('#table-daftar-pickup').html(html);
				}
			});

			return false;
		}

		$('#filter-status').on('change', function() {
			var status = $(this).val();
			view_pickup(status);
		});
	});
</script>

<!-- START TEMPLATE -->
    <script type="text/javascript" src="<?= base_url('assets/js/settings.js') ?>"></script>
    
    <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
    <script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>

</body>
</html>