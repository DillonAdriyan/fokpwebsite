<?php
require '../x24&saG1@4&/functions.php';
session_start();

if (!isset($_SESSION['username']) ) {
 header("Location: ../index.php");
 exit();
}

if (isset($_POST["submit"])) {
  $result = tambah($_POST);

  if (strpos($result, 'Username sudah terdaftar') !== false) {
    echo "<script>
            alert('Berita Sudah ada');
            document.location.href = 'index.php';
            </script>";
  } elseif ($result === "Data berhasil ditambahkan") {
    echo "<script>
            alert('Berita berhasil dipublish');
            document.location.href = '../index.php';
            </script>";
  } else {
    echo "<script>
            alert('$result');
            document.location.href = 'index.php';
            </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Document</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
 <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                 <h1>
Tambahkan Berita
                 </h1>
</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"enctype="multipart/form-data" >
                     
                        <div class="form-gmb-2 mb-2">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="col-md-12">
                             <label for="gambar" class="mb-2">Gambar :</label>
                                <input id="gambar" type="file" class="form-control" name="gambar" >
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-md-12 mb-2">
                                <textarea name="deskripsi" class="form-control" cols="30" rows="10" placeholder="Deskripsi"></textarea>
                            </div>
                            
<div class="form-group mb-3">
  <div class="col-md-12">
   <label for="topik">Topik</label>
 <select name="topik" class="form-select" aria-label="Default select example">
  <option selected>Pendidikan </option>
  <option >Olahraga</option>
  <option >Politik</option>
  <option >Alam</option>
  <option >Kesehatan</option>
</select>
                            </div>
                            </div>
   
<div class="form-group mb-3">
  <div class="col-md-12">
 <label for="">Penulis :</label>
 <select name="penulis" class="form-select" aria-label="Default select example">
  <option selected>Forum OSIS Kabupaten Pemalang</option>
</select>
</div>
</div>
                        <div class="form-group mb-3">
                          <div class="col-md-12">
                         <label for="date">Tanggal :</label>
                        <input id="date" type="date" name="tanggal">
                        </div>
                </div>
                        <button name="submit" type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-btn fa-user"></i> Publish
                        </button>
                </div>
                    </form>
            </div>
        </div>
        </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>