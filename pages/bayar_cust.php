     <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                    
                    <div class="row">
							<div class="col-sm-12">
								<div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Customer</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											if (isset($_GET['hapus'])) {
											$id_hapus=$_GET['hapus'];
											$ex=mysqli_query($koneksi,"DELETE FROM customer WHERE id='$id_hapus'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Hapus.
											</div>
											<?php	}
											}
											if (isset($_POST['submit'])){
												$job_number2=$_POST['job_number'];
												$co_nu2=$_POST['co_nu'];
												$invoice_number2=$_POST['invoice_number'];
												$shipment2=$_POST['shipment'];
												$piutang2=$_POST['piutang'];
												$bayar2=$_POST['bayar'];
												$tgl=date("d-m-Y");
												$nama_bank=$_POST['nama_bank'];
												$no_rekening=$_POST['no_rekening'];
	   												
												$id=$_POST['id'];
												$piutang_baru=$piutang2-$bayar2;
												
												$des="Pembayaran Piutang Inv ".$invoice_number2;
$insert=mysqli_query($koneksi,"INSERT INTO bayar_customer SET job_number='$job_number2', co_nu='$co_nu2', invoice_number='$invoice_number2', shipment='$shipment2', piutang='$piutang_baru', bayar='$bayar2', tgl='$tgl', nama_bank='$nama_bank', no_rekening='$no_rekening'");
if($piutang_baru<0){
$cari2=mysqli_query($koneksi, "SELECT * FROM arus_kas_masuk order by id DESC LIMIT 1");
$data=mysqli_fetch_array($cari2);
$s_saldo=$data['sisa_saldo'];
$tambah_saldo=$s_saldo+$bayar2;	
$insert=mysqli_query($koneksi,"INSERT INTO arus_kas_masuk SET deskripsi='$des', nama_bank='$nama_bank', no_rekening='$no_rekening', sisa_saldo='$tambah_saldo', tgl='$tgl'");	
mysqli_query($koneksi,"UPDATE create_job_copy SET kondition='Cash' WHERE job_number='$job_number2' AND co_nu='$co_nu2' AND invoice_number='$invoice_number2' AND shipment='$shipment2'");	}

else{
mysqli_query($koneksi,"INSERT INTO arus_kas_masuk SET deskripsi='$des', nama_bank='$nama_bank', no_rekening='$no_rekening', sisa_saldo='$tambah_saldo', tgl='$tgl'");	
	
	}
												if($insert){
												?>
												<div class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Simpan.
											</div>
											<?php	}
											else {?>
												<div class="alert alert-danger alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Maaf!</strong> Data Gagal Di Simpan.
											</div>
                                                <?php
												}
												}
												$id=$_GET['id'];
										$cari=mysqli_query($koneksi,"SELECT * FROM create_job_copy where id='$id'");
										$hasilnya=mysqli_fetch_array($cari);
										$job_number=$hasilnya['job_number'];
										$co_nu=$hasilnya['co_nu'];
										$invoice_number=$hasilnya['invoice_number'];
										$shipment=$hasilnya['shipment'];
										$total_amount=$hasilnya['total_amount'];
			$cari_data=mysqli_query($koneksi,"SELECT * FROM bayar_customer where job_number='$job_number' AND co_nu='$co_nu' AND invoice_number='$invoice_number' AND shipment='$shipment' order by id DESC");
			$hasil_cari=mysqli_num_rows($cari_data);
			$hasil=mysqli_fetch_array($cari_data);		
			if ($hasil_cari==0) {
				$data_shipment=$shipment;
				$data_job_number=$job_number;
				$data_co_nu=$co_nu;
				$data_invoice_number=$invoice_number;
				$piutang=$total_amount;
				}
				else {
				$data_shipment=$hasil['shipment'];
				$data_job_number=$hasil['job_number'];
				$data_co_nu=$hasil['co_nu'];
				$data_invoice_number=$hasil['invoice_number'];
				$piutang=$hasil['piutang'];
										
				}
											?>
                                            
												<form class="form-horizontal" method="post" action="">
    
                                                                                 
<div class="form-group">    
<label class="col-lg-4 control-label">Shipment</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="shipment" value="<?php echo $data_shipment;?>" id="shipment" required>
</div></div>
                                                      
<div class="form-group">    
<label class="col-lg-4 control-label">Job Number</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="job_number"  value="<?php echo $data_job_number;?>"  id="job_number" readonly="readonly">
</div></div> 

<div class="form-group">    
<label class="col-lg-4 control-label">Co Number</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="co_nu"  value="<?php echo $data_co_nu;?>"  id="co_nu" readonly="readonly">
</div></div>  

<div class="form-group">    
<label class="col-lg-4 control-label">Invoice Number</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="invoice_number"  value="<?php echo $data_invoice_number;?>" readonly="readonly"  id="invoice_number">
</div></div>                                                
 
<div class="form-group">    
<label class="col-lg-4 control-label">Piutang</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="piutang"  value="<?php echo $piutang;?>" readonly="readonly"  id="piutang">
</div></div> 

<div class="form-group">    
<label class="col-lg-4 control-label">Bayar Piutang</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="bayar"  id="bayar" onkeyup="formatNumber(this);" onchange="formatNumber(this);">
</div></div>  

<div class="form-group">    
<label class="col-lg-4 control-label">Nama Bank</label>
<div class="col-lg-8">
<select name="nama_bank" id="nama_bank" class="form-control">
<option value="">---</option>
<?php 
$a=mysqli_query($koneksi,"SELECT * FROM saldo_awal_mom");
while($b=mysqli_fetch_array($a)){
?>
<option value="<?php echo $b['nama_bank'];?>"><?php echo $b['nama_bank'];?></option>
<?php } ?>
</select>
</div></div>                                                

<div class="form-group">    
<label class="col-lg-4 control-label">No Rekening</label>
<div class="col-lg-8">
<select name="no_rekening" id="no_rekening" class="form-control">
<option value="">---</option>
<?php 
$a=mysqli_query($koneksi,"SELECT * FROM saldo_awal_mom");
while($b=mysqli_fetch_array($a)){
?>
<option value="<?php echo $b['no_rekening'];?>"><?php echo $b['no_rekening'];?></option>
<?php } ?>
</select>
</div></div> 

                                              
<div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>
<a href="?page=piutang_cust">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="button" value="kembali" name="kembali"><i class="fa fa-plus">&nbsp; Kembali</i></button>
</a>
</div></div>                  
                                                </form>

											</div>

										</div><!-- end col -->

									</div><!-- end row -->
								</div>
							</div><!-- end col -->
						</div>
                        <!-- end row -->
                    
                    
                    <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                        			<h4 class="header-title m-t-0 m-b-30">Piutang Customer</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                           <tr>
                                           
                                              <th>No</th>
                                              <th>Tanggal</th>
                                              <th>Shipment</th>
                                              <th>Job Number</th>
                                              <th>CO Number</th>
                                              <th>Invoice Number</th>
                                              <th>Sisa Piutang</th>
                                              <th>Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
function rupiah($angka){	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}

	$text = mysqli_query($koneksi,"SELECT * FROM bayar_customer where shipment='$shipment' AND job_number='$job_number' AND co_nu='$co_nu' AND invoice_number='$invoice_number'");
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
<td><?php echo number_format($db['piutang']); ?></td>
<td><?php echo number_format($db['bayar']); ?></td>
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
