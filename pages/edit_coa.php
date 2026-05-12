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
                                    <h4 class="header-title m-t-0 m-b-30">Edit COA</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											if (isset($_GET['hapus'])) {
											$id_hapus=$_GET['hapus'];
											$ex=mysqli_query($koneksi,"DELETE FROM coa WHERE id='$id_hapus'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Hapus.
											</div>
											<?php	}
											}
											if (isset($_POST['submit'])){
													$kode_coa=$_POST['kode_coa'];		
													$keterangan=$_POST['keterangan'];
													
													$id=$_POST['id'];
												
$insert=mysqli_query($koneksi,"UPDATE coa SET kode_coa='$kode_coa', keterangan='$keterangan' where id='$id'");
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

$edit_id=$_GET['edit'];	
$olahdata=mysqli_query($koneksi, "SELECT * FROM coa where id='$edit_id'");
$ambil_data=mysqli_fetch_array($olahdata);	
											?>
                                            
												<form class="form-horizontal" method="post" action="">
                                                                                         
<div class="form-group">    
<label class="col-lg-4 control-label">Kode COA</label>
<div class="col-lg-8">
<input  style="display:none" type="text" class="form-control" name="id" id="id" value="<?php echo $edit_id;?>">

<input  type="text" class="form-control" name="kode_coa" id="kode_coa" value="<?php echo $ambil_data['kode_coa'];?>">
</div></div>
                                                
<div class="form-group">    
<label class="col-lg-4 control-label">Keterangan</label>
<div class="col-lg-8">
<input type="text" class="form-control" name="keterangan" id="keterangan" value="<?php echo $ambil_data['keterangan'];?>">
</select>  
</div></div>
                                                
                                               
<div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>

<a href="?page=coa"><button id="addToTable" class="btn btn-primary waves-effect waves-light" type="button" value="kembali" name="kembali"><i class="fa fa-minus">&nbsp; Kembali</i></button></a>

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
