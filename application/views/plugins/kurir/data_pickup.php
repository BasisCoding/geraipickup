	<script type="text/javascript">
		$(function() {
			view_pickup();
			function view_pickup() {
				$.ajax({
					url: '<?= base_url('kurir/Data_Pickup/get_pickup') ?>',
					type: 'POST',
					async:false,
					success:function (html) {
						$('#table-daftar-pickup').html(html);
					}
				});
			}

			$('#table-daftar-pickup').on('click', '.siap_pickup', function() {
				var kode_pickup = $(this).attr('data-kode');
				var nama_gerai = $(this).attr('data-nama');

				$('[name="kode_pickup"]').val(kode_pickup);
				$('[name="nama_gerai"]').val(nama_gerai);
				$('#modal_pickup').modal('show');
			});

			$('#btn-pickup').on('click', function() {
				var data = $('#form-pickup').serialize();
				$.ajax({
					url: '<?= base_url('kurir/Data_Pickup/siap_pickup') ?>',
					type: 'GET',
					dataType: 'JSON',
					data:data,
					beforeSend: function()
                    { 
                        $("#btn-save-pickup").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
                        $("#btn-save-pickup").attr('disabled', true);
                    },
					success:function(response) {
		                $('#modal_pickup').modal('hide');
	                	$('.response-status').html(response.status);
	                	$('.response-message').html(response.message);
		               
		                if (response.status == 'Success') {
		                    $('.message-box-success').addClass('open');
		                    playAudio('alert');
		                    $('#form-pickup')[0].reset();
                        	$("#btn-pickup").html('Save');

		                }else{
		                    $('.message-box-error').addClass('open');
                        	$("#btn-pickup").html('Save');
                        	
		                    playAudio('fail');
		                }
                        $("#btn-pickup").attr('disabled', false);
		                
		                view_pickup();
		            }
				});
				
			});

			$('#table-daftar-pickup').on('click', '.selesai_pickup', function() {
				var kode_pickup = $(this).attr('data-kode');
				var nama_gerai = $(this).attr('data-nama');

				noty({
	                text: 'Apakah Anda Sudah Pickup Gerai '+nama_gerai+' ?!?',
	                layout: 'topRight',
	                buttons: [{
	                        	addClass: 'btn btn-success btn-clean', text: 'Sudah', onClick: function($noty) {
		                            $noty.close();
		                            $.ajax({
		                            	url: '<?= base_url("kurir/Data_Pickup/selesai_pickup") ?>',
		                            	type: 'GET',
		                            	dataType: 'JSON',
		                            	data:{kode_pickup:kode_pickup},
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
	                        	addClass: 'btn btn-danger btn-clean', text: 'Belum', onClick: function($noty) {
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