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
                                    <h4 class="header-title m-t-0 m-b-30">Export Job</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											if (isset($_GET['hapus'])) {
											$id_hapus=$_GET['hapus'];
											$ex=mysqli_query($koneksi,"DELETE FROM piutang WHERE id='$id_hapus'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Hapus.
											</div>
											<?php	}
											}
											if (isset($_GET['bayar'])) {
											$id_bayar=$_GET['bayar'];
											$ex=mysqli_query($koneksi,"UPDATE piutang SET status='1' WHERE id='$id_bayar'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Proses Pembayaran Berhasil.
											</div>
											<?php	}
											}
											if (isset($_POST['submit'])){
													$tanggal_awal=$_POST['tanggal_awal'];		
													$tgl_jatuh_tempo=$_POST['tgl_jatuh_tempo'];		
													$nominal=$_POST['nominal'];		
													$klien=$_POST['klien'];	
													$deskripsi=$_POST['deskripsi'];	
																												   												
													$id=$_POST['id'];
$insert=mysqli_query($koneksi,"INSERT INTO piutang SET tanggal_awal='$tanggal_awal', tgl_jatuh_tempo='$tgl_jatuh_tempo', nominal='$nominal',klien='$klien', deskripsi='$deskripsi', status='0'");
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
                                            
<br><br><br>                                            
<form class="form-horizontal" method="post" action="?page=data_excel">   
                                                                                 
<div class="form-group">    
<label class="col-lg-4 control-label">Tanggal Awal</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="tanggal_awal" id="datepicker-autoclose" required>
</div></div>

<div class="form-group">    
<label class="col-lg-4 control-label">Tanggal Akhir</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="tanggal_akhir" id="datepicker-autoclose2" required>
</div></div>

<div class="form-group">    
<label class="col-lg-4 control-label">Job</label>
<div class="col-lg-8">
<select class="form-control" name="job" id="job">
<option value="all">all</option>
<?php 
	$result = mysqli_query($koneksi,"select * from coba");   
	while($data=mysqli_fetch_array($result)){
		?>
<option value="<?php echo $data['nama_barang'];?>"><?php echo $data['nama_barang'];?></option>
<?php } ?>
</select>
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