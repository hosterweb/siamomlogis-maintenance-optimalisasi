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
											$ex=mysqli_query($koneksi,"DELETE FROM create_job_only WHERE id='$id_hapus'");
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
													$container=str_replace("'","`",$_POST['container']);	
													$remark=str_replace("'","`",$_POST['remark']);
													
													$id=$_POST['id'];
												
$insert=mysqli_query($koneksi,"INSERT INTO create_job_only SET shipment='$shipment', tgl='$tgl', job_number='$job_number',poi='$poi',pod='$pod',vessel_boy='$vessel_boy',eta_etd='$eta_etd',agent='$agent',container='$container',remark='$remark',customer='$customer',master_bl='$master_bl',house_bl='$house_bl',marketing='$marketing'");
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
                                                        <label class="col-lg-4 control-label">Shipment</label>
                                                        <div class="col-lg-8">
                                                  <select class="form-control select2" name="shipment" id="shipment" onchange="changeValue(this.value)">
                                                                  <option value=0>-Pilih-</option>
        <?php 
		$jobdesk=$_SESSION['jobdesk'];
	$cariid=mysqli_query($koneksi, "SELECT job_number FROM create_job_only ORDER BY id DESC LIMIT 1");	
	$w=mysqli_fetch_array($cariid);
	$q=$w['job_number'];
	$e=explode('/', $q);
	$ambilidmax=$e['1'];
	$ambilbulan=$e['3'];
	$blnskg=date('m');
	
	if(empty($q)){
		$idmax=1;
		}
		elseif($ambilbulan==$blnskg){
			$idmax=$ambilidmax+1;
		}
		else {
			$idmax=1; 
		}

		
	$coba= date("/d/m/y");
	$garing= date("/");	
		
if($jobdesk=='all'){
	$result = mysqli_query($koneksi,"SELECT nama_barang, harga FROM coba ");   
	}
	else {
    $result = mysqli_query($koneksi,"SELECT nama_barang, harga FROM coba WHERE nama_barang='$jobdesk'");    
	}
	$jsArray = "var dtMhs = new Array();\n";        
    while ($row = mysqli_fetch_array($result)) {    
        echo '<option value="' . $row['nama_barang'] . '">' . $row['nama_barang'] . '</option>';    
        $jsArray .= "dtMhs['" . $row['nama_barang'] . "'] = {harga:'" .addslashes($row['harga']). "".$garing."".$idmax."" .$coba. "'};\n";    
    }      
    ?>    
	                                                            </select>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class="form-group">    
                                                    <label class="col-lg-4 control-label">Job Number</label>
                                                   <div class="col-lg-8">
                                                     <input readonly="readonly" type="text" class="form-control" name="job_number" id="job_number">
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
                                                    <input class="form-control" type="text" name="tgl" id="tgl"  size="50" maxlength="50" value="<?php echo date("Y-m-d");?>" />
                                                </div></div>
                                                <div class="form-group">    
                                                    <label class="col-lg-4 control-label">Marketing</label>
                                                   <div class="col-lg-8">
                                                     <select class="form-control select2" name="marketing" id="marketing">
                                                    <option value="ERNIE">ERNIE</option>
                                                    <option value="SUGENG">SUGENG</option>
                                                    <option value="RURI">RURI</option>
                                                    </select>
                                                </div></div>
                                    <div class="form-group">    
                                        <label class="col-lg-4 control-label">Customer Name</label>
                                       <div class="col-lg-8">
                                    <select class="form-control" name="customer" id="customer">
                                        <?php 
                                       $j11 = mysqli_query($koneksi, "SELECT nama_customer, alamat FROM customer ORDER BY nama_customer ASC");
                                      while($d11=mysqli_fetch_array($j11)) {?>  
                                    <option value='<?php echo $d11['nama_customer'];?>'><?php echo $d11['nama_customer'];?> | <?php echo $d11['alamat']; ?> </option>
                                        <?php }	?>
                                         
                                          </select>
                                    </div></div>
                                                <div class="form-group">    
                                                    <label class="col-lg-4 control-label">Master BL</label>
                                                   <div class="col-lg-8">
                                                 <input class="form-control" type="text" name="master_bl" id="master_bl"  size="50" maxlength="50" />
                                                </div></div>
                                    <div class="form-group">    
                                        <label class="col-lg-4 control-label">House BL</label>
                                       <div class="col-lg-8">
                                        <input class="form-control" type="text" name="house_bl" id="house_bl"  size="50" maxlength="50" />
                                    </div></div>
                                    <div class="form-group">    
                                        <label class="col-lg-4 control-label">P.O.L</label>
                                       <div class="col-lg-8">
                                      <input class="form-control" type="text" name="poi" id="poi"  size="50" maxlength="50" />
                                    </div></div>
                                        <div class="form-group">    
                                            <label class="col-lg-4 control-label">P.O.D</label>
                                           <div class="col-lg-8">
                                           <input class="form-control" type="text" name="pod" id="pod"  size="50" maxlength="50" />
                                        </div></div>
                                <div class="form-group">    
                                    <label class="col-lg-4 control-label">Vessel &amp; Voy</label>
                                   <div class="col-lg-8">
                                   <input class="form-control" type="text" name="vessel_boy" id="vessel_boy"  size="50" maxlength="50" />
                                </div></div>
                            <div class="form-group">    
                                <label class="col-lg-4 control-label">ETA / ETD</label>
                               <div class="col-lg-8">
                               <input class="form-control" type="text" name="eta_etd" id="datepicker-autoclose"  size="50" maxlength="50" />
                            </div></div>
                                <div class="form-group">    
                                    <label class="col-lg-4 control-label">Agent</label>
                                   <div class="col-lg-8">
                                   <select class="form-control select2" name="agent" id="agent">
                                    <?php 
                                    $j111 = mysqli_query($koneksi, "SELECT nama_agent, alamat FROM agent ORDER BY nama_agent ASC");
                                    while($d111=mysqli_fetch_array($j111)){  
                                    ?>
                                    <option value="<?php echo $d111['nama_agent'];?>"><?php echo $d111['nama_agent'];?> | <?php echo $d111['alamat'];?>
                                    <?php }	?>
                                        </select>
                                </div></div>
                                        <div class="form-group">    
                                            <label class="col-lg-4 control-label">Container Number</label>
                                           <div class="col-lg-8">
                                            <input class="form-control" type="text" name="container" id="container"  size="50" maxlength="50" />
                                        </div></div>
                                        <div class="form-group">    
                                            <label class="col-lg-4 control-label">Remark</label>
                                           <div class="col-lg-8">
                                          <input class="form-control" type="text" name="remark" id="remark"  size="50" maxlength="50" />
                                        </div></div>
                                         <div class="form-group"><label class="col-lg-4 control-label">&nbsp;</label><div class="col-lg-8">
