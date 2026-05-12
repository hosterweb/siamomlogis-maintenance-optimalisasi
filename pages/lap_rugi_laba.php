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
                        			<h4 class="header-title m-t-0 m-b-30">Laporan Laba Rugi</h4>
<div class="form-group">    
<label class="col-lg-4 control-label">Pencarian Berdasarkan Tanggal</label>
<div class="col-lg-8">
<FORM action="" method="post" name="cari" id="cari">
<input type="text" class="form-control" name="tgl1" id="datepicker-autoclose5" style="width:30%; float:left"><span style="float:left">&nbsp;&nbsp;s/d &nbsp;&nbsp;</span><input type="text" class="form-control" name="tgl2" id="datepicker-autoclose6" style="width:30%; float:left">

<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="cari"><i class="fa fa-search">&nbsp; Cari</i></button>
</FORM>
</div></div>                                    
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
  <tbody>
  
  <tr><th>Total Amount</th><td><?php
  	$tgl1= $_POST['tgl1'];	
	$tgl2= $_POST['tgl2'];
	$text1 = mysqli_query($koneksi,"SELECT * FROM create_job_copy where tgl between '$tgl1' AND '$tgl2'");
	while($db1=mysqli_fetch_array($text1)){
		$t_amount += $db1['total_amount'];
	}
	echo "Rp.";				
	echo number_format($t_amount);
	?> </td></tr>
    
  	<tr><th>Total Cost</th><td><?php
								   
	$text2 = mysqli_query($koneksi,"SELECT * FROM create_job_copy where tgl between '$tgl1' AND '$tgl2'");
	while($db2=mysqli_fetch_array($text2)){
	$t_cost += $db2['total_receivable'];
	}
	echo "Rp.";				
	echo number_format($t_cost);
	?> </td></tr>
    
    
    
    <tr><th>Profit</th><td><?php
	$text3 = mysqli_query($koneksi,"SELECT * FROM create_job_copy where tgl between '$tgl1' AND '$tgl2'");
	while($db3=mysqli_fetch_array($text3)){
		$t_cost2 += $db3['total_receivable'];
		$t_amount2 += $db3['total_amount'];
	}
	echo "Rp.";				
	echo number_format($profit=$t_amount2-$t_cost2);
	?></td></tr>
    
    <tr> <th colspan="2"><hr></th> </tr>
    
    <tr><th>Profit</th><td>
    <?php
	echo "Rp.";				
	echo number_format($profit);
	?></td></tr>
     
     <tr> <th>Kas Keluar</th><td><?php
	$text5 = mysqli_query($koneksi,"SELECT * FROM arus_kas_keluar where tgl between '$tgl1' AND '$tgl2'");
	while($db5=mysqli_fetch_array($text5)){
		$arus_kas_keluar += $db5['nominal'];
	}
	echo "Rp.";				
	echo number_format($arus_kas_keluar);
		?></td></tr>
    
    <tr><th colspan="2"><hr /></th></tr>
      
    <tr><th>Laba</th><td><?php
	$laba = $profit-$arus_kas_keluar;
	if($laba>0){
	echo "Rp.";			
	echo number_format($laba);
	}
	else { echo "Rp. 0";}
	?></td></tr>
     
     <tr><th>Rugi</th><td>
     <?php
     $rugi = $profit-$arus_kas_keluar;
	if($rugi<0){
	echo "Rp.";				
	echo number_format($rugi);
		}
		else { echo "Rp. 0";}
		?>
     </td></tr>
                      <tr><td colspan="2" align="center"><a href="pages/rugi_laba_excel.php?tgl1=<?php echo $tgl1;?>&tgl2=<?php echo $tgl2;?>"><button value="Download Excel">Download Excel</button></a></td></tr>                   
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