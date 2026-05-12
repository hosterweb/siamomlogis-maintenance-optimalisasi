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
			width: 18cm;
		}
		table td {
			word-wrap:break-word;
			font-size:14px;
			padding:2px;
			width:25%;	}
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
</head>
<body>
	
<h2 style="text-align: center;">JOB ORDER ENTRY</h2>
<table border="1" width="50%"><tr><td>CONTROL NUMBER</td><td><?php echo $data['co_nu'];?></td></tr></table>
<br>
<table border="1" width="100%">
	<tr><td>JOB NUMBER</td>			<td><?php echo $data['job_number'];?></td>					<td>LOADING</td><td><?php echo $data['loding'];?></td></tr>
	<tr><td>DATE</td>				<td><?php echo $data['tgl'];?></td>							<td>DESTINATION</td><td><?php echo $data['destination'];?></td></tr>
   	<tr><td>SHIPPER/CONSIGNEE</td>	<td><?php echo $data['customer'];?></td><td>QUANTITY</td><td><?php echo $data['qty'];?></td></tr>
   	<tr><td>VESSEL & VOY</td>		<td><?php echo $data['vessel_boy'];?></td>					<td>BL NUMBER</td><td><?php echo $data['house_bl'];?></td></tr>
   	<tr><td>ETA/ETD</td>			<td><?php echo $data['eta_etd'];?></td>						<td>SHIPMENT</td><td><?php echo $data['shipment'];?></td></tr>
   	<tr><td>SALES</td>				<td><?php echo $data['marketing'];?></td>					<td>CONDITION</td><td><?php echo $data['kondition'];?></td></tr>
</table>
	<br>
	
