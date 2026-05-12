  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                        			<h4 class="header-title m-t-0 m-b-30">Laporan Pendapatan</h4>
                                    <?php 
											if (isset($_GET['bayar'])) {
											$id_bayar=$_GET['bayar'];
											$ex=mysqli_query($koneksi,"UPDATE create_job_copy SET kondition='Cash' WHERE id='$id_bayar'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Proses.
											</div>
											<?php	} }
											?>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                           <tr>
                                           
                                             <th>No</th>
                                              <th>Tanggal</th>
                                              <th>Shipment</th>
                                              <th>Job Number</th>
                                              <th>CO Number</th>
                                              <th>Invoice Number</th>
                                              <th>Condition</th>
                                              <th>Currency</th>
                                              <th>Total Amount</th>
                                              <th>Total Costing</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           <?php
function rupiah($angka){	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}
										   
	$text = mysqli_query($koneksi,"SELECT * FROM create_job_copy order by id DESC");
	if(mysqli_num_rows($text)>0){
		$no=1;
		while($db=mysqli_fetch_array($text)){
			
		?>     
<tr>
<td align="center" width="20"><?php echo $no; ?></td>
<td><?php echo $db['tgl']; ?></td>
<td><?php echo $db['shipment']; ?></td>
<td><?php echo $db['job_number']; ?></td>
<td><?php echo $db['co_nu']; ?></td>
<td><?php echo $db['invoice_number']; ?></td>
<td><?php echo $db['kondition']; ?></td>
<td><?php echo $db['currency']; ?></td>
<td><?php echo number_format($db['total_amount']); ?></td>
<td><?php echo number_format($db['total_receivable']); ?></td>
</tr>
    <?php
		$no++;
			$t_amount +=$db['total_amount'];
		$t_receivable +=$db['total_receivable'];
		}
	}else{
	?>
    	<tr>
        	<td colspan="16" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
                                        </tbody>
                                         <tr><td>Total</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><?php echo number_format($t_amount);?></td><td><?php echo number_format($t_receivable);?></td></tr>
<tr><td>Total Loss/Profit</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><?php echo number_format($t_amount - $t_receivable);?></td></tr>
                                    </table>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                        </div> <!-- container -->

                </div> <!-- content -->
                <footer class="footer text-right">
                    Copryright PT. Surabaya Transmoda Jaya Developed By Hosterweb PT. MULTI OKTO MANUNGGAL Development Hosterweb Indonesia
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->