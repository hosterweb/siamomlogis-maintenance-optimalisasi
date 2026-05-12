
<?php 
error_reporting(0);
?>
<body onLoad="window.print()">

<style type="text/css">
*{
font-family: Arial;
margin:0px;
padding:0px;
}
@page {
 width:21cm;
 height:28cm;
 font-size:6pt;
}
table.grid{
width:21cm;
height:11cm;
font-size: 6pt;
border-collapse:collapse;
}
table.grid th{
}
table.grid th{
background: #F0F0F0;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:center;
padding-left:0.2cm;
border:1px solid #000;
font-size:8px;
}
table.grid tr td{
border-bottom:0.2mm solid #000;
border:1px solid #000;
}
h1{
font-size: 12pt;
}
h2{
font-size: 10pt;
text-align:left;
}
h3{
font-size: 8pt;
}
.profil{
display: block;
width:21cm ;
font-size:8pt;
margin:0px;
padding:0px;
}
.profil .koperasi{
font-size:14px;
font-weight:bold;
}
.header{
display: block;
width:21cm ;
margin-bottom: 0.3cm;
text-align: center;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:1pt;
padding-bottom:1pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:11cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:11cm ;
font-size:13px;
}
.page {
width:28cm ;
height:21cm;
font-size:12px;
}

</style>
<div class="header">
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
$cetak_id=$_GET['cetak_id'];	
$olahdata=mysqli_query($koneksi, "SELECT * FROM create_job_copy where id='$cetak_id'");
$r_data=mysqli_fetch_array($olahdata);	
?>
<table style="width:100%; border:0" border="0">
<tr><td width="35%" align="left">
<img src="assets/images/logo_koperasi_70.png" width="245px">
</td>
<td width="65%" align="left">
<span style="color:#1382c9; font-size:20pt"><strong><font color="#1382c9">PT. MULTI OKTO MANUNGGAL</font></strong></span><br>
<span style="color:#000; font-size:12pt">FREIGHT FORWARDING - CUSTOMS CLEARING - EMKL SERVICE
</span><br><br>
<span style="color:#000; font-size:14pt">
Jl. Jemur Andayani Raya No. 21 Surabaya - Indonesia 60237<br>
Phone : (+6231)9985 1236 - Fax : (+6231) 9985 2712<br></span>
<span style="color:#000; font-size:11pt">Email : marketing@mom-logistic.co.id | Website : www.mom-logistic.co.id
</span>
</td>
</tr>
</table>
<br>
<table style="width:100%; border:0" height="10cm" border="0" align="center">
<tr><td colspan="4" style="text-align:center; font-size:20px"><u>BILLING INVOICE</u></td></tr>
<tr><td style="text-align:left"><?php echo $r_data['invoice_number'];?></td></tr>
<tr><td><br></td></tr>
</tr>
<tr>  <td>
<table style="width:100%; font-size:10px; padding-left:3px" border="1px solid black">
    <tr>
      <td style="width:50%; text-align:left; padding-left:5px" valign="top">
       <font size="3pt">BILLING TO :<br></font>
        <font size="4pt">
	   <?php 
	   echo $r_data['customer'];
	   ?></font>
       </td>
       <td style="width:50%; text-align:left;" valign="top">
       <table border="0" style="width:100%; font-size:10pt; text-align:left;" valign="top">
        
       <tr>
       <td valign="top" style="padding-left:20px;">DATE</td><td>:</td><td>
       <?php 
	   echo $r_data['tgl'];
	   ?>
       </td>
       </tr>
       <tr>
       <td valign="top" style="padding-left:20px;">JOB</td><td>:</td><td>
       <?php 
	   echo $r_data['job_number'];
	   ?>
       </td>
       </tr>
       <BR>
       <tr>
       <td valign="top" style="padding-left:20px;">MBL NO</td><td>:</td><td>
       <?php 
	   echo $r_data['house_bl'];
	   ?>
       </td>
       </tr>
       <tr>
       <td valign="top" style="padding-left:20px;">QTY</td><td>:</td><td>
       <?php 
	   echo $r_data['qty'];
	   ?>
       </td>
       </tr>
       <tr>
       <td valign="top" style="padding-left:20px;">JO CTRL</td><td>:</td><td>
       <?php 
	   echo $r_data['co_nu'];
	   ?></td>
       </tr>
       <tr><td><br><br></td></tr>
       </table></td>
       </tr>
       </table>
       </td>
    </tr>

   </table>
