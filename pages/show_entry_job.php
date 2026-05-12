  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                        			<h4 class="header-title m-t-0 m-b-30">Entry Job</h4>
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
											<?php	} }
											?>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
	<th>No</th>
    <th>Shipment</th>
    <th>Tgl</th>
    <th>Job Number</th>
    <th>Control Number</th>
    <th>Marketing</th>
    <th>Customer</th>
	<th>Status Entry</th>
    <th>Aksi</th>
</tr>
                                        </thead>

                                        <tbody>
                                            <?php
	$show_id=$_GET['show_id'];										
	$text = mysqli_query($koneksi,"SELECT * FROM create_job_copy where id_create_job='$show_id'");
	if(mysqli_num_rows($text)>0){
		$no=1;
		while($db=mysqli_fetch_array($text)){
			
		?>    
<tr>
<td align="center" width="20"><?php echo $no; ?></td>
<td align="center" width="150" ><?php echo $db['shipment']; ?></td>
<td><?php echo $db['tgl']; ?></td>
<td><?php echo $db['job_number']; ?></td>
<td><?php echo $db['co_nu']; ?></td>
<td><?php echo $db['marketing']; ?></td>
<td><?php echo $db['customer']; ?></td>
<td>
<?php if(empty($db['status']))
{
echo "Belum Entry";
}
else {
echo "Sudah Di Entry";
}
 ?></td>
<td align="center" width="80">

             <?php
			 $level=$_SESSION['level'];	
	$j2 = mysqli_query($koneksi, "SELECT * FROM permis where menu='entry_job' AND user='$level'");
	$data8=mysqli_fetch_array($j2);
	 if($data8['d']=='y'){ 
	?>
<a href="?page=show_entry_job&hapus=<?php echo $db['id'];?>">
<button class="btn btn-custom waves-effect waves-light btn-sm" id="sa-warning" name="hapus"><i class="fa fa-trash-o"></i> Hapus</button>
</a>
            <?php } ?>
            
             <?php
			$level=$_SESSION['level'];	
	$j10 = mysqli_query($koneksi,"SELECT * FROM permis where menu='entry_job' AND user='$level'");
	$data10=mysqli_fetch_array($j10);
    if($data10['u']=='y'){ 
	?> 
 <a href="?page=edit_entry_job&edit=<?php echo $db['id'];?>">       
<button class="btn btn-custom waves-effect waves-light btn-sm" id="sa-warning"><i class="fa fa-pencil"></i> Edit</button></a>
<?php }?>  

 <?php
			$level=$_SESSION['level'];	
	$j10 = mysqli_query($koneksi,"SELECT * FROM permis where menu='entry_job' AND user='$level'");
	$data10=mysqli_fetch_array($j10);
    if($data10['u']=='y'){ 
	?>     
  <a target="_blank" href="pages/cetak_pdf.php?data=<?php echo $db['id'];?>">          
<button class="btn btn-custom waves-effect waves-light btn-sm" id="sa-warning"><i class="fa fa-pencil"></i> Download PDF</button></a>
<?php }?>  
            </td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="16" align="center" >Tidak Ada Data</td>
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