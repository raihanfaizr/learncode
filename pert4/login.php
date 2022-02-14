<?php
session_start();

include "koneksi.php";

if (isset($_POST["login"])) {
$user = $_POST["username"];
$pw = $_POST["password"];

$data = mysqli_query($conn,"SELECT * FROM `admin` WHERE username = '$user' AND `password` = md5('$pw')");

    if (mysqli_num_rows($data) === 1){
        $_SESSION["login"] = true;
        echo "<script> alert('selamat datang $user'); 
        location.href='index.php' </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Inventaris</title>

  <!-- Style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style.css">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

</head>
<body class="bg-gradient">

<!-- Card bootstrap -->

<div class="card card-login">
  <div class="card-body">
    <h5 class="card-title text-center"><b>Login</b></h5><br>
    <form class="ml-4" action="" method="post">
        <label for="username"><b>Username</b><br>
            <input id="username" type="text" name="username" style="width: 250px;">
        </label>
        <br>
        <label for="password"><b>Password</b><br>
            <input id="password" type="Password" name="password" style="width: 250px;">
        </label>
        <br>
        <br>
        <button class="btn btn-primary" type="submit" name="login">Login</button>
    </form>
  </div>

  
</body>
</html>