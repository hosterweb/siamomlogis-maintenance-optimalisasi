<?php ob_start(); 
include "../components/koneksi.php";
 $data=$_GET['data'];
$query = "SELECT * FROM create_job_copy where id='$data'"; // Tampilkan semua data gambar
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
$data = mysqli_fetch_array($sql);// Ambil semua data dari hasil eksekusi $sql
?>

<html>
<head>
	<title>MOM LOGISTIC - JOB ORDER ENTRY</title>
	<style>
		table {
			border-collapse:collapse; 
			table-layout:fixed;width: 18cm;
		}
		table td {
			word-wrap:break-word;
			width:25%;
]		}
	</style>
</head>
<body>
	
<h2 style="text-align: center;">JOB ORDER ENTRY</h2>
<table border="1" width="50%"><tr><td>CONTROL NUMBER</td><td><?php echo $data['co_nu'];?></td></tr></table>
<br>
<table border="1" width="100%">
	<tr><td>JOB NUMBER</td><td><?php echo $data['job_number'];?></td><td>LOADING</td><td><?php echo $data['loding'];?></td></tr>
	<tr><td>DATE</td><td><?php echo $data['tgl'];?></td><td>DESTINATION</td><td><?php echo $data['destination'];?></td></tr>
   	<tr><td>SHIPPER/CONSIGNEE</td><td><?php echo $data['customer'];?></td><td>QUANTITY</td><td><?php echo $data['qty'];?></td></tr>
   	<tr><td>VESSEL & VOY</td><td><?php echo $data['vessel_boy'];?></td><td>BL NUMBER</td><td><?php echo $data['house_bl'];?></td></tr>
   	<tr><td>ETA/ETD</td><td><?php echo $data['eta_etd'];?></td><td>SHIPMENT</td><td><?php echo $data['shipment'];?></td></tr>
   	<tr><td>SALES</td><td><?php echo $data['marketing'];?></td><td>CONDITION</td><td><?php echo $data['kondition'];?></td></tr>
</table>
	<br>
<table border="1" width="100%">
	<tr><td rowspan="2" align="center">NO</td><td rowspan="2" align="center">DESCRIPTION</td><td align="center">AMOUNT</td><td align="center">COSTING</td></tr>
    <tr><td align="center"><?php echo $data['currency'];?></td><td align="center"><?php echo $data['currency'];?></td></tr>
    
    <?php if(!empty($data['description1'])){
		?>
	<tr><td align="center">1</td><td><?php echo $data['description1'];?></td><td align="right"><?php echo $data['amount1'];?></td><td align="right"><?php echo $data['receivable1'];?></td></tr>
   	<?php }?>
    
     <?php if(!empty($data['description2'])){
		?>
	<tr><td align="center">2</td><td><?php echo $data['description2'];?></td><td align="right"><?php echo $data['amount2'];?></td><td align="right"><?php echo $data['receivable2'];?></td></tr>
   	<?php }?>
    
     <?php if(!empty($data['description3'])){
		?>
	<tr><td align="center">3</td><td><?php echo $data['description3'];?></td><td align="right"><?php echo $data['amount3'];?></td><td align="right"><?php echo $data['receivable3'];?></td></tr>
   	<?php }?>
    
     <?php if(!empty($data['description4'])){
		?>
	<tr><td align="center">4</td><td><?php echo $data['description4'];?></td><td align="right"><?php echo $data['amount4'];?></td><td align="right"><?php echo $data['receivable4'];?></td></tr>
   	<?php }?>
    
     <?php if(!empty($data['description5'])){
		?>
	<tr><td align="center">5</td><td><?php echo $data['description5'];?></td><td align="right"><?php echo $data['amount5'];?></td><td align="right"><?php echo $data['receivable5'];?></td></tr>
   	<?php }?>
    
     <?php if(!empty($data['description6'])){
		?>
	<tr><td align="center">6</td><td><?php echo $data['description6'];?></td><td align="right"><?php echo $data['amount6'];?></td><td align="right"><?php echo $data['receivable6'];?></td></tr>
   	<?php }?>
    
     <?php if(!empty($data['description7'])){
		?>
	<tr><td align="center">7</td><td><?php echo $data['description7'];?></td><td align="right"><?php echo $data['amount7'];?></td><td align="right"><?php echo $data['receivable7'];?></td></tr>
   	<?php }?>
    
     <?php if(!empty($data['description8'])){
		?>
	<tr><td align="center">8</td><td><?php echo $data['description8'];?></td><td align="right"><?php echo $data['amount8'];?></td><td align="right"><?php echo $data['receivable8'];?></td></tr>
   	<?php }?>
    
     <?php if(!empty($data['description9'])){
		?>
	<tr><td align="center">9</td><td><?php echo $data['description9'];?></td><td align="right"><?php echo $data['amount9'];?></td><td align="right"><?php echo $data['receivable9'];?></td></tr>
   	<?php }?>
    
     <?php if(!empty($data['description10'])){
		?>
	<tr><td align="center">10</td><td><?php echo $data['description10'];?></td><td align="right"><?php echo $data['amount10'];?></td><td align="right"><?php echo $data['receivable10'];?></td></tr>
   	<?php }?>

	<tr><td colspan="2">Total</td><td align="right"><?php echo $data['total_amount'];?></td><td align="right"><?php echo $data['total_receivable'];?></td></tr>

</table>   <br>
<table border="1" width="50%"><tr><td align="center">PROFIT  <?php echo $data['currency'];?></td><td align="right"> <?php echo $data['loss_profit'];?></td></tr></table>
<br><br>
<table border="1" width="100%">
<tr><td align="center">Approved by</td><td align="center">Entry ID</td><td align="center">Verified by</td><td align="center">Sales</td></tr>
<tr><td align="center"><br><br><br><br><br>(........................)</td><td align="center"><br><br><br><br><br>(........................)</td><td align="center"><br><br><br><br><br>(........................)</td><td align="center"><br><br>NOMINASI<br><br><br>(........................)</td></tr>
</table>
<BR>
JAMINAN CONTAINER  &nbsp;&nbsp;&nbsp;:
<BR><br>
CREDIT TERMS  &nbsp;&nbsp;&nbsp;     :   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  CREDIT DAYS
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('../assets/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('JOB_ORDER_ENTRY.pdf', 'D');
?>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
