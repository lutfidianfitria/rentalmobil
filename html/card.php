<?php
$koneksi = new mysqli("localhost", "root", "", "rental");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil data dari tbl_mobil
$sql = "SELECT nopol, brand, type, tahun, harga, status, foto FROM tbl_mobil";
$result = $koneksi->query($sql);

// Cek apakah query berhasil
if (!$result) {
    die("Query error: " . $koneksi->error);
}
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
  <style>
    /* CSS untuk card bulat dan styling */
    .card {
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.card:hover {
    transform: scale(1.05);
}

.card-img-top {
    height: 200px; /* Atur tinggi gambar */
    object-fit: cover;
}

  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
   
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
            <!-- Sidebar items go here -->
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="container mt-3">
    <h4 class="fw-bold mb-3">Rental Mobil</h4>
    <div class="row">
        <?php
        // Menampilkan data mobil dalam card
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              ?>
              <div class="col-md-4 mb-4">
                  <div class="card h-100">
                      <img src="img/<?php echo $row['foto']; ?>" class="card-img-top" alt="foto">
                      <div class="card-body">
                          <h5 class="card-title"><?php echo $row['brand'] . " " . $row['type']; ?></h5>
                          <p class="card-text">
                              <strong>Nomor Polisi:</strong> <?php echo $row['nopol']; ?><br>
                              <strong>Tahun:</strong> <?php echo date('Y', strtotime($row['tahun'])); ?><br>
                              <strong>Harga/Hari:</strong> Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?><br>
                              <strong>Status:</strong> <?php echo ucfirst($row['status']); ?>
                          </p>
                      </div>
                      <div class="card-footer text-center">
                          <?php if ($row['status'] == 'tersedia') { ?>
                              <a href="form_transaksi.php?nopol=<?php echo $row['nopol']; ?>" class="btn btn-primary">Sewa</a>
                          <?php } else { ?>
                              <button class="btn btn-secondary" disabled>Tidak Tersedia</button>
                          <?php } ?>
                      </div>
                  </div>
              </div>
              <?php
          }
      } else {
          echo "<p class='text-center'>Tidak ada data mobil tersedia.</p>";
      }
?>

    </div>
</div>

      <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
