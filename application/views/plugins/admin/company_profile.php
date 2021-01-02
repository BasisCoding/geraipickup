<script type="text/javascript">
	$(document).ready(function() {
		view_profile();
		$("#file-simple").fileinput({
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-danger",
            fileType: "any"
        });  

		function view_profile() {
	        $.ajax({
	        	url: '<?= site_url("Company_profile/get_data") ?>',
	        	type: 'POST',
	        	dataType: 'JSON',
	        	async: false,
	        	success:function(data) {
	        		$.each(data, function (nama_perusahaan, jenis_perusahaan, nama_direktur, email, telepon, logo, alamat, tgl_pendirian, jumlah_karyawan, status, created_at, update_at) {
	        			$('.logo').attr('src', data.logo);
	        			$('.profile-data-name').html(data.nama_perusahaan);
	        			$('.profile-data-title').html(data.jenis_perusahaan);
	        			$('.nama_direktur').html(data.nama_direktur);
	        			$('.jumlah_karyawan').html(data.jumlah_karyawan);
	        			$('.email').html(data.email);
	        			$('.telepon').html(data.telepon);
	        			$('.status').html(data.status);
	        			$('.btn-email').attr('href', 'mailto:'+data.email);
	        			$('.btn-telepon').attr('href', 'tel:'+data.telepon);

	        			$('[name="nama_perusahaan"]').val(data.nama_perusahaan);
	        			$('[name="jenis_perusahaan"]').val(data.jenis_perusahaan);
	        			$('[name="nama_direktur"]').val(data.nama_direktur);
	        			$('[name="status"]').val(data.status);
	        			$('[name="tgl_pendirian"]').val(data.tgl_pendirian);
	        			$('[name="jumlah_karyawan"]').val(data.jumlah_karyawan);
	        			$('[name="email"]').val(data.email);
	        			$('[name="telepon"]').val(data.telepon);
	        			$('[name="alamat"]').val(data.alamat);
	        			$('[name="logo_lama"]').val(data.logo);

	        			$('#form-profile input').attr('disabled', true);
	        			$('#form-profile .btn-file').attr('disabled', true);
	        			$('#form-profile select').attr('disabled', true);
	        			$('#form-profile textarea').attr('disabled', true);
	        		});

	        		return false;
	        	}
	        });
		}

		$('#btn-ubah').click(function() {

			$('#btn-form-profile').show('fast', function hideubah() {

				$('#form-profile input').attr('disabled', false);
				$('#form-profile .btn-file').attr('disabled', false);
    			$('#form-profile select').attr('disabled', false);
    			$('#form-profile textarea').attr('disabled', false);

				$('#btn-ubah').hide('fast', function showcancel() {
					$('#btn-cancel').show('fast');
				});
			});

			$('#btn-cancel').click(function() {
				$(this).hide('fast', function showubah() {
					$('#btn-ubah').show('fast', function hidecancel() {
						$('#btn-form-profile').hide('fast');
						view_profile();
					});
				});
			});

		});

		$('#form-profile').submit(function() {
		   var data = new FormData(this);
		    $.ajax({
		        url: '<?= site_url("Company_Profile/saveProfile")?>',
		        type: 'POST',
		        dataType:'JSON',
		        data: data,
		        processData: false,
		        contentType: false,
		        beforeSend: function()
                { 
                    $("#btn-form-profile").attr('disabled', '');
                    $("#btn-form-profile").html('<span class="glyphicon glyphicon-transfer"></span>   Sending ...');
                },
                success:function(response) {
                    if (response.status == 'success') {
                        $('.message-box-success').addClass('open');
                        playAudio('alert');
                        $('#configform')[0].reset();
                    }else{
                        $('.message-box-danger').addClass('open');
                        playAudio('fail');
                    }
                    
                    view_profile();
                }
		    });

		    return true;
		});
        
	});
</script>

</body>
</html>