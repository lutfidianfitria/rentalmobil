<?php
session_start();
?>

<?php
     
// Koneksi ke database
include_once "koneksi.php";
if (isset($_POST['pinjam_buku'])) {
  $UserID = $_SESSION['UserID']; // Ambil UserID dari sesi pengguna yang login
  $BukuID = $_POST['BukuID']; // ID buku yang dipilih

  // Tanggal peminjaman otomatis (hari ini)
  $TanggalPeminjaman = date('Y-m-d');

  // Tanggal kembali otomatis (7 hari setelah tanggal pinjam)
  $TanggalPengembalian = date('Y-m-d', strtotime($TanggalPeminjaman . ' + 7 days'));

  // Status peminjaman otomatis
  $StatusPeminjaman = 'dipinjam';

  // Query untuk memasukkan data peminjaman ke dalam tabel
  $query = "INSERT INTO peminjaman (UserID, BukuID, TanggalPeminjaman, TanggalPengembalian, StatusPeminjaman) 
            VALUES ('$UserID', '$BukuID', '$TanggalPeminjaman', '$TanggalPengembalian', '$StatusPeminjaman')";

  if (mysqli_query($koneksi, $query)) {
      echo "Buku berhasil dipinjam!";
  } else {
      echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
  }
}
$sql = "SELECT * FROM buku";
$result = $koneksi->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/logo-light.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">UI COMPONENTS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Buttons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Alerts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="buku.php" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Buku</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="form.php" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Forms</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="table.php" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Tabel</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-6" class="fs-6"></iconify-icon>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:login-3-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:user-plus-rounded-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4" class="fs-6"></iconify-icon>
              <span class="hide-menu">EXTRA</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:sticker-smile-circle-2-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Icons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:planet-3-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
          </ul>
          <div class="unlimited-access hide-menu bg-primary-subtle position-relative mb-7 mt-7 rounded-3">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-75">Upgrade to pro</h6>
                <a href="#" target="_blank"
                  class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      
      <!--  Header End -->
      <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Pengembalian</h4>

          

              <!-- Bootstrap Table with Header - Light -->

              <div class="card">
                <h5 class="card-header">Tabel Pengembalian</h5>
                <div class="table-responsive text-nowrap">
                <div class="card">
                <h5 class="card-header"></h5>
                      

                      <button class="btn btn-info rounded.pill" name="tambah" values= ""> +Tambah Buku</button> </a>
<br>
                      <table class="table table-dark">
              
                </thead>
                <tbody>
                 
        <?php
        // Include the database connection
include "koneksi.php";

// Check for connection errors
if ($koneksi->connect_error) {
    die("Koneksi gagal:" . $koneksi->connect_error);
}

$sql = "SELECT 
          p.PeminjamanID,
          p.BukuID,
          b.foto,
          b.Judul,
          p.TanggalPengembalian,
          p.StatusPeminjaman
        FROM 
          peminjaman p
        JOIN 
          buku b ON p.BukuID = b.BukuID
        WHERE p.StatusPeminjaman = 'dipinjam'";

$result = $koneksi->query($sql);
?>

<table class="table table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Gambar Buku</th>
            <th>Judul Buku</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
if ($result->num_rows > 0) {
  // Output data dari setiap baris
  while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["PeminjamanID"] . "</td>";

      // Mengambil gambar dari folder img
      echo "<td><img src='img/" . $row['foto'] . "' alt='Gambar Buku' style='width:200px;height:200px;border-radius:0;'></td>";

      echo "<td>" . $row["Judul"] . "</td>";

      // Format and display TanggalPengembalian
      if (!empty($row["TanggalPengembalian"])) {
          echo "<td>" . date('d-m-Y', strtotime($row["TanggalPengembalian"])) . "</td>"; // Format date
      } else {
          echo "<td>Tanggal tidak ada</td>"; // In case the date is empty
      }

      echo "<td>" . $row["StatusPeminjaman"] . "</td>";
      echo "<td><a href='kembalikanbuku.php?id=" . $row["PeminjamanID"] . "&BukuID=" . $row["BukuID"] . "' class='btn btn-primary'>Kembalikan Buku</a></td>";
      echo "</tr>";
  }
} else {
  echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
}

?>

    </tbody>
</table>

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>