<?php
// Fungsi header dengan mengirimkan raw data excel
error_reporting(0);
include "../components/koneksi.php";
header("Content-type: application/vnd-ms-excel");
   	$tgl1= $_GET['tgl1'];	
	$tgl2= $_GET['tgl2'];
// Mendefinisikan nama file ekspor "hasil-export.xls"
$nama_file="Lap_Rugi_Laba_".$tgl1.".xls";
header("Content-Disposition: attachment; filename=$nama_file");
?>

 <table width="100%" border="1" style="width:100%;">
  <tbody>
  <tr><td colspan="2"><br></td></tr>
  <tr><td colspan="2" align="center"><h3 align="center">LAPORAN RUGI LABA MOM LOGISTIK</h3></td></tr>
  <tr><td colspan="2" align="center"><h4 align="center">PERIODE TANGGAL <?PHP echo $tgl1;?> s/d TANGGAL <?PHP echo $tgl2;?></h4></td></tr>
  <tr><td colspan="2"><br></td></tr><tr><td colspan="2"><br></td></tr>
  <tr><th width="237" align="left">Total Amount</th><td width="367"><?php

	$text1 = mysqli_query($koneksi,"SELECT * FROM create_job_copy where tgl between '$tgl1' AND '$tgl2'");
	while($db1=mysqli_fetch_array($text1)){
		$t_amount += $db1['total_amount'];
	}
	echo "Rp.";				
	echo number_format($t_amount);
	?> </td></tr>
    
  	<tr><th align="left">Total Cost</th><td><?php
								   
	$text2 = mysqli_query($koneksi,"SELECT * FROM create_job_copy where tgl between '$tgl1' AND '$tgl2'");
	while($db2=mysqli_fetch_array($text2)){
	$t_cost += $db2['total_receivable'];
	}
	echo "Rp.";				
	echo number_format($t_cost);
	?> </td></tr>
    
    
    
    <tr><th align="left">Profit</th><td><?php
	$text3 = mysqli_query($koneksi,"SELECT * FROM create_job_copy where tgl between '$tgl1' AND '$tgl2'");
	while($db3=mysqli_fetch_array($text3)){
		$t_cost2 += $db3['total_receivable'];
		$t_amount2 += $db3['total_amount'];
	}
	echo "Rp.";				
	echo number_format($profit=$t_amount2-$t_cost2);
	?></td></tr>
    
    <tr> <th colspan="2"><hr></th> </tr>
    
    <tr><th align="left">Profit</th><td>
    <?php
	echo "Rp.";				
	echo number_format($profit);
	?></td></tr>
     
     <tr> <th align="left">Kas Keluar</th><td><?php
	$text5 = mysqli_query($koneksi,"SELECT * FROM arus_kas_keluar where tgl between '$tgl1' AND '$tgl2'");
	while($db5=mysqli_fetch_array($text5)){
		$arus_kas_keluar += $db5['nominal'];
	}
	echo "Rp.";				
	echo number_format($arus_kas_keluar);
		?></td></tr>
    
    <tr><th colspan="2"><hr /></th></tr>
      
    <tr><th align="left">Laba</th><td><?php
	$laba = $profit-$arus_kas_keluar;
	if($laba>0){
	echo "Rp.";			
	echo number_format($laba);
	}
	else { echo "Rp. 0";}
	?></td></tr>
     
     <tr><th align="left">Rugi</th><td>
     <?php
     $rugi = $profit-$arus_kas_keluar;
	if($rugi<0){
	echo "Rp.";				
	echo number_format($rugi);
		}
		else { echo "Rp. 0";}
		?>
     </td></tr>
     </tbody></table>
     <table border="0" width="100%">
      <tr><td colspan="2" bordercolor="#FFFFFF"><br></td></tr><tr><td colspan="2" bordercolor="#FFFFFF"><br></td></tr>
      <tr><td bordercolor="#FFFFFF">&nbsp;</td><td bordercolor="#FFFFFF">Surabaya, <?php echo date("d F Y");?></td></tr>
      <tr><td colspan="2" bordercolor="#FFFFFF"><br></td></tr><tr><td colspan="2" bordercolor="#FFFFFF"><br></td></tr>
      <tr><td bordercolor="#FFFFFF">&nbsp;</td><td bordercolor="#FFFFFF">(_______________________)</td></tr>                                   
                                        </tbody>
                                    </table>