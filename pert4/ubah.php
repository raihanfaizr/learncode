<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location: login.php");
}

include "koneksi.php";

function auto($terpakai, $cadangan){
  return $terpakai + $cadangan;
}
        
if (isset($_POST["ubah"])) {
$id = $_POST["id"];
$nama = $_POST["nama-barang"];
$jenis = $_POST["jenis"];
$harga = $_POST["harga"];
$terpakai = $_POST["terpakai"];
$cadangan = $_POST["cadangan"];
$jumlah = auto($terpakai, $cadangan);

$insert = mysqli_query($conn,"UPDATE data_barang SET 
                              `nama-barang` = '$nama', 
                              jenis = '$jenis', 
                              harga = '$harga', 
                              terpakai = '$terpakai', 
                              cadangan = '$cadangan', 
                              jumlah = '$jumlah'
                              WHERE id= '$id'");

$cek = mysqli_affected_rows($conn);

if($cek > 0){
  echo "<script> alert('data berhasil diubah'); 
  location.href='index.php' </script>";
  exit;
}else{
  echo "<script> alert('data gagal diubah'); </script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Ubah Data</title>
        
    <!-- Style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

</head>
<body>
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Data Inventaris</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="logout nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
  </nav>
  
    <!-- Sesudah navbar -->

    <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->

      <div class="sidebar col-lg-2 col-3 bg-dark">
        <div class="admin text-center">
          <span class="text-white"><i class="fas fa-user"></i></span>
          <h5 class="text-white">Admin</h5>
        </div>
        <a class="nav-link active" href="index.php">Data Barang</a>
      </div>


      <!-- Content -->

      <div class="isian col-lg-10 col-9">
        <h1>Form Ubah Data</h1>
        <br>

  <!-- Form Ubah Data-->

  <?php
  $id = $_GET["id"];

  $data = mysqli_query($conn,"SELECT * FROM data_barang WHERE id = '$id'");

  $row = mysqli_fetch_row($data);
  ?>
        <form class="pl-4 pt-2" action="" method="post">

            <input type="hidden" name="id" value="<?=$row[0]?>">
            
            <label for="nama-barang"><b>Nama Barang</b><br>
            <input id="nama-barang" type="text" name="nama-barang" value="<?=$row[1]?>">
            </label>
            <br>
            <label for="jenis"><b>Jenis Barang</b><br>
            <input id="jenis" type="text" name="jenis" value="<?=$row[2]?>">
            </label>
            <br>
            <label for="harga"><b>Harga Barang</b><br>
            <input id="harga" type="text" name="harga" value="<?=$row[3]?>">
            </label>
            <br>
            <label for="terpakai"><b>Terpakai</b><br>
            <input id="terpakai" type="text" name="terpakai" value="<?=$row[4]?>">
            </label>
            <br>
            <label for="cadangan"><b>Cadangan</b><br>
            <input id="cadangan" type="text" name="cadangan" value="<?=$row[5]?>">
            </label>
            <br>
            <br>
            <button class="btn btn-large btn-primary" type="submit" name="ubah">Ubah</button>
            </form>

      </div>

    </div>
  </div>

</body>
</html>