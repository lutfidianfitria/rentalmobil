<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <!-- Include Font Awesome for star icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    .rating {
      direction: rtl; /* To make stars clickable from right to left */
      display: inline-block;
    }

    .rating input {
      display: none; /* Hide the radio buttons */
    }

    .rating label {
      font-size: 32px; /* Adjust size as needed */
      color: gray; /* Default star color */
      cursor: pointer;
      transition: color 0.3s; /* Smooth transition for color change */
    }

    .rating input:checked ~ label {
      color: gold; /* Color of selected stars */
    }

    .rating label:hover,
    .rating label:hover ~ label {
      color: gold; /* Color on hover */
    }

    /* Additional style to make unselected stars gray */
    .rating input:not(:checked) + label:hover,
    .rating input:not(:checked) + label:hover ~ label {
      color: lightgray; /* Color of unselected stars on hover */
    }
  </style>
</head>
<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar and Header code here... -->

    <center>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="UserID" value="1"> <!-- Ensure UserID is sent -->
    <input type="hidden" name="BukuID" value="1"> <!-- Ensure BukuID is sent -->
    
    <h6>Peringkat Bintang</h6>
   
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card mb-4" style="max-width: 400px; margin: auto;">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Kirim Ulasan</h5>
                </div>
                <div class="card-body">
                    <label for="Ratiing">Rating</label>
                    <div class="rating">
                        <input type="radio" id="star5" name="Ratiing" value="5" required>
                        <label for="star5" class="fas fa-star"></label>
                        <input type="radio" id="star4" name="Ratiing" value="4">
                        <label for="star4" class="fas fa-star"></label>
                        <input type="radio" id="star3" name="Ratiing" value="3">
                        <label for="star3" class="fas fa-star"></label>
                        <input type="radio" id="star2" name="Ratiing" value="2">
                        <label for="star2" class="fas fa-star"></label>
                        <input type="radio" id="star1" name="Ratiing" value="1">
                        <label for="star1" class="fas fa-star"></label>
                    </div>

                    <label for="Ulasan">Ulasan</label>
                    <textarea name="Ulasan" placeholder="Masukkan ulasan" required class="form-control mb-2"></textarea>

                    <button type="submit" name="submit" class="btn btn-primary">Kirim Ulasan</button>
                </div>
            </div>
        </div>
    </div>
</form>

           <?php
$koneksi = new mysqli("localhost", "root", "", "perpus"); 

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if (isset($_POST['submit'])) {
    $UserID = $_POST['UserID']; // Ambil userID dari input atau session
    $BukuID = $_POST['BukuID']; // Ambil bukuID dari input
    $Rating = $_POST['Ratiing']; // Mengambil nilai rating dari form
    $Ulasan = $_POST['Ulasan'];  // Mengambil nilai ulasan dari form

    // Validasi input untuk memastikan tidak ada yang kosong
    if (!empty($UserID) && !empty($BukuID) && !empty($Rating) && !empty($Ulasan)) {
        // Menyiapkan query untuk memasukkan data ke tabel ulasan
        $sql = "INSERT INTO ulasanbuku (UserID, BukuID, Rating, Ulasan) VALUES ('$UserID', '$BukuID', '$Rating', '$Ulasan')";
        $query = mysqli_query($koneksi, $sql);

        if ($query) {
            // Jika ulasan berhasil dikirim, hapus data dari tabel buku atau ulasan
            $delete_sql = "DELETE FROM buku WHERE BukuID = '$BukuID'"; // Misalkan Anda ingin menghapus buku
            $delete_query = mysqli_query($koneksi, $delete_sql);

            if ($delete_query) {
                echo "<script>alert('Ulasan berhasil dikirim dan buku dihapus!');window.location.href='history.php';</script>";
            } else {
                echo "<script>alert('Ulasan berhasil dikirim, tetapi gagal menghapus buku: " . mysqli_error($koneksi) . "');</script>";
            }
        } else {
            echo "<script>alert('Gagal mengirim ulasan: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        echo "<script>alert('Semua field harus diisi!');</script>";
    }
}
?>

    <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
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
