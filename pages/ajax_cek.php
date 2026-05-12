<?php
include "components/koneksi.php";
$pegawai = mysqli_fetch_array(mysqli_query($koneksi, "select * from create_job_copy where invoice_number='$_GET[invoice_number]'"));
$data_pegawai = array('shipment'   	=>  $pegawai['shipment'],
              		'job_number'  	=>  $pegawai['job_number'],
              		'customer'    		=>  $pegawai['customer'],
					'co_nu'    		=>  $pegawai['co_nu'],
					'marketing'    		=>  $pegawai['marketing'],
					'master_bl'    		=>  $pegawai['master_bl'],
					'house_bl'    		=>  $pegawai['house_bl'],
					'container'    		=>  $pegawai['container'],
					'agent'    		=>  $pegawai['agent'],
					'poi'    		=>  $pegawai['poi'],
					'pod'    		=>  $pegawai['pod'],
					'eta_etd'    		=>  $pegawai['eta_etd'],
					'vessel_boy'   		=>  $pegawai['vessel_boy'],
					'kondition'   		=>  $pegawai['kondition'],
					'alamat'    		=>  $pegawai['alamat'],);
 echo json_encode($data_pegawai);