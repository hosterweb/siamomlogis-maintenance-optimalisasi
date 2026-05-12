<?php
// AJAX server-side DataTables untuk halaman Create Job
// Fokus optimasi: tabel Create Job tidak diload semua sekaligus saat halaman dibuka.
ob_start();
error_reporting(0);
ini_set('display_errors', 0);

require_once dirname(__DIR__) . '/components/koneksi.php';
if (function_exists('mysqli_set_charset')) {
    @mysqli_set_charset($koneksi, 'utf8');
}

function sia_fix_utf8($value) {
    $value = (string)$value;
    if ($value === '') return '';
    if (@preg_match('//u', $value)) return $value;
    return utf8_encode($value);
}

function e($value) {
    return htmlspecialchars(sia_fix_utf8($value), ENT_QUOTES, 'UTF-8');
}

function json_out($arr) {
    while (ob_get_level() > 0) { @ob_end_clean(); }
    header('Content-Type: application/json; charset=utf-8');
    if (defined('JSON_PARTIAL_OUTPUT_ON_ERROR')) {
        echo json_encode($arr, JSON_PARTIAL_OUTPUT_ON_ERROR);
    } else {
        echo json_encode($arr);
    }
    exit;
}

$draw  = isset($_REQUEST['draw']) ? intval($_REQUEST['draw']) : 0;
$start = isset($_REQUEST['start']) ? max(0, intval($_REQUEST['start'])) : 0;
$length = isset($_REQUEST['length']) ? intval($_REQUEST['length']) : 10;
if ($length <= 0 || $length > 100) { $length = 10; }

$search = '';
if (isset($_REQUEST['search']) && is_array($_REQUEST['search']) && isset($_REQUEST['search']['value'])) {
    $search = trim($_REQUEST['search']['value']);
}
$searchEsc = mysqli_real_escape_string($koneksi, $search);

$columns = array(
    0 => 'id',
    1 => 'shipment',
    2 => 'tgl',
    3 => 'job_number',
    4 => 'customer',
    5 => 'master_bl',
    6 => 'house_bl',
    7 => 'agent'
);
$orderColIndex = isset($_REQUEST['order'][0]['column']) ? intval($_REQUEST['order'][0]['column']) : 0;
$orderDir = (isset($_REQUEST['order'][0]['dir']) && strtolower($_REQUEST['order'][0]['dir']) === 'asc') ? 'ASC' : 'DESC';
$orderCol = isset($columns[$orderColIndex]) ? $columns[$orderColIndex] : 'id';

$where = '';
if ($search !== '') {
    $where = " WHERE shipment LIKE '%$searchEsc%' OR tgl LIKE '%$searchEsc%' OR job_number LIKE '%$searchEsc%' OR customer LIKE '%$searchEsc%' OR master_bl LIKE '%$searchEsc%' OR house_bl LIKE '%$searchEsc%' OR agent LIKE '%$searchEsc%' ";
}

$total = 0;
$qTotal = mysqli_query($koneksi, "SELECT COUNT(id) AS total FROM create_job_only");
if ($qTotal) {
    $rTotal = mysqli_fetch_assoc($qTotal);
    $total = intval($rTotal['total']);
}

$filtered = $total;
if ($where !== '') {
    $qFiltered = mysqli_query($koneksi, "SELECT COUNT(id) AS total FROM create_job_only $where");
    if ($qFiltered) {
        $rFiltered = mysqli_fetch_assoc($qFiltered);
        $filtered = intval($rFiltered['total']);
    }
}

$level = isset($_SESSION['level']) ? mysqli_real_escape_string($koneksi, $_SESSION['level']) : '';
$perm = array('u' => '', 'd' => '');
$qPerm = mysqli_query($koneksi, "SELECT u, d FROM permis WHERE menu='create_job' AND user='$level' LIMIT 1");
if ($qPerm && mysqli_num_rows($qPerm) > 0) {
    $perm = mysqli_fetch_assoc($qPerm);
}

$sql = "SELECT id, shipment, tgl, job_number, customer, master_bl, house_bl, agent FROM create_job_only $where ORDER BY $orderCol $orderDir LIMIT $start, $length";
$qData = mysqli_query($koneksi, $sql);

$data = array();
$no = $start + 1;
if ($qData) {
    while ($db = mysqli_fetch_assoc($qData)) {
        $tgl = '';
        if (!empty($db['tgl']) && $db['tgl'] != '0000-00-00') {
            $tgl = date('d-m-Y', strtotime($db['tgl']));
        }

        $aksi = '<div class="sia-create-job-actions">';
        if (isset($perm['u']) && $perm['u'] == 'y') {
            $aksi .= '<a href="?page=edit_create_job&edit_id=' . e($db['id']) . '"><button type="button" value="Edit" class="btn btn-custom waves-effect waves-light btn-sm"><i class="fa fa-pencil"></i> Edit</button></a>';
        }
        if (isset($perm['d']) && $perm['d'] == 'y') {
            $aksi .= '<a href="?page=create_job&hapus=' . e($db['id']) . '"><button class="btn btn-custom waves-effect waves-light btn-sm" id="sa-warning" name="hapus"><i class="fa fa-trash-o"></i> Hapus</button></a>';
        }
        $aksi .= '</div>';

        $data[] = array(
            $no,
            e($db['shipment']),
            e($tgl),
            e($db['job_number']),
            e($db['customer']),
            e($db['master_bl']),
            e($db['house_bl']),
            e($db['agent']),
            $aksi
        );
        $no++;
    }
}

json_out(array(
    'draw' => $draw,
    'recordsTotal' => $total,
    'recordsFiltered' => $filtered,
    'data' => $data
));
