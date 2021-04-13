	<script type="text/javascript">
		$(function() {
			view_pickup();
			function view_pickup() {
				$.ajax({
					url: '<?= base_url('gerai/Data_Pickup/get_pickup') ?>',
					type: 'POST',
					async:false,
					success:function (html) {
						$('#table-daftar-pickup').html(html);
					}
				});
			}

			$('#modal_add_pickup').on('shown.bs.modal', function () {
				$.ajax({
					url: '<?= base_url("gerai/Data_Pickup/get_kode_pickup") ?>',
					type: 'GET',
					dataType: 'JSON',
					success:function (data) {
			    		$('[name="kode_pickup"]').val(data);
					}
				});
			});

			$('#btn-save-pickup').on('click', function() {

				var data = $('#form-add-pickup').serialize();
				$.ajax({
					url: '<?= base_url("gerai/Data_Pickup/add_pickup") ?>',
					type: 'POST',
					dataType: 'JSON',
					data:data,
					beforeSend: function()
                    { 
                        $("#btn-save-pickup").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
                        $("#btn-save-pickup").attr('disabled', true);
                    },
					success:function(response) {
		                $('#modal_add_pickup').modal('hide');
	                	$('.response-status').html(response.status);
	                	$('.response-message').html(response.message);
		               
		                if (response.status == 'Success') {
		                    $('.message-box-success').addClass('open');
		                    playAudio('alert');
		                    $('#form-add-pickup')[0].reset();
                        	$("#btn-save-pickup").html('Save');

		                }else{
		                    $('.message-box-error').addClass('open');
                        	$("#btn-save-pickup").html('Save');
                        	
		                    playAudio('fail');
		                }
                        $("#btn-save-pickup").attr('disabled', false);
		                
		                view_pickup();
		            }

				});
				
				return false;				
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