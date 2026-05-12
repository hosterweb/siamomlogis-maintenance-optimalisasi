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
                                    <h4 class="header-title m-t-0 m-b-30">Tambah utang</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											if (isset($_GET['hapus'])) {
											$id_hapus=$_GET['hapus'];
											$ex=mysqli_query($koneksi,"DELETE FROM utang WHERE id='$id_hapus'");
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
											$ex=mysqli_query($koneksi,"UPDATE utang SET status='1' WHERE id='$id_bayar'");
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
$insert=mysqli_query($koneksi,"INSERT INTO utang SET tanggal_awal='$tanggal_awal', tgl_jatuh_tempo='$tgl_jatuh_tempo', nominal='$nominal',klien='$klien', deskripsi='$deskripsi', status='0'");
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
<label class="col-lg-4 control-label">Tanggal Awal</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="tanggal_awal" id="datepicker-autoclose" required>
</div></div>

<div class="form-group">    
<label class="col-lg-4 control-label">Tanggal Jatuh Tempo</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="tgl_jatuh_tempo" id="datepicker-autoclose2" required>
</div></div>

<div class="form-group">    
<label class="col-lg-4 control-label">Nominal</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="nominal" id="nominal" onkeyup="formatNumber(this);" onchange="formatNumber(this);" required>
</div></div>
                                                      
<div class="form-group">    
<label class="col-lg-4 control-label">Deskripsi</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="deskripsi" id="deskripsi" required>
</div></div> 

<div class="form-group">    
<label class="col-lg-4 control-label">Klien</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="klien" id="klien">
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
                        			<h4 class="header-title m-t-0 m-b-30">Saldo Awal</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                           <tr>
                                                <th>No</th>
                                                <th>Tgl Awal</th>
                                                <th>Tgl Jatuh Tempo</th>
                                                <th>Nominal</th>
                                                <th>Klien</th>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
											</tr>
                                        </thead>

                                        <tbody>
                                           <?php
	$text = mysqli_query($koneksi,"SELECT * FROM utang order by id DESC");
	if(mysqli_num_rows($text)>0){
		$no=1;
		while($db=mysqli_fetch_array($text)){
			
		?>    
<tr>
<td align="center" width="20"><?php echo $no; ?></td>
<td align="center"><?php echo $db['tanggal_awal']; ?></td>
<td align="center"><?php echo $db['tgl_jatuh_tempo']; ?></td>
<td><?php echo $db['nominal']; ?></td>
<td><?php echo $db['klien']; ?></td>
<td><?php echo $db['deskripsi']; ?></td>
<td><?php if($db['status']==0) {
	echo "Belum Dibayar";
	} 
	else {
		echo "Sudah Dibayar";
		}
	?></td>
<td align="center" width="80">
      
		<a href="?page=utang&bayar=<?php echo $db['id'];?>"><i class="fa ti-money"></i></a>
    
     <?php
	$level=$_SESSION['level'];		
	$j10 = mysqli_query($koneksi,"SELECT * FROM permis where menu='utang' AND user='$level'");
	$data10=mysqli_fetch_array($j10);
    if($data10['u']=='y'){ 
	?>     
		<a href="?page=edit_utang&edit=<?php echo $db['id'];?>">
<i class="fa fa-pencil"></i></a>
     <?php }?>  
             <?php
			 $level=$_SESSION['level'];	
	$j2 = mysqli_query($koneksi,"SELECT * FROM permis where menu='utang' AND user='$level'");
	$data8=mysqli_fetch_array($j2);
	 if($data8['d']=='y'){ 
	?>
<a href="?page=utang&hapus=<?php echo $db['id'];?>">
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