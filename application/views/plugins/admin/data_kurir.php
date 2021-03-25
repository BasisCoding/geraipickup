<script type="text/javascript">    
        
	$(document).ready(function() {
		show_kurir();
		tampilProvinsi();

	// Wilayah API
		function tampilProvinsi() {
			var provinsi = $('.provinsi');
			provinsi.append('<option value="" disabled selected>Pilih Provinsi</option>');

			fetch('http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
			.then(
				function(response) {
					if (response.status !== 200) {  
				        console.log('Looks like there was a problem. Status Code: ' + response.status);  
				        return;  
				      }

				      // Examine the text in the response  
				      response.json().then(function(data) {  
				    	for (let i = 0; i < data.length; i++) {
				          provinsi.append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
				    	}    
				      });  
				}
			).catch(function(err) {  
			    console.error('Fetch Error -', err);  
			});

			$('.kota').attr('disabled', true);
			$('.kecamatan').attr('disabled', true);
		}

		function tampilKota(idProv) {
			var kota = $('.kota');
			kota.append('<option value="" disabled selected>Pilih Kota</option>');

			fetch('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/'+idProv+'.json')
			.then(
				function(response) {
					if (response.status !== 200) {  
				        console.log('Looks like there was a problem. Status Code: ' + response.status);  
				        return;  
				      }

				      // Examine the text in the response  
				      response.json().then(function(data) { 
				    	for (let i = 0; i < data.length; i++) {
				          kota.append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
				    	}    
				      });  
				}
			).catch(function(err) {  
			    console.error('Fetch Error -', err);  
			});
		}

		function tampilKecamatan(idKota) {
			var kecamatan = $('.kecamatan');
			kecamatan.append('<option value="" disabled selected>Pilih Kecamatan</option>');

			fetch('http://www.emsifa.com/api-wilayah-indonesia/api/districts/'+idKota+'.json')
			.then(
				function(response) {
					if (response.status !== 200) {  
				        console.log('Looks like there was a problem. Status Code: ' + response.status);  
				        return;  
				      }

				      // Examine the text in the response  
				      response.json().then(function(data) {  
				    
				    	for (let i = 0; i < data.length; i++) {
				          kecamatan.append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
				    	}    
				      });  
				}
			).catch(function(err) {  
			    console.error('Fetch Error -', err);  
			});
		}
		
		$('.provinsi').change(function() {
			var idProv = $(this).children('option:selected').val();
			tampilKota(idProv);

			$('.kota').attr('disabled', false);
		});

		$('.kota').change(function() {
			var idKota = $(this).children('option:selected').val();
			tampilKecamatan(idKota);

			$('.kecamatan').attr('disabled', false);
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
				var alamat 			= $(this).attr('data-alamat');
				var nama_lengkap 	= $(this).attr('data-nama_lengkap');
				var hp 				= $(this).attr('data-hp');
				var idProv 			= $(this).attr('data-prov');
				var kota 			= $(this).attr('data-kota');
				var kec 			= $(this).attr('data-kec');
				var status 			= $(this).attr('data-status');

				$('[name="username_update"]').val(username);
				$('[name="email_update"]').val(email);
				$('[name="alamat_update"]').val(alamat);
				$('[name="nama_lengkap_update"]').val(nama_lengkap);
				$('[name="hp_update"]').val(hp);
		

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