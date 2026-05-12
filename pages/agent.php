<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Agent</h4>

                        <div class="row">
                            <div class="col-lg-9">
                                <div class="p-20">
                                    <?php 
                                    if (isset($_GET['hapus'])) {
                                        $id_hapus = $_GET['hapus'];
                                        $ex = mysqli_query($koneksi, "DELETE FROM agent WHERE id='$id_hapus'");
                                        if ($ex) {
                                    ?>
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Selamat!</strong> Data Sukses Di Hapus.
                                            </div>
                                    <?php
                                        }
                                    }

                                    if (isset($_POST['submit'])) {
                                        $nama_agent = $_POST['nama_agent'];
                                        $alamat = $_POST['alamat'];
                                        $hp = $_POST['hp'];

                                        $insert = mysqli_query($koneksi, "INSERT INTO agent SET nama_agent='$nama_agent', alamat='$alamat', hp='$hp'");
                                        if ($insert) {
                                    ?>
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Selamat!</strong> Data Sukses Di Simpan.
                                            </div>
                                    <?php
                                        } else {
                                    ?>
                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Maaf!</strong> Data Gagal Di Simpan.
                                            </div>
                                    <?php
                                        }
                                    }

                                    $level = $_SESSION['level'];
                                    $j_permis = mysqli_query($koneksi, "SELECT * FROM permis WHERE menu='agent' AND user='$level' LIMIT 1");
                                    $data_permis = mysqli_fetch_array($j_permis);

                                    $can_update = isset($data_permis['u']) && $data_permis['u'] == 'y';
                                    $can_delete = isset($data_permis['d']) && $data_permis['d'] == 'y';
                                    ?>

                                    <form class="form-horizontal" method="post" action="">

                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nama agent</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="nama_agent" id="nama_agent" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Alamat</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="alamat" id="alamat" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">HP</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="hp" id="hp">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">&nbsp;</label>
                                            <div class="col-lg-8">
                                                <button id="addToTable" class="btn btn-primary waves-effect waves-light" type="submit" value="submit" name="submit">
                                                    <i class="fa fa-plus">&nbsp; Simpan</i>
                                                </button>

                                                <button id="addToTable" class="btn btn-primary waves-effect waves-light" type="button" value="kembali" name="kembali">
                                                    <i class="fa fa-plus">&nbsp; Kembali</i>
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br><br>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="header-title m-t-0 m-b-30">Daftar agent</h4>

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama agent</th>
                                    <th>Alamat</th>
                                    <th>HP</th>
                                    <th style="width:110px; text-align:center;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $text = mysqli_query($koneksi, "SELECT * FROM agent ORDER BY id DESC");
                                if (mysqli_num_rows($text) > 0) {
                                    $no = 1;
                                    while ($db = mysqli_fetch_array($text)) {
                                ?>
                                        <tr>
                                            <td align="center" width="20"><?php echo $no; ?></td>
                                            <td align="center" width="50"><?php echo $db['nama_agent']; ?></td>
                                            <td><?php echo $db['alamat']; ?></td>
                                            <td><?php echo $db['hp']; ?></td>

                                            <td align="center">
                                                <div style="display:flex; justify-content:center; align-items:center; gap:5px; flex-wrap:nowrap; min-width:80px;">

                                                    <?php if ($can_update) { ?>
                                                        <a href="?page=edit_agent&edit=<?php echo $db['id']; ?>"
                                                           class="btn btn-primary waves-effect waves-light btn-sm"
                                                           title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    <?php } ?>

                                                    <?php if ($can_delete) { ?>
                                                        <a href="?page=agent&hapus=<?php echo $db['id']; ?>"
                                                           onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                           class="btn btn-danger waves-effect waves-light btn-sm"
                                                           title="Hapus">
                                                            <i class="fa fa-trash-o"></i>
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
                                        <td colspan="5" align="center">Tidak Ada Data</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer text-right">
        Copryright PT. Surabaya Transmoda Jaya Developed By Hosterweb PT. MULTI OKTO MANUNGGAL Development Hosterweb Indonesia
    </footer>
</div>

<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
</div>
<!-- END wrapper -->