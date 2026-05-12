<?php
include "../components/koneksi.php";
		// Ambil data ID Provinsi yang dikirim via ajax post
		$shipment = $$_POST['shipment'];
		
		//$kota = $this->KotaModel->viewByProvinsi($shipment);
		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
	$j8 = mysqli_query($koneksi,"SELECT * FROM create_job_copy ORDER BY id ASC");
	$data8=mysql_fetch_array($d8);
	if(empty($data8['id']))
	{
	$rt="1";
		}
	else{
	$rt=$data8['id']+1;
	}
		$lists = "";
	
	$cari=mysqli_query("SELECT * FROM coba where nama_barang='$shipment'");
	$data=mysqli_fetch_array($cari);
		
			if(empty($data8['id'])) {
			$rt=1;
			$lists .= "<option value='".$data->harga."".date('dmy')."".$rt."'>".$data->harga."".date('dmy')."".$rt."</option>"; // Tambahkan tag option ke variabel $lists
			}
			else {
			$lists .= "<option value='".$data->harga."".date('dmy')."".$rt."'>".$data->harga."".date('dmy')."".$rt."</option>"; // Tambahkan tag option ke variabel $lists

				}
		
		
		$callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	
?>