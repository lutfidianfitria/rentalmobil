<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .hero {
            background-image: url('https://via.placeholder.com/1600x900'); /* Ganti dengan gambar latar belakang */
            background-size: cover;
            height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .hero h1, .hero p {
            z-index: 2;
        }
        .features {
            margin: 50px 0;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .login-modal .modal-dialog {
            max-width: 400px;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="display-4">Sewa Mobil Impian Anda</h1>
            <p class="lead">Mobil berkualitas dengan harga terjangkau, siap menemani perjalanan Anda.</p>
            <a href="#" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            <a href="formsewa.php" class="btn btn-light btn-lg">Sewa Sekarang</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="text-center">Mengapa Memilih Kami?</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mobil Berkualitas</h5>
                            <p class="card-text">Kami menyediakan berbagai jenis mobil yang terawat dan berkualitas tinggi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Harga Terjangkau</h5>
                            <p class="card-text">Nikmati harga sewa yang kompetitif dan transparan tanpa biaya tersembunyi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Layanan Pelanggan 24/7</h5>
                            <p class="card-text">Tim kami siap membantu Anda kapan saja dengan layanan pelanggan yang ramah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2>Hubungi Kami</h2>
            <p>Untuk pertanyaan lebih lanjut, silakan hubungi kami di:</p>
            <p>Email: info@rentalmobil.com</p>
            <p>Telepon: +62 123 4567 890</p>
            <a href="contact.php" class="btn btn-primary">Kontak Kami</a>
        </div>
    </section>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="proses_login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p>&copy; 2024 Rental Mobil. Semua hak dilindungi.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
