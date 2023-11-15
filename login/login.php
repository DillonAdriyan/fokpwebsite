<?php
require "../x24&saG1@4&/functions.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa kecocokan username dan password di database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $_SESSION['username'] = $user['username'];
    $_SESSION['profile_picture'] = $user['profile_picture'];
        // Redirect ke halaman utama
        header("Location: ../index.php");
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}

// login.php



// Cek apakah pengguna telah mengirimkan formulir login
// if (isset($_POST['submit'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
// 
//     // Cek apakah pengguna adalah admin
//     if (isAdmin($username, $password)) {
//         // Autentikasi berhasil, buat sesi admin
//         $_SESSION['admin_username'] = $username;
// 
//         // Alihkan pengguna ke halaman admin setelah login
//         header('Location: admin1.php');
//         exit;
//     } else {
//         // Cek apakah pengguna adalah pengguna biasa
//         if (isUser($username, $password)) {
//             // Autentikasi berhasil, buat sesi pengguna biasa
//             $_SESSION['username'] = $username;
// 
//             // Alihkan pengguna ke halaman utama setelah login
//             header('Location: index.php');
//             exit;
//         } else {
//             // Autentikasi gagal, tampilkan pesan kesalahan
//             $error = "Username atau password salah";
//             echo mysqli_error($conn);
//         }
//     }
// }








 ?>

<!DOCTYPE html>
<html>
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum OSIS Kabupaten Pemalang - Masuk</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body class="flex items-center justify-center h-screen">
    <div class="w-full max-w-xs">
        <h1 class="text-4xl font-bold text-center mb-8">Masuk</h1>

        <?php if (isset($error)) { ?>
            <p class="text-red-500 mb-4"><?php echo $error; ?></p>
        <?php } ?>
<div class="container mx-6">
  

        <form action="login.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-lg font-bold mb-2" for="username">Username:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="text" id="username" name="username" required>
            </div>
            <div class="mb-4">
                <label class="block text-lg font-bold mb-2" for="password">Password:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" type="password" id="password" name="password" required>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Masuk</button>
        </form>

        <p class="text-center text-gray-500 text-sm">
            Belum punya akun? <a class="text-blue-500 hover:text-blue-700 font-bold" href="register.php">Daftar di sini</a>.
        </p>
    </div>
    </div>
</body>
</html>
