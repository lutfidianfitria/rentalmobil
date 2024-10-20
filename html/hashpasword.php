<?php
$hashedPassword = password_hash("petugas", PASSWORD_DEFAULT);
echo "Hashed Password: " . $hashedPassword; // Check this against the hash in the database
?>
