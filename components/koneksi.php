<?php 
$koneksi = mysqli_connect("localhost","siamomlo_dbsia","Masuk*123","siamomlo_dbsia");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
session_start(); 
?>