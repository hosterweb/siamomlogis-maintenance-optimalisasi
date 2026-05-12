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
                                    
<style>
/* Khusus Entry Job: kolom aksi tetap tampil di tabel dan tombol rapi/responsive */
#datatable-entry-job {
    width: 100% !important;
}

#datatable-entry-job th.entry-job-action-col,
#datatable-entry-job td.entry-job-action-col {
    width: 265px !important;
    min-width: 265px !important;
    max-width: 265px !important;
    text-align: center !important;
    vertical-align: middle !important;
    white-space: nowrap !important;
}

.entry-job-actions {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
    flex-wrap: nowrap;
    min-width: 250px;
}

.entry-job-actions a {
    display: inline-block;
    text-decoration: none;
}

.entry-job-actions .btn {
    margin: 0 !important;
    padding: 6px 8px;
    border-radius: 3px;
    font-size: 12px;
    line-height: 1.2;
    white-space: nowrap;
}

.entry-job-actions .btn i {
    margin-right: 4px;
}

@media (max-width: 991px) {
    #datatable-entry-job th.entry-job-action-col,
    #datatable-entry-job td.entry-job-action-col {
        width: 140px !important;
        min-width: 140px !important;
        max-width: 140px !important;
    }

    .entry-job-actions {
        flex-direction: column;
        align-items: stretch;
        min-width: 120px;
    }

    .entry-job-actions .btn {
        width: 100%;
        text-align: left;
    }
}
</style>
                                    <table id="datatable-entry-job" class="table table-striped table-bordered" data-server-side="1" data-ajax-url="pages/ajax_entry_job_table.php">
                                        <thead>
                                          <tr>
	<th>No</th>
    <th>Shipment</th>
    <th>Tgl</th>
    <th>Job Number</th>
    <th>Customer</th>
    <th>Master BI</th>
    <th>Voyyage</th>
    <th>Container Number</th>
    <th class="entry-job-action-col">Aksi</th>
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