     <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                    
                 
						<div class="row">
                            <div class="col-sm-12">

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
											} ?>
                                <div class="card-box table-responsive">
                        			<h4 class="header-title m-t-0 m-b-30">Daftar Credit Note</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                           <tr>
                                                <th>No</th>
                                                <th>Shipment</th>
                                                <th>Agent</th>
                                                <th>No CN</th>
                                                <th>Job Number</th>
                                                <th>Container Number</th>
                                                <th>Aksi</th>
											</tr>
                                        </thead>

                                        <tbody>
                                           <?php
	$text = mysqli_query($koneksi,"SELECT * FROM cn order by id DESC");
	if(mysqli_num_rows($text)>0){
		$no=1;
		while($db=mysqli_fetch_array($text)){
			
		?>    
<tr>
<td align="center" width="20"><?php echo $no; ?></td>
<td align="center" width="50" ><?php echo $db['shipment']; ?></td>
<td><?php echo $db['agent']; ?></td>
<td><?php echo $db['cn_number']; ?></td>
<td><?php echo $db['job_number']; ?></td>
<td><?php echo $db['container']; ?></td>
<td align="center" width="80">
            <?php
	$level=$_SESSION['level'];		
	$j10 = mysqli_query($koneksi,"SELECT * FROM permis where menu='customer' AND user='$level'");
	$data10=mysqli_fetch_array($j10);
    if($data10['u']=='y'){ 
	?>     
		<a href="?page=edit_customer&edit=<?php echo $db['id'];?>">
<i class="fa fa-pencil"></i></a>
     <?php }?>  
             <?php
			 $level=$_SESSION['level'];	
	$j2 = mysqli_query($koneksi,"SELECT * FROM permis where menu='customer' AND user='$level'");
	$data8=mysqli_fetch_array($j2);
	 if($data8['d']=='y'){ 
	?>
<a href="?page=data_cn&hapus=<?php echo $db['id'];?>">
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
