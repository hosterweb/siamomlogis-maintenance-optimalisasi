<?php
// Fungsi header dengan mengirimkan raw data excel
error_reporting(0);
include "../components/koneksi.php";
header("Content-type: application/vnd-ms-excel");
   	$tgl1= $_GET['tgl1'];	
	$tgl2= $_GET['tgl2'];
// Mendefinisikan nama file ekspor "hasil-export.xls"
$nama_file="Lap_CN_".$tgl1.".xls";
header("Content-Disposition: attachment; filename=$nama_file");
?>

 <table width="100%" border="1" style="width:100%;">
  <tbody>
  <tr><td colspan="10"><br></td></tr>
  <tr><td colspan="10" align="center"><h3 align="center">LAPORAN CREDIT NOTE MOM LOGISTIK</h3></td></tr>
  <tr><td colspan="10" align="center"><h4 align="center">PERIODE TANGGAL <?PHP echo $tgl1;?> s/d TANGGAL <?PHP echo $tgl2;?></h4></td></tr>
  <tr><td colspan="10"><br></td></tr><tr><td colspan="2"><br></td></tr>
  <tr><td>shipment</td><td>Tanggal </td><td>cn_number </td><td>invoice_number </td><td>job_number </td><td>co_number</td><td>marketing </td><td>customer </td><td>master_bl</td><td> house_bl </td><td>poi </td><td>pod </td><td>vessel_boy </td><td>eta_etd </td><td>agent </td><td> container </td><td>kondition</td><td> description1</td><td> qty1</td><td> unit_price1</td><td> amount1</td><td> description2</td><td> qty2</td><td> unit_price2</td><td> amount2</td><td> description3</td><td> qty3</td><td> unit_price3</td><td> amount3</td><td> description4</td><td> qty4</td><td>  unit_price4</td><td> amount4</td><td> description5</td><td> qty5</td><td> unit_price5</td><td> amount5</td><td> description6</td><td> qty6</td><td> unit_price6</td><td> amount6</td><td> description7</td><td> qty7</td><td> unit_price7</td><td> amount7</td><td> description8</td><td> qty8</td><td>  unit_price8</td><td> amount8</td><td> description9</td><td> qty9</td><td> unit_price9</td><td> amount9</td><td> description10</td><td> qty10</td><td> unit_price10</td><td> amount10</td><td> total_amount</td></tr>
  <?php
	$text1 = mysqli_query($koneksi,"SELECT * FROM cn where tgl between '$tgl1' AND '$tgl2'");
	while($db1=mysqli_fetch_array($text1)){
        ?>
  <tr><td><?php echo $db1['shipment'];?></td><td><?php echo $db1['tgl'];?> </td><td><?php echo $db1['cn_number'];?> </td><td><?php echo $db1['invoice_number'];?> </td><td><?php echo $db1['job_number'];?> </td><td><?php echo $db1['co_nu'];?> </td><td><?php echo $db1['marketing'];?> </td><td><?php echo $db1['customer'];?> </td><td><?php echo $db1['master_bl'];?> </td><td> <?php echo $db1['house_bl'];?> </td><td><?php echo $db1['poi'];?></td><td><?php echo $db1['pod'];?></td><td><?php echo $db1['vessel_boy'];?></td><td><?php echo $db1['eta_etd'];?></td><td><?php echo $db1['agent'];?></td><td> <?php echo $db1['container'];?></td><td><?php echo $db1['kondition'];?> </td><td> <?php echo $db1['description1'];?> </td><td> <?php echo $db1['qty1'];?> </td><td> <?php echo $db1['unit_price1'];?> </td><td> <?php echo $db1['amount1'];?> </td><td> <?php echo $db1['description2'];?> </td><td> <?php echo $db1['qty2'];?> </td><td> <?php echo $db1['unit_price2'];?> </td><td> <?php echo $db1['amount2'];?> </td><td> <?php echo $db1['description3'];?> </td><td> <?php echo $db1['qty3'];?> </td><td> <?php echo $db1['unit_price3'];?> </td><td> <?php echo $db1['amount3'];?> </td><td> <?php echo $db1['description4'];?> </td><td> <?php echo $db1['qty4'];?> </td><td>  <?php echo $db1['unit_price4'];?> </td><td> <?php echo $db1['amount4'];?> </td><td> <?php echo $db1['description5'];?> </td><td> <?php echo $db1['qty5'];?> </td><td> <?php echo $db1['unit_price5'];?> </td><td> <?php echo $db1['amount5'];?> </td><td> <?php echo $db1['description6'];?> </td><td> <?php echo $db1['qty6'];?> </td><td> <?php echo $db1['unit_price6'];?> </td><td> <?php echo $db1['amount6'];?> </td><td> <?php echo $db1['description7'];?> </td><td> <?php echo $db1['qty7'];?> </td><td> <?php echo $db1['unit_price7'];?> </td><td> <?php echo $db1['amount7'];?> </td><td> <?php echo $db1['description8'];?> </td><td> <?php echo $db1['qty8'];?> </td><td>  <?php echo $db1['unit_price8'];?> </td><td> <?php echo $db1['amount8'];?> </td><td> <?php echo $db1['description9'];?> </td><td> <?php echo $db1['qty9'];?> </td><td> <?php echo $db1['unit_price9'];?> </td><td> <?php echo $db1['amount9'];?> </td><td> <?php echo $db1['description10'];?> </td><td> <?php echo $db1['qty10'];?> </td><td> <?php echo $db1['unit_price10'];?> </td><td> <?php echo $db1['amount10'];?> </td><td> <?php echo $db1['total_amount'];?> </td></tr>
        <?php
	}
	?>
    
     </tbody></table>
     <table border="0" width="100%">
      <tr><td colspan="10" bordercolor="#FFFFFF"><br></td></tr><tr><td colspan="10" bordercolor="#FFFFFF"><br></td></tr>
      <tr><td bordercolor="#FFFFFF">&nbsp;</td><td bordercolor="#FFFFFF">Surabaya, <?php echo date("d F Y");?></td></tr>
      <tr><td colspan="10" bordercolor="#FFFFFF"><br></td></tr><tr><td colspan="10" bordercolor="#FFFFFF"><br></td></tr>
      <tr><td bordercolor="#FFFFFF">&nbsp;</td><td bordercolor="#FFFFFF">(_______________________)</td></tr>                                   
                                        </tbody>
                                    </table>