	<script type="text/javascript">    
        
		$(document).ready(function() {
			show_gerai();

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
				$('[name="nama_lengkap_update"]').val(nama_pemilik);
				$('[name="nama_gerai_update"]').val(nama_gerai);
				$('[name="hp_update"]').val(hp);

				// tampilKota(idProv, 'prov');
				// tampilKota(kota, 'kota');
				
				$('[name="prov_update"]').val(idProv).trigger('change');
				setTimeout(function() {
					$('[name="kota_update"]').val(kota).trigger('change');
					setTimeout(function() {
						$('[name="kec_update"]').val(kec).trigger('change');
					}, 2000);
				}, 1000);
				
				console.log(idProv+','+kota+','+kec);
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