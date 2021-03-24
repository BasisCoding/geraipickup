	<script type="text/javascript">    
        
		$(document).ready(function() {
			show_gerai();
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
                        $("#btn-save-gerai").attr('disabled', true);
                    },
					success:function(response) {
		                $('#modal_add_gerai').modal('hide');
	                	$('.response-status').html(response.status);
	                	$('.response-message').html(response.message);
		               
		                if (response.status == 'Success') {
		                    $('.message-box-success').addClass('open');
		                    playAudio('alert');
		                    $('#form-add-gerai')[0].reset();
                        	$("#btn-save-gerai").html('Save');

		                }else{
		                    $('.message-box-error').addClass('open');
                        	$("#btn-save-gerai").html('Save');
                        	
		                    playAudio('fail');
		                }
                        $("#btn-save-gerai").attr('disabled', false);
		                
		                show_gerai();
		            }

				});
				
				return false;				
			});

			$('#table-daftar-gerai').on('click', '.update-data', function() {
				
				$('#form-update-gerai')[0].reset();
				var username 		= $(this).attr('data-username');
				var id 				= $(this).attr('data-id');
				var email 			= $(this).attr('data-email');
				var alamat 			= $(this).attr('data-alamat');
				var nama_pemilik 	= $(this).attr('data-namapemilik');
				var nama_gerai 		= $(this).attr('data-namagerai');
				var hp 				= $(this).attr('data-hp');
				var lat 			= $(this).attr('data-lat');
				var idProv 			= $(this).attr('data-prov');
				var kota 			= $(this).attr('data-kota');
				var kec 			= $(this).attr('data-kec');
				var long 			= $(this).attr('data-long');
				var telepon 		= $(this).attr('data-telepon');
				var status 			= $(this).attr('data-status');

				$('[name="username_update"]').val(username);
				$('[name="email_update"]').val(email);
				$('[name="alamat_update"]').val(alamat);
				$('[name="nama_pemilik_update"]').val(nama_pemilik);
				$('[name="nama_gerai_update"]').val(nama_gerai);
				$('[name="hp_update"]').val(hp);
			
				tampilKota(idProv);
				tampilKecamatan(kota);
				
				$('[name="telepon_update"]').val(telepon);
				$('[name="lat_update"]').val(lat);
				$('[name="long_update"]').val(long);

				initialize_update(lat, long);
				$('#modal_update_gerai').modal('show');
			});

			$('#btn-update-gerai').on('click', function() {

				var data = $('#form-update-gerai').serialize();
				$.ajax({
					url: '<?= base_url("admin/Data_Gerai/update_gerai") ?>',
					type: 'POST',
					dataType: 'JSON',
					data:data,
					beforeSend: function()
                    { 
                        $("#btn-update-gerai").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
                        $("#btn-update-gerai").attr('disabled', true);
                    },
					success:function(response) {
		                $('#modal_update_gerai').modal('hide');
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

			$('#table-daftar-gerai').on('click', '.delete-data', function() {
				var id = $(this).attr('data-id');
				var username = $(this).attr('data-username');
				var nama_gerai = $(this).attr('data-namagerai');

				noty({
	                text: 'Apakah Anda Yakin Ingin Menghapus Data '+nama_gerai+' ?!?',
	                layout: 'topRight',
	                buttons: [{
	                        	addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
		                            $noty.close();
		                            $.ajax({
		                            	url: '<?= base_url("admin/Data_Gerai/delete_gerai") ?>',
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


		});
	</script>


	<script type="text/javascript">

	// Add Gerai Map
        var marker;

        function taruhMarker(peta, posisiTitik){
            
           if( marker ){
              // pindahkan marker
              marker.setPosition(posisiTitik);
            } else {
              // buat marker baru
              marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
              });
            }

            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("long").value = posisiTitik.lng();
            
        }

        function initialize() {
          var propertiPeta = {
            center:new google.maps.LatLng(-6.1169772,106.149635),
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          };
          
          var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
          var peta_update = new google.maps.Map(document.getElementById("googleMap_update"), propertiPeta);

          google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
          });

          google.maps.event.addListener(peta_update, 'click', function(event) {
            taruhMarker(this, event.latLng);
          });
        }
    // Add Gerai Map

    // Update Gerai Map
        var marker_update;

        function taruhMarkerUpdate(peta, posisiTitik){
            
           if( marker_update ){
              // pindahkan marker
              marker_update.setPosition(posisiTitik);
            } else {
              // buat marker baru
              marker_update = new google.maps.Marker({
                position: posisiTitik,
                map: peta
              });
            }

            document.getElementById("lat_update").value = posisiTitik.lat();
            document.getElementById("long_update").value = posisiTitik.lng();   
        }

        function initialize_update(lattitude, longitude) {

        	var propertiPeta = {
			    center:new google.maps.LatLng(-6.1169772,106.149635),
			    zoom:9,
			    mapTypeId:google.maps.MapTypeId.ROADMAP
			};
			  
			var peta_update = new google.maps.Map(document.getElementById("googleMap_update"), propertiPeta);
			  
			  // membuat Marker
			var marker_update = new google.maps.Marker({
			    position: new google.maps.LatLng(lattitude, longitude),
			    map: peta_update,
			    animation: google.maps.Animation.BOUNCE

			});

	        google.maps.event.addListener(peta_update, 'click', function(event) {
	           taruhMarkerUpdate(this, event.latLng);
	        });
        }
    // Update Gerai Map

        google.maps.event.addDomListener(window, 'load', initialize);
        google.maps.event.addDomListener(window, 'load', initialize_update);
    </script>
	<!-- START TEMPLATE -->
        <script type="text/javascript" src="<?= base_url('assets/js/settings.js') ?>"></script>
        
        <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
        <script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>
        
    <!-- END SCRIPTS -->
</body>
</html>