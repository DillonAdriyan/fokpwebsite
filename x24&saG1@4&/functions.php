<?php
$servername = "0.0.0.0";
$username = "root";
$password = "root";
$database = "forum_osiskabupatenpemalang";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Koneksi ke database gagal: " . $conn->connect_error);
}

function query($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// tambah fungsi
function tambah($data) {
    global $conn;

    $title = htmlspecialchars($data["title"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $topik = htmlspecialchars($data["topik"]);


        // Upload foto profil
        $targetDir = "uploads/";
        $allowedExtensions = array('png', 'jpg', 'jpeg');

        $profilePicture = $_FILES['gambar'];
        $profilePictureName = $profilePicture['name'];
        $profilePictureTmp = $profilePicture['tmp_name'];
        $profilePictureSize = $profilePicture['size'];
        $profilePictureError = $profilePicture['error'];

        $extension = strtolower(pathinfo($profilePictureName, PATHINFO_EXTENSION));


        if (in_array($extension, $allowedExtensions)) {
            if ($profilePictureSize <= 2 * 1024 * 1024) { // 2MB max size
                $newProfilePictureName = uniqid('', true) . '.' . $extension;
                $targetPath = __DIR__ . '/uploads/' . $newProfilePictureName;


                if (move_uploaded_file($profilePictureTmp, $targetPath)) {
                    // Query untuk menambahkan data baru dengan foto profil
$query = "INSERT INTO berita (title, gambar, deskripsi, penulis, tanggal, topik) VALUES ('$title', '$newProfilePictureName','$deskripsi', '$penulis', '$tanggal', '$topik')";

                    mysqli_query($conn, $query);

                    return "Data berhasil ditambahkan";
                } else {
                    return "Gagal mengunggah foto";
                }
            } else {
                return "Ukuran foto terlalu besar (max 2MB)";
            }
        } else {
            return "Ekstensi tidak diizinkan ";
        }
    }



?>