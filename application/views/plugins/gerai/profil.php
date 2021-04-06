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

    // google.maps.event.addDomListener(window, 'load', initialize);
    google.maps.event.addDomListener(window, 'load', initialize_update);
</script>

</body>
</html>