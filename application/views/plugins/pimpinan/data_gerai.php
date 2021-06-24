	<script type="text/javascript">    
        
		$(document).ready(function() {
			show_gerai();

			function show_gerai() {
				$.ajax({
					url: '<?= site_url('pimpinan/Data_Gerai/get_gerai') ?>',
					type: 'POST',
					async:false,
					success:function (data) {
	                    $('#table-daftar-gerai').html(data);
					}
				});
			}

			$('#table-daftar-gerai').on('click', '.approve-data', function() {
				var id = $(this).attr('data-id');
				var username = $(this).attr('data-username');
				var nama_gerai = $(this).attr('data-namagerai');

				noty({
	                text: 'Apakah Anda Yakin Ingin Mengaktifkan '+nama_gerai+' ?!?',
	                layout: 'topRight',
	                buttons: [{
	                        	addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
		                            $noty.close();
		                            $.ajax({
		                            	url: '<?= base_url("pimpinan/Data_Gerai/update_gerai") ?>',
		                            	type: 'GET',
		                            	dataType: 'JSON',
		                            	data:{id:id},
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

	            show_gerai();
			});

			$('#table-daftar-gerai').on('click', '.non-approve-data', function() {
				var id = $(this).attr('data-id');
				var username = $(this).attr('data-username');
				var nama_gerai = $(this).attr('data-namagerai');

				noty({
	                text: 'Apakah Anda Yakin Ingin Menonaktifkan '+nama_gerai+' ?!?',
	                layout: 'topRight',
	                buttons: [{
	                        	addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
		                            $noty.close();
		                            $.ajax({
		                            	url: '<?= base_url("pimpinan/Data_Gerai/update_gerai") ?>',
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

	            show_gerai();
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