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
                                    <h4 class="header-title m-t-0 m-b-30">Edit Arus Kas Debet</h4>

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
													$tgl=date("Y-m-d");													   												
													$id=$_POST['id'];
													
$insert=mysqli_query($koneksi,"UPDATE arus_kas_debet SET deskripsi='$deskripsi', nama_bank='$nama_bank', no_rekening='$no_rekening', nominal='$nominal' where id='$id'");
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
		$ambil_data=mysqli_query($koneksi, "SELECT * FROM arus_kas_debet where id='$edit'");
		$data=mysqli_fetch_array($ambil_data);										
											?>
                                            
												<form class="form-horizontal" method="post" action="">
    
<div class="form-group">    
<label class="col-lg-4 control-label">Deskripsi</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="id" id="id" style="display:none" value="<?php echo $data['id']; ?>" required>
<input  type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?php echo $data['deskripsi']; ?>" required>
</div></div> 

<div class="form-group">    
<label class="col-lg-4 control-label">Nama Bank</label>
<div class="col-lg-8">
<select name="nama_bank" id="nama_bank" class="form-control">
<option selected="selected" value="<?php echo $data['nama_bank']; ?>" > <?php echo $data['nama_bank']; ?></option>
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
<option  value="<?php echo $data['no_rekening']; ?>" selected="selected"> <?php echo $data['no_rekening']; ?></option>
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
<input  type="text"  value="<?php echo $data['nominal']; ?>" readonly="readonly" class="form-control" name="nominal" id="nominal" onkeyup="formatNumber(this);" onchange="formatNumber(this);" onclick="formatNumber(this);" onkeypress="formatNumber(this);" required>
</div></div>                                                
<div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>
<a href="?page=arus_kas_debet">
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
    else{ alert('Anda hanya diperbolehkan mekeluarkan angka!');
    input.value = input.value.substring(0,input.value.length-1);
    }
}

</script>