</div>
<table border="1px solid #000" style="width:100%; border:1px solid #000; padding:3px;">
<tr>
<td colspan="2">
<table style="width:100%; font-size:12pt; border: 1px solid black;
    outline-style: solid; outline-width: thin;">
<tr>
<td width="30%" style="padding-left:5px">VESSEL & VOY</td>
<td width="2%">:</td>
<td width="48%"><?php  echo $r_data['vessel_boy'];  ?></td>
</tr>
<tr>
<td width="30%" style="padding-left:5px">ETA/ETD</td>
<td width="2%">:</td>
<td width="48%"><?php  echo $r_data['eta_etd'];  ?></td>
</tr>
<tr>
<td width="30%" style="padding-left:5px">POL</td>
<td width="2%">:</td>
<td width="48%"><?php  echo $r_data['poi'];  ?></td>
</tr>
<tr>
<td width="30%" style="padding-left:5px">POD</td>
<td width="2%">:</td>
<td width="48%"><?php  echo $r_data['pod'];  ?></td>
</tr>
<tr>
<td width="30%" style="padding-left:5px">CONTAINER NUMBER</td>
<td width="2%">:</td>
<td width="48%"><?php  echo $r_data['container_no'];  ?></td>
</tr>

</table>
</td>
</tr>
<tr>
    <td style="font-size:10pt; font-weight:bold; text-align:center">DETAILS OF CHARGES</th>
    <td style="font-size:10pt; font-weight:bold; text-align:center">AMOUNT</th>
</tr> 
<?php
	$j=str_replace(",","",$r_data['amount1'])+str_replace(",","",$r_data['amount2'])+str_replace(",","",$r_data['amount3'])+str_replace(",","",$r_data['amount4'])+str_replace(",","",$r_data['amount5'])+str_replace(",","",$r_data['amount6'])+str_replace(",","",$r_data['amount7'])+str_replace(",","",$r_data['amount8'])+str_replace(",","",$r_data['amount9'])+str_replace(",","",$r_data['amount10']);

?>   <div></div>
    <tr style="padding-left:3px;">
        <td align="center" style="font-size:11pt; border:1px solid #000; width:75%; text-align:left; padding-left:5px;">
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
        PPN 10%
        <br><br>
        </td>
        <td align="right" style="font-size:11px;">
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
        echo $pajak2=number_format($j*10/100);
    	$pajak=str_replace(",","",$pajak2);
		?>
        <br><br>
	    </td>
       
	</tr>    
    
<tr>
<td style="font-size:10pt; padding-left:5px">Total</td> 
<td align="right" style="font-size:10pt; font-weight:bold;"> <?php echo $r_data['currency'];  echo "&nbsp;";echo "&nbsp;";echo "&nbsp;"; echo number_format($j+$pajak);?></td>
</tr>
<tr><td colspan="2" style="font-style:italic; font-size:10pt; padding-left:5px"><?php 
echo ucwords(''.Terbilang($j+$pajak).'');?></td></tr>
</table>
<table border="0" width="100%" style="font-size:11px;">
<tr><td style="width:50%; font-size:10pt;" width="75%">
 For Payment by remittance, please make payable to : <br><br>
 BANK MANDIRI Cab. Indragiri Surabaya <br>
 ACCOUNT NO : 142-00-1608364-3 (IDR) <br><br>
 SWIFT CODE : bmriidja <br>
 IN FAVOUR : PT. MULTI OKTO MANUNGGAL
 
 </td>
 <td width="25%" style="font-size:10pt;"><br>Surabaya, <?php echo date("d-m-Y");?>
     <br><br>
   
<p>&nbsp;</p>
   <p><br>
     <br> 
    <u>(AUTORIZE SIGNATURE)</u></p></td>
 </tr>  
</table> 

    <?php
//	echo "<div class='page' align='center'>Hal - ".$page."</div>";
?>
</body>