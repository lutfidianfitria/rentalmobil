<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "rental");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cek apakah kunci ada di array $_POST
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';

    // Cek tabel tbl_member
    $stmt = $koneksi->prepare("SELECT * FROM tbl_member WHERE user = ?");
    if ($stmt === false) {
        die("Error preparing statement: " . $koneksi->error);
    }
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $member = $result->fetch_assoc();

    // Jika tidak ditemukan, cek tabel tbl_user
    if (!$member) {
        $stmt = $koneksi->prepare("SELECT * FROM tbl_user WHERE user = ?");
        if ($stmt === false) {
            die("Error preparing statement: " . $koneksi->error);
        }
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    } else {
        $user = $member;
    }

    // Debugging: Tampilkan informasi login
    if ($user) {
        echo "Username ditemukan: " . htmlspecialchars($user['user']) . "<br>";
        echo "Password yang dimasukkan: " . htmlspecialchars($password) . "<br>";
        echo "Hash password dari database: " . htmlspecialchars($user['pass']) . "<br>";
    } else {
        echo "Username tidak ditemukan.<br>";
    }

    // Verifikasi password
    if ($user && password_verify($password, $user['pass'])) {
        // Password benar, mulai sesi
        $_SESSION['user'] = $user['user'];
        if (isset($user['nik'])) {
            $_SESSION['nik'] = $user['nik'];
            $_SESSION['nama'] = $user['nama'];
        }
        // Redirect based on level
        if (isset($user['level'])) {
            if ($user['level'] === 'admin') {
                header("Location: ../SEODash-1.0.0 - Copy/src/html/admin.php");
                exit;
            } elseif ($user['level'] === 'petugas') {
                header("Location: petugas.php");
                exit;
            }
        } else {
            header("Location: card.php");
            exit;
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>







<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="rental/src/assets/css/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="rental/src/assets/css/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="rental/src/assets/css/css/responsive.css" rel="stylesheet" />
</head>


<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/logo-light.svg" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
                <?php if (!empty($error_message)): ?>
                  <div class="alert alert-danger text-center">
                    <?php echo $error_message; ?>
                  </div>
                <?php endif; ?>
                <form action="" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remember this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="index.php">Forgot Password?</a>
                  </div>
                  <button name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4" type="submit">Sign In</button>

                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to SeoDash?</p>
                    <a class="text-primary fw-bold ms-2" href="register.php">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>
