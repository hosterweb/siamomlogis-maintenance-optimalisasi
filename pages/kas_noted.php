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
                                    <h4 class="header-title m-t-0 m-b-30">Kas Noted</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											if (isset($_GET['hapus'])) {
											$id_hapus=$_GET['hapus'];
											$ex=mysqli_query($koneksi,"DELETE FROM kas_noted WHERE id='$id_hapus'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Hapus.
											</div>
											<?php	}
											}
											if (isset($_POST['submit'])){
													$periode_awal=$_POST['periode_awal'];		
													$periode_akhir=$_POST['periode_akhir'];		
													$bank=$_POST['bank'];
													$keterangan=$_POST['keterangan'];
													$jumlah=$_POST['jumlah'];
   												
													$id=$_POST['id'];
$insert=mysqli_query($koneksi,"INSERT INTO kas_noted SET periode_awal='$periode_awal', periode_akhir='$periode_akhir', nama_bank='$bank', keterangan='$keterangan', jumlah='$jumlah'");
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
<label class="col-lg-4 control-label">Periode Awal</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="periode_awal" id="datepicker-autoclose" value="<?php echo date('d-m-Y');?>">
</div></div>

<div class="form-group">    
<label class="col-lg-4 control-label">Periode Akhir</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="periode_akhir" id="datepicker-autoclose" value="<?php echo date('d-m-Y');?>">
</div></div>
                                                
<div class="form-group">    
<label class="col-lg-4 control-label">Nama Bank</label>
<div class="col-lg-8">
<select name="kode_coa" id="kode_coa" class="form-control select2">
<?php
$cari=mysqli_query($koneksi, "SELECT * FROM coa ORDER BY id DESC");
while($ambil=mysqli_fetch_array($cari)){
?>
<option value="<?php echo $ambil['bank'];?>"><?php echo $ambil['bank'];?></option>
<?php 
}
?>
</select>  
</div></div>
      
<div class="form-group">    
<label class="col-lg-4 control-label">Keterangan</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="keterangan" id="keterangan">
</div></div> 

<div class="form-group">    
<label class="col-lg-4 control-label">Jumlah</label>
<div class="col-lg-8">
<input  type="number" class="form-control" name="jumlah" id="jumlah"  onkeyup="formatNumber(this);" onchange="formatNumber(this);"  >
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
                        			<h4 class="header-title m-t-0 m-b-30">Daftar Kas Noted</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                           <tr>
                                                <th>No</th>
                                                <th>Periode Awal</th>
                                                <th>Periode Akhir</th>
                                                <th>Nama Bank</th>
                                                <th>Keterangan</th>
                                                <th>Jumlah</th>
                                                <th>Aksi</th>
											</tr>
                                        </thead>

                                        <tbody>
                                           <?php
	$text = mysqli_query($koneksi,"SELECT * FROM kas_noted order by id DESC");
	if(mysqli_num_rows($text)>0){
		$no=1;
		while($db=mysqli_fetch_array($text)){
			
		?>    
<tr>
<td align="center" width="20"><?php echo $no; ?></td>
<td align="center"><?php echo $db['periode_awal']; ?></td>
<td align="center"><?php echo $db['periode_akhir']; ?></td>
<td><?php echo $db['nama_bank']; ?></td>
<td><?php echo $db['keterangan']; ?></td>
<td><?php echo $db['jumlah']; ?></td>
<td align="center" width="80">
            <?php
	$level=$_SESSION['level'];		
	$j10 = mysqli_query($koneksi,"SELECT * FROM permis where menu='kas_noted' AND user='$level'");
	$data10=mysqli_fetch_array($j10);
    if($data10['u']=='y'){ 
	?>     
		<a href="">
<i class="fa fa-pencil"></i></a>
     <?php }?>  
             <?php
			 $level=$_SESSION['level'];	
	$j2 = mysqli_query($koneksi,"SELECT * FROM permis where menu='kas_noted' AND user='$level'");
	$data8=mysqli_fetch_array($j2);
	 if($data8['d']=='y'){ 
	?>
<a href="">
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
        	<td colspan="4" align="center" >Tidak Ada Data</td>
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