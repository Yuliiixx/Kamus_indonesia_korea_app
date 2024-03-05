<?php
// Include file koneksi.php
include 'koneksi.php';

// Query untuk mengambil data dari tabel kosakata
$sql = "SELECT * FROM kosakata";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Membuat array untuk menyimpan data
    $data = array();

    // Mengambil setiap baris data dari hasil query
    while($row = $result->fetch_assoc()) {
        // Menambahkan baris data ke dalam array
        $data[] = $row;
    }

    // Mengubah array ke format JSON
    $json_data = json_encode($data);

    // Mengirimkan respon JSON
    header('Content-Type: application/json');
    echo $json_data;
} else {
    // Jika tidak ada data yang ditemukan
    echo "Tidak ada data kosakata yang ditemukan.";
}

// Menutup koneksi database
$conn->close();
?>
