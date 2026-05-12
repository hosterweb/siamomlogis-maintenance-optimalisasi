<?php 

function Terbilang($x) 
{ 
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"); 
  if ($x < 12) 
    return " " . $abil[$x]; 
  elseif ($x < 20) 
    return Terbilang($x - 10) . "belas"; 
  elseif ($x < 100) 
    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10); 
  elseif ($x < 200) 
    return " seratus" . Terbilang($x - 100); 
  elseif ($x < 1000) 
    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100); 
  elseif ($x < 2000) 
    return " seribu" . Terbilang($x - 1000); 
  elseif ($x < 1000000) 
    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000); 
  elseif ($x < 1000000000) 
    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000); 
    
    
} 

	$no=1;
	$page =1;

?>
<?php ob_start(); 
include "../components/koneksi.php";
$cetak_id=$_GET['cetak_id'];	
$olahdata=mysqli_query($koneksi, "SELECT * FROM create_job_copy where id='$cetak_id'");
$row = mysqli_num_rows($olahdata); // Ambil jumlah data dari hasil eksekusi $sql
$r_data=mysqli_fetch_array($olahdata);	
?>
<img src="../assets/images/kop.png" width="750">
<style>
		table {
			border-collapse:collapse; 
			width: 20cm;
		}
		table td {
			word-wrap:break-word;
			font-size:14px;
			padding:2px;
				}
		.description {
			width:46%;
			}
			.description1 {
			width:49%;
			}
		.k{
			width:20%;
			}
		.separo { width:50%;}			
	</style>
    
<table border="0">
<tr><td><br /></td></tr>
<tr><td style="width:100%;font-size:20px; text-align:center;"><u>BILLING INVOICE</u></td></tr>
<tr><td align="center" style="width:100%;"><?php echo $r_data['invoice_number'];?></td></tr>
<tr><td><br></td></tr>

<tr><td>
<table width="100%" border="1px solid black" style="font-size:10px; padding-left:3px">
    <tr><td valign="top" style="width:50%; padding-left:20px; font-size:10pt;">
       BILLING TO :<br>
      <?php echo $r_data['customer'];?>
       </td>
       <td valign="top" style="width:50%; text-align:left;">
       <table border="0" style="font-size:10pt; text-align:left;" valign="top"> 
       <tr>
       <td valign="top" style="padding-left:20px;">DATE</td>
       <td style="width:5%;">:</td>
       <td><?php echo $r_data['tgl']; ?></td>
       </tr>
       <tr>
       <td valign="top" style="padding-left:20px;">JOB</td>
       <td style="width:5%;">:</td>
       <td><?php echo $r_data['job_number'];?></td>
       </tr>
       <tr>
       <td valign="top" style="padding-left:20px;">MBL NO</td>
       <td style="width:5%;">:</td>
       <td><?php echo $r_data['house_bl'];?></td>
       </tr>
       <tr>
       <td valign="top" style="padding-left:20px;">QTY</td>
       <td style="width:5%;">:</td>
       <td><?php echo $r_data['qty'];?></td>
       </tr>
       <tr>
       <td valign="top" style="padding-left:20px;">JO CTRL</td>
       <td style="width:5%;">:</td>
       <td><?php echo $r_data['co_nu'];?></td>
       </tr>
   </table></td></tr></table>
</td></tr>

<tr><td>
<table style="font-size:10px; padding-left:3px;" border="1px solid black">
<tr>
  <td colspan="2">
<table width="750" border="0px solid black" style="font-size:10px; padding-left:3px;">
<tr>
<td style="width:50%; padding-left:5px">VESSEL & VOY</td>
<td style="width:5%;">:</td>
<td style="width:45%;"><?php  echo $r_data['vessel_boy']; ?></td>
</tr>
<tr>
<td style="width:50%; padding-left:5px">ETA/ETD</td>
<td style="width:5%;">:</td>
<td style="width:45%;"><?php  echo $r_data['eta_etd']; ?></td>
</tr>
<tr>
<td style="width:50%; padding-left:5px">POL</td>
<td style="width:5%;">:</td>
<td style="width:45%;"><?php  echo $r_data['loding']; ?></td>
</tr>
<tr>
<td style="width:50%; padding-left:5px">POD</td>
<td style="width:5%;">:</td>
<td style="width:45%;"><?php  echo $r_data['destination']; ?></td>
</tr>
<tr>
<td style="width:50%; padding-left:5px">CONTAINER NUMBER</td>
<td style="width:5%;">:</td>
<td style="width:45%;"><?php  echo $r_data['container']; ?></td>
</tr>
</table>
</td></tr>
<?php
	$j=str_replace(",","",$r_data['amount1'])+str_replace(",","",$r_data['amount2'])+str_replace(",","",$r_data['amount3'])+str_replace(",","",$r_data['amount4'])+str_replace(",","",$r_data['amount5'])+str_replace(",","",$r_data['amount6'])+str_replace(",","",$r_data['amount7'])+str_replace(",","",$r_data['amount8'])+str_replace(",","",$r_data['amount9'])+str_replace(",","",$r_data['amount10']);

