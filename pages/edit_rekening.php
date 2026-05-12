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
                                    <h4 class="header-title m-t-0 m-b-30">Nomor Rekening</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											if (isset($_GET['hapus'])) {
											$id_hapus=$_GET['hapus'];
											$ex=mysqli_query($koneksi,"DELETE FROM norek WHERE id='$id_hapus'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Hapus.
											</div>
											<?php	}
											}
											if (isset($_POST['submit'])){
													$no_rek=$_POST['no_rek'];		
													$bank=$_POST['bank'];
													
													$id=$_POST['id'];
												
$insert=mysqli_query($koneksi,"UPDATE norek SET no_rekening='$no_rek', bank='$bank' where id='$id'");
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

$edit_id=$_GET['edit_id'];	
$olahdata=mysqli_query($koneksi, "SELECT * FROM norek where id='$edit_id'");
$ambil_data=mysqli_fetch_array($olahdata);	
											?>
                                            
												<form class="form-horizontal" method="post" action="">
                                                                                         
<div class="form-group">    
<label class="col-lg-4 control-label">No Rekening</label>
<div class="col-lg-8">
<input  style="display:none" type="text" class="form-control" name="id" id="id" value="<?php echo $edit_id;?>">

<input  type="text" class="form-control" name="no_rek" id="no_rek" value="<?php echo $ambil_data['no_rekening'];?>">
</div></div>
                                                
<div class="form-group">    
<label class="col-lg-4 control-label">Nama Bank</label>
<div class="col-lg-8">
<input type="text" class="form-control" name="bank" id="bank" value="<?php echo $ambil_data['bank'];?>">
</select>  
</div></div>
                                                
                                               
<div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>

<a href="?page=rekening"><button id="addToTable" class="btn btn-primary waves-effect waves-light" type="button" value="kembali" name="kembali"><i class="fa fa-plus">&nbsp; Kembali</i></button></a>

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
