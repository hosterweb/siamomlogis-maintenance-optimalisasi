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
											$ex=mysqli_query($koneksi,"DELETE FROM create_job_copy WHERE id='$id_hapus'");
											if($ex){
												?>
												<div  class="alert alert-success alert-dismissable">
	                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
												<strong>Selamat!</strong> Data Sukses Di Hapus.
											</div>
											<?php	}
											}
											if (isset($_POST['submit'])){
													$shipment=$_POST['shipment'];		
													$tgl=$_POST['tgl'];
													$job_number=$_POST['job_number'];	
													$marketing=$_POST['marketing'];	
													$customer=$_POST['customer'];
													$master_bl=$_POST['master_bl'];	
													$house_bl=$_POST['house_bl'];	
													$poi=$_POST['poi'];	
													$pod=$_POST['pod'];	
													$vessel_boy=$_POST['vessel_boy'];	
													$eta_etd=$_POST['eta_etd'];	
													$agent=$_POST['agent'];	
													$container=$_POST['container'];	
													$remark=$_POST['remark'];
													
													$id=$_POST['id'];
												
$insert=mysqli_query($koneksi,"UPDATE create_job_only SET shipment='$shipment', tgl='$tgl', job_number='$job_number',poi='$poi',pod='$pod',vessel_boy='$vessel_boy',eta_etd='$eta_etd',agent='$agent',container='$container',remark='$remark',customer='$customer',master_bl='$master_bl',house_bl='$house_bl',marketing='$marketing' where id='$id'");
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
$olahdata=mysqli_query($koneksi, "SELECT * FROM create_job_only where id='$edit_id'");
$ambil_data=mysqli_fetch_array($olahdata);	
											?>
                                            
												<form class="form-horizontal" method="post" action="">
                                               <div class="form-group">
                                                        <label class="col-lg-4 control-label">ID Edit</label>
                                                        <div class="col-lg-8">
 <input readonly="readonly" type="text" class="form-control" value="<?php echo $edit_id;?>" name="id" id="id"></div></div>
                                                  
                                                     <div class="form-group">
                                                        <label class="col-lg-4 control-label">Shipment</label>
                                                        <div class="col-lg-8">
                                                  <select class="form-control select2" name="shipment" id="shipment" onchange="changeValue(this.value)">
                                                                
                                                                   <option selected="selected" value=<?php echo $ambil_data['shipment'];?>><?php echo $ambil_data['shipment'];?></option>
        <?php 
	$cariid=mysqli_query($koneksi, "SELECT id FROM coba WHERE id=(SELECT max(id) FROM coba)");	
	$ambilidmax=mysqli_fetch_array($cariid);
	$data_id=$ambilidmax['id'];
	if(empty($data_id)){
		$idmax=1;
		}
		else {
	$idmax=$ambilidmax['id']+1;
		}
	
	$coba= date("dmy");	
    $result = mysqli_query($koneksi,"select * from coba");    
    $jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['nama_barang'] . '">' . $row['nama_barang'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nama_barang'] . "'] = {harga:'" .addslashes($row['harga']). "" .$coba. "".$idmax."'};\n";    
    }      
    ?>    
	                                                            </select>
                                                    </div>
                                                    </div>
                                                    
                                                   <div class="form-group">    
                                                    <label class="col-lg-4 control-label">Job Number</label>
                                                   <div class="col-lg-8">
                                                     <input readonly="readonly" type="text" class="form-control" value="<?php echo $ambil_data['job_number'];?>" name="job_number" id="job_number">
                                                    </select>  
                                                     <script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(shipment){  
    document.getElementById('job_number').value = dtMhs[shipment].harga;  
    };  
    </script> 
                                                </div></div>
                                                <div class="form-group">    
                                                    <label class="col-lg-4 control-label">Tanggal</label>
                                                   <div class="col-lg-8">
                                                    <input class="form-control" type="text" name="tgl" id="tgl"  size="50" maxlength="50" value="<?php echo $ambil_data['tgl'];?>" />
                                                </div></div>
                                                <div class="form-group">    
                                                    <label class="col-lg-4 control-label">Marketing</label>
                                                   <div class="col-lg-8">
                                                     <select class="form-control select2" name="marketing" id="marketing">
                                                     <option value="<?php echo $ambil_data['marketing'];?>" selected> <?php echo $ambil_data['marketing'];?></option>
                                                    <option value="ERNIE">ERNIE</option>
                                                    <option value="SUGENG">SUGENG</option>
                                                    <option value="RURI">RURI</option>
                                                    </select>
                                                </div></div>
                                    <div class="form-group">    
                                        <label class="col-lg-4 control-label">Customer Name</label>
                                       <div class="col-lg-8">
                                    <select class="form-control" name="customer" id="customer">
                                    <option value="<?php echo $ambil_data['customer'];?>" selected><?php echo $ambil_data['customer'];?></option>
                                        <?php 
                                       $j11 = mysqli_query($koneksi, "SELECT * FROM customer");
                                      while($d11=mysqli_fetch_array($j11)) {?>  
                                    <option value='<?php echo $d11['nama_customer'];?>'><?php echo $d11['nama_customer'];?> | <?php echo $d11['alamat']; ?> </option>
                                        <?php }	?>
                                         
                                          </select>
                                    </div></div>
                                                <div class="form-group">    
                                                    <label class="col-lg-4 control-label">Master BL</label>
                                                   <div class="col-lg-8">
                                                 <input class="form-control" type="text" value="<?php echo $ambil_data['master_bl'];?>" name="master_bl" id="master_bl"  size="50" maxlength="50" />
                                                </div></div>
                                    <div class="form-group">    
                                        <label class="col-lg-4 control-label">House BL</label>
                                       <div class="col-lg-8">
                                        <input class="form-control" type="text" name="house_bl" id="house_bl" value="<?php echo $ambil_data['house_bl'];?>"  size="50" maxlength="50" />
                                    </div></div>
                                    <div class="form-group">    
                                        <label class="col-lg-4 control-label">P.O.L</label>
                                       <div class="col-lg-8">
                                      <input class="form-control" type="text" name="poi" id="poi"  size="50" maxlength="50" value="<?php echo $ambil_data['poi'];?>" />
                                    </div></div>
                                        <div class="form-group">    
                                            <label class="col-lg-4 control-label">P.O.D</label>
                                           <div class="col-lg-8">
                                           <input class="form-control" type="text" name="pod" id="pod"  size="50" value="<?php echo $ambil_data['pod'];?>"  maxlength="50" />
                                        </div></div>
                                <div class="form-group">    
                                    <label class="col-lg-4 control-label">Vessel &amp; Voy</label>
                                   <div class="col-lg-8">
                                   <input class="form-control" type="text" name="vessel_boy" id="vessel_boy" value="<?php echo $ambil_data['vessel_boy'];?>"  size="50" maxlength="50" />
                                </div></div>
                            <div class="form-group">    
                                <label class="col-lg-4 control-label">ETA / ETD</label>
                               <div class="col-lg-8">
                               <input class="form-control" type="text" name="eta_etd" id="datepicker-autoclose2"  size="50" maxlength="50" value="<?php echo $ambil_data['eta_etd'];?>" />
                            </div></div>
                                <div class="form-group">    
                                    <label class="col-lg-4 control-label">Agent</label>
                                   <div class="col-lg-8">
                                   <select class="form-control" name="agent" id="agent">
                                   <option value="<?php echo $ambil_data['agent'];?>" selected><?php echo $ambil_data['agent'];?></option>
                                    <?php 
                                    $j111 = mysqli_query($koneksi, "SELECT * FROM agent");
                                    while($d111=mysqli_fetch_array($j111)){  
                                    ?>
                                    <option value="<?php echo $d111['nama_agent'];?>"><?php echo $d111['nama_agent'];?> | <?php echo $d111['alamat'];?>
                                    <?php }	?>
                                        </select>
                                </div></div>
                                        <div class="form-group">    
                                            <label class="col-lg-4 control-label">Container Number</label>
                                           <div class="col-lg-8">
                                            <input class="form-control" type="text" name="container" id="container" value="<?php echo $ambil_data['container'];?>"  size="50" maxlength="50" />
                                        </div></div>
                                        <div class="form-group">    
                                            <label class="col-lg-4 control-label">Remark</label>
                                           <div class="col-lg-8">
                                          <input class="form-control" type="text" name="remark" id="remark" value="<?php echo $ambil_data['remark'];?>"  size="50" maxlength="50" />
                                        </div></div>
                                         <div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>
 <a href="?page=create_job"><button id="addToTable" class="btn btn-primary waves-effect waves-light" type="button" value="button" name="kembali"><i class="fa fa-min">&nbsp; Kembali</i></button></a>
