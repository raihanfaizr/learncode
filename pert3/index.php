<?php
include "koneksi.php";

// untuk men-select data di database
$data = mysqli_query($conn,"SELECT * FROM data_barang");

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
        <h1>Data Barang</h1>
        <br>
        <div class="tombol">
          <span><a href="tambah.php"><button class="btn btn-large btn-primary">Tambah Data</button></a></span>
        </div>
        <br>


        <div class="tabel">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga Per-satuan</th>
                        <th scope="col">Terpakai</th>
                        <th scope="col">Cadangan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while($row = mysqli_fetch_row($data)){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $no;?></td>
                        <td><?php echo $row[1] ;?></td>
                        <td><?php echo $row[2] ;?></td>
                        <td><?php echo $row[3] ;?></td>
                        <td><?php echo $row[4] ;?></td>
                        <td><?php echo $row[5] ;?></td>
                        <td><?php echo $row[6] ;?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row[0]?>">Ubah</a> | 
                            <a href="hapus.php?id=<?= $row[0]?>" onclick="return confirm('Apakah anda yakin ingin menghapus <?=$row[1]?>?')">Hapus</a>
                        </td>

                    </tr>
                    <?php
                    $no++;
                    };
                    ?>
                </tbody>
            </table>
        </div>
      </div>

    </div>
  </div>

</body>

</html>