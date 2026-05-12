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
                                    <h4 class="header-title m-t-0 m-b-30">Tambah Kas Debet</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											if (isset($_GET['hapus'])) {
											$id_hapus=$_GET['hapus'];
											$ex=mysqli_query($koneksi,"DELETE FROM arus_kas_debet WHERE id='$id_hapus'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Hapus.
											</div>
											<?php	}
											}
											if (isset($_POST['submit'])){
													$deskripsi=$_POST['deskripsi'];		
													$nama_bank=$_POST['nama_bank'];
													$no_rekening=$_POST['no_rekening'];
													$nominal=str_replace(",","",$_POST['nominal']);
													$tgl=$_POST['tgl'];													   												
													$id=$_POST['id'];
$cari=mysqli_query($koneksi, "SELECT * FROM saldo_awal_mom where nama_bank='$nama_bank' AND no_rekening='$no_rekening'");
$ambil=mysqli_fetch_array($cari);
$sisa_saldo=str_replace(",","",$ambil['sisa_saldo'])-$nominal;
$saldo_awal=$ambil['sisa_saldo'];													
$insert=mysqli_query($koneksi,"INSERT INTO arus_kas_debet SET deskripsi='$deskripsi', nama_bank='$nama_bank', no_rekening='$no_rekening', saldo_awal='$saldo_awal', nominal='$nominal', sisa_saldo='$sisa_saldo', tgl='$tgl'");

mysqli_query($koneksi,"UPDATE saldo_awal_mom SET sisa_saldo='$sisa_saldo' where nama_bank='$nama_bank' AND no_rekening='$no_rekening'");												

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
											?>
                                            
												<form class="form-horizontal" method="post" action="">
                                                       
<div class="form-group">    
<label class="col-lg-4 control-label">Tgl Transaksi</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="tgl" id="datepicker-autoclose5" value="<?php echo date("Y-m-d");?>" required>
</div></div> 

<div class="form-group">    
<label class="col-lg-4 control-label">Deskripsi</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="deskripsi" id="deskripsi" required>
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

<div class="form-group">    
<label class="col-lg-4 control-label">Nominal</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="nominal" id="nominal" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" required>
</div></div>                                                
<div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>

<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="button" value="kembali" name="kembali"><i class="fa fa-plus">&nbsp; Kembali</i></button>

</div></div>                  
                                                </form>

											</div>

										</div><!-- end col -->

									</div><!-- end row -->
								</div>
							</div><!-- end col -->
						</div>
                        <!-- end row -->
                    
                    
                    <br><br>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                        			<h4 class="header-title m-t-0 m-b-30">Arus Kas Debet</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                           <tr>
                                                <th>No</th>
                                                <th>Tgl</th>
                                                <th>Deskripsi</th>
                                                <th>Nama Bank</th>
                                                <th>NO Rekening</th>
                                                <th>Saldo Awal</th>
                                                <th>Nominal</th>
                                                <th>Sisa Saldo</th>
                                                <th>Aksi</th>
											</tr>
                                        </thead>

                                        <tbody>
                                           <?php
	$text = mysqli_query($koneksi,"SELECT * FROM arus_kas_debet order by id DESC");
	if(mysqli_num_rows($text)>0){
		$no=1;
		while($db=mysqli_fetch_array($text)){
			
		?>    
<tr>
<td align="center" width="20"><?php echo $no; ?></td>
<td align="center" width="20"><?php echo $db['tgl']; ?></td>
<td align="center" width="50" ><?php echo $db['deskripsi']; ?></td>
<td><?php echo $db['nama_bank']; ?></td>
<td><?php echo $db['no_rekening']; ?></td>
<td><?php echo $db['saldo_awal']; ?></td>
<td><?php echo number_format($db['nominal']); ?></td>
<td><?php echo number_format($db['sisa_saldo']); ?></td>

<td align="center" width="80">
            <?php
	$level=$_SESSION['level'];		
	$j10 = mysqli_query($koneksi,"SELECT * FROM permis where menu='arus_kas_keluar' AND user='$level'");
	$data10=mysqli_fetch_array($j10);
    if($data10['u']=='y'){ 
	?>     
		<a href="?page=edit_arus_kas_debet&edit=<?php echo $db['id']; ?>">
<i class="fa fa-pencil"></i></a>
     <?php }?>  
             <?php
			 $level=$_SESSION['level'];	
	$j2 = mysqli_query($koneksi,"SELECT * FROM permis where menu='arus_kas_keluar' AND user='$level'");
	$data8=mysqli_fetch_array($j2);
	 if($data8['d']=='y'){ 
	?>
		<a href="?page=arus_kas_debet&hapus=<?php echo $db['id']; ?>">
<button class="btn btn-custom waves-effect waves-light btn-sm" id="sa-warning" name="hapus"><i class="fa fa-trash-o"></i></button>
</a>

            <?php } ?>
            </td>
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
<script>
function formatNumber(input)
{
    var num = input.value.replace(/\,/g,'');
    if(!isNaN(num)){
    if(num.indexOf('.') > -1){
    num = num.split('.');
    num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
    if(num[1].length > 2){
    alert('You may only enter two decimals!');
    num[1] = num[1].substring(0,num[1].length-1);
    } input.value = num[0]+'.'+num[1];
    } else{ input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'') };
    }
    else{ alert('Anda hanya diperbolehkan memasukkan angka!');
    input.value = input.value.substring(0,input.value.length-1);
    }
}

</script>