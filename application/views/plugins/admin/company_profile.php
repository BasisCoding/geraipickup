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
	        		});

	        		return false;
	        	}
	        });
		}
        
	});
</script>

</body>
</html>