<table border="1" width="100%">
	<tr>
    <td rowspan="2" align="center" width="10%">NO</td>
    <td rowspan="2" align="center" class="description">DESCRIPTION</td>
    <td align="center" >AMOUNT</td>
    <td  align="center">COSTING</td></tr>
    <tr><td  align="center"><?php echo $data['currency'];?></td><td  align="center"><?php echo $data['currency'];?></td></tr>
    
    <?php if(!empty($data['description1'])){
		?>
	<tr>
	    <td align="center" width="10%">1</td>
	    <td class="description"><?php echo $data['description1'];?></td>
	    <td align="right" class="k"><?php echo $data['amount1'];?></td>
	    <td align="right" class="k"><?php echo $data['receivable1'];?></td>
	    </tr>
   	<?php }
	else {
		?>
        <tr><td width="10%">&nbsp;</td>
        <td class="description">&nbsp;</td>
        <td  class="k">&nbsp;</td>
        <td  class="k">&nbsp;</td>
        </tr>
		<?php
		}
	?>
    
     <?php if(!empty($data['description2'])){
		?>
	<tr>
	<td align="center" width="10%">2</td>
	<td class="description"><?php echo $data['description2'];?></td>
	<td  class="k" align="right"><?php echo $data['amount2'];?></td>
	<td  class="k" align="right"><?php echo $data['receivable2'];?></td>
	</tr>
   	<?php }
	else {
		?>
        <tr>
        <td width="10%">&nbsp;</td>
        <td class="description">&nbsp;</td>
        <td  class="k">&nbsp;</td>
        <td  class="k">&nbsp;</td>
        </tr>
		<?php
		}
	?>
    
     <?php if(!empty($data['description3'])){
		?>
	<tr>
	<td align="center" width="10%">3</td>
	<td class="description"><?php echo $data['description3'];?></td>
	<td  class="k" align="right"><?php echo $data['amount3'];?></td>
	<td  class="k" align="right"><?php echo $data['receivable3'];?></td>
	</tr>
   	<?php }
	else {
		?>
        <tr>
        <td width="10%">&nbsp;</td>
        <td class="description">&nbsp;</td>
        <td  class="k">&nbsp;</td>
        <td  class="k">&nbsp;</td></tr>
		<?php
		}
	?>
    
     <?php if(!empty($data['description4'])){
		?>
	<tr>
	    <td align="center" width="10%">4</td>
	    <td class="description" ><?php echo $data['description4'];?></td>
	    <td  class="k" align="right"><?php echo $data['amount4'];?></td>
	    <td  class="k" align="right"><?php echo $data['receivable4'];?></td>
	    </tr>
   	<?php }
	else {
		?>
        <tr>
            <td width="10%">&nbsp;</td>
        <td class="description">&nbsp;</td>
        <td  class="k">&nbsp;</td>
        <td  class="k">&nbsp;</td>
        </tr>
		<?php
		}
	?>
    
     <?php if(!empty($data['description5'])){
		?>
	<tr><td align="center" width="10%">5</td>
	<td class="description"><?php echo $data['description5'];?></td>
	<td  class="k" align="right"><?php echo $data['amount5'];?></td>
	<td  class="k" align="right"><?php echo $data['receivable5'];?></td>
	</tr>
   	<?php }
	else {
		?>
        <tr>
            <td width="10%">&nbsp;</td>
            <td class="description">&nbsp;</td>
            <td class="k" >&nbsp;</td>
            <td class="k" >&nbsp;</td>
            </tr>
		<?php
		}
	?>
    
     <?php if(!empty($data['description6'])){
		?>
	<tr>
	    <td align="center" width="10%">6</td>
	    <td class="description"><?php echo $data['description6'];?></td>
	    <td class="k"  align="right"><?php echo $data['amount6'];?></td>
	    <td class="k"  align="right"><?php echo $data['receivable6'];?></td>
	    </tr>
   	<?php }
	else {
		?>
        <tr>
            <td width="10%">&nbsp;</td>
            <td class="description">&nbsp;</td>
            <td class="k" >&nbsp;</td>
            <td class="k" >&nbsp;</td>
            </tr>
		<?php
		}
	?>
    
     <?php if(!empty($data['description7'])){
		?>
	<tr>
	    <td align="center" width="10%">7</td>
	    <td class="description"><?php echo $data['description7'];?></td>
	    <td class="k"  align="right"><?php echo $data['amount7'];?></td>
	    <td class="k"  align="right"><?php echo $data['receivable7'];?></td>
	    </tr>
   <?php }
	else {
		?>
        <tr>
            <td width="10%">&nbsp;</td>
            <td class="description">&nbsp;</td>
            <td class="k" >&nbsp;</td>
            <td class="k" >&nbsp;</td>
            </tr>
		<?php
		}
	?>
    
     <?php if(!empty($data['description8'])){
		?>
	<tr>
	    <td align="center" width="10%">8</td>
	    <td class="description"><?php echo $data['description8'];?></td>
	    <td class="k"  align="right"><?php echo $data['amount8'];?></td>
	    <td class="k"  align="right"><?php echo $data['receivable8'];?></td>
	    </tr>
   <?php }
	else {
		?>
        <tr>
            <td width="10%">&nbsp;</td>
            <td class="description">&nbsp;</td>
            <td class="k" >&nbsp;</td>
            <td class="k" >&nbsp;</td>
            </tr>
		<?php
		}
	?>
    
     <?php if(!empty($data['description9'])){
		?>
	<tr>
	    <td align="center" width="10%">9</td>
	    <td class="description"><?php echo $data['description9'];?></td>
	    <td class="k"  align="right"><?php echo $data['amount9'];?></td>
	    <td class="k"  align="right"><?php echo $data['receivable9'];?></td>
	    </tr>
   	<?php }
	else {
		?>
        <tr>
            <td width="10%">&nbsp;</td>
            <td class="description">&nbsp;</td>
            <td class="k" >&nbsp;</td>
            <td class="k" >&nbsp;</td></tr>
		<?php
		}
	?>
    
     <?php if(!empty($data['description10'])){
		?>
	<tr>
	    <td align="center" width="10%">10</td>
	    <td class="description"><?php echo $data['description10'];?></td>
        <td class="k"  align="right"><?php echo $data['amount10'];?></td>
	    <td class="k"  align="right"><?php echo $data['receivable10'];?></td>
	    </tr>
   <?php }
	else {
		?>
        <tr>
            <td width="10%">&nbsp;</td>
            <td class="description">&nbsp;</td>
            <td class="k" >&nbsp;</td>
            <td class="k" >&nbsp;</td>
            </tr>
		<?php
		}
	?>
	<tr>
    <td colspan="2">Pajak</td>
    <td colspan="2" align="right"><?php echo $data['pajak'];?> %</td>
    </tr>
	
	<tr>
    <td colspan="2">Total</td>
    <?php $total_amount2=str_replace(",","",$data['total_amount']); ?>	
    <?php $total_receivable2=str_replace(",","",$data['total_receivable']); ?>	
    
    <td  align="right"><?php echo number_format($total_amount2);?></td>
    <td  align="right"><?php echo number_format($total_receivable2);?></td></tr>
	<tr>
    <td colspan="2">Grand Total</td>
    <td align="right">
        <?php $oo= $total_amount2 * $data['pajak']/100; ?>
        <?php echo number_format($total_amount2 + $oo);?> 
    </td>
    <td>&nbsp;</td>
    </tr>
