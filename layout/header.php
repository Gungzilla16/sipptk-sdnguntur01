<?php
 
 include 'config/database.php';
 include 'config/function.php';


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

    <title>Sistem Informasi Pendataan Pendidik dan Tenaga Kependidikan SDN Guntur 01</title>
  </head>
  
  <body>
    <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
            <a class="navbar-brand fw-bold">SIP-PTK SDN GUNTUR 01</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">PTK</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="akun.php">AKUN</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">KELUAR</a>
                </li> 
              </ul>
            </div>

            <div>
              <!-- <a class="navbar-brand" href="#"><small><?= $_SESSION['nama']; ?></small></a> -->
            </div>
            </div>
      </nav>
    </div>