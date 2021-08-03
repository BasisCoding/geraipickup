<script type="text/javascript">    
        
	$(document).ready(function() {
		show_kurir();

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

		function show_kurir() {
			$.ajax({
				url: '<?= site_url('admin/Data_kurir/get_kurir') ?>',
				type: 'POST',
				async:false,
				success:function (data) {
	                $('#table-daftar-kurir').html(data);
				}
			});
		}

		$('#btn-save-kurir').on('click', function() {

			var data = $('#form-add-kurir').serialize();
			$.ajax({
				url: '<?= base_url("admin/Data_kurir/add_kurir") ?>',
				type: 'POST',
				dataType: 'JSON',
				data:data,
				beforeSend: function()
                { 
                    $("#btn-save-kurir").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
                    $("#btn-save-kurir").attr('disabled', true);
                },
				success:function(response) {
	                $('#modal_add_kurir').modal('hide');
                	$('.response-status').html(response.status);
                	$('.response-message').html(response.message);
	               
	                if (response.status == 'Success') {
	                    $('.message-box-success').addClass('open');
	                    playAudio('alert');
	                    $('#form-add-kurir')[0].reset();
                    	$("#btn-save-kurir").html('Save');

	                }else{
	                    $('.message-box-error').addClass('open');
                    	$("#btn-save-kurir").html('Save');
                    	
	                    playAudio('fail');
	                }
                    $("#btn-save-kurir").attr('disabled', false);
	                
	                show_kurir();
	            }

			});
			
			return false;				
		});

		$('#table-daftar-kurir').on('click', '.update-data', function() {
				
				$('#form-update-kurir')[0].reset();
				var id 				= $(this).attr('data-id');
				var username 		= $(this).attr('data-username');
				var email 			= $(this).attr('data-email');
				var nama_lengkap 	= $(this).attr('data-nama_lengkap');
				var hp 				= $(this).attr('data-hp');
				var idProv 			= $(this).attr('data-prov');
				var kota 			= $(this).attr('data-kota');
				var kec 			= $(this).attr('data-kec');
				var status 			= $(this).attr('data-status');

				$('[name="username_update"]').val(username);
				$('[name="email_update"]').val(email);
				$('[name="nama_lengkap_update"]').val(nama_lengkap);
				$('[name="hp_update"]').val(hp);
				
				setTimeout(function() {
					$('[name="prov_update"]').val(idProv).trigger('change');
					setTimeout(function() {
						$('[name="kota_update"]').val(kota).trigger('change');
						setTimeout(function() {
							$('[name="kec_update"]').val(kec).trigger('change');
						}, 2000);
					}, 1500);
				}, 1000);
				

				$('#modal_update_kurir').modal('show');
			});

		$('#btn-update-kurir').on('click', function() {

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
	                $('#modal_update_kurir').modal('hide');
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
			
			return false;				
		});	

		$('#table-daftar-kurir').on('click', '.delete-data', function() {
			var id = $(this).attr('data-id');
			var username = $(this).attr('data-username');
			var nama_lengkap = $(this).attr('data-nama_lengkap');

			noty({
                text: 'Apakah Anda Yakin Ingin Menghapus Data '+nama_lengkap+' ?!?',
                layout: 'topRight',
                buttons: [{
                        	addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
	                            $noty.close();
	                            $.ajax({
	                            	url: '<?= base_url("admin/Data_Kurir/delete_kurir") ?>',
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

            show_kurir();
		});

	});
</script>

<script type="text/javascript" src="<?= base_url('assets/js/settings.js') ?>"></script>       
<script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
<script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>
</body>
</html>