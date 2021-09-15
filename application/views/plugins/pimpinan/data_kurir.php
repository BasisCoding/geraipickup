	<script type="text/javascript">    
        
		$(document).ready(function() {
			show_kurir();

			function show_kurir() {
				$.ajax({
					url: '<?= site_url('pimpinan/Data_Kurir/get_kurir') ?>',
					type: 'POST',
					async:false,
					success:function (data) {
	                    $('#table-daftar-kurir').html(data);
					}
				});
			}

			$('#table-daftar-kurir').on('click', '.approve-data', function() {
				var id = $(this).attr('data-id');
				var username = $(this).attr('data-username');
				var nama_kurir = $(this).attr('data-nama');

				noty({
	                text: 'Apakah Anda Yakin Ingin Mengaktifkan '+nama_kurir+' ?!?',
	                layout: 'topRight',
	                buttons: [{
	                        	addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
		                            $noty.close();
		                            $.ajax({
		                            	url: '<?= base_url("pimpinan/Data_Kurir/update_kurir") ?>',
		                            	type: 'GET',
		                            	dataType: 'JSON',
		                            	data:{username:username},
		                            	success:function (response) {
		                            		if (response.status = 'Success') {
		                            			noty({text: response.message, layout: 'topRight', type: 'success'});
		                            		}else{
		                            			noty({text: response.message, layout: 'topRight', type: 'error'});
		                            		}

		                            		setTimeout(function(){ 
				                              window.location.reload();
				                            }, 1000);
		                            	}
		                            });
	                        	}
	                        },{
	                        	addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function($noty) {
	                            $noty.close();
	                            }
	                        }
	                    ]
	            });

	            show_kurir();
			});

			$('#table-daftar-kurir').on('click', '.non-approve-data', function() {
				var id = $(this).attr('data-id');
				var username = $(this).attr('data-username');
				var nama_kurir = $(this).attr('data-nama');

				noty({
	                text: 'Apakah Anda Yakin Ingin Menonaktifkan '+nama_kurir+' ?!?',
	                layout: 'topRight',
	                buttons: [{
	                        	addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
		                            $noty.close();
		                            $.ajax({
		                            	url: '<?= base_url("pimpinan/Data_Kurir/update_kurir") ?>',
		                            	type: 'GET',
		                            	dataType: 'JSON',
		                            	data:{username:username},
		                            	success:function (response) {
		                            		if (response.status = 'Success') {
		                            			noty({text: response.message, layout: 'topRight', type: 'success'});
		                            		}else{
		                            			noty({text: response.message, layout: 'topRight', type: 'error'});
		                            		}

		                            		setTimeout(function(){ 
				                              window.location.reload();
				                            }, 1000);
		                            	}
		                            });
	                        	}
	                        },{
	                        	addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function($noty) {
	                            $noty.close();
	                            }
	                        }
	                    ]
	            });

	            show_kurir();
			});
		});
	</script>

	<!-- START TEMPLATE -->
        <script type="text/javascript" src="<?= base_url('assets/js/settings.js') ?>"></script>
        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
        <script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>
        
    <!-- END SCRIPTS -->
</body>
</html>