<button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit"><i class="fa fa-plus">&nbsp; Simpan</i></button>
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
                    
                    
                    <br><br>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <style>
                                        /* Khusus halaman Create Job: rapikan kolom tombol aksi tanpa mengubah fungsi */
                                        #datatable-buttons th:last-child,
                                        #datatable-buttons td:last-child {
                                            width: 150px !important;
                                            min-width: 150px !important;
                                            white-space: nowrap;
                                            text-align: left;
                                            vertical-align: middle;
                                        }
                                        .sia-create-job-actions {
                                            display: flex;
                                            align-items: center;
                                            gap: 5px;
                                            flex-wrap: wrap;
                                        }
                                        .sia-create-job-actions a {
                                            display: inline-block;
                                            margin: 0;
                                        }
                                        .sia-create-job-actions .btn {
                                            margin: 0 0 4px 0;
                                            min-width: 64px;
                                            line-height: 1.4;
                                        }
                                        @media (max-width: 768px) {
                                            #datatable-buttons th:last-child,
                                            #datatable-buttons td:last-child {
                                                min-width: 135px !important;
                                            }
                                            .sia-create-job-actions .btn {
                                                min-width: 58px;
                                                padding-left: 8px;
                                                padding-right: 8px;
                                            }
                                        }
                                    </style>
                        			<h4 class="header-title m-t-0 m-b-30">Create Job</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered" data-server-side="1" data-ajax-url="pages/ajax_create_job_table.php">
                                        <thead>
                                           <tr>
                                                <th>No</th>
                                                <th>Shipment</th>
                                                <th>Tgl</th>
                                                <th>Job Number</th>
                                                <th>Customer</th>
                                                <th>Master BI</th>
                                                <th>House BI</th>
                                                <th>Agent</th>
                                                <th>Aksi</th>
											</tr>
                                        </thead>

                                        <tbody>
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
