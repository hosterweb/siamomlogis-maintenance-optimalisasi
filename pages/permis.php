  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                    
                    
                    <br><br>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                        			<h4 class="header-title m-t-0 m-b-30">Users</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
<tr>
	<th>No</th>
    <th>Menu</th>
    <th>User</th>
    <th>Create</th>
    <th>Read</th>
    <th>Update</th>
    <th>Delete</th>
    <th>Aksi</th>
</tr>
<?php
 
	$text = mysqli_query($koneksi,"SELECT * FROM permis");
	if(mysqli_num_rows($text)>0){
		$no=1;
		while($db=mysqli_fetch_array($text)){
			?>    
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="left" width="150" ><?php echo $db['menu']; ?></td>
            <td ><?php echo $db['user']; ?></td>
            <td ><?php 
			if ($db['c']=='y'){
			echo "Ya"; 
			}
			else {
				echo "Tidak";
				}
			?></td>
            <td ><?php 
			if ($db['r']=='y'){
			echo "Ya"; 
			}
			else {
				echo "Tidak";
				}
			?></td>
            <td ><?php 
			if ($db['c']=='u'){
			echo "Ya"; 
			}
			else {
				echo "Tidak";
				}
			?></td>
            <td ><?php 
			if ($db['d']=='y'){
			echo "Ya"; 
			}
			else {
				echo "Tidak";
				}
			?></td>
            <td align="center" width="80">
          <a href="?page=edit_permis&edit=<?php echo $db['id_permis'];?>">
<i class="fa fa-pencil"></i></a>
            </td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="6" align="center" >Tidak Ada Data</td>
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