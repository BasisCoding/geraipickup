<script type="text/javascript">
	$(document).ready(function() {
		getData();
		// Wilayah API
			$.getJSON('https://dev.farizdotid.com/api/daerahindonesia/provinsi', function(json, textStatus) {

				$.each(json.provinsi, function(i, prov) {
					var id = prov.id;
					var nama = prov.nama;
					$('.provinsi').append('<option value="'+id+'">'+nama+'</option>');
				});
			});

			function tampilKota(idArea, what) {
				if (what == 'prov') {
					if (idArea == "") {
					   $('.kota').prop('disabled', true);
					   return;
					}

					$('.kota').prop('disabled', false);

					$(".kota").html("");
					  
					$.getJSON('https://dev.farizdotid.com/api/daerahindonesia/kota',{id_provinsi: idArea}, function(json, textStatus) {

						$.each(json.kota_kabupaten, function(i, kab) {
							var id = kab.id;
							var nama = kab.nama;
							$(".kota").append('<option value="'+id+'">'+nama+'</option>');
						});
					});
				}else if (what == 'kota') {
					if (idArea == "") {
					   $('.kecamatan').prop('disabled', true);
					   return;
					}

					$('.kecamatan').prop('disabled', false);

					$(".kecamatan").html("");
					  
					$.getJSON('https://dev.farizdotid.com/api/daerahindonesia/kecamatan',{id_kota: idArea}, function(json, textStatus) {

						$.each(json.kecamatan, function(i, kec) {
							var id = kec.id;
							var nama = kec.nama;
							$(".kecamatan").append('<option value="'+id+'">'+nama+'</option>');
						});
					});
				}
			}

			$('body').on('change', '.provinsi', function() {
				var idProv = $(this).val();
				tampilKota(idProv, "prov");
			});

			$('body').on('change', '.kota', function() {
				var idKota = $(this).val();
				tampilKota(idKota, "kota");
			});

		// Wilayah API
		function getData() {	
			$.ajax({
				url: '<?= base_url("kurir/Profil/get_profil") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					$('[name="username_update"]').val(data.username);
					$('[name="nama_lengkap_update"]').val(data.nama_lengkap);
					$('[name="hp_update"]').val(data.hp);
					$('[name="email_update"]').val(data.email);
					setTimeout(function() {
						$('[name="prov_update"]').val(data.prov).trigger('change');
						setTimeout(function() {
							$('[name="kota_update"]').val(data.kota).trigger('change');
							setTimeout(function() {
								$('[name="kec_update"]').val(data.kec).trigger('change');
							}, 3000);
						}, 2000);
					}, 1000);
					
				}
			});
		}

		$('#btn-update-kurir').on('click', function() {

			noty({
	            text: 'Apakah Anda Yakin Ingin Mengubah Data ?!?',
	            layout: 'topRight',
	            buttons: [{
	                    	addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
	                            $noty.close();
	                            var data = $('#form-update-kurir').serialize();
															$.ajax({
																url: '<?= base_url("admin/Data_kurir/update_kurir") ?>',
																type: 'POST',
																dataType: 'JSON',
																data:data,
																beforeSend: function()
															    { 
															        $("#btn-update-kurir").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
															        $("#btn-update-kurir").attr('disabled', true);
															    },
																success:function(response) {
															    	$('.response-status').html(response.status);
															    	$('.response-message').html(response.message);
															       
															        if (response.status == 'Success') {
															            $('.message-box-success').addClass('open');
															            playAudio('alert');
															            setTimeout(function(){ 
															              window.location.reload();
															            }, 1000);

															        }else{
															            $('.message-box-error').addClass('open');
															            setTimeout(function(){ 
															              window.location.reload();
															            }, 1000);
															            playAudio('fail');

															        }
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

			return false;				
		});
	});
	  
</script>

<script type="text/javascript" src="<?= base_url('assets/js/settings.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
<script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>

</body>
</html>