?>
<tr>
    <td style="width:50%; font-size:10pt; font-weight:bold; text-align:center;">DETAILS OF CHARGES</td>
    <td style="width:50%; font-size:10pt; font-weight:bold; text-align:center;">AMOUNT</td>
</tr> 

<tr style="padding-left:3px;">
        <td style="width:50%; font-size:10pt; border:1px solid #000; text-align:left; padding-left:5px; font-weight:bold;">
		<?php 
		if(empty($r_data['description1'])){
		}
		else {
		echo $r_data['description1'];
		echo "<br>";
		}
		?>
        <?php 
		if(empty($r_data['description2'])){
		}
		else {
		echo $r_data['description2'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description3'])){
		}
		else {
		echo $r_data['description3'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description4'])){
		}
		else {
		echo $r_data['description4'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description5'])){
		}
		else {
		echo $r_data['description5'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description6'])){
		}
		else {
		echo $r_data['description6'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description7'])){
		}
		else {
		echo $r_data['description7'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description8'])){
		}
		else {
		echo $r_data['description8'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description9'])){
		}
		else {
		echo $r_data['description9'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['description10'])){
		}
		else {
		echo $r_data['description10'];
		echo "<br>";
		}
		?>
        PPN <?php echo $r_data['pajak'];?>%
        <br><br>
        </td>
        <td style="width:50%; text-align:right; font-size:10pt; font-weight:bold;">
         <?php 
		if(empty($r_data['amount1'])){
		}
		else {
		echo $r_data['currency'];	
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo $r_data['amount1'];
		echo "<br>";
		}
		?>
		
         <?php 
		if(empty($r_data['amount2'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo $r_data['amount2'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount3'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo $r_data['amount3'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount4'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo $r_data['amount4'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount5'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo $r_data['amount5'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount6'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo $r_data['amount6'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount7'])){
		}
		else {
		echo $r_data['currency'];
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo $r_data['amount7'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount8'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo $r_data['amount8'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount9'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo $r_data['amount9'];
		echo "<br>";
		}
		?>
         <?php 
		if(empty($r_data['amount10'])){
		}
		else {
		echo $r_data['currency'];		
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		echo $r_data['amount10'];
		echo "<br>";
		}
		echo $r_data['currency'];
		echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
		$pjk=$r_data['pajak'];
        echo $pajak2=number_format($j*$pjk/100);
    	$pajak=str_replace(",","",$pajak2);
		?>
        <br><br>
	    </td>
	</tr>  

<tr>
<td style="font-size:10pt; padding-left:5px; width:50%;">Total</td> 
<td style="font-size:10pt; font-weight:bold; text-align:right; width:50%;"> <?php echo $r_data['currency'];  echo "&nbsp;";echo "&nbsp;";echo "&nbsp;"; echo number_format($j+$pajak);?></td>
</tr>
<tr><td colspan="2" style="font-style:italic; font-size:10pt; padding-left:5px"><?php 
echo ucwords(''.Terbilang($j+$pajak).'');?></td></tr>
</table>
<table width="100%" border="0" style="font-size:11px;">
<tr><td style="font-size:10pt; width:50%;">
 For Payment by remittance, please make payable to : <br><br>
 BANK BCA - PT. MULTI OKTO MANUNGGAL<br>
 ACCOUNT NO : 3252 4669 99<br>
 ================<br>
 BANK MANDIRI Cab. Indragiri Surabaya <br>
 ACCOUNT NO : 142-00-1608364-3 (IDR) <br>
 ACCOUNT NO : 142-0016083668 (USD)<br><br>
 SWIFT CODE : bmriidja <br>
 IN FAVOUR : PT. MULTI OKTO MANUNGGAL
 
 </td>
 <td style="font-size:10pt; width:50%; padding-left:125px;"><br>Surabaya, <?php 
$tgl=$r_data['tgl'];
$tgl2 = date('d-m-Y', strtotime($tgl));
echo $tgl2;
?>
     <br><br>
   
<p>&nbsp;</p>
   <p><br>
     <br><br><br><br> 
    <u>(AUTORIZE SIGNATURE)</u></p></td>
 </tr>  
</table>
</td></tr></table>
<?php
$j=$r_data['invoice_number'];
$html = ob_get_contents();
ob_end_clean();
require_once('../assets/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output($j.'.pdf', 'D');
?>	