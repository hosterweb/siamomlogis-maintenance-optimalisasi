<?php
// Fungsi header dengan mengirimkan raw data excel

header("Content-type: application/vnd-ms-excel");
$tanggal_awal=$_POST['tanggal_awal'];
$tanggal_akhir=$_POST['tanggal_akhir'];
$tgl1 = date('Y-m-d', strtotime($tanggal_awal));
$tgl2 = date('Y-m-d', strtotime($tanggal_akhir));
$job=$_POST['job']; 
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
$nama_file="export-".$job."-tgl-".$tanggal_awal." s/d ".$tanggal_akhir.".xls";
header("Content-Disposition: attachment; filename=$nama_file");

// Tambahkan table
?>
<table id="example" width="100%" align="center">
<tr><td colspan="53" align="center"><h3>Data Job <?php echo $job;?></h3></td> </tr>
<tr><td colspan="53" align="center"><h3>Pencarian Data <?php echo $tanggal_awal;?> s/d <?php echo $tanggal_akhir;?></h3></td> </tr>                
</table>
<br><br>
              <table border="1px solid black" id="example" width="100%">
                <thead>
                    <tr>
                    <th align="center">No</th>
<th align="center">shipment</th>
<th align="center">tgl</th>
<th align="center">customer</th>
<th align="center">job_number</th>
<th align="center">co number</th>
<th align="center">invoice_number</th>
<th align="center">marketing</th>
<th align="center">master_bl</th>
<th align="center">house_bl</th>
<th align="center">poi</th>
<th align="center">pod</th>
<th align="center">vessel_boy</th>
<th align="center">agent</th>
<th align="center">container</th>
<th align="center">remark</th>
<th align="center">currency</th>
<th align="center">kondition</th>
<th align="center">destination</th>
<th align="center">loading</th>
<th align="center">qty</th>
<th align="center">description1</th>
<th align="center">amount1</th>
<th align="center">receivable1</th>
<th align="center">description2</th>
<th align="center">amount2</th>
<th align="center">receivable2</th>
<th align="center">description3</th>
<th align="center">amount3</th>
<th align="center">receivable3</th>
<th align="center">description4</th>
<th align="center">amount4</th>
<th align="center">receivable4</th>
<th align="center">description5</th>
<th align="center">amount5</th>
<th align="center">receivable5</th>
<th align="center">description6</th>
<th align="center">amount6</th>
<th align="center">receivable6</th>
<th align="center">description7</th>
<th align="center">amount7</th>
<th align="center">receivable7</th>
<th align="center">description8</th>
<th align="center">amount8</th>
<th align="center">receivable8</th>
<th align="center">description9</th>
<th align="center">amount9</th>
<th align="center">receivable9</th>
<th align="center">description10</th>
<th align="center">amount10</th>
<th align="center">receivable10</th>
<th align="center">pajak</th>
<th align="center">loss_profit</th>
</tr>
                </thead>
                <tbody>
                <?php 
				include "components/koneksi.php"; 
				$no=0;
				if($job=="all"){
				$x=mysqli_query($koneksi,"SELECT * FROM create_job_copy where tgl between '$tgl1' AND '$tgl2'");
				}
				else {
				$x=mysqli_query($koneksi,"SELECT * FROM create_job_copy where shipment='$job' AND tgl between '$tgl1' AND '$tgl2'");

					}
				while($ambil=mysqli_fetch_array($x)){
				$no++
				?>
                    <tr>
<td align="center"><?php echo $no; ?></td>
<td align="center"><?php echo $ambil['shipment']; ?></td>
<td align="center"><?php echo $ambil['tgl']; ?></td>
<td align="center"><?php echo $ambil['customer']; ?></td>
<td align="center"><?php echo $ambil['job_number']; ?></td>
<td align="center"><?php echo $ambil['co_nu']; ?></td>
<td align="center"><?php echo $ambil['invoice_number']; ?></td>
<td align="center"><?php echo $ambil['marketing']; ?></td>
<td align="center"><?php echo $ambil['master_bl']; ?></td>
<td align="center"><?php echo $ambil['house_bl']; ?></td>
<td align="center"><?php echo $ambil['poi']; ?></td>
<td align="center"><?php echo $ambil['pod']; ?></td>
<td align="center"><?php echo $ambil['vessel_boy']; ?></td>
<td align="center"><?php echo $ambil['agent']; ?></td>
<td align="center"><?php echo $ambil['container']; ?></td>
<td align="center"><?php echo $ambil['remark']; ?></td>
<td align="center"><?php echo $ambil['currency']; ?></td>
<td align="center"><?php echo $ambil['kondition']; ?></td>
<td align="center"><?php echo $ambil['destination']; ?></td>
<td align="center"><?php echo $ambil['loading']; ?></td>
<td align="center"><?php echo $ambil['qty']; ?></td>
<td align="center"><?php echo $ambil['description1']; ?></td>
<td align="center"><?php echo $ambil['amount1']; ?></td>
<td align="center"><?php echo $ambil['receivable1']; ?></td>
<td align="center"><?php echo $ambil['description2']; ?></td>
<td align="center"><?php echo $ambil['amount2']; ?></td>
<td align="center"><?php echo $ambil['receivable2']; ?></td>
<td align="center"><?php echo $ambil['description3']; ?></td>
<td align="center"><?php echo $ambil['amount3']; ?></td>
<td align="center"><?php echo $ambil['receivable3']; ?></td>
<td align="center"><?php echo $ambil['description4']; ?></td>
<td align="center"><?php echo $ambil['amount4']; ?></td>
<td align="center"><?php echo $ambil['receivable4']; ?></td>
<td align="center"><?php echo $ambil['description5']; ?></td>
<td align="center"><?php echo $ambil['amount5']; ?></td>
<td align="center"><?php echo $ambil['receivable5']; ?></td>
<td align="center"><?php echo $ambil['description6']; ?></td>
<td align="center"><?php echo $ambil['amount6']; ?></td>
<td align="center"><?php echo $ambil['receivable6']; ?></td>
<td align="center"><?php echo $ambil['description7']; ?></td>
<td align="center"><?php echo $ambil['amount7']; ?></td>
<td align="center"><?php echo $ambil['receivable7']; ?></td>
<td align="center"><?php echo $ambil['description8']; ?></td>
<td align="center"><?php echo $ambil['amount8']; ?></td>
<td align="center"><?php echo $ambil['receivable8']; ?></td>
<td align="center"><?php echo $ambil['description9']; ?></td>
<td align="center"><?php echo $ambil['amount9']; ?></td>
<td align="center"><?php echo $ambil['receivable9']; ?></td>
<td align="center"><?php echo $ambil['description10']; ?></td>
<td align="center"><?php echo $ambil['amount10']; ?></td>
<td align="center"><?php echo $ambil['receivable10']; ?></td>
<td align="center"><?php echo $ambil['pajak']; ?>%</td>
<td align="center"><?php echo $ambil['loss_profit']; ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>