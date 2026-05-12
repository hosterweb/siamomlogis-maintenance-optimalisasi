<?php
session_start();
/* CandralabGIS v 1.0
 * @author Candra adi putra
 *  <candraadiputra@gmail.com>
 * http://www.candra.web.id
 * last edit: 27 Oktober 2013
 */
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5(trim($_POST['password']));
    $sql = "select  * from  users  where username='$username'
      and password='$password' ";

    $sql_login = mysqli_query($koneksi, $sql) or die(mysqli_error());
    $hasil = mysqli_fetch_array($sql_login);

    if(mysqli_num_rows($sql_login) == 1) {
        $_SESSION['username'] = $hasil['username'];
        $_SESSION['level'] = $hasil['level'];
        $_SESSION['nama_lengkap'] = $hasil['nama_lengkap'];
        $_SESSION['jobdesk'] = $hasil['jobdesk'];
        header("Location:index.php?page=home");
    } else {
        header("Location:index.php?page=login");
    }
}
?>

<style>
    body {
        min-height: 100vh;
        background: #eef3f8;
        background-image:
            radial-gradient(circle at 12% 18%, rgba(42, 157, 143, .18), transparent 28%),
            radial-gradient(circle at 85% 12%, rgba(47, 111, 237, .16), transparent 26%),
            linear-gradient(135deg, #f7fafc 0%, #edf3f8 48%, #e7eef6 100%);
    }
    .sia-login-page {
        min-height: calc(100vh - 20px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 35px 15px;
    }
    .sia-login-card {
        width: 100%;
        max-width: 980px;
        display: table;
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 25px 70px rgba(15, 37, 64, .16);
        border: 1px solid rgba(255,255,255,.7);
    }
    .sia-login-left,
    .sia-login-right {
        display: table-cell;
        vertical-align: middle;
    }
    .sia-login-left {
        width: 45%;
        position: relative;
        padding: 46px 42px;
        color: #ffffff;
        background: linear-gradient(145deg, #0f5f7a 0%, #12928f 54%, #28b487 100%);
    }
    .sia-login-left:before,
    .sia-login-left:after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,.12);
    }
    .sia-login-left:before { width: 220px; height: 220px; right: -80px; top: -70px; }
    .sia-login-left:after { width: 150px; height: 150px; left: -45px; bottom: -45px; }
    .sia-brand-box { position: relative; z-index: 2; }
    .sia-brand-logo {
        width: 112px;
        height: 112px;
        background: rgba(255,255,255,.94);
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 28px;
        box-shadow: 0 16px 35px rgba(0,0,0,.12);
    }
    .sia-brand-logo img { max-width: 86px; height: auto; }
    .sia-login-left h2 {
        font-size: 29px;
        line-height: 1.25;
        margin: 0 0 14px;
        font-weight: 700;
        color: #ffffff;
    }
    .sia-login-left p {
        color: rgba(255,255,255,.86);
        font-size: 14px;
        line-height: 1.8;
        margin-bottom: 26px;
    }
    .sia-badge-row span {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 999px;
        background: rgba(255,255,255,.14);
        color: #ffffff;
        font-size: 12px;
        margin: 0 6px 8px 0;
        border: 1px solid rgba(255,255,255,.17);
    }
    .sia-login-right {
        padding: 50px 54px;
        background: #ffffff;
    }
    .sia-form-title { margin-bottom: 30px; }
    .sia-form-title h4 {
        font-size: 24px;
        color: #183247;
        font-weight: 700;
        margin: 0 0 8px;
        text-transform: none;
    }
    .sia-form-title p {
        color: #7a8b9a;
        font-size: 14px;
        margin: 0;
    }
    .sia-login-right .form-group { margin-bottom: 18px; }
    .sia-input-wrap { position: relative; }
    .sia-input-wrap i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #8ca0b3;
        font-size: 16px;
        z-index: 2;
    }
    .sia-login-right .form-control {
        height: 48px;
        border-radius: 14px;
        border: 1px solid #dfe8f1;
        box-shadow: none;
        padding-left: 46px;
        color: #243b53;
        background: #f9fbfd;
        transition: all .2s ease;
    }
    .sia-login-right .form-control:focus {
        background: #ffffff;
        border-color: #1aa096;
        box-shadow: 0 0 0 4px rgba(26, 160, 150, .10);
    }
    .sia-login-btn {
        height: 48px;
        border-radius: 14px;
        border: 0;
        background: linear-gradient(135deg, #11998e 0%, #1d7fd2 100%) !important;
        color: #ffffff !important;
        font-weight: 700;
        letter-spacing: .3px;
        box-shadow: 0 12px 25px rgba(17, 153, 142, .25);
    }
    .sia-login-footer {
        margin-top: 24px;
        font-size: 12px;
        color: #9aa9b7;
        text-align: center;
    }
    @media (max-width: 767px) {
        .sia-login-card,
        .sia-login-left,
        .sia-login-right { display: block; width: 100%; }
        .sia-login-left { padding: 34px 28px; }
        .sia-login-right { padding: 34px 26px; }
        .sia-login-left h2 { font-size: 23px; }
    }
</style>

<div class="sia-login-page">
    <div class="sia-login-card">
        <div class="sia-login-left">
            <div class="sia-brand-box">
                <div class="sia-brand-logo">
                    <img src="assets/images/logo_koperasi_70.png" alt="SIA MOM Logistic">
                </div>
                <h2>SIA MOM Logistic</h2>
                <p>Sistem informasi akuntansi untuk membantu proses operasional, invoice, job, kas, dan laporan logistik secara lebih rapi.</p>
                <div class="sia-badge-row">
                    <span>Invoice</span>
                    <span>Entry Job</span>
                    <span>Cash Flow</span>
                    <span>Report</span>
                </div>
            </div>
        </div>

        <div class="sia-login-right">
            <div class="sia-form-title text-center">
                <h4>Login Sistem</h4>
                <p>Masukkan username dan password untuk melanjutkan.</p>
            </div>

            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <div class="sia-input-wrap">
                        <i class="fa fa-user"></i>
                        <input class="form-control" type="text" required="" placeholder="Username" name="username" autocomplete="username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="sia-input-wrap">
                        <i class="fa fa-lock"></i>
                        <input class="form-control" type="password" required="" placeholder="Password" name="password" autocomplete="current-password">
                    </div>
                </div>

                <div class="form-group text-center m-t-25">
                    <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light sia-login-btn" type="submit" name="login" value="login">Login</button>
                </div>
            </form>

            <div class="sia-login-footer">
                © <?php echo date('Y'); ?> SIA MOM Logistic System
            </div>
        </div>
    </div>
</div>
