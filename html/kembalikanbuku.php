<?php
include "koneksi.php";

if (isset($_GET['id']) && isset($_GET['BukuID'])) {
    $PeminjamanID = $_GET['id'];
    $BukuID = $_GET['BukuID'];

    // Ubah status peminjaman menjadi 'dikembalikan'
    $tanggalPengembalian = date('Y-m-d');
    $sql = "UPDATE peminjaman SET StatusPeminjaman = 'dikembalikan', TanggalPengembalian = '$tanggalPengembalian' WHERE PeminjamanID = '$PeminjamanID' AND BukuID = '$BukuID'";

    if ($koneksi->query($sql) === TRUE) {
        // Jika berhasil, tampilkan pop-up dan redirect ke halaman ulasan.php
        echo "<script>
                alert('Buku berhasil dikembalikan.');
                window.location.href = 'ulasan.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>
