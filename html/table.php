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
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
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
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <!-- Add additional sidebar items as needed -->
          </ul>
        </nav>
      </div>
    </aside>
    <!-- Sidebar End -->

    <!-- Main wrapper -->
    <div class="body-wrapper">
      <!-- Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="#" target="_blank" class="btn btn-primary me-2">
                <span class="d-none d-md-block">Check Pro Version</span>
                <span class="d-block d-md-none">Pro</span>
              </a>
              <a href="#" target="_blank" class="btn btn-success">
                <span class="d-none d-md-block">Download Free</span>
                <span class="d-block d-md-none">Free</span>
              </a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Header End -->

      <!-- Bootstrap Dark Table -->
      <div class="card">
        <h5 class="card-header">FROM TABLE MOBIL</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Nopol</th>
                <th scope="col">Brand</th>
                <th scope="col">Type</th>
                <th scope="col">Tahun</th>
                <th scope="col">Harga</th>
                <th scope="col">Foto</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              $koneksi = new mysqli("localhost", "root", "", "rental"); // Change database name as needed

              // Ensure the connection is successful
              if ($koneksi->connect_error) {
                  die("Koneksi gagal: " . $koneksi->connect_error);
              }

              // Query to get the data
              $result = $koneksi->query("SELECT * FROM tbl_mobil"); // Adjust your table name as needed

              if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                          <td><?php echo htmlspecialchars($row['nopol']); ?></td>
                          <td><?php echo htmlspecialchars($row['brand']); ?></td>
                          <td><?php echo htmlspecialchars($row['type']); ?></td>
                          <td><?php echo htmlspecialchars($row['tahun']); ?></td>
                          <td><?php echo htmlspecialchars($row['harga']); ?></td>
                          <td><img src="img/<?php echo htmlspecialchars($row['foto']); ?>" width="100" height="100" alt="Foto Mobil"></td>
                          <td><?php echo htmlspecialchars($row['status']); ?></td>
                          <td>
                            <a href="edit.php?nopol=<?php echo $row['nopol']; ?>">
                            <button class="btn btn-info rounded-pill" name="edit">Edit</button></a> |
                            <a href="delete.php?nopol=<?php echo $row['nopol']; ?>" onclick="return confirm('Hapus Mobil?')">
                            <button class="btn btn-info rounded-pill" name="edit">Delete</button></a>
                          </td>
                      </tr>
                      <?php
                  }
              } else {
                  echo "<tr><td colspan='8' class='text-center'>Tidak ada data mobil ditemukan.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Bootstrap Dark Table -->

      <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
      <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    </div>
  </div>
</body>
</html>
