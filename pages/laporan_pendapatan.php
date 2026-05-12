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
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                           <tr>
                                           
                                              <th>No</th>
                                                <th>No Invoice</th>
                                                <th>Tanggal</th>
                                                <th>Harga Pokok</th>
                                                <th>Harga Jual</th>
                                                <th>Laba</th>
                                                <th>Rugi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           <?php
function rupiah($angka){	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
										   
	$text = mysqli_query($koneksi,"SELECT * FROM create_job_copy where status_invoice='1' order by id DESC");
	if(mysqli_num_rows($text)>0){
		$no=1;
		while($db=mysqli_fetch_array($text)){
			
		?>     
<tr>
<td align="center" width="20"><?php echo $no; ?></td>
<td align="center" width="150" ><?php echo $db['invoice_number']; ?></td>
<td><?php echo $db['tgl']; ?></td>
<td><?php echo rupiah($db['total_receivable']); ?></td>
<td><?php echo rupiah($db['total_amount']); ?></td>
<td><?php $laba=$db['total_amount']-$db['total_receivable']; 
if($laba>0)
{ echo rupiah($laba);}
else {echo "-";}
?></td>
<td><?php $rugi=$db['total_amount']-$db['total_receivable']; 
if($rugi<0)
{ echo rupiah($rugi);}
else {echo "-";}
?></td>
    </tr>
    <?php
		$no++;
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