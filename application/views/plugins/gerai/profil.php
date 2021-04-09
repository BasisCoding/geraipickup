<script type="text/javascript">
	$(function() {
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
	});
</script>

<!-- START TEMPLATE -->
    <script type="text/javascript" src="<?= base_url('assets/js/settings.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>        
    <script type="text/javascript" src="<?= base_url('assets/js/actions.js') ?>"></script>
    
<!-- END SCRIPTS -->

<script type="text/javascript">
	get_profil();
	function get_profil() {
		$.ajax({
			url: '<?= base_url("gerai/Profil/get_profil") ?>',
			type: 'GET',
			dataType: 'JSON',
			success:function (data) {
				$('[name="username_update"]').val(data.username);
				$('[name="nama_lengkap_update"]').val(data.nama_lengkap);
				$('[name="nama_gerai_update"]').val(data.nama_gerai);
				$('[name="hp_update"]').val(data.hp);
				$('[name="telepon_update"]').val(data.telepon);
				$('[name="alamat_update"]').val(data.alamat);
				$('[name="email_update"]').val(data.email);
				$('[name="prov_update"]').val(data.prov);
				$('[name="kota_update"]').val(data.kota);
				$('[name="kec_update"]').val(data.kec);
				$('[name="lat_update"]').val(data.lat);
				$('[name="long_update"]').val(data.long);

 				// initialize(-6.106580806998822, 106.13933609945431);
			}
		});
	}

	$('#btn-update-gerai').on('click', function() {

		noty({
            text: 'Apakah Anda Yakin Ingin Mengubah Data ?!?',
            layout: 'topRight',
            buttons: [{
                    	addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                            $noty.close();
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
		var lat = document.getElementById("lat").value;
        var long = document.getElementById("long").value;
      var propertiPeta = {
        center:new google.maps.LatLng(lat, long),
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      
      var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
      var marker = new google.maps.Marker({
		    position: new google.maps.LatLng(lat, long),
		    map: peta,
		    animation: google.maps.Animation.BOUNCE
		});

      google.maps.event.addListener(peta, 'click', function(event) {
        taruhMarker(this, event.latLng);
      });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
// Add Gerai Map
    
</script>

</body>
</html>