</table>   <br>

<table border="1" width="733">
<tr>
	<td align="center" width="10%">NO</td>
	<td align="center"  class="description1">DESKRIPSI</td>
    <td align="center" >BONUS MASUK</td>
    <td align="center">BONUS KELUAR</td>
</tr>


<?php if(!empty($data['d_bonus1'])){?>
<tr style="padding-left:5px">
	<td style="padding-left:5px; text-align:center;" width="10%">1</td>
	<td style="padding-left:5px; text-align:left;"  class="description1"><?php echo $data['d_bonus1'];?></td>
    <td style="padding-left:5px; text-align:right;" ><?php 
									if(empty($data['bonusm1'])) { echo "0"; } else {
									echo number_format($data['bonusm1']); } ?></td>
    <td style="padding-left:5px; text-align:right;"><?php 
									if(empty($data['bonusk1'])) { echo "0"; } else {
									echo number_format($data['bonusk1']); } ?></td>
    </tr>
	<?php }
	else {
	?>
    <tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">&nbsp;</td>
	<td style="padding-left:5px; text-align:center;"  class="description1">&nbsp;</td>
    <td style="padding-left:5px; text-align:center;" >&nbsp;</td>
    <td style="padding-left:5px; text-align:center;">&nbsp;</td>
    </tr>
	<?php }?>
<?php if(!empty($data['d_bonus2'])){?>
<tr style="padding-left:5px">
	<td style="padding-left:5px; text-align:center;" width="10%">2</td>
	<td style="padding-left:5px; text-align:left;" class="description1"><?php echo $data['d_bonus2'];?></td>
    <td style="padding-left:5px; text-align:right;" ><?php 
									if(empty($data['bonusm2'])) { echo "0"; } else {
									echo number_format($data['bonusm2']); } ?></td>
    <td style="padding-left:5px; text-align:right;"><?php 
									if(empty($data['bonusk2'])) { echo "0"; } else {
									echo number_format($data['bonusk2']); } ?></td>
    </tr>
	<?php }
	else {
	?>
    <tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">&nbsp;</td>
	<td style="padding-left:5px; text-align:center;"  class="description1">&nbsp;</td>
    <td style="padding-left:5px; text-align:center;" >&nbsp;</td>
    <td style="padding-left:5px; text-align:center;">&nbsp;</td>
</tr>
    <?php }?>
