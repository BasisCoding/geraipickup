<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Laporan extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->library('Cetak');
			$this->load->model('LaporanModel');
		}
	
		public function laporan_gerai()
		{
			$def['title'] = 'Data Pickup | Gerai PickUp Berbasis Web';
			
			$this->load->view('partials/head', $def);
			$this->load->view('partials/sidebar');
			$this->load->view('partials/navigation');
			$this->load->view('partials/breadcumb');
			$this->load->view('laporan_per_gerai');
			$this->load->view('partials/footer');
			$this->load->view('plugins/laporan_per_gerai');		
			// $pdf = new FPDF('P', 'mm','A4');

	  //       $pdf->AddPage();

	  //       $pdf->SetFont('Arial','B',16);
	  //       $pdf->Cell(0,7,'LAPORAN PICKUP GERAI',0,1,'C');
	  //       $pdf->Cell(10,7,'',0,1);

	  //       $pdf->SetFont('Arial','B',10);

	  //       $pdf->SetFont('Arial','',10);
	  //       $gerai = $this->LaporanModel->get_gerai()->result();

	  //       foreach ($gerai as $gr){
	  //       	// Nama Gerai
	  //       	$pdf->Cell(35,6,'Nama Gerai : ',0,0,'C');
	  //           $pdf->Cell(35,6,$gr->nama_gerai,0,0);
	  //       	$pdf->Cell(10,7,'',0,1);

	  //       	// Data Pickup
	  //       	$pdf->Cell(35,6,'Kode Pickup',1,0,'C');
	  //       	$pdf->Cell(35,6,'Nama Kurir',1,0,'C');
	  //       	$pdf->Cell(35,6,'Tanggal',1,0,'C');
	  //       	$pdf->Cell(13,6,'Jenis',1,0,'C');
	  //       	$pdf->Cell(13,6,'Jumlah',1,0,'C');
	  //       	$pdf->Cell(35,6,'Status',1,1,'C');

	  //       	$status = '';
	  //       	$pickup = $this->LaporanModel->get_pickup($gr->id)->result();

	  //       	foreach ($pickup as $pk) {
		 //        	if ($pk->status_pickup == 0) {
			// 			$status = 'Belum Pickup';
			// 		}if ($pk->status_pickup == 1) {
			// 			$status = 'Proses Pickup';
			// 		}if ($pk->status_pickup == 2) {
			// 			$status = 'Proses Validasi';
			// 		}if ($pk->status_pickup == 3) {
			// 			$status = 'Selesai';
			// 		}

	  //           	$pdf->Cell(35,6,$pk->kode_pickup,1,0);
	  //           	$pdf->Cell(35,6,$pk->nama_kurir,1,0);
	  //           	$pdf->Cell(35,6,$pk->tgl_pickup,1,0);
	  //           	$pdf->Cell(13,6,$pk->jenis_paket,1,0);
	  //           	$pdf->Cell(13,6,$pk->jumlah_paket,1,0, 'C');
	  //           	$pdf->Cell(35,6,$status,1,1);
	  //       	}

	  //       }
	  //       $pdf->Output();
		}

		public function get_laporan_gerai()
		{
			$html = '';
			$status = '';
			
	  		$pickup = $this->LaporanModel->get_pickup();
	  		if ($pickup->num_rows() > 0) {
		  		// echo $this->db->last_query($pickup);
				foreach ($pickup->result() as $pk) {
		        	if ($pk->status_pickup == 0) {
						$status = 'Belum Pickup';
					}if ($pk->status_pickup == 1) {
						$status = 'Proses Pickup';
					}if ($pk->status_pickup == 2) {
						$status = 'Proses Validasi';
					}if ($pk->status_pickup == 3) {
						$status = 'Selesai';
					}

					$html .= '<tr role="row" class="odd">
								<td>'.$pk->kode_pickup.'</td>
								<td>'.$pk->nama_gerai.'</td>
								<td>'.$pk->tgl_pickup.'</td>
								<td>'.$pk->jenis_paket.'</td>
								<td>'.$pk->jumlah_paket.'</td>
								<td>'.$status.'</td>
								<td>'.$pk->nama_kurir.'</td>
							</tr>';
	        	}
	        }else{
	        	$html .= '<tr role="row" class="odd">
							<td colspan="7" class="text-center">Tidak Ada Data</td>
						</tr>';
	        }

        	echo $html;
		}

		public function laporan_kurir()
		{
			$pdf = new FPDF('P', 'mm','A4');

	        $pdf->AddPage();

	        $pdf->SetFont('Arial','B',16);
	        $pdf->Cell(0,7,'LAPORAN PICKUP KURIR',0,1,'C');
	        $pdf->Cell(10,7,'',0,1);

	        $pdf->SetFont('Arial','B',10);

	        
	        $pdf->SetFont('Arial','',10);
	        $kurir = $this->LaporanModel->get_kurir()->result();

	        foreach ($kurir as $gr){
	        	// Nama Gerai
	        	$pdf->Cell(30,6,'Nama Kurir : ',0,0,'L');
	            $pdf->Cell(30,6,$gr->nama_lengkap,0,0, 'L');
	        	$pdf->Cell(10,7,'',0,1);

	        	// Data Pickup
	        	$pdf->Cell(35,6,'Kode Pickup',1,0,'C');
	        	$pdf->Cell(35,6,'Nama Gerai',1,0,'C');
	        	$pdf->Cell(35,6,'Tanggal',1,0,'C');
	        	$pdf->Cell(13,6,'Jenis',1,0,'C');
	        	$pdf->Cell(13,6,'Jumlah',1,0,'C');
	        	$pdf->Cell(35,6,'Status',1,1,'C');

	        	$status = '';
	        	$pickup = $this->LaporanModel->get_pickup_kurir($gr->id)->result();

	        	foreach ($pickup as $pk) {
		        	if ($pk->status_pickup == 0) {
						$status = 'Belum Pickup';
					}if ($pk->status_pickup == 1) {
						$status = 'Proses Pickup';
					}if ($pk->status_pickup == 2) {
						$status = 'Proses Validasi';
					}if ($pk->status_pickup == 3) {
						$status = 'Selesai';
					}

	            	$pdf->Cell(35,6,$pk->kode_pickup,1,0);
	            	$pdf->Cell(35,6,$pk->nama_gerai,1,0);
	            	$pdf->Cell(35,6,$pk->tgl_pickup,1,0);
	            	$pdf->Cell(13,6,$pk->jenis_paket,1,0);
	            	$pdf->Cell(13,6,$pk->jumlah_paket,1,0, 'C');
	            	$pdf->Cell(35,6,$status,1,1);
	        	}

	        }
	        $pdf->Output();
		}

		public function semua_laporan()
		{
			$pdf = new FPDF('P', 'mm','Letter');

	        $pdf->AddPage();

	        $pdf->SetFont('Arial','B',16);
	        $pdf->Cell(0,7,'LAPORAN PICKUP',0,1,'C');
	        $pdf->Cell(10,7,'',0,1);

	        $pdf->SetFont('Arial','B',10);

	        $pdf->Cell(35,6,'Kode Pickup',1,0,'C');
        	$pdf->Cell(35,6,'Nama Kurir',1,0,'C');
        	$pdf->Cell(35,6,'Nama Gerai',1,0,'C');
        	$pdf->Cell(35,6,'Tanggal',1,0,'C');
        	$pdf->Cell(13,6,'Jenis',1,0,'C');
        	$pdf->Cell(13,6,'Jumlah',1,0,'C');
        	$pdf->Cell(35,6,'Status',1,1,'C');

	        $pdf->SetFont('Arial','',10);
        	
        	$status = '';
        	$pickup = $this->LaporanModel->get_pickup_all()->result();

        	foreach ($pickup as $pk) {
	        	if ($pk->status_pickup == 0) {
					$status = 'Belum Pickup';
				}if ($pk->status_pickup == 1) {
					$status = 'Proses Pickup';
				}if ($pk->status_pickup == 2) {
					$status = 'Proses Validasi';
				}if ($pk->status_pickup == 3) {
					$status = 'Selesai';
				}

            	$pdf->Cell(35,6,$pk->kode_pickup,1,0);
            	$pdf->Cell(35,6,$pk->nama_kurir,1,0);
            	$pdf->Cell(35,6,$pk->nama_gerai,1,0);
            	$pdf->Cell(35,6,$pk->tgl_pickup,1,0);
            	$pdf->Cell(13,6,$pk->jenis_paket,1,0);
            	$pdf->Cell(13,6,$pk->jumlah_paket,1,0, 'C');
            	$pdf->Cell(35,6,$status,1,1);
        	}

	        $pdf->Output();
		}
	
	}
	
	/* End of file Laporan.php */
	/* Location: ./application/controllers/Laporan.php */
?>