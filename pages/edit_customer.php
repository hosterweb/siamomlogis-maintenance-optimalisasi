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
													$nama_customer=$_POST['nama_customer'];		
													$alamat=$_POST['alamat'];		
													$hp=$_POST['hp'];
													   												
													$id=$_POST['id'];
$insert=mysqli_query($koneksi,"UPDATE customer SET nama_customer='$nama_customer', alamat='$alamat', hp='$hp' WHERE id='$id'");
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
$ambil_data=mysqli_query($koneksi,"SELECT * FROM customer where id='$edit'");
$data=mysqli_fetch_array($ambil_data);												
											?>
                                            
												<form class="form-horizontal" method="post" action="">
    
                                                                                 
<div class="form-group">    
<label class="col-lg-4 control-label">Nama Customer</label>
<div class="col-lg-8">
<input  type="text" style="display:none" class="form-control" name="id" id="id" value="<?php echo $edit;?>" required>
<input  type="text" class="form-control" name="nama_customer" id="nama_customer" value="<?php echo $data['nama_customer'];?>" required>
</div></div>
                                                      
<div class="form-group">    
<label class="col-lg-4 control-label">Alamat</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $data['alamat'];?>" required>
</div></div> 

<div class="form-group">    
<label class="col-lg-4 control-label">HP</label>
<div class="col-lg-8">
<input  type="text" class="form-control" name="hp" id="hp" value="<?php echo $data['hp'];?>">
</div></div>                                                
                                               
<div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>
<a href="?page=customer">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="button" value="kembali" name="kembali"><i class="fa fa-minus">&nbsp; Kembali</i></button>
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