<?php if(!empty($data['d_bonus3'])){?>
<tr style="padding-left:5px">
	<td style="padding-left:5px; text-align:center;" width="10%">3</td>
	<td style="padding-left:5px; text-align:left;"  class="description1"><?php echo $data['d_bonus3'];?></td>
   <td style="padding-left:5px; text-align:right;" ><?php 
									if(empty($data['bonusm3'])) { echo "0"; } else {
									echo number_format($data['bonusm3']); } ?></td>
    <td style="padding-left:5px; text-align:right;"><?php 
									if(empty($data['bonusk3'])) { echo "0"; } else {
									echo number_format($data['bonusk3']); } ?></td>
 </tr>  
    <?php }
	else {
	?>
    <tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">&nbsp;</td>
	<td style="padding-left:5px; text-align:center;"  class="description1">&nbsp;</td>
    <td style="padding-left:5px; text-align:center;" >&nbsp;</td>
    <td style="padding-left:5px; text-align:center;">&nbsp;</td>
    </tr>
	<?php }?>
	<?php if(!empty($data['d_bonus4'])){?>
<tr style="padding-left:5px">
	<td style="padding-left:5px; text-align:center;" width="10%">4</td>
	<td style="padding-left:5px; text-align:left;"  class="description1"><?php echo $data['d_bonus4'];?></td>
    <td style="padding-left:5px; text-align:right;" ><?php 
									if(empty($data['bonusm4'])) { echo "0"; } else {
									echo number_format($data['bonusm4']); } ?></td>
    <td style="padding-left:5px; text-align:right;"><?php 
									if(empty($data['bonusk4'])) { echo "0"; } else {
									echo number_format($data['bonusk4']); } ?></td>
   </tr>
    <?php }
	else {
	?>
    <tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">&nbsp;</td>
	<td style="padding-left:5px; text-align:center;"  class="description1">&nbsp;</td>
    <td style="padding-left:5px; text-align:center;" >&nbsp;</td>
    <td style="padding-left:5px; text-align:center;">&nbsp;</td>
    </tr>
	<?php }?>
	<?php if(!empty($data['d_bonus5'])){?>
<tr style="padding-left:5px">
	<td style="padding-left:5px; text-align:center;" width="10%">5</td>
	<td style="padding-left:5px; text-align:left;"  class="description1"><?php echo $data['d_bonus5'];?></td>
    <td style="padding-left:5px; text-align:right;" ><?php 
									if(empty($data['bonusm5'])) { echo "0"; } else {
									echo number_format($data['bonusm5']); } ?></td>
    <td style="padding-left:5px; text-align:right;"><?php 
									if(empty($data['bonusk5'])) { echo "0"; } else {
									echo number_format($data['bonusk5']); } ?></td>
    </tr>
	<?php }
	else {
	?>
    <tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">&nbsp;</td>
	<td style="padding-left:5px; text-align:center;"  class="description1">&nbsp;</td>
    <td style="padding-left:5px; text-align:center;" >&nbsp;</td>
    <td style="padding-left:5px; text-align:center;">&nbsp;</td>
    </tr>
	<?php }?>
	<?php if(!empty($data['d_bonus6'])){?>
<tr style="padding-left:5px">
	<td style="padding-left:5px; text-align:center;" width="10%">6</td>
	<td style="padding-left:5px; text-align:left;"  class="description1"><?php echo $data['d_bonus6'];?></td>
   <td style="padding-left:5px; text-align:right;" ><?php 
									if(empty($data['bonusm6'])) { echo "0"; } else {
									echo number_format($data['bonusm6']); } ?></td>
    <td style="padding-left:5px; text-align:right;"><?php 
									if(empty($data['bonusk6'])) { echo "0"; } else {
									echo number_format($data['bonusk6']); } ?></td></tr>
    <?php }
	else {
	?>
    <tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">&nbsp;</td>
	<td style="padding-left:5px; text-align:center;"  class="description1">&nbsp;</td>
    <td style="padding-left:5px; text-align:center;" >&nbsp;</td>
    <td style="padding-left:5px; text-align:center;">&nbsp;</td>
    </tr>
	<?php }?>
<?php if(!empty($data['d_bonus7'])){?>
	<tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">7</td>
	<td style="padding-left:5px; text-align:left;"  class="description1"><?php echo $data['d_bonus7'];?></td>
    <td style="padding-left:5px; text-align:right;" ><?php 
									if(empty($data['bonusm7'])) { echo "0"; } else {
									echo number_format($data['bonusm7']); } ?></td>
    <td style="padding-left:5px; text-align:right;"><?php 
									if(empty($data['bonusk7'])) { echo "0"; } else {
									echo number_format($data['bonusk7']); } ?></td>
    </tr>
	<?php }
	else {
	?>
    <tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">&nbsp;</td>
	<td style="padding-left:5px; text-align:center;"  class="description1">&nbsp;</td>
    <td style="padding-left:5px; text-align:center;" >&nbsp;</td>
    <td style="padding-left:5px; text-align:center;">&nbsp;</td>
    </tr>
	<?php }?>