</div></div>
                                                    
                                    <!--<div class="form-group">
                                    <label class="col-lg-4 control-label">Input Number</label>
                                    <div class="col-lg-8">
														<input type="text" placeholder="" data-mask="999-99-999-9999-9" class="form-control">
														<span class="font-13 text-muted">e.g "999-99-999-9999-9"</span>
									</div></div>
                                                   
                                    <div class="form-group">
			                        <label class="col-lg-4 control-label">Auto Close</label>
			                        <div class="col-lg-8">
			                                		<div class="input-group">
																<input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
																<span class="input-group-addon bg-primary b-0 text-white"><i class="ti-calendar"></i></span>
													</div>--><!-- input-group -->
			                        <!-- </div></div>
                                                    
                                       <div class="form-group">
                                        <label class="col-lg-4 control-label">Maxlenght</label>
                                        <div class="col-lg-8">
													<input type="text" class="form-control" maxlength="25" name="moreoptions" id="moreoptions" />
												</div></div>-->
   
     
                                                </form>

											</div>

										</div><!-- end col -->

									</div><!-- end row -->
								</div>
							</div><!-- end col -->
						</div>
                        <!-- end row -->
                    </div> <!-- content -->
                           </div> <!-- container -->
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
		
		$("#shipment").change(function(){ // Ketika user mengganti atau memilih data provinsi
			$("#job_number").hide(); // Sembunyikan dulu combobox kota nya
			$("#loading").show(); // Tampilkan loadingnya
		
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "http://localhost/mom_logistik_new/new/pages/cari_job_number.php", // Isi dengan url/path file php yang dituju
				data: {shipment : $("#shipment").val()}, // data yang akan dikirim ke file yang dituju
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
					$("#job_number").html(response.list_kota).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
	});
	</script>
    
    <script>
	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
		// Kita sembunyikan dulu untuk loadingnya
		$("#loading").hide();
		
		$("#shipment").change(function(){ // Ketika user mengganti atau memilih data provinsi
			$("#job_number").hide(); // Sembunyikan dulu combobox kota nya
			$("#loading").show(); // Tampilkan loadingnya
		
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "http://localhost/mom_logistik_new/new/pages/cari_job_number.php", // Isi dengan url/path file php yang dituju
				data: {shipment : $("#shipment").val()}, // data yang akan dikirim ke file yang dituju
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
					$("#job_number").html(response.list_kota).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
	});
	</script>