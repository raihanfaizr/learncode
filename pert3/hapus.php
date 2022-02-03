<?php
include "koneksi.php";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $hapus = mysqli_query($conn,"DELETE FROM data_barang WHERE id = '$id'");
    
    $cek = mysqli_affected_rows($conn);
    
    if($cek > 0){
      echo "<script> alert('data berhasil dihapus'); 
      location.href='index.php' </script>";
      exit;
    }else{
      echo "<script> alert('data gagal dihapus'); </script>";
    }
    }
?>