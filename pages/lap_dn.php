  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
<?php
function rupiah($angka){	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}
?>
<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                        			<h4 class="header-title m-t-0 m-b-30">Laporan dn</h4>
<div class="form-group">    
<label class="col-lg-4 control-label">Pencarian Berdasarkan Tanggal</label>
<div class="col-lg-8">
<FORM action="" method="post" name="cari" id="cari">
<input type="text" class="form-control" name="tgl1" id="datepicker-autoclose5" style="width:30%; float:left"><span style="float:left">&nbsp;&nbsp;s/d &nbsp;&nbsp;</span><input type="text" class="form-control" name="tgl2" id="datepicker-autoclose6" style="width:30%; float:left">

<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-search">&nbsp; Cari</i></button>
</FORM>
</div></div>                             
<?php
if (isset($_POST['submit'])){ ?>

<div class="card-box table-responsive">
                        			<h4 class="header-title m-t-0 m-b-30">Daftar Credit Note</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                           <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>dn Number</th>
                                                <th>Shipment</th>
                                                <th>Invoice Number</th>
                                                <th>Job Number</th>
                                                <th>Co Number</th>
											</tr>
                                        </thead>

                                        <tbody>
                                           <?php
                                           	$tgl1= $_POST['tgl1'];	
                                               $tgl2= $_POST['tgl2'];
	$text = mysqli_query($koneksi,"SELECT * FROM dn  where tgl between '$tgl1' AND '$tgl2'");
	if(mysqli_num_rows($text)>0){
		$no=1;
		while($db=mysqli_fetch_array($text)){
			
		?>    
<tr>
<td align="center" width="20"><?php echo $no; ?></td>
<td><?php echo $db['tgl']; ?></td>
<td><?php echo $db['dn_number']; ?></td>
<td align="center" width="50" ><?php echo $db['shipment']; ?></td>
<td><?php echo $db['invoice_number']; ?></td>
<td><?php echo $db['job_number']; ?></td>
<td><?php echo $db['co_nu']; ?></td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="7" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
                      

                                        </tbody>
                                    </table>
<br><br><a href="pages/lap_dn_excel.php?tgl1=<?php echo $tgl1;?>&tgl2=<?php echo $tgl2;?>"><button value="Download Excel">Download Excel</button></a>                                    
                                </div>
                                <?php } ?><br><br><br><br><br><br><br>
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