<?php if(!empty($data['d_bonus8'])){?>
<tr style="padding-left:5px">
	<td style="padding-left:5px; text-align:center;" width="10%">8</td>
	<td style="padding-left:5px; text-align:left;"  class="description1"><?php echo $data['d_bonus8'];?></td>
   <td style="padding-left:5px; text-align:right;" ><?php 
									if(empty($data['bonusm8'])) { echo "0"; } else {
									echo number_format($data['bonusm8']); } ?></td>
    <td style="padding-left:5px; text-align:right;"><?php 
									if(empty($data['bonusk8'])) { echo "0"; } else {
									echo number_format($data['bonusk8']); } ?></td> </tr>
	<?php }
	else {
	?>
    <tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">&nbsp;</td>
	<td style="padding-left:5px; text-align:center;"  class="description1">&nbsp;</td>
    <td style="padding-left:5px; text-align:center;" >&nbsp;</td>
    <td style="padding-left:5px; text-align:center;">&nbsp;</td>
    </tr>
	<?php }?>
<?php if(!empty($data['d_bonus9'])){?>
<tr style="padding-left:5px">
	<td style="padding-left:5px; text-align:center;" width="10%">9</td>
	<td style="padding-left:5px; text-align:left;"  class="description1"><?php echo $data['d_bonus9'];?></td>
    <td style="padding-left:5px; text-align:right;" ><?php 
									if(empty($data['bonusm9'])) { echo "0"; } else {
									echo number_format($data['bonusm9']); } ?></td>
    <td style="padding-left:5px; text-align:right;"><?php 
									if(empty($data['bonusk9'])) { echo "0"; } else {
									echo number_format($data['bonusk9']); } ?></td></tr>
	<?php }
	else {
	?>
    <tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">&nbsp;</td>
	<td style="padding-left:5px; text-align:center;"  class="description1">&nbsp;</td>
    <td style="padding-left:5px; text-align:center;" >&nbsp;</td>
    <td style="padding-left:5px; text-align:center;">&nbsp;</td>
    </tr>
	<?php }?>
	<?php if(!empty($data['d_bonus10'])){?>
	<tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">10</td>
	<td style="padding-left:5px; text-align:left;"  class="description1"><?php echo $data['d_bonus10'];?></td>
    <td style="padding-left:5px; text-align:right;" ><?php 
									if(empty($data['bonusm10'])) { echo "0"; } else {
									echo number_format($data['bonusm10']); } ?></td>
    <td style="padding-left:5px; text-align:right;"><?php 
									if(empty($data['bonusk10'])) { echo "0"; } else {
									echo number_format($data['bonusk10']); } ?></td> </tr>
	<?php }
	else {
	?>
    <tr style="padding-left:5px">
    <td style="padding-left:5px; text-align:center;" width="10%">&nbsp;</td>
	<td style="padding-left:5px; text-align:center;"  class="description1">&nbsp;</td>
    <td style="padding-left:5px; text-align:center;" >&nbsp;</td>
    <td style="padding-left:5px; text-align:center;">&nbsp;</td>
    </tr>
	<?php }?>

</table>
<br>
<table border="1" width="100%">
<tr>
<td class="separo" align="center">PROFIT  <?php echo $data['currency'];?></td>

<?php $loss_profit2=str_replace(",","",$data['loss_profit']); ?>   
<td  class="separo" align="right"> <?php echo number_format($loss_profit2);?></td></tr></table>
<br><br>
<table border="1" width="100%">
<tr><td align="center">Approved by</td><td align="center">Entry ID</td><td align="center">Verified by</td><td align="center">Sales</td></tr>
<tr><td align="center"><br><br><br><br><br>(........................)</td><td align="center"><br><br><br><br><br>(........................)</td><td align="center"><br><br><br><br><br>(........................)</td><td align="center"><br><br>NOMINASI<br><br><br>(........................)</td></tr>
</table>
<br>
JAMINAN CONTAINER  &nbsp;&nbsp;&nbsp;:
<br>
CREDIT TERMS  &nbsp;&nbsp;&nbsp;     :   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  CREDIT DAYS
</body>
</html>
<?php
$j=$data['job_number'];
$html = ob_get_contents();
ob_end_clean();
        
require_once('../assets/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output($j.'.pdf', 'D');
?>
