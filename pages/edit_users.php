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
                                    <h4 class="header-title m-t-0 m-b-30">Create Job</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											if (isset($_GET['hapus'])) {
											$id_hapus=$_GET['hapus'];
											$ex=mysqli_query($koneksi,"DELETE FROM users WHERE id='$id_hapus'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Hapus.
											</div>
											<?php	}
											}
											if (isset($_POST['submit'])){
													$username=$_POST['username'];		
													$password=md5($_POST['password']);
													$nama_lengkap=$_POST['nama_lengkap'];	
													$marketing=$_POST['marketing'];	
													$customer=$_POST['customer'];
													$master_bl=$_POST['master_bl'];	
													$house_bl=$_POST['house_bl'];	
													$level=$_POST['level'];	
													$job_desk=$_POST['job_desk'];	
													
													
$insert=mysqli_query($koneksi,"UPDATE users SET password='$password', nama_lengkap='$nama_lengkap',level='$level',job_desk='$job_desk' where username='$username'");
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
												$cari=mysqli_query($koneksi, "SELECT * FROM users where username='$edit'");
												$ambil=mysqli_fetch_array($cari);
											?>
                                            
												<form class="form-horizontal" method="post" action="">
                                                  
                                                     <div class="form-group">
                                                        <label class="col-lg-4 control-label">username</label>
                                                        <div class="col-lg-8">
                                                  <input class="form-control select2" name="username" id="username" value="<?php echo $ambil['username'];?>" readonly="readonly" type="text">  
                                                    </div></div>
                                                    <div class="form-group">    
                                                    <label class="col-lg-4 control-label">Nama Lengkap</label>
                                                   <div class="col-lg-8">
                                                     <input  type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?php echo $ambil['nama_lengkap'];?>">
                                                </div></div>
                                                <div class="form-group">    
                                                    <label class="col-lg-4 control-label">Password</label>
                                                   <div class="col-lg-8">
                                                    <input class="form-control" type="text" name="password" id="password"  size="50" maxlength="50" value="<?php echo $ambil['password'];?>"/>
                                                </div></div>
                                                <div class="form-group">    
                                                    <label class="col-lg-4 control-label">Level</label>
                                                   <div class="col-lg-8">
                                                     <select class="form-control select2" name="level" id="level">
                                                    <option value="<?php echo $ambil['level'];?>" selected="selected"><?php echo $ambil['level'];?></option>
                                                    <option value="administrator">Administrator</option>
                                                    <option value="owner">Owner</option>
                                                    </select>
                                                </div></div>
												<div class="form-group">    
                                                    <label class="col-lg-4 control-label">JobDesk</label>
                                                   <div class="col-lg-8">
                                                     <select class="form-control select2" name="jobdes" id="jobdesk">  
                                                    <option value=" <?php echo $ambil['jobdesk'];?>" selected><?php echo $ambil['jobdesk'];?></option>                               							<option value="all">All</option>
                                                        <option value="EXPORT LCL">EXPORT LCL</option>
                                                        <option value="EXPORT FCL">EXPORT FCL</option>
                                                        <option value="IMPORT LCL">IMPORT LCL</option>
                                                        <option value="IMPORT FCL">IMPORT FCL</option>
                                                        <option value="DOMESTIC">DOMESTIC</option>
                                                        <option value="EMKL">EMKL</option>
                                    </select></div></div>
                                         <div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>
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
	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
		// Kita sembunyikan dulu untuk loadingnya
		$("#loading").hide();
		
		$("#username").change(function(){ // Ketika user mengganti atau memilih data provinsi
			$("#nama_lengkap").hide(); // Sembunyikan dulu combobox kota nya
			$("#loading").show(); // Tampilkan loadingnya
		
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "http://localhost/mom_logistik_new/new/pages/cari_nama_lengkap.php", // Isi dengan url/path file php yang dituju
				data: {username : $("#username").val()}, // data yang akan dikirim ke file yang dituju
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ // Ketika proses pengiriman berhasil
					$("#loading").hide(); // Sembunyikan loadingnya

					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#nama_lengkap").html(response.list_kota).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
	});
	</script>