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
                                    <h4 class="header-title m-t-0 m-b-30">Tambah User</h4>

									<div class="row">
										<div class="col-lg-9">
			                                <div class="p-20">
                                            <?php 
											if (isset($_GET['hapus'])) {
											$id_hapus=$_GET['hapus'];
											$ex=mysqli_query($koneksi,"DELETE FROM permis WHERE id_permis='$id_hapus'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Hapus.
											</div>
											<?php	}
											}
											if (isset($_POST['submit'])){
													$menu=$_POST['menu'];		
													$user=$_POST['user'];
													$c=$_POST['c'];	
													$r=$_POST['r'];	
													$u=$_POST['u'];
													$d=$_POST['d'];	
													
													$id=$_POST['id'];

												
$insert=mysqli_query($koneksi,"UPDATE permis SET menu='$menu', user='$user', c='$c', r='$r', u='$u', d='$d' WHERE id_permis='$id'");
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
												$ambil=mysqli_query($koneksi, "Select * from permis where id_permis='$edit'");
												$data=mysqli_fetch_array($ambil);
											?>
                                            
												<form class="form-horizontal" method="post" action="">
                                                  
<div class="form-group">
<label class="col-lg-12 control-label">&nbsp;</label>
<div class="col-lg-12">
 <table id="datatable-buttons" class="table table-striped table-bordered" width="100%">
<tr>
	<th width="20%" align="center">Menu</th><th align="center"  width="20%">Level User</th><th width="20%">Create</th><th width="20%">Read</th><th width="20%">Update</th><th width="20%">Delete</th>  
</tr>

<tr>    
	<td style="display:none"><input type="text" readonly="readonly" id="id" name="id" value="<?php echo "$edit";?>" /></td>
    <td><input class="form-control" type="text" readonly="readonly" id="menu" name="menu" value="<?php echo $data['menu'];?>" /></td>
    <td><input class="form-control" type="text" readonly="readonly" id="user" name="user" value="<?php echo $data['user'];?>" /></td>
<td>
   <select class="form-control" name="c" id="c">
   <option value="<?php echo $data['c'];?>" selected><?php echo $data['c'];?></option>
   <option value="y">Ya</option>
   <option value="n">Tidak</option>
   </select>
</td>
<td>
   <select class="form-control" name="r" id="r">
      <option value="<?php echo $data['r'];?>" selected><?php echo $data['r'];?></option>
   <option value="y">Ya</option>
   <option value="n">Tidak</option>
   </select>
</td>
<td>
   <select class="form-control" name="u" id="u">
      <option value="<?php echo $data['u'];?>" selected><?php echo $data['u'];?></option>
   <option value="y">Ya</option>
   <option value="n">Tidak</option>
   </select>
</td>
<td>
   <select class="form-control" name="d" id="d">
      <option value="<?php echo $data['d'];?>" selected><?php echo $data['d'];?></option>
   <option value="y">Ya</option>
   <option value="n">Tidak</option>
   </select>
</td>
</tr>
</table>
</div></div>

<div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>
<a href="?page=permis">                
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="button" value="kembali" name="kembali"><i class="fa fa-minus">&nbsp; Kembali</i></button>
</div></div>
</a>
</div></div>
                                                </form>

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