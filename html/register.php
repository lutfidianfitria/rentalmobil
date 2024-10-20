<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/logo-light.svg" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
              
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              
                
              <form id="formAuthentication" class="mb-3" action="" method="POST">
                                      <div class="mb-3">
                                        <label for="email" class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="NIK" name="nik" placeholder="Masukan NIK" />
                                      </div>
                                      <div class="mb-3">
                                        <label for="username" class="form-label">Nama </label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" />
                                      </div>
                                      
                                      <div class="mb-3 ">
                                      <label class="form-label" for="status">Jenis Kelamin</label>
                                      <select class="form-select" id="jk" name="jk" aria-label="jk">
                                            <option value="">Pilih JK</option>
                                            <option value="P">Perempuan</option>
                                            <option value="L">Laki-Laki</option>
                                        </select>

                                      </div>
                                      <div class="mb-3">
                                        <label for="email" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="email" name="alamat" placeholder="Masukan Alamat Anda" />
                                      </div>
                                      <div class="mb-3">
                                        <label for="email" class="form-label">Telepon</label>
                                        <input type="text" class="form-control" id="email" name="telp" placeholder="Masukan Alamat Anda" />
                                      </div>
                                      <div class="mb-3">
                                        <label for="user" class="form-label">User</label>
                                        <input type="text" class="form-control" id="user" name="user" placeholder="Masukan user" />
                                      </div>
                                      <div class="mb-3">
                                        <label for="pass" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Masukan Password" />
                                      </div>
                                      <div class="mb-3">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                          <label class="form-check-label" for="terms-conditions">
                                            I agree to
                                            <a href="javascript:void(0);">privacy policy & terms</a>
                                          </label>
                                        </div>
                                      </div>
                
                
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100" name="submit" >Sign up</button>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.html" class="text-primary">Login</a>
                </div>
              </form>
              <?php 
$koneksi = new mysqli("localhost", "root", "", "rental");

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Check if the username already exists
    $ceknik = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE user='$username'");
    $ceknik1 = mysqli_fetch_assoc($ceknik);

    if ($ceknik1 > 0) {
        echo "<script> alert('USERNAME SUDAH DIGUNAKAN');window.location.href='register.php';</script>";
    } else {
        // Hash the password
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $sql = "INSERT INTO tbl_member (nik, nama, jk, telp, alamat, user, pass) 
                VALUES ('$nik', '$nama', '$jk', '$telp', '$alamat', '$username', '$hashed')";
        $query = mysqli_query($koneksi, $sql);

        if ($query) {
            echo "<script> alert('REGISTRASI BERHASIL');window.location.href='login.php';</script>";
        } else {
            echo "<script> alert('GAGAL MENDAFTAR');window.location.href='register.php';</script>";
        }
    }
}
?>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>