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
                        $id_hapus = $_GET['hapus'];
                        $ex = mysqli_query($koneksi, "DELETE FROM cn WHERE id='$id_hapus'");
                        if ($ex) {
                    ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong>Selamat!</strong> Data Sukses Di Hapus.
                            </div>
                    <?php
                        }
                    }

                    $level = $_SESSION['level'];
                    $j_permis = mysqli_query($koneksi, "SELECT * FROM permis WHERE menu='customer' AND user='$level' LIMIT 1");
                    $data_permis = mysqli_fetch_array($j_permis);

                    $can_update = isset($data_permis['u']) && $data_permis['u'] == 'y';
                    $can_delete = isset($data_permis['d']) && $data_permis['d'] == 'y';
                    ?>

                    <div class="card-box table-responsive">
                        <a href="?page=add_cn">
                            <button id="addToTable" class="btn btn-primary waves-effect waves-light" type="button" value="Tambah" name="Tambah">
                                <i class="fa fa-plus">&nbsp; Tambah</i>
                            </button>
                        </a>
                        <br><br>

                        <h4 class="header-title m-t-0 m-b-30">Daftar Credit Note</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Shipment</th>
                                    <th>Container Number</th>
                                    <th>No CN</th>
                                    <th>Job Number</th>
                                    <th>Agent</th>
                                    <th style="width:140px; text-align:center;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $text = mysqli_query($koneksi, "SELECT * FROM cn ORDER BY id DESC");
                                if (mysqli_num_rows($text) > 0) {
                                    $no = 1;
                                    while ($db = mysqli_fetch_array($text)) {
                                ?>
                                        <tr>
                                            <td align="center" width="20"><?php echo $no; ?></td>
                                            <td align="center" width="50"><?php echo $db['shipment']; ?></td>
                                            <td><?php echo $db['container']; ?></td>
                                            <td><?php echo $db['cn_number']; ?></td>
                                            <td><?php echo $db['job_number']; ?></td>
                                            <td><?php echo $db['agent']; ?></td>

                                            <td align="center">
                                                <div style="display:flex; justify-content:center; align-items:center; gap:5px; flex-wrap:nowrap; min-width:115px;">

                                                    <?php if ($can_update) { ?>
                                                        <a href="?page=edit_cn&edit=<?php echo $db['id']; ?>"
                                                           class="btn btn-primary waves-effect waves-light btn-sm"
                                                           title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <?php if ($can_delete) { ?>
                                                        <a href="?page=cn&hapus=<?php echo $db['id']; ?>"
                                                           onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                           class="btn btn-danger waves-effect waves-light btn-sm"
                                                           title="Hapus">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>

                                                        <a target="_blank"
                                                           href="pages/cetak_cn.php?&cetak_id=<?php echo $db['id']; ?>"
                                                           onclick="return confirm('Anda yakin ingin Mencetak data ini?')"
                                                           class="btn btn-custom waves-effect waves-light btn-sm"
                                                           title="Print">
                                                            <i class="fa fa-print"></i>
                                                        </a>
                                                    <?php } ?>

                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                        $no++;
                                    }
                                } else {
                                ?>
                                    <tr>
                                        <td colspan="7" align="center">Tidak Ada Data</td>
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