<?php
$bulan_ini_awal = date('Y-m-01');
$bulan_depan_awal = date('Y-m-01', strtotime('+1 month'));
$hari_ini = date('Y-m-d');

function mom_single_value($koneksi, $sql, $default = 0) {
    $q = mysqli_query($koneksi, $sql);
    if ($q && ($row = mysqli_fetch_row($q))) {
        return ($row[0] !== null && $row[0] !== '') ? $row[0] : $default;
    }
    return $default;
}

function mom_count($koneksi, $sql) {
    return (int) mom_single_value($koneksi, $sql, 0);
}

function mom_money($value) {
    return 'Rp ' . number_format((float) $value, 0, ',', '.');
}

function mom_money_short($value) {
    $value = (float) $value;
    if ($value >= 1000000000) return 'Rp ' . number_format($value / 1000000000, 1, ',', '.') . ' M';
    if ($value >= 1000000) return 'Rp ' . number_format($value / 1000000, 1, ',', '.') . ' Jt';
    return mom_money($value);
}

$total_job_bulan = mom_count($koneksi, "SELECT COUNT(id) FROM create_job_copy WHERE tgl >= '$bulan_ini_awal' AND tgl < '$bulan_depan_awal'");
$total_invoice_bulan = mom_count($koneksi, "SELECT COUNT(id) FROM create_job_copy WHERE tgl >= '$bulan_ini_awal' AND tgl < '$bulan_depan_awal' AND invoice_number <> ''");
$total_belum_invoice = mom_count($koneksi, "SELECT COUNT(id) FROM create_job_copy WHERE tgl >= '$bulan_ini_awal' AND tgl < '$bulan_depan_awal' AND (invoice_number = '' OR invoice_number IS NULL)");
$total_job_hari_ini = mom_count($koneksi, "SELECT COUNT(id) FROM create_job_copy WHERE tgl = '$hari_ini'");
$total_pendapatan_bulan = mom_single_value($koneksi, "SELECT SUM(CAST(REPLACE(total_amount, ',', '') AS DECIMAL(18,2))) FROM create_job_copy WHERE tgl >= '$bulan_ini_awal' AND tgl < '$bulan_depan_awal' AND invoice_number <> ''", 0);
$total_kas_masuk = mom_single_value($koneksi, "SELECT SUM(CAST(REPLACE(nominal, ',', '') AS DECIMAL(18,2))) FROM arus_kas_masuk WHERE tgl >= '$bulan_ini_awal' AND tgl < '$bulan_depan_awal'", 0);
$total_kas_keluar = mom_single_value($koneksi, "SELECT SUM(CAST(REPLACE(nominal, ',', '') AS DECIMAL(18,2))) FROM arus_kas_keluar WHERE tgl >= '$bulan_ini_awal' AND tgl < '$bulan_depan_awal'", 0);
$saldo_estimasi = (float)$total_kas_masuk - (float)$total_kas_keluar;

$shipments = array('Export LCL', 'Export FCL', 'Import LCL', 'Import FCL', 'Domestic', 'EMKL');
$shipment_total = array();
foreach ($shipments as $shipment) {
    $shipment_safe = mysqli_real_escape_string($koneksi, $shipment);
    $shipment_total[$shipment] = mom_count($koneksi, "SELECT COUNT(id) FROM create_job_copy WHERE tgl >= '$bulan_ini_awal' AND tgl < '$bulan_depan_awal' AND shipment='$shipment_safe'");
}

$recent_invoice = mysqli_query($koneksi, "SELECT id, tgl, shipment, job_number, invoice_number, customer, total_amount FROM create_job_copy WHERE invoice_number <> '' ORDER BY id DESC LIMIT 6");
?>
  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

