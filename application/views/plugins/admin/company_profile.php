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
	        		});

	        		return false;
	        	}
	        });
		}
        
	});
</script>

</body>
</html>