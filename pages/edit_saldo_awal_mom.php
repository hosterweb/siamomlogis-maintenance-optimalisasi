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
                                    <h4 class="header-title m-t-0 m-b-30">Tambah Saldo Awal</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											if (isset($_GET['hapus'])) {
											$id_hapus=$_GET['hapus'];
											$ex=mysqli_query($koneksi,"DELETE FROM saldo_awal_mom WHERE id='$id_hapus'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Hapus.
											</div>
											<?php	}
											}
											if (isset($_POST['submit'])){
													$nama_bank=$_POST['nama_bank'];		
													$no_rekening=$_POST['no_rekening'];		
													$periode_awal=$_POST['periode_awal'];
													$periode_akhir=$_POST['periode_akhir'];
													$jumlah_saldo=$_POST['jumlah_saldo'];
													   												
													$id=$_POST['id'];
$insert=mysqli_query($koneksi,"UPDATE saldo_awal_mom SET nama_bank='$nama_bank', no_rekening='$no_rekening', periode_awal='$periode_awal', periode_akhir='$periode_akhir', jumlah_saldo='$jumlah_saldo' WHERE id='$id'");
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
												$edit=$_GET['edit'];
												$x=mysqli_query($koneksi, "SELECT * FROM saldo_awal_mom where id='$edit'");
												$b=mysqli_fetch_array($x);
											?>
                                            
												<form class="form-horizontal" method="post" action="">
    
                                                                                 
<div class="form-group">    
<label class="col-lg-4 control-label">Nama Bank</label>
<div class="col-lg-8">
<input  type="text" class="form-control" style="display:none" name="id" id="id"  value="<?php echo $b['id'];?>" required>
<input  type="text" class="form-control" name="nama_bank" id="nama_bank"  value="<?php echo $b['nama_bank'];?>" required>

</div></div>
                                                      
<div class="form-group">    
<label class="col-lg-4 control-label">No Rekening</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="no_rekening" id="no_rekening" value="<?php echo $b['no_rekening'];?>" required>
</div></div> 

<div class="form-group">    
<label class="col-lg-4 control-label">Periode Awal</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="periode_awal" value="<?php echo $b['periode_awal'];?>" id="datepicker-autoclose">
</div></div>

<div class="form-group">    
<label class="col-lg-4 control-label">Periode Akhir</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="periode_akhir" value="<?php echo $b['periode_akhir'];?>" id="datepicker-autoclose2">
</div></div> 

<div class="form-group">    
<label class="col-lg-4 control-label">Jumlah Saldo</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="jumlah_saldo" id="jumlah_saldo" value="<?php echo $b['jumlah_saldo'];?>"  onkeyup="formatNumber(this);" onchange="formatNumber(this);"  >
</div></div>                                                   
                                               
<div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>
<a href="?page=saldo_awal_mom">
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