<style>
.mom-dashboard-hero{background:linear-gradient(135deg,#188ae2 0%,#35b8e0 55%,#10c469 100%);border-radius:14px;padding:24px 26px;margin-bottom:20px;color:#fff;box-shadow:0 8px 22px rgba(24,138,226,.18)}
.mom-dashboard-hero h3{margin:0 0 8px;font-weight:700;color:#fff;letter-spacing:.2px}.mom-dashboard-hero p{margin:0;color:rgba(255,255,255,.88)}
.mom-kpi{border:0;border-radius:12px;box-shadow:0 5px 18px rgba(32,43,54,.08);transition:.2s ease;min-height:126px}.mom-kpi:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(32,43,54,.12)}
.mom-kpi .kpi-icon{width:46px;height:46px;border-radius:12px;text-align:center;line-height:46px;font-size:22px;float:right}.mom-kpi .kpi-title{font-size:12px;text-transform:uppercase;letter-spacing:.7px;color:#8a98ac;margin-bottom:10px;font-weight:700}.mom-kpi .kpi-value{font-size:26px;font-weight:700;margin:0;color:#303841}.mom-kpi .kpi-note{font-size:12px;color:#98a6ad;margin-top:8px}.mom-bg-blue{background:#eaf5ff;color:#188ae2}.mom-bg-green{background:#eafaf5;color:#10c469}.mom-bg-orange{background:#fff4e5;color:#f9a11b}.mom-bg-red{background:#fff0f0;color:#ff5b5b}
.mom-panel{border:0;border-radius:12px;box-shadow:0 5px 18px rgba(32,43,54,.08);overflow:hidden}.mom-panel .panel-heading{background:#fff;border-bottom:1px solid #eef2f7;padding:18px 20px}.mom-panel .panel-title{font-weight:700;color:#303841}.mom-panel .panel-body{padding:20px}.mom-shipment{display:flex;align-items:center;justify-content:space-between;padding:13px 0;border-bottom:1px solid #f0f3f6}.mom-shipment:last-child{border-bottom:0}.mom-shipment b{font-size:14px;color:#303841}.mom-shipment span{background:#f4f8fb;color:#188ae2;border-radius:20px;padding:6px 12px;font-weight:700}.mom-action{display:block;border:1px solid #e9eef3;border-radius:12px;padding:18px;text-align:center;margin-bottom:12px;background:#fff;color:#303841;transition:.2s}.mom-action:hover{background:#f7fbff;border-color:#188ae2;color:#188ae2}.mom-action i{display:block;font-size:26px;margin-bottom:9px}.mom-table table{margin-bottom:0}.mom-table thead th{border-bottom:1px solid #eef2f7!important;color:#8a98ac;font-size:12px;text-transform:uppercase}.mom-table tbody td{vertical-align:middle!important}.mom-label{border-radius:20px;padding:5px 10px;font-size:11px}.mom-footer-note{color:#98a6ad;font-size:12px;margin-top:10px}@media(max-width:767px){.mom-dashboard-hero{padding:20px}.mom-kpi .kpi-value{font-size:22px}}
</style>

                        <div class="mom-dashboard-hero">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>Dashboard SIA MOM Logistic</h3>
                                    <p>Ringkasan operasional bulan <?php echo date('F Y'); ?> untuk monitoring job, invoice, dan arus kas.</p>
                                </div>
                                <div class="col-md-4 text-right">
                                    <p style="margin-top:7px"><i class="fa fa-calendar"></i> <?php echo date('d-m-Y'); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="card-box mom-kpi">
                                    <div class="kpi-icon mom-bg-blue"><i class="fa fa-briefcase"></i></div>
                                    <div class="kpi-title">Total Job Bulan Ini</div>
                                    <h2 class="kpi-value"><?php echo number_format($total_job_bulan); ?></h2>
                                    <div class="kpi-note"><?php echo number_format($total_job_hari_ini); ?> job hari ini</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card-box mom-kpi">
                                    <div class="kpi-icon mom-bg-green"><i class="fa fa-file-text-o"></i></div>
                                    <div class="kpi-title">Invoice Terbit</div>
                                    <h2 class="kpi-value"><?php echo number_format($total_invoice_bulan); ?></h2>
                                    <div class="kpi-note">Invoice bulan berjalan</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card-box mom-kpi">
                                    <div class="kpi-icon mom-bg-orange"><i class="fa fa-clock-o"></i></div>
                                    <div class="kpi-title">Belum Invoice</div>
                                    <h2 class="kpi-value"><?php echo number_format($total_belum_invoice); ?></h2>
                                    <div class="kpi-note">Perlu follow up</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card-box mom-kpi">
                                    <div class="kpi-icon mom-bg-red"><i class="fa fa-money"></i></div>
                                    <div class="kpi-title">Nilai Invoice</div>
                                    <h2 class="kpi-value"><?php echo mom_money_short($total_pendapatan_bulan); ?></h2>
                                    <div class="kpi-note"><?php echo mom_money($total_pendapatan_bulan); ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="panel mom-panel mom-table">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-bar-chart"></i> Ringkasan Shipment Bulan Ini</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <?php foreach ($shipment_total as $nama => $jumlah) { ?>
                                                <div class="col-sm-6">
                                                    <div class="mom-shipment">
                                                        <b><?php echo $nama; ?></b>
                                                        <span><?php echo number_format($jumlah); ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="mom-footer-note">Data dihitung dari tanggal job pada bulan berjalan.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel mom-panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-bank"></i> Ringkasan Kas Bulan Ini</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="mom-shipment"><b>Kas Masuk</b><span><?php echo mom_money_short($total_kas_masuk); ?></span></div>
                                        <div class="mom-shipment"><b>Kas Keluar</b><span><?php echo mom_money_short($total_kas_keluar); ?></span></div>
                                        <div class="mom-shipment"><b>Estimasi Saldo</b><span><?php echo mom_money_short($saldo_estimasi); ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <a class="mom-action" href="?page=create_job"><i class="fa fa-plus-circle"></i><b>Create Job</b><br><small>Buat data job baru</small></a>
                            </div>
                            <div class="col-lg-4">
                                <a class="mom-action" href="?page=entry_job"><i class="fa fa-tasks"></i><b>Entry Job</b><br><small>Kelola data pekerjaan</small></a>
                            </div>
                            <div class="col-lg-4">
                                <a class="mom-action" href="?page=entry_invoice"><i class="fa fa-file-pdf-o"></i><b>Entry Invoice</b><br><small>Buat dan cetak invoice</small></a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel mom-panel mom-table">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-list"></i> Invoice Terbaru</h3>
                                    </div>
                                    <div class="panel-body table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Shipment</th>
                                                    <th>Job Number</th>
                                                    <th>Invoice Number</th>
                                                    <th>Customer</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if ($recent_invoice && mysqli_num_rows($recent_invoice) > 0) { ?>
                                                <?php while ($inv = mysqli_fetch_assoc($recent_invoice)) { ?>
                                                    <tr>
                                                        <td><?php echo date('d-m-Y', strtotime($inv['tgl'])); ?></td>
                                                        <td><span class="label label-info mom-label"><?php echo $inv['shipment']; ?></span></td>
                                                        <td><?php echo $inv['job_number']; ?></td>
                                                        <td><b><?php echo $inv['invoice_number']; ?></b></td>
                                                        <td><?php echo $inv['customer']; ?></td>
                                                        <td class="text-right"><?php echo mom_money(str_replace(',', '', $inv['total_amount'])); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <tr><td colspan="6" class="text-center text-muted">Belum ada invoice terbaru.</td></tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

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
