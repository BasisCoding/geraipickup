	<script type="text/javascript">
		$(document).ready(function() {
			show_gerai();
			$("#file-simple").fileinput({
	            showUpload: false,
	            showCaption: false,
	            browseClass: "btn btn-danger",
	            fileType: "any"
	        });  


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

			$('#btn-save-gerai').on('click', function() {

				var data = $('#form-add-gerai').serialize();
				$.ajax({
					url: '<?= base_url("admin/Data_Gerai/add_gerai") ?>',
					type: 'POST',
					dataType: 'JSON',
					data:data,
					beforeSend: function()
                    { 
                        $("#btn-save-gerai").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
                    },
					success:function(response) {
		                if (response.status == 'success') {
		                	$('#modal_add_gerai').modal('hide');
		                    $('.message-box-success').addClass('open');
		                    playAudio('alert');
		                    $('#form-add-gerai')[0].reset();
                        	$("#btn-save-gerai").html('Save');

		                }else{
		                	$('#modal_add_gerai').modal('hide');
		                    $('.message-box-danger').addClass('open');
                        	$("#btn-save-gerai").html('Save');
                        	
		                    playAudio('fail');
		                }
		                
		                show